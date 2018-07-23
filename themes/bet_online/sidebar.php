<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bet_Online
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<div class="header sidebar-header">
		<div class="header__wrapper-outer">
			<h2 class="header__tag">Trending</h2>
			<div class="header__wrapper-inner">
				<img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/icon-tag-right.svg' ?>">
				<div class="header__icon">
					<img class="svg" src="<?php echo get_template_directory_uri() . '/assets/img/new/icon-trending.svg' ?>" />
				</div>
			</div>
		</div>
	</div>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
