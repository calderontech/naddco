<?php
/**
 * The template for displaying search results pages
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<section>
	<div class="moviecontent">
		<div class="w-clearfix c960">
			<div class="w-clearfix peliculasrecientes">
				<h1 class="titlesection"><?php printf( __( 'Busqueda para: %s', 'twentysixteen' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
				<div class="w-clearfix row">
					<?php if ( have_posts() ) :
					while ( have_posts() ) : the_post();
					$fondo = MultiPostThumbnails::get_post_thumbnail_id('pelicula','descripcion', $post->ID);
					$fondo = wp_get_attachment_image_src($fondo, 'descripcion');
					$anio = get_post_meta( $post->ID , "wpcf-ano-de-estreno" , true );
					$post = get_post( $post->ID );
					$excerpt = get_the_excerpt($post->ID);
					$excerpt = substr($excerpt, 0, 220);
					$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
					?>
					<div class="w-clearfix description visual">
						<div class="imagecontent" style="background-image: url('<?php echo $fondo[0]; ?>')"></div>
						<div class="shadow"></div>
						<div class="w-clearfix textdescription">
							<h1 class="titul tdescrip"><?php echo get_the_title($post->ID); ?></h1>
							<div class="extract"><?php echo $excerpt.'...'; ?></div>
							<div class="year">Año de estreno: <span class="yea"><?php echo $anio; ?></span>
							</div>
							<div class="year">categorías: <span class="yea">
								<?php
								$terms =  wp_get_post_terms($post->ID,'categoria');
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
						</div><a href="<?php echo get_the_permalink($post->ID); ?>" class="w-button viewmore">Ver más</a>
					</div>
				</div>
				<?php endwhile;
				else : ?>
				<div class="contentcontacto contentgracias">
					<div class="textcontacto textregistro textogracias">No existen resultados para tu busqueda. Por favor realiza otra busqueda o ve a Inicio.</div>
					<a href="<?php bloginfo('home'); ?>" class="w-button enviarbot butgracias btgra">Ir a Inicio</a>
				</div>

				<?php endif;
				?>
			</div>
		</div>
	</div>
</div>
</div>
<div class="actoresdestacados">
	<div class="w-clearfix c960">
		<h1 class="titlesection">Actores Destacados</h1>
		<div class="w-clearfix losactores">
			<?php
			$terms = get_terms('actores');
			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
				$k = 1;
				foreach ( $terms as $term ) {
					$term_link = get_term_link( $term );
					if($k <= 15){
						?>
						<a href="<?php echo $term_link; ?>" class="unactor"><?php echo $term->name; ?></a>
						<?php
					}
					$k++;
				}
			}
			?>

		</div>
	</div>
</div>
</section>

<?php get_footer(); ?>
