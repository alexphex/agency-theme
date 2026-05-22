<?php
/**
 * Template part for displaying a project card.
 *
 * @package Agency_Theme
 */
?>

<article id="project-<?php the_ID(); ?>" <?php post_class( 'project-card' ); ?>>

    <?php if ( has_post_thumbnail() ) : ?>
        <div class="project-card__thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'medium_large' ); ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="project-card__content">

        <h2 class="project-card__title">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>

        <?php
        $terms = get_the_terms( get_the_ID(), 'service_type' );
        if ( $terms && ! is_wp_error( $terms ) ) :
        ?>
            <div class="project-card__terms">
                <?php foreach ( $terms as $term ) : ?>
                    
                        href="<?php echo esc_url( get_term_link( $term ) ); ?>"
                        class="project-card__term"
                    >
                        <?php echo esc_html( $term->name ); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ( has_excerpt() ) : ?>
            <p class="project-card__excerpt">
                <?php the_excerpt(); ?>
            </p>
        <?php endif; ?>

    </div>

</article>
