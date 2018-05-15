<?php

/**
 * Adds the URL escaping shorthand that WordPress so badly needs.
 */
if ( false === function_exists( 'esc_url_e' ) ) {

	/**
	 * Adds the URL escaping shorthand that WordPress so badly needs.
	 *
	 * @param string $url The URL to be escaped.
	 * @param [type] $protocols ...
	 * @param string $_context ...
	 * @return void
	 */
	function esc_url_e( $url, $protocols = null, $_context = 'display' ) {
		echo apply_filters( 'esc_url_e', esc_url( $url, $protocols, $_context ) );
	}
}

/**
 * Returns Facebook OpenGraph data based on data type.
 *
 * @param string $type Sets which OpenGraph property to define.
 * @return void
 */
function rpa_og( $type = null ) {
	switch ( $type ) {
		case 'url':
		echo get_the_permalink();
		break;
		
		case 'type':
		echo 'article';
		break;

		case 'title':
		echo is_single() ? esc_html( get_the_title() ) : esc_html( get_bloginfo( 'name' ) ) . ' : ' . ( get_the_title() );
		break;

		case 'description':
		echo is_singular( 'post' ) ? esc_html( get_the_excerpt() ) : esc_html( get_the_title() );
		break;

		case 'image':
		echo is_single() ? esc_url( get_the_post_thumbnail_url() ) : RPA_DIRECTORY_URI . '/assets/images/og.jpg';
		break;
	}
}

/**
 * Returns a formatted Facebook URL icon link.
 *
 * @return string Returns a formatted Facebook URL string.
 */
function rpa_facebook() {
	return '<a class="icon--facebook entypo-facebook-circled" href="' . esc_url( 'https://www.facebook.com/rpaul.artist/' ) . '"></a>';
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
 * Returns a custom nav menu structure, incorporating a Facebook icon. 
 *
 * @return string Returns a HTML string.
 */
function rpa_nav_menu() {
	return '<ul class="%2$s">%3$s <li>' . rpa_facebook() . '</li></ul>';
}

/**
 * Displays the 'navbar' navigation menu.
 *
 * @uses rpa_nav_menu() for the nav HTML structure.
 * 
 * @param string $id Define the menu ID to use.
 * @param string $parent_id Define the parent ID attribute.
 * @param string $child_id Define the child ID attribute.
 * @return void
 */
function rpa_nav( $id = null, $parent_id = null, $child_id = null ) {
	wp_nav_menu( array(
		'menu'            => $id,
		'menu_class'      => $child_id . ' clearfix',
		'menu_id'         => $child_id,
		'container'       => 'nav',
		'container_class' => $parent_id,
		'theme_location'  => 'navbar',
		'items_wrap'      => rpa_nav_menu()
	) );
}

/**
 * Get posts of the Project post type.
 *
 * @param integer $count Set the post count of the query.
 * @param string $tag Filter projects by tag.
 * @return array Returns a WP_Query array object.
 */
function rpa_get_projects( $count = 10, $tag = null ) {

	$args = array(
		'post_type'      => 'project',
		'posts_per_page' => $count
	);

	/** If tag is defined, use it */
	if ( false === empty( $tag ) ) {
		$args['tag_id'] = $tag;
	}

	return new WP_Query( $args );
}
