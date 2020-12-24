<?php
defined( 'ABSPATH' ) or die();

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

<div class="projects wrap--grid">
	<?php
	/** Loop through Projects */
	foreach ( $projects as $project ) :
		setup_postdata( $project );
	?>

	<div class="project__item">
		<a class="project__link" title="<?php echo esc_attr( $project->post_title ); ?> | <?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" href="<?php echo esc_url( get_the_permalink( $project->ID ) ); ?>">
			<span class="project__view">
				<span>View Project</span>
			</span>
			<?php echo get_the_post_thumbnail( $project->ID, 'square', array( 'class' => 'project__image' ) ); ?>
		</a>
	</div>

	<?php
		wp_reset_postdata();
	endforeach;
	?>
</div>

<?php
endif;
