<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package DocsPresso_Tech_Blog
 */

get_header();
?>

	<main id="primary" class="site-main flex-grow">

		<section class="error-404 not-found max-w-5xl mx-auto py-16 px-6">
			<!-- Hero Error Section -->
			<div class="text-center mb-16">
				<div class="mb-8">
					<h1 class="inline-block text-5xl font-extrabold text-transparent bg-gradient-to-r text-purple-600 bg-clip-text mb-4">
						404
					</h1>
				</div>
				<h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-6 leading-tight">
					<?php esc_html_e( 'Quantum entanglement failed!', 'docspresso-theme' ); ?>
				</h1>
				<p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
					<?php esc_html_e( 'The page you\'re looking for seems to have been swallowed by a digital black hole. Don\'t worry, our algorithms are working to restore the data matrix.', 'docspresso-theme' ); ?>
				</p>
				
				<!-- Action Buttons -->
				<div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-16">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" 
					   class="px-8 py-4 bg-purple-600 text-white rounded-lg font-semibold hover:bg-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
						<?php esc_html_e( 'Return to Base', 'docspresso-theme' ); ?>
					</a>
					<a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/blog/' ) ); ?>" 
					   class="px-8 py-4 border-2 border-purple-600 text-purple-600 rounded-lg font-semibold hover:bg-purple-600 hover:text-white transition-all duration-300 transform hover:scale-105">
						<?php esc_html_e( 'Explore Articles', 'docspresso-theme' ); ?>
					</a>
				</div>
			</div>

			<!-- Fun Easter Egg -->
			<div class="text-center mt-8">
				<details class="inline-block">
					<summary class="cursor-pointer text-sm text-gray-400 hover:text-purple-600 transition-colors duration-200">
						<?php esc_html_e( 'Error Code: DOCS_404_QUANTUM_FLUX', 'docspresso-theme' ); ?>
					</summary>
					<p class="mt-2 text-xs text-gray-500 max-w-md mx-auto">
						<?php esc_html_e( 'Technical Details: The requested resource has been affected by spontaneous quantum decoherence. Our machine learning algorithms suggest trying a different approach or waiting for reality to stabilize.', 'docspresso-theme' ); ?>
					</p>
				</details>
			</div>
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();