<?php
if ( ! class_exists( 'ReduxFrameworkInstances' ) ) {
    return;
}

class CSS_Generator {
    /**
     * scssc class instance
     *
     * @access protected
     * @var scssc
     */
    protected $scssc = null;

    /**
     * ReduxFramework class instance
     *
     * @access protected
     * @var ReduxFramework
     */
    protected $redux = null;

    /**
     * Debug mode is turn on or not
     *
     * @access protected
     * @var boolean
     */
    protected $dev_mode = true;

    /**
     * opt_name of ReduxFramework
     *
     * @access protected
     * @var string
     */
    protected $opt_name = '';

    /**
     * Constructor
     */
    function __construct() {
        $this->opt_name = nimmo_get_opt_name();

        if ( empty( $this->opt_name ) ) {
            return;
        }
        $this->dev_mode = nimmo_get_opt( 'dev_mode', '0' ) === '1' ? true : false;
        add_filter( 'cms_scssc_on', '__return_true' );
        add_action( 'init', array( $this, 'init' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ), 20 );
    }

    /**
     * init hook - 10
     */
    function init() {
        if ( ! class_exists( 'scssc' ) ) {
            return;
        }

        $this->redux = ReduxFrameworkInstances::get_instance( $this->opt_name );

        if ( empty( $this->redux ) || ! $this->redux instanceof ReduxFramework ) {
            return;
        }
        add_action( 'wp', array( $this, 'generate_with_dev_mode' ) );
        add_action( "redux/options/{$this->opt_name}/saved", function () {
            $this->generate_file();
        } );
    }

    function generate_with_dev_mode() {
        if ( $this->dev_mode === true ) {
            $this->generate_file();
        }
    }

    /**
     * Generate options and css files
     */
    function generate_file() {
        $scss_dir = get_template_directory() . '/assets/scss/';
        $css_dir  = get_template_directory() . '/assets/css/';

        $this->scssc = new scssc();
        $this->scssc->setImportPaths( $scss_dir );

        $_options = $scss_dir . 'variables.scss';

        $this->redux->filesystem->execute( 'put_contents', $_options, array(
            'content' => preg_replace( "/(?<=[^\r]|^)\n/", "\r\n", $this->options_output() )
        ) );
        $css_file = $css_dir . 'theme.css';

        $this->scssc->setFormatter( 'scss_formatter' );
        $this->redux->filesystem->execute( 'put_contents', $css_file, array(
            'content' => preg_replace( "/(?<=[^\r]|^)\n/", "\r\n", $this->scssc->compile( '@import "theme.scss"' ) )
        ) );
    }

