<?php
/**
 * Footer template.
 *
 * @package Agency_Theme
 */
?>

<footer class="site-footer">
    <div class="container">
        <div class="site-footer__inner">
            <p class="site-footer__copy">
                &copy; <?php echo esc_html( gmdate( 'Y' ) ); ?>
                <?php bloginfo( 'name' ); ?>
            </p>

            <nav class="footer-navigation">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'footer',
                        'menu_class'     => 'footer-menu',
                        'container'      => false,
                        'depth'          => 1,
                    )
                );
                ?>
            </nav>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
