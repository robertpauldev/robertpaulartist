<?php

// Tag
$tag = '';

if ( is_tag() ) {
	$queried_object = get_queried_object();
	$tag = $queried_object->term_id;
}

$projects = rpa_get_projects( -1, $tag )->posts;
?>

<div class="flex">
	<?php
		foreach ( $projects as $project ) :
			setup_postdata( $project );
	?>

	<div class="flex__item">
		<a class="flex__link" href="<?php echo get_the_permalink( $project->ID ); ?>">
			<span class="flex__label">
				<span class="flex__label-table"><span class="flex__label-cell">View Project</span></span>
			</span>
			<?php echo get_the_post_thumbnail( $project->ID, 'square', array( 'class' => 'flex__image' ) ); ?>
		</a>
	</div>

	<?php wp_reset_postdata();
		endforeach;
	?>
</div>
