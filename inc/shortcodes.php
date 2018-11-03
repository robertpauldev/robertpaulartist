<?php
/**
 * Shortcodes
 */

function rpa_prices( $atts ) {

	/** Get shortcode attributes */
	$atts = shortcode_atts(
		array(
			'type' => ''
		), $atts
	);

	$type = $atts['type'];

	$prices = array(
		'A5' => '75',
		'A4' => '100',
		'A3' => '150',
	);

	/** Build HTML */
	$html .= sprintf(
		'<table class="price-list price-list--%1$s">
			<thead>
				<tr>
					<th class="price-list__size">%2$s</th>
					<th class="price-list__price">%3$s</th>
				</tr>
			</thead>
			<tbody>',
		esc_attr( $type ),
		'Size',
		'Price'
	);

	foreach ( $prices as $k => $v ) {
		$html .= sprintf(
			'<tr>
				<td class="price-list__size">%1$s</td>
				<td class="price-list__price">&pound;%2$s</td>
			</tr>',
			$k,
			$v
		);
	}

	$html .= '</tbody></table>';

	return $html;
}
add_shortcode( 'prices', 'rpa_prices' );