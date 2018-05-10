<?php $projects = rpa_get_projects( -1 )->posts; ?>

<div class="slider__wrap">
	<ul class="slider cycle-slideshow" data-cycle-slides=".slide" data-cycle-fx="fade" data-cycle-pause-on-hover="true" data-cycle-timeout="5000" data-cycle-speed="250" data-cycle-auto-height="16:9" data-cycle-prev=".slider__ui--prev" data-cycle-next=".slider__ui--next" data-cycle-pager=".slider__pager">
		<?php
			foreach ( $projects as $project ) :
				setup_postdata( $project );
		?>
		<li class="slide">
			<a class="slide__link" href="<?php echo get_the_permalink( $project->ID ); ?>"><?php echo get_the_post_thumbnail( $project->ID, '', array( 'class' => 'slide__image' ) ); ?></a>
		</li>
		<?php wp_reset_postdata();
			endforeach;
		?>
	</ul>

	<span class="slider__ui slider__ui--prev entypo-left-open-big"></span>
	<span class="slider__ui slider__ui--next entypo-right-open-big"></span>
	<div class="slider_pager"></div>
</div>
