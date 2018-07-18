<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Bet_Online
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'single-article' );

		endwhile; // End of the loop.
		?>

	<section class='betting-101'>
		<?php get_template_part('template-parts/content', 'betting-101'); ?>
	</section>

	<section class='promotions'>
		<?php get_template_part('template-parts/content', 'promotions'); ?>
	</section>

	<section class='related-articles'>
		<?php get_template_part('template-parts/content', 'articles-related'); ?>
	</section>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
