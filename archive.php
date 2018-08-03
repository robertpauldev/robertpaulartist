<?php
/**
 * Template: Archive
 */

get_header();
?>

<section class="wrap">
	<h1 class="page-title"><?php the_archive_title(); ?></h1>
	<?php
		if ( is_tag( 'pencil' ) || is_tag( 'ink' ) ) :
			get_template_part( 'template-parts/template', 'grid' );
		else :
			get_template_part( 'template-parts/template', 'list' );
		endif;
	?>
</section>

<?php
get_footer();
