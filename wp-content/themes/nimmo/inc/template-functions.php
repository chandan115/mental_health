<?php
/**
 * Helper functions for the theme
 *
 * @package Nimmo
 */

/**
 * Get Post List 
*/
if(!function_exists('nimmo_list_post')){
    function nimmo_list_post($post_type = 'post', $default = false){
        $post_list = array();
        $posts = get_posts(array('post_type' => $post_type,'posts_per_page' => '-1'));
        foreach($posts as $post){
            $post_list[$post->post_name] = $post->post_title;
        }
        return $post_list;
    }
}

/**
 * Get theme option based on its id.
 *
 * @param  string $opt_id Required. the option id.
 * @param  mixed $default Optional. Default if the option is not found or not yet saved.
 *                         If not set, false will be used
 *
 * @return mixed
 */
function nimmo_get_opt( $opt_id, $default = false ) {
	$opt_name = nimmo_get_opt_name();
	if ( empty( $opt_name ) ) {
		return $default;
	}

	global ${$opt_name};
	if ( ! isset( ${$opt_name} ) || ! isset( ${$opt_name}[ $opt_id ] ) ) {
		$options = get_option( $opt_name );
	} else {
		$options = ${$opt_name};
	}
	if ( ! isset( $options ) || ! isset( $options[ $opt_id ] ) || $options[ $opt_id ] === '' ) {
		return $default;
	}
	if ( is_array( $options[ $opt_id ] ) && is_array( $default ) ) {
		foreach ( $options[ $opt_id ] as $key => $value ) {
			if ( isset( $default[ $key ] ) && $value === '' ) {
				$options[ $opt_id ][ $key ] = $default[ $key ];
			}
		}
	}

	return $options[ $opt_id ];
}

/**
 * Get theme option based on its id.
 *
 * @param  string $opt_id Required. the option id.
 * @param  mixed $default Optional. Default if the option is not found or not yet saved.
 *                         If not set, false will be used
 *
 * @return mixed
 */
function nimmo_get_page_opt( $opt_id, $default = false ) {
	$page_opt_name = nimmo_get_page_opt_name();
	if ( empty( $page_opt_name ) ) {
		return $default;
	}
	$id = get_the_ID();
	if ( ! is_archive() && is_home() ) {
		if ( ! is_front_page() ) {
			$page_for_posts = get_option( 'page_for_posts' );
			$id             = $page_for_posts;
		}
	}

	// Get page option for Shop Page
    if(class_exists('WooCommerce') && is_shop()){
        $id = get_option( 'woocommerce_shop_page_id' );
    }

	return $options = ! empty($id) ? get_post_meta( intval( $id ), $opt_id, true ) : $default;
}

/**
 *
 * Get post format values.
 *
 * @param $post_format_key
 * @param bool $default
 *
 * @return bool|mixed
 */
function nimmo_get_post_format_value( $post_format_key, $default = false ) {
	global $post;

	return $value = ! empty( $post->ID ) ? get_post_meta( $post->ID, $post_format_key, true ) : $default;
}


/**
 * Get opt_name for Redux Framework options instance args and for
 * getting option value.
 *
 * @return string
 */
function nimmo_get_opt_name() {
	return apply_filters( 'nimmo_opt_name', 'cms_theme_options' );
}

/**
 * Get opt_name for Redux Framework options instance args and for
 * getting option value.
 *
 * @return string
 */
function nimmo_get_page_opt_name() {
	return apply_filters( 'nimmo_page_opt_name', 'cms_page_options' );
}

/**
 * Get opt_name for Redux Framework options instance args and for
 * getting option value.
 *
 * @return string
 */
function nimmo_get_post_opt_name() {
	return apply_filters( 'nimmo_post_opt_name', 'nimmo_post_options' );
}

/**
 * Get page title and description.
 *
 * @return array Contains 'title'
 */
