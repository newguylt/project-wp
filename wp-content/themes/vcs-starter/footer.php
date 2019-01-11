
		<footer id="footer">
			<div class="footer-container container">
				<div class="footer-content flex-container">
					<div class="footer-socials flex-container column">
						<h5><?php the_field('footer_headline', 'option'); ?></h5>
						<p><?php the_field('footer_description', 'option'); ?></p>
						<a class="footer-socials-readmore" href="#"><?php _e('Read more', 'vcs-starter'); ?> <i class="fas fa-angle-double-right"></i></a>
						<nav class="footer-social-icons">
							<ul class="flex-container">
								<?php
								// patikriname ar repeater saugo duomenis
								if( have_rows('footer_social_icons_repeater', 'option') ):
								    while ( have_rows('footer_social_icons_repeater', 'option') ) : the_row();
								        ?>
								        <li><a href="<?php the_sub_field('link'); ?>" target="_blank"><?php the_sub_field('icon'); ?></a></li>
								        <?php
								    endwhile;
								endif;
								?>
							</ul>
						</nav>
					</div>
					<div class="footer-tag-mailing flex-container column">
						<h5><?php _e('Popular Tags', 'vcs-starter'); ?></h5>
						<div class="footer-tags flex-container">
							<?php
							$args = [
									'hide_empty' => false
								];
							$tags = get_tags( $args );
							foreach ($tags as $tag):
								// dump(get_tag_link($tag->term_id));
							?>

								<a href="<?php echo get_tag_link($tag->term_id) ?>" class="footer-tag btn"><?php echo $tag->name; ?></a>
							<?php 
							endforeach;
							?>
						</div>
						<h5 class="footer-mailing-list-title"><?php _e('Join Our Mailing List', 'vcs-starter'); ?></h5>
						<p class="footer-mailing-list-description"><?php _e('Sign up for our mailing list to get the latest updates and offers.', 'vcs-starter'); ?></p>
						<?php echo do_shortcode(get_field('footer_mailing_list_form', 'option')); ?>
						<p class="footer-privacy-disclaimer">We respect your privacy</p>
					</div>
					<div class="footer-latest-news flex-container column">
						<h5><?php _e('Latest News', 'vcs-starter'); ?></h5>
						<div class="news-container flex-container column">
							<?php
							$query = [
								'cat' => get_field('footer_news_category', 'option'),
								'posts_per_page' => get_field('footer_latest_news_limit', 'option')
							];

							$result = new WP_Query($query);

							// dump($result);
							if ( $result->have_posts() ):
								while ( $result->have_posts() ):
									$result->the_post();
									?>
									<div class="footer-latest-new flex-container">
										<div class="footer-latest-new-thumbnail-container">
											<div class="footer-latest-new-thumbnail"><a href="<?php the_permalink(); ?>"><img src=<?php the_post_thumbnail_url('news-thumbnail'); ?>></a></div>
										</div>
										<div class="flex-container column footer-latest-new-container">
											<div class="footer-latest-new-description">								<?php 
									$content = get_the_content();
									echo mb_strimwidth($content, 0, 100, '...');
									?></div>
											<p class="footer-latest-new-date"><?php echo get_the_date('M. jS Y H:i'); ?></p>
										</div>
									</div>
												<?php
								endwhile; // end while
							endif; // end if
							wp_reset_postdata();
							?>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<section id="footer-copyright">
			<div class="container">
				<div class="footer-copyright flex-container">
					<p>&copy; <?php the_field('copyright', 'option'); ?></p>
					<nav class="footer-site-nav">
						<?php
						$args = [
							'menu_class' => 'flex-container',
							'container' => false,
							'theme_location' => 'footer-navigation'
						];
						wp_nav_menu($args);
						?>
					</nav>						
				</div>
			</div>
		</section>
		<?php wp_footer(); ?>
	</body>
</html>