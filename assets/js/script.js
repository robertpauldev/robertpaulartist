(function ($) {
	
	'use strict';

	$(document).ready(function () {

		let delta = 1,
			didScroll,
			lastScrollTop    = 0,
			siteContent      = $('.content'),
			siteHeader       = $('.masthead'),
			siteHeaderHeight = siteHeader.outerHeight();

		// Elements
		let iframe = $( '.cms iframe' );

		/**
		 * Videos
		 */

		// If iframe(s) in content
		if ( iframe.length > 0 ) {

			// Loop through iframes
			iframe.each( function () {

				// Get iframe src
				let thisSrc = $( this ).attr( 'src' );

				// If YouTube or Vimeo video
				if ( thisSrc !== undefined && ( ~thisSrc.indexOf( 'youtube.com' ) || ~thisSrc.indexOf( 'vimeo.com' ) ) ) {

					// Get video proportions
					let thisProps = {
						width:  $( this ).width(),
						height: $( this ).height(),
					}

					// Set video ratio
					thisProps.ratio = ( ( thisProps.height / thisProps.width ) * 100 ).toFixed( 2 );

					// Remove iframe atts; add ratio wrapper
					$( this ).removeAttr( 'width height' );
					$( this ).wrap( '<div class="video" style="padding-bottom: ' + thisProps.ratio + '%;" />');
				}
			} );
		}

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