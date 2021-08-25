<?php
/**
 * Custom template tags for this theme.
 *
 * @package Nimmo
 */

/*
 * Convert HEX to GRBA
 */
if(!function_exists('nimmo_rgba')){
    function nimmo_rgba($hex,$opacity = 1) {
        $hex = str_replace("#",null, $hex);
        $color = array();
        if(strlen($hex) == 3) {
            $color['r'] = hexdec(substr($hex,0,1).substr($hex,0,1));
            $color['g'] = hexdec(substr($hex,1,1).substr($hex,1,1));
            $color['b'] = hexdec(substr($hex,2,1).substr($hex,2,1));
            $color['a'] = $opacity;
        }
        else if(strlen($hex) == 6) {
            $color['r'] = hexdec(substr($hex, 0, 2));
            $color['g'] = hexdec(substr($hex, 2, 2));
            $color['b'] = hexdec(substr($hex, 4, 2));
            $color['a'] = $opacity;
        }
        $color = "rgba(".implode(', ', $color).")";
        return $color;
    }
}

/**
 * Header layout
 **/
function nimmo_page_loading()
{
    $page_loading = nimmo_get_opt( 'show_page_loading', false );
    $loading_type = nimmo_get_opt( 'loading_type', 'style1');
    if($page_loading) { ?>
        <div id="ct-loadding" class="ct-loader <?php echo esc_attr($loading_type); ?>">
            <?php switch ( $loading_type )
            {
                case 'style2': ?>
                    <div class="ct-spinner2"></div>
                    <?php break;

                case 'style3': ?>
                    <div class="ct-spinner3">
                      <div class="double-bounce1"></div>
                      <div class="double-bounce2"></div>
                    </div>
                    <?php break;

                case 'style4': ?>
                    <div class="ct-spinner4">
                      <div class="rect1"></div>
                      <div class="rect2"></div>
                      <div class="rect3"></div>
                      <div class="rect4"></div>
                      <div class="rect5"></div>
                    </div>
                    <?php break;

                case 'style5': ?>
                    <div class="ct-spinner5">
                      <div class="bounce1"></div>
                      <div class="bounce2"></div>
                      <div class="bounce3"></div>
                    </div>
                    <?php break;

                case 'style6': ?>
                    <div class="ct-cube-grid">
                      <div class="ct-cube ct-cube1"></div>
                      <div class="ct-cube ct-cube2"></div>
                      <div class="ct-cube ct-cube3"></div>
                      <div class="ct-cube ct-cube4"></div>
                      <div class="ct-cube ct-cube5"></div>
                      <div class="ct-cube ct-cube6"></div>
                      <div class="ct-cube ct-cube7"></div>
                      <div class="ct-cube ct-cube8"></div>
                      <div class="ct-cube ct-cube9"></div>
                    </div>
                    <?php break;

                case 'style7': ?>
                    <div class="ct-folding-cube">
                      <div class="ct-cube1 ct-cube"></div>
                      <div class="ct-cube2 ct-cube"></div>
                      <div class="ct-cube4 ct-cube"></div>
                      <div class="ct-cube3 ct-cube"></div>
                    </div>
                    <?php break;

                case 'style8': ?>
                    <div class="ct-loading-stairs">
                        <div class="loader-bar"></div>
                        <div class="loader-bar"></div>
                        <div class="loader-bar"></div>
                        <div class="loader-bar"></div>
                        <div class="loader-bar"></div>
                        <div class="loader-ball"></div>
                    </div>
                    <?php break;

                default: ?>
                    <div class="loading-spin">
                        <div class="spinner">
                            <div class="right-side"><div class="bar"></div></div>
                            <div class="left-side"><div class="bar"></div></div>
                        </div>
                        <div class="spinner color-2" style="">
                            <div class="right-side"><div class="bar"></div></div>
                            <div class="left-side"><div class="bar"></div></div>
                        </div>
                    </div>
                    <?php break;
            } ?>
        </div>
    <?php }
}

/**
 * Header layout
 **/
function nimmo_header_layout()
{
    $header_layout = nimmo_get_opt( 'header_layout', '1' );
    $custom_header = nimmo_get_page_opt( 'custom_header', '0' );

    if ( $custom_header == '1' || is_archive() && $custom_header == '1' )
    {
        $page_header_layout = nimmo_get_page_opt('header_layout');
        $header_layout = $page_header_layout;
        if($header_layout == '0') {
            return;
        }
    }

    get_template_part( 'template-parts/header-layout', $header_layout );
}

/**
 * Page title layout
 **/
function nimmo_footer()
{
    $footer_layout = nimmo_get_opt( 'footer_layout', '1' );
    $custom_footer = nimmo_get_page_opt('custom_footer', 'false');
    $footer_layout_page = nimmo_get_page_opt('footer_layout');
    if($custom_footer) {
        $footer_layout = $footer_layout_page;
    }
    get_template_part( 'template-parts/footer-layout', $footer_layout );
}

