<?php
/**
 * Template part for displaying site branding
 */

$logo = nimmo_get_opt( 'logo', array( 'url' => '', 'id' => '' ) );
$logo_url = $logo['url'];

$custom_header = nimmo_get_page_opt( 'custom_header', false );
$logo_page = nimmo_get_page_opt( 'logo' );
if($custom_header && !empty($logo_page['url'])) {
    $logo_url = $logo_page['url'];
}

$logo_dark = nimmo_get_opt( 'logo_dark', array( 'url' => '', 'id' => '' ) );
$logo_dark_url = $logo_dark['url'];
$logo_page_dark = nimmo_get_page_opt( 'logo_dark' );
if($custom_header && !empty($logo_page_dark['url'])) {
    $logo_dark_url = $logo_page_dark['url'];
}

$logo_sticky = nimmo_get_opt( 'logo_sticky', array( 'url' => '', 'id' => '' ) );
$logo_sticky_url = $logo_sticky['url'];
$logo_sticky_page = nimmo_get_page_opt( 'logo_sticky' );
if($custom_header && !empty($logo_sticky_page['url'])) {
    $logo_sticky_url = $logo_sticky_page['url'];
}

$logo_mobile = nimmo_get_opt( 'logo_mobile', array( 'url' => '', 'id' => '' ) );
$logo_mobile_url = $logo_mobile['url'];
$logo_page_mobile = nimmo_get_page_opt( 'logo_mobile' );
if($custom_header && !empty($logo_page_mobile['url'])) {
    $logo_mobile_url = $logo_page_mobile['url'];
}

if ($logo_url || $logo_sticky_url || $logo_mobile_url || $logo_dark_url)
{
    printf(
        '<a class="logo-light" href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="%2$s"/></a>',
        esc_url( home_url( '/' ) ),
        esc_attr( get_bloginfo( 'name' ) ),
        esc_url( $logo_url )
    );
    printf(
        '<a class="logo-dark" href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="%2$s"/></a>',
        esc_url( home_url( '/' ) ),
        esc_attr( get_bloginfo( 'name' ) ),
        esc_url( $logo_dark_url )
    );
    printf(
        '<a class="logo-sticky" href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="%2$s"/></a>',
        esc_url( home_url( '/' ) ),
        esc_attr( get_bloginfo( 'name' ) ),
        esc_url( $logo_sticky_url )
    );
    printf(
        '<a class="logo-mobile" href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="%2$s"/></a>',
        esc_url( home_url( '/' ) ),
        esc_attr( get_bloginfo( 'name' ) ),
        esc_url( $logo_mobile_url )
    );
}
else
{
    printf(
        '<a class="logo-light" href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="'.esc_attr__('Logo', 'nimmo').'"/></a>',
        esc_url( home_url( '/' ) ),
        esc_attr( get_bloginfo( 'name' ) ),
        esc_url( get_template_directory_uri().'/assets/images/logo-sticky.png' )
    );
}