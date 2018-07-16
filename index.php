<?php get_header(); ?>

<section class="wrap">
	<?php
		/** Loop */
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
	?>

	<div class="entry__cms">
		<?php the_content(); ?>
	</div>

	<?php
				/** Homepage */
				if ( is_front_page() ) :
					get_template_part( 'template-parts/template', 'slider' );
					get_template_part( 'template-parts/template', 'flex' );
				endif;
			endwhile;
		endif;
	?>
</section>

<?php get_footer();
