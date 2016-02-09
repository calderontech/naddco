<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
				<?php the_archive_title( '<h1 class="titlesection">', '</h1>' ); ?>
				<div class="w-clearfix row">
					<div class="w-clearfix themovies">
						<?php
						$c = 1;
						$cl = 1;
						if ( have_posts() ) : while ( have_posts() ) : the_post(); 
						$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'portada');
						$thumb_tilte = get_post(get_post_thumbnail_id())->post_title;
						$stars = get_post_meta( $post->ID , "wpcf-calificacion" , true );
						?>
						<a href="#" class="w-inline-block onemovie omh" cod="<?php echo $cl; ?>" id="<?php echo $post->ID; ?>">
							<div data-ix="hovermovie" class="w-clearfix desc">
								<h3 class="titlegrid"><?php the_title(); ?></h3>
								<?php
								switch ($stars) {
									case "1":
									echo '<div class="stars star1"></div>';
									break;
									case "2":
									echo '<div class="stars star2"></div>';
									break;
									case "3":
									echo '<div class="stars star3"></div>';
									break;
									case "4":
									echo '<div class="stars star4"></div>';
									break;
									case "5":
									echo '<div class="stars star5"></div>';
									break;
								}
								?>
							</div>
							<img src="<?php echo $thumbnail[0]; ?>" alt="<?php echo $thumb_tilte; ?>">
						</a>
						<?php if($c == 4){ $c = 0;  ?>
					</div>
					<div class="w-clearfix description conte-<?php echo $cl; ?>">

					</div>
					<div class="w-clearfix themovies">
						<?php 
						$cl++;
					}
					$c++;
					endwhile;
					the_posts_pagination( array(
						'prev_text'          => __( 'Previous page', 'twentysixteen' ),
						'next_text'          => __( 'Next page', 'twentysixteen' ),
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
						) );

					endif;
					?>
				</div>
				<div class="w-clearfix description conte-<?php echo $cl; ?>">

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
