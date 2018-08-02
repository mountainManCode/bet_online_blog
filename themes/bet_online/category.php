<?php
/**
 * The template for displaying category pages
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
      <?php 
        if (get_queried_object()->category_parent != 0) : ?>
        
        <span>
          <a 
            <?php 
              $category = get_the_category(); 
              $category_parent_id = $category[0]->category_parent;
              if ( $category_parent_id != 0 ) {
                $category_parent = get_term( $category_parent_id, 'category' );
                $css_name = $category_parent->name;
                $css_slug = $category_parent->slug;
        
              } 
            ?>
            href="<?php echo esc_url( home_url( '/articles' ) ); ?>/<?php echo $css_slug ?>">
            
              <?php echo $css_name; ?>
          </a>
           > 
        </span>
        <?php endif; ?>
        <span><?php the_archive_title(); ?></span>
      </h4>

      <?php wp_reset_postdata(); ?>
      <?php
                  
        $idObj = get_queried_object()->slug;
        // d($idObj);
        $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;

        $args_latest = array(
          'post_type' => 'post',
          'posts_per_page' => 8,
          'category_name' => $idObj,
          'ignore_sticky_posts' => false,
          'post_status' => 'publish',
          'orderby' => 'date', 
          'order' => 'DEC',
          'paging' => 1,
        );
      ?>

      <ul class="articles-list">

        <?php
          $latest_articles = new WP_Query( $args_latest );

          if ( $latest_articles->have_posts() ) :
        ?>

        <?php
          while ( $latest_articles->have_posts() ) :
          $latest_articles->the_post();	
        ?>            
        <?php get_template_part( 'template-parts/content', 'articles' ); ?>

        <?php endwhile; ?>

      </ul>

      <?php wp_reset_postdata(); ?>
      <?php endif; ?>
          
    </div> <!-- archive-page-wrapper -->
  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();