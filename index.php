<?php get_header(); ?>

<section class="wrap">
	<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();

				/** Homepage */
				if ( is_front_page() ) {
					get_template_part( 'template-parts/template', 'slider' );
					get_template_part( 'template-parts/template', 'flex' );
				}
			}
		}
	?>
</section>

<?php get_footer();
