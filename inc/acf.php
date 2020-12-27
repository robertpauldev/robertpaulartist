<?php
defined( 'ABSPATH' ) or die();

/**
 * ACF fields
 */

if ( function_exists( 'acf_add_local_field_group' ) ) {

	/**
	 * 'About'
	 */

	acf_add_local_field_group( [
		'key'    => 'group_5bdd800aaae46',
		'title'  => 'About',
		'fields' => [
			[
				'key'           => 'field_5bdd89a509ad0',
				'name'          => 'block_about_thumbnail',
				'label'         => 'Thumbnail',
				'type'          => 'image',
				'instructions'  => 'Pick an image for the About section.',
				'return_format' => 'array',
				'preview_size'  => 'preview',
				'library'       => 'all',
			],
			[
				'key'          => 'field_5bdd80183d2c1',
				'name'         => 'block_about_content',
				'label'        => 'Content',
				'type'         => 'wysiwyg',
				'instructions' => 'Add content to the \'About\' section of the homepage.',
				'tabs'         => 'all',
				'toolbar'      => 'full',
				'media_upload' => 1,
			],
		],
		'location' => [
			[
				[
					'param'    => 'page',
					'operator' => '==',
					'value'    => '16',
				],
			],
		],
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'active'                => true,
		'description'           => RPA_THEME,
	] );

	/**
	 * 'Projects'
	 */

	acf_add_local_field_group( [
		'key'    => 'group_5d0526a9c8842',
		'title'  => 'Projects',
		'fields' => [
			[
				'key'          => 'field_5d0526b58cf5e',
				'name'         => 'image_attribution',
				'label'        => 'Image Attribution',
				'type'         => 'wysiwyg',
				'tabs'         => 'all',
				'toolbar'      => 'full',
				'media_upload' => 1,
			],
		],
		'location' => [
			[
				[
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'project',
				],
			],
		],
		'position'              => 'acf_after_title',
		'style'                 => 'seamless',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'active'                => true,
		'description'           => RPA_THEME,
	] );

	acf_add_local_field_group( [
		'key'    => 'group_5c33b0b96a8fa',
		'title'  => 'Promo Banner',
		'fields' => [
			[
				'key'         => 'field_5c33c05186e55',
				'name'        => 'promo_toggle',
				'label'       => 'Toggle',
				'type'        => 'true_false',
				'ui'          => 1,
				'ui_on_text'  => 'On',
				'ui_off_text' => 'Off',
			],
			[
				'key'   => 'field_5c33b0d3172cc',
				'name'  => 'promo_title',
				'label' => 'Title',
				'type'  => 'text',
			],
			[
				'key'          => 'field_5c33b100172cd',
				'name'         => 'promo_content',
				'label'        => 'Content',
				'type'         => 'wysiwyg',
				'tabs'         => 'all',
				'toolbar'      => 'full',
				'media_upload' => 1,
			],
			[
				'key'           => 'field_5c33b13a172ce',
				'name'          => 'promo_button',
				'label'         => 'Button',
				'type'          => 'link',
				'return_format' => 'array',
			],
			[
				'key'           => 'field_5c33b14c172cf',
				'name'          => 'promo_background_image',
				'label'         => 'Background Image',
				'type'          => 'image',
				'return_format' => 'url',
				'preview_size'  => 'thumbnail',
				'library'       => 'all',
			],
		],
		'location' => [
			[
				[
					'param'    => 'page_template',
					'operator' => '==',
					'value'    => 'default',
				],
			],
		],
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'active'                => true,
		'description'           => RPA_THEME,
	] );
}