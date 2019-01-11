<section class="inbetween-quotes">
	<div class="inbetween-quotes-container container">
		<div id="quotes-carousel" class="owl-carousel owl-theme">
			<?php
			if( have_rows('text_slider_repeater') ):
			    while ( have_rows('text_slider_repeater') ) : the_row();
			        ?>
			        <div class="quote">
						<div><?php the_sub_field('text'); ?></div>
					</div>
			        <?php
			    endwhile;
			endif;
			?>
		</div>
	</div>
</section>