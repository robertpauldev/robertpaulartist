<?php
/**
 * Template: Home
 */

get_header();
?>

<section class="wrap wrap--grid">
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/template', 'blog' );
		endwhile;
	else :
		get_template_part( 'template-parts/template', 'empty' );
	endif;
	?>
</section>

<?php
get_footer();