/**
 * Set primary content class based on sidebar position
 * 
 * @param  string $sidebar_pos
 * @param  string $extra_class
 */
function nimmo_primary_class( $sidebar_pos, $extra_class = '' )
{
    if ( class_exists( 'WooCommerce' ) && (is_product_category()) || class_exists( 'WooCommerce' ) && (is_shop()) ) :
        $sidebar_load = 'sidebar-shop';
    elseif (is_page()) :
        $sidebar_load = 'sidebar-page';
    else :
        $sidebar_load = 'sidebar-blog';
    endif;

    if ( is_active_sidebar( $sidebar_load ) ) {
        $class = array( trim( $extra_class ) );
        switch ( $sidebar_pos )
        {
            case 'left':
                $class[] = 'content-has-sidebar float-right col-xl-9 col-lg-8 col-md-12';
                break;

            case 'right':
                $class[] = 'content-has-sidebar float-left col-xl-9 col-lg-8 col-md-12';
                break;

            default:
                $class[] = 'content-full-width col-12';
                break;
        }

        $class = implode( ' ', array_filter( $class ) );

        if ( $class )
        {
            echo ' class="' . esc_html($class) . '"';
        }
    } else {
        echo ' class="content-area col-12"'; 
    }
}

/**
 * Set secondary content class based on sidebar position
 * 
 * @param  string $sidebar_pos
 * @param  string $extra_class
 */
function nimmo_secondary_class( $sidebar_pos, $extra_class = '' )
{
    if ( class_exists( 'WooCommerce' ) && (is_product_category()) ) :
        $sidebar_load = 'sidebar-shop';
    elseif (is_page()) :
        $sidebar_load = 'sidebar-page';
    else :
        $sidebar_load = 'sidebar-blog';
    endif;

    if ( is_active_sidebar( $sidebar_load ) ) {
        $class = array(trim($extra_class));
        switch ($sidebar_pos) {
            case 'left':
                $class[] = 'widget-has-sidebar sidebar-fixed col-xl-3 col-lg-4 col-md-12';
                break;

            case 'right':
                $class[] = 'widget-has-sidebar sidebar-fixed col-xl-3 col-lg-4 col-md-12';
                break;

            default:
                break;
        }

        $class = implode(' ', array_filter($class));

        if ($class) {
            echo ' class="' . esc_html($class) . '"';
        }
    }
}


/**
 * Prints HTML for breadcrumbs.
 */
function nimmo_breadcrumb()
{
    if ( ! class_exists( 'CMS_Breadcrumb' ) )
    {
        return;
    }

    $breadcrumb = new CMS_Breadcrumb();
    $entries = $breadcrumb->get_entries();

    if ( empty( $entries ) )
    {
        return;
    }

    ob_start();

    foreach ( $entries as $entry )
    {
        $entry = wp_parse_args( $entry, array(
            'label' => '',
            'url'   => ''
        ) );

        if ( empty( $entry['label'] ) )
        {
            continue;
        }

        echo '<li>';

        if ( ! empty( $entry['url'] ) )
        {
            printf(
                '<a class="breadcrumb-entry" href="%1$s">%2$s</a>',
                esc_url( $entry['url'] ),
                esc_attr( $entry['label'] )
            );
        }
        else
        {
            printf( '<span class="breadcrumb-entry" >%s</span>', esc_html( $entry['label'] ) );
        }

        echo '</li>';
    }

    $output = ob_get_clean();

    if ( $output )
    {
        printf( '<ul class="ct-breadcrumb">%s</ul>', wp_kses_post($output));
    }
}


function nimmo_entry_link_pages()
{
    wp_link_pages( array(
        'before'      => '<div class="page-links">',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
    ) );
}


if ( ! function_exists( 'nimmo_entry_excerpt' ) ) :
    /**
     * Print post excerpt based on length.
     *
     * @param  integer $length
     */
    function nimmo_entry_excerpt( $length = 55 )
    {
        $cms_the_excerpt = get_the_excerpt();
        if(!empty($cms_the_excerpt)) {
            echo esc_html($cms_the_excerpt);
        } else {
            echo wp_kses_post(nimmo_get_the_excerpt( $length ));
        }
    }
endif;

/**
 * Prints post edit link when applicable
 */
function nimmo_entry_edit_link()
{
    edit_post_link(
        sprintf(
            wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                esc_attr__( 'Edit', 'nimmo' ),
                array(
                    'span' => array(
                        'class' => array(),
                    ),
                )
            ),
            get_the_title()
        ),
        '<div class="entry-edit-link"><i class="fa fa-edit"></i>',
        '</div>'
    );
}


/**
 * Prints posts pagination based on query
 *
 * @param  WP_Query $query     Custom query, if left blank, this will use global query ( current query )
 * @return void
 */
