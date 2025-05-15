<?php
/**
 * Title: Footer Section
 * Slug: docspresso-theme/footer-section
 * Categories: footer
 * Description: Site footer with navigation, branding, and copyright information
 */
?>

<footer id="colophon" class="site-footer mt-auto bg-gray-900 text-gray-300">
    <div class="max-w-6xl mx-auto px-4 py-6">
        <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
            <!-- Left side - Brand/Logo -->
            <div class="flex items-center space-x-2">
                <?php if ( has_custom_logo() ) : ?>
                    <div class="custom-logo">
                        <?php the_custom_logo(); ?>
                    </div>
                <?php else : ?>
                    <span class="text-lg font-semibold text-white"><?php bloginfo( 'name' ); ?></span>
                <?php endif; ?>
            </div>

            <!-- Center - Navigation Links -->
            <nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer navigation', 'docspresso-theme' ); ?>">
                <ul class="flex flex-wrap justify-center md:justify-start items-center space-x-6 text-sm">
                    <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="hover:text-white transition-colors duration-200"><?php esc_html_e( 'About', 'docspresso-theme' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="hover:text-white transition-colors duration-200"><?php esc_html_e( 'Services', 'docspresso-theme' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="hover:text-white transition-colors duration-200"><?php esc_html_e( 'Contact', 'docspresso-theme' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>" class="hover:text-white transition-colors duration-200"><?php esc_html_e( 'Privacy', 'docspresso-theme' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/terms-of-service/' ) ); ?>" class="hover:text-white transition-colors duration-200"><?php esc_html_e( 'Terms', 'docspresso-theme' ); ?></a></li>
                </ul>
            </nav>

            <!-- Right side - Copyright -->
            <div class="site-info">
                <span class="copyright text-sm text-gray-400">&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'docspresso-theme' ); ?></span>
            </div>
        </div>
    </div><!-- .site-info -->
</footer><!-- #colophon -->