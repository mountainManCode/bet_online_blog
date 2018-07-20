<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bet_Online
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<section class="entry-content-container">
	<div class="entry-content__area">

<header class="entry-header">
  <h4 class="nav-hierarchy"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> > 
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
					'hide_empty' => false,
          'taxonomy' => $taxonomy,
          'include'  => $term_ids
      ) );
	 
      $terms = rtrim( trim( str_replace( '<br />',  $separator_link, $terms ) ), $separator_link );
   
      // show category post.
			echo  $terms;
  }  ?>
			endif;
			<!-- d($taxonomy); -->
</span>

      <!-- <span><?php get_category_parents( $cat, true, ' &raquo; ' ); ?></span> -->
			<!-- <span><?php get_the_category('id'); ?></span> -->
      <span> > <?php the_title('<span class="nav-current-article">', '</span>'); ?></span>
      
</h4>

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
				<span>By </span>
				<span class="article__author-name"><?php echo get_the_author_meta('display_name') ?></span>
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
				<span> By </span>
				<span class="article__author-name"><?php echo get_the_author_meta('display_name') ?></span>
				<span id='article__date' class='article__date'> - <?php echo get_the_date(); ?></span>
			</footer><!-- .entry-footer -->
			
		</div>
		<?php get_sidebar(); ?>
	</section> <!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
