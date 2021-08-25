<?php
/**
 * Newsletter form for VC
 * Require Newsletter plugin to be installed
 */

if(class_exists('Newsletter')) {
    $forms = array_filter( (array) get_option( 'newsletter_forms', array() ) );

    $forms_list = array(
        esc_html__( 'Default Form', 'nimmo' ) => 'default'
    );

    if ( $forms )
    {
        $index = 1;
        foreach ( $forms as $key => $form )
        {
            $forms_list[ sprintf( esc_html__( 'Form %s', 'nimmo' ), $index ) ] = $key;
            $index ++;
        }
    }

    vc_map(array(
        "name" => 'Newsletter',
        "base" => "ct_newsletter",
        'class'    => 'ct-icon-element',
        'description' => esc_html__( 'Newsletter Form', 'nimmo' ),
        "category" => esc_html__('CaseThemes Shortcodes', 'nimmo'),
        "params" => array(
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Newsletter Form', 'nimmo' ),
                'description' => esc_html__( 'Pick default or custom forms from Newsletter Plugin.', 'nimmo' ),
                'value'       => $forms_list,
                'admin_label' => true,
                'param_name'  => 'form'
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Email Label', 'nimmo' ),
                'param_name' => 'email_label',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Layout', 'nimmo'),
                'param_name' => 'layout',
                'value' => array(
                    'Layout 1' => 'layout1',
                    'Layout 2' => 'layout2',
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Title', 'nimmo' ),
                'param_name' => 'fr_title',
                'dependency' => array(
                    'element'=>'layout',
                    'value'=>array(
                        'layout2',
                    )
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Sub Title', 'nimmo' ),
                'param_name' => 'fr_sub_title',
                'dependency' => array(
                    'element'=>'layout',
                    'value'=>array(
                        'layout2',
                    )
                ),
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Extra class name", 'nimmo' ),
                "param_name" => "el_class",
                "description" => esc_html__( "Style particular content element differently - add a class name and refer to it in Custom CSS.", 'nimmo' ),
                'group' => esc_html__('Extra', 'nimmo'),
            ),
            array(
                'type' => 'animation_style',
                'heading' => esc_html__( 'Animation Style', 'nimmo' ),
                'param_name' => 'animation',
                'description' => esc_html__( 'Choose your animation style', 'nimmo' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => esc_html__('Extra', 'nimmo'),
            ),
        )
    ));

    class WPBakeryShortCode_ct_newsletter extends CmsShortCode
    {

        protected function content($atts, $content = null)
        {
            return parent::content($atts, $content);
        }
    }
} ?>