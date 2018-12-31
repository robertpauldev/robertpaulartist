<?php
defined( 'ABSPATH' ) or die();

/**
 * Shortcodes
 */

function rpa_shortcode_contact() {

	$html = '';

	$yoast = get_option( 'wpseo_social' );

	$channels = array(
		'email'     => get_option( 'rpa_email' ),
		'facebook'  => get_option( 'rpa_messenger' ),
		'instagram' => $yoast['instagram_url'],
	);

	foreach ( $channels as $k => $v ) {

		if ( 'email' === $k ) {
			$v = 'mailto:' . $v;
		}

		$html .= sprintf(
			'<a class="icon-%1$s icon--%1$s" href="%2$s" target="_blank" rel="noopener">
				<span class="icon__text">%3$s</span>
			</a>',
			esc_attr( $k ),
			esc_url( $v ),
			esc_html( ucfirst( $k ) )
		);
	}

	echo '<div class="contact-me">' . wp_kses_post( $html ) . '</div>';
}
add_shortcode( 'contactme', 'rpa_shortcode_contact' );