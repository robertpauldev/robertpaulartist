<?php
defined( 'ABSPATH' ) or die();

/**
 * Template: Index
 */

get_header();
?>

<section class="content">
	<div class="wrap">
		<?php
		// Loop
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();

				if ( false === empty( get_the_content() ) ) :
		?>

		<div class="entry">
			<?php rpa_inline_style_tag( 'cms' ); ?>
			<div class="entry__cms cms">
				<?php if ( is_singular( 'page' ) ) : ?>
				<header class="entry__header">
					<h1 class="entry__title"><?php echo esc_html( get_the_title() ); ?></h1>
				</header>
				<?php endif; ?>

				<?php the_content(); ?>
			</div>
		</div>

		<?php
				endif;

				// Homepage
				if ( is_front_page() ) :
		?>
		
		<div class="homepage-work">
			<?php get_template_part( 'template-parts/template', 'projects' ); ?>
		</div>

		<?php
				endif;
			endwhile;
		endif;
		?>
	</div>
</section>

<?php
// Homepage
if ( is_front_page() ) {
	get_template_part( 'template-parts/template', 'about' );
}

get_footer();
