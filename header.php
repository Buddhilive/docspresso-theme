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

    <?php if ( ! is_front_page() && ! is_home() ) : ?>
    <header id="masthead" class="site-header bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex items-center justify-between py-4">
                <div class="flex items-center gap-4">
                    <?php if ( has_custom_logo() ) : ?>
                        <div class="custom-logo">
                            <?php the_custom_logo(); ?>
                        </div>
                    <?php else : ?>
                        <a class="text-sm font-semibold text-gray-900" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
                    <?php endif; ?>
                </div>

                <?php if ( has_nav_menu( 'primary' ) ) : ?>
                    <nav id="site-navigation" class="main-navigation hidden md:flex" aria-label="Primary">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'primary',
                                'menu_id'        => 'primary-menu',
                                'container'      => false,
                                'items_wrap'     => '<ul class="flex gap-6 text-sm list-none p-0 m-0">%3$s</ul>',
                                'depth'          => 1,
                            )
                        );
                        ?>
                    </nav>
                <?php endif; ?>

                <div class="flex items-center gap-3">
                    <button class="search-toggle text-sm text-gray-700 hidden md:inline">Search</button>
                </div>
            </div>
        </div>
    </header>
    <?php endif; ?>

    <main id="content" class="site-content flex-1 <?php echo ( is_front_page() || is_home() ) ? 'pt-0' : 'pt-8'; ?>">