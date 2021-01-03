<?php
defined( 'ABSPATH' ) or die();

/**
 * Shortcodes
 */

/**
 * Displays a Contact Me shortcode.
 *
 * @return string
 */
function rpa_shortcode_contact() {

	$html = '';

	$yoast = get_option( 'wpseo_social' );

	$channels = [
		'email'     => get_option( 'rpa_email' ),
		'facebook'  => get_option( 'rpa_messenger' ),
		'instagram' => $yoast['instagram_url'],
	];

	if ( false === empty( $channels ) ) {

		foreach ( $channels as $k => $v ) {

			if ( 'email' === $k ) {
				$v = 'mailto:' . $v;
			}

			$html .= sprintf(
				'<a class="icon" href="%1$s" target="_blank" rel="noopener">%2$s <span class="icon__text">%3$s</span></a>',
				esc_attr( $v ),
				rpa_icon( $k ),
				esc_html( ucfirst( $k ) )
			);
		}
	}

	return '<div class="contact-me">' . $html . '</div>';
}
add_shortcode( 'contactme', 'rpa_shortcode_contact' );
