<?php
/**
 * Page template.
 *
 * @package Agency_Theme
 */

get_header();
?>

<main id="main" class="site-main">
    <div class="container">

        <?php while ( have_posts() ) : the_post(); ?>

            <article id="page-<?php the_ID(); ?>" <?php post_class( 'page-content' ); ?>>

                <header class="page-header">
                    <h1 class="page-title">
                        <?php the_title(); ?>
                    </h1>
                </header>

                <div class="page-body">
                    <?php the_content(); ?>
                </div>

            </article>

        <?php endwhile; ?>

    </div>
</main>

<?php
get_footer();