    /**
     * Output options to _variables.scss
     *
     * @access protected
     * @return string
     */
    protected function options_output()
    {
        ob_start();

        $primary_color = nimmo_get_opt( 'primary_color', '#0674fd' );
        if ( ! nimmo_is_valid_color( $primary_color ) )
        {
            $primary_color = '#0674fd';
        }
        printf( '$primary_color: %s;', esc_attr( $primary_color ) );

        $secondary_color = nimmo_get_opt( 'secondary_color', '#00d0f9' );
        if ( ! nimmo_is_valid_color( $secondary_color ) )
        {
            $secondary_color = '#00d0f9';
        }
        printf( '$secondary_color: %s;', esc_attr( $secondary_color ) );

        $third_color = nimmo_get_opt( 'third_color', '#79CD1C' );
        if ( ! nimmo_is_valid_color( $third_color ) )
        {
            $third_color = '#79CD1C';
        }
        printf( '$third_color: %s;', esc_attr( $third_color ) );

        $link_color = nimmo_get_opt( 'link_color', '#0674fd' );
        if ( !empty($link_color['regular']) && isset($link_color['regular']) )
        {
            printf( '$link_color: %s;', esc_attr( $link_color['regular'] ) );
        } else {
            echo '$link_color: #0674fd;';
        }

        $link_color_hover = nimmo_get_opt( 'link_color', '#00d0f9' );
        if ( !empty($link_color['hover']) && isset($link_color['hover']) )
        {
            printf( '$link_color_hover: %s;', esc_attr( $link_color['hover'] ) );
        } else {
            echo '$link_color_hover: #00d0f9;';
        }

        $link_color_active = nimmo_get_opt( 'link_color', '#00d0f9' );
        if ( !empty($link_color['active']) && isset($link_color['active']) )
        {
            printf( '$link_color_active: %s;', esc_attr( $link_color['active'] ) );
        } else {
            echo '$link_color_active: #00d0f9;';
        }

        /* Gradient Color 1 */
        $gradient_color = nimmo_get_opt( 'gradient_color' );
        if ( !empty($gradient_color['from']) && isset($gradient_color['from']) )
        {
            printf( '$gradient_color_from: %s;', esc_attr( $gradient_color['from'] ) );
        } else {
            echo '$gradient_color_from: '.$primary_color.';';
        }
        if ( !empty($gradient_color['to']) && isset($gradient_color['to']) )
        {
            printf( '$gradient_color_to: %s;', esc_attr( $gradient_color['to'] ) );
        } else {
            echo '$gradient_color_to: '.$primary_color.';';
        }

        /* Gradient Color 2 */
        $gradient_color2 = nimmo_get_opt( 'gradient_color2' );
        if ( !empty($gradient_color2['from']) && isset($gradient_color2['from']) )
        {
            printf( '$gradient_color_from2: %s;', esc_attr( $gradient_color2['from'] ) );
        } else {
            echo '$gradient_color_from2: '.$primary_color.';';
        }
        if ( !empty($gradient_color2['to']) && isset($gradient_color2['to']) )
        {
            printf( '$gradient_color_to2: %s;', esc_attr( $gradient_color2['to'] ) );
        } else {
            echo '$gradient_color_to2: '.$primary_color.';';
        }

        /* Gradient Color 3 */
        $gradient_color3 = nimmo_get_opt( 'gradient_color3' );
        if ( !empty($gradient_color3['from']) && isset($gradient_color3['from']) )
        {
            printf( '$gradient_color_from3: %s;', esc_attr( $gradient_color3['from'] ) );
        } else {
            echo '$gradient_color_from3: '.$primary_color.';';
        }
        if ( !empty($gradient_color3['to']) && isset($gradient_color3['to']) )
        {
            printf( '$gradient_color_to3: %s;', esc_attr( $gradient_color3['to'] ) );
        } else {
            echo '$gradient_color_to3: '.$primary_color.';';
        }

        /* Font */
        $body_default_font = nimmo_get_opt( 'body_default_font', 'Roboto' );
        if (isset($body_default_font)) {
            echo '
                $body_default_font: '.esc_attr( $body_default_font ).';
            ';
        }

        $heading_default_font = nimmo_get_opt( 'heading_default_font', 'Poppins' );
        if (isset($heading_default_font)) {
            echo '
                $heading_default_font: '.esc_attr( $heading_default_font ).';
            ';
        }

        return ob_get_clean();
    }

    /**
     * Hooked wp_enqueue_scripts - 20
     * Make sure that the handle is enqueued from earlier wp_enqueue_scripts hook.
     */
    function enqueue() {
        $css = $this->inline_css();
        $this->dev_mode = true;
        if ( ! empty( $css ) ) {
            wp_add_inline_style( 'nimmo-theme', $this->dev_mode ? $css : nimmo_css_minifier( $css ) );
        }
    }

    /**
     * Generate inline css based on theme options
     */
    protected function inline_css() {
        ob_start();
        /* BG Body */
        $body_background = nimmo_get_opt( 'body_background' );
        $layout_boxed = nimmo_get_opt( 'layout_boxed', false );
        $layout_boxed_page = nimmo_get_page_opt( 'layout_boxed', false );
        if($layout_boxed_page) {
            $layout_boxed = $layout_boxed_page;
        }
        if($layout_boxed && isset($body_background)) {
            echo 'body {
                background-color: '.esc_attr( $body_background['background-color'] ).';
                background-size: '.esc_attr( $body_background['background-size'] ).';
                background-attachment: '.esc_attr( $body_background['background-attachment'] ).';
                background-repeat: '.esc_attr( $body_background['background-repeat'] ).';
                background-position: '.esc_attr( $body_background['background-position'] ).';
                background-image: url('.esc_attr( $body_background['background-image'] ).');
            }';
        }

