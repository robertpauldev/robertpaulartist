<?php
/**
 * Template Part: Grid
 */

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

<div class="grid">
	<?php
	/** Loop through Projects */
	foreach ( $projects as $project ) :
		setup_postdata( $project );
	?>

	<div class="grid__item">
		<a class="grid__link" title="<?php esc_attr_e( $project->post_title ); ?> | <?php esc_attr_e( get_bloginfo( 'name' ) ); ?>" href="<?php esc_url_e( get_the_permalink( $project->ID ) ); ?>">
			<span class="grid__view">
				<span>View Project</span>
			</span>
			<?php echo get_the_post_thumbnail( $project->ID, 'square', array( 'class' => 'grid__image' ) ); ?>
		</a>
	</div>

	<?php
		wp_reset_postdata();
	endforeach;
	?>
</div>

<?php
endif;