function nimmo_get_page_titles() {
	$title = '';

	// Default titles
	if ( ! is_archive() ) {
		// Posts page view
		if ( is_home() ) {
			// Only available if posts page is set.
			if ( ! is_front_page() && $page_for_posts = get_option( 'page_for_posts' ) ) {
				$title = get_post_meta( $page_for_posts, 'custom_title', true );
				if ( empty( $title ) ) {
					$title = get_the_title( $page_for_posts );
				}
			}
			if ( is_front_page() ) {
				$title = esc_html__( 'Blog', 'nimmo' );
			}
		} // Single page view
        elseif ( is_page() ) {
			$title = get_post_meta( get_the_ID(), 'custom_title', true );
			if ( ! $title ) {
				$title = get_the_title();
			}
		} elseif ( is_404() ) {
			$title = esc_html__( 'Error 404', 'nimmo' );
		} elseif ( is_search() ) {
			$title = esc_html__( 'Search results', 'nimmo' );
		} else {
			$title = get_post_meta( get_the_ID(), 'custom_title', true );
			if ( ! $title ) {
				$title = get_the_title();
			}
		}
	} else {
		$title = get_the_archive_title();
		$shop_title = nimmo_get_opt( 'shop_title');
		if (!empty($shop_title)) {
			if( (class_exists( 'WooCommerce' ) && is_shop()) ) {
				$title = $shop_title;
			}
		} else {
			if( (class_exists( 'WooCommerce' ) && is_shop()) ) {
				$title = get_post_meta( wc_get_page_id('shop'), 'custom_title', true );
				if(!$title) {
					$title = esc_html__( 'Our Shop', 'nimmo' );
				}
			}
		}
	}

	return array(
		'title' => $title,
	);
}

add_filter( 'get_the_archive_title', 'nimmo_archive_title_remove_label' );
function nimmo_archive_title_remove_label( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = get_the_author();
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	} elseif ( is_home() ) {
		$title = single_post_title( '', false );
	}

	return $title;
}

/**
 * Generates an excerpt from the post content with custom length.
 * Default length is 55 words, same as default the_excerpt()
 *
 * The excerpt words amount will be 55 words and if the amount is greater than
 * that, then the string '&hellip;' will be appended to the excerpt. If the string
 * is less than 55 words, then the content will be returned as it is.
 *
 * @param int $length Optional. Custom excerpt length, default to 55.
 * @param int|WP_Post $post Optional. You will need to provide post id or post object if used outside loops.
 *
 * @return string           The excerpt with custom length.
 */
function nimmo_get_the_excerpt( $length = 55, $post = null ) {
	$post = get_post( $post );

	if ( empty( $post ) || 0 >= $length ) {
		return '';
	}

	if ( post_password_required( $post ) ) {
		return esc_html__( 'Post password required.', 'nimmo' );
	}

	$content = apply_filters( 'the_content', strip_shortcodes( $post->post_content ) );
	$content = str_replace( ']]>', ']]&gt;', $content );

	$excerpt_more = apply_filters( 'nimmo_excerpt_more', '&hellip;' );
	$excerpt      = wp_trim_words( $content, $length, $excerpt_more );

	return $excerpt;
}


/**
 * Check if provided color string is valid color.
 * Only supports 'transparent', HEX, RGB, RGBA.
 *
 * @param  string $color
 *
 * @return boolean
 */
function nimmo_is_valid_color( $color ) {
	$color = preg_replace( "/\s+/m", '', $color );

	if ( $color === 'transparent' ) {
		return true;
	}

	if ( '' == $color ) {
		return false;
	}

	// Hex format
	if ( preg_match( "/(?:^#[a-fA-F0-9]{6}$)|(?:^#[a-fA-F0-9]{3}$)/", $color ) ) {
		return true;
	}

	// rgb or rgba format
	if ( preg_match( "/(?:^rgba\(\d+\,\d+\,\d+\,(?:\d*(?:\.\d+)?)\)$)|(?:^rgb\(\d+\,\d+\,\d+\)$)/", $color ) ) {
		preg_match_all( "/\d+\.*\d*/", $color, $matches );
		if ( empty( $matches ) || empty( $matches[0] ) ) {
			return false;
		}

		$red   = empty( $matches[0][0] ) ? $matches[0][0] : 0;
		$green = empty( $matches[0][1] ) ? $matches[0][1] : 0;
		$blue  = empty( $matches[0][2] ) ? $matches[0][2] : 0;
		$alpha = empty( $matches[0][3] ) ? $matches[0][3] : 1;

		if ( $red < 0 || $red > 255 || $green < 0 || $green > 255 || $blue < 0 || $blue > 255 || $alpha < 0 || $alpha > 1.0 ) {
			return false;
		}
	} else {
		return false;
	}

	return true;
}

