<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bet_Online
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

  <h3 class="nav-hierarchy"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> > 
  <span>
  <?php  $taxonomy = 'category'; 
  // ID Gets which assign post 
  $post_terms = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );
   
  // Links seprator.
  $separator_link = ' > ';
   
  if ( ! empty( $post_terms ) && ! is_wp_error( $post_terms ) ) {
   
      $term_ids = implode( ',' , $post_terms );
   
      $terms = wp_list_categories( array(
          'title_li' => '',
          'style'    => 'none',
          'echo'     => false,
          'taxonomy' => $taxonomy,
          'include'  => $term_ids
      ) );
   
      $terms = rtrim( trim( str_replace( '<br />',  $separator_link, $terms ) ), $separator_link );
   
      // show category post.
      echo  $terms;
  }  ?>
  		endif;
</span>

      <!-- <span><?php get_category_parents( $cat, true, ' &raquo; ' ); ?></span>
      <span><?php get_the_category('id'); ?></span> -->
      <span> > <?php the_title(); ?></span>
      
</h3>

		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
      ?>
<!-- Author and Date of the Article -->
			<div class="entry-meta">

				<span class="article__author-avatar"><?php echo get_avatar( get_the_author_meta('user_email'), $size = '50'); ?></span>
				<span class="article__author-name">By <?php echo get_the_author_meta('display_name') ?></span>
				<span id='article__date' class='article__date'> - <?php echo get_the_date(); ?></span>

			</div><!-- .entry-meta -->
    <?php endif; ?>
	</header><!-- .entry-header -->

	<?php bet_online_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'bet_online' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bet_online' ),
			'after'  => '</div>',
		) );
		?>
  </div><!-- .entry-content -->
  


	<footer class="entry-footer">

		<span class="article__author-avatar"><?php echo get_avatar( get_the_author_meta('user_email'), $size = '50'); ?></span>
		<span class="article__author-name">By <?php echo get_the_author_meta('display_name') ?></span>
    <span id='article__date' class='article__date'> - <?php echo get_the_date(); ?></span>
    
  </footer><!-- .entry-footer -->
  
  <div>

  <section>
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
    </div><!-- feature-image -->
    <?php the_title(); ?>
  </a>

  <?php endforeach; ?>

  </section>

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
  </div>
  </section>
</article><!-- #post-<?php the_ID(); ?> -->
