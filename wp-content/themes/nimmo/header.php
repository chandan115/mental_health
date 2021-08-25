<?php
/**
 * The header for our theme.
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package Nimmo
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php echo nimmo_get_opt( 'site_header_code', '' ); ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <?php 
        	nimmo_page_loading();
            if(!is_404()) {
        	   nimmo_header_layout();
            }
            nimmo_page_title_layout();
        ?>
        <div id="content" class="site-content">
        	<div class="content-inner">
