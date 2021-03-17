<?php
defined( 'ABSPATH' ) or die();

/**
 * Template Part: Promo Banner
 */

// Custom Fields
$toggle  = get_field( 'promo_toggle' );
$title   = get_field( 'promo_title' );
$content = get_field( 'promo_content', false, false );
$button  = get_field( 'promo_button' );
$image   = get_field( 'promo_background_image' );

// Get image
if ( false === empty( $image ) ) {

	// Get image size
	$image = $image['sizes']['promo'];

	// Set up background image
	if ( false === empty( $image ) ) {
		$image = 'style="background-image: url(' . esc_url( $image ) . ');"';
	}
}

if ( true === $toggle ) :

	// 'Promo' styles
	rpa_inline_style_tag( 'promo' );
?>

<section class="promo" <?php echo wp_kses_post( $image ); ?>>
	<a class="promo__link" title="<?php echo esc_attr( $button['title'] ); ?>" href="<?php echo esc_url( $button['url'] ); ?>">
		<span class="promo__wrap wrap">
			<?php
			// Title
			if ( false === empty( $title ) ) {
				printf( '<span class="promo__title">%s</span>', esc_html( $title ) );
			}

			// Content
			if ( false === empty( $content ) ) {
				echo '<span class="promo__content">' . wp_kses_post( $content ) . '</span>';
			}

			// Button
			if ( false === empty( $button ) ) {
				printf( '<span class="promo__btn">%s</span>', esc_html( $button['title'] ) );
			}
			?>
		</span>
	</a>
</section>

<?php
endif;
