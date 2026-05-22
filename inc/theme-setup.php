<?php
/**
 * Theme setup.
 *
 * @package Agency_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function agency_theme_setup(): void {
    load_theme_textdomain( 'agency-theme', AGENCY_THEME_DIR . '/languages' );

    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );
    add_theme_support( 'align-wide' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'editor-styles' );

    register_nav_menus(
        array(
            'primary' => esc_html__( 'Primary Menu', 'agency-theme' ),
            'footer'  => esc_html__( 'Footer Menu', 'agency-theme' ),
        )
    );
}
add_action( 'after_setup_theme', 'agency_theme_setup' );

/**
 * Modify main query for project archive.
 *
 * @param WP_Query $query The WP_Query instance.
 */
function agency_theme_modify_query( WP_Query $query ): void {
    if ( ! is_admin() && $query->is_main_query() && $query->is_post_type_archive( 'project' ) ) {
        $query->set( 'posts_per_page', 9 );
        $query->set( 'orderby', 'date' );
        $query->set( 'order', 'DESC' );
    }
}
add_action( 'pre_get_posts', 'agency_theme_modify_query' );

