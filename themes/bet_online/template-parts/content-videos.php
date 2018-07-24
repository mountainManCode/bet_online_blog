<ul class="videos-container">
				<?php
					$args = array( 'post_type'=>'videos_post_type', 'posts_per_page'=> 8);
					$posts = get_posts( $args ); // returns an array of posts

				?>


					<?php foreach ( $posts as $post ) : setup_postdata( $post ); 
										d($post); ?>

					<!-- <?php 
						if ( $videos_hero = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium-large' ) ) : 
					?> -->

					<li class="adventure-hero">
						<h2>class="adventure-title">
						<?php the_title();?></a></h2>
						<div><?php echo the_content(); ?></div>
					</li>

					<?php endif; ?>
					<?php endforeach; wp_reset_postdata(); ?>
				</ul>
