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

	$channels = array(
		'email'     => get_option( 'rpa_email' ),
		'facebook'  => get_option( 'rpa_messenger' ),
		'instagram' => $yoast['instagram_url'],
	);

	if ( false === empty( $channels ) ) {

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
	}

	return '<div class="contact-me">' . wp_kses_post( $html ) . '</div>';
}
add_shortcode( 'contactme', 'rpa_shortcode_contact' );

/**
 * Displays a 'Buy [project] products now on Redbubble' link.
 *
 * @param array $atts The shortcode attributes.
 * @return boolean|string
 */
function rpa_shortcode_redbubble( $atts ) {

	/** Get attributes */
	$atts = shortcode_atts(
		array(
			'url' => '',
		), $atts
	);

	$url = $atts['url'];

	/** Return false if no URL */
	if ( empty( $atts['url'] ) ) {
		return false;
	}

	/** Return shortcode */
	return sprintf(
		'<div class="btn__redbubble-wrap"><a class="btn__redbubble" href="%1$s" target="_blank" rel="noopener">Buy <strong>%2$s</strong> products now on Redbubble</a></div>',
		esc_url( $url ),
		esc_html( get_the_title() )
	);
}
add_shortcode( 'redbubble', 'rpa_shortcode_redbubble' );