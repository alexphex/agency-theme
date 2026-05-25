<?php
/**
 * Block registration.
 *
 * @package Agency_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register theme blocks.
 */
function agency_theme_register_blocks(): void {
    register_block_type(
        get_template_directory() . '/src/blocks/project-hero'
    );
}
add_action( 'init', 'agency_theme_register_blocks' );
