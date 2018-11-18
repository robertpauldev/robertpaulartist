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
			<?php if ( is_singular( 'page' ) ) : ?>
			<header class="entry__header">
				<h1 class="entry__title"><?php echo esc_html( get_the_title() ); ?></h1>
			</header>
			<?php endif; ?>

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
