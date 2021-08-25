<?php
/**
 * Template part for displaying default header layout
 */
$sticky_on = nimmo_get_opt( 'sticky_on', false );
?>
<header id="masthead">
    <div id="header-wrap" class="header-layout2 fixed-height <?php if($sticky_on == 1) { echo 'is-sticky'; } else { echo 'no-sticky'; } ?>">
        <div id="header-main" class="header-main">
            <div class="container">
                <div class="row">
                    <div class="header-branding mobile">
                        <?php get_template_part( 'template-parts/header-branding' ); ?>
                    </div>
                    <div class="header-navigation">
                        <div class="main-navigation">
                            <div class="main-navigation-inner">
                                <div class="menu-mobile-close"><i class="zmdi zmdi-close"></i></div>
                                <?php if ( has_nav_menu( 'primary_left' ) ) { ?>
                                    <div class="header-menu-left">
                                        <?php $attr_menu = array(
                                            'theme_location' => 'primary_left',
                                            'container'  => '',
                                            'menu_id'    => 'menu-left',
                                            'menu_class' => 'primary-menu',
                                            'walker'         => class_exists( 'EFramework_Mega_Menu_Walker' ) ? new EFramework_Mega_Menu_Walker : '',
                                        );
                                        wp_nav_menu( $attr_menu ); ?>
                                    </div>
                                <?php } ?>
                                <div class="header-branding desktop">
                                    <?php get_template_part( 'template-parts/header-branding' ); ?>
                                </div>
                                <?php if ( has_nav_menu( 'primary_right' ) ) { ?>
                                    <div class="header-menu-right">
                                        <?php $attr_menu = array(
                                            'theme_location' => 'primary_right',
                                            'container'  => '',
                                            'menu_id'    => 'menu-right',
                                            'menu_class' => 'primary-menu',
                                            'walker'         => class_exists( 'EFramework_Mega_Menu_Walker' ) ? new EFramework_Mega_Menu_Walker : '',
                                        );
                                        wp_nav_menu( $attr_menu ); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
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