        $show_page_loading = nimmo_get_opt( 'show_page_loading', false );
        $bg_color_loading = nimmo_get_opt( 'bg_color_loading' );
        if ( $show_page_loading && !empty( $bg_color_loading ) ) {
            printf( 'body #ct-loadding { background-color: %s !important; background-image: none !important; }', esc_attr($bg_color_loading) );
        }

        /* Header */
        $header_bgcolor = nimmo_get_opt( 'header_bgcolor' );
        $custom_header = nimmo_get_page_opt( 'custom_header' );
        $header_bgcolor_page = nimmo_get_page_opt( 'header_bgcolor' );
        if($custom_header && !empty($header_bgcolor_page)) {
            $header_bgcolor = $header_bgcolor_page;
        }
        $header_bgcolor_sticky = nimmo_get_opt( 'header_bgcolor_sticky' );
        $main_menu_color_sticky = nimmo_get_opt( 'main_menu_color_sticky' ); 
        if ( !empty( $header_bgcolor_sticky ) ) {
            printf( '#header-wrap.is-sticky #header-main.h-fixed, #header-wrap.is-sticky-offset #header-main.h-fixed { background-color: %s !important; background-image: none !important; }', esc_attr($header_bgcolor_sticky) );
        } ?>
        @media screen and (min-width: 992px) {
            <?php if ( !empty( $main_menu_color_sticky['regular'] ) ) {
                printf( '#header-main.h-fixed .primary-menu > li > a, #header-main.h-fixed .hidden-sidebar-icon { color: %s !important; }', esc_attr($main_menu_color_sticky['regular']) );
            }
            if ( !empty( $main_menu_color_sticky['hover'] ) ) {
                printf( '#header-main.h-fixed .primary-menu > li > a:hover, #header-main.h-fixed .hidden-sidebar-icon:hover { color: %s !important; }', esc_attr($main_menu_color_sticky['hover']) );
            }
            if ( !empty( $main_menu_color_sticky['active'] ) ) {
                printf( '#header-main.h-fixed .primary-menu > li > a.current, #header-main.h-fixed .primary-menu > li.current_page_item > a, #header-main.h-fixed .primary-menu > li.current-menu-item > a, #header-main.h-fixed .primary-menu > li.current_page_ancestor > a, #header-main.h-fixed .primary-menu > li.current-menu-ancestor > a { color: %s !important; }', esc_attr($main_menu_color_sticky['active']) );
            } 
            if ( !empty( $header_bgcolor ) ) {
                printf( '#header-wrap:not(.header-layout5) #header-main:not(.h-fixed) { background-color: %s !important; background-image: none !important; }', esc_attr($header_bgcolor) );
                printf( '#header-wrap.header-layout5 #header-main .header-navigation::before, #header-wrap.header-layout5 #header-main .primary-menu > li .sub-menu { background-color: %s !important; }', esc_attr($header_bgcolor) );
            }
            ?>
        }
        <?php 

