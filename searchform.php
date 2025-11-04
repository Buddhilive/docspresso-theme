<?php
/**
 * Search form template
 *
 * @package DocsPresso_Tech_Blog
 */

$unique_id = wp_unique_id( 'search-form-' );

?>
<form role="search" method="get" class="search-form w-full" action="<?php echo esc_url( home_url( '/' ) ); ?>" aria-labelledby="<?php echo esc_attr( $unique_id ); ?>">
	<div class="search-form-wrapper flex items-center bg-gray-50 rounded-full border border-gray-200 focus-within:bg-white focus-within:shadow-sm transition-all duration-200">
		<div class="flex-1">
			<label for="<?php echo esc_attr( $unique_id ); ?>" class="screen-reader-text">
				<?php esc_html_e( 'Search for:', 'docspresso-theme' ); ?>
			</label>
			<input 
				type="search" 
				id="<?php echo esc_attr( $unique_id ); ?>" 
				class="search-field w-full px-4 py-2.5 bg-transparent border-0 focus:outline-none focus-visible:outline-none placeholder-gray-400 text-gray-900 text-sm rounded-full" 
				placeholder="<?php echo esc_attr_x( 'Search for articles, tutorials, and more...', 'placeholder', 'docspresso-theme' ); ?>" 
				value="<?php echo get_search_query(); ?>" 
				name="s" 
				autocomplete="off"
			/>
		</div>
		<button 
			type="submit" 
			class="search-submit mr-1 px-2 py-2 text-gray-400 hover:text-purple-600 hover:bg-gray-100 focus:outline-none focus:text-purple-600 rounded-full transition-all duration-200 flex items-center justify-center"
			aria-label="<?php esc_attr_e( 'Search', 'docspresso-theme' ); ?>"
		>
			<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
			</svg>
		</button>
	</div>
</form>