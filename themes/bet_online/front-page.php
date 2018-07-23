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

			<!-- Slick Hero Carousel -->
				<section id="hero-carousel" class="hero-carousel">
					<ul id="hero-article" class="hero-article">
						<?php get_template_part( 'template-parts/content', 'slick-hero' ); ?>
					
					<ul id="slider-nav" class="slider-nav">
						<?php get_template_part( 'template-parts/content', 'slick-nav' ); ?>
				</section>

        <section class="front-page__articles x-container">
					<div class="header">
						<div class="header__wrapper-outer">
							<h2 class="header__tag">Latest Articles</h2>
							<div class="header__wrapper-inner">
								<img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/icon-tag-right.svg' ?>">
								<div id="header__icon" class="header__icon">
									<img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/icon-latest-articles.svg' ?>">
								</div>
							</div>
						</div>
					</div>
            <ul class="articles-container">

						<?php
              $args1 = array(
								'post_type' => 'post', 
								'posts_per_page' => 5,
								'post_status' => 'publish',
								'category__not_in' => array( 2, 3, 4, 5, 6 ), 
								'orderby' => 'date', 
								'orderby' => 'DEC' 
							);
              $latest_articles = new WP_Query( $args1 );

							// kint debugger
							// d($latest_articles);

            if ( $latest_articles->have_posts() ) :

              while ( $latest_articles->have_posts() ) :
								$latest_articles->the_post();
								
								
            ?>
                
								<?php get_template_part( 'template-parts/content', 'articles' ); ?>
								
							<?php endwhile; ?>
							</ul>	

						<?php wp_reset_postdata(); ?>
					<?php endif; ?>
        </section> <!-- End of LATEST ARTICLES -->

        <!-- CATEGORY SPORTS -->
        <section class="front-page__articles x-container">
					<div class='header'>
						<div class="header__wrapper-outer">
							<h2 class="header__tag">Sports</h2>
							<div class="header__wrapper-inner">
								<img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/icon-tag-right.svg' ?>">
								<div class="header__icon">
									<img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/sports.svg' ?>" />
								</div>
							</div>
						</div>
					</div>
          <ul class="articles-container">
					
						<?php
							// $idObj = get_category_by_slug('sports');
              $args = array(
								'post_type' => 'post',
								'posts_per_page' => 5,
                'post_status' => 'publish',
								'category__not_in' => '2', 
								'orderby' => 'date',
								'orderby' => 'DEC',
								'tax_query' => array(
									array(
											'taxonomy' => 'category',
											'field' => 'term_id',
											'terms' => array(2),
											'include_children' => true,
									),
							)
								// 'category__in' => array( '$idObj->term_id' ),
              );
              $sports_posts = new WP_Query( $args );

            if ( $sports_posts->have_posts() ) :

              while ( $sports_posts->have_posts() ) :
                $sports_posts->the_post();
            ?>
                  
            <?php get_template_part( 'template-parts/content', 'articles' ); ?>

            <?php endwhile; ?>
					</ul>
						<?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </section> <!-- End of CATEGORY SPORTS -->

        <!-- CATEGORY CASINO -->
        <section class="front-page__articles x-container">
					<div class='header'>
						<div class="header__wrapper-outer">
							<h2 class="header__tag">Casino</h2>
							<div class="header__wrapper-inner">
								<img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/icon-tag-right.svg' ?>">
								<div class="header__icon">
									<img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/casino.svg' ?>" />
								</div>
							</div>
						</div>
					</div>
          <ul class="articles-container">
            <?php
              $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'category_name' => 'casino',
								'posts_per_page' => 5,
								'category__not_in' => '3', 
								'orderby' => 'date',
								'orderby' => 'DEC',
								'tax_query' => array(
									array(
											'taxonomy' => 'category',
											'field' => 'term_id',
											'terms' => array(3),
											'include_children' => true,
									),
							)
              );
              $casino_posts = new WP_Query( $args );

              if ( $casino_posts->have_posts() ) :

                while ( $casino_posts->have_posts() ) :
                  $casino_posts->the_post();
            ?>
                
            <?php get_template_part( 'template-parts/content', 'articles' ); ?>

            <?php endwhile; ?>
					</ul>
					<?php wp_reset_postdata(); ?>
          <?php endif; ?>
        </section> <!-- End of CATEGORY CASINO -->

        <!-- CATEGORY HORSES -->
        <section class="front-page__articles x-container">
					<div class="header">
						<div class="header__wrapper-outer">
							<h2 class="header__tag">Horses</h2>
							<div class="header__wrapper-inner">
								<img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/icon-tag-right.svg' ?>">
								<div class="header__icon">
									<img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/horses.svg' ?>" />
								</div>
							</div>
						</div>
					</div>
          <ul class="articles-container">
            <?php
              $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
								'posts_per_page' => 5,
								'category__not_in' => '5', 
								'orderby' => 'date',
								'orderby' => 'DEC',
								'tax_query' => array(
									array(
											'taxonomy' => 'category',
											'field' => 'term_id',
											'terms' => array(5),
											'include_children' => true,
									),
							)
              );
              $horses_posts = new WP_Query( $args );

              if ( $horses_posts->have_posts() ) :

              while ( $horses_posts->have_posts() ) :
                $horses_posts->the_post();
            ?>
                
            <?php get_template_part( 'template-parts/content', 'articles' ); ?>

            <?php endwhile; ?>
						</ul>
						<?php wp_reset_postdata(); ?>
              <?php endif; ?>
        </section> <!-- End of CATEGORY HORSES -->

        <!-- PROMOTIONS SECTION -->
    <section class="promotions">
			<?php get_template_part('template-parts/content', 'promotions'); ?>
		</section>
		
				<!--  FRONT-PAGE CONTENT SECTION -->
				<section class="entry-content">
					<div class="entry-content__area"><?php the_content(); ?></div>
						<?php get_sidebar(); ?>
				</section><!-- .entry-content -->
        
      </div> <!-- front-page-wrapper -->
    </main>
  </div>

  <?php get_footer(); ?>