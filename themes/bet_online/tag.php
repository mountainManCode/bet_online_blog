<?php
/**
 * The template for displaying Tag Archives
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bet_Online
 */

get_header();
?>

<div id="primary" class="content-area">
  <main id="main" class="site-main">
    <div class="archive__articles-wrapper">

		<h4 class="nav-hierarchy"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> > 
				<span>
					<a href="<?php echo esc_url( home_url( '/articles' ) ); ?>"> Articles ></a>
        </span>
        <span><?php the_archive_title(); ?></span>
      </h4>

      <?php wp_reset_postdata(); ?>
      <?php
                  
        $idObj = get_queried_object()->slug;

        $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;

        $args_latest = array(
          'post_type' => array('post', 'videos'),
          'posts_per_page' => 8,
          'tag_name' => $idObj,
          'ignore_sticky_posts' => false,
          'post_status' => 'publish',
          'orderby' => 'date', 
          'order' => 'DEC',
          'paging' => 1,
        );
      ?>

      <ul class="articles-list videos-list">

      <?php
      $latest_articles = new WP_Query( $args_latest );
        if ( $latest_articles->have_posts() ) :
      ?>

          <?php
            while ( $latest_articles->have_posts() ) :
            $latest_articles->the_post();	
          ?>
          <?php if(get_post_type() === 'post') : ?>
            <?php get_template_part( 'template-parts/content', 'articles' ); ?>
          <?php elseif(get_post_type() === 'videos') :?>
            <?php get_template_part( 'template-parts/content', 'fold-videos' ); ?>
          <?php endif; ?>
          <?php endwhile; ?>
        </ul>

        <?php wp_reset_postdata(); ?>
      <?php endif; ?>
          
    </div> <!-- archive-page-wrapper -->
  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();