<?php
defined( 'ABSPATH' ) or die();

/**
 * Template: Single
 */

get_header();
?>

<section class="wrap">
	<?php while ( have_posts() ) : the_post(); ?>

	<?php rpa_inline_style_tag( 'post' ); ?>
	<article class="entry">
		<figure class="entry__thumbnail">
			<?php the_post_thumbnail(); ?>
		</figure>
		<?php rpa_inline_style_tag( 'cms' ); ?>
		<div class="entry__cms cms">
			<header class="entry__header">
				<h1 class="entry__title"><?php echo esc_html( get_the_title() ); ?></h1>
				<time class="entry__date">
					<span class="entry__date-icon"><?php echo file_get_contents( RPA_DIRECTORY_URI . '/assets/images/icons/icon_pencil.svg' ); ?></span>
					<span><?php echo esc_html( get_the_date() ); ?></span>
				</time>
			</header>
			<?php
			// Content
			the_content();

			// Projects
			if ( is_singular( 'project' ) ) {
				get_template_part( 'template-parts/template', 'image-attribution' );
			}

			// Tags
			if ( has_tag() ) {
				get_template_part( 'template-parts/template', 'entry-tags' );
			}
			?>
		</div>
		<?php rpa_inline_style_tag( 'pagination' ); ?>
		<div class="entry__nav clearfix">
			<?php
				$next_post = get_next_post();
				$prev_post = get_previous_post();

				// Next Post
				if ( false === empty( $next_post ) ) :
			?>

			<span class="entry__nav-link entry__nav-link--next">
				<span class="entry__nav-label">Next</span>
				<?php next_post_link( '%link', '%title' ); ?>
			</span>

			<?php
				endif;

				// Previous Post
				if ( false === empty( $prev_post ) ) :
			?>

			<span class="entry__nav-link entry__nav-link--prev">
				<span class="entry__nav-label">Previous</span>
				<?php previous_post_link( '%link', '%title' ); ?>
			</span>

			<?php endif; ?>
		</div>
	</article>

	<?php endwhile; ?>
</section>

<?php
get_footer();
