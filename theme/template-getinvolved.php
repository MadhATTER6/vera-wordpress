<?php
/**
 * Template Name: Get Involved
 *
 * This is the template for all pages under /getinvolved/
 *
 * @package The Vera Project
 */

get_header(); ?>
<div id="content" class="site-content with-left-nav clear">
  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

      <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'content', 'page' ); ?>

      <?php endwhile; // end of the loop. ?>

    </main><!-- #main -->
  </div><!-- #primary --> 

  <div class="left-nav">

    <?php wp_nav_menu( array( 'theme_location' => 'getinvolved', 'menu_id' => 'getinvolved-nav' ) ); ?>

  </div>

  <?php get_sidebar(); ?>

</div><!-- #content -->

<?php get_footer(); ?>
