<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); 
the_post();
$slider = MultiPostThumbnails::get_post_thumbnail_id('pelicula','interior', $post->ID);
$slider = wp_get_attachment_image_src($slider, 'full');
$anio = get_post_meta( $post->ID , "wpcf-ano-de-estreno" , true );
$stars = get_post_meta( $post->ID , "wpcf-calificacion" , true );
?>
<section class="w-clearfix content">
	<div class="moviecontent">
		<div class="w-clearfix c960">
			<div class="w-clearfix peliculasrecientes">
				<h1 class="titlesection"><?php the_title(); ?></h1>
				<div class="pordagrande" style="background-image: url('<?php echo $slider[0]; ?>')"></div>
				<div class="w-clearfix descripcionpeli">
					<div class="w-clearfix des">
						<h1 class="titlesection titleinfo">Resumen</h1>
						<div class="la-descripcion"><?php the_content(); ?></div>
					</div>
					<div class="w-clearfix moreinfo">
						<h1 class="titlesection titleinfo">Mas Info</h1>
						<div class="year info">Año de estreno: <span class="yea vars"><?php echo $anio; ?></span>
						</div>
						<div class="year info">Categorías: <span class="yea vars">
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
					</div>
					<div class="year info">ACTORES:<span class="yea vars">
						<?php
						$terms =  wp_get_post_terms($post->ID,'actores');
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
				</div>
				<div class="year info">Director:<span class="yea vars">
					<?php
					$terms =  wp_get_post_terms($post->ID,'directores');
					$count = count($terms);
					$c = 1;
					if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
						foreach ( $terms as $term ) {
							echo $term->name;
							if($c < $count){
								echo ', ';
							} else {
								echo '.';
							}
							$c++;
						}
					}
					?>
				</span>
			</div>
			<?php
			switch ($stars) {
				case "1":
				echo '<div class="w-clearfix calific star1"><div class="calificlabel">Calificación:</div></div>';
				break;
				case "2":
				echo '<div class="w-clearfix calific star2"><div class="calificlabel">Calificación:</div></div>';
				break;
				case "3":
				echo '<div class="w-clearfix calific star3"><div class="calificlabel">Calificación:</div></div>';
				break;
				case "4":
				echo '<div class="w-clearfix calific star4"><div class="calificlabel">Calificación:</div></div>';
				break;
				case "5":
				echo '<div class="w-clearfix calific star5"><div class="calificlabel">Calificación:</div></div>';
				break;
			}
			?>
		</div>
	</div>
	<div class="w-clearfix traileryrelacionadas">
		<div class="w-clearfix trilercontent">
			<h1 class="titlesection titleinfo">Trailer</h1>
			<?php
			$url_video = get_post_meta( $post->ID , "wpcf-trailer" , true );
			$elvideo = str_replace('http://www.youtube.com/watch?v=', '', $url_video);
			$elvideo = str_replace('http://youtu.be/', '', $elvideo);
			$elvideo = str_replace('http://www.youtube.com/embed/', '', $elvideo);
			$elvideo = str_replace('https://www.youtube.com/watch?v=', '', $elvideo);
			$elvideo = str_replace('https://youtu.be/', '', $elvideo);
			$elvideo = str_replace('https://www.youtube.com/embed/', '', $elvideo);

			$elvideo = str_replace('http:\/\/www.youtube.com\/watch?v=', '', $elvideo);
			$elvideo = str_replace('http:\/\/youtu.be\/', '', $elvideo);
			$elvideo = str_replace('http:\/\/www.youtube.com\/embed\/', '', $elvideo);
			$elvideo = str_replace('https:\/\/www.youtube.com\/watch?v=', '', $elvideo);
			$elvideo = str_replace('https:\/\/youtu.be\/', '', $elvideo);
			$elvideo = str_replace('https:\/\/www.youtube.com\/embed\/', '', $elvideo);
			if ($elvideo) {
				?>
				<div class="videocontent">
					<iframe src="https://www.youtube.com/embed/<?php echo $elvideo; ?>" frameborder="0" allowfullscreen></iframe>
				</div>
				<?php } else { ?>
				<div class="videocontent"></div>
				<?php } ?>
			</div>
			<div class="w-clearfix relacioncontent">
				<h1 class="titlesection titleinfo">Relacionadas</h1>
				<div class="w-clearfix relacionadas">
					<?php
					$terms =  wp_get_post_terms($post->ID,'categoria');
					$cate = array();
					foreach ( $terms as $term ) {
						array_push($cate, $term->slug);
					}
					$args = array(
						'post_type' => 'pelicula',
						'posts_per_page' => 6,
						'tax_query' => array(
							array(
								'taxonomy' => 'categoria',
								'field' => 'slug',
								'terms' => array($cate[1], $cate[0])
								)
							),
						'orderby' => 'date',
						'order' => 'DESC',
						'post__not_in' => array($post->ID)
						);
					$query = new WP_Query( $args );
					while ($query->have_posts()):$query->the_post();
					$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'portada');
					$thumb_tilte = get_post(get_post_thumbnail_id())->post_title;
					$stars = get_post_meta( $post->ID , "wpcf-calificacion" , true );
					?>
					<a href="<?php the_permalink(); ?>" data-ix="getdesc" class="w-inline-block onemovie">
						<div data-ix="hovermovie" class="desc">
							<h3 class="titlegrid reltitul"><?php the_title(); ?></h3>
							<?php
							switch ($stars) {
								case "1":
								echo '<div class="stars relstar star1"></div>';
								break;
								case "2":
								echo '<div class="stars relstar star2"></div>';
								break;
								case "3":
								echo '<div class="stars relstar star3"></div>';
								break;
								case "4":
								echo '<div class="stars relstar star4"></div>';
								break;
								case "5":
								echo '<div class="stars relstar star5"></div>';
								break;
							}
							?>
						</div>
						<img src="<?php echo $thumbnail[0]; ?>" alt="<?php echo $thumb_tilte; ?>">
					</a>
					<?php
					endwhile;
					wp_reset_postdata();
					?>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<div class="actoresdestacados">
	<div class="w-clearfix c960">
		<h1 class="titlesection">Directores Destacados</h1>
		<div class="w-clearfix losactores">
			<?php
			$terms = get_terms('directores');
			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
				foreach ( $terms as $term ) {
					$term_link = get_term_link( $term );
					?>
					<a href="<?php echo $term_link; ?>" class="unactor"><?php echo $term->name; ?></a>
					<?php
				}
			}
			?>
			
		</div>
	</div>
</div>
</section>

<?php
get_footer(); ?>