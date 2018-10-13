(function ($) {
	"use strict";

	$(document).ready(function () {

		/** Video */
		$('iframe').each(function () {
			var src = $(this).attr('src');

			if (src !== undefined && (~src.indexOf('youtube.com') || ~src.indexOf('vimeo.com'))) {
				var width  = $(this).width(),
				height = $(this).height(),
				ratio  = ((height/width) * 100).toFixed(2);

				$(this).removeAttr('width height');
				$(this).wrap('<div class="video" style="padding-bottom: ' + ratio + '%;"></div>');
			}
		});
	});

}(jQuery));