<?php
/**
 * Functions and definitions
 *
 * @package Nimmo
 */

if (!function_exists('nimmo_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function nimmo_setup()
    {
        // Make theme available for translation.
        load_theme_textdomain('nimmo', get_template_directory() . '/languages');

        // Custom Header
        add_theme_support("custom-header");

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        // Let WordPress manage the document title.
        add_theme_support('title-tag');

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary', 'nimmo'),
            'primary_left' => esc_html__('Primary Left', 'nimmo'),
            'primary_right' => esc_html__('Primary Right', 'nimmo'),
            'hidden-sidebar' => esc_html__('Hidden Sidebar', 'nimmo'),
            'bottom-footer' => esc_html__('Bottom Footer', 'nimmo'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('nimmo_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        // Add support for core custom logo.
        add_theme_support('custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ));
        add_theme_support('post-formats', array(
            'gallery',
        ));

        add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');

        /* Change default image thumbnail sizes in wordpress */
        update_option('thumbnail_size_w', 300);
        update_option('thumbnail_size_h', 300);
        update_option('thumbnail_crop', 1);
        update_option('medium_size_w', 413);
        update_option('medium_size_h', 455);
        update_option('medium_crop', 1);
        update_option('large_size_w', 980);
        update_option('large_size_h', 340);
        update_option('large_crop', 1);

        add_image_size( 'nimmo-thumbnail', 200, 160, true );
        add_image_size( 'nimmo-medium', 680, 456, true );
        add_image_size( 'nimmo-gallery', 480, 430, true );

        remove_theme_support('widgets-block-editor');

    }
endif;
add_action('after_setup_theme', 'nimmo_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nimmo_content_width()
{
    $GLOBALS['content_width'] = apply_filters('nimmo_content_width', 640);
}

add_action('after_setup_theme', 'nimmo_content_width', 0);

/**
 * Register widget area.
 */
function nimmo_widgets_init()
{
    register_sidebar(array(
        'name'          => esc_html__('Blog Sidebar', 'nimmo'),
        'id'            => 'sidebar-blog',
        'description'   => esc_html__('Add widgets here.', 'nimmo'),
        'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
        'after_widget'  => '</div></section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    if(class_exists('Woocommerce')){
        register_sidebar(array(
            'name'          => esc_html__('Shop Sidebar', 'nimmo'),
            'id'            => 'sidebar-shop',
            'description'   => esc_html__('Add widgets here.', 'nimmo'),
            'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
            'after_widget'  => '</div></div></section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2><div class="widget-content-inner">',
        ));
    }

    if (class_exists('ReduxFramework')) {
        register_sidebar(array(
            'name'          => esc_html__('Page Sidebar', 'nimmo'),
            'id'            => 'sidebar-page',
            'description'   => esc_html__('Add widgets here.', 'nimmo'),
            'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
            'after_widget'  => '</div></section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ));
        
        $footer_top_column = nimmo_get_opt( 'footer_top_column', '4' );
        for($i = 1 ; $i <= $footer_top_column ; $i++){
            register_sidebar(array(
                'name' => sprintf(esc_html__('Footer Top %s', 'nimmo'), $i),
                'id'            => 'sidebar-footer-' . $i,
                'description'   => esc_html__('Add widgets here.', 'nimmo'),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h2 class="footer-widget-title">',
                'after_title'   => '</h2>',
            ));
        }
    }
}

add_action('widgets_init', 'nimmo_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function nimmo_scripts()
{
    $theme = wp_get_theme(get_template());

    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.0.0');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.7.0');
    wp_enqueue_style('font-awesome-v5', get_template_directory_uri() . '/assets/css/font-awesome5.min.css', array(), '5.8.0' );
    wp_enqueue_style('font-material-icon', get_template_directory_uri() . '/assets/css/material-design-iconic-font.min.css', array(), '2.2.0');
    wp_enqueue_style('flaticon', get_template_directory_uri() . '/assets/css/flaticon.css', array(), '1.0.0');
    wp_enqueue_style('themify-icons', get_template_directory_uri() . '/assets/css/themify-icons.css', array(), '1.0.0');
    wp_enqueue_style('font-etline-icon', get_template_directory_uri() . '/assets/css/et-line.css', array(), '1.0.0');
    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), '1.0.0');
    wp_enqueue_style('nimmo-theme', get_template_directory_uri() . '/assets/css/theme.css', array(), $theme->get('Version'));
    wp_enqueue_style('nimmo-menu', get_template_directory_uri() . '/assets/css/menu.css', array(), $theme->get('Version'));
    wp_enqueue_style('nimmo-style', get_stylesheet_uri());
    wp_enqueue_style('nimmo-google-fonts', nimmo_fonts_url());
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '4.0.0', true);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
    wp_enqueue_script('tilt', get_template_directory_uri() . '/assets/js/tilt.js', array( 'jquery' ), 'all', true);
    wp_enqueue_script('nice-select', get_template_directory_uri() . '/assets/js/nice-select.min.js', array( 'jquery' ), 'all', true);
    wp_enqueue_script('enscroll', get_template_directory_uri() . '/assets/js/enscroll.js', array( 'jquery' ), 'all', true);
    wp_enqueue_script('match-height', get_template_directory_uri() . '/assets/js/match-height-min.js', array( 'jquery' ), '1.0.0', true);
    wp_enqueue_script('nimmo-sidebar-fixed', get_template_directory_uri() . '/assets/js/sidebar-scroll-fixed.js', array( 'jquery' ), '1.0.0', true);
    wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/assets/js/magnific-popup.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('nimmo-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), $theme->get('Version'), true);
    wp_register_script('nimmo-carousel', get_template_directory_uri() . '/assets/js/ct-carousel.js', array('jquery'), $theme->get('Version'), true);
    wp_register_script('nimmo-carousel-filter', get_template_directory_uri() . '/assets/js/owl-filter.js', array('jquery'), $theme->get('Version'), true);
    wp_register_script('nimmo-counter-lib', get_template_directory_uri() . '/assets/js/counter.min.js', array('jquery'), $theme->get('Version'), true);
    wp_register_script('nimmo-counter', get_template_directory_uri() . '/assets/js/ct-counter.js', array('jquery'), $theme->get('Version'), true);
    $smoothscroll = nimmo_get_opt( 'smoothscroll', false );
    if(isset($smoothscroll) && $smoothscroll) {
        wp_enqueue_script('smoothscroll', get_template_directory_uri() . '/assets/js/smoothscroll.min.js', array( 'jquery' ), 'all', true);
    }
    wp_localize_script('nimmo-main','main_data',array('ajax_url'=>admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'nimmo_scripts');

/* add editor styles */
function nimmo_add_editor_styles()
{
    add_editor_style('editor-style.css');
}

add_action('admin_init', 'nimmo_add_editor_styles');

/* add admin styles */
function nimmo_admin_style()
{
    $theme = wp_get_theme(get_template());
    wp_enqueue_style('nimmo-admin-style', get_template_directory_uri() . '/assets/css/admin.css');
    wp_enqueue_style('font-awesome-v5', get_template_directory_uri() . '/assets/css/font-awesome5.min.css', array(), '5.8.0' );
    wp_enqueue_style('font-material-icon', get_template_directory_uri() . '/assets/css/material-design-iconic-font.min.css', array(), '2.2.0');
    wp_enqueue_style('flaticon', get_template_directory_uri() . '/assets/css/flaticon.css', array(), '1.0.0');
    wp_enqueue_style('themify-icons', get_template_directory_uri() . '/assets/css/themify-icons.css', array(), '1.0.0');
    wp_enqueue_style('font-etline-icon', get_template_directory_uri() . '/assets/css/et-line.css', array(), '1.0.0');
}

add_action('admin_enqueue_scripts', 'nimmo_admin_style');

/**
 * Helper functions for this theme.
 */
require_once get_template_directory() . '/inc/template-functions.php';

/**
 * Theme options
 */
require_once get_template_directory() . '/inc/theme-options.php';

/**
 * Page options
 */
require_once get_template_directory() . '/inc/page-options.php';

/**
 * CSS Generator.
 */
if (!class_exists('CSS_Generator')) {
    require_once get_template_directory() . '/inc/classes/class-css-generator.php';
}

/**
 * Breadcrumb.
 */
require_once get_template_directory() . '/inc/classes/class-breadcrumb.php';

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/* Load list require plugins */
require_once( get_template_directory() . '/inc/require.plugins.php' );

/* Load lib Font */
require_once get_template_directory() . '/inc/libs/fontawesome.php';
require_once get_template_directory() . '/inc/libs/materialdesign.php';
require_once get_template_directory() . '/inc/libs/flaticon.php';
require_once get_template_directory() . '/inc/libs/etline.php';
require_once get_template_directory() . '/inc/libs/themify.php';

/**
 * Custom params & remove VC Elements.
 */

function nimmo_vc_after_init()
{

    vc_remove_element("vc_button");
    vc_remove_element("vc_button2");
    vc_remove_element("vc_cta_button");
    vc_remove_element("vc_cta_button2");
    vc_remove_element("vc_cta");
    vc_remove_element("vc_cta");
    vc_remove_element("vc_tabs");
    vc_remove_element("vc_tour");
    vc_remove_element("vc_accordion");
    require_once ( get_template_directory() . '/vc_elements/ct_custom_vc_pagram.php' );

}

add_action('vc_after_init', 'nimmo_vc_after_init');

/**
 * Add new elements for VC
 */
function nimmo_vc_elements()
{

    if (class_exists('CmsShortCode')) {

        cms_require_folder('vc_elements', get_template_directory());
    }
}

add_action('vc_before_init', 'nimmo_vc_elements');

/**
 * Additional widgets for the theme
 */
require_once get_template_directory() . '/widgets/widget-recent-posts.php';
require_once get_template_directory() . '/widgets/widget-getintouch.php';
require_once get_template_directory() . '/widgets/widget-social.php';
if(class_exists('Newsletter')) {
    require_once get_template_directory() . '/widgets/widget-newsletter.php';
}
require_once get_template_directory() . '/widgets/class.widget-extends.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require_once get_template_directory() . '/inc/extends.php';

/**
 * Add custom class in Row Visual Composer
 */
function nimmo_vc_shortcode_css_class( $classes, $settings_base, $atts )
{
    $classes_arr = explode( ' ', $classes );

    if ( 'vc_row' == $settings_base ) {
        if ( $atts['ct_row_class'] ) {
            $classes_arr[] = $atts['ct_row_class'];
        }
        if ( $atts['bg_image_position'] ) {
            $classes_arr[] = $atts['bg_image_position'];
        }
    }

    if ( 'vc_row_inner' == $settings_base ) {
        if ( $atts['row_border_box'] ) {
            $classes_arr[] = $atts['row_border_box'];
        }
    }

    if ( 'vc_column' == $settings_base ) {
        if ( $atts['ct_column_class'] ) {
            $classes_arr[] = $atts['ct_column_class'];
        }
    }

    if ( 'vc_column' == $settings_base ) {
        if ( $atts['ct_column_offset'] ) {
            $classes_arr[] = $atts['ct_column_offset'];
        }
    }

    if ( isset($atts['animation_column']) && $atts['animation_column'] ) {
        wp_enqueue_script( 'waypoints' );
        wp_enqueue_script( 'vc_waypoints' );
        wp_enqueue_style( 'vc_animate-css' );
        $classes_arr[] = 'wpb_animate_when_almost_visible '.' wpb_'.$atts['animation_column'].' '.$atts['animation_column'];
    }

    if ( 'vc_column_inner' == $settings_base ) {
        if ( $atts['ct_column_inner_class'] ) {
            $classes_arr[] = $atts['ct_column_inner_class'];
        }
    }

    if ( 'vc_single_image' == $settings_base ) {
        if ( $atts['ct_image_align'] ) {
            $classes_arr[] = $atts['ct_image_align'];
        }
        if ( $atts['ct_image_align_md'] ) {
            $classes_arr[] = $atts['ct_image_align_md'];
        }
    }

    if ( 'vc_column_text' == $settings_base ) {
        if ( $atts['text_align'] ) {
            $classes_arr[] = $atts['text_align'];
        }
    }

    return implode( ' ', $classes_arr );
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    add_filter( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'nimmo_vc_shortcode_css_class', 10, 3 );
}


if ( ! function_exists( 'nimmo_fonts_url' ) ) :
    /**
     * Register Google fonts.
     *
     * Create your own nimmo_fonts_url() function to override in a child theme.
     *
     * @since league 1.1
     *
     * @return string Google fonts URL for the theme.
     */
    function nimmo_fonts_url()
    {
        $fonts_url = '';
        $fonts     = array();
        $subsets   = 'latin,latin-ext';

        if ( 'off' !== _x( 'on', 'Heebo font: on or off', 'nimmo' ) )
        {
            $fonts[] = 'Heebo:300,400,500,600,700';
        }

        if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'nimmo' ) )
        {
            $fonts[] = 'Roboto:300,400,500,600,700';
        }

        if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'nimmo' ) )
        {
            $fonts[] = 'Poppins:300,400,500,600,700';
        }

        if ( 'off' !== _x( 'on', 'Playfair Display font: on or off', 'nimmo' ) )
        {
            $fonts[] = 'Playfair Display:400,400i,700,700i';
        }

        if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'nimmo' ) )
        {
            $fonts[] = 'Open Sans:400,500,600,700';
        }

        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
                'subset' => urlencode( $subsets ),
            ), 'https://fonts.googleapis.com/css' );
        }

        return $fonts_url;
    }
endif;

/**
 * Commnet Form
 */
function nimmo_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter( 'comment_form_fields', 'nimmo_comment_field_to_bottom' );


/**
 * Add Template Woocommerce
 */
if(class_exists('Woocommerce')){
    require_once( get_template_directory() . '/woocommerce/wc-function-hooks.php' );
}

/* Favicon */
function nimmo_site_favicon(){
    
    $favicon = nimmo_get_opt( 'favicon' );
    
    if(!empty($favicon['url']))
        echo '<link rel="icon" type="image/png" href="'.esc_url($favicon['url']).'"/>';
}
add_action('wp_head', 'nimmo_site_favicon');

/**
 * Menu Item Active on Archive
 */
function nimmo_additional_active_item_classes( $classes = array(), $menu_item = false ) {
    if(class_exists('Woocommerce')){
        $shop_page_ID = get_option( 'woocommerce_shop_page_id' );
        if ( $menu_item->object_id === $shop_page_ID && is_post_type_archive( 'product' ) ) {
            $classes[] = 'current-menu-item';
        }
    }
    return $classes;
}
if(class_exists('Woocommerce')){
    add_filter( 'nav_menu_css_class', 'nimmo_additional_active_item_classes', 10, 2 );
}