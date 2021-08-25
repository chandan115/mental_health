<?php
    if(class_exists('WPCF7')) {
        $cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );

        $contact_forms = array();
        if ( $cf7 ) {
            foreach ( $cf7 as $cform ) {
                $contact_forms[ $cform->post_title ] = $cform->ID;
            }
        } else {
            $contact_forms[ esc_html__( 'No contact forms found', 'nimmo' ) ] = 0;
        }

        vc_map(array(
            'name' => 'Contact Form',
            'base' => 'ct_contact_form',
            'class'    => 'ct-icon-element',
            'description' => esc_html__( 'Contact Form 7', 'nimmo' ),
            'category' => esc_html__('CaseThemes Shortcodes', 'nimmo'),
            'params' => array(

                array(
                    'type' => 'dropdown',
                    'heading' => __( 'Select Contact Form', 'nimmo' ),
                    'param_name' => 'id',
                    'value' => $contact_forms,
                    'save_always' => true,
                    'admin_label' => true,
                    'description' => __( 'Choose previously created contact form from the drop down list.', 'nimmo' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Form Style', 'nimmo'),
                    'param_name' => 'style',
                    'value' => array(
                        'Default' => 'style-default',
                        'Outline' => 'style-light',
                        'Dark One' => 'style-dark',
                        'Dark Two' => 'style-dark-2',
                        'Startup' => 'style-startup',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Button Style', 'nimmo'),
                    'param_name' => 'btn_style',
                    'value' => array(
                        'Default' => 'submit-default',
                        'Gray' => 'submit-gray',
                    ),
                ),
                /* Extra */
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Extra class name', 'nimmo' ),
                    'param_name' => 'el_class',
                    'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in Custom CSS.', 'nimmo' ),
                    'group'      => esc_html__('Extra', 'nimmo'),
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

        class WPBakeryShortCode_ct_contact_form extends CmsShortCode
        {

            protected function content($atts, $content = null)
            {
                return parent::content($atts, $content);
            }
        }
    }
?>