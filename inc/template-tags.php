<?php

/*****************
Facebook OpenGraph
*****************/

function rpa_og( $type = null ) {

	// URL
	if ( $type === 'url' ) {
		$og = get_the_permalink();
	}

	// Type
	elseif ( $type === 'type' ) {
		$og = 'article';
	}

	// Title
	elseif ( $type === 'title' ) {
		$og = ( is_single() ? get_the_title() : get_bloginfo( 'name' ) . ' : ' . get_the_title() );
	}

	// Description
	elseif ( $type === 'description' ) {
		$og = ( is_singular( 'post' ) ? get_the_excerpt() : get_the_title() );
	}

	// Image
	elseif ( $type === 'image' ) {
		$og = ( is_single() ? get_the_post_thumbnail_url() : RPA_DIRECTORY_URI . '/assets/images/og.jpg' );
	}

	echo $og;
}

/*********
Navigation
*********/

// Navigation > Register
function rpa_navigation() {
	register_nav_menu( 'navbar', 'Nav Bar' );
}
add_action( 'init', 'rpa_navigation' );

// Navigation > Add static links
function rpa_nav_menu() {
	$html = '<ul class="%2$s">';
		$html .= '%3$s';
		$html .= '<li>' . rpa_facebook() . '</li>';
	$html .= '</ul>';

	return $html;
}

// Navigation > Setup
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

// Projects
function rpa_get_projects( $count = 10, $tag = null ) {

	$args = array(
		'post_type'      => 'project',
		'posts_per_page' => $count
	);

	if ( empty($tag) === false ) {
		$args['tag_id'] = $tag;
	}

	// Return
	return new WP_Query( $args );
}

/*****
Social
*****/

function rpa_facebook() {
	return '<a class="icon--facebook entypo-facebook-circled" href="' . esc_url('https://www.facebook.com/rpaul.artist/') . '"></a>';
}
