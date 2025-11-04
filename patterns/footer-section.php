<?php
/**
 * Title: Footer Section
 * Slug: docspresso-theme/footer-section
 * Categories: footer
 * Description: Modern site footer with branding, essential links, and social media
 */
?>

<footer id="colophon" class="site-footer mt-auto bg-gray-900 text-gray-300">
    <div class="max-w-7xl mx-auto px-6 py-12">
        <!-- Main Footer Content -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            <!-- Brand Section -->
            <div class="space-y-4">
                <?php if ( has_custom_logo() ) : ?>
                    <div class="custom-logo">
                        <?php the_custom_logo(); ?>
                    </div>
                <?php else : ?>
                    <h3 class="text-xl font-bold text-white"><?php bloginfo( 'name' ); ?></h3>
                <?php endif; ?>
                
                <?php
                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) :
                ?>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        <?php echo $description; ?>
                    </p>
                <?php endif; ?>

                <!-- Social Media Links -->
                <div class="space-y-3 mt-8">
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-purple-400 transition-colors duration-200 text-lg" aria-label="<?php esc_attr_e( 'Follow us on Twitter', 'docspresso-theme' ); ?>">
                            <i class="fab fa-twitter" aria-hidden="true"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-purple-400 transition-colors duration-200 text-lg" aria-label="<?php esc_attr_e( 'Follow us on LinkedIn', 'docspresso-theme' ); ?>">
                            <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-purple-400 transition-colors duration-200 text-lg" aria-label="<?php esc_attr_e( 'Follow us on GitHub', 'docspresso-theme' ); ?>">
                            <i class="fab fa-github" aria-hidden="true"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-purple-400 transition-colors duration-200 text-lg" aria-label="<?php esc_attr_e( 'Subscribe to our YouTube channel', 'docspresso-theme' ); ?>">
                            <i class="fab fa-youtube" aria-hidden="true"></i>
                        </a>
                        <a href="<?php echo esc_url( get_bloginfo( 'rss2_url' ) ); ?>" class="text-gray-400 hover:text-purple-400 transition-colors duration-200 text-lg" aria-label="<?php esc_attr_e( 'Subscribe to our RSS feed', 'docspresso-theme' ); ?>">
                            <i class="fas fa-rss" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="space-y-4">
                <h4 class="text-sm font-semibold text-white uppercase tracking-wider mb-2">Quick Links</h4>
                <nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer navigation', 'docspresso-theme' ); ?>">
                    <ul class="space-y-2">
                        <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="text-gray-400 hover:text-purple-400 transition-colors duration-200 text-sm"><?php esc_html_e( 'About Us', 'docspresso-theme' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" class="text-gray-400 hover:text-purple-400 transition-colors duration-200 text-sm"><?php esc_html_e( 'Blog', 'docspresso-theme' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="text-gray-400 hover:text-purple-400 transition-colors duration-200 text-sm"><?php esc_html_e( 'Contact', 'docspresso-theme' ); ?></a></li>
                    </ul>
                </nav>
            </div>

            <!-- Legal Links & Social -->
            <div class="space-y-4">
                <h4 class="text-sm font-semibold text-white uppercase tracking-wider mb-2">Connect</h4>
                
                <!-- Legal Links -->
                <nav class="footer-legal" aria-label="<?php esc_attr_e( 'Legal navigation', 'docspresso-theme' ); ?>">
                    <ul class="space-y-2 mb-6">
                        <li><a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>" class="text-gray-400 hover:text-purple-400 transition-colors duration-200 text-sm"><?php esc_html_e( 'Privacy Policy', 'docspresso-theme' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/terms-of-service/' ) ); ?>" class="text-gray-400 hover:text-purple-400 transition-colors duration-200 text-sm"><?php esc_html_e( 'Terms of Service', 'docspresso-theme' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/cookie-policy/' ) ); ?>" class="text-gray-400 hover:text-purple-400 transition-colors duration-200 text-sm"><?php esc_html_e( 'Cookie Policy', 'docspresso-theme' ); ?></a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="border-t border-gray-800 pt-8">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center space-y-4 md:space-y-0">
                <div class="text-sm text-gray-400">
                    &copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'docspresso-theme' ); ?>
                </div>
                <div class="flex items-center space-x-6 text-sm">
                    <span class="text-gray-500 text-xs md:inline"><?php esc_html_e( 'Proudly Sri Lankan 🇱🇰', 'docspresso-theme' ); ?></span>
                </div>
            </div>
        </div>
    </div>
</footer><!-- #colophon -->