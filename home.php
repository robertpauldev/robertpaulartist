<?php
defined( 'ABSPATH' ) or die();

/**
 * Template: Home
 */

get_header();

// 'Home' styles
rpa_inline_style_tag( 'home' );
?>

<section class="wrap wrap--grid">
	<?php
	if ( have_posts() ) {

		// 'Blog' styles
		rpa_inline_style_tag( 'blog' );

		// Loop blog posts
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/template', 'blog' );
		}
	} else {
		get_template_part( 'template-parts/template', 'empty' );
	}
	?>
</section>

<?php
get_footer();
