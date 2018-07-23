<section>
  <h2>Related Articles</h2>

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
  ?>
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
      <div class="related-articles__image">
        <?php if ( has_post_thumbnail() ) : ?>
          <?php the_post_thumbnail( 'medium' ); ?>
        <?php endif; ?>
      </div><!-- feature-image -->
      <?php the_title(); ?>
    </a>

    <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>

  <?php else : ?>
  
    <?php get_template_part( 'template-parts/content', 'none' ); ?>
  <?php endif; ?>
  <?php wp_reset_query(); ?>
<?php endif; ?>

</section>