/**
 * Minify css
 *
 * @param  string $css
 *
 * @return string
 */
function nimmo_css_minifier( $css ) {
	// Normalize whitespace
	$css = preg_replace( '/\s+/', ' ', $css );
	// Remove spaces before and after comment
	$css = preg_replace( '/(\s+)(\/\*(.*?)\*\/)(\s+)/', '$2', $css );
	// Remove comment blocks, everything between /* and */, unless
	// preserved with /*! ... */ or /** ... */
	$css = preg_replace( '~/\*(?![\!|\*])(.*?)\*/~', '', $css );
	// Remove ; before }
	$css = preg_replace( '/;(?=\s*})/', '', $css );
	// Remove space after , : ; { } */ >
	$css = preg_replace( '/(,|:|;|\{|}|\*\/|>) /', '$1', $css );
	// Remove space before , ; { } ( ) >
	$css = preg_replace( '/ (,|;|\{|}|\(|\)|>)/', '$1', $css );
	// Strips leading 0 on decimal values (converts 0.5px into .5px)
	$css = preg_replace( '/(:| )0\.([0-9]+)(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}.${2}${3}', $css );
	// Strips units if value is 0 (converts 0px to 0)
	$css = preg_replace( '/(:| )(\.?)0(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}0', $css );
	// Converts all zeros value into short-hand
	$css = preg_replace( '/0 0 0 0/', '0', $css );
	// Shortern 6-character hex color codes to 3-character where possible
	$css = preg_replace( '/#([a-f0-9])\\1([a-f0-9])\\2([a-f0-9])\\3/i', '#\1\2\3', $css );

	return trim( $css );
}

/**
 * Custom Comment List
 */
