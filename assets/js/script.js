/**
 * Videos
 */

// Get iframes
let iframe = document.querySelectorAll( '.cms iframe' );

// If iframe(s) in content
if ( iframe.length > 0 ) {

	// Loop through iframes
	iframe.forEach(
		( item, index ) => {

			let thisIframe = iframe[ index ];

			// Get iframe src
			let thisSrc = thisIframe.attributes.src.nodeValue;

			// If YouTube or Vimeo video
			if ( thisSrc !== undefined && ( ~thisSrc.indexOf( 'youtube.com' ) || ~thisSrc.indexOf( 'vimeo.com' ) ) ) {

				// Get video proportions
				let thisProps = {
					width:  thisIframe.attributes.width.nodeValue,
					height: thisIframe.attributes.height.nodeValue,
				};

				// Set video ratio
				thisProps.ratio = ( ( thisProps.height / thisProps.width ) * 100 ).toFixed( 2 );

				// Remove iframe atts
				thisIframe.removeAttribute( 'width' );
				thisIframe.removeAttribute( 'height' );

				// Create ratio wrapper
				let thisHtml = thisIframe.outerHTML;
				let newHtml  = '<div class="video" style="padding-bottom: ' + thisProps.ratio + '%;">' + thisHtml + '</div>';

				// Wrap iframe
				thisIframe.outerHTML = newHtml;
			}
		}
	);
}

/**
 * Scrolling
 */

// Calculate rounded-up scroll value
function roundScroll( toRound, roundTo ) {
	return Math.round( toRound / roundTo ) * roundTo;
}

// Elements
let siteHeader  = document.querySelectorAll( '.masthead' );
let siteContent = document.querySelectorAll( '.content' );

// Values
let scrollTimer;
let lastScrollTop    = 0;
let scrollDelta      = 1;
let siteHeaderHeight = siteHeader[0].offsetHeight;

// On scroll
window.onscroll = function () {

	// Stop timer
	clearTimeout( scrollTimer );

	// Start timer
	scrollTimer = setTimeout(
		function () {
			
			// Values
			let scrollPosition = window.scrollY;
			let roundScrollPos = roundScroll( scrollPosition, scrollDelta );

			// Make sure they scroll more than delta
			if ( Math.abs( lastScrollTop - roundScrollPos ) <= scrollDelta ) {
				return;
			}

			// Scroll Down / Up
			if ( scrollPosition > lastScrollTop && scrollPosition > siteHeaderHeight ) {
				siteHeader[0].classList.add( 'js-scrolling' );
				siteContent[0].classList.add( 'js-scrolling' );
			}

			// Top of page
			if ( scrollPosition <= siteHeaderHeight ) {
				siteHeader[0].classList.remove( 'js-scrolling' );
				siteContent[0].classList.remove( 'js-scrolling' );
			}

			// Update last scroll position
			lastScrollTop = roundScrollPos;
		},
		100
	);
}