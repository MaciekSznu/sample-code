<?php
/**
 * Register ACF block.
 *
 * @package    WordPress
 * @subpackage sample
 * @since      sample 1.0
 */

/**
 * Register block Hero
 */
function init_hero_block() {
	if ( ! function_exists( 'acf_register_block_type' ) ) {
		return;
	}

	acf_register_block_type(
		array(
			'name'            => 'hero',
			'title'           => __( 'Hero', 'sample' ),
			'description'     => __( 'Hero', 'sample' ),
			'category'        => 'custom_blocks',
			'icon'            => 'cover-image',
			'mode'            => 'preview',
			'keywords'        => array( 'hero', 'image', 'video', 'content', 'slider' ),
			'align'           => '',
			'supports'        => array(
				'align' => false,
				'anchor' => true,
			),
			'render_template' => get_template_directory() . '/parts/blocks/acf-hero/index.php',
			'enqueue_assets'  => function () {
				$js_file = '/parts/blocks/acf-hero/index.min.js';

				wp_enqueue_script(
					'sample/acf-hero',
					get_template_directory_uri() . $js_file . '#asyncload',
					array( 'slick_script' ),
					filemtime( get_relative_path( $js_file ) ),
					true
				);
			},
		)
	);
}

add_action( 'acf/init', 'init_hero_block' );
