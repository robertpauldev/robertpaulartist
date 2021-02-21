<?php
defined( 'ABSPATH' ) or die();

// Define constants
define( 'RPA_VERSION', wp_get_theme( basename( __DIR__ ) )->get( 'Version' ) );
define( 'RPA_STYLE_URI', get_stylesheet_uri() );
define( 'RPA_DIRECTORY_URI', get_template_directory_uri() );
define( 'RPA_THEME', wp_get_theme()->get( 'Name' ) . ' ' . wp_get_theme()->get( 'Version' ) );

// Required files
require_once 'inc/acf.php';
require_once 'inc/options.php';
require_once 'inc/shortcodes.php';
require_once 'inc/template-tags.php';

/**
 * After 'robertpaulartist' theme is set up.
 *
 * @return void
 */
function rpa_setup() {

	// Thumbnails
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'promo', 1920, 300, true );
	add_image_size( 'promo-square', 800, 800, true );
	add_image_size( 'square', 300, 300, true );
	add_image_size( 'preview', 600, 338, true );
}
add_action( 'after_setup_theme', 'rpa_setup' );

/**
 * Enqueues the styles and scripts used in the theme header.
 *
 * @return void
 */
function rpa_header_scripts() {

	// Get minified file
	$min = WP_DEBUG ? '' : '.min';

	// Dequeue styles
	wp_dequeue_style( 'wp-block-library' );

	// Enqueue script
	wp_enqueue_script( 'rpa-script', RPA_DIRECTORY_URI . '/assets/js/script' . $min . '.js', [], RPA_VERSION );

	// Deregister embed script on non-posts
	if ( false === is_singular( 'post' ) ) {
		wp_deregister_script( 'wp-embed' );
	}
}
add_action( 'wp_enqueue_scripts', 'rpa_header_scripts' );

/**
 * Inlines critical styles in the <head />.
 *
 * @return void
 */
function rpa_critical_styles() {
	rpa_inline_style_tag( 'critical' );
}
add_action( 'wp_head', 'rpa_critical_styles' );

/**
 * Adds 'async' and 'defer' attributes to script tags.
 *
 * @param string $tag    The <script> tag for the enqueued script
 * @param string $handle The script's registered handle
 * @param string $src    The script's source URL
 * @return string
 */
function rpa_async_script( $tag, $handle, $src ) {

	// RPA JS
	if ( 'rpa-script' === $handle ) {
		$tag = str_replace( ' src', ' defer src', $tag );
	}

	return $tag;
}
add_filter( 'script_loader_tag', 'rpa_async_script', 10, 3 );

/**
 * Sets up the Project custom post type.
 *
 * @return void
 */
function rpa_post_type_projects() {

	$args = [
		'label'       => __( 'Project', 'text_domain' ),
		'description' => __( 'Project work', 'text_domain' ),
		'labels'      => [
			'name'                  => _x( 'Projects', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Projects', 'text_domain' ),
			'name_admin_bar'        => __( 'Projects', 'text_domain' ),
			'archives'              => __( 'Project Archives', 'text_domain' ),
			'attributes'            => __( 'Project Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Project:', 'text_domain' ),
			'all_items'             => __( 'All Projects', 'text_domain' ),
			'add_new_item'          => __( 'Add New Project', 'text_domain' ),
			'add_new'               => __( 'Add New', 'text_domain' ),
			'new_item'              => __( 'New Project', 'text_domain' ),
			'edit_item'             => __( 'Edit Project', 'text_domain' ),
			'update_item'           => __( 'Update Project', 'text_domain' ),
			'view_item'             => __( 'View Project', 'text_domain' ),
			'view_items'            => __( 'View Projects', 'text_domain' ),
			'search_items'          => __( 'Search Project', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Project Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set project image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove project image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as project image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into project', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this project', 'text_domain' ),
			'items_list'            => __( 'Projects list', 'text_domain' ),
			'items_list_navigation' => __( 'Projects list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter projects list', 'text_domain' ),
		],
		'supports'            => [ 'title', 'editor', 'excerpt', 'author', 'thumbnail' ],
		'taxonomies'          => [ 'category', 'post_tag' ],
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-format-image',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	];

	register_post_type( 'project', $args );
}
add_action( 'init', 'rpa_post_type_projects', 0 );

/**
 * Disables emojis on the theme. :)
 *
 * @return void
 */
function rpa_disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
}
add_action( 'init', 'rpa_disable_emojis' );

/**
 * Add `loading="lazy"` attribute to images output by the_post_thumbnail().
 *
 * @param string       $html              The post thumbnail HTML.
 * @param int          $post_id           The post ID.
 * @param string       $post_thumbnail_id The post thumbnail ID.
 * @param string|array $size              The post thumbnail size. Image size or array of width and height values (in that order). Default 'post-thumbnail'.
 * @param string       $attr              Query string of attributes.
 * 
 * @return string
 */
function rpa_thumbnail_lazy_loading( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
	return str_replace( '<img', '<img loading="lazy"', $html );
}
add_filter( 'post_thumbnail_html', 'rpa_thumbnail_lazy_loading', 10, 5 );