<h2 class="articles__header">Related Articles</h2>
<ul class="articles-container">
  <?php

    $getcategories = get_the_category();
    foreach( $getcategories as $category ) {
      $sub_category = $category;
    }

    if( isset( $sub_category ) ) :
    
    $args = array(
      'cat' => $sub_category->term_id,
      'post__not_in' => array( get_the_ID() ),
      'posts_per_page' => 3,
 );

  $relatedpostsinsubcategory = new WP_Query( $args );

    if( $relatedpostsinsubcategory->have_posts() ) : while( $relatedpostsinsubcategory->have_posts() ) : $relatedpostsinsubcategory->the_post();

  if ( $article_hero = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium',  array(
    'alt' => the_title_attribute( array(
      'echo' => false,
    ) ),
  )  ) ) :
?>
    <li class="article-list">
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <div class="article__image" style="background-image: url('<?php echo $article_hero[0]; ?>')">
          <!-- <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'medium' ); ?>
          <?php endif; ?> -->
        </div><!-- feature-image -->
        <div class="article__meta">
        <div class="article__meta-top-content">

            <object>
              <span id='article__meta-category' class='article__meta-category'>
                <?php echo get_the_category_list(', '); ?>
                <!-- <?php wp_list_categories( array('child_of' => 0 ) ) ?> -->
                <!-- <?php $category = get_the_category(); 
$parent = get_category($category[1]->category_parent);
echo $parent->slug; ?> -->
              </span>
            </object>
            <span id='article__meta-date' class='article__meta-date'><?php echo get_the_date(); ?></span>

          </div>
          <h2 class="article__meta-title">
            <?php the_title(); ?>
          </h2>
        </div>
      </a>
    </li>
    <?php endif; ?>
    <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>

  <?php else : ?>
  
    <?php get_template_part( 'template-parts/content', 'none' ); ?>
  <?php endif; ?>
  <?php wp_reset_query(); ?>
<?php endif; ?>

</ul>