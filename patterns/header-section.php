<?php
/**
 * Title: Header Section
 * Slug: docspresso-theme/header-section
 * Categories: header
 * Description: Site header with navigation and branding for front page
 */
?>

<header id="masthead" class="relative bg-transparent">
    <div class="max-w-7xl mx-auto px-6">
        <!-- Top navigation row -->
        <div class="flex items-center justify-between py-4">
            <div class="flex items-center gap-4">
                <?php if ( has_custom_logo() ) : ?>
                    <div class="custom-logo text-white">
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
                <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/blog/' ) ); ?>" class="hidden md:inline-block bg-white text-gray-900 px-3 py-1 rounded-full text-sm">See more</a>
            </div>
        </div>

        <!-- Hero area -->
        <div class="hero bg-black text-white rounded-lg overflow-hidden mb-12">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-center">
                <div class="md:col-span-7 px-6 py-16">
                    <h1 class="text-5xl font-extrabold leading-tight mb-4">Research to reality</h1>
                    <p class="text-lg text-gray-200 max-w-xl mb-6">Our mission is to drive breakthroughs that benefit society, businesses, and Google products. Through our research and foundational work in machine learning and generative AI, we deliver broad applications and transformative impact across many domains such as science, healthcare, climate, education, and more.</p>
                    <div class="flex gap-4">
                        <a class="px-5 py-3 bg-white text-black rounded-md text-sm font-semibold" href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/blog/' ) ); ?>">See more publications</a>
                        <a class="px-5 py-3 border border-white text-white rounded-md text-sm" href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/blog/' ) ); ?>">See more blog posts</a>
                    </div>
                </div>
                <div class="md:col-span-5 bg-gray-800 aspect-video flex items-center justify-center">
                    <!-- Placeholder for hero collage/image -->
                    <div class="w-11/12 h-3/4 bg-gray-900 rounded-lg border border-gray-700 flex items-center justify-center text-gray-400">Hero image</div>
                </div>
            </div>
        </div>
    </div>
</header><!-- #masthead -->