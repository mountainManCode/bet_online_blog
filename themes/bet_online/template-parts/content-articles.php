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

  <li class="article-list">
    <a href="<?php echo get_permalink();?>"	class="article-link">
      <article id="post-<?php the_ID(); ?>" class="article-wrapper" style="background-image: url('<?php echo $article_hero[0]; ?>')">

        <section id='article__content' class='article__content'>
          <div class="article__top-content">

            <object>
              <span id='article__category' class='article__category'><?php echo get_the_category_list(', '); ?></span>
            </object>
            <span id='article__date' class='article__date'><?php echo get_the_date(); ?></span>

          </div>
    
          <div id='article__title' class='article__title'>
            <?php the_title();?>
          </div>

        </section>
      </article>
    </a>
  </li>

    
<?php endif; ?>

