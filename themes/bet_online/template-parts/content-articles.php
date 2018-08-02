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
      <article id="article-wrapper" class="article-wrapper" style="background-image: url('<?php echo $article_hero[0]; ?>')">

        <section id='article__meta' class='article__meta'>
          <div class="article__top-content">

            <object>
              <span id='article__category' class='article__category'>

                <a href="
                  <?php echo home_url(); ?>/articles/<?php
                    $category = get_the_category(); 
                    $category_parent_id = $category[0]->category_parent;
                    if ( $category_parent_id != 0 ) {
                      $category_parent = get_term( $category_parent_id, 'category' );
                      $css_slug = $category_parent->slug;
                      echo $css_slug;
                    } else {
                      return '';
                    }
                  ?>/<?php $category = get_the_category();
                    $cat_slug = $category[0]->slug;
                    echo $cat_slug;
                  ?>"
                >
                  <?php $category = get_the_category();
                    $cat_name = $category[0]->name;
                    echo $cat_name;
                  ?>
                </a>

              </span>
            </object>
            <span id='article__date' class='article__date'><?php echo get_the_date(); ?></span>

          </div>
    
          <h2 id='article__title' class='article__title'>
            <?php the_title();?>
          </h2>

        </section>
      </article>
    </a>
  </li>

    
<?php endif; ?>

