<?php
/**
 * Agency Theme functions and definitions.
 *
 * @package Agency_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'AGENCY_THEME_VERSION', '1.0.0' );
define( 'AGENCY_THEME_DIR', get_template_directory() );
define( 'AGENCY_THEME_URI', get_template_directory_uri() );

/**
 * Load theme files.
 */
require_once AGENCY_THEME_DIR . '/inc/enqueue.php';
require_once AGENCY_THEME_DIR . '/inc/theme-setup.php';
require_once AGENCY_THEME_DIR . '/inc/cpt.php';
