<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @package DocsPresso_Tech_Blog
 */

?>

<section class="no-results not-found max-w-2xl mx-auto py-16">
	<header class="page-header mb-8 text-center">
		<h1 class="page-title text-2xl font-bold"><?php esc_html_e( 'Nothing Found', 'docspresso-theme' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p class="text-center mb-6">' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s" class="text-purple-600 hover:text-purple-800 font-medium">Get started here</a>.', 'docspresso-theme' ),
					array(
						'a' => array(
							'href' => array(),
							'class' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

			<p class="text-center mb-6"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'docspresso-theme' ); ?></p>
			<div class="max-w-md mx-auto mb-8">
				<?php
				get_search_form();
				?>
			</div>
		<?php
		else :
			?>

			<p class="text-center mb-6"><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'docspresso-theme' ); ?></p>
			<div class="max-w-md mx-auto">
				<?php
				get_search_form();
				?>
			</div>
		<?php
		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->