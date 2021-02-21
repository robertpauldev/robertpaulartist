<?php
defined( 'ABSPATH' ) or die();

/**
 * Template Part: Grid
 */

// Check for Tag
$tag = '';

if ( is_tag() ) {
	$queried_object = get_queried_object();
	$tag = $queried_object->term_id;
}

// Get Projects
$projects = rpa_get_projects( -1, $tag );
update_post_thumbnail_cache( $projects );

$projects = $projects->posts;

if ( false === empty( $projects ) ) :

	// 'Project' styles
	rpa_inline_style_tag( 'projects' );
?>

<div class="projects wrap--grid">
	<?php
	// Loop through Projects
	foreach ( $projects as $project ) :
		setup_postdata( $project );

		// Project vars
		$id    = $project->ID;
		$title = $project->post_title;
	?>

	<div class="project__item">
		<a class="project__link" title="<?php echo esc_attr( $title ); ?> | <?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" href="<?php echo esc_url( get_the_permalink( $id ) ); ?>">
			<span class="project__view">
				<span>View Project</span>
			</span>
			<?php
			// Get thumbnail
			$thumbnail = get_the_post_thumbnail_url( $id, 'square' );

			// If thumbnail, output
			if ( false === empty( $thumbnail ) ) {
				printf(
					'<img class="project__image" alt="%1$s" src="%2$s" width="300" height="300" loading="lazy" />',
					esc_attr( $title ),
					esc_url( $thumbnail )
				);
			}
			?>
		</a>
	</div>

	<?php
		wp_reset_postdata();
	endforeach;
	?>
</div>

<?php
endif;
