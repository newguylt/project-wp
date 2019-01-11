<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php wp_title() ?></title>
	<?php wp_head(); ?>
	</head>
	<body>
		<section id="hero" style="background-image: url(<?php echo get_field('hero_background_image', 'option')['sizes']['large']; ?>">
			<div class="hero-gradient">
				<div class="hero-container container">
					<div class="header-menu flex-container">	
						<div class="responsive-menu flex-container">
							<div class="flex-container responsive-menu-bar">
								<div class="hero-logo-responsive">
									<a href="<?php echo site_url(); ?>">
										<?php
										if(get_field('logo_type', 'option')):
											$image = get_field('logo_image', 'option');
											?>
											<img src="<?php echo $image['sizes']['logo']; ?>" alt="<?php bloginfo('name')?>">
											<?php
										else:
											the_field('logo_text', 'option');
										endif;
										?>
									</a>
								</div>
								<button class="hamburger hamburger--collapse menu" type="button">
								  	<span class="hamburger-box">
								    	<span class="hamburger-inner"></span>
								  	</span>
								</button>
							</div>
							<nav class="site-nav">
								<?php
								$args = [
									'menu_class' => 'flex-container',
									'container' => false,
									'theme_location' => 'primary-navigation'
								];
								wp_nav_menu($args);
								?>
							</nav>
							<div class="hero-logo">
								<a href="<?php echo site_url(); ?>">
									<?php
									if(get_field('logo_type', 'option')):
										$image = get_field('logo_image', 'option');
										?>
										<img src="<?php echo $image['sizes']['logo']; ?>" alt="<?php bloginfo('name')?>">
										<?php
									else:
										the_field('logo_text', 'option');
									endif;
									?>
								</a>
							</div>
							<nav class="socials flex-container">
									<?php
									$args = [
										'menu_class' => 'flex-container socials-text',
										'container' => false,
										'theme_location' => 'secondary-navigation'
									];
									wp_nav_menu($args);
									?>
								<ul class="socials-icons flex-container">
									<?php
									if( have_rows('hero_menu_social_icons_repeater', 'option') ):
									    while ( have_rows('hero_menu_social_icons_repeater', 'option') ) : the_row();
									        ?>
									        <li><a href="<?php echo get_sub_field('link')['url']; ?>" style="background-color: <?php echo get_sub_field('icon_background_color'); ?>" target="<?php echo get_sub_field('link')['target']; ?>"><?php the_sub_field('icon'); ?></a></li>
									        <?php
									    endwhile;
									endif;
									?>
								</ul>
							</nav>
						</div>
					</div>
					<div class="hero-headline flex-container column">
						<h1><?php the_field('hero_headline', 'option'); ?></h1>
						<p><?php the_field('hero_tagline', 'option'); ?></p>
					</div>
					<div class="hero-contact flex-container">
						<?php
						if( have_rows('hero_contact_repeater', 'option') ):
						    while ( have_rows('hero_contact_repeater', 'option') ) : the_row();
						    	if(get_sub_field('contact_method', 'option')):
									$class = 'chat-online-now';
									$bg = get_sub_field('background_color');
									$opacity = (get_sub_field('background_color_opacity')) / 100;
									$rgba = '('.(hex2RGB($bg, true)).','.$opacity.')';
									// dump($rgba);
								else:
									$class = 'talk-to-us';
									$bg = get_sub_field('background_color');
									$opacity = (get_sub_field('background_color_opacity')) / 100;
									$rgba = '('.(hex2RGB($bg, true)).','.$opacity.')';
								endif;
						        ?>
						        <div class="<?php echo $class ?> flex-container column" style="background-color: rgba<?php echo $rgba; ?>">
									<?php the_sub_field('icon'); ?>
									<h2><?php the_sub_field('headline'); ?></h2>
									<p><?php the_sub_field('tagline'); ?></p>
									<?php
									if(get_sub_field('contact_method', 'option')):
									?>
										<a href="<?php echo get_sub_field('contact_by_chatting')['url']; ?>" class="btn" target="<?php echo get_sub_field('contact_by_chatting')['target']; ?>"><?php echo get_sub_field('contact_by_chatting')['title']; ?></a>
									<?php
									else:
									?>
										<?php echo do_shortcode(get_sub_field('contact_by_email')); ?>
									<?php
									endif;
									?>
								</div>
						 
						        <?php
						    endwhile;
						endif;
						?>
					</div>
				</div>
			</div>
		</section>