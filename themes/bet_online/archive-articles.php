<?php
/**
 * The template for displaying Articles Archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
		<?php $args = array(
			'post_type' => 'post',
			'orderby' => 'ID',
			'post_status' => 'publish',
			'order' => 'DESC',
			'posts_per_page' => 9,
			'paged' => 1,
			);
		?>
					<ul class="articles-list">
		<?php
		$archive_articles = new WP_Query( $args );

		// kint debugger
		d($archive_articles);

			if ( $archive_articles->have_posts() ) :
		?>

				<?php
					while ( $archive_articles->have_posts() ) :
					$archive_articles->the_post();	
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