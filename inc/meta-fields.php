<?php
/**
 * Custom meta fields for Project CPT.
 *
 * @package Agency_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register meta boxes for Project CPT.
 */
function agency_theme_register_project_meta_boxes(): void {
    add_meta_box(
        'project_details',
        esc_html__( 'Project Details', 'agency-theme' ),
        'agency_theme_render_project_meta_box',
        'project',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'agency_theme_register_project_meta_boxes' );

/**
 * Render project meta box fields.
 *
 * @param WP_Post $post Current post object.
 */
function agency_theme_render_project_meta_box( WP_Post $post ): void {
    wp_nonce_field( 'agency_theme_save_project_meta', 'agency_theme_project_nonce' );

    $client   = get_post_meta( $post->ID, '_project_client', true );
    $year     = get_post_meta( $post->ID, '_project_year', true );
    $url      = get_post_meta( $post->ID, '_project_url', true );
    ?>

    <table class="form-table">
        <tr>
            <th>
                <label for="project_client">
                    <?php esc_html_e( 'Client', 'agency-theme' ); ?>
                </label>
            </th>
            <td>
                <input
                    type="text"
                    id="project_client"
                    name="project_client"
                    value="<?php echo esc_attr( $client ); ?>"
                    class="regular-text"
                />
            </td>
        </tr>
        <tr>
            <th>
                <label for="project_year">
                    <?php esc_html_e( 'Year', 'agency-theme' ); ?>
                </label>
            </th>
            <td>
                <input
                    type="number"
                    id="project_year"
                    name="project_year"
                    value="<?php echo esc_attr( $year ); ?>"
                    class="small-text"
                    min="2000"
                    max="<?php echo esc_attr( gmdate( 'Y' ) ); ?>"
                />
            </td>
        </tr>
        <tr>
            <th>
                <label for="project_url">
                    <?php esc_html_e( 'Project URL', 'agency-theme' ); ?>
                </label>
            </th>
            <td>
                <input
                    type="url"
                    id="project_url"
                    name="project_url"
                    value="<?php echo esc_attr( $url ); ?>"
                    class="regular-text"
                    placeholder="https://"
                />
            </td>
        </tr>
    </table>

    <?php
}

/**
 * Save project meta box data.
 *
 * @param int $post_id Current post ID.
 */
function agency_theme_save_project_meta( int $post_id ): void {
    if ( ! isset( $_POST['agency_theme_project_nonce'] ) ) {
        return;
    }

    if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['agency_theme_project_nonce'] ) ), 'agency_theme_save_project_meta' ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    if ( isset( $_POST['project_client'] ) ) {
        update_post_meta(
            $post_id,
            '_project_client',
            sanitize_text_field( wp_unslash( $_POST['project_client'] ) )
        );
    }

    if ( isset( $_POST['project_year'] ) ) {
        update_post_meta(
            $post_id,
            '_project_year',
            absint( $_POST['project_year'] )
        );
    }

    if ( isset( $_POST['project_url'] ) ) {
        update_post_meta(
            $post_id,
            '_project_url',
            esc_url_raw( wp_unslash( $_POST['project_url'] ) )
        );
    }
}
add_action( 'save_post_project', 'agency_theme_save_project_meta' );
