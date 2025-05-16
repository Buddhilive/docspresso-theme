<?php
/**
 * Title: Footer Section
 * Slug: docspresso-theme/footer-section
 * Categories: footer
 * Description: Site footer with navigation, branding, and copyright information
 */
?>

<footer id="colophon" class="site-footer mt-auto bg-white text-gray-700 border-t">
    <div class="max-w-7xl mx-auto px-6 py-10">
        <!-- Top row: small links and social -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 mb-6">
            <div class="flex items-center gap-4">
                <?php if ( has_custom_logo() ) : ?>
                    <div class="custom-logo">
                        <?php the_custom_logo(); ?>
                    </div>
                <?php else : ?>
                    <span class="text-sm font-semibold text-gray-900"><?php bloginfo( 'name' ); ?></span>
                <?php endif; ?>
            </div>

            <nav class="footer-navigation text-sm" aria-label="<?php esc_attr_e( 'Footer navigation', 'docspresso-theme' ); ?>">
                <ul class="flex flex-wrap items-center gap-4 text-sm">
                    <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="text-gray-600 hover:text-gray-900"><?php esc_html_e( 'About', 'docspresso-theme' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" class="text-gray-600 hover:text-gray-900"><?php esc_html_e( 'Blog', 'docspresso-theme' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="text-gray-600 hover:text-gray-900"><?php esc_html_e( 'Contact', 'docspresso-theme' ); ?></a></li>
                </ul>
            </nav>

            <div class="flex items-center gap-3">
                <!-- Social icons placeholder -->
                <a href="#" class="text-gray-500 hover:text-gray-900 text-sm">Follow</a>
                <a href="#" class="text-gray-500 hover:text-gray-900"><span class="sr-only">Twitter</span>🔗</a>
                <a href="#" class="text-gray-500 hover:text-gray-900"><span class="sr-only">LinkedIn</span>🔗</a>
            </div>
        </div>

        <!-- Bottom row: small print -->
        <div class="flex flex-col md:flex-row md:justify-between md:items-center text-xs text-gray-500">
            <div class="mb-3 md:mb-0">
                &copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'docspresso-theme' ); ?>
            </div>
            <div class="flex gap-4">
                <a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>" class="hover:text-gray-700">Privacy</a>
                <a href="<?php echo esc_url( home_url( '/terms-of-service/' ) ); ?>" class="hover:text-gray-700">Terms</a>
                <a href="<?php echo esc_url( home_url( '/help/' ) ); ?>" class="hover:text-gray-700">Help</a>
            </div>
        </div>
    </div>
</footer><!-- #colophon -->