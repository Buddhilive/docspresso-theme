<?php
/**
 * Template part for displaying page content in page.php
 *
 * @package DocsPresso_Tech_Blog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('max-w-3xl mx-auto'); ?>>
	<header class="entry-header mb-12 text-center">
		<?php the_title( '<h1 class="entry-title text-4xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight">', '</h1>' ); ?>
		
		<?php if (has_excerpt()) : ?>
			<div class="text-xl text-gray-600 leading-relaxed max-w-2xl mx-auto">
				<?php the_excerpt(); ?>
			</div>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if (has_post_thumbnail()) : ?>
		<div class="entry-thumbnail mb-12">
			<figure class="rounded-lg overflow-hidden shadow-lg">
				<?php the_post_thumbnail('large', array('class' => 'w-full h-auto')); ?>
				<?php
				$caption = get_the_post_thumbnail_caption();
				if ($caption) :
				?>
					<figcaption class="text-sm text-gray-600 text-center mt-4 italic">
						<?php echo wp_kses_post($caption); ?>
					</figcaption>
				<?php endif; ?>
			</figure>
		</div>
	<?php endif; ?>

	<div class="entry-content prose prose-lg prose-purple max-w-none">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links mt-8 p-6 bg-gray-50 rounded-lg border">' . esc_html__( 'Pages:', 'docspresso-theme' ),
				'after'  => '</div>',
				'link_before' => '<span class="inline-block px-3 py-1 mx-1 bg-white border rounded hover:bg-purple-50 hover:border-purple-300 transition-colors">',
				'link_after' => '</span>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer mt-12 pt-8 border-t border-gray-200">
			<div class="text-sm text-gray-500">
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
					'<span class="edit-link inline-flex items-center px-3 py-1 bg-gray-100 hover:bg-gray-200 rounded transition-colors">',
					'</span>'
				);
				?>
			</div>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->