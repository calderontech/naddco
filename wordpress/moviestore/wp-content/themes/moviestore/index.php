<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<section class="w-clearfix content">
  <div class="w-clearfix slider">
    <div data-animation="slide" data-duration="500" data-infinite="1" data-delay="4000" data-autoplay="1" class="w-slider sliderhome">
      <div class="w-slider-mask">
        <?php
        $query = new WP_Query( array( 'post_type' => 'pelicula', 'posts_per_page' => -1 ) );
        while ($query->have_posts()):$query->the_post();
        $slider = MultiPostThumbnails::get_post_thumbnail_id('pelicula','slider', $post->ID);
        $slider = wp_get_attachment_image_src($slider, 'full');
        $en_slider = get_post_meta( $post->ID , "wpcf-en-sliders" , true );
        if($en_slider == "1"){
          ?>
          <div class="w-slide w-clearfix slide" style="background-image: url('<?php echo $slider[0]; ?>')">
            <div class="full">
              <div class="c960">
                <h1 class="titul"><?php the_title(); ?></h1>
              </div>
            </div>
          </div>
          <?php
        }
        endwhile;
        wp_reset_postdata();
        ?>
      </div>
      <div class="w-slider-arrow-left">
        <div class="w-icon-slider-left"></div>
      </div>
      <div class="w-slider-arrow-right">
        <div class="w-icon-slider-right"></div>
      </div>
      <div class="w-slider-nav w-round"></div>
    </div>
  </div>
  <div class="moviecontent">
    <div class="w-clearfix c960">
      <div class="w-clearfix peliculasrecientes">
        <h1 class="titlesection">Peliculas Recientes</h1>
        <div class="w-clearfix row">

          <div class="w-clearfix themovies">
            <?php
            $c = 1;
            $cl = 1;
            $query = new WP_Query( array( 'post_type' => 'pelicula', 'posts_per_page' => -1 ) );
            while ($query->have_posts()):$query->the_post();
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
            wp_reset_postdata();
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

<?php get_footer(); ?>
