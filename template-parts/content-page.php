<?php
/**
 * Template part for displaying page content in page.php
 *
 * @package DocsPresso_Tech_Blog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('max-w-4xl mx-auto'); ?>>
	<header class="entry-header mb-16 text-center space-y-6">
		<?php the_title( '<h1 class="entry-title text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-4 leading-tight tracking-tight">', '</h1>' ); ?>
		
		<?php if (has_excerpt()) : ?>
			<div class="entry-excerpt text-lg sm:text-xl text-gray-700 leading-relaxed max-w-2xl mx-auto font-medium">
				<?php the_excerpt(); ?>
			</div>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if (has_post_thumbnail()) : ?>
		<div class="entry-thumbnail mb-16">
			<figure class="rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
				<?php the_post_thumbnail('large', array('class' => 'w-full h-auto object-cover')); ?>
				<?php
				$caption = get_the_post_thumbnail_caption();
				if ($caption) :
				?>
					<figcaption class="text-sm text-gray-600 text-center mt-4 px-4 pb-4 italic bg-gray-50">
						<?php echo wp_kses_post($caption); ?>
					</figcaption>
				<?php endif; ?>
			</figure>
		</div>
	<?php endif; ?>

	<div class="entry-content prose prose-lg prose-purple max-w-none space-y-6">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<nav aria-label="' . esc_attr__( 'Page navigation', 'docspresso-theme' ) . '" class="page-links mt-12 p-6 bg-gradient-to-r from-purple-50 to-blue-50 rounded-xl border border-purple-200">' . '<span class="block text-sm font-semibold text-gray-900 mb-4">' . esc_html__( 'Pages:', 'docspresso-theme' ) . '</span>',
				'after'  => '</nav>',
				'link_before' => '<span class="inline-block px-3 py-2 mx-1 bg-white border border-gray-300 rounded-lg hover:bg-purple-100 hover:border-purple-400 focus-within:ring-2 focus-within:ring-purple-500 transition-colors duration-200">',
				'link_after' => '</span>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer mt-16 pt-8 border-t border-gray-300">
			<div class="text-sm">
				<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'docspresso-theme' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					),
					'<span class="edit-link inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-purple-600 text-gray-900 hover:text-white rounded-lg transition-all duration-200 font-medium focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">',
					'</span>'
				);
				?>
			</div>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->