<?php
if (!class_exists('ReduxFramework')) {
    return;
}
if (class_exists('ReduxFrameworkPlugin')) {
    remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
}

if(class_exists('Newsletter')) {
    $forms = array_filter( (array) get_option( 'newsletter_forms', array() ) );

    $newsletter_forms = array(
        'default' => esc_html__( 'Default Form', 'nimmo' )
    );

    if ( $forms )
    {
        $index = 1;
        foreach ( $forms as $key => $form )
        {
            $newsletter_forms[ $key ] = sprintf( esc_html__( 'Form %s', 'nimmo' ), $index );
            $index ++;
        }
    }
} else {
    $newsletter_forms = '';
}

$opt_name = nimmo_get_opt_name();
$theme = wp_get_theme();

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => $theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version'      => $theme->get('Version'),
    // Version that appears at the top of your panel
    'menu_type'            => class_exists('CaseThemeCore') ? 'submenu' : '',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => esc_html__('Theme Options', 'nimmo'),
    'page_title'           => esc_html__('Theme Options', 'nimmo'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => false,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-admin-generic',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => true,
    // Show the time the page took to load, etc
    'update_notice'        => true,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
    'show_options_object' => false,
    // OPTIONAL -> Give you extra features
    'page_priority'        => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => class_exists('CaseThemeCore') ? $theme->get('TextDomain') : '',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => 'theme-options',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'red',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    ),
    'templates_path'       => class_exists('CaseThemeCore') ? casethemescore()->path('APP_DIR') . '/templates/redux/' : '',
);

Redux::SetArgs($opt_name, $args);

