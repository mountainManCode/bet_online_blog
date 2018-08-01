<?php
/**
 * The template for displaying Bet_Online Posts Archive.
 *
 * @package Bet_Online
 */

  get_header();
?>

<div id="primary" class="content-area">
  <main id="main" class="site-main">
    <div class="archive__articles-wrapper">

		<h4 class="nav-hierarchy"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> > 
				<span>
					<?php 
            $the_page = sanitize_post( $GLOBALS['wp_the_query']->get_queried_object() );
            $pageTitle = $the_page->post_title;
            echo esc_html($pageTitle);
					?>

				</span>
			</h4>

      <?php wp_reset_postdata(); ?>
      <?php
        $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
        $args_latest = array(
          'post_type' => 'post',
          'posts_per_page' => 8,
          'category__not_in' => array( 2, 3, 4, 5, 6 ),
          'ignore_sticky_posts' => false,
          'post_status' => 'publish',
          'orderby' => 'date', 
          'order' => 'DEC',
          'paging' => 1,
        );
      ?>
            <ul class="articles-list">
      <?php
      $latest_articles = new WP_Query( $args_latest );

      // kint debugger
      // d($latest_articles);

        if ( $latest_articles->have_posts() ) :
      ?>

          <?php
            while ( $latest_articles->have_posts() ) :
            $latest_articles->the_post();	
          ?>            
            <?php get_template_part( 'template-parts/content', 'articles' ); ?>

          <?php endwhile; ?>
        </ul>

        <?php wp_reset_postdata(); ?>
      <?php endif; ?>
          
    </div> <!-- archive-page-wrapper -->
  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();