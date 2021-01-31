<?php
defined( 'ABSPATH' ) or die();

/**
 * Template part: About
 */

$thumbnail = get_field( 'block_about_thumbnail' );
$content   = get_field( 'block_about_content' );

if ( false === empty( $content ) ) :

	// 'About' styles
	rpa_inline_style_tag( 'about' );
?>

<section id="about" class="about">
	<div class="wrap">
		<h2 class="about__title">
			<span>About Me</span>
		</h2>
		<?php if ( false === empty( $thumbnail ) ) : ?>
		<figure class="about__thumbnail">
			<img class="about__thumbnail-media" alt="<?php echo esc_attr( $thumbnail['alt'] ); ?>" src="<?php echo esc_url( $thumbnail['sizes']['preview'] ); ?>" loading="lazy" />
		</figure>
		<?php endif; ?>
		<?php rpa_inline_style_tag( 'cms' ); ?>
		<div class="cms about__cms">
			<?php echo wp_kses_post( $content ); ?>
		</div>
	</div>
</section>

<?php
endif;