        $main_menu_color_sub = nimmo_get_opt( 'main_menu_color_sub' );
        if ( !empty( $main_menu_color_sub['regular'] ) ) {
            echo '@media screen and (min-width: 992px) {';
                printf( '.primary-menu .sub-menu li a { color: %s !important; }', esc_attr($main_menu_color_sub['regular']) );
            echo '}';
        }
        if ( !empty( $main_menu_color_sub['hover'] ) ) {
            echo '@media screen and (min-width: 992px) {';
                printf( '.primary-menu .sub-menu li > a:hover { color: %s !important; }', esc_attr($main_menu_color_sub['hover']) );
                printf( '.primary-menu .sub-menu li > a:before { background-color: %s !important; }', esc_attr($main_menu_color_sub['hover']) );
            echo '}';
        }
        if ( !empty( $main_menu_color_sub['active'] ) ) {
            echo '@media screen and (min-width: 992px) {';
                printf( '.primary-menu .sub-menu li.current_page_item > a, .primary-menu .sub-menu li.current-menu-item > a, .primary-menu .sub-menu li.current_page_ancestor > a, .primary-menu .sub-menu li.current-menu-ancestor > a, .primary-menu .sub-menu li.current-menu-parent > a { color: %s !important; }', esc_attr($main_menu_color_sub['active']) );
                printf( '.primary-menu .sub-menu li.current_page_item > a:before, .primary-menu .sub-menu li.current-menu-item > a:before, .primary-menu .sub-menu li.current_page_ancestor > a:before, .primary-menu .sub-menu li.current-menu-ancestor > a:before, .primary-menu .sub-menu li.current-menu-parent > a:before { background-color: %s !important; }', esc_attr($main_menu_color_sub['active']) );
            echo '}';
        } ?>

        <?php /* Logo */
        $logo_maxh = nimmo_get_opt( 'logo_maxh' );

        if (!empty($logo_maxh['height']) && $logo_maxh['height'] != 'px')
        {
            printf( '#header-wrap .header-branding a img { max-height: %s !important; }', esc_attr($logo_maxh['height']) );
        }

        $logo_maxh_sticky = nimmo_get_opt( 'logo_maxh_sticky' );

        if (!empty($logo_maxh_sticky['height']) && $logo_maxh_sticky['height'] != 'px')
        {
            printf( '#header-wrap .header-main.h-fixed .header-branding a img { max-height: %s !important; }', esc_attr($logo_maxh_sticky['height']) );
        }

        $hidden_sidebar_logo_maxh = nimmo_get_opt( 'hidden_sidebar_logo_maxh' );

        if (!empty($hidden_sidebar_logo_maxh['height']) && $hidden_sidebar_logo_maxh['height'] != 'px')
        {
            printf( '.hidden-sidebar .hidden-sidebar-inner .hidden-sidebar-logo img { max-height: %s; }', esc_attr($hidden_sidebar_logo_maxh['height']) );
        } ?>
        
        @media screen and (max-width: 1199px) {
        <?php
            $logo_maxh_sm = nimmo_get_opt( 'logo_maxh_sm' );
            if ( ! empty( $logo_maxh_sm['height'] ) && $logo_maxh_sm['height'] != 'px' ) {
                printf( '#header-wrap .header-branding a img { max-height: %s !important; }', esc_attr( $logo_maxh_sm['height'] ) );
            }

            $pagetitle = nimmo_get_opt( 'ptitle_on', false );
            $page_title_padding_sm = nimmo_get_opt( 'page_title_padding_sm' );
            if( $pagetitle && !empty($page_title_padding_sm['padding-top']) ) {
                printf( 'body #pagetitle { padding-top: %s !important; }', esc_attr( $page_title_padding_sm['padding-top'] ) );
            }
            if( $pagetitle && !empty($page_title_padding_sm['padding-bottom']) ) {
                printf( 'body #pagetitle { padding-bottom: %s !important; }', esc_attr( $page_title_padding_sm['padding-bottom'] ) );
            }
            
            ?>
        }
        <?php /* End Logo */

