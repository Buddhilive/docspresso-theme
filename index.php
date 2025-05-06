<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package DocsPresso_Tech_Blog
 */

get_header();
?>

<main id="primary" class="site-main flex-grow max-w-3xl mx-auto px-4 py-8">
	<?php
	if ( have_posts() ) :

		/* Start the Loop */
		while ( have_posts() ) :
			the_post();

			/*
			 * Include the Post-Type-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
			 */
			get_template_part( 'template-parts/content', get_post_type() );

		endwhile;

		// Previous/next post navigation.
		?>
		<nav class="posts-navigation py-8 border-t border-b border-gray-200 my-8">
			<div class="nav-links flex justify-between">
				<div class="nav-previous">
					<?php previous_posts_link( esc_html__( 'Previous', 'docspresso-theme' ) ); ?>
				</div>
				<div class="nav-next">
					<?php next_posts_link( esc_html__( 'Next', 'docspresso-theme' ) ); ?>
				</div>
			</div>
		</nav>
		<?php

	else :

		// If no content, include the "No posts found" template.
		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>
</main><!-- #main -->

<?php
get_footer();