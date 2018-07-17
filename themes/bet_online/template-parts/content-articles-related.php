<!-- <section>
<?php
// if ( have_posts() ) : while ( have_posts() ) : the_post();
  $category = get_the_category(); 
$category_parent_id = $category[0]->category_parent;
if ( $category_parent_id != 0 ) {
    $category_parent = get_term( $category_parent_id, 'category' );
    $css_slug = $category_parent->slug;
} else {
    $css_slug = $category[0]->slug;
}
			foreach ( $css_slug as $post ) : setup_postdata( $post ); ?>
?>
  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
    <div class="related-articles__image">
      <?php if ( has_post_thumbnail() ) : ?>
        <?php the_post_thumbnail( 'medium' ); ?>
      <?php endif; ?>
    </div>
    <?php the_title(); ?>
  </a>

  <?php endforeach; ?>

  </section> -->

  <section>
<h2>Related Articles</h2>

  <?php

    $getcategories = get_the_category();
    foreach( $getcategories as $category ){
    $sub_category = $category;}

    if( isset( $sub_category ) ){ 
    // echo '<h2>Related Articles</h2>' . $sub_category->name;
    
    $args = array(
      'cat' => $sub_category->term_id,
      'post__not_in' => array( get_the_ID() )
 );
  $relatedpostsinsubcategory = new WP_Query( $args );
    if( $relatedpostsinsubcategory->have_posts() ){
    while( $relatedpostsinsubcategory->have_posts() ){
    $relatedpostsinsubcategory->the_post();
?>
  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
    <div class="related-articles__image">
      <?php if ( has_post_thumbnail() ) : ?>
        <?php the_post_thumbnail( 'medium' ); ?>
      <?php endif; ?>
    </div><!-- feature-image -->
    <?php the_title(); ?>
  </a>
  <?php
      }
    wp_reset_postdata();
    }
  }
  ?>

  </section>