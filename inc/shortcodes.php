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
		'A5' => array(
			'size'  => '210 &times; 148 mm',
			'price' => ''
		),
		'A4' => array(
			'size'  => '297 &times; 210 mm',
			'price' => ''
		),
		'A3' => array(
			'size'  => '420 &times; 297 mm',
			'price' => ''
		),
		'Custom' => array(
			'size'  => '...',
			'price' => ''
		),
	);

	/** Pencil */
	if ( 'pencil' === $type ) {
		$prices['A5']['price'] = '&pound;80';
		$prices['A4']['price'] = '&pound;120';
		$prices['A3']['price'] = '&pound;160';
		$prices['Custom']['price'] = 'Get in touch';
	}

	/** Ink */
	if ( 'ink' === $type ) {
		$prices['A5']['price'] = '&pound;60';
		$prices['A4']['price'] = '&pound;100';
		$prices['A3']['price'] = '&pound;140';
		$prices['Custom']['price'] = 'Get in touch';
	}

	/** Build HTML */
	$html .= sprintf(
		'<table class="price-list price-list--%1$s">
			<caption colspan="2" class="price-list__caption">%2$s</caption>
			<thead>
				<tr>
					<th class="price-list__size">%3$s</th>
					<th class="price-list__price">%4$s</th>
				</tr>
			</thead>
			<tbody>',
		esc_attr( $type ),
		esc_attr( ucfirst( $type ) ),
		'Size',
		'Price'
	);

	foreach ( $prices as $k => $v ) {
		$html .= sprintf(
			'<tr>
				<td class="price-list__size"><strong>%1$s</strong> / %2$s</td>
				<td class="price-list__price">%3$s</td>
			</tr>',
			esc_html( $k ),
			esc_html( $v['size'] ),
			esc_html( $v['price'] )
		);
	}

	$html .= '</tbody></table>';

	return $html;
}
add_shortcode( 'prices', 'rpa_prices' );