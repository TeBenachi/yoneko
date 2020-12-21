<?php
/**
 * The template for displaying seaerch form
 * @package yoneko
 */
?>

<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="search-wrapper flex flex-row flex-nowrap justify-between">
        
        <div class="flex form-field">
            <input type="search" id="<?php echo esc_attr($unique_id); ?>" class="" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'yoneko' ); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s" aria-label="<?php echo esc_attr_x( 'Search', 'placeholder', 'yoneko' ); ?>"/>
        </div>
        
        <div class="flex form-button">
            <button type="submit" class="search-submit" aria-label="<?php _e( 'Search', 'yoneko' ); ?>" >
                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            </button>
        </div>
        
    </div>
</form>

    
    
