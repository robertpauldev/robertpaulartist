(function ($) {
	"use strict";

	$(document).ready(function () {

		let delta = 1,
			didScroll,
			lastScrollTop    = 0,
			siteContent      = $('.content'),
			siteHeader       = $('.masthead'),
			siteHeaderHeight = siteHeader.outerHeight();

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

		/**
		 * Scrolling functionality
		 */
		$(window).scroll(function () {
			didScroll = true;
		});

		/**
		 * Calculate rounded-up scroll value
		 * This should hopefully result in smoother 'sticking' on scroll.
		 */
		function roundScroll(toRound, roundTo) {
			return Math.round(toRound / roundTo) * roundTo;
		}

		/** Scroll */
		function hasScrolled() {

			var scrollPosition = $(window).scrollTop(),
				roundScrollPos = roundScroll(scrollPosition, delta);

			/** Make sure they scroll more than delta */
			if (Math.abs(lastScrollTop - roundScrollPos) <= delta) {
				return;
			}

			/** Scroll Down / Up */
			if (scrollPosition > lastScrollTop && scrollPosition > siteHeaderHeight) {
				siteHeader.add(siteContent).addClass('js-scrolling');
			}

			/** Top of page */
			if (scrollPosition <= siteHeaderHeight ) {
				siteHeader.add(siteContent).removeClass('js-scrolling');
			}

			lastScrollTop = roundScrollPos;
		}

		setInterval(function () {
			if (didScroll) {
				hasScrolled();
				didScroll = false;
			}
		}, 250);
	});

}(jQuery));