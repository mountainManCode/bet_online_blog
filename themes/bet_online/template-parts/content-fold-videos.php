<ul id="videos-list" class="videos-list">
  <?php
    $args = array( 'post_type'=>'videos_post_type', 'posts_per_page'=> 8);
    
    $posts = get_posts( $args );
  ?>

  <?php foreach ( $posts as $post ) : setup_postdata( $post ); ?>

	<?php 
    if ( $video_hero = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium',  array(
        'alt' => the_title_attribute( array(
          'echo' => false, ) ),
        ) ) ) :
	?>

  <li class="video-wrapper">
    <a href="<?php echo CFS()->get('video_link');?>" class="video-link">
          
      <div id="video-hero" class="video-hero" style="background-image: url('<?php echo $video_hero[0]; ?>')">
      <section id='video__meta' class='video__meta'>
        <div class="video__top-content">
          <?php echo CFS()->get('time'); ?>
        </div>
          <div class="video__bottom-content bottom-content">
            <div class="video__cat-date">

              <span id="video__category" class="video__category">
                <object id="x-category">
                  <?php echo the_category(); ?>
                </object>
              </span>

              <span id="video__date" class="video__date date">
                <?php echo get_the_date(); ?>
              </span>
            </div>

            <h2 id="video__title" class="video__title title">
              <?php the_title();?>
            </h2>
          
          </div>
        </section>
      </div>
    </a>
  </li>

  <?php endif; ?>
  <?php endforeach; wp_reset_postdata(); ?>
</ul>
