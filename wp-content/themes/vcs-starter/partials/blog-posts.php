<section id="blog-posts">
	<div class="blog-posts-container container">
		<div class="blog-posts flex-container">
						<?php
						$query = [
							'cat' => get_field('blog_category'),
							'posts_per_page' => get_field('blog_limit')
						];

						$result = new WP_Query($query);


						// dump($result);
						if ( $result->have_posts() ):
							while ( $result->have_posts() ):
								$result->the_post();
								?>
								<div class="blog-post flex-container column">
									<div class="blog-post-featuredimg" style="background-image: linear-gradient(to bottom, rgba(255,255,255,0.3) 0%,rgba(255,255,255,0.3) 100%), url(<?php the_post_thumbnail_url('medium-large'); ?>);"></div>
									<div class="profile-thumbnail">
										<a href=<?php echo get_author_posts_url($post->post_author); ?>><?php echo get_avatar( get_the_author_meta( $post->post_author ), 65 ); ?>
										</a>
									</div>
									<h4 class="blog-post-title"><?php the_title(); ?></h4>
									<div class="blog-post-info flex-container">
										<div class="blog-post-author">By <a href=<?php echo get_author_posts_url($post->post_author); ?>><?php echo get_the_author_meta('display_name', $author_id); ?></a></div>
										<div class="blog-post-date">&nbsp;. <?php echo get_the_date('n/j/Y'); ?></div>
										<div class="blog-post-location">&nbsp;. in <span><?php echo get_the_category_list(', '); ?></span></div>
									</div>
									<div class="blog-post-description"><?php 
							$content = get_the_content();
							echo mb_strimwidth($content, 0, 180, '...');
							?></div>
									<a class="blog-post-readmore" href="<?php the_permalink(); ?>"><?php _e('Learn More', 'vcs-starter'); ?></a>
								</div>

								<?php
				endwhile; // end while
			endif; // end if
			wp_reset_postdata();
			?>
		</div>
	</div>
</section>