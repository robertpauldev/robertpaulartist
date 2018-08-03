<?php
/**
 * Template: Home
 */

get_header();
?>

<section class="wrap">
	<?php
	if ( have_posts() ) :

		/** Loop */
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/template', 'list' );
		endwhile;
	else :
		get_template_part( 'template-parts/template', 'empty' );
	endif;
	?>
</section>

<?php
get_footer();
