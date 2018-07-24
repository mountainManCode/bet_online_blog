<ul id="events-wrapper" class="events-wrapper">
  <?php
    $args = array( 'post_type'=>'events_post_type', 'post_status'=>'future', 'orderBy'=>'post_date', 'order'=>'ASC', 'posts_per_page'=> 8);
    // $posts = get_posts( $args ); // returns an array of posts
    $event_posts = new WP_Query( $args );
    
    if ( $event_posts->have_posts() ) : 
      while ( $event_posts->have_posts() ) : 
      $event_posts->the_post();
  ?>

    <?php 
      if ( $event_hero = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium',  array(
        'alt' => the_title_attribute( array(
          'echo' => false,
        ) ),
      )  ) ) :
    ?>
  <li class="event-list">
    <!-- <a href="<?php echo get_permalink();?>"	class="article-link"> -->
      <div id="event" class="event" style="background-image: url('<?php echo $event_hero[0]; ?>')">

        <section id='event__meta' class='event__meta'>
          
          <!-- <div id='event__title' class='event__title'>
            <?php the_title();?>
          </div> -->

        </section>
      </div>
    <!-- </a> -->
    </li>
  <?php endif; ?>
  <?php endwhile; ?>
  <?php endif; ?>
  <?php wp_reset_postdata(); ?>
</ul>