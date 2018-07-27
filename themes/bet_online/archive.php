<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bet_Online
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<div class="archive-wrapper">
		<header class="page-header">
			<h1 class="archive__title">
				<?php echo get_the_archive_title(); ?>
			</h1>
		</header><!-- .page-header -->


<!-- LATEST ARTICLES -->
			<section class="front-page__articles x-container">
				<div class='header'>
					<div class="header__wrapper-outer">
						<h2 class="header__tag">Latest Articles</h2>
						<div class="header__wrapper-inner">
							<img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/icon-tag-right.svg' ?>">
							<div class="header__icon">
								<img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/icon-latest-articles.svg' ?>" />
							</div>
						</div>
					</div>
				</div>
				<ul class="articles-container-5 articles-container">
				
				<!-- Filter Parent Categories - Casino, E-Sports, Horses, Poker, Sports -->
				<?php if (is_category(array('casino', 'e-sports', 'horses', 'poker', 'sports'))) : ?>

					<?php
						$idObj = get_queried_object()->term_id;
						
						$args = array(
							'post_type' => 'post',
							'posts_per_page' => 5,
							'post_status' => 'publish',
							'category__not_in' => $idObj,
							// 'post__not_in' => $idObj,
							'orderby' => 'date',
							'orderby' => 'DEC',
							'tax_query' => array(
								array(
										'taxonomy' => 'category',
										'field' => 'term_id',
										'terms' => array($idObj),
										'include_children' => true,
								),
						)
						);
						$latest_posts = new WP_Query( $args );
 					?>
					
					<?php
						if ( $latest_posts->have_posts() ) :

						while ( $latest_posts->have_posts() ) :
							$latest_posts->the_post();
					?>
								
					<?php get_template_part( 'template-parts/content', 'articles' ); ?>

					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				</ul>
					<?php endif; ?>

							<!-- Filter Children Categories - eg. NFL, NBA, Slots, Thoroughbred... -->
				<?php else: ?>

					<?php
					$idObj = get_queried_object()->term_id;
						
						$args = array(
							'post_type' => 'post',
							'posts_per_page' => 5,
							'post_status' => 'publish',
							// 'category__not_in' => $idObj,
							// 'post__not_in' => $idObj,
							'orderby' => 'date',
							'orderby' => 'DEC',
							'tax_query' => array(
								array(
										'taxonomy' => 'category',
										'field' => 'term_id',
										'terms' => array($idObj),
										'include_children' => true,
								),
						)
						);
						$latest_posts = new WP_Query( $args );
						?>

						<?php
							if ( $latest_posts->have_posts() ) :

							while ( $latest_posts->have_posts() ) :
								$latest_posts->the_post();
						?>
								
						<?php get_template_part( 'template-parts/content', 'articles' ); ?>

					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				</ul>
					<?php endif; ?>
				<?php endif; ?>
				</section> <!-- End of LATEST ARTCILES -->
				
				<!-- VIDEOS -->
				<section class="front-page__videos">
				<div id="videos-container" class="videos-container">
					<div class="header">
						<div class="header__wrapper-outer">
							<h2 class="header__tag">Videos</h2>
							<div class="header__wrapper-inner">
								<img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/icon-tag-right.svg' ?>">
								<div class="header__icon">
									<img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/sports.svg' ?>" />
								</div>
							</div>
						</div>
					</div>
					<ul id="videos-list" class="videos-list">
						<?php
							$args = array( 'post_type'=>'videos_post_type',
							'posts_per_page'=> 8,
							'orderby' => 'date',
							'orderby' => 'DEC',
							'tax_query' => array(
								array(
										'taxonomy' => 'category',
										'field' => 'term_id',
										'terms' => array($idObj),
										'include_children' => true,
								),
						)
						);
							
							$posts = get_posts( $args );
						?>

						<?php foreach ( $posts as $post ) : setup_postdata( $post ); ?>

						<?php get_template_part( 'template-parts/content', 'fold-videos' ); ?>

						<?php endforeach; wp_reset_postdata(); ?>
					</ul>		
				</div>
			</section>
				<!-- END OF VIDEOS -->
			
			<!-- UPCOMING EVENTS -->
			<section class="front-page__events">
				<div id="events-container" class="events-container">
					<div class="header">
						<div class="header__wrapper-outer">
							<h2 class="header__tag">Upcoming Events</h2>
							<div class="header__wrapper-inner">
								<img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/icon-tag-right.svg' ?>">
							<div class="header__icon">
								<img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/sports.svg' ?>" />
							</div>
						</div>
					</div>
					</div>
					<ul id="events-wrapper" class="events-wrapper">
						<?php
							$idObj = get_queried_object()->term_id;						

							$args = array(
								'post_type'=>'events_post_type',
								'tax_query' => array(
									array(
											'taxonomy' => 'category',
											'field' => 'term_id',
											'terms' => array($idObj),
											'include_children' => true,
									),
								),
								'post_status'=>'future',
								'orderBy'=>'post_date',
								'order'=>'ASC',
								'posts_per_page'=> 8, 
							);
							
							$event_posts = new WP_Query( $args );
							
							if ( $event_posts->have_posts() ) : 
								while ( $event_posts->have_posts() ) : 
								$event_posts->the_post();
						?>

						<?php get_template_part( 'template-parts/content', 'events' ); ?>
								<?php endwhile; ?>
							<?php endif; ?>
						<?php wp_reset_postdata(); ?>
					</ul>
				</div>
			</section>

				<!--  ARCHIVE/CHANNEL CONTENT SECTION -->
				<section class="entry-content">
					<div class="entry-content__area"><?php the_content(); ?></div>
						<?php get_sidebar(); ?>
				</section><!-- .entry-content -->

      </div> <!-- front-page-wrapper -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
