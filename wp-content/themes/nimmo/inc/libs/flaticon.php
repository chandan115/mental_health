<?php
if (!function_exists('nimmo_font_flaticon')) :

    add_filter( 'vc_iconpicker-type-flaticon', 'nimmo_font_flaticon' );
    /**
    * awesome class.
    * 
    * @return string[]
    * @author CaseThemes
    */
    function nimmo_font_flaticon( $icons ) {
        $flaticon = array (
            array( 'flaticon-aeroplane'                   => esc_html( 'flaticon-aeroplane' ) ),
            array( 'flaticon-id-card'                   => esc_html( 'flaticon-id-card' ) ),
            array( 'flaticon-shield'                   => esc_html( 'flaticon-shield' ) ),
            array( 'flaticon-earning-money-idea'                   => esc_html( 'flaticon-earning-money-idea' ) ),
            array( 'flaticon-list'                   => esc_html( 'flaticon-list' ) ),
            array( 'flaticon-menu'                   => esc_html( 'flaticon-menu' ) ),
            array( 'flaticon-banknote'                   => esc_html( 'flaticon-banknote' ) ),
            array( 'flaticon-creative'                   => esc_html( 'flaticon-creative' ) ),
            array( 'flaticon-network'                   => esc_html( 'flaticon-network' ) ),
            array( 'flaticon-speech-bubble'                   => esc_html( 'flaticon-speech-bubble' ) ),
            array( 'flaticon-layers'                   => esc_html( 'flaticon-layers' ) ),
            array( 'flaticon-gear'                   => esc_html( 'flaticon-gear' ) ),
            array( 'flaticon-computer'                   => esc_html( 'flaticon-computer' ) ),
            array( 'flaticon-objective'                   => esc_html( 'flaticon-objective' ) ),
            array( 'flaticon-right-arrow'                   => esc_html( 'flaticon-right-arrow' ) ),
            array( 'flaticon-long-arrow-pointing-to-the-right'                   => esc_html( 'flaticon-long-arrow-pointing-to-the-right' ) ),
            array( 'flaticon-edit'                   => esc_html( 'flaticon-edit' ) ),
            array( 'flaticon-responsive'                   => esc_html( 'flaticon-responsive' ) ),
            array( 'flaticon-speed'                   => esc_html( 'flaticon-speed' ) ),
            array( 'flaticon-play-button'                   => esc_html( 'flaticon-play-button' ) ),
            array( 'flaticon-thin-arrowheads-pointing-down'                   => esc_html( 'flaticon-thin-arrowheads-pointing-down' ) ),
            array( 'flaticon-right-quotation-mark'                   => esc_html( 'flaticon-right-quotation-mark' ) ),
            array( 'flaticon-happiness'                   => esc_html( 'flaticon-happiness' ) ),
        );
        return array_merge( $icons, $flaticon );
    }
endif;