<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="min-h-screen flex flex-col">
    <a class="skip-link screen-reader-text absolute top-0 left-0 bg-white text-black p-4 -m-px border-0 w-px h-px overflow-hidden focus:z-10 focus:w-auto focus:h-auto" href="#content"><?php esc_html_e( 'Skip to content', 'docspresso-theme' ); ?></a>

    <header id="masthead" class="site-header bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo and Site Title -->
                <div class="flex items-center gap-4">
                    <?php if ( has_custom_logo() ) : ?>
                        <div class="custom-logo flex-shrink-0">
                            <?php the_custom_logo(); ?>
                        </div>
                    <?php else : ?>
                        <a class="text-xl font-semibold text-gray-900 hover:text-gray-700 transition-colors" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <?php bloginfo( 'name' ); ?>
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Desktop Navigation -->
                <?php if ( has_nav_menu( 'primary' ) ) : ?>
                    <nav id="site-navigation" class="main-navigation hidden lg:flex items-center space-x-8" aria-label="Primary">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'primary',
                                'menu_id'        => 'primary-menu',
                                'container'      => false,
                                'items_wrap'     => '<ul class="flex items-center space-x-8 text-sm font-medium list-none p-0 m-0">%3$s</ul>',
                                'depth'          => 2,
                                'walker'         => new DocsPresso_Walker_Nav_Menu(),
                            )
                        );
                        ?>
                    </nav>
                <?php endif; ?>

                <!-- Search and Mobile Menu -->
                <div class="flex items-center space-x-4">
                    <!-- Desktop Search -->
                    <div class="hidden lg:block">
                        <button 
                            id="search-toggle" 
                            class="search-toggle p-2 text-gray-500 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 rounded-md transition-colors"
                            aria-label="<?php esc_attr_e( 'Toggle search', 'docspresso-theme' ); ?>"
                            aria-expanded="false"
                            aria-controls="search-dropdown"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Mobile Menu Button -->
                    <button 
                        id="mobile-menu-toggle" 
                        class="mobile-menu-toggle lg:hidden p-2 text-gray-500 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 rounded-md transition-colors"
                        aria-label="<?php esc_attr_e( 'Toggle navigation menu', 'docspresso-theme' ); ?>"
                        aria-expanded="false"
                        aria-controls="mobile-menu"
                    >
                        <svg class="w-6 h-6 hamburger-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        <svg class="w-6 h-6 close-icon hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Expandable Search Dropdown -->
            <div 
                id="search-dropdown" 
                class="search-dropdown absolute top-full left-0 right-0 bg-white border-b border-gray-200 shadow-sm hidden opacity-0 transform translate-y-2 transition-all duration-200 ease-out"
                style="transition: opacity 200ms ease-out, transform 200ms ease-out;"
            >
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                    <div class="max-w-lg mx-auto">
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu -->
            <?php if ( has_nav_menu( 'primary' ) ) : ?>
                <div 
                    id="mobile-menu" 
                    class="mobile-menu lg:hidden absolute top-full left-0 right-0 bg-white border-b border-gray-200 shadow-lg hidden opacity-0 transform translate-y-2 transition-all duration-200 ease-out"
                    style="transition: opacity 200ms ease-out, transform 200ms ease-out;"
                >
                    <div class="px-4 sm:px-6 py-4 space-y-2">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'primary',
                                'menu_id'        => 'mobile-primary-menu',
                                'container'      => false,
                                'items_wrap'     => '<ul class="mobile-menu-list space-y-2 list-none p-0 m-0">%3$s</ul>',
                                'depth'          => 2,
                                'walker'         => new DocsPresso_Mobile_Walker_Nav_Menu(),
                            )
                        );
                        ?>
                        
                        <!-- Mobile Search -->
                        <div class="pt-4 border-t border-gray-200">
                            <div class="space-y-3">
                                <label class="block text-sm font-medium text-gray-700"><?php esc_html_e( 'Search', 'docspresso-theme' ); ?></label>
                                <?php get_search_form(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </header>

    <main id="content" class="site-content flex-1 <?php echo ( is_front_page() || is_home() ) ? 'pt-0' : 'pt-8'; ?>">