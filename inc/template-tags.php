<?php
/**
 * Template Tags
 */

/**
 * Returns Facebook OpenGraph data based on data type.
 *
 * @param string $type Sets which OpenGraph property to define.
 * @return void
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
 * Returns a formatted Facebook URL icon link.
 *
 * @return string Returns a formatted Facebook URL string.
 */
function rpa_facebook() {
	return sprintf(
		'<a title="Find %1$s on Facebook" class="icon-facebook icon--facebook" href="%2$s">
			<span class="icon-facebook__text">Find %1$s on Facebook</span>
		</a>',
		esc_attr( get_bloginfo( 'name' ) ),
		esc_url( 'https://www.facebook.com/rpaul.artist/' )
	);
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
 * @param string $id        Define the menu ID to use.
 * @param string $parent_id Define the parent ID attribute.
 * @param string $child_id  Define the child ID attribute.
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
 * @param int $count  Set the post count of the query; default 10.
 * @param string $tag Filter projects by tag.
 * @return array Returns a WP_Query array object.
 */
function rpa_get_projects( $count = 10, $tag = null ) {

	$args = array(
		'post_type'      => 'project',
		'posts_per_page' => $count
	);

	/** If tag is defined, add to query */
	if ( false === empty( $tag ) ) {
		$args['tag_id'] = $tag;
	}

	return new WP_Query( $args );
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