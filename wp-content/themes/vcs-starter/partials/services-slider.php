<section id="services" class="services-slider">
	<div class="services-container container">
		<div id="services-carousel" class="owl-carousel owl-theme bg-contain">
			<?php
			if( have_rows('hs_service_repeater') ):
			 	// pereiname per kiekviena repeater irasa
			    while ( have_rows('hs_service_repeater') ) : the_row();
			    	$image = get_sub_field('service_image');
			        ?>
			        <div class="service">
						<img src=<?php echo $image['sizes']['large']; ?>>
						<h4 class="service-title"><?php the_sub_field('service_title'); ?></h4>
						<p class="service-description"><?php the_sub_field('service_description'); ?></p>
					</div>
			        <?php
			    endwhile;
			endif;
			?>
		</div>
	</div>
</section>