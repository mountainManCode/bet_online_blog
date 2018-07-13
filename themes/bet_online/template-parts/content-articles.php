<?php
/**
 * Template part for displaying Articles posts.
 *
 * @package Bet_Online
 */

?>

<?php 
  if ( $article_hero = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium-large',  array(
    'alt' => the_title_attribute( array(
      'echo' => false,
    ) ),
  )  ) ) :
?>
<!-- <article id="post-<?php the_ID(); ?>" class="article-wrapper"> -->

  <li class="article-wrapper" style="background-image: url('<?php echo $article_hero[0]; ?>')">
  <a href="<?php echo get_permalink();?>"	class="article-link">
    <div class="article__posted-date">
      <?php bet_online_posted_on(); ?>
    </div>
    <div class='article__excerpt'>
      <?php the_title();?>
    </div>
  </a>
  </li>
      <!-- </article> <!-- #post-<?php the_ID(); ?> -->

    
<?php endif; ?>
	<!-- <footer class="entry-footer">
		<?php bet_online_entry_footer(); ?>
	</footer>entry-footer -->