function nimmo_posts_pagination( $query = null )
{
    $classes = array();

    if ( empty( $query ) )
    {
        $query = $GLOBALS['wp_query'];
    }

    if ( empty( $query->max_num_pages ) || ! is_numeric( $query->max_num_pages ) || $query->max_num_pages < 2 )
    {
        return;
    }

    $paged = get_query_var( 'paged' );

    if ( ! $paged && is_front_page() && ! is_home() )
    {
        $paged = get_query_var( 'page' );
    }

    $paged = $paged ? intval( $paged ) : 1;

    $pagenum_link = html_entity_decode( get_pagenum_link() );
    $query_args   = array();
    $url_parts    = explode( '?', $pagenum_link );

    if ( isset( $url_parts[1] ) )
    {
        wp_parse_str( $url_parts[1], $query_args );
    }

    $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
    $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

    $html_prev = '<i class="fa fa-angle-left"></i>';
    $html_next = '<i class="fa fa-angle-right"></i>';
    $links = paginate_links( array(
        'base'     => $pagenum_link,
        'total'    => $query->max_num_pages,
        'current'  => $paged,
        'mid_size' => 1,
        'add_args' => array_map( 'urlencode', $query_args ),
        'prev_text' => $html_prev,
        'next_text' => $html_next,
    ) );

    $template = '
    <nav class="navigation posts-pagination">
        <div class="posts-page-links">%2$s</div>
    </nav>';

    if ( $links )
    {
        printf(
            wp_kses_post($template),
            esc_attr__( 'Navigation', 'nimmo' ),
            wp_kses_post($links)
        );
    }
}

/**
 * Prints archive meta on blog
 */
if ( ! function_exists( 'nimmo_archive_meta' ) ) :
    function nimmo_archive_meta() {
        $archive_author_on = nimmo_get_opt( 'archive_author_on', true );
        $archive_categories_on = nimmo_get_opt( 'archive_categories_on', true );
        $archive_comments_on = nimmo_get_opt( 'archive_comments_on', true );
        $archive_date_on = nimmo_get_opt( 'archive_date_on', true );
        if($archive_author_on || $archive_comments_on || $archive_categories_on || $archive_date_on) : ?>
            <ul class="entry-meta">
                <?php if($archive_date_on) : ?>
                    <li><i class="fa fa-calendar"></i><?php echo get_the_date(); ?></li>
                <?php endif; ?>
                <?php if($archive_author_on) : ?>
                    <li class="item-author">
                        <i class="fa fa-user"></i>
                        <?php echo esc_html__( 'By', 'nimmo' ) ?>
                        <?php the_author_posts_link(); ?>
                    </li>
                <?php endif; ?>
                <?php if($archive_categories_on) : ?>
                    <li class="item-category"><i class="fa fa-list"></i><?php the_terms( get_the_ID(), 'category', '', ', ' ); ?></li>
                <?php endif; ?>
                <?php if($archive_comments_on) : ?>
                    <li>
                        <a href="<?php the_permalink(); ?>"><i class="fa fa-comment"></i><?php echo comments_number(esc_attr__('No Comments', 'nimmo'),esc_attr__('1 Comment', 'nimmo'),esc_attr__('% Comments', 'nimmo')); ?></a>
                    </li>
                <?php endif; ?>
            </ul>
    <?php endif; }
endif;

/**
 * Prints post meta on blog
 */
if ( ! function_exists( 'nimmo_post_meta' ) ) :
    function nimmo_post_meta() {
        $post_author_on = nimmo_get_opt( 'post_author_on', true );
        $post_categories_on = nimmo_get_opt( 'post_categories_on', true );
        $post_comments_on = nimmo_get_opt( 'post_comments_on', false );
        $post_date_on = nimmo_get_opt( 'post_date_on', true );
        if($post_author_on || $post_categories_on || $post_comments_on || $post_date_on) : ?>
            <ul class="entry-meta">
                <?php if($post_date_on) : ?>
                    <li><i class="fa fa-calendar"></i><?php echo get_the_date(); ?></li>
                <?php endif; ?>
                <?php if($post_author_on) : ?>
                    <li class="item-author">
                        <i class="fa fa-user"></i>
                        <?php echo esc_html__( 'By', 'nimmo' ) ?>
                        <?php the_author_posts_link(); ?>
                    </li>
                <?php endif; ?>
                <?php if($post_categories_on) : ?>
                    <li class="item-category"><i class="fa fa-list"></i><?php the_terms( get_the_ID(), 'category', '', ', ' ); ?></li>
                <?php endif; ?>
                <?php if($post_comments_on) : ?>
                    <li>
                        <a href="<?php the_permalink(); ?>"><i class="fa fa-comment"></i><?php echo comments_number(esc_attr__('No Comments', 'nimmo'),esc_attr__('1 Comment', 'nimmo'),esc_attr__('% Comments', 'nimmo')); ?></a>
                    </li>
                <?php endif; ?>
                <?php if(is_sticky()) { ?>
                    <li><?php echo esc_html__('Sticky', 'nimmo'); ?></li>
                <?php } ?>
            </ul>
    <?php endif; }
