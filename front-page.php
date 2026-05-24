<?php
/**
 * Front page template.
 *
 * @package Agency_Theme
 */

get_header();
?>

<main id="main" class="site-main">

    <section class="hero">
        <div class="container">
            <div class="hero__content">
                <h1 class="hero__title">
                    <?php echo esc_html( get_theme_mod( 'hero_title', 'We Build Digital Products' ) ); ?>
                </h1>
                <p class="hero__subtitle">
                    <?php echo esc_html( get_theme_mod( 'hero_subtitle', 'Web agency specializing in WordPress development, UI/UX design and digital marketing.' ) ); ?>
                </p>
                <a href="<?php echo esc_url( get_post_type_archive_link( 'project' ) ); ?>" class="btn btn--primary">
                    <?php esc_html_e( 'View Our Work', 'agency-theme' ); ?>
                </a>
            </div>
        </div>
    </section>

    <section class="projects-section">
        <div class="container">
            <h2 class="section-title">
                <?php esc_html_e( 'Recent Projects', 'agency-theme' ); ?>
            </h2>

            <?php
            $projects = new WP_Query(
                array(
                    'post_type'      => 'project',
                    'posts_per_page' => 3,
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                )
            );
            ?>

            <?php if ( $projects->have_posts() ) : ?>
                <div class="projects-grid">
                    <?php
                    while ( $projects->have_posts() ) :
                        $projects->the_post();
                        get_template_part( 'template-parts/card', 'project' );
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>

                <div class="projects-section__cta">
                    <a href="<?php echo esc_url( get_post_type_archive_link( 'project' ) ); ?>" class="btn btn--secondary">
                        <?php esc_html_e( 'All Projects', 'agency-theme' ); ?>
                    </a>
                </div>

            <?php endif; ?>

        </div>
    </section>

</main>

<?php
get_footer();
