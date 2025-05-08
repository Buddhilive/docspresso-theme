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

    <header id="masthead" class="site-header py-4 border-b border-gray-200 mb-8 relative z-10">
        <div class="site-branding text-center mb-4">
            <?php
            if ( is_front_page() && is_home() ) :
                ?>
                <h1 class="site-title text-3xl font-bold mb-2"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="text-gray-900 no-underline hover:text-purple-600"><?php bloginfo( 'name' ); ?></a></h1>
                <?php
            else :
                ?>
                <p class="site-title text-3xl font-bold mb-2"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="text-gray-900 no-underline hover:text-purple-600"><?php bloginfo( 'name' ); ?></a></p>
                <?php
            endif;

            $docspresso_description = get_bloginfo( 'description', 'display' );
            if ( $docspresso_description || is_customize_preview() ) :
                ?>
                <p class="site-description italic text-gray-600 mb-0"><?php echo $docspresso_description; // phpcs:ignore WordPress.Security.EscapingOutput.OutputNotEscaped ?></p>
            <?php endif; ?>
        </div><!-- .site-branding -->

        <?php if ( has_nav_menu( 'primary' ) ) : ?>
            <nav id="site-navigation" class="main-navigation text-center">
                <button class="menu-toggle md:hidden bg-white border border-gray-300 p-2 cursor-pointer" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'docspresso-theme' ); ?></button>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'container_class' => 'hidden md:flex justify-center gap-6',
                        'menu_class'      => 'list-none p-0 m-0 flex flex-col md:flex-row gap-2 md:gap-6',
                        'link_class'      => 'block py-1 px-2 text-gray-700 hover:text-purple-600 transition-colors',
                    )
                );
                ?>
            </nav><!-- #site-navigation -->
        <?php endif; ?>
    </header><!-- #masthead -->
</div>