function nimmo_comment_list( $comment, $args, $depth ) {
	if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo ''.$tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
            <?php endif; ?>
                <div class="comment-inner clearfix">
                    <?php if ($args['avatar_size'] != 0) echo get_avatar($comment, $args['avatar_size']); ?>
                    <div class="comment-content">
                        <h4 class="comment-title"><?php printf('%s', get_comment_author_link()); ?></h4>
                        <span class="comment-date">
                            <?php
                            echo get_comment_date() . ' - ' . get_comment_time();
                            ?>
                        </span>
                        <div class="comment-text"><?php comment_text(); ?></div>
                        <div class="comment-reply">
                            <?php comment_reply_link(array_merge($args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                        </div>
                        <div class="line-comment"></div>
                    </div>
                </div>
            <?php if ( 'div' != $args['style'] ) : ?>
        </div>
    <?php endif;
}


add_filter( 'cms_extra_post_types', 'nimmo_add_posttype' );
function nimmo_add_posttype( $postypes ) {
	$portfolio_slug = nimmo_get_opt( 'portfolio_slug', 'portfolio' );
	$postypes['portfolio'] = array(
		'status' => true,
		'args'       => array(
			'rewrite'             => array(
                'slug'       => $portfolio_slug
 		 	),
		),
	);

	$services_slug = nimmo_get_opt( 'services_slug', 'service' );
	$postypes['service'] = array(
		'status'     => false,
		'item_name'  => esc_html__( 'Services', 'nimmo' ),
		'items_name' => esc_html__( 'Services', 'nimmo' ),
		'args'       => array(
			'menu_icon'          => 'dashicons-admin-tools',
			'supports'           => array(
				'title',
				'thumbnail',
				'editor',
			),
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'             => array(
                'slug'       => $services_slug
 		 	),
		),
		'labels'     => array()
	);
	
	$postypes['footer'] = array(
		'status'     => true,
		'item_name'  => esc_html__( 'Footers', 'nimmo' ),
		'items_name' => esc_html__( 'Footers', 'nimmo' ),
		'args'       => array(
			'menu_icon'          => 'dashicons-editor-insertmore',
			'supports'           => array(
				'title',
				'editor',
			),
			'public'             => true,
			'publicly_queryable' => true,
		),
		'labels'     => array()
	);
	
	return $postypes;
}

add_action( 'cms_taxonomy_meta_register', 'nimmo_taxonomy_portfolio' );
function nimmo_taxonomy_portfolio( $taxonomy ) {
	$portfolio_category = array(
		'opt_name'     => 'portfolio-category',
		'display_name' => esc_html__( 'Settings', 'nimmo' ),
	);

	if ( ! $taxonomy->isset_args( 'portfolio-category' ) ) {
		$taxonomy->set_args( 'portfolio-category', $portfolio_category );
	}

}

add_filter( 'cms_extra_taxonomies', 'nimmo_add_tax' );
function nimmo_add_tax( $taxonomies ) {
	$taxonomies['service-category'] = array(
		'status'     => true,
		'post_type'  => array( 'service' ),
		'taxonomy'   => esc_html__( 'Category', 'nimmo' ),
		'taxonomies' => esc_html__( 'Categories', 'nimmo' ),
		'args'       => array(),
		'labels'     => array()
	);

	return $taxonomies;
}

add_filter( 'cms_enable_megamenu', 'nimmo_enable_megamenu' );
function nimmo_enable_megamenu() {
	return true;
}
add_filter( 'cms_enable_onepage', 'nimmo_enable_onepage' );
function nimmo_enable_onepage() {
	return true;
}

/* Add default pagram Carousel */
function nimmo_get_param_carousel( $atts ) {
	if (is_rtl()) {
	    $carousel_rtl = 'true';
	} else {
	    $carousel_rtl = 'false';
	}

	$default  = array(
		'col_xs'           => '1',
		'col_sm'           => '2',
		'col_md'           => '3',
		'col_lg'           => '4',
		'margin'           => '30',
		'loop'             => 'false',
		'autoplay'         => 'false',
		'autoplay_timeout' => '5000',
		'smart_speed'      => '250',
		'center'           => 'false',
		'stage_padding'    => '0',
		'arrows'           => 'false',
		'bullets'          => 'false',
	);
	$new_data = array_merge( $default, $atts );
	extract( $new_data );
	$carousel      = array(
		'data-item-xs' => $col_xs,
		'data-item-sm' => $col_sm,
		'data-item-md' => $col_md,
		'data-item-lg' => $col_lg,

		'data-margin'          => $margin,
		'data-loop'            => $loop,
		'data-autoplay'        => $autoplay,
		'data-autoplaytimeout' => $autoplay_timeout,
		'data-smartspeed'      => $smart_speed,
		'data-center'          => $center,
		'data-arrows'          => $arrows,
		'data-bullets'         => $bullets,
		'data-stagepadding'    => $stage_padding,
		'data-rtl'             => $carousel_rtl,
	);
	$carousel_data = '';
	foreach ( $carousel as $key => $value ) {
		if ( isset( $value ) ) {
			$carousel_data .= $key . '=' . $value . ' ';
		}
	}
	$new_data['carousel_data'] = $carousel_data;

	return $new_data;
}

function nimmo_add_vc_extra_param( $old_param ) {
	$extra_param         = array(
		array(
			"type"             => "dropdown",
			"heading"          => esc_html__( "Columns XS (< 767px)", 'nimmo' ),
			"param_name"       => "col_xs",
			"edit_field_class" => "vc_col-sm-3",
			"value"            => array( 1, 2, 3, 4 ),
			"std"              => 1,
			"group"            => 'Carousel Settings',
		),
		array(
			"type"             => "dropdown",
			"heading"          => esc_html__( "Columns SM (< 991px)", 'nimmo' ),
			"param_name"       => "col_sm",
			"edit_field_class" => "vc_col-sm-3",
			"value"            => array( 1, 2, 3, 4 ),
			"std"              => 2,
			"group"            => 'Carousel Settings',
		),
		array(
			"type"             => "dropdown",
			"heading"          => esc_html__( "Columns MD (< 1199px)", 'nimmo' ),
			"param_name"       => "col_md",
			"edit_field_class" => "vc_col-sm-3",
			"value"            => array( 1, 2, 3, 4 ),
			"std"              => 3,
			"group"            => 'Carousel Settings',
		),
		array(
			"type"             => "dropdown",
			"heading"          => esc_html__( "Columns LG (> 1200px)", 'nimmo' ),
			"param_name"       => "col_lg",
			"edit_field_class" => "vc_col-sm-3",
			"value"            => array( 1, 2, 3, 4, 5, 6 ),
			"std"              => 4,
			"group"            => 'Carousel Settings',
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Margin Items', 'nimmo' ),
			'param_name'  => 'margin',
			'value'       => '',
			'group'       => 'Carousel Settings',
			'description' => 'Enter number: ...( Default 30 )',
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Loop Items", 'nimmo' ),
			"param_name" => "loop",
			"value"      => array(
				"No"  => "false",
				"Yes" => "true",
			),
			"group"      => 'Carousel Settings',
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Autoplay", 'nimmo' ),
			"param_name" => "autoplay",
			"value"      => array(
				"No"  => "false",
				"Yes" => "true",
			),
			"group"      => 'Carousel Settings',
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Autoplay Timeout', 'nimmo' ),
			'param_name'  => 'autoplay_timeout',
			'value'       => '',
			'group'       => 'Carousel Settings',
			'description' => 'Enter number: ...( Default 5000 )',
			'dependency'  => array(
				'element' => 'autoplay',
				'value'   => 'true',
			),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Smart Speed', 'nimmo' ),
			'param_name'  => 'smart_speed',
			'value'       => '',
			'group'       => 'Carousel Settings',
			'description' => 'Enter number: ...( Default 250 )',
			'dependency'  => array(
				'element' => 'autoplay',
				'value'   => 'true',
			),
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Center", 'nimmo' ),
			"param_name" => "center",
			"value"      => array(
				"No"  => "false",
				"Yes" => "true",
			),
			"group"      => 'Carousel Settings',
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Stage Padding', 'nimmo' ),
			'param_name'  => 'stage_padding',
			'value'       => '',
			'group'       => 'Carousel Settings',
			'description' => 'Enter number: ...( Default 0 )',
			'dependency'  => array(
				'element' => 'center',
				'value'   => 'true',
			),
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Show Arrows", 'nimmo' ),
			"param_name" => "arrows",
			"value"      => array(
				"No"  => "false",
				"Yes" => "true",
			),
			"group"      => 'Carousel Settings',
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Show Bullets", 'nimmo' ),
			"param_name" => "bullets",
			"value"      => array(
				"No"  => "false",
				"Yes" => "true",
			),
			"group"      => 'Carousel Settings',
		),
	);
	$old_param['params'] = array_merge( $old_param['params'], $extra_param );

	return $old_param;
}

/* Show/hide CMS Carousel */
add_filter( 'enable_cms_carousel', 'nimmo_enable_cms_carousel' );
function nimmo_enable_cms_carousel() {
	return false;
}

/*
 * Set post views count using post meta
 */
function nimmo_set_post_views( $postID ) {
	$countKey = 'post_views_count';
	$count    = get_post_meta( $postID, $countKey, true );
	if ( $count == '' ) {
		$count = 0;
		delete_post_meta( $postID, $countKey );
		add_post_meta( $postID, $countKey, '0' );
	} else {
		$count ++;
		update_post_meta( $postID, $countKey, $count );
	}
}

function nimmo_build_shortcode_rev_slider()
{
    if (class_exists('RevSlider')) {

        $slider = new RevSlider();
        $arrSliders = $slider->getArrSliders();

        $revsliders = array(''=>'');
        if ($arrSliders) {
            foreach ($arrSliders as $slider) {
                /* @var $slider RevSlider */
                $revsliders[$slider->getAlias()] = $slider->getTitle();
            }
        } else {
            $revsliders[__('No sliders found', 'nimmo')] = 0;
        }
    return $revsliders;
    }
}

/* Create Demo Data */
add_filter('swa_post_types', 'nimmo_export_post_types');
function nimmo_export_post_types($post_type)
{
    $post_type[] = 'footer';
    $post_type[] = 'portfolio';
    return $post_type;
}

add_filter('ct_ie_export_mode', 'nimmo_enable_export_mode');
function nimmo_enable_export_mode()
{
    return false;
}
/* Dashboard Theme */
add_filter('cms_documentation_link',function(){
     return 'http://casethemes.net/docs/nimmo/';
});

add_filter('cms_ticket_link', 'nimmo_add_cms_ticket_link');
function nimmo_add_cms_ticket_link($url)
{
    $url = array('type' => 'url', 'link' => 'https://casethemes.ticksy.com/');
    return $url;
}
add_filter('cms_video_tutorial_link',function(){
     return 'https://www.youtube.com/watch?v=Y5JT9oziwMo';
});