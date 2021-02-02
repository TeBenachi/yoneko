<?php
/**
 * The template for displaying seaerch form
 * @package yoneko
 */

$yoneko_unique_id = wp_unique_id( 'search-form-' );
?>

<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="search-wrapper flex flex-row flex-nowrap justify-between"> 
        <div class="flex form-field">
            <label class="search-form-label" for="<?php echo esc_attr($yoneko_unique_id); ?>">
                <span class="sr-only"><?php esc_attr_e( 'Search', 'yoneko' ); ?></span>
            </label>
            <input type="search" id="<?php echo esc_attr($yoneko_unique_id); ?>" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'yoneko' ); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s" />
        </div>
        <div class="flex form-button">
            <button type="submit" class="search-submit" aria-label="<?php esc_attr_e( 'Search', 'yoneko' ); ?>" >
                <svg aria-hidden="true" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            </button>
        </div>
    </div>
</form>

    
    
