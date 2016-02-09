<?php
require_once '../../../../wp-config.php';
global $wpdb;
global $db;

$id = $_REQUEST['id']; 
$fondo = MultiPostThumbnails::get_post_thumbnail_id('pelicula','descripcion', $id);
$fondo = wp_get_attachment_image_src($fondo, 'descripcion');
$anio = get_post_meta( $id , "wpcf-ano-de-estreno" , true );
$post = get_post( $id );
$excerpt = get_the_excerpt($id);
$excerpt = substr($excerpt, 0, 220);
$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
?>

<div class="imagecontent" style="background-image: url('<?php echo $fondo[0]; ?>')"></div>
<div class="shadow"></div>
<div class="w-clearfix textdescription">
	<h1 class="titul tdescrip"><?php echo get_the_title($id); ?></h1>
	<div class="extract"><?php echo $excerpt.'...'; ?></div>
	<div class="year">Año de estreno: <span class="yea"><?php echo $anio; ?></span>
	</div>
	<div class="year">categorías: <span class="yea">
		<?php
		$terms =  wp_get_post_terms($id,'categoria');
		$count = count($terms);
		$c = 1;
		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
			foreach ( $terms as $term ) {
				echo $term->name;
				if($c < $count){
					echo ', ';
				} else{
					echo '.';
				}
				$c++;
			}
		}
		?>
	</span>
</div><a href="<?php echo get_the_permalink($id); ?>" class="w-button viewmore">Ver más</a>
</div>
