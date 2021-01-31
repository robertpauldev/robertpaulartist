<?php
defined( 'ABSPATH' ) or die();

/**
 * Template Part: Tags
 */

// 'Tags' styles
rpa_inline_style_tag( 'tags' );
?>

<div class="entry__tags">
	<div class="entry__tags-wrap"><?php the_tags( '<span class="icon-archive"></span> ', ' / ' ); ?></div>
</div>