        $mobile_header_bgcolor = nimmo_get_opt( 'mobile_header_bgcolor' );
        if(!empty($mobile_header_bgcolor)) {
            echo '@media screen and (max-width: 1199px) {';
                echo 'body #header-wrap #header-main {
                    background-color: '.esc_attr( $mobile_header_bgcolor ).' !important;
                }';
            echo '}';
        }

        $mobile_icon_menu_color = nimmo_get_opt( 'mobile_icon_menu_color' );
        if(!empty($mobile_icon_menu_color)) {
            echo '@media screen and (max-width: 1199px) {';
                echo '#main-menu-mobile .btn-nav-mobile::before, #main-menu-mobile .btn-nav-mobile::after, #main-menu-mobile .btn-nav-mobile span {
                    background-color: '.esc_attr( $mobile_icon_menu_color ).' !important;
                }';
            echo '}';
        }

        $header_menu_bgcolor = nimmo_get_opt( 'header_menu_bgcolor' );
        if(!empty($header_menu_bgcolor)) {
            echo '@media screen and (max-width: 1199px) {';
                echo '.header-navigation .main-navigation {
                    background-color: '.esc_attr( $header_menu_bgcolor ).' !important;
                }';
                echo '.primary-menu > li > a:hover, .primary-menu > li > a.current {
                    background-color: transparent;
                }';
            echo '}';
        }

        $main_menu_color_mobile = nimmo_get_opt( 'main_menu_color_mobile' );
        if(!empty($main_menu_color_mobile["regular"])) {
            echo '@media screen and (max-width: 1199px) {';
                echo '.primary-menu li a, .main-menu-toggle::before {
                    color: '.esc_attr( $main_menu_color_mobile["regular"] ).' !important;
                }';
            echo '}';
        }
        if(!empty($main_menu_color_mobile["hover"])) {
            echo '@media screen and (max-width: 1199px) {';
                echo '.primary-menu li a:hover {
                    color: '.esc_attr( $main_menu_color_mobile["hover"] ).' !important;
                }';
            echo '}';
        }
        if(!empty($main_menu_color_mobile["active"])) {
            echo '@media screen and (max-width: 1199px) {';
                echo '.primary-menu > li > a.current {
                    color: '.esc_attr( $main_menu_color_mobile["active"] ).' !important;
                }';
            echo '}';
        }

        /* Menu */ ?>
        @media screen and (min-width: 992px) {
            <?php $menu_text_transform = nimmo_get_opt( 'menu_text_transform' );
            if ( !empty( $menu_text_transform ) ) {
                printf( '.primary-menu > li > a { text-transform: %s !important; }', esc_attr($menu_text_transform) );
            }
            $menu_font_size = nimmo_get_opt( 'menu_font_size' );
            if ( !empty( $menu_font_size ) ) {
                printf( '.primary-menu > li > a { font-size: %s'.'px !important; }', esc_attr($menu_font_size) );
            }
            $main_menu_color = nimmo_get_opt( 'main_menu_color' );
            if ( !empty( $main_menu_color['regular'] ) ) {
                printf( '.primary-menu > li > a, #header-main:not(.h-fixed) .hidden-sidebar-icon { color: %s !important; }', esc_attr($main_menu_color['regular']) );
            }
            if ( !empty( $main_menu_color['hover'] ) ) {
                printf( '.primary-menu > li > a:hover, #header-main:not(.h-fixed) .hidden-sidebar-icon:hover { color: %s !important; }', esc_attr($main_menu_color['hover']) );
            }
            if ( !empty( $main_menu_color['active'] ) ) {
                printf( 'body.home .primary-menu > li > a.current, .primary-menu > li.current_page_item > a, .primary-menu > li.current-menu-item > a, .primary-menu > li.current_page_ancestor > a, .primary-menu > li.current-menu-ancestor > a { color: %s !important; }', esc_attr($main_menu_color['active']) );
            } 
            $menu_line_color = nimmo_get_opt( 'menu_line_color' );
            if ( !empty( $menu_line_color ) ) {
                printf( '#header-wrap #header-main .primary-menu > li > a::before { background-color: %s !important; }', esc_attr($menu_line_color) );
            }
            ?>
        } 
        <?php $header_layout = nimmo_get_opt( 'header_layout', '1' );
        $main_menu_bgcolor = nimmo_get_opt( 'main_menu_bgcolor' );
        if($header_layout == '8' && !empty( $main_menu_bgcolor['hover'] ) ) {
            printf( '.header-layout8 .primary-menu > li > a:hover { background-color: %s !important; }', esc_attr($main_menu_bgcolor['hover']) );
        }
        if($header_layout == '8' && !empty( $main_menu_bgcolor['active'] ) ) {
            printf( '.header-layout8 .primary-menu > li > a.current, .header-layout8 .primary-menu > li.current_page_item > a, .header-layout8 .primary-menu > li.current-menu-item > a, .header-layout8 .primary-menu > li.current_page_ancestor > a, .header-layout8 .primary-menu > li.current-menu-ancestor > a { background-color: %s !important; }', esc_attr($main_menu_bgcolor['active']) );
        }

        /* Footer */
        $footer_bg = nimmo_get_opt( 'footer_bg' );
        $footer_bg_color_top = nimmo_get_opt( 'footer_bg_color_top' );
        $footer_top_heading_color = nimmo_get_opt( 'footer_top_heading_color' );
        $footer_top_heading_fs = nimmo_get_opt( 'footer_top_heading_fs' );
        $footer_top_paddings = nimmo_get_opt( 'footer_top_paddings' );
        if(!empty($footer_bg['background-color'])) {
            echo '.site-layout-default .site-footer {
                margin-top: 0px;
            }';
            echo '.site-layout-default .site-footer:before {
                display: none;
            }';
        }
        if(!empty($footer_bg_color_top)) {
            echo '.site-footer:before {
                background-color: '.esc_attr( $footer_bg_color_top['rgba'] ).' !important;
            }';
        }
        if(!empty($footer_top_heading_color)) {
            echo '.top-footer .footer-widget-title {
                color: '.esc_attr( $footer_top_heading_color ).' !important;
            }';
        }
        if(!empty($footer_top_heading_fs)) {
            echo '.top-footer .footer-widget-title {
                font-size: '.esc_attr( $footer_top_heading_fs ).'px !important;
            }';
        }
        if ( isset($footer_top_paddings) && !empty($footer_top_paddings) ) {
            if(!empty($footer_top_paddings['padding-top'])) {
                echo ".site-footer {
                    padding-top:" .esc_attr($footer_top_paddings['padding-top']). " !important;
                }";
            }
            if(!empty($footer_top_paddings['padding-bottom'])) {
                echo ".site-footer .top-footer {
                    padding-bottom:" .esc_attr($footer_top_paddings['padding-bottom']). " !important;
                }";
            }
        }

        /* Content */
        $post_text_align = nimmo_get_opt( 'post_text_align', 'inherit' );
        if($post_text_align == 'justify') {
            echo '.single-post .content-area .entry-content p {
                text-align: justify;
            }';
        }

        /* Shop Style */
        $content_padding = nimmo_get_page_opt( 'content_padding' );
        if(!empty($content_padding['padding-top'])) {
            echo ".post-type-archive-product #content {
                padding-top:" .esc_attr($content_padding['padding-top']). ";
            }";
        }
        if(!empty($content_padding['padding-bottom'])) {
            echo ".post-type-archive-product #content {
                padding-bottom:" .esc_attr($content_padding['padding-bottom']). ";
            }";
        }
        $content_bg_color = nimmo_get_page_opt( 'content_bg_color' );
        if(!empty($content_bg_color['rgba'])) {
            echo ".post-type-archive-product #content {
                background-color:" .esc_attr($content_bg_color['rgba']). ";
            }";
        }
        
        /* Footer */
        $footer_top_link_color = nimmo_get_page_opt( 'footer_top_link_color' );
        if(!empty($footer_top_link_color['hover'])) {

            echo '.contact-info ul li i, .site-footer .top-footer ul.menu li a::before,
            .site-footer .bottom-footer .footer-social a:hover,
            .site-footer .top-footer #ctf.ctf .ctf-author-name::before,
            .site-footer .top-footer #ctf.ctf .ctf-author-name:hover {
                color: '.esc_attr( $footer_top_link_color['hover'] ).';
            }';
        }

        /* Custom Css */
        $custom_css = nimmo_get_opt( 'site_css' );
        if(!empty($custom_css)) { echo esc_attr($custom_css); }

        return ob_get_clean();
    }
}

new CSS_Generator();