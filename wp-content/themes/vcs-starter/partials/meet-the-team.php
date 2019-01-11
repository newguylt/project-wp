<section id="team" class="meet-the-team">
	<div class="meet-the-team-container container flex-container">
		<div class="team-photos flex-container">
			<?php
			// patikriname ar repeater saugo duomenis
			if( have_rows('meet_the_photos_repeater') ):
			    while ( have_rows('meet_the_photos_repeater') ) : the_row();
			    	$image = get_sub_field('meet_the_teammate');
			        ?>
			        <img src=<?php echo $image['sizes']['passport']; ?>>
			        <?php
			    endwhile;
			endif;
			?>
		</div>
		<div class="team-description flex-container column">
			<h3><?php the_field('team_headline'); ?></h3>
			<h4><?php the_field('team_tagline'); ?></h4>
			<p class=team-description-firstp><?php the_field('team_description1'); ?></p>
			<p><?php the_field('team_description2'); ?></p>
		</div>
	</div>
</section>