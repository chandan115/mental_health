<?php
/**
 * Register metabox for posts based on Redux Framework. Supported methods:
 *     isset_args( $post_type )
 *     set_args( $post_type, $redux_args, $metabox_args )
 *     add_section( $post_type, $sections )
 * Each post type can contains only one metabox. Pease note that each field id
 * leads by an underscore sign ( _ ) in order to not show that into Custom Field
 * Metabox from WordPress core feature.
 *
 * @param  nimmo_Post_Metabox $metabox
 */

/**
 * Get list menu.
 * @return array
 */
function nimmo_get_nav_menu(){

    $menus = array(
        '' => esc_html__('Default', 'nimmo')
    );

    $obj_menus = wp_get_nav_menus();

    foreach ($obj_menus as $obj_menu){
        $menus[$obj_menu->term_id] = $obj_menu->name;
    }

    return $menus;
}

function nimmo_page_options_register( $metabox ) {
	if ( ! $metabox->isset_args( 'post' ) ) {
		$metabox->set_args( 'post', array(
			'opt_name'            => 'post_option',
			'display_name'        => esc_html__( 'Post Settings', 'nimmo' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'page' ) ) {
		$metabox->set_args( 'page', array(
			'opt_name'            => nimmo_get_page_opt_name(),
			'display_name'        => esc_html__( 'Page Settings', 'nimmo' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'cms_pf_audio' ) ) {
		$metabox->set_args( 'cms_pf_audio', array(
			'opt_name'     => 'post_format_audio',
			'display_name' => esc_html__( 'Audio', 'nimmo' ),
			'class'        => 'fully-expanded',
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'cms_pf_link' ) ) {
		$metabox->set_args( 'cms_pf_link', array(
			'opt_name'     => 'post_format_link',
			'display_name' => esc_html__( 'Link', 'nimmo' )
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'cms_pf_quote' ) ) {
		$metabox->set_args( 'cms_pf_quote', array(
			'opt_name'     => 'post_format_quote',
			'display_name' => esc_html__( 'Quote', 'nimmo' )
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'cms_pf_video' ) ) {
		$metabox->set_args( 'cms_pf_video', array(
			'opt_name'     => 'post_format_video',
			'display_name' => esc_html__( 'Video', 'nimmo' ),
			'class'        => 'fully-expanded',
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'cms_pf_gallery' ) ) {
		$metabox->set_args( 'cms_pf_gallery', array(
			'opt_name'     => 'post_format_gallery',
			'display_name' => esc_html__( 'Gallery', 'nimmo' ),
			'class'        => 'fully-expanded',
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if (!$metabox->isset_args('product')) {
        $metabox->set_args('product', array(
            'opt_name'            => nimmo_get_page_opt_name(),
            'display_name'        => esc_html__('Product Settings', 'nimmo'),
            'show_options_object' => false,
        ), array(
            'context'  => 'advanced',
            'priority' => 'default'
        ));
    }

    /* Extra Post Type */
	if ( ! $metabox->isset_args( 'portfolio' ) ) {
		$metabox->set_args( 'portfolio', array(
			'opt_name'            => 'portfolio_option',
			'display_name'        => esc_html__( 'Portfolio Settings', 'nimmo' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	$metabox->add_section( 'portfolio', array(
		'title'  => esc_html__( 'General', 'nimmo' ),
		'icon'   => 'el-icon-website',
		'fields' => array(
			array(
				'id'             => 'content_padding',
				'type'           => 'spacing',
				'output'         => array( '.single-portfolio #content' ),
				'right'          => false,
				'left'           => false,
				'mode'           => 'padding',
				'units'          => array( 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Content Padding', 'nimmo' ),
				'desc'           => esc_html__( 'Default: Theme Option.', 'nimmo' ),
				'default'        => array(
					'padding-top'    => '',
					'padding-bottom' => '',
					'units'          => 'px',
				)
			),
		)
	) );

	/**
	 * Config post meta options
	 *
	 */
	$metabox->add_section( 'post', array(
		'title'  => esc_html__( 'General', 'nimmo' ),
		'icon'   => 'el-icon-website',
		'fields' => array(
			array(
				'id'       => 'url_video',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Url Video ( Youtube, Vimeo...)', 'nimmo' ),
				'validate' => 'no_html'
			),
			array(
				'id'      => 'custom_header',
				'type'    => 'switch',
				'title'   => esc_html__( 'Custom Header', 'nimmo' ),
				'default' => false,
				'indent'  => true
			),
			array(
				'id'           => 'header_layout',
				'type'         => 'image_select',
				'title'        => esc_html__( 'Layout', 'nimmo' ),
				'subtitle'     => esc_html__( 'Select a layout for header.', 'nimmo' ),
				'options'      => array(
					'0' => get_template_directory_uri() . '/assets/images/header-layout/h0.jpg',
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
				'default'      => nimmo_get_option_of_theme_options( 'header_layout' ),
				'required'     => array( 0 => 'custom_header', 1 => 'equals', 2 => '1' ),
				'force_output' => true
			),
		)
	) );

	/**
	 * Config page meta options
	 *
	 */

	$metabox->add_section( 'page', array(
		'title'  => esc_html__( 'Header', 'nimmo' ),
		'desc'   => esc_html__( 'Header settings for the page.', 'nimmo' ),
		'icon'   => 'el-icon-website',
		'fields' => array(
			array(
				'id'      => 'custom_header',
				'type'    => 'switch',
				'title'   => esc_html__( 'Custom Header', 'nimmo' ),
				'default' => false,
				'indent'  => true
			),
			array(
				'id'           => 'header_layout',
				'type'         => 'image_select',
				'title'        => esc_html__( 'Layout', 'nimmo' ),
				'subtitle'     => esc_html__( 'Select a layout for header.', 'nimmo' ),
				'options'      => array(
					'0' => get_template_directory_uri() . '/assets/images/header-layout/h0.jpg',
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
				'default'      => nimmo_get_option_of_theme_options( 'header_layout' ),
				'required'     => array( 0 => 'custom_header', 1 => 'equals', 2 => '1' ),
				'force_output' => true
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
	            'id'       => 'logo',
	            'type'     => 'media',
	            'title'    => esc_html__('Logo Light', 'nimmo'),
	            'default' => '',
	            'required'     => array( 0 => 'custom_header', 1 => 'equals', 2 => '1' ),
				'force_output' => true
	        ),
	        array(
	            'id'       => 'logo_dark',
	            'type'     => 'media',
	            'title'    => esc_html__('Logo Dark', 'nimmo'),
	            'default' => '',
	            'required'     => array( 0 => 'custom_header', 1 => 'equals', 2 => '1' ),
				'force_output' => true
	        ),
	        array(
	            'id'       => 'logo_sticky',
	            'type'     => 'media',
	            'title'    => esc_html__('Logo Sticky', 'nimmo'),
	            'default' => '',
	            'required'     => array( 0 => 'custom_header', 1 => 'equals', 2 => '1' ),
				'force_output' => true
	        ),
	        array(
	            'id'       => 'logo_mobile',
	            'type'     => 'media',
	            'title'    => esc_html__('Logo Mobile', 'nimmo'),
	            'default' => '',
	            'required'     => array( 0 => 'custom_header', 1 => 'equals', 2 => '1' ),
				'force_output' => true
	        ),
	        array(
	            'id'       => 'hidden_sidebar_on',
	            'type'     => 'button_set',
	            'title'    => esc_html__('Hidden Sidebar', 'nimmo'),
	            'options'  => array(
	                'themeoption'  => esc_html__('Theme Option', 'nimmo'),
	                '1' => esc_html__('Show', 'nimmo'),
	                '0'  => esc_html__('Hidden', 'nimmo')
	            ),
	            'default'  => 'themeoption',
	            'required'     => array( 0 => 'custom_header', 1 => 'equals', 2 => '1' ),
				'force_output' => true
	        ),
	        array(
	            'id'       => 'cart_on',
	            'type'     => 'button_set',
	            'title'    => esc_html__('Cart Icon', 'nimmo'),
	            'options'  => array(
	                'themeoption'  => esc_html__('Theme Option', 'nimmo'),
	                '1' => esc_html__('Show', 'nimmo'),
	                '0'  => esc_html__('Hidden', 'nimmo')
	            ),
	            'default'  => 'themeoption',
	            'required'     => array( 0 => 'custom_header', 1 => 'equals', 2 => '1' ),
				'force_output' => true
	        ),
	        array(
                'id'       => 'h_custom_menu',
                'type'     => 'select',
                'title'    => esc_html__( 'Custom Menu', 'nimmo' ),
                'subtitle' => esc_html__( 'Custom menu for current page.', 'nimmo' ),
                'options'  => nimmo_get_nav_menu(),
                'default' => '',
                'required' => array( 0 => 'custom_header', 1 => 'equals', 2 => '1' ),
                'force_output' => true
            ),
            array(
	            'id'          => 'header_bgcolor',
	            'type'        => 'color',
	            'title'       => esc_html__('Background Color', 'nimmo'),
	            'transparent' => false,
	            'default'     => '',
	            'required' => array( 0 => 'custom_header', 1 => 'equals', 2 => '1' ),
                'force_output' => true
	        ),
	        array(
	            'id'          => 'font_menu_page',
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
	            'required' => array( 0 => 'custom_header', 1 => 'equals', 2 => '1' ),
                'force_output' => true
	        ),
		)
	) );

	$metabox->add_section( 'page', array(
		'title'  => esc_html__( 'Page Title', 'nimmo' ),
		'icon'   => 'el-icon-map-marker',
		'fields' => array(
			array(
	            'id'       => 'ptitle_on',
	            'type'     => 'button_set',
	            'title'    => esc_html__('Displayed', 'nimmo'),
	            'options'  => array(
	                'themeoption'  => esc_html__('Theme Option', 'nimmo'),
	                'show'  => esc_html__('Show', 'nimmo'),
	                'hidden'  => esc_html__('Hidden', 'nimmo'),
	            ),
	            'default'  => 'themeoption'
	        ),
		)
	) );

	$metabox->add_section( 'page', array(
		'title'  => esc_html__( 'Content', 'nimmo' ),
		'desc'   => esc_html__( 'Settings for content area.', 'nimmo' ),
		'icon'   => 'el-icon-pencil',
		'fields' => array(
			array(
				'id'       => 'content_bg_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Background Color', 'nimmo' ),
				'subtitle' => esc_html__( 'Content background color.', 'nimmo' ),
				'output'   => array( 'background-color' => '#content, .site-layout-default .site-footer:before' )
			),
			array(
				'id'             => 'content_padding',
				'type'           => 'spacing',
				'output'         => array( 'body #content' ),
				'right'          => false,
				'left'           => false,
				'mode'           => 'padding',
				'units'          => array( 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Content Padding', 'nimmo' ),
				'desc'           => esc_html__( 'Default: Theme Option.', 'nimmo' ),
				'default'        => array(
					'padding-top'    => '',
					'padding-bottom' => '',
					'units'          => 'px',
				)
			),
			array(
				'id'      => 'show_sidebar_page',
				'type'    => 'switch',
				'title'   => esc_html__( 'Show Sidebar', 'nimmo' ),
				'default' => false,
				'indent'  => true
			),
			array(
				'id'           => 'sidebar_page_pos',
				'type'         => 'button_set',
				'title'        => esc_html__( 'Sidebar Position', 'nimmo' ),
				'options'      => array(
					'left'  => esc_html__( 'Left', 'nimmo' ),
					'right' => esc_html__( 'Right', 'nimmo' ),
				),
				'default'      => 'right',
				'required'     => array( 0 => 'show_sidebar_page', 1 => '=', 2 => '1' ),
				'force_output' => true
			),
	        array(
	            'id'       => 'layout_boxed',
	            'type'     => 'switch',
	            'title'    => esc_html__('Layout Boxed', 'nimmo'),
	            'default'  => false
	        ),
		)
	) );

	$metabox->add_section( 'page', array(
		'title'  => esc_html__( 'Footer', 'nimmo' ),
		'desc'   => esc_html__( 'Settings for footer area.', 'nimmo' ),
		'icon'   => 'el el-website',
		'fields' => array(
			array(
				'id'      => 'custom_footer',
				'type'    => 'switch',
				'title'   => esc_html__( 'Custom Footer', 'nimmo' ),
				'default' => false,
				'indent'  => true
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
	            'default'  => '1',
	            'required' => array( 0 => 'custom_footer', 1 => 'equals', 2 => '1' ),
	            'force_output' => true
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
	    )
	) );

	/**
	 * Config post format meta options
	 *
	 */

	$metabox->add_section( 'cms_pf_video', array(
		'title'  => esc_html__( 'Video', 'nimmo' ),
		'fields' => array(
			array(
				'id'    => 'post-video-url',
				'type'  => 'text',
				'title' => esc_html__( 'Video URL', 'nimmo' ),
				'desc'  => esc_html__( 'YouTube or Vimeo video URL', 'nimmo' )
			),

			array(
				'id'    => 'post-video-file',
				'type'  => 'editor',
				'title' => esc_html__( 'Video Upload', 'nimmo' ),
				'desc'  => esc_html__( 'Upload video file', 'nimmo' )
			),

			array(
				'id'    => 'post-video-html',
				'type'  => 'textarea',
				'title' => esc_html__( 'Embadded video', 'nimmo' ),
				'desc'  => esc_html__( 'Use this option when the video does not come from YouTube or Vimeo', 'nimmo' )
			)
		)
	) );

	$metabox->add_section( 'cms_pf_gallery', array(
		'title'  => esc_html__( 'Gallery', 'nimmo' ),
		'fields' => array(
			array(
				'id'       => 'post-gallery-lightbox',
				'type'     => 'switch',
				'title'    => esc_html__( 'Lightbox?', 'nimmo' ),
				'subtitle' => esc_html__( 'Enable lightbox for gallery images.', 'nimmo' ),
				'default'  => true
			),
			array(
				'id'       => 'post-gallery-images',
				'type'     => 'gallery',
				'title'    => esc_html__( 'Gallery Images ', 'nimmo' ),
				'subtitle' => esc_html__( 'Upload images or add from media library.', 'nimmo' )
			)
		)
	) );

	$metabox->add_section( 'cms_pf_audio', array(
		'title'  => esc_html__( 'Audio', 'nimmo' ),
		'fields' => array(
			array(
				'id'          => 'post-audio-url',
				'type'        => 'text',
				'title'       => esc_html__( 'Audio URL', 'nimmo' ),
				'description' => esc_html__( 'Audio file URL in format: mp3, ogg, wav.', 'nimmo' ),
				'validate'    => 'url',
				'msg'         => 'Url error!'
			)
		)
	) );

	$metabox->add_section( 'cms_pf_link', array(
		'title'  => esc_html__( 'Link', 'nimmo' ),
		'fields' => array(
			array(
				'id'       => 'post-link-url',
				'type'     => 'text',
				'title'    => esc_html__( 'URL', 'nimmo' ),
				'validate' => 'url',
				'msg'      => 'Url error!'
			)
		)
	) );

	$metabox->add_section( 'cms_pf_quote', array(
		'title'  => esc_html__( 'Quote', 'nimmo' ),
		'fields' => array(
			array(
				'id'    => 'post-quote-cite',
				'type'  => 'text',
				'title' => esc_html__( 'Cite', 'nimmo' )
			)
		)
	) );

}


add_action( 'cms_post_metabox_register', 'nimmo_page_options_register' );

function nimmo_get_option_of_theme_options( $key, $default = '' ) {
	if ( empty( $key ) ) {
		return '';
	}
	$options = get_option( nimmo_get_opt_name(), array() );
	$value   = isset( $options[ $key ] ) ? $options[ $key ] : $default;

	return $value;
}