<?php
/**
 * Template part for displaying single posts
 *
 * @package DocsPresso_Tech_Blog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('max-w-3xl mx-auto'); ?>>
	<header class="entry-header mb-12">
		<?php the_title( '<h1 class="entry-title text-4xl md:text-5xl font-bold text-gray-900 mb-8 leading-tight">', '</h1>' ); ?>

		<div class="entry-meta flex flex-wrap items-center gap-6 text-gray-600 mb-8 pb-8 border-b border-gray-200">
			<div class="flex items-center gap-2">
				<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
					<path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
				</svg>
				<time class="entry-date published updated" datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
					<?php echo esc_html( get_the_date() ); ?>
				</time>
			</div>

			<div class="flex items-center gap-2">
				<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
					<path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
				</svg>
				<span class="author vcard">
					<a class="url fn n text-purple-600 hover:text-purple-800 transition-colors" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
						<?php echo esc_html( get_the_author() ); ?>
					</a>
				</span>
			</div>

			<?php if ( has_category() ) : ?>
				<div class="flex items-center gap-2">
					<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
						<path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
					</svg>
					<div class="post-categories">
						<?php the_category( ', ' ); ?>
					</div>
				</div>
			<?php endif; ?>

			<?php if ( has_tag() ) : ?>
				<div class="flex items-center gap-2">
					<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
						<path fill-rule="evenodd" d="M5.5 3A2.5 2.5 0 003 5.5v2.879a2.5 2.5 0 00.732 1.767L6.5 12.914a1 1 0 001.414 0l2.914-2.914A2.5 2.5 0 0011.5 8.233V5.5A2.5 2.5 0 009 3H5.5zM5 7a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
					</svg>
					<div class="post-tags">
						<?php the_tags( '', ', ' ); ?>
					</div>
				</div>
			<?php endif; ?>
		</div><!-- .entry-meta -->
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
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'docspresso-theme' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

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

	<footer class="entry-footer mt-12 pt-8 border-t border-gray-200">
		<div class="flex items-center justify-between">
			<div class="text-sm text-gray-500">
				<?php docspresso_entry_footer(); ?>
			</div>
			
			<?php if ( get_edit_post_link() ) : ?>
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
						'<span class="edit-link inline-flex items-center px-3 py-1 bg-gray-100 hover:bg-gray-200 rounded transition-colors text-gray-600">',
						'</span>'
					);
					?>
				</div>
			<?php endif; ?>
		</div>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->