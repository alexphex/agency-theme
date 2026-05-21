<?php
/**
 * Main template file.
 *
 * @package Agency_Theme
 */

get_header();
?>

<main id="main" class="site-main">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            the_content();
        endwhile;
    endif;
    ?>
</main>

<?php
get_footer();
