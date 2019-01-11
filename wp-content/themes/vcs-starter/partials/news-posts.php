<section id="news" class="inbetween-news">
	<div class="news-post-container flex-container">
			<?php
			$query = [
				'cat' => get_field('news_category'),
				'posts_per_page' => get_field('limit')
			];

			$result = new WP_Query($query);

			// dump($result);
			if ( $result->have_posts() ):
				while ( $result->have_posts() ):
					$result->the_post();
					?>
					<div class="flex-container news-posts" style="background-image: url(<?php the_post_thumbnail_url('medium'); ?>);">
						<div class="image-gradient"></div>
						<div class="flex-container column news-post">
							<h5><?php the_title(); ?></h5>
							<div>
								<?php 
							$content = get_the_content();
							echo mb_strimwidth($content, 0, 180, '...');
							?>
							</div>
							<span><a href="<?php the_permalink(); ?>"><?php _e('Learn More', 'vcs-starter'); ?></a></span>
						</div>
					</div>
					<?php
				endwhile; // end while
			endif; // end if
			wp_reset_postdata();
			?>
	</div>
</section>