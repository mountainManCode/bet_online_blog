<?php
/**
 * Template part for displaying Slick Hero Carousel.
 *
 * @package Bet_Online
 */
?>

<?php 
  $args = array(
    'posts_per_page' => 4,
    'post__in'  => get_option( 'sticky_posts' ),
    'ignore_sticky_posts' => 1
  );
  $carousel = new WP_Query( $args );
?>

<!-- Custom Query Loop -->
<?php if ( $carousel -> have_posts() ) : ?>
  <?php while ( $carousel -> have_posts() ) : $carousel -> the_post(); ?>

    <?php 
      if ( $article_hero = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large',  array(
        'alt' => the_title_attribute( array(
          'echo' => false,
        ) ),
      )  ) ) :
    ?>

      <li class="carousel-article">
        <article id="article__hero-wrapper" class="article__hero-wrapper" style="background-image: url('<?php echo $article_hero[0]; ?>')">
          
          <section id='article__content' class='article__content'>
              <div class="article__top-content">
    
                <object>
                  <span id='article__category' class='article__category'><?php echo get_the_category_list(', '); ?></span>
                </object>
                <span id='article__date' class='article__date'><?php echo get_the_date(); ?></span>
    
              </div>

              <a href="<?php echo get_permalink();?>"	class="article-link">
                <div id='article__title' class='article__title'>
                  <?php the_title();?>
                </div>
                <div id='article__excerpt' class='article__excerpt'>
                  <?php echo get_the_excerpt();?>
                </div>
              </a>

            </section>
          </article>
      </li>

    <?php endif; ?>
  <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>
  </ul>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

<?php endif; ?>
