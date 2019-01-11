<section id="about-us">
	<div class="about-us-container container">
		<div class="about-us-title flex-container column">
			<h2><?php the_field('about_us_headline'); ?></h4>
			<p><?php the_field('about_us_tagline'); ?></p>
		</div>
		<div class="about-us-founders flex-container">
			<?php
			// patikriname ar repeater saugo duomenis
			if( have_rows('about_us_profile_repeater') ):
			    while ( have_rows('about_us_profile_repeater') ) : the_row();
			    	$image = get_sub_field('image');
			        ?>
			        <div class="about-us-founder flex-container column">
						<div class="founder-photo"><img src=<?php echo $image['sizes']['profile-picture']; ?>></div>
						<h3 class="founder-firstname"><?php the_sub_field('first_name'); ?></h3>
						<h4 class="founder-lastname"><?php the_sub_field('last_name'); ?></h4>
						<p class="founder-description"><?php the_sub_field('description'); ?></p>
					</div>
			        <?php
			    endwhile;
			endif;
			?>
		</div>	
	</div>
</section>