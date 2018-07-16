<?php
/**
 * The front-page file.
 *TempLate Name: Home Page
 * @package Bet_Online_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
      <div class="front-page-wrapper">

        <section class="front-page__latest-articles container">
          <h2>Latest Articles</h2>
		
				  <?php if ( have_posts() ) : ?>

				  <?php if ( ! is_home() && ! is_front_page() ) : ?>
				  	<header>
					  	<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					  </header>
				  <?php endif; ?>
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

        <!-- CATEGORY SPORTS -->
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
        </section> <!-- End of CATEGORY SPORTS -->

        <!-- CATEGORY CASINO -->
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
        </section> <!-- End of CATEGORY CASINO -->

        <!-- CATEGORY HORSES -->
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
        </section> <!-- End of CATEGORY HORSES -->

        <!-- PROMOTIONS SECTION -->
    <section class="promotions">
        <div class="container">
            <hgroup>
                <h2>BLOG PROMOTIONS</h2>
                <a href="#" onclick="alert('Todo: Link to page'); return false">See All Blog Promotions</a>
            </hgroup>
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="tile tile--1">
                        <div class="icon-tag-wrapper-outer">
                            <div class="icon-tag-wrapper-inner">
                                <img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/tag-promo.svg' ?>">
                                <div class="promo-tag">Blog Promotion</div>
                            </div>
                        </div>
                        <div class="tile-content">
                            <div class="tile-content--inner">
                                <div class="tile-content-upper">
                                    <img class="tile-content-bg" src="<?php echo get_template_directory_uri() . '/assets/img/new/icon-faq-bg.jp g' ?>">
                            ?<div class="tile-content-upper-inner">
                                        <div class="promo-heading">BLOG BONUS</div>
                                        <span class="promo-subheading">MOBILE BETTING</span>
                                    </div>
                                </div>
                                <div class="tile-content-lower">
                                    <div class="icon-wrapper">
                                        <img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/casino.svg' ?>">
                            ?</div>
                                    <a class="learn-more" data-toggle="collapse" href="#promo1" role="button" aria-expanded="false" aria-controls="promo1">More Info</a>
                                    <div id="promo1" class="tile-content-expanded collapse">
                                        <p>LIFE BONUS… that’s the promo code you need to use whenever you make a qualifying
                                            reload to score the most generous reload bonus program in the industry – our
                                            Lifetime Bonus Guarantee. Once your deposit goes through you will score a 25%
                                            Sportsbook Bonus. To maximize the value off of your bonus, you can score up to
                                            $1,000 worth of free plays per qualifying reload.</p>
                                    </div>
                                    <a class="btn" href="#" onclick="alert('Todo: Link to page'); return false">CLAIM NOW!</a>
                                    <a class="terms" href="#" onclick="alert('Todo: Link to page'); return false">Terms & Conditions</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="tile tile--1">
                        <div class="icon-tag-wrapper-outer">
                            <div class="icon-tag-wrapper-inner">
                                <img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/tag-promo.svg' ?>">
                                <div class="promo-tag">Blog Promotion</div>
                            </div>
                        </div>
                        <div class="tile-content">
                            <div class="tile-content--inner">
                                <div class="tile-content-upper">
                                    <img class="tile-content-bg" src="<?php echo get_template_directory_uri() . '/assets/img/new/icon-faq-bg.jp g' ?>">
                            ?<div class="tile-content-upper-inner">
                                        <div class="promo-heading">BLOG BONUS</div>
                                        <span class="promo-subheading">MOBILE BETTING</span>
                                    </div>
                                </div>
                                <div class="tile-content-lower">
                                    <div class="icon-wrapper">
                                        <img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/casino.svg' ?>">
                            ?</div>
                                    <a class="learn-more" data-toggle="collapse" href="#promo2" role="button" aria-expanded="false" aria-controls="promo2">More Info</a>
                                    <div id="promo2" class="tile-content-expanded collapse">
                                        <p>LIFE BONUS… that’s the promo code you need to use whenever you make a qualifying
                                            reload to score the most generous reload bonus program in the industry – our
                                            Lifetime Bonus Guarantee. Once your deposit goes through you will score a 25%
                                            Sportsbook Bonus. To maximize the value off of your bonus, you can score up to
                                            $1,000 worth of free plays per qualifying reload.</p>
                                    </div>
                                    <a class="btn" href="#" onclick="alert('Todo: Link to page'); return false">CLAIM NOW!</a>
                                    <a class="terms" href="#" onclick="alert('Todo: Link to page'); return false">Terms & Conditions</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="tile tile--1">
                        <div class="icon-tag-wrapper-outer">
                            <div class="icon-tag-wrapper-inner">
                                <img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/tag-promo.svg' ?>">
                                <div class="promo-tag">Blog Promotion</div>
                            </div>
                        </div>
                        <div class="tile-content">
                            <div class="tile-content--inner">
                                <div class="tile-content-upper">
                                    <img class="tile-content-bg" src="<?php echo get_template_directory_uri() . '/assets/img/new/icon-faq-bg.jp g' ?>">
                            ?<div class="tile-content-upper-inner">
                                        <div class="promo-heading">BLOG BONUS</div>
                                        <span class="promo-subheading">MOBILE BETTING</span>
                                    </div>
                                </div>
                                <div class="tile-content-lower">
                                    <div class="icon-wrapper">
                                        <img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/casino.svg' ?>">
                            ?</div>
                                    <a class="learn-more" data-toggle="collapse" href="#promo3" role="button" aria-expanded="false" aria-controls="promo3">More Info</a>
                                    <div id="promo3" class="tile-content-expanded collapse">
                                        <p>LIFE BONUS… that’s the promo code you need to use whenever you make a qualifying
                                            reload to score the most generous reload bonus program in the industry – our
                                            Lifetime Bonus Guarantee. Once your deposit goes through you will score a 25%
                                            Sportsbook Bonus. To maximize the value off of your bonus, you can score up to
                                            $1,000 worth of free plays per qualifying reload.</p>
                                    </div>
                                    <a class="btn" href="#" onclick="alert('Todo: Link to page'); return false">CLAIM NOW!</a>
                                    <a class="terms" href="#" onclick="alert('Todo: Link to page'); return false">Terms & Conditions</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        
      </div> <!-- front-page-wrapper -->
    </main>
  </div>

  <?php get_footer(); ?>