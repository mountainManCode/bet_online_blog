<?php
/**
 * The template for displaying Bet_Online Video Archive.
 *
 * @package Bet_Online
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<div class="archive-videos__wrapper">

		<h4 class="nav-hierarchy"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> > 
				<span>
					<?php 
					
						// $obj = get_post_type_object('videos');
						// echo $obj->labels->label; 

						$postType = get_queried_object();
						echo esc_html($postType->labels->name);
						// d($postType);
					?>

				</span>
						<!-- <span> > </span> -->
						
			</h4>

			<ul class="videos-list">
				<?php
					$args = array( 'post_type'=>'videos', 'posts_per_page'=> 8);
					
					$posts = get_posts( $args );
				?>

				<?php foreach ( $posts as $post ) : setup_postdata( $post ); ?>

			<?php get_template_part( 'template-parts/content', 'archive-videos' ); ?>

				<?php endforeach; wp_reset_postdata(); ?>
			</ul>	

    </div> <!-- archive-page-wrapper -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
