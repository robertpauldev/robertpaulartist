<?php get_header(); ?>

<section class="wrap">
	<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/template', 'list' );
			}
		} else {
			get_template_part( 'template-parts/template', 'empty' );
		}
	?>
</section>

<?php get_footer();
