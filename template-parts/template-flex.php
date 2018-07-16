<?php

/** Check for Tag */
$tag = '';

if ( is_tag() ) {
	$queried_object = get_queried_object();
	$tag = $queried_object->term_id;
}

/** Get Projects */
$projects = rpa_get_projects( -1, $tag );
update_post_thumbnail_cache( $projects );

$projects = $projects->posts;

if ( false === empty( $projects ) ) :
?>

<div class="flex">
	<?php
		/** Loop through Projects */
		foreach ( $projects as $project ) :
			setup_postdata( $project );
	?>

	<div class="flex__item">
		<a title="<?php esc_attr_e( $project->post_title ); ?> | <?php esc_attr_e( get_bloginfo( 'name' ) ); ?>" class="flex__link" href="<?php esc_url_e( get_the_permalink( $project->ID ) ); ?>">
			<span class="flex__label">
				<span class="flex__label-table">
					<span class="flex__label-cell">View Project</span>
				</span>
			</span>
			<?php echo get_the_post_thumbnail( $project->ID, 'square', array( 'class' => 'flex__image' ) ); ?>
		</a>
	</div>

	<?php wp_reset_postdata();
		endforeach;
	?>
</div>

<?php endif;
