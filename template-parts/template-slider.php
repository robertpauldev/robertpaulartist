<?php
defined( 'ABSPATH' ) or die();

/**
 * Template Part: Slider
 */

// Get Projects
$projects = rpa_get_projects( -1 );
update_post_thumbnail_cache( $projects );

$projects = $projects->posts;

if ( false === empty( $projects ) ) :
?>

<div class="slider">
	<ul class="cycle-slideshow"
		data-cycle-slides=".slide"
		data-cycle-fx="fade"
		data-cycle-timeout="0"
		data-cycle-speed="250"
		data-cycle-auto-height="16:9"
		data-cycle-prev=".slider__ui--prev"
		data-cycle-next=".slider__ui--next"
		data-cycle-pager=".slider__pager"
		data-cycle-log="false">
		<?php
		// Loop through Projects
		foreach ( $projects as $project ) :
			setup_postdata( $project );

			// Get alt text
			$image_id  = get_post_thumbnail_id( $project->ID );
			$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
		?>
		<li class="slide">
			<a title="<?php echo esc_attr( $project->post_title ); ?> | <?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="slide__link" href="<?php echo esc_url( get_the_permalink( $project->ID ) ); ?>">
				<img class="slide__image" alt="<?php echo esc_attr( $image_alt ); ?>" src="<?php echo esc_url( get_the_post_thumbnail_url( $project->ID ) ) ?>" loading="lazy" />
			</a>
		</li>
		<?php
			wp_reset_postdata();
		endforeach;
		?>
	</ul>
	<span class="slider__ui slider__ui--prev icon-caret-left"></span>
	<span class="slider__ui slider__ui--next icon-caret-right"></span>
	<div class="slider_pager"></div>
</div>

<?php
endif;