endif;

/**
 * Prints tag list
 */
if ( ! function_exists( 'nimmo_entry_tagged_in' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function nimmo_entry_tagged_in()
    {
        $tags_list = get_the_tag_list( '<label class="label">'.esc_attr__('Tags:', 'nimmo').'</label>', ' ' );
        if ( $tags_list )
        {
            echo '<div class="entry-tags">';
            printf('%2$s', '', $tags_list);
            echo '</div>';
        }
    }
endif;

/**
 * List socials share for post.
 */
function nimmo_socials_share_default() { ?>
    <div class="entry-social">
        <a class="fb-social hover-effect" title="<?php echo esc_attr__('Facebook', 'nimmo'); ?>" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="zmdi zmdi-facebook"></i></a>
        <a class="tw-social hover-effect" title="<?php echo esc_attr__('Twitter', 'nimmo'); ?>" target="_blank" href="http://twitter.com/share?url=<?php the_permalink(); ?>"><i class="zmdi zmdi-twitter"></i></a>
        <a class="g-social hover-effect" title="<?php echo esc_attr__('Google Plus', 'nimmo'); ?>" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="zmdi zmdi-google-plus"></i></a>
        <a class="pin-social hover-effect" title="<?php echo esc_attr__('Pinterest', 'nimmo'); ?>" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo esc_url(the_post_thumbnail_url( 'full' )); ?>&media=&description=<?php the_title(); ?>"><i class="zmdi zmdi-pinterest"></i></a>
    </div>
    <?php
}

/**
 * Footer Top
 */
function nimmo_footer_top() {
    $footer_top_column = nimmo_get_opt( 'footer_top_column' );
    $_class = "";

    switch ($footer_top_column){
        case '1':
            $_class = 'col-12';
            break;
        case '2':
            $_class = 'col-xl-6 col-lg-6 col-md-6 col-sm-12';
            break;
        case '3':
            $_class = 'col-xl-4 col-lg-4 col-md-4 col-sm-12';
            break;
        case '4':
            $_class = 'col-xl-3 col-lg-3 col-md-6 col-sm-12';
            break;
    }

    for($i = 1 ; $i <= $footer_top_column ; $i++){
        if ( is_active_sidebar( 'sidebar-footer-' . $i ) ){
            echo '<div class="ct-footer-item ' . esc_html($_class) . '">'; ?>
                <?php dynamic_sidebar( 'sidebar-footer-' . $i );
            echo "</div>";
        }
    }
}

/**
 * Footer Gallery
 */
function nimmo_footer_gallery() {
    if (is_rtl()) {
        $carousel_rtl = 'true';
    } else {
        $carousel_rtl = 'false';
    }
    $footer_gallery = nimmo_get_opt( 'footer_gallery', 'no' );
    $footer_gallery_images = nimmo_get_opt( 'footer_gallery_images' );
    $footer_gallery_list = explode(',', $footer_gallery_images);
    if(!empty($footer_gallery_images)) {
        wp_enqueue_script( 'owl-carousel' );
        wp_enqueue_script( 'nimmo-carousel' ); ?>
        <div class="ct-carousel owl-carousel images-light-box-carousel" data-item-xs="4" data-item-sm="6" data-item-md="8" data-item-lg="10" data-margin="0" data-loop="true" data-autoplay="true" data-autoplaytimeout="5000" data-smartspeed="250" data-center="false" data-arrows="false" data-bullets="false" data-stagepadding="0" data-stagepaddingsm="0" data-rtl="<?php echo esc_attr( $carousel_rtl ); ?>">
            <?php foreach ($footer_gallery_list as $img_id):
                ?>
                <div class="ct-carousel-item">
                    <a class="light-box" href="<?php echo esc_url(wp_get_attachment_image_url($img_id, 'full'));?>"><img src="<?php echo esc_url(wp_get_attachment_image_url($img_id, 'nimmo-gallery'));?>" alt="<?php echo esc_attr(get_post_meta( $img_id, '_wp_attachment_image_alt', true )) ?>"></a>
                </div>
                <?php
            endforeach;
            ?>
        </div>
    <?php }
}

/**
* Display navigation to next/previous post when applicable.
*/
function nimmo_post_nav_default() {
    global $post;
    // Don't print empty markup if there's nowhere to navigate.
    $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );

    if ( ! $next && ! $previous )
        return;
    ?>
    <?php
    $next_post = get_next_post();
    $previous_post = get_previous_post();
    if( !empty($next_post) || !empty($previous_post) ) { ?>
        <div class="post-previous-next">
            <?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { ?>
                <div class="post-previous">
                    <a href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><i class="fa fa-angle-double-left"></i> <?php echo esc_html__('Previous Post', 'nimmo'); ?></a>
                </div>
            <?php } ?>
            <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') { ?>
                <div class="post-next">
                    <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><?php echo esc_html__('Newer Post', 'nimmo'); ?> <i class="fa fa-angle-double-right"></i></a>
                </div>
            <?php } ?>
        </div>
    <?php }
}

