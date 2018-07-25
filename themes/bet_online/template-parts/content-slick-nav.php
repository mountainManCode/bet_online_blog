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
      if ( $article_hero = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium',  array(
        'alt' => the_title_attribute( array(
          'echo' => false,
        ) ),
      )  ) ) :
    ?>

      <li id="carousel-article" class="carousel-article">
        <article id="article-wrapper" class="article-wrapper">
          <section id='article__meta' class='article__meta'>
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

            <?php if ( has_post_thumbnail() ) : ?>
              <?php the_post_thumbnail( 'medium' ); ?>
            <?php endif; ?>

          </article>
      </li>

    <?php endif; ?>
  <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>
        </ul>
	<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>
<?php endif; ?>
    <!-- </ul> -->
    <!-- </div> -->