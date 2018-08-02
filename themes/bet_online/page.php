<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
		<?php echo get_the_title(); ?>
	</h1>
</header><!-- .page-header -->

<!-- LATEST ARTICLES -->
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
	<div class="header__view-more">
		<a href="<?php echo home_url() ?>/articles/<?php echo get_queried_object()->post_name; ?>">View More <span> > </span></a>
	</div>
</div>
	<?php wp_reset_postdata(); ?>
	<?php
					$idObj = get_queried_object()->post_name;

						$args = array(
							'post_type' => 'post',
							'posts_per_page' => 5,
							'post_status' => 'publish',
							'category_name' => $idObj,
							'orderby' => 'date',
							'orderby' => 'DEC',
						);
						$latest_posts = new WP_Query( $args );
						?>
					<ul class="articles-container articles-container-5">
						<?php
							if ( $latest_posts->have_posts() ) :

							while ( $latest_posts->have_posts() ) :
								$latest_posts->the_post();
						?>       
		<?php get_template_part( 'template-parts/content', 'articles' ); ?>
			
	<?php endwhile; ?>
		</ul>	

	<?php wp_reset_postdata(); ?>
<?php endif; ?>
</section> <!-- End of LATEST ARTICLES -->
		
		<!-- VIDEOS -->
		<section class="archive-page__videos">
		<div class="videos__top-border-gradient"></div>
		<div id="videos-container" class="videos-container">
			<div class="header">
				<div class="header__wrapper-outer">
					<h2 class="header__tag">Videos</h2>
					<div class="header__wrapper-inner">
						<img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/icon-tag-right.svg' ?>">
						<div class="header__icon">
							<img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/icon-video.svg' ?>" />
						</div>
					</div>
				</div>
			</div>
			<ul id="videos-list" class="videos-list">
				<?php
					$idObj = get_queried_object()->post_name;

					$args = array( 'post_type'=>'videos',
					'posts_per_page'=> 8,
					'orderby' => 'date',
					'orderby' => 'DEC',
					'category_name' => $idObj,
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

		 <!-- Betting 101 SECTION -->
	<section class="betting-101">
		<?php get_template_part('template-parts/content', 'betting-101'); ?>
	</section>
	
	<!-- UPCOMING EVENTS -->
	<section class="front-page__events">
		<div id="events-container" class="events-container">
			<div class="header">
				<div class="header__wrapper-outer">
					<h2 class="header__tag">Upcoming Events</h2>
					<div class="header__wrapper-inner">
						<img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/icon-tag-right.svg' ?>">
					<div class="header__icon">
						<img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/icon-upcoming-events.svg' ?>" />
					</div>
				</div>
			</div>
			</div>
			<ul id="events-wrapper" class="events-wrapper">
				<?php
					$idObj = get_queried_object()->post_name;

					$args = array(
						'post_type'=>'events_post_type',
						'category_name' => $idObj,
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

	</div> <!-- archive-page-wrapper -->
</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
