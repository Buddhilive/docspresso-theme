<?php
/**
 * The template for displaying the front page.
 *
 * @package DocsPresso_Tech_Blog
 */

get_header();

/* Front page sections are provided as patterns. */

get_template_part( 'patterns/header-section' );
get_template_part( 'patterns/latest-posts-grid' );
get_template_part( 'patterns/large-video-section' );
get_template_part( 'patterns/spotlight-section' );
get_template_part( 'patterns/two-column-feature' );
get_template_part( 'patterns/research-section' );

get_footer();