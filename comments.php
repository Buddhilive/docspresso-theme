<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays all the comments and the comment form for a post.
 *
 * @package DocsPresso_Tech_Blog
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area py-12">
	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		$comment_count = get_comments_number();
		?>

		<div class="comments-header mb-8">
			<h2 class="comments-title text-2xl md:text-3xl font-bold text-gray-900 mb-2">
				<?php
				if ( '1' === $comment_count ) {
					esc_html_e( '1 thought on this article', 'docspresso-theme' );
				} else {
					printf(
						/* translators: 1: comment count number */
						esc_html( _nx( '%s thought on this article', '%s thoughts on this article', $comment_count, 'comments title', 'docspresso-theme' ) ),
						esc_html( number_format_i18n( $comment_count ) )
					);
				}
				?>
			</h2>
			<div class="comments-separator w-16 h-1 bg-gradient-to-r from-purple-500 to-purple-600 rounded-full"></div>
		</div><!-- .comments-header -->

		<ol class="comment-list space-y-6 mb-8 list-none p-0">
			<?php
			wp_list_comments(
				array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 56,
					'callback'    => 'docspresso_comment_callback',
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		// Are there comments to navigate through?
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
			?>
			<nav id="comment-nav-below" class="comment-navigation my-8 flex gap-4">
				<div class="nav-previous flex-1">
					<?php previous_comments_link( esc_html__( '← Older Comments', 'docspresso-theme' ) ); ?>
				</div>
				<div class="nav-next flex-1 text-right">
					<?php next_comments_link( esc_html__( 'Newer Comments →', 'docspresso-theme' ) ); ?>
				</div>
			</nav><!-- #comment-nav-below -->
			<?php
		endif; // Check for comment navigation.

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments-notice p-4 bg-yellow-50 border border-yellow-200 rounded-lg text-yellow-800 text-sm mb-8">
				<?php esc_html_e( 'Comments are closed.', 'docspresso-theme' ); ?>
			</p>
			<?php
		endif;

	else :
		// No comments yet
		?>
		<div class="no-comments-section mb-8">
			<p class="text-gray-600 text-center py-8">
				<?php esc_html_e( 'No comments yet. Be the first to share your thoughts!', 'docspresso-theme' ); ?>
			</p>
		</div>
		<?php
	endif; // Check for have_comments().

	// Comment form
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	
	$args = array(
		'class_form'         => 'comment-form',
		'title_reply'        => '<h2 class="comment-form-title text-2xl md:text-3xl font-bold text-gray-900 mb-2">' . esc_html__( 'Leave a Comment', 'docspresso-theme' ) . '</h2>',
		'title_reply_to'     => '<h2 class="comment-form-title text-2xl md:text-3xl font-bold text-gray-900 mb-2">' . esc_html__( 'Leave a Reply to %s', 'docspresso-theme' ) . '</h2>',
		'cancel_reply_link'  => esc_html__( 'Cancel reply', 'docspresso-theme' ),
		'label_submit'       => esc_html__( 'Post Comment', 'docspresso-theme' ),
		'logged_in_as'       => '<p class="logged-in-as text-sm text-gray-600 mb-6">' . sprintf(
			/* translators: 1: edit user link, 2: user name, 3: logout link */
			esc_html__( 'Logged in as %1$s. %2$s', 'docspresso-theme' ),
			'<a href="' . esc_url( admin_url( 'profile.php' ) ) . '" class="text-purple-600 hover:text-purple-700 transition-colors">' . esc_html( $commenter['comment_author'] ) . '</a>',
			'<a href="' . esc_url( wp_logout_url( get_permalink() ) ) . '" class="text-purple-600 hover:text-purple-700 transition-colors">' . esc_html__( 'Log out?', 'docspresso-theme' ) . '</a>'
		) . '</p>',
		'comment_notes_before' => '<div class="comment-notes bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">' .
			'<p class="text-sm text-blue-900 font-medium mb-2">' . esc_html__( 'Please note:', 'docspresso-theme' ) . '</p>' .
			'<p class="text-sm text-blue-800 m-0">' . esc_html__( 'Your email address will not be published. Required fields are marked *', 'docspresso-theme' ) . '</p>' .
			'</div>',
		'comment_notes_after' => '',
		'comment_field'      => '<div class="comment-form-comment form-group mb-6">' .
			'<label for="comment" class="block text-sm font-semibold text-gray-900 mb-2">' . esc_html__( 'Comment', 'docspresso-theme' ) . '<span class="text-red-500">*</span></label>' .
			'<textarea id="comment" name="comment" class="form-control w-full px-4 py-3 border-2 border-gray-400 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 hover:border-gray-500 transition-all duration-200 resize-vertical shadow-sm" placeholder="' . esc_attr__( 'Share your thoughts...', 'docspresso-theme' ) . '" rows="6" required></textarea>' .
			'</div>',
		'submit_button'      => '<button name="%1$s" type="submit" id="%2$s" class="submit-btn inline-flex items-center gap-2 bg-purple-600 hover:bg-purple-700 text-white font-semibold py-3 px-8 rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 shadow-md hover:shadow-lg">%4$s</button>',
		'submit_field'       => '<div class="form-submit mt-8 flex items-center gap-4">%1$s %2$s</div>',
		'fields'             => apply_filters(
			'comment_form_default_fields',
			array(
			'author' => '<div class="comment-form-author form-group mb-6">' .
				'<label for="author" class="block text-sm font-semibold text-gray-900 mb-2">' . esc_html__( 'Name', 'docspresso-theme' ) . '<span class="text-red-500">*</span></label>' .
				'<input id="author" name="author" type="text" class="form-control w-full px-4 py-2 border-2 border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 hover:border-gray-500 transition-all duration-200 bg-white text-gray-900" placeholder="' . esc_attr__( 'John Doe', 'docspresso-theme' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '"' . ( $req ? ' required' : '' ) . ' />' .
				'</div>',
			'email' => '<div class="comment-form-email form-group mb-6">' .
				'<label for="email" class="block text-sm font-semibold text-gray-900 mb-2">' . esc_html__( 'Email', 'docspresso-theme' ) . '<span class="text-red-500">*</span></label>' .
				'<input id="email" name="email" type="email" class="form-control w-full px-4 py-2 border-2 border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 hover:border-gray-500 transition-all duration-200 bg-white text-gray-900" placeholder="' . esc_attr__( 'john@example.com', 'docspresso-theme' ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) . '"' . ( $req ? ' required' : '' ) . ' />' .
				'</div>',
			'url'   => '<div class="comment-form-url form-group mb-6">' .
				'<label for="url" class="block text-sm font-semibold text-gray-900 mb-2">' . esc_html__( 'Website', 'docspresso-theme' ) . '</label>' .
				'<input id="url" name="url" type="url" class="form-control w-full px-4 py-2 border-2 border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 hover:border-gray-500 transition-all duration-200 bg-white text-gray-900" placeholder="' . esc_attr__( 'https://example.com', 'docspresso-theme' ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) . '" />' .
				'</div>',
			)
		),
	);

	comment_form( $args );
	?>
</div><!-- #comments -->
