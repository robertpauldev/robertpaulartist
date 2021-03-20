<?php
defined( 'ABSPATH' ) or die();

add_shortcode(
	'contactme',
	/**
	 * Displays a Contact Me shortcode.
	 *
	 * @return string
	 */
	function () {

		// Default
		$html = '';

		// Get Yoast data
		$yoast = get_option( 'wpseo_social' );
	
		// Get channels
		$channels = [
			'email'     => get_option( 'rpa_email' ),
			'facebook'  => get_option( 'rpa_messenger' ),
			'instagram' => $yoast['instagram_url'],
		];
	
		// If channels:
		if ( false === empty( $channels ) ) {
	
			// Loop through channels
			foreach ( $channels as $k => $v ) {
	
				// Update email `href`
				if ( 'email' === $k ) {
					$v = 'mailto:' . $v;
				}
	
				// Template
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
);
