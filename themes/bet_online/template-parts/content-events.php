
    <?php 
      if ( $event_hero = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium',  array(
        'alt' => the_title_attribute( array(
          'echo' => false,
        ) ),
      )  ) ) :
    ?>
  <li class="event-list">
    <a href="<?php echo get_permalink();?>" class="event-link">
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

          <button class="event__button">View Event</button>
          
        </section>
      </div>
      </a>
    </li>
  <?php endif; ?>
