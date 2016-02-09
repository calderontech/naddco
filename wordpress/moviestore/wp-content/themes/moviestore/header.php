<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url')?>/css/normalize.css">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url')?>/css/webflow.css">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url')?>/css/movie-store.webflow.css">
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
<script>
var templateurl = '<?php bloginfo("template_url"); ?>';
WebFont.load({
  google: {
    families: ["Droid Sans:400,700","Changa One:400,400italic"]
  }
});
</script>
<script type="text/javascript" src="<?php bloginfo('template_url')?>/js/modernizr.js"></script>
<link rel="shortcut icon" type="image/x-icon" href="https://daks2k3a4ib2z.cloudfront.net/img/favicon.ico">
<link rel="apple-touch-icon" href="https://daks2k3a4ib2z.cloudfront.net/img/webclip.png">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> class="w-clearfix body">
  <header class="w-section header">
    <div class="w-clearfix c960">
      <a href="<?php bloginfo('home')?>">
        <img src="<?php bloginfo('template_url')?>/images/logo.png" class="logo">
      </a>
      <div data-delay="0" class="w-dropdown w-clearfix dropdown">
        <div class="w-dropdown-toggle filtroporcagegoria">
          <div>Por Categoría</div>
          <div class="w-icon-dropdown-toggle iconfelch"></div>
        </div>
        <nav class="w-dropdown-list listcat">
          <?php
          $terms = get_terms('categoria');
          if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
            foreach ( $terms as $term ) {
              $term_link = get_term_link( $term );
              ?>
              <a href="<?php echo $term_link; ?>" class="w-dropdown-link itemlist"><?php echo $term->name; ?></a>
              <?php
            }
          }
          ?>
        </nav>
      </div>
      <div class="w-clearfix formwrap">
        <form id="search-form" name="search-form" data-name="Searchf Form" class="w-clearfix search" method="GET" action="<?php echo esc_url(get_site_url('/')); ?>">
          <input id="searchi" type="text" placeholder="Buscar por titulo" name="s" value="<?php the_search_query(); ?>" data-name="search" required="required" class="w-input inputsearch">
          <input type="submit" value="Submit" class="w-button searchsubmit">
        </form>
        <script>
        var $ = jQuery.noConflict();
        $(document).ready(function () {
          $(function() {
            var availableTags = [
            <?php
            $query = new WP_Query( array( 'post_type' => 'pelicula', 'posts_per_page' => -1 ) );
            $count = count($query);
            while ($query->have_posts()):$query->the_post();
            echo '"';
            echo addslashes(get_the_title());
            echo'"';
              if($c <= $count){
                echo ',';
              }
            endwhile;
            wp_reset_postdata();
            ?>
            ];
            $( "#searchi" ).autocomplete({
              source: availableTags
            });
          });
        });
        </script>
      </div>
    </div>
  </header>

