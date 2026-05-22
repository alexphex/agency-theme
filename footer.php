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

            <?php
            $phone   = get_theme_mod( 'agency_phone', '' );
            $address = get_theme_mod( 'agency_address', '' );
            ?>

            <?php if ( $phone ) : ?>
                <p class="site-footer__phone">
                    <a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $phone ) ); ?>">
                        <?php echo esc_html( $phone ); ?>
                    </a>
                </p>
            <?php endif; ?>

            <?php if ( $address ) : ?>
                <p class="site-footer__address">
                    <?php echo esc_html( $address ); ?>
                </p>
            <?php endif; ?>

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
