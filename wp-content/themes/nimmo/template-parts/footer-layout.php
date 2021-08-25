<?php
$footer_top_width_custom = nimmo_get_opt('footer_top_width_custom', 'custom');
$footer_copyright = nimmo_get_opt('footer_copyright');
$social_label = nimmo_get_opt('social_label');
$back_totop_on = nimmo_get_opt('back_totop_on', true);
?>
<footer id="colophon" class="site-footer footer-layout1">
    <?php if ( is_active_sidebar( 'sidebar-footer-1' ) || is_active_sidebar( 'sidebar-footer-2' ) || is_active_sidebar( 'sidebar-footer-3' ) || is_active_sidebar( 'sidebar-footer-4' ) ) : ?>
        <div class="top-footer top-width-<?php echo esc_attr($footer_top_width_custom); ?>">
            <div class="container">
                <div class="row">
                    <?php nimmo_footer_top(); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="bottom-footer">
        <div class="container">
            <div class="row">
                <div class="bottom-copyright">
                    <?php if ($footer_copyright) {
                        echo apply_filters('the_content', $footer_copyright);
                    } else {
                        echo wp_kses_post(''.esc_attr(date("Y")).' &copy; All rights reserved by <a target="_blank" href="https://themeforest.net/user/case-themes/portfolio">CaseThemes</a>');
                    } ?>
                </div>
                <?php if ( has_nav_menu( 'bottom-footer' ) ) : ?>
                    <div class="bottom-menu">
                        <?php 
                            $attr_menu = array(
                                'theme_location' => 'bottom-footer',
                                'container'  => '',
                                'menu_id'    => '',
                                'menu_class' => 'bottom-footer-menu',
                                'depth'      => 1,
                            );
                            wp_nav_menu( $attr_menu );
                        ?>
                    </div>
                <?php endif; ?>
                <div class="bottom-social">
                    <?php if(!empty($social_label)) : ?>
                        <label><?php echo esc_attr($social_label); ?></label>
                    <?php endif; ?>
                    <?php nimmo_footer_social_icon(); ?>
                </div>
            </div>
        </div>
    </div>
</footer>