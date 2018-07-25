<ul id="events-wrapper" class="events-wrapper">
  <?php
    $args = array( 'post_type'=>'events_post_type', 'post_status'=>'future', 'orderBy'=>'post_date', 'order'=>'ASC', 'posts_per_page'=> 8);
    
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
      <div id="event" class="event" style="background-image: url('<?php echo $event_hero[0]; ?>')">

        <section id='event__meta' class='event__meta'>
          
          <div id='event__title' class='event__title'>
            <?php the_title();?>
          </div>
          
          <div class="event__date">
            <div class="event__date-main">
              <?php echo get_the_time('j') ?>
            </div>
        
            <div class="event__date-secondary">
              <div>
                <span class="event__date-time"><?php echo get_the_time('l, g:i a') ?></span>
              </div>
              <div>
                <span class="event__date-month-year"><?php echo get_the_time('F / Y') ?></span>
              </div>
            </div>
          </div>

          <a href="<?php echo get_permalink();?>"><button class="event__button">View Event</button></a>
          
        </section>
      </div>
    </li>
  <?php endif; ?>
  <?php endwhile; ?>
  <?php endif; ?>
  <?php wp_reset_postdata(); ?>
</ul>