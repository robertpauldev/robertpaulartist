<?php
defined( 'ABSPATH' ) or die();

/**
 * Template Part: Tags
 */

// 'Tags' styles
rpa_inline_style_tag( 'tags' );
?>

<div class="entry__tags">
	<div class="entry__tags-wrap">
		<?php
		// Get icon SVG
		$icon = file_get_contents( RPA_DIRECTORY_URI . '/assets/images/icons/icon_archive.svg' ) ?? '';

		// If SVG, wrap
		if ( false === empty( $icon ) ) {
			$icon = '<span class="entry__tags-icon">' . $icon . '</span> ';
		}

		// Get tags
		the_tags( $icon, ' / ' );
		?>
	</div>
</div>