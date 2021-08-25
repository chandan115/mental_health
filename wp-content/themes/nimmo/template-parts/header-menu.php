<?php
/**
 * Template part for displaying the primary menu of the site
 */
$custom_header = nimmo_get_page_opt( 'custom_header', false );
$h_custom_menu = nimmo_get_page_opt('h_custom_menu');
if ( has_nav_menu( 'primary' ) )
{
    $attr_menu = array(
        'theme_location' => 'primary',
        'container'  => '',
        'menu_id'    => 'mastmenu',
        'menu_class' => 'primary-menu clearfix',
        'link_after'      => '<span class="line-menu"></span>',
        'walker'         => class_exists( 'EFramework_Mega_Menu_Walker' ) ? new EFramework_Mega_Menu_Walker : '',
    );
    if($custom_header == true && !empty($h_custom_menu)) {
        $attr_menu['menu'] = $h_custom_menu;
    }
    wp_nav_menu( $attr_menu );
}
elseif(is_user_logged_in())
{
    printf(
        '<ul class="primary-menu-not-set style-none"><li><a href="%1$s">%2$s</a></li></ul>',
        esc_url( admin_url( 'nav-menus.php' ) ),
        esc_html__( 'Create New Menu', 'nimmo' )
    );
}