/**
 * Related Post
 */
function nimmo_related_post()
{
    global $post;
    $current_id = $post->ID;
    $posttags = get_the_category($post->ID);
    if (empty($posttags)) return;

    $tags = array();

    foreach ($posttags as $tag) {

        $tags[] = $tag->term_id;
    }
    $post_number = '4';
    $query_similar = new WP_Query(array('posts_per_page' => $post_number, 'post_type' => 'post', 'post_status' => 'publish', 'category__in' => $tags));
    $post_related_post = nimmo_get_opt( 'post_related_post', false );
    if ($post_related_post && count($query_similar->posts) > 1) {
        ?>
        <div class="ct-related-post-wrap">
            <div class="container">
                <div class="ct-related-post">
                    <h3 class="section-title"><?php echo esc_html__('Similar Blog Posts', 'nimmo'); ?></h3>
                    <div class="ct-related-post-inner row">
                        <?php foreach ($query_similar->posts as $post):
                            $thumbnail_url = '';
                            if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) :
                                $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'nimmo-medium', false);
                            endif;
                            if ($post->ID !== $current_id) : ?>
                                <div class="grid-item col-xl-4 col-lg-4 col-md-4">
                                    <div class="grid-item-inner">
                                        <?php if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) : ?>
                                            <div class="item-featured">
                                                <a href="<?php echo esc_url( get_permalink()); ?>" ><img src="<?php echo esc_url($thumbnail_url[0]); ?>" alt="<?php the_title_attribute(); ?>" /></a>
                                            </div>
                                        <?php endif; ?>
                                        <div class="item-holder">
                                            <h3 class="item-title">
                                                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a>
                                            </h3>
                                            <div class="item-content">
                                                <?php echo wp_trim_words( $post->post_excerpt, $num_words = 15, $more = null ); ?>
                                            </div>
                                            <div class="item-readmore">
                                                <a href="<?php echo esc_url( get_permalink()); ?>" ><?php echo esc_html__( 'Read more', 'nimmo' ) ?><i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif;
                        endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php }

    wp_reset_postdata();
}

/**
 * Header Search Mobile
 */
function nimmo_header_mobile_search()
{ ?>
    <div class="header-mobile-search">
        <form role="search" method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
            <input type="text" placeholder="<?php esc_attr_e('Search...', 'nimmo'); ?>" name="s" class="search-field" />
            <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
<?php }

/**
 * Page title layout
 **/
function nimmo_page_title_layout()
{
    get_template_part( 'template-parts/page-title', '' );
}

/**
 * Social Top Bar
 */
function nimmo_header_social_icon() {
    $social_facebook_url = nimmo_get_opt( 'social_facebook_url' );
    $social_twitter_url = nimmo_get_opt( 'social_twitter_url' );
    $social_inkedin_url = nimmo_get_opt( 'social_inkedin_url' );
    $social_instagram_url = nimmo_get_opt( 'social_instagram_url' );
    $social_google_url = nimmo_get_opt( 'social_google_url' );
    $social_skype_url = nimmo_get_opt( 'social_skype_url' );
    $social_pinterest_url = nimmo_get_opt( 'social_pinterest_url' );
    $social_vimeo_url = nimmo_get_opt( 'social_vimeo_url' );
    $social_youtube_url = nimmo_get_opt( 'social_youtube_url' );
    $social_yelp_url = nimmo_get_opt( 'social_yelp_url' );
    $social_tumblr_url = nimmo_get_opt( 'social_tumblr_url' );
    $social_tripadvisor_url = nimmo_get_opt( 'social_tripadvisor_url' );

    if(!empty($social_facebook_url)) :
        echo '<a href="'.esc_url($social_facebook_url).'" target="_blank"><i class="fab fa-facebook-f"></i></a>';
    endif;
    if(!empty($social_twitter_url)) :
        echo '<a href="'.esc_url($social_twitter_url).'" target="_blank"><i class="fab fa-twitter"></i></a>';
    endif;
    if(!empty($social_inkedin_url)) :
        echo '<a href="'.esc_url($social_inkedin_url).'" target="_blank"><i class="fab fa-linkedin-in"></i></a>';
    endif;
    if(!empty($social_instagram_url)) :
        echo '<a href="'.esc_url($social_instagram_url).'" target="_blank"><i class="fab fa-instagram"></i></a>';
    endif;
    if(!empty($social_google_url)) :
        echo '<a href="'.esc_url($social_google_url).'" target="_blank"><i class="fab fa-google-plus"></i></a>';
    endif;
    if(!empty($social_skype_url)) :
        echo '<a href="'.esc_url($social_skype_url).'" target="_blank"><i class="fab fa-skype"></i></a>';
    endif;
    if(!empty($social_pinterest_url)) :
        echo '<a href="'.esc_url($social_pinterest_url).'" target="_blank"><i class="fab fa-pinterest"></i></a>';
    endif;
    if(!empty($social_vimeo_url)) :
        echo '<a href="'.esc_url($social_vimeo_url).'" target="_blank"><i class="fab fa-vimeo"></i></a>';
    endif;
    if(!empty($social_youtube_url)) :
        echo '<a href="'.esc_url($social_youtube_url).'" target="_blank"><i class="fab fa-youtube"></i></a>';
    endif;
    if(!empty($social_yelp_url)) :
        echo '<a href="'.esc_url($social_yelp_url).'" target="_blank"><i class="fab fa-yelp"></i></a>';
    endif;
    if(!empty($social_tumblr_url)) :
        echo '<a href="'.esc_url($social_tumblr_url).'" target="_blank"><i class="fab fa-tumblr"></i></a>';
    endif;
    if(!empty($social_tripadvisor_url)) :
        echo '<a href="'.esc_url($social_tripadvisor_url).'" target="_blank"><i class="fab fa-tripadvisor"></i></a>';
    endif;
}

