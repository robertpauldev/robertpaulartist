<?php
/**
 * Template: Index
 */

get_header();
?>

<div class="wrap">
	<?php
	/** Loop */
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();

			if ( false === empty( get_the_content() ) ) :
	?>

	<section class="entry">
		<div class="entry__cms cms">
			<?php the_content(); ?>
		</div>
	</section>

	<?php
			endif;

			/** Homepage */
			if ( is_front_page() ) :
				get_template_part( 'template-parts/template', 'slider' );
				get_template_part( 'template-parts/template', 'projects' );
			endif;
		endwhile;
	endif;
	?>
</div>

<?php
/** Homepage */
if ( is_front_page() ) :
	get_template_part( 'template-parts/template', 'about' );
endif;

get_footer();
