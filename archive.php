<?php
/**
 * Template: Archive
 */

get_header();
?>

<div class="wrap">
	<h1 class="page-title"><?php the_archive_title(); ?></h1>
	<?php
		if ( is_tag( 'pencil' ) || is_tag( 'ink' ) || is_tag( 'airbrush' ) ) :
			get_template_part( 'template-parts/template', 'projects' );
		endif;
	?>
</div>

<?php
get_footer();
