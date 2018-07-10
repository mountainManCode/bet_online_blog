<?php
/**
 * The front-page file.
 *TempLate Name: Home Page
 * @package Bet_Online_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="front-page-wrapper">
		
				<?php if ( have_posts() ) : ?>

				  <?php if ( ! is_home() && ! is_front_page() ) : ?>
				  	<header>
					  	<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					  </header>
				  <?php endif; ?>

          <section class="front-page__latest-articles">
          <ul class="latest-article-wrapper"></ul>
            <?php /* Start the Loop */
              $args = array( 'posts_per_page' => 5, 'orderby' => 'date', 'orderby' => 'DEC');
              $latest_articles = get_posts( $args );

              foreach ( $latest_articles as $post ) : setup_postdata( $post ); ?>
              
              <?php get_template_part( 'template-parts/content', 'latest-articles' ); ?>

              <?php endforeach; 
              wp_reset_postdata();?>

              <?php else : ?>

              <?php get_template_part( 'template-parts/content', 'none' ); ?>

          </section>
        <?php endif; ?> <!-- if ( have_posts() ) -->
</ul>
        
      </section>
    </main>
  </div>

  <?php get_footer(); ?>