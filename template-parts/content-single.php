<?php
/**
 * Template part for displaying single posts
 *
 * @package DocsPresso_Tech_Blog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('max-w-4xl mx-auto'); ?>>
	<header class="entry-header mb-16">
		<?php the_title( '<h1 class="entry-title text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-8 leading-tight tracking-tight">', '</h1>' ); ?>

		<nav aria-label="<?php esc_attr_e( 'Post meta information', 'docspresso-theme' ); ?>" class="entry-meta flex flex-wrap items-center gap-6 text-sm sm:text-base text-gray-700 mb-10 pb-8 border-b-2 border-gray-300">
			<div class="flex items-center gap-3 font-medium">
				<svg class="w-5 h-5 text-purple-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
					<path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
				</svg>
				<time class="entry-date published updated" datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
					<?php echo esc_html( get_the_date( 'F j, Y' ) ); ?>
				</time>
			</div>

			<div class="flex items-center gap-3 font-medium">
				<svg class="w-5 h-5 text-purple-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
					<path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
				</svg>
				<span class="author vcard">
					<span class="screen-reader-text"><?php esc_html_e( 'By', 'docspresso-theme' ); ?> </span>
					<a class="url fn n text-purple-600 hover:text-purple-800 transition-colors duration-200 font-semibold" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
						<?php echo esc_html( get_the_author() ); ?>
					</a>
				</span>
			</div>

			<?php if ( has_category() ) : ?>
				<div class="flex items-center gap-3 font-medium">
					<svg class="w-5 h-5 text-purple-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
						<path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
					</svg>
					<div class="post-categories space-x-2">
						<?php 
						$categories = get_the_category();
						foreach ( $categories as $category ) {
							echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" class="inline-block px-3 py-1 bg-purple-100 text-purple-700 hover:bg-purple-200 rounded-full text-xs font-semibold transition-colors duration-200">';
							echo esc_html( $category->name );
							echo '</a>';
						}
						?>
					</div>
				</div>
			<?php endif; ?>
		</nav><!-- .entry-meta -->
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
				'before' => '<nav aria-label="' . esc_attr__( 'Post navigation', 'docspresso-theme' ) . '" class="page-links mt-12 p-6 bg-gradient-to-r from-purple-50 to-blue-50 rounded-xl border border-purple-200">' . '<span class="block text-sm font-semibold text-gray-900 mb-4">' . esc_html__( 'Pages:', 'docspresso-theme' ) . '</span>',
				'after'  => '</nav>',
				'link_before' => '<span class="inline-block px-3 py-2 mx-1 bg-white border border-gray-300 rounded-lg hover:bg-purple-100 hover:border-purple-400 focus-within:ring-2 focus-within:ring-purple-500 transition-colors duration-200">',
				'link_after' => '</span>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<div class="entry-footer mt-16 pt-10 border-t-2 border-gray-300">
		<div class="flex flex-wrap items-center justify-between gap-4">
			<!-- Tags Section -->
			<div class="flex flex-wrap gap-2">
				<?php 
				$tags = get_the_tags();
				if ( $tags ) {
					foreach ( $tags as $tag ) {
						echo '<a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '" class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 hover:text-gray-900 rounded-full text-sm font-semibold transition-all duration-200 transform hover:scale-105">';
						echo '<span class="material-icons text-base">tag</span>';
						echo esc_html( $tag->name );
						echo '</a>';
					}
				}
				?>
			</div>

			<!-- Edit Post Link -->
			<?php if ( get_edit_post_link() ) : ?>
				<div class="flex-shrink-0">
					<?php
					edit_post_link(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( '<span class="material-icons mr-2 text-base">edit</span>Edit <span class="screen-reader-text">%s</span>', 'docspresso-theme' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post( get_the_title() )
						),
						'<span class="edit-link inline-flex items-center gap-2 px-4 py-2 bg-gray-100 hover:bg-purple-600 text-gray-900 hover:text-white rounded-full transition-all duration-200 font-semibold text-sm transform hover:scale-105">',
						'</span>'
					);
					?>
				</div>
			<?php endif; ?>
		</div>
				</div><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->