<?php
/**
 * Template part for displaying default header layout
 */
$custom_header = nimmo_get_page_opt( 'custom_header', false );
$sticky_on = nimmo_get_opt( 'sticky_on', false );
$hidden_sidebar_on = nimmo_get_opt( 'hidden_sidebar_on', false );
$hidden_sidebar_page_on = nimmo_get_page_opt( 'hidden_sidebar_on', 'themeoption' );
if($custom_header && !empty($hidden_sidebar_page_on) && $hidden_sidebar_page_on != 'themeoption') {
    $hidden_sidebar_on = $hidden_sidebar_page_on;
}

$cart_icon = nimmo_get_opt( 'cart_icon', false );
$cart_page_on = nimmo_get_page_opt( 'cart_on', 'themeoption' );
if($custom_header && !empty($cart_page_on) && $cart_page_on != 'themeoption') {
    $cart_icon = $cart_page_on;
}

$get_revslide = nimmo_get_opt( 'get_revslide' );
$header_layout = nimmo_get_page_opt( 'header_layout' );
$get_revslide_page = nimmo_get_page_opt( 'get_revslide' );
if($custom_header && $header_layout == '4' && !empty($get_revslide_page)) {
    $get_revslide = $get_revslide_page;
} 

$h_btn_text = nimmo_get_opt( 'h_btn_text' );
$h_btn_link_type = nimmo_get_opt( 'h_btn_link_type', 'page' );
$h_btn_link = nimmo_get_opt( 'h_btn_link' );
$h_btn_link_custom = nimmo_get_opt( 'h_btn_link_custom' );
$h_btn_target = nimmo_get_opt( 'h_btn_target', '_self' );
if($h_btn_link_type == 'page') {
    $h_btn_url = get_permalink($h_btn_link);
} else {
    $h_btn_url = $h_btn_link_custom;
}
?>
<div id="section-home">
    <?php if (!empty($get_revslide)) {
        echo do_shortcode('[rev_slider_vc alias="'.$get_revslide.'"]');
    } ?>
</div>
<header id="masthead">
    <div id="header-wrap" class="header-layout4 fixed-height <?php if($sticky_on == 1) { echo 'is-sticky-offset'; } else { echo 'no-sticky'; } ?>">
        <div id="header-main" class="header-main">
            <div class="container">
                <div class="row">
                    <div class="header-branding">
                        <?php get_template_part( 'template-parts/header-branding' ); ?>
                    </div>
                    <div class="header-navigation">
                        <nav class="main-navigation">
                            <div class="main-navigation-inner">
                                <div class="menu-mobile-close"><i class="zmdi zmdi-close"></i></div>
                                <?php get_template_part( 'template-parts/header-menu' ); ?>
                                <?php if(!empty($h_btn_text)) : ?>
                                    <a class="btn btn-header btn-header-mobile" href="<?php echo esc_url( $h_btn_url ); ?>" target="<?php echo esc_attr($h_btn_target); ?>"><?php echo esc_attr( $h_btn_text ); ?></a>
                                <?php endif; ?>
                            </div>
                        </nav>
                        <?php if(class_exists('Woocommerce') && $cart_icon) : ?>
                            <div class="header-cart-icon h-btn-cart">
                                <i class="fa fa-shopping-basket"></i>
                                <span class="widget_cart_counter_header"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, 'nimmo' ), WC()->cart->cart_contents_count ); ?></span>
                            </div>
                        <?php endif; ?>
                        <?php if($hidden_sidebar_on) : ?>
                            <div class="hidden-sidebar-icon">
                                <span class="flaticon-menu"></span>
                            </div>
                        <?php endif; ?>
                        <?php if(!empty($h_btn_text)) : ?>
                            <a class="btn btn-header btn-header-desktop" href="<?php echo esc_url( $h_btn_url ); ?>" target="<?php echo esc_attr($h_btn_target); ?>"><?php echo esc_attr( $h_btn_text ); ?></a>
                        <?php endif; ?>
                    </div>
                    <div class="menu-mobile-overlay"></div>
                </div>
            </div>
            <div id="main-menu-mobile">
                <span class="btn-nav-mobile open-menu">
                    <span></span>
                </span>
            </div>
        </div>
    </div>
</header>