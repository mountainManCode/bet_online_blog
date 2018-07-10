<?php
/**
 * Template part for displaying Latest Articles posts.
 *
 * @package Bet_Online
 */

?>

<!-- <section class="latest-articles"> -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php 
  if ( $article_hero = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium-large' ) ) :
?>
<a href="<?php echo get_permalink();?>"	class="article-wrapper">

<li class="article-hero" style="background-image: url('<?php echo $article_hero[0]; ?>')">

<?php bet_online_posted_on(); ?>

            <?php the_excerpt();?>
            </li>
            </a>

          
<?php endif; ?>
	<!-- <footer class="entry-footer">
		<?php bet_online_entry_footer(); ?>
	</footer>entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
<!-- </section> -->