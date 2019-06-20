(function ($) {

	'use strict';

	$(document).ready(function () {

		let shop    = $('.shop'),
			product = $('.shop__product');

		/** Remove 'loading' style */
		if ( product.length > 0 ) {
			setTimeout(function () {
				shop.removeClass('js-loading');
			}, 1000);
		}
	});
	
}(jQuery));