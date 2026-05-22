<?php
/**
 * Theme Customizer.
 *
 * @package Agency_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register customizer settings and controls.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager instance.
 */
function agency_theme_customize_register( WP_Customize_Manager $wp_customize ): void {

    // Agency Info Section
    $wp_customize->add_section(
        'agency_info',
        array(
            'title'    => esc_html__( 'Agency Info', 'agency-theme' ),
            'priority' => 30,
        )
    );

    // Phone number
    $wp_customize->add_setting(
        'agency_phone',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'agency_phone',
        array(
            'label'   => esc_html__( 'Phone Number', 'agency-theme' ),
            'section' => 'agency_info',
            'type'    => 'text',
        )
    );

    // Address
    $wp_customize->add_setting(
        'agency_address',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'agency_address',
        array(
            'label'   => esc_html__( 'Address', 'agency-theme' ),
            'section' => 'agency_info',
            'type'    => 'text',
        )
    );

    // Accent color
    $wp_customize->add_setting(
        'agency_accent_color',
        array(
            'default'           => '#e94560',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'agency_accent_color',
            array(
                'label'   => esc_html__( 'Accent Color', 'agency-theme' ),
                'section' => 'agency_info',
            )
        )
    );
}
add_action( 'customize_register', 'agency_theme_customize_register' );

/**
 * Output customizer CSS to head.
 */
function agency_theme_customize_css(): void {
    $accent = get_theme_mod( 'agency_accent_color', '#e94560' );
    ?>
    <style>
        :root {
            --color-accent: <?php echo esc_attr( $accent ); ?>;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'agency_theme_customize_css' );
