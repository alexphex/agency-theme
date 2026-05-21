<?php
/**
 * Enqueue scripts and styles.
 *
 * @package Agency_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Enqueue theme scripts and styles.
 */
function agency_theme_enqueue_assets(): void {
    wp_enqueue_style(
        'agency-theme-style',
        AGENCY_THEME_URI . '/build/main.scss.css',
        array(),
        AGENCY_THEME_VERSION
    );

    wp_enqueue_script(
        'agency-theme-script',
        AGENCY_THEME_URI . '/build/main.js',
        array(),
        AGENCY_THEME_VERSION,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'agency_theme_enqueue_assets' );
