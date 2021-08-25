<?php
/**
 * Template part for displaying default header layout
 */
$custom_header = nimmo_get_page_opt( 'custom_header', '0' );
$h_address = nimmo_get_opt( 'h_address', '' );
$h_address_label = nimmo_get_opt( 'h_address_label', '' );
$h_phone = nimmo_get_opt( 'h_phone', '' );
$h_phone_label = nimmo_get_opt( 'h_phone_label', '' );
$h_phone_link = nimmo_get_opt( 'h_phone_link', '' );
$h_time = nimmo_get_opt( 'h_time', '' );
$h_time_label = nimmo_get_opt( 'h_time_label', '' );
$h_email = nimmo_get_opt( 'h_email', '' );
$h_email_label = nimmo_get_opt( 'h_email_label', '' );
$h_email_link = nimmo_get_opt( 'h_email_link', '' );
$cart_icon = nimmo_get_opt( 'cart_icon', false );
$cart_page_on = nimmo_get_page_opt( 'cart_on', 'themeoption' );
if($custom_header && !empty($cart_page_on) && $cart_page_on != 'themeoption') {
    $cart_icon = $cart_page_on;
}
?>
<header id="ct-header-left">
    <div id="header-wrap">
        <div id="header-main" class="header-main">
            <div class="header-branding">
                <div class="header-branding-inner">
                    <?php get_template_part( 'template-parts/header-branding' ); ?>
                </div>
            </div>
            <div class="header-navigation">
                <nav class="main-navigation">
                    <div class="main-navigation-inner">
                        <div class="menu-mobile-close"><i class="zmdi zmdi-close"></i></div>
                        <?php get_template_part( 'template-parts/header-menu' ); ?>
                    </div>
                </nav>
                <?php if(class_exists('Woocommerce') && $cart_icon) : ?>
                    <div class="header-cart-icon color-inherit h-btn-cart">
                        <i class="fa fa-shopping-basket"></i>
                        <span class="widget_cart_counter_header"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, 'nimmo' ), WC()->cart->cart_contents_count ); ?></span>
                    </div>
                <?php endif; ?>
            </div>
            <div class="ct-header-meta">
                <?php if(!empty($h_address)) : ?>
                    <div class="ct-header-address">
                        <div class="h-item-icon">
                            <i class="far fa-globe"></i>
                        </div>
                        <div class="h-item-meta">
                            <label><?php echo esc_attr($h_address_label); ?></label>
                            <span><?php echo esc_attr($h_address); ?></span>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(!empty($h_phone)) : ?>
                    <div class="ct-header-call">
                        <div class="h-item-icon">
                            <i class="far fa-phone"></i>
                        </div>
                        <div class="h-item-meta">
                            <label><?php echo esc_attr($h_phone_label); ?></label>
                            <span><?php echo esc_attr($h_phone); ?></span>
                            <?php if(!empty($h_phone_link)) : ?>
                                <a href="tel:<?php echo esc_attr($h_phone_link); ?>" class="h-item-link"></a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(!empty($h_time)) : ?>
                    <div class="ct-header-address">
                        <div class="h-item-icon">
                            <i class="far fa-clock"></i>
                        </div>
                        <div class="h-item-meta">
                            <label><?php echo esc_attr($h_time_label); ?></label>
                            <span><?php echo esc_attr($h_time); ?></span>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(!empty($h_email)) : ?>
                    <div class="ct-header-address">
                        <div class="h-item-icon">
                            <i class="far fa-envelope"></i>
                        </div>
                        <div class="h-item-meta">
                            <label><?php echo esc_attr($h_email_label); ?></label>
                            <span><?php echo esc_attr($h_email); ?></span>
                            <?php if(!empty($h_email_link)) : ?>
                                <a href="mailto:<?php echo esc_attr($h_email_link); ?>" class="h-item-link"></a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="ct-header-social">
                <?php nimmo_header_social_icon(); ?>
            </div>
        </div>

        <div id="main-menu-mobile">
            <?php if(class_exists('Woocommerce') && $cart_icon) : ?>
                <span class="header-cart-icon h-btn-cart">
                    <i class="fa fa-shopping-basket"></i>
                    <span class="widget_cart_counter_header"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, 'nimmo' ), WC()->cart->cart_contents_count ); ?></span>
                </span>
            <?php endif; ?>
            <span class="btn-nav-mobile open-menu">
                <span></span>
            </span>
        </div>
    </div>
</header>