<?php
/**
 * Template part: About
 */

$thumbnail = get_field( 'block_about_thumbnail' );
$content   = get_field( 'block_about_content' );

if ( false === empty( $content ) ) :
?>

<section id="about" class="about">
	<div class="wrap">
		<div class="about__wrap">
			<?php if ( false === empty( $thumbnail ) ) : ?>
			<figure class="about__thumbnail">
				<img class="about__thumbnail-media" alt="<?php echo esc_attr( $thumbnail['alt'] ); ?>" src="<?php echo esc_url( $thumbnail['sizes']['preview'] ); ?>" />
			</figure>
			<?php endif; ?>
			<div class="cms about__cms">
				<h2 class="about__title">
					<span>About</span>
				</h2>
				<?php echo wp_kses_post( $content ); ?>
			</div>
		</div>
	</div>
</section>

<?php
endif;
