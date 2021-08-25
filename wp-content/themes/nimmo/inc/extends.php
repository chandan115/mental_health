<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Nimmo
 */

/*
 * Get page ID by Slug
*/
function nimmo_get_id_by_slug($slug, $post_type){
    $content = get_page_by_path($slug, OBJECT, $post_type);
    $id = $content->ID;
    return $id;
}

/**
 * Get content by slug
**/
function nimmo_get_content_by_slug($slug, $post_type){
    $content = get_posts(
        array(
            'name'      => $slug,
            'post_type' => $post_type
        )
    );
    if(!empty($content))
        return $content[0]->post_content;
    else 
        return;
}

/**
 * Show content by slug
**/
if(!function_exists('nimmo_content_by_slug')){
    function nimmo_content_by_slug($slug, $post_type){
        $content = nimmo_get_content_by_slug($slug, $post_type);

        $id = nimmo_get_id_by_slug($slug, $post_type);
        $shortcodes_custom_css = get_post_meta( $id, '_wpb_shortcodes_custom_css', true );
        if ( ! empty( $shortcodes_custom_css ) ) {
            $shortcodes_custom_css = strip_tags( $shortcodes_custom_css );
            echo '<style data-type="vc_shortcodes-custom-css">';
            echo esc_html($shortcodes_custom_css);
            echo '</style>';
        }
        
        echo apply_filters('the_content',  $content);
    }
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function nimmo_body_classes( $classes )
{   

    // Adds a class of group-blog to blogs with more than 1 published author.
    if (is_multi_author()) {
        $classes[] = 'group-blog';
    }

    // Adds a class of hfeed to non-singular pages.
    if (class_exists('ReduxFramework')) {
        $classes[] = ' reduxon';
    }

    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    $body_default_font = nimmo_get_opt( 'body_default_font', 'Roboto' );
    $heading_default_font = nimmo_get_opt( 'heading_default_font', 'Poppins' );

    if($body_default_font == 'Roboto') {
        $classes[] = 'body-default-font';
    }

    if($heading_default_font == 'Poppins') {
        $classes[] = 'heading-default-font';
    }

    if ( class_exists('WPBakeryVisualComposerAbstract') ) {
        $classes[] = 'visual-composer';
    }

    $sticky_on = nimmo_get_opt( 'sticky_on', false );
    if(isset($sticky_on) && $sticky_on == 1) {
        $classes[] = 'header-sticky';
    }

    $content_style = nimmo_get_opt( 'content_style', 'light' );
    if(isset($content_style)) {
        $classes[] = $content_style;
    }

    $post_related_post = nimmo_get_opt( 'post_related_post', false );
    if($post_related_post) {
        $classes[] = 'single-related-post';
    }

    $header_layout = nimmo_get_opt( 'header_layout', '1' );
    $custom_header = nimmo_get_page_opt( 'custom_header', '0' );
    if ( $custom_header == '1' ){
        $page_header_layout = nimmo_get_page_opt('header_layout');
        $header_layout = $page_header_layout;
    }
    if (class_exists('ReduxFramework')) {
        $classes[] = ' site-h'.$header_layout;
    }

    return $classes;
}
add_filter( 'body_class', 'nimmo_body_classes' );


/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function nimmo_pingback_header()
{
    if ( is_singular() && pings_open() )
    {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}
add_action( 'wp_head', 'nimmo_pingback_header' );