/*--------------------------------------------------------------
# General
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('General', 'nimmo'),
    'icon'   => 'el-icon-home',
    'fields' => array(
        array(
            'id'       => 'show_page_loading',
            'type'     => 'switch',
            'title'    => esc_html__('Enable Page Loading', 'nimmo'),
            'subtitle' => esc_html__('Enable page loading effect when you load site.', 'nimmo'),
            'default'  => false
        ),
        array(
            'id'       => 'loading_type',
            'type'     => 'select',
            'title'    => esc_html__('Loading Style', 'nimmo'),
            'options'  => array(
                'style1'  => esc_html__('Style 1', 'nimmo'),
                'style2'  => esc_html__('Style 2', 'nimmo'),
                'style3'  => esc_html__('Style 3', 'nimmo'),
                'style4'  => esc_html__('Style 4', 'nimmo'),
                'style5'  => esc_html__('Style 5', 'nimmo'),
                'style6'  => esc_html__('Style 6', 'nimmo'),
                'style7'  => esc_html__('Style 7', 'nimmo'),
                'style8'  => esc_html__('Style 8', 'nimmo'),
            ),
            'default'  => 'style1',
            'required' => array( 0 => 'show_page_loading', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
        array(
            'id'          => 'bg_color_loading',
            'type'        => 'color',
            'title'       => esc_html__('Background Color Loading', 'nimmo'),
            'transparent' => false,
            'default'     => '',
            'required' => array( 0 => 'show_page_loading', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
        array(
            'id'       => 'smoothscroll',
            'type'     => 'switch',
            'title'    => esc_html__('Smooth Scroll', 'nimmo'),
            'default'  => false
        ),
        array(
            'id'       => 'layout_boxed',
            'type'     => 'switch',
            'title'    => esc_html__('Layout Boxed', 'nimmo'),
            'default'  => false
        ),
        array(
            'id'       => 'body_background',
            'type'     => 'background',
            'title'    => esc_html__('Body Boxed Background', 'nimmo'),
            'required' => array( 0 => 'layout_boxed', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
        array(
            'id'       => 'dev_mode',
            'type'     => 'switch',
            'title'    => esc_html__('Dev Mode (not recommended)', 'nimmo'),
            'description' => 'no minimize , generate css over time...',
            'default'  => false
        ),
        array(
            'id'       => 'favicon',
            'type'     => 'media',
            'title'    => esc_html__('Favicon', 'nimmo'),
            'default' => ''
        ),
    )
));

/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Header', 'nimmo'),
    'icon'   => 'el-icon-website',
    'fields' => array(
        array(
            'id'       => 'header_layout',
            'type'     => 'image_select',
            'title'    => esc_html__('Layout', 'nimmo'),
            'subtitle' => esc_html__('Select a layout for header.', 'nimmo'),
            'options'  => array(
                '1' => get_template_directory_uri() . '/assets/images/header-layout/h1.jpg',
                '2' => get_template_directory_uri() . '/assets/images/header-layout/h2.jpg',
                '3' => get_template_directory_uri() . '/assets/images/header-layout/h3.jpg',
                '4' => get_template_directory_uri() . '/assets/images/header-layout/h4.jpg',
                '5' => get_template_directory_uri() . '/assets/images/header-layout/h5.jpg',
                '6' => get_template_directory_uri() . '/assets/images/header-layout/h6.jpg',
                '7' => get_template_directory_uri() . '/assets/images/header-layout/h7.jpg',
                '8' => get_template_directory_uri() . '/assets/images/header-layout/h8.jpg',
                '9' => get_template_directory_uri() . '/assets/images/header-layout/h9.jpg',
            ),
            'default'  => '1'
        ),
        array(
            'id'       => 'header_menu_line',
            'type'     => 'switch',
            'title'    => esc_html__('Header Menu Line', 'nimmo'),
            'default'  => false,
            'required'     => array( 0 => 'header_layout', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
        array(
            'id'       => 'header_type',
            'type'     => 'button_set',
            'title'    => esc_html__('Header Type', 'nimmo'),
            'options'  => array(
                'light'  => esc_html__('Light', 'nimmo'),
                'dark'  => esc_html__('Dark', 'nimmo'),
            ),
            'default'  => 'light',
            'required'     => array( 0 => 'header_layout', 1 => 'equals', 2 => '3' ),
            'force_output' => true
        ),
        array(
            'id'       => 'get_revslide',
            'type'     => 'select',
            'title'    => esc_html__('Select Slider Revolution', 'nimmo'),
            'options'  => nimmo_build_shortcode_rev_slider(),
            'default'  => '',
            'required'     => array( 0 => 'header_layout', 1 => 'equals', 2 => '4' ),
            'force_output' => true
        ),
        array(
            'id'       => 'sticky_on',
            'type'     => 'switch',
            'title'    => esc_html__('Sticky Header', 'nimmo'),
            'subtitle' => esc_html__('Header will be sticked when applicable.', 'nimmo'),
            'default'  => false
        ),
        array(
            'id'          => 'header_bgcolor',
            'type'        => 'color',
            'title'       => esc_html__('Background Color', 'nimmo'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'       => 'hidden_sidebar_on',
            'type'     => 'switch',
            'title'    => esc_html__('Icon Hidden Sidebar', 'nimmo'),
            'default'  => false
        ),
        array(
            'id'       => 'cart_icon',
            'type'     => 'switch',
            'title'    => esc_html__('Icon Cart Shop', 'nimmo'),
            'default'  => false
        ),
        array(
            'id'       => 'hidden_sidebar_logo_maxh',
            'type'     => 'dimensions',
            'title'    => esc_html__('Logo Max Height for Hidden Sidebar', 'nimmo'),
            'width'    => false,
            'unit'     => 'px',
            'required' => array( 0 => 'hidden_sidebar_on', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),

    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Top Bar', 'nimmo'),
    'icon'       => 'el el-credit-card',
    'subsection' => true,
    'fields'     => array(
        array(
            'id' => 'h_phone_label',
            'type' => 'text',
            'title' => esc_html__('Phone Number Label', 'nimmo'),
            'default' => '',
            'subtitle' => esc_html__('Apply header layout 7, layout 9.', 'nimmo'),
        ),
        array(
            'id' => 'h_phone',
            'type' => 'text',
            'title' => esc_html__('Phone Number', 'nimmo'),
            'default' => '',
            'subtitle' => esc_html__('Apply header layout 7, layout 9.', 'nimmo'),
        ),
        array(
            'id' => 'h_phone_link',
            'type' => 'text',
            'title' => esc_html__('Phone Link', 'nimmo'),
            'default' => '',
            'subtitle' => esc_html__('Apply header layout 7, layout 9.', 'nimmo'),
        ),
        array(
            'id' => 'h_address_label',
            'type' => 'text',
            'title' => esc_html__('Address Label', 'nimmo'),
            'default' => '',
            'subtitle' => esc_html__('Apply header layout 7.', 'nimmo'),
        ),
        array(
            'id' => 'h_address',
            'type' => 'text',
            'title' => esc_html__('Address', 'nimmo'),
            'default' => '',
            'subtitle' => esc_html__('Apply header layout 7.', 'nimmo'),
        ),
        array(
            'id' => 'h_time_label',
            'type' => 'text',
            'title' => esc_html__('Time Label', 'nimmo'),
            'default' => '',
            'subtitle' => esc_html__('Apply header layout 7.', 'nimmo'),
        ),
        array(
            'id' => 'h_time',
            'type' => 'text',
            'title' => esc_html__('Time', 'nimmo'),
            'default' => '',
            'subtitle' => esc_html__('Apply header layout 7.', 'nimmo'),
        ),
        array(
            'id' => 'h_email_label',
            'type' => 'text',
            'title' => esc_html__('Email Label', 'nimmo'),
            'default' => '',
            'subtitle' => esc_html__('Apply header layout 7, layout 9.', 'nimmo'),
        ),
        array(
            'id' => 'h_email',
            'type' => 'text',
            'title' => esc_html__('Email', 'nimmo'),
            'default' => '',
            'subtitle' => esc_html__('Apply header layout 7, layout 9.', 'nimmo'),
        ),
        array(
            'id' => 'h_email_link',
            'type' => 'text',
            'title' => esc_html__('Email Link', 'nimmo'),
            'default' => '',
            'subtitle' => esc_html__('Apply header layout 7, layout 9.', 'nimmo'),
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Logo', 'nimmo'),
    'icon'       => 'el el-picture',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'logo_dark',
            'type'     => 'media',
            'title'    => esc_html__('Logo Dark', 'nimmo'),
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/logo-dark.png'
            )
        ),
        array(
            'id'       => 'logo',
            'type'     => 'media',
            'title'    => esc_html__('Logo Light', 'nimmo'),
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/logo-light.png'
            )
        ),
        array(
            'id'       => 'logo_sticky',
            'type'     => 'media',
            'title'    => esc_html__('Logo Sticky', 'nimmo'),
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/logo-sticky.png'
            )
        ),
        array(
            'id'       => 'logo_mobile',
            'type'     => 'media',
            'title'    => esc_html__('Logo Mobile', 'nimmo'),
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/logo-light.png'
            )
        ),
        array(
            'id'       => 'logo_maxh',
            'type'     => 'dimensions',
            'title'    => esc_html__('Logo Max Height', 'nimmo'),
            'width'    => false,
            'unit'     => 'px'
        ),
        array(
            'id'       => 'logo_maxh_sticky',
            'type'     => 'dimensions',
            'title'    => esc_html__('Logo Max Height - Sticky', 'nimmo'),
            'width'    => false,
            'unit'     => 'px'
        ),
        array(
            'id'       => 'logo_maxh_sm',
            'type'     => 'dimensions',
            'title'    => esc_html__('Logo Max Height - Mobile, Tablet', 'nimmo'),
            'width'    => false,
            'unit'     => 'px'
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Navigation', 'nimmo'),
    'icon'       => 'el el-lines',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'          => 'font_menu',
            'type'        => 'typography',
            'title'       => esc_html__('Custom Google Font', 'nimmo'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'font-style'  => false,
            'font-weight'  => true,
            'text-align'  => false,
            'font-size'  => false,
            'line-height'  => false,
            'color'  => false,
            'output'      => array('.primary-menu li a'),
            'units'       => 'px',
        ),
        array(
            'id'       => 'menu_font_size',
            'type'     => 'text',
            'title'    => esc_html__('Font Size', 'nimmo'),
            'validate' => 'numeric',
            'desc'     => 'Enter number',
            'msg'      => 'Please enter number',
            'default'  => ''
        ),
        array(
            'id'       => 'menu_text_transform',
            'type'     => 'select',
            'title'    => esc_html__('Text Transform', 'nimmo'),
            'options'  => array(
                ''  => esc_html__('Capitalize', 'nimmo'),
                'uppercase' => esc_html__('Uppercase', 'nimmo'),
                'lowercase'  => esc_html__('Lowercase', 'nimmo'),
                'initial'  => esc_html__('Initial', 'nimmo'),
                'inherit'  => esc_html__('Inherit', 'nimmo'),
                'none'  => esc_html__('None', 'nimmo'),
            ),
            'default'  => ''
        ),
        array(
            'id'      => 'main_menu_color',
            'type'    => 'link_color',
            'title'   => esc_html__('Menu Item Color', 'nimmo'),
            'default' => array(
                'regular' => '',
                'hover'   => '',
                'active'   => '',
            ),
        ),
        array(
            'id'      => 'main_menu_color_sub',
            'type'    => 'link_color',
            'title'   => esc_html__('Menu Item Color - Sub Level', 'nimmo'),
            'default' => array(
                'regular' => '',
                'hover'   => '',
                'active'   => '',
            ),
        ),
        array(
            'id'          => 'menu_line_color',
            'type'        => 'color',
            'title'       => esc_html__('Menu Line Color', 'nimmo'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'      => 'main_menu_bgcolor',
            'type'    => 'link_color',
            'regular'    => false,
            'title'   => esc_html__('Menu Item Background Color', 'nimmo'),
            'default' => array(
                'hover'   => '',
                'active'   => '',
            ),
            'required' => array( 0 => 'header_layout', 1 => 'equals', 2 => '8' ),
            'force_output' => true
        ),
        array(
            'title' => esc_html__('Button Navigation', 'nimmo'),
            'type'  => 'section',
            'id' => 'button_navigation',
            'indent' => true,
        ),
        array(
            'id' => 'h_btn_text',
            'type' => 'text',
            'title' => esc_html__('Button Text', 'nimmo'),
            'default' => '',
        ),
        array(
            'id'       => 'h_btn_link_type',
            'type'     => 'button_set',
            'title'    => esc_html__('Button Link Type', 'nimmo'),
            'options'  => array(
                'page'  => esc_html__('Page', 'nimmo'),
                'custom'  => esc_html__('Custom', 'nimmo')
            ),
            'default'  => 'page',
        ),
        array(
            'id'    => 'h_btn_link',
            'type'  => 'select',
            'title' => esc_html__( 'Page Link', 'nimmo' ), 
            'data'  => 'page',
            'args'  => array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
            ),
            'required' => array( 0 => 'h_btn_link_type', 1 => 'equals', 2 => 'page' ),
            'force_output' => true
        ),
        array(
            'id' => 'h_btn_link_custom',
            'type' => 'text',
            'title' => esc_html__('Custom Link', 'nimmo'),
            'default' => '',
            'required' => array( 0 => 'h_btn_link_type', 1 => 'equals', 2 => 'custom' ),
            'force_output' => true
        ),
        array(
            'id'       => 'h_btn_target',
            'type'     => 'button_set',
            'title'    => esc_html__('Button Target', 'nimmo'),
            'options'  => array(
                '_self'  => esc_html__('Self', 'nimmo'),
                '_blank'  => esc_html__('Blank', 'nimmo')
            ),
            'default'  => '_self',
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Header Sticky', 'nimmo'),
    'icon'       => 'el el-circle-arrow-down',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'          => 'header_bgcolor_sticky',
            'type'        => 'color',
            'title'       => esc_html__('Background Color', 'nimmo'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'      => 'main_menu_color_sticky',
            'type'    => 'link_color',
            'title'   => esc_html__('Menu Item Color', 'nimmo'),
            'default' => array(
                'regular' => '',
                'hover'   => '',
                'active'   => '',
            ),
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Mobile', 'nimmo'),
    'icon'       => 'el el-iphone-home',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'          => 'mobile_header_bgcolor',
            'type'        => 'color',
            'title'       => esc_html__('Header Background Color', 'nimmo'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'mobile_icon_menu_color',
            'type'        => 'color',
            'title'       => esc_html__('Header Icon Menu Color', 'nimmo'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'header_menu_bgcolor',
            'type'        => 'color',
            'title'       => esc_html__('Menu Background Color', 'nimmo'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'      => 'main_menu_color_mobile',
            'type'    => 'link_color',
            'title'   => esc_html__('Menu Item Color', 'nimmo'),
            'default' => array(
                'regular' => '',
                'hover'   => '',
                'active'   => '',
            ),
        ),
    )
));

/*--------------------------------------------------------------
# Page Title area
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Page Title', 'nimmo'),
    'icon'   => 'el-icon-map-marker',
    'fields' => array(
        array(
            'id'       => 'ptitle_on',
            'type'     => 'button_set',
            'title'    => esc_html__('Displayed', 'nimmo'),
            'options'  => array(
                'show'  => esc_html__('Show', 'nimmo'),
                'hidden'  => esc_html__('Hidden', 'nimmo'),
            ),
            'default'  => 'show'
        ),

        array(
            'id'       => 'ptitle_bg',
            'type'     => 'background',
            'title'    => esc_html__('Background', 'nimmo'),
            'subtitle' => esc_html__('Page title background color.', 'nimmo'),
            'output'   => array('#pagetitle'),
            'required' => array( 0 => 'ptitle_on', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
        array(
            'id'       => 'pagetitle_bg_color',
            'type'     => 'color_rgba',
            'title'    => esc_html__('Background Color Overlay', 'nimmo'),
            'output' => array('background-color' => '#pagetitle.bg-overlay:before'),
            'required' => array( 0 => 'ptitle_on', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
        array(
            'id'       => 'ptitle_color',
            'type'     => 'color',
            'title'    => esc_html__('Title Color', 'nimmo'),
            'subtitle' => esc_html__('Page title color.', 'nimmo'),
            'output'   => array('#pagetitle h1.page-title'),
            'default'  => '',
            'transparent' => false,
            'required' => array( 0 => 'ptitle_on', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
        array(
            'id'             => 'page_title_padding',
            'type'           => 'spacing',
            'output'         => array('body #pagetitle'),
            'right'   => false,
            'left'    => false,
            'mode'           => 'padding',
            'units'          => array('px'),
            'units_extended' => 'false',
            'title'          => esc_html__('Page Title Padding', 'nimmo'),
            'default'            => array(
                'padding-top'   => '',
                'padding-bottom'   => '',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'ptitle_on', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),

        array(
            'id'             => 'page_title_padding_sm',
            'type'           => 'spacing',
            'right'   => false,
            'left'    => false,
            'mode'           => 'padding',
            'units'          => array('px'),
            'units_extended' => 'false',
            'title'          => esc_html__('Page Title Padding Mobile + Tablet', 'nimmo'),
            'default'            => array(
                'padding-top'   => '',
                'padding-bottom'   => '',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'ptitle_on', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),

        array(
            'id'       => 'ptitle_breadcrumb_on',
            'type'     => 'button_set',
            'title'    => esc_html__('Breadcrumb', 'nimmo'),
            'options'  => array(
                'show'  => esc_html__('Show', 'nimmo'),
                'hidden'  => esc_html__('Hidden', 'nimmo'),
            ),
            'default'  => 'show',
        ),
    )
));

/*--------------------------------------------------------------
# WordPress default content
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title' => esc_html__('Content', 'nimmo'),
    'icon'  => 'el-icon-pencil',
    'fields'     => array(
        array(
            'id'       => 'content_bg_color',
            'type'     => 'color_rgba',
            'title'    => esc_html__('Background Color', 'nimmo'),
            'subtitle' => esc_html__('Content background color.', 'nimmo'),
            'output' => array('background-color' => '#content, .site-layout-default .site-footer:before')
        ),
        array(
            'id'       => 'content_style',
            'type'     => 'button_set',
            'title'    => esc_html__('Content Style', 'nimmo'),
            'options'  => array(
                'content-light'  => esc_html__('Light', 'nimmo'),
                'content-dark'  => esc_html__('Dark', 'nimmo'),
            ),
            'default'  => 'content-light'
        ),
        array(
            'id'             => 'content_padding',
            'type'           => 'spacing',
            'output'         => array('#content'),
            'right'   => false,
            'left'    => false,
            'mode'           => 'padding',
            'units'          => array('px'),
            'units_extended' => 'false',
            'title'          => esc_html__('Content Padding', 'nimmo'),
            'desc'           => esc_html__('Default: Top-120px, Bottom-120px', 'nimmo'),
            'default'            => array(
                'padding-top'   => '',
                'padding-bottom'   => '',
                'units'          => 'px',
            )
        ),
        array(
            'id'      => 'search_field_placeholder',
            'type'    => 'text',
            'title'   => esc_html__('Search Form - Text Placeholder', 'nimmo'),
            'default' => '',
            'desc'           => esc_html__('Default: Search Keywords...', 'nimmo'),
        ),
    )
));


Redux::setSection($opt_name, array(
    'title'      => esc_html__('Blog Archive', 'nimmo'),
    'icon'       => 'el-icon-list',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'      => 'btn_text_readmore',
            'type'    => 'text',
            'title'   => esc_html__('Readmore Button Text', 'nimmo'),
            'default' => '',
            'desc'           => esc_html__('Default: Read more', 'nimmo'),
        ),
        array(
            'id'       => 'archive_sidebar_pos',
            'type'     => 'button_set',
            'title'    => esc_html__('Sidebar Position', 'nimmo'),
            'subtitle' => esc_html__('Select a sidebar position for blog home, archive, search...', 'nimmo'),
            'options'  => array(
                'left'  => esc_html__('Left', 'nimmo'),
                'right' => esc_html__('Right', 'nimmo'),
                'none'  => esc_html__('Disabled', 'nimmo')
            ),
            'default'  => 'right'
        ),
        array(
            'id'       => 'archive_author_on',
            'title'    => esc_html__('Author', 'nimmo'),
            'subtitle' => esc_html__('Show author name on each post.', 'nimmo'),
            'type'     => 'switch',
            'default'  => true,
        ),
        array(
            'id'       => 'archive_date_on',
            'title'    => esc_html__('Date', 'nimmo'),
            'subtitle' => esc_html__('Show date posted on each post.', 'nimmo'),
            'type'     => 'switch',
            'default'  => true,
        ),
        array(
            'id'       => 'archive_categories_on',
            'title'    => esc_html__('Categories', 'nimmo'),
            'subtitle' => esc_html__('Show category names on each post.', 'nimmo'),
            'type'     => 'switch',
            'default'  => true,
        ),
        array(
            'id'       => 'archive_comments_on',
            'title'    => esc_html__('Comments', 'nimmo'),
            'subtitle' => esc_html__('Show comments count on each post.', 'nimmo'),
            'type'     => 'switch',
            'default'  => true,
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Single Post', 'nimmo'),
    'icon'       => 'el-icon-file-edit',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'post_sidebar_pos',
            'type'     => 'button_set',
            'title'    => esc_html__('Sidebar Position', 'nimmo'),
            'subtitle' => esc_html__('Select a sidebar position', 'nimmo'),
            'options'  => array(
                'left'  => esc_html__('Left', 'nimmo'),
                'right' => esc_html__('Right', 'nimmo'),
                'none'  => esc_html__('Disabled', 'nimmo')
            ),
            'default'  => 'right'
        ),
        array(
            'id'       => 'post_text_align',
            'type'     => 'button_set',
            'title'    => esc_html__('Text Align', 'nimmo'),
            'options'  => array(
                'inherit'  => esc_html__('Inherit', 'nimmo'),
                'justify'  => esc_html__('Justify', 'nimmo'),
            ),
            'default'  => 'inherit'
        ),
        array(
            'id'       => 'post_author_on',
            'title'    => esc_html__('Author', 'nimmo'),
            'subtitle' => esc_html__('Show author name on single post.', 'nimmo'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_date_on',
            'title'    => esc_html__('Date', 'nimmo'),
            'subtitle' => esc_html__('Show date on single post.', 'nimmo'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_categories_on',
            'title'    => esc_html__('Categories', 'nimmo'),
            'subtitle' => esc_html__('Show category names on single post.', 'nimmo'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_tags_on',
            'title'    => esc_html__('Tags', 'nimmo'),
            'subtitle' => esc_html__('Show tags count on single post.', 'nimmo'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_comments_on',
            'title'    => esc_html__('Comments', 'nimmo'),
            'subtitle' => esc_html__('Show comments count on single post.', 'nimmo'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_social_share_on',
            'title'    => esc_html__('Social Share', 'nimmo'),
            'subtitle' => esc_html__('Show social share on single post.', 'nimmo'),
            'type'     => 'switch',
            'default'  => false,
        ),
        array(
            'id'       => 'post_comments_form_on',
            'title'    => esc_html__('Comments Form', 'nimmo'),
            'subtitle' => esc_html__('Show comments form on single post.', 'nimmo'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_feature_image_on',
            'title'    => esc_html__('Feature Image', 'nimmo'),
            'subtitle' => esc_html__('Show feature image on single post.', 'nimmo'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_related_post',
            'title'    => esc_html__('Related', 'nimmo'),
            'subtitle' => esc_html__('Show related on single post.', 'nimmo'),
            'type'     => 'switch',
            'default'  => false
        ),
    )
));

/*--------------------------------------------------------------
# Footer
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Footer', 'nimmo'),
    'icon'   => 'el el-website',
    'fields' => array(
        array(
            'id'       => 'back_totop_on',
            'type'     => 'switch',
            'title'    => esc_html__('Back to Top Button', 'nimmo'),
            'subtitle' => esc_html__('Show back to top button when scrolled down.', 'nimmo'),
            'default'  => true,
        ),
        array(
            'id'       => 'footer_layout',
            'type'     => 'button_set',
            'title'    => esc_html__('Layout', 'nimmo'),
            'subtitle' => esc_html__('Select a layout for upper footer area.', 'nimmo'),
            'options'  => array(
                '1'  => esc_html__('Default', 'nimmo'),
                'custom'  => esc_html__('Custom', 'nimmo'),
            ),
            'default'  => '1'
        ),
        array(
            'id'          => 'footer_layout_custom',
            'type'        => 'select',
            'title'       => esc_html__('Custom Layout', 'nimmo'),
            'desc'        => sprintf(esc_html__('To use this Option please %sClick Here%s to add your custom footer layout first.','nimmo'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=footer' ) ) . '">','</a>'),
            'options'     => nimmo_list_post('footer'),
            'default'     => '',
            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => 'custom' ),
            'force_output' => true
        ),

        array(
            'title' => esc_html__('Footer Top', 'nimmo'),
            'type'  => 'section',
            'id' => 'footer_top_section',
            'indent' => true,
            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),

        array(
            'id'       => 'footer_top_column',
            'type'     => 'button_set',
            'title'    => esc_html__('Columns', 'nimmo'),
            'options'  => array(
                '1'  => esc_html__('1 Column', 'nimmo'),
                '2'  => esc_html__('2 Column', 'nimmo'),
                '3'  => esc_html__('3 Column', 'nimmo'),
                '4'  => esc_html__('4 Column', 'nimmo'),
            ),
            'default'  => '4',
            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),

        array(
            'id'       => 'footer_top_width_custom',
            'type'     => 'button_set',
            'title'    => esc_html__('Column Width Custom', 'nimmo'),
            'options'  => array(
                'default'  => esc_html__('Default', 'nimmo'),
                'custom'  => esc_html__('Custom', 'nimmo'),
            ),
            'default'  => 'custom',
            'required' => array( 0 => 'footer_top_column', 1 => 'equals', 2 => '4' ),
            'force_output' => true
        ),

        array(
            'id'       => 'footer_top_bg',
            'type'     => 'background',
            'title'    => esc_html__('Background', 'nimmo'),
            'subtitle' => esc_html__('Page title background color.', 'nimmo'),
            'output'   => array('body .site-footer .top-footer'),
            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
            'force_output' => true,
            'transparent' => false,
        ),

        array(
                'id'       => 'footer_top_padding',
                'type'     => 'spacing',
                'title'    => esc_html__('Content Paddings', 'nimmo'),
                'mode'     => 'padding',
                'units'    => array('em', 'px', '%'),
                'top'      => true,
                'right'    => false,
                'bottom'   => true,
                'left'     => false,
                'output'   => array('body .site-footer .top-footer'),
                'default'  => array(
                    'top'    => '',
                    'right'  => '',
                    'bottom' => '',
                    'left'   => '',
                    'units'  => 'px',
                )
            ),

        array(
            'title' => esc_html__('Footer Bottom', 'nimmo'),
            'type'  => 'section',
            'id' => 'footer_bottom_section',
            'indent' => true,
            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
        array(
            'id'       => 'footer_bottom_bg',
            'type'     => 'background',
            'title'    => esc_html__('Background', 'nimmo'),
            'subtitle' => esc_html__('Page title background color.', 'nimmo'),
            'output'   => array('body .site-footer .bottom-footer'),
            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
            'force_output' => true,
            'transparent' => false,
            'background-image' => false,
            'background-position' => false,
            'background-size' => false,
            'background-repeat' => false,
            'background-attachment' => false,
        ),
        array(
            'id'=>'footer_copyright',
            'type' => 'textarea',
            'title' => esc_html__('Copyright', 'nimmo'),
            'validate' => 'html_custom',
            'default' => '',
            'subtitle' => esc_html__('Custom HTML Allowed: a,br,em,strong,span,p,div,h1->h6', 'nimmo'),
            'allowed_html' => array(
                'a' => array(
                    'href' => array(),
                    'title' => array(),
                    'target' => array(),
                    'class' => array(),
                ),
                'br' => array(),
                'em' => array(),
                'strong' => array(),
                'span' => array(),
                'p' => array(),
                'div' => array(
                    'class' => array()
                ),
                'h1' => array(
                    'class' => array()
                ),
                'h2' => array(
                    'class' => array()
                ),
                'h3' => array(
                    'class' => array()
                ),
                'h4' => array(
                    'class' => array()
                ),
                'h5' => array(
                    'class' => array()
                ),
                'h6' => array(
                    'class' => array()
                ),
                'ul' => array(
                    'class' => array()
                ),
                'li' => array(),
            ),
            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
    )
));


/*--------------------------------------------------------------
# Colors
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Colors', 'nimmo'),
    'icon'   => 'el-icon-file-edit',
    'fields' => array(
        array(
            'id'          => 'primary_color',
            'type'        => 'color',
            'title'       => esc_html__('Primary Color', 'nimmo'),
            'transparent' => false,
            'default'     => '#3396EC'
        ),
        array(
            'id'          => 'secondary_color',
            'type'        => 'color',
            'title'       => esc_html__('Secondary Color', 'nimmo'),
            'transparent' => false,
            'default'     => '#19CAD0'
        ),
        array(
            'id'          => 'third_color',
            'type'        => 'color',
            'title'       => esc_html__('Third Color', 'nimmo'),
            'transparent' => false,
            'default'     => '#79CD1C'
        ),
        array(
            'id'      => 'link_color',
            'type'    => 'link_color',
            'title'   => __('Link Colors', 'nimmo'),
            'default' => array(
                'regular' => '#3396EC',
                'hover'   => '#19CAD0',
                'active'  => '#19CAD0'
            ),
            'output'  => array('a')
        ),
        array(
            'id'          => 'gradient_color',
            'type'        => 'color_gradient',
            'title'       => esc_html__('Gradient Color Preset 1', 'nimmo'),
            'transparent' => false,
            'default'  => array(
                'from' => '#0841c6',
                'to'   => '#05c6fb', 
            ),
        ),
        array(
            'id'          => 'gradient_color2',
            'type'        => 'color_gradient',
            'title'       => esc_html__('Gradient Color Preset 2', 'nimmo'),
            'transparent' => false,
            'default'  => array(
                'from' => '#701ad1',
                'to'   => '#f700e3', 
            ),
        ),
        array(
            'id'          => 'gradient_color3',
            'type'        => 'color_gradient',
            'title'       => esc_html__('Gradient Color Preset 3', 'nimmo'),
            'transparent' => false,
            'default'  => array(
                'from' => '#32c6f6',
                'to'   => '#0042ff', 
            ),
        ),
    )
));

/*--------------------------------------------------------------
# Typography
--------------------------------------------------------------*/
$custom_font_selectors_1 = Redux::getOption($opt_name, 'custom_font_selectors_1');
$custom_font_selectors_1 = !empty($custom_font_selectors_1) ? explode(',', $custom_font_selectors_1) : array();
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Typography', 'nimmo'),
    'icon'   => 'el-icon-text-width',
    'fields' => array(
        array(
            'id'       => 'body_default_font',
            'type'     => 'select',
            'title'    => esc_html__('Body Default Font', 'nimmo'),
            'options'  => array(
                'Roboto'  => esc_html__('Default', 'nimmo'),
                'Google-Font'  => esc_html__('Google Font', 'nimmo'),
            ),
            'default'  => 'Roboto',
        ),
        array(
            'id'          => 'font_main',
            'type'        => 'typography',
            'title'       => esc_html__('Body Google Font', 'nimmo'),
            'subtitle'    => esc_html__('This will be the default font of your website.', 'nimmo'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'line-height'  => true,
            'font-size'  => true,
            'text-align'  => false,
            'color'  => false,
            'output'      => array('body'),
            'units'       => 'px',
            'required' => array( 0 => 'body_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'body_color',
            'type'        => 'color',
            'title'       => esc_html__('Body Color', 'nimmo'),
            'transparent' => false,
            'default'     => '',
            'required' => array( 0 => 'body_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true,
            'output'      => array('body, .single-hentry.archive .entry-content, .single-post .content-area, .ct-related-post .item-holder .item-content'),
        ),
        array(
            'id'       => 'heading_default_font',
            'type'     => 'select',
            'title'    => esc_html__('Heading Default Font', 'nimmo'),
            'options'  => array(
                'Poppins'  => esc_html__('Default', 'nimmo'),
                'Google-Font'  => esc_html__('Google Font', 'nimmo'),
            ),
            'default'  => 'Poppins',
        ),
        array(
            'id'          => 'font_h1',
            'type'        => 'typography',
            'title'       => esc_html__('H1', 'nimmo'),
            'subtitle'    => esc_html__('This will be the default font for all H1 tags of your website.', 'nimmo'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'color'  => false,
            'output'      => array('h1', '.h1', '.text-heading'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h2',
            'type'        => 'typography',
            'title'       => esc_html__('H2', 'nimmo'),
            'subtitle'    => esc_html__('This will be the default font for all H2 tags of your website.', 'nimmo'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'color'  => false,
            'output'      => array('h2', '.h2'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h3',
            'type'        => 'typography',
            'title'       => esc_html__('H3', 'nimmo'),
            'subtitle'    => esc_html__('This will be the default font for all H3 tags of your website.', 'nimmo'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'color'  => false,
            'output'      => array('h3', '.h3'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h4',
            'type'        => 'typography',
            'title'       => esc_html__('H4', 'nimmo'),
            'subtitle'    => esc_html__('This will be the default font for all H4 tags of your website.', 'nimmo'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'color'  => false,
            'output'      => array('h4', '.h4'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h5',
            'type'        => 'typography',
            'title'       => esc_html__('H5', 'nimmo'),
            'subtitle'    => esc_html__('This will be the default font for all H5 tags of your website.', 'nimmo'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'color'  => false,
            'output'      => array('h5', '.h5'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h6',
            'type'        => 'typography',
            'title'       => esc_html__('H6', 'nimmo'),
            'subtitle'    => esc_html__('This will be the default font for all H6 tags of your website.', 'nimmo'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'color'  => false,
            'output'      => array('h6', '.h6'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        )
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Fonts Selectors', 'nimmo'),
    'icon'       => 'el el-fontsize',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'          => 'custom_font_1',
            'type'        => 'typography',
            'title'       => esc_html__('Custom Font', 'nimmo'),
            'subtitle'    => esc_html__('This will be the font that applies to the class selector.', 'nimmo'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => $custom_font_selectors_1,
            'units'       => 'px',

        ),
        array(
            'id'       => 'custom_font_selectors_1',
            'type'     => 'textarea',
            'title'    => esc_html__('CSS Selectors', 'nimmo'),
            'subtitle' => esc_html__('Add class selectors to apply above font.', 'nimmo'),
            'validate' => 'no_html'
        )
    )
));

/*--------------------------------------------------------------
# Shop
--------------------------------------------------------------*/
if(class_exists('Woocommerce')) {
    Redux::setSection($opt_name, array(
        'title'  => esc_html__('Shop', 'nimmo'),
        'icon'   => 'el el-shopping-cart',
        'fields' => array(
            array(
                'id' => 'shop_title',
                'type' => 'text',
                'title' => esc_html__('Shop Title', 'nimmo'),
                'default' => '',
            ),
            array(
                'id'       => 'sidebar_shop',
                'type'     => 'button_set',
                'title'    => esc_html__('Sidebar Position', 'nimmo'),
                'subtitle' => esc_html__('Select a sidebar position for archive shop.', 'nimmo'),
                'options'  => array(
                    'left'  => esc_html__('Left', 'nimmo'),
                    'right' => esc_html__('Right', 'nimmo'),
                    'none'  => esc_html__('Disabled', 'nimmo')
                ),
                'default'  => 'right'
            ),
            array(
                'title' => esc_html__('Products displayed per page', 'nimmo'),
                'id' => 'product_per_page',
                'type' => 'slider',
                'subtitle' => esc_html__('Number product to show', 'nimmo'),
                'default' => 9,
                'min'  => 6,
                'step' => 1,
                'max' => 50,
                'display_value' => 'text'
            ),
            array(
                'id'       => 'shop_content_padding',
                'type'     => 'spacing',
                'title'    => esc_html__('Content Paddings', 'nimmo'),
                'subtitle' => esc_html__('Content paddings.', 'nimmo'),
                'mode'     => 'padding',
                'units'    => array('em', 'px', '%'),
                'top'      => true,
                'right'    => false,
                'bottom'   => true,
                'left'     => false,
                'output'   => array('.woocommerce #content, .woocommerce-page #content'),
                'default'  => array(
                    'top'    => '',
                    'right'  => '',
                    'bottom' => '',
                    'left'   => '',
                    'units'  => 'px',
                )
            ),
            array(
                'id'       => 'product_social_share',
                'title'    => esc_html__('Product Social Share', 'nimmo'),
                'type'     => 'switch',
                'default'  => false,
            ),
        )
    ));
}

/*--------------------------------------------------------------
# Social Link
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Social Link', 'nimmo'),
    'icon'   => 'el el-share',
    'fields' => array(

        array(
            'id'      => 'social_label',
            'type'    => 'text',
            'title'   => esc_html__('Social Label', 'nimmo'),
            'default' => '',
        ),

        array(
            'id'      => 'social_facebook_url',
            'type'    => 'text',
            'title'   => esc_html__('Facebook URL', 'nimmo'),
            'default' => '#',
        ),
        array(
            'id'      => 'social_twitter_url',
            'type'    => 'text',
            'title'   => esc_html__('Twitter URL', 'nimmo'),
            'default' => '#',
        ),
        array(
            'id'      => 'social_inkedin_url',
            'type'    => 'text',
            'title'   => esc_html__('Inkedin URL', 'nimmo'),
            'default' => '#',
        ),
        array(
            'id'      => 'social_instagram_url',
            'type'    => 'text',
            'title'   => esc_html__('Instagram URL', 'nimmo'),
            'default' => '',
        ),
        array(
            'id'      => 'social_google_url',
            'type'    => 'text',
            'title'   => esc_html__('Google URL', 'nimmo'),
            'default' => '',
        ),
        array(
            'id'      => 'social_skype_url',
            'type'    => 'text',
            'title'   => esc_html__('Skype URL', 'nimmo'),
            'default' => '',
        ),
        array(
            'id'      => 'social_pinterest_url',
            'type'    => 'text',
            'title'   => esc_html__('Pinterest URL', 'nimmo'),
            'default' => '',
        ),
        array(
            'id'      => 'social_vimeo_url',
            'type'    => 'text',
            'title'   => esc_html__('Vimeo URL', 'nimmo'),
            'default' => '',
        ),
        array(
            'id'      => 'social_youtube_url',
            'type'    => 'text',
            'title'   => esc_html__('Youtube URL', 'nimmo'),
            'default' => '',
        ),
        array(
            'id'      => 'social_yelp_url',
            'type'    => 'text',
            'title'   => esc_html__('Yelp URL', 'nimmo'),
            'default' => '',
        ),
        array(
            'id'      => 'social_tumblr_url',
            'type'    => 'text',
            'title'   => esc_html__('Tumblr URL', 'nimmo'),
            'default' => '',
        ),
        array(
            'id'      => 'social_tripadvisor_url',
            'type'    => 'text',
            'title'   => esc_html__('Tripadvisor URL', 'nimmo'),
            'default' => '',
        ),
    )
));

/* Custom Code /--------------------------------------------------------- */
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Custom Code', 'nimmo'),
    'icon'   => 'el-icon-edit',
    'fields' => array(

        array(
            'id'       => 'site_header_code',
            'type'     => 'textarea',
            'theme'    => 'chrome',
            'title'    => esc_html__('Header Custom Codes', 'nimmo'),
            'subtitle' => esc_html__('It will insert the code to wp_head hook.', 'nimmo'),
        ),
        array(
            'id'       => 'site_footer_code',
            'type'     => 'textarea',
            'theme'    => 'chrome',
            'title'    => esc_html__('Footer Custom Codes', 'nimmo'),
            'subtitle' => esc_html__('It will insert the code to wp_footer hook.', 'nimmo'),
        ),

    ),
));

/* Custom CSS /--------------------------------------------------------- */
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Custom CSS', 'nimmo'),
    'icon'   => 'el-icon-adjust-alt',
    'fields' => array(

        array(
            'id'   => 'customcss',
            'type' => 'info',
            'desc' => esc_html__('Custom CSS', 'nimmo')
        ),

        array(
            'id'       => 'site_css',
            'type'     => 'ace_editor',
            'title'    => esc_html__('CSS Code', 'nimmo'),
            'subtitle' => esc_html__('Advanced CSS Options. You can paste your custom CSS Code here.', 'nimmo'),
            'mode'     => 'css',
            'validate' => 'css',
            'theme'    => 'chrome',
            'default'  => ""
        ),

    ),
));