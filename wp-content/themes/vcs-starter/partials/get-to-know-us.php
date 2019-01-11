<section id="get-to-know-us">
	<div class="get-to-know-us-container container">
		<div class="get-to-know-us flex-container column">
			<h3><?php the_field('get_to_know_us_headline'); ?></h3>
			<p><?php the_field('get_to_know_us_description'); ?></p>
			<div class="get-to-know-us-btn flex-container">
				<?php
				if( have_rows('get_to_know_us_links_repeater') ):
				    while ( have_rows('get_to_know_us_links_repeater') ) : the_row();
				        ?>
				        <div class="btn-margin btn"><a href="<?php echo get_sub_field('link')['url'];?>" target="<?php echo get_sub_field('link')['target'];?>"><?php echo get_sub_field('link')['title'];?></a></div>
				        <?php
				        // dump(get_sub_field('link'));
				    endwhile;
				endif;
				?>
			</div>
		</div>
	</div>
</section>