/**
 * Social Footer
 */
function nimmo_footer_social_icon() {
    $social_facebook_url = nimmo_get_opt( 'social_facebook_url' );
    $social_twitter_url = nimmo_get_opt( 'social_twitter_url' );
    $social_inkedin_url = nimmo_get_opt( 'social_inkedin_url' );
    $social_instagram_url = nimmo_get_opt( 'social_instagram_url' );
    $social_google_url = nimmo_get_opt( 'social_google_url' );
    $social_skype_url = nimmo_get_opt( 'social_skype_url' );
    $social_pinterest_url = nimmo_get_opt( 'social_pinterest_url' );
    $social_vimeo_url = nimmo_get_opt( 'social_vimeo_url' );
    $social_youtube_url = nimmo_get_opt( 'social_youtube_url' );
    $social_yelp_url = nimmo_get_opt( 'social_yelp_url' );
    $social_tumblr_url = nimmo_get_opt( 'social_tumblr_url' );
    $social_tripadvisor_url = nimmo_get_opt( 'social_tripadvisor_url' );

    if(!empty($social_facebook_url)) :
        echo '<a href="'.esc_url($social_facebook_url).'" target="_blank"><i class="fa fa-facebook-square"></i></a>';
    endif;
    if(!empty($social_twitter_url)) :
        echo '<a href="'.esc_url($social_twitter_url).'" target="_blank"><i class="fa fa-twitter-square"></i></a>';
    endif;
    if(!empty($social_inkedin_url)) :
        echo '<a href="'.esc_url($social_inkedin_url).'" target="_blank"><i class="fa fa-linkedin-square"></i></a>';
    endif;
    if(!empty($social_instagram_url)) :
        echo '<a href="'.esc_url($social_instagram_url).'" target="_blank"><i class="fa fa-instagram"></i></a>';
    endif;
    if(!empty($social_google_url)) :
        echo '<a href="'.esc_url($social_google_url).'" target="_blank"><i class="fa fa-google-plus-square"></i></a>';
    endif;
    if(!empty($social_skype_url)) :
        echo '<a href="'.esc_url($social_skype_url).'" target="_blank"><i class="fa fa-skype"></i></a>';
    endif;
    if(!empty($social_pinterest_url)) :
        echo '<a href="'.esc_url($social_pinterest_url).'" target="_blank"><i class="fa fa-pinterest-square"></i></a>';
    endif;
    if(!empty($social_vimeo_url)) :
        echo '<a href="'.esc_url($social_vimeo_url).'" target="_blank"><i class="fa fa-vimeo-square"></i></a>';
    endif;
    if(!empty($social_youtube_url)) :
        echo '<a href="'.esc_url($social_youtube_url).'" target="_blank"><i class="fa fa-youtube"></i></a>';
    endif;
    if(!empty($social_yelp_url)) :
        echo '<a href="'.esc_url($social_yelp_url).'" target="_blank"><i class="fa fa-yelp"></i></a>';
    endif;
    if(!empty($social_tumblr_url)) :
        echo '<a href="'.esc_url($social_tumblr_url).'" target="_blank"><i class="fa fa-tumblr"></i></a>';
    endif;
    if(!empty($social_tripadvisor_url)) :
        echo '<a href="'.esc_url($social_tripadvisor_url).'" target="_blank"><i class="fa fa-tripadvisor"></i></a>';
    endif;
}

/**
 * Header Search Mobile
 */
function nimmo_hidden_sidebar() { 
    $hidden_sidebar_on = nimmo_get_opt( 'hidden_sidebar_on', false );
    $logo_light = nimmo_get_opt( 'logo', array( 'url' => '', 'id' => '' ) );
    $logo_light_url = $logo_light['url'];
    if($hidden_sidebar_on) : ?>
        <div class="hidden-sidebar">
            <div class="ct-close hidden-sidebar-close"></div>
            <div class="hidden-sidebar-inner">
                <?php if(!empty($logo_light_url)) : ?>
                    <div class="hidden-sidebar-logo">
                        <?php 
                            printf(
                                '<a class="logo-light" href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="%2$s"/></a>',
                                esc_url( home_url( '/' ) ),
                                esc_attr( get_bloginfo( 'name' ) ),
                                esc_url( $logo_light_url )
                            );
                        ?>
                    </div>
                <?php endif; ?>
                <div class="hidden-sidebar-body">
                    <?php if ( has_nav_menu( 'hidden-sidebar' ) )
                    {
                        $attr_menu = array(
                            'theme_location' => 'hidden-sidebar',
                            'container'  => '',
                            'menu_id'    => 'hidden-menu',
                            'menu_class' => 'hidden-menu clearfix',
                            'walker'         => class_exists( 'EFramework_Mega_Menu_Walker' ) ? new EFramework_Mega_Menu_Walker : '',
                        );
                        wp_nav_menu( $attr_menu );
                    } ?>
                </div>
                <div class="hidden-sidebar-social"><?php nimmo_footer_social_icon(); ?></div>
            </div>
        </div>
<?php endif; }

/**
 * Demo Bar
 */
function nimmo_demo_bar() { ?>
    <div class="ct-demo-bar">
        <div class="ct-demo-option">
            <a class="choose-demo" href="javascript:;">
                <span>Choose Theme Styling</span>
                <i class="fa fa-cog"></i>
            </a>
            <a href="https://casethemes.ticksy.com/" target="_blank">
                <span>Submit a Ticket</span>
                <i class="fa fa-life-ring"></i>
            </a>
            <a href="https://themeforest.net/cart/add_items?ref=case-themes&item_ids=22824487" target="_blank">
                <span>Purchase Theme</span>
                <i class="fa fa-shopping-cart"></i>
            </a>
        </div>
        <div class="ct-demo-bar-inner">
            <div class="ct-demo-bar-meta">
                <h4>Pre-Built Demos Collection</h4>
                <p>Nimmo comes with a beautiful collection of modern, easily importable, and highly customizable demo layouts. Any of which can be installed via one click.</p>
            </div>
            <div class="ct-demo-bar-list">
                <div class="ct-demo-bar-item">
                    <div class="ct-demo-bar-item-inner">
                        <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/home-demo/demo1.jpg'); ?>" alt="Demo" />
                        <div class="ct-demo-bar-holder">
                            <h6>Main</h6>
                            <a class="btn btn-default" href="http://demo.casethemes.net/nimmo/" target="_blank">View Demo</a>
                        </div>
                    </div>
                </div>
                <div class="ct-demo-bar-item">
                    <div class="ct-demo-bar-item-inner">
                        <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/home-demo/demo8.jpg'); ?>" alt="Demo" />
                        <div class="ct-demo-bar-holder">
                            <h6>Startup</h6>
                            <a class="btn btn-default" href="http://demo.casethemes.net/nimmo/home-startup/" target="_blank">View Demo</a>
                        </div>
                    </div>
                </div>
                <div class="ct-demo-bar-item">
                    <div class="ct-demo-bar-item-inner">
                        <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/home-demo/demo7.jpg'); ?>" alt="Demo" />
                        <div class="ct-demo-bar-holder">
                            <h6>Business 1</h6>
                            <a class="btn btn-default" href="http://demo.casethemes.net/nimmo/home-business/" target="_blank">View Demo</a>
                        </div>
                    </div>
                </div>
                <div class="ct-demo-bar-item">
                    <div class="ct-demo-bar-item-inner">
                        <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/home-demo/demo9.jpg'); ?>" alt="Demo" />
                        <div class="ct-demo-bar-holder">
                            <h6>Business 2</h6>
                            <a class="btn btn-default" href="http://demo.casethemes.net/nimmo/home-business-2/" target="_blank">View Demo</a>
                        </div>
                    </div>
                </div>
                <div class="ct-demo-bar-item">
                    <div class="ct-demo-bar-item-inner">
                        <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/home-demo/demo2.jpg'); ?>" alt="Demo" />
                        <div class="ct-demo-bar-holder">
                            <h6>Dark</h6>
                            <a class="btn btn-default" href="http://demo.casethemes.net/nimmo/home-dark" target="_blank">View Demo</a>
                        </div>
                    </div>
                </div>
                <div class="ct-demo-bar-item">
                    <div class="ct-demo-bar-item-inner">
                        <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/home-demo/demo10.jpg'); ?>" alt="Demo" />
                        <div class="ct-demo-bar-holder">
                            <h6>Consulting</h6>
                            <a class="btn btn-default" href="http://demo.casethemes.net/nimmo/home-consulting" target="_blank">View Demo</a>
                        </div>
                    </div>
                </div>
                <div class="ct-demo-bar-item">
                    <div class="ct-demo-bar-item-inner">
                        <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/home-demo/demo3.jpg'); ?>" alt="Demo" />
                        <div class="ct-demo-bar-holder">
                            <h6>Video</h6>
                            <a class="btn btn-default" href="http://demo.casethemes.net/nimmo-video" target="_blank">View Demo</a>
                        </div>
                    </div>
                </div>
                <div class="ct-demo-bar-item">
                    <div class="ct-demo-bar-item-inner">
                        <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/home-demo/demo4.jpg'); ?>" alt="Demo" />
                        <div class="ct-demo-bar-holder">
                            <h6>Agency</h6>
                            <a class="btn btn-default" href="http://demo.casethemes.net/nimmo/home-modern-agency/" target="_blank">View Demo</a>
                        </div>
                    </div>
                </div>
                <div class="ct-demo-bar-item">
                    <div class="ct-demo-bar-item-inner">
                        <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/home-demo/demo5.jpg'); ?>" alt="Demo" />
                        <div class="ct-demo-bar-holder">
                            <h6>Studio</h6>
                            <a class="btn btn-default" href="http://demo.casethemes.net/nimmo/home-studio" target="_blank">View Demo</a>
                        </div>
                    </div>
                </div>
                <div class="ct-demo-bar-item">
                    <div class="ct-demo-bar-item-inner">
                        <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/home-demo/demo6.jpg'); ?>" alt="Demo" />
                        <div class="ct-demo-bar-holder">
                            <h6>Parallax</h6>
                            <a class="btn btn-default" href="http://demo.casethemes.net/nimmo/home-parallax-portfolio" target="_blank">View Demo</a>
                        </div>
                    </div>
                </div>
                <div class="ct-demo-bar-item">
                    <div class="ct-demo-bar-item-inner">
                        <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/home-demo/demo11.jpg'); ?>" alt="Demo" />
                        <div class="ct-demo-bar-holder">
                            <h6>Creative</h6>
                            <a class="btn btn-default" href="http://demo.casethemes.net/nimmo/home-creative" target="_blank">View Demo</a>
                        </div>
                    </div>
                </div>
                <div class="ct-demo-bar-item">
                    <div class="ct-demo-bar-item-inner">
                        <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/home-demo/demo12.jpg'); ?>" alt="Demo" />
                        <div class="ct-demo-bar-holder">
                            <h6>Dark</h6>
                            <a class="btn btn-default" href="http://demo.casethemes.net/nimmo/home-dark-2" target="_blank">View Demo</a>
                        </div>
                    </div>
                </div>
                <div class="ct-demo-bar-item">
                    <div class="ct-demo-bar-item-inner">
                        <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/home-demo/demo13.jpg'); ?>" alt="Demo" />
                        <div class="ct-demo-bar-holder">
                            <h6>Corporate Agency</h6>
                            <a class="btn btn-default" href="https://demo.casethemes.net/nimmo/home-corporate-agency/" target="_blank">View Demo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }

/**
 * Cart Sidebar
 */
function nimmo_cart_sidebar() { 
    $cart_icon = nimmo_get_opt( 'cart_icon', false );
    $cart_icon_sidebar = nimmo_get_opt( 'cart_icon_sidebar', false );
    ?>
    <?php if(class_exists('Woocommerce') && $cart_icon || class_exists('Woocommerce') && $cart_icon_sidebar) : ?>
        <div class="ct-widget-cart-wrap">
            <div class="ct-widget-cart-overlay"></div>
            <div class="ct-widget-cart-sidebar">
                <div class="ct-close cart-close"></div>
                <div class="widget_shopping_cart">
                    <div class="widget_shopping_cart_content">
                        <?php woocommerce_mini_cart(); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php }

/**
 * Show Cart Sidebar Hidden
 */
add_action('wp_ajax_nopriv_item_added', 'nimmo_addedtocart_sweet_message');
add_action('wp_ajax_item_added', 'nimmo_addedtocart_sweet_message');
function nimmo_addedtocart_sweet_message() {
    echo isset($_POST['id']) && $_POST['id'] > 0 ? (int) esc_attr($_POST['id']) : false;
    die();
}
add_action('wp_footer', 'nimmo_product_count_check');
function nimmo_product_count_check() {
    if (class_exists('Woocommerce') && is_checkout())
        return;
    ?>
    <script type="text/javascript">
        jQuery( function($) {
            if ( typeof wc_add_to_cart_params === 'undefined' )
                return false;

            $(document.body).on( 'added_to_cart', function( event, fragments, cart_hash, $button ) {
                var $pid = $button.data('product_id');

                $.ajax({
                    type: 'POST',
                    url: wc_add_to_cart_params.ajax_url,
                    data: {
                        'action': 'item_added',
                        'id'    : $pid
                    },
                    success: function (response) {
                        $('.ct-widget-cart-wrap').addClass('open');
                    }
                });
            });
        });
    </script>
    <?php
}