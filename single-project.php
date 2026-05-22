<?php
/**
 * Single template for Project CPT.
 *
 * @package Agency_Theme
 */

get_header();
?>

<main id="main" class="site-main">
    <div class="container">

        <?php while ( have_posts() ) : the_post(); ?>

            <article id="project-<?php the_ID(); ?>" <?php post_class( 'single-project' ); ?>>

                <header class="single-project__header">
                    <h1 class="single-project__title">
                        <?php the_title(); ?>
                    </h1>

                    <?php
                    $terms = get_the_terms( get_the_ID(), 'service_type' );
                    if ( $terms && ! is_wp_error( $terms ) ) :
                    ?>
                        <div class="single-project__terms">
                            <?php foreach ( $terms as $term ) : ?>
                                
                                    href="<?php echo esc_url( get_term_link( $term ) ); ?>"
                                    class="single-project__term"
                                >
                                    <?php echo esc_html( $term->name ); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </header>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="single-project__thumbnail">
                        <?php the_post_thumbnail( 'large' ); ?>
                    </div>
                <?php endif; ?>

                <div class="single-project__content">
                    <?php the_content(); ?>
                </div>

                <div class="single-project__meta">
                    <?php
                    $client = get_post_meta( get_the_ID(), '_project_client', true );
                    $year   = get_post_meta( get_the_ID(), '_project_year', true );
                    $url    = get_post_meta( get_the_ID(), '_project_url', true );
                    ?>

                    <?php if ( $client ) : ?>
                        <p class="single-project__meta-item">
                            <strong><?php esc_html_e( 'Client:', 'agency-theme' ); ?></strong>
                            <?php echo esc_html( $client ); ?>
                        </p>
                    <?php endif; ?>

                    <?php if ( $year ) : ?>
                        <p class="single-project__meta-item">
                            <strong><?php esc_html_e( 'Year:', 'agency-theme' ); ?></strong>
                            <?php echo esc_html( $year ); ?>
                        </p>
                    <?php endif; ?>

                    <?php if ( $url ) : ?>
                        <p class="single-project__meta-item">
                            <strong><?php esc_html_e( 'Project URL:', 'agency-theme' ); ?></strong>
                            <a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer">
                                <?php echo esc_html( $url ); ?>
                            </a>
                        </p>
                    <?php endif; ?>

                </div>

                <footer class="single-project__footer">
                    <a href="<?php echo esc_url( get_post_type_archive_link( 'project' ) ); ?>">
                        <?php esc_html_e( '← Back to Projects', 'agency-theme' ); ?>
                    </a>
                </footer>

            </article>

        <?php endwhile; ?>

    </div>
</main>

<?php
get_footer();
