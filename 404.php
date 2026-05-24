<?php
/**
 * 404 template.
 *
 * @package Agency_Theme
 */

get_header();
?>

<main id="main" class="site-main">
    <div class="container">

        <section class="error-404">
            <header class="error-404__header">
                <h1 class="error-404__title">404</h1>
                <p class="error-404__subtitle">
                    <?php esc_html_e( 'Page not found', 'agency-theme' ); ?>
                </p>
            </header>

            <div class="error-404__content">
                <p>
                    <?php esc_html_e( 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'agency-theme' ); ?>
                </p>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn--primary">
                    <?php esc_html_e( 'Back to Homepage', 'agency-theme' ); ?>
                </a>
            </div>
        </section>

    </div>
</main>

<?php
get_footer();
