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
<div id="page" class="site min-h-screen flex flex-col">
    <?php if (is_front_page() || is_home()) : ?>
    <!-- Animated gradient background on front page and blog index -->
    <div class="animated-gradient"></div>
    <div class="gradient-transition"></div>
    <?php endif; ?>
    
    <a class="skip-link screen-reader-text absolute top-0 left-0 bg-white text-black p-4 -m-px border-0 w-px h-px overflow-hidden focus:z-10 focus:w-auto focus:h-auto" href="#content"><?php esc_html_e( 'Skip to content', 'docspresso-theme' ); ?></a>

    <header id="masthead" class="site-header <?php echo is_front_page() ? 'fixed top-0 left-0 w-full z-50 bg-transparent' : 'relative bg-white border-b border-gray-200'; ?> py-4">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between">
                <div class="site-branding">
                    <?php
                    $site_title_color = is_front_page() ? 'text-white' : 'text-gray-900';
                    if ( is_front_page() && is_home() ) :
                        ?>
                        <h1 class="site-title text-2xl font-bold"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="<?php echo $site_title_color; ?> no-underline hover:text-purple-300"><?php bloginfo( 'name' ); ?></a></h1>
                        <?php
                    else :
                        ?>
                        <p class="site-title text-2xl font-bold"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="<?php echo $site_title_color; ?> no-underline hover:text-purple-600"><?php bloginfo( 'name' ); ?></a></p>
                        <?php
                    endif;
                    ?>
                </div><!-- .site-branding -->

                <?php if ( has_nav_menu( 'primary' ) ) : ?>
                    <nav id="site-navigation" class="main-navigation">
                        <button class="menu-toggle md:hidden <?php echo is_front_page() ? 'bg-transparent border-white text-white' : 'bg-white border-gray-300'; ?> border p-2 cursor-pointer rounded" aria-controls="primary-menu" aria-expanded="false">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        <?php
                        $nav_link_color = is_front_page() ? 'text-white hover:text-purple-300' : 'text-gray-700 hover:text-purple-600';
                        wp_nav_menu(
                            array(
                                'theme_location' => 'primary',
                                'menu_id'        => 'primary-menu',
                                'container_class' => 'hidden md:flex',
                                'menu_class'      => 'list-none p-0 m-0 flex gap-8',
                                'link_class'      => 'block py-2 px-4 ' . $nav_link_color . ' transition-colors font-medium',
                            )
                        );
                        ?>
                    </nav><!-- #site-navigation -->
                <?php endif; ?>

                <!-- Try Gemini button on front page -->
                <?php if (is_front_page()) : ?>
                    <div class="hidden md:block">
                        <a href="#" class="bg-white text-gray-900 px-4 py-2 rounded-full font-medium hover:bg-gray-100 transition-colors duration-300">
                            + Try Gemini
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </header><!-- #masthead -->

    <main id="content" class="site-content flex-1 <?php echo is_front_page() ? 'pt-0' : 'pt-8'; ?>">