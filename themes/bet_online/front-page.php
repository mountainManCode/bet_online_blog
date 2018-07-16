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
        
        <h2>Latest Articles</h2>
		
				<?php if ( have_posts() ) : ?>

				  <?php if ( ! is_home() && ! is_front_page() ) : ?>
				  	<header>
					  	<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					  </header>
				  <?php endif; ?>

          <section class="front-page__latest-articles container">
            <ul class="articles-container">

              <?php /* Start the Loop */
                $args = array( 'posts_per_page' => 5, 'orderby' => 'date', 'orderby' => 'DEC');
                $latest_articles = get_posts( $args );

                foreach ( $latest_articles as $post ) : setup_postdata( $post ); 
              ?>
                
              <?php get_template_part( 'template-parts/content', 'articles' ); ?>

              <?php endforeach; wp_reset_postdata();?>

              <?php else : ?>

              <?php get_template_part( 'template-parts/content', 'none' ); ?>
            
            </ul>
            <?php endif; ?>
          </section> <!-- End of LATEST ARTICLES -->


        <section class="front-page__latest-articles container">
          <h2>
            Sports
          </h2>
          <ul class="articles-container">
            <?php
              $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'category_name' => 'NFL',
                'posts_per_page' => 5,
              );
              $arr_posts = new WP_Query( $args );

            if ( $arr_posts->have_posts() ) :

              while ( $arr_posts->have_posts() ) :
                $arr_posts->the_post();
            ?>
                  
            <?php get_template_part( 'template-parts/content', 'articles' ); ?>

            <?php endwhile; ?>
          </ul>
            <?php endif; ?>
        </section>

        <section class="front-page__latest-articles container">
          <h2>
            Casino
          </h2>
          <ul class="articles-container">
            <?php
              $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'category_name' => 'casino',
                'posts_per_page' => 5,
              );
              $arr_posts = new WP_Query( $args );

              if ( $arr_posts->have_posts() ) :

                while ( $arr_posts->have_posts() ) :
                  $arr_posts->the_post();
            ?>
                
            <?php get_template_part( 'template-parts/content', 'articles' ); ?>

            <?php endwhile; ?>
          </ul>
            <?php endif; ?>
        </section>

        <section class="front-page__latest-articles container">
          <h2>
            Horses
          </h2>
          <ul class="articles-container">
            <?php
              $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'category_name' => 'horses',
                'posts_per_page' => 5,
              );
              $arr_posts = new WP_Query( $args );

              if ( $arr_posts->have_posts() ) :

              while ( $arr_posts->have_posts() ) :
                $arr_posts->the_post();
            ?>
                
            <?php get_template_part( 'template-parts/content', 'articles' ); ?>

            <?php endwhile; ?>
            </ul>
              <?php endif; ?>
        </section>
        
      </section> <!-- front-page-wrapper -->
    </main>
  </div>

  <?php get_footer(); ?>