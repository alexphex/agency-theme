<?php
/**
 * Custom Post Types and Taxonomies.
 *
 * @package Agency_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register Custom Post Type: Project.
 */
function agency_theme_register_cpt_project(): void {
    $labels = array(
        'name'               => esc_html__( 'Projects', 'agency-theme' ),
        'singular_name'      => esc_html__( 'Project', 'agency-theme' ),
        'add_new'            => esc_html__( 'Add New', 'agency-theme' ),
        'add_new_item'       => esc_html__( 'Add New Project', 'agency-theme' ),
        'edit_item'          => esc_html__( 'Edit Project', 'agency-theme' ),
        'view_item'          => esc_html__( 'View Project', 'agency-theme' ),
        'all_items'          => esc_html__( 'All Projects', 'agency-theme' ),
        'search_items'       => esc_html__( 'Search Projects', 'agency-theme' ),
        'not_found'          => esc_html__( 'No projects found.', 'agency-theme' ),
        'not_found_in_trash' => esc_html__( 'No projects found in Trash.', 'agency-theme' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'projects' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-portfolio',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    );

    register_post_type( 'project', $args );
}
add_action( 'init', 'agency_theme_register_cpt_project' );

/**
 * Register Taxonomy: Service Type.
 */
function agency_theme_register_taxonomy_service_type(): void {
    $labels = array(
        'name'              => esc_html__( 'Service Types', 'agency-theme' ),
        'singular_name'     => esc_html__( 'Service Type', 'agency-theme' ),
        'search_items'      => esc_html__( 'Search Service Types', 'agency-theme' ),
        'all_items'         => esc_html__( 'All Service Types', 'agency-theme' ),
        'edit_item'         => esc_html__( 'Edit Service Type', 'agency-theme' ),
        'update_item'       => esc_html__( 'Update Service Type', 'agency-theme' ),
        'add_new_item'      => esc_html__( 'Add New Service Type', 'agency-theme' ),
        'new_item_name'     => esc_html__( 'New Service Type Name', 'agency-theme' ),
        'menu_name'         => esc_html__( 'Service Types', 'agency-theme' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'service-type' ),
    );

    register_taxonomy( 'service_type', array( 'project' ), $args );
}
add_action( 'init', 'agency_theme_register_taxonomy_service_type' );
