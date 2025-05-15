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

    <?php
    // Include header pattern
    get_template_part( 'patterns/header-section' );
    ?>

    <main id="content" class="site-content flex-1 <?php echo is_front_page() ? 'pt-0' : 'pt-8'; ?>">