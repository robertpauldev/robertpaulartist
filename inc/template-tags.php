<?php
defined( 'ABSPATH' ) or die();

/**
 * Returns Facebook OpenGraph data based on data type.
 *
 * @param string $type Sets which OpenGraph property to define.
 * @return string
 */
function rpa_og( $type ) {
	switch ( $type ) {
		case 'url':
		echo get_the_permalink();
		break;
		
		case 'type':
		echo 'article';
		break;

		case 'title':
		echo get_the_title() . ' | ' . esc_html( get_bloginfo( 'name' ) );
		break;

		case 'description':
		echo is_singular( 'post' ) ? esc_html( get_the_excerpt() ) . ' | ' . esc_html( get_bloginfo( 'name' ) ) : get_the_title() . ' | ' . esc_html( get_bloginfo( 'name' ) );
		break;

		case 'image':
		echo is_single() ? esc_url( get_the_post_thumbnail_url() ) : RPA_DIRECTORY_URI . '/assets/images/og.jpg';
		break;
	}
}

/**
 * Renders an SVG icon by its handle.
 *
 * @param string $icon The icon handle to output
 * @return void
 */
function rpa_icon( string $icon ) {

	// If no icon, return early
	if ( empty( $icon ) ) {
		return '';
	}

	// Get icon; add class
	$_icon = file_get_contents( RPA_DIRECTORY_URI . '/assets/images/icons/icon_' . $icon . '.svg' );
	$_icon = str_replace( '<svg ', '<svg class="icon icon--' . $icon . '" ', $_icon );

	return $_icon;
}

/**
 * Returns a modified social network link via Yoast SEO.
 *
 * @param string $network The name of the social network (lowercase).
 * @return string
 */
function rpa_social( $network ) {

	if ( empty( $network ) ) {
		return '';
	}

	$link     = '';
	$profiles = get_option( 'wpseo_social' );

	if ( 'facebook' === $network ) {
		$link = $profiles['facebook_site'];
	}

	if ( 'instagram' === $network ) {
		$link = $profiles['instagram_url'];
	}

	if ( false === empty( $link ) ) {
		return sprintf(
			'<a class="social-icon" title="Find %1$s on %2$s" href="%3$s" target="_blank" rel="noopener">
				%4$s
				<span class="social-icon__text">Find %1$s on %2$s</span>
			</a>',
			esc_attr( get_bloginfo( 'name' ) ),
			esc_html( ucfirst( $network ) ),
			esc_url( $link ),
			rpa_icon( $network )
		);
	}

	return '';
}

/**
 * Registers the 'navbar' menu.
 *
 * @return void
 */
function rpa_navigation() {
	register_nav_menu( 'navbar', 'Nav Bar' );
}
add_action( 'init', 'rpa_navigation' );

/**
 * Displays the 'navbar' navigation menu.
 *
 * @uses rpa_nav_menu() for the nav HTML structure.
 * 
 * @param string $id        Define the menu ID to use.
 * @param string $parent_id Define the parent ID attribute.
 * @param string $child_id  Define the child ID attribute.
 * @return void
 */
function rpa_nav( $id = null, $parent_id = null, $child_id = null ) {
	wp_nav_menu( [
		'menu'            => $id,
		'menu_class'      => $child_id . ' clearfix',
		'menu_id'         => $child_id,
		'container'       => 'nav',
		'container_class' => $parent_id,
		'theme_location'  => 'navbar',
		'items_wrap'      => '<ul class="%2$s">%3$s</ul>'
	] );
}

/**
 * Get posts of the Project post type.
 *
 * @param int $count  Set the post count of the query; default 10.
 * @param string $tag Filter projects by tag.
 * @return array Returns a WP_Query array object.
 */
function rpa_get_projects( $count = 10, $tag = null ) {

	$args = [
		'post_type'      => 'project',
		'posts_per_page' => $count
	];

	// If tag is defined, add to query
	if ( false === empty( $tag ) ) {
		$args['tag_id'] = $tag;
	}

	$projects = new WP_Query( $args );
	update_post_thumbnail_cache( $projects );

	return $projects;
}

/**
 * Displays the post excerpt with custom formatting, and optional class attribute.
 *
 * @param string $class Define a custom class for the excerpt element.
 * @return void
 */
function rpa_the_excerpt( $class = '' ) {
	
	$excerpt = get_the_excerpt();

	echo false === empty( $excerpt ) ? sprintf( '<p class="excerpt %1$s">%2$s</p>', esc_html( $class ), esc_html( $excerpt ) ) : '';
}

/**
 * Sets custom `srcset` breakpoints for responsive mobile imagery.
 *
 * @param array $sources     The list of `srcset` image sources.
 * @param array $size_array  An array of width and height values.
 * @param string $image_src  The `src` of the image.
 * @param array $image_meta  The image meta data as returned by 'wp_get_attachment_metadata()'.
 * @param int $attachment_id The image attachment ID.
 * @return void
 */
function rpa_feature_thumbnail_srcset( array $sources, array $size_array, string $image_src, array $image_meta, int $attachment_id ){

	// Get image properties
	$size = 'promo-square';
	$breakpoint = 767;
 
	// Get upload directory
	$upload_dir = wp_upload_dir();
	$url        = $upload_dir['baseurl'] . '/' . str_replace( basename( $image_meta['file'] ), $image_meta['sizes'][$size]['file'], $image_meta['file'] );
 
	// Set new `scrset` breakpoint
	$sources[ $breakpoint ] = [
		'url'        => $url,
		'descriptor' => 'w',
		'value'      => $breakpoint,
	];

	return $sources;
}
add_filter( 'wp_calculate_image_srcset', 'rpa_feature_thumbnail_srcset', 10, 5 );
