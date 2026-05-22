<?php
/**
 * Archive template for Project CPT.
 *
 * @package Agency_Theme
 */

get_header();
?>

<main id="main" class="site-main">
    <div class="container">

        <header class="archive-header">
            <h1 class="archive-title">
                <?php esc_html_e( 'Our Projects', 'agency-theme' ); ?>
            </h1>
        </header>

        <?php if ( have_posts() ) : ?>
            <div class="projects-grid">
                <?php
                while ( have_posts() ) :
                    the_post();
                    get_template_part( 'template-parts/card', 'project' );
                endwhile;
                ?>
            </div>

            <?php the_posts_pagination(); ?>

        <?php else : ?>
            <p><?php esc_html_e( 'No projects found.', 'agency-theme' ); ?></p>
        <?php endif; ?>

    </div>
</main>

<?php
get_footer();
