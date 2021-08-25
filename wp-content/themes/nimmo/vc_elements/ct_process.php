<?php
vc_map(array(
    'name' => 'Process',
    'base' => 'ct_process',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Process Displayed', 'nimmo' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'nimmo'),
    'params' => array(

        /* Template */
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            'shortcode' => 'ct_process',
            'heading' => esc_html__('Shortcode Template', 'nimmo'),
            'admin_label' => true,
            'std' => 'ct_process.php',
            'group' => esc_html__('Template', 'nimmo'),
        ),

        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Process Lists', 'nimmo' ),
            'param_name' => 'ct_process_list',
            'value' => '',
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_process.php',
                )
            ),
            'params' => array(
                /* Title */
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Title', 'nimmo'),
                    'param_name' => 'title',
                    'description' => 'Enter title.',
                    'admin_label' => true,
                ),

                /* Description */
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Description', 'nimmo'),
                    'param_name' => 'description',
                    'description' => 'Enter description.',
                ),

                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Button Text', 'nimmo' ),
                    'param_name' => 'button_text',
                    'value' => '',
                ),
                array(
                    'type' => 'vc_link',
                    'class' => '',
                    'heading' => esc_html__('Button Link', 'nimmo'),
                    'param_name' => 'button_link',
                    'value' => '',
                ),

                /* Icon */
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Icon Type', 'nimmo'),
                    'param_name' => 'icon_type',
                    'value' => array(
                        'Icon' => 'icon',
                        'Image' => 'image',
                    ),
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Icon Image', 'nimmo' ),
                    'param_name' => 'icon_image',
                    'value' => '',
                    'description' => esc_html__( 'Select icon image from media library.', 'nimmo' ),
                    'dependency' => array(
                        'element'=>'icon_type',
                        'value'=>array(
                            'image',
                        )
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Icon Library', 'nimmo' ),
                    'value' => array(
                        esc_html__( 'Font Awesome', 'nimmo' ) => 'fontawesome',
                        esc_html__( 'Material Design', 'nimmo' ) => 'material_design',
                        esc_html__( 'Flaticon', 'nimmo' ) => 'flaticon',
                        esc_html__( 'ET Line', 'nimmo' ) => 'etline',
                    ),
                    'param_name' => 'icon_list',
                    'description' => esc_html__( 'Select icon library.', 'nimmo' ),
                    'dependency' => array(
                        'element' => 'icon_type',
                        'value' => 'icon',
                    ),
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__( 'Icon Material', 'nimmo' ),
                    'param_name' => 'icon_material_design',
                    'settings' => array(
                        'emptyIcon' => true,
                        'type' => 'material-design',
                        'iconsPerPage' => 200,
                    ),
                    'dependency' => array(
                        'element' => 'icon_list',
                        'value' => 'material_design',
                    ),
                    'description' => esc_html__( 'Select icon from library.', 'nimmo' ),
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__( 'Icon FontAwesome', 'nimmo' ),
                    'param_name' => 'icon_fontawesome',
                    'value' => '',
                    'settings' => array(
                        'emptyIcon' => true,
                        'type' => 'fontawesome',
                        'iconsPerPage' => 200,
                    ),
                    'dependency' => array(
                        'element' => 'icon_list',
                        'value' => 'fontawesome',
                    ),
                    'description' => esc_html__( 'Select icon from library.', 'nimmo' ),
                ),  
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__( 'Flaticon', 'nimmo' ),
                    'param_name' => 'icon_flaticon',
                    'settings' => array(
                        'emptyIcon' => true,
                        'type' => 'flaticon',
                        'iconsPerPage' => 200,
                    ),
                    'dependency' => array(
                        'element' => 'icon_list',
                        'value' => 'flaticon',
                    ),
                    'description' => esc_html__( 'Select icon from library.', 'nimmo' ),
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__( 'Icon ET Line', 'nimmo' ),
                    'param_name' => 'icon_etline',
                    'settings' => array(
                        'emptyIcon' => true,
                        'type' => 'etline',
                        'iconsPerPage' => 200,
                    ),
                    'dependency' => array(
                        'element' => 'icon_list',
                        'value' => 'etline',
                    ),
                    'description' => esc_html__( 'Select icon from library.', 'nimmo' ),
                ),
                
            ),
        ),

        /* Layout 2 */
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Process Lists', 'nimmo' ),
            'param_name' => 'ct_process_list2',
            'value' => '',
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_process--layout2.php',
                )
            ),
            'params' => array(
                /* Title */
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Title', 'nimmo'),
                    'param_name' => 'title',
                    'description' => 'Enter title.',
                    'admin_label' => true,
                ),

                /* Description */
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Description', 'nimmo'),
                    'param_name' => 'description',
                    'description' => 'Enter description.',
                ),

                /* Icon */
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Icon Type', 'nimmo'),
                    'param_name' => 'icon_type',
                    'value' => array(
                        'Icon' => 'icon',
                        'Image' => 'image',
                    ),
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Icon Image', 'nimmo' ),
                    'param_name' => 'icon_image',
                    'value' => '',
                    'description' => esc_html__( 'Select icon image from media library.', 'nimmo' ),
                    'dependency' => array(
                        'element'=>'icon_type',
                        'value'=>array(
                            'image',
                        )
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Icon Library', 'nimmo' ),
                    'value' => array(
                        esc_html__( 'Font Awesome', 'nimmo' ) => 'fontawesome',
                        esc_html__( 'Material Design', 'nimmo' ) => 'material_design',
                        esc_html__( 'Flaticon', 'nimmo' ) => 'flaticon',
                        esc_html__( 'ET Line', 'nimmo' ) => 'etline',
                    ),
                    'param_name' => 'icon_list',
                    'description' => esc_html__( 'Select icon library.', 'nimmo' ),
                    'dependency' => array(
                        'element' => 'icon_type',
                        'value' => 'icon',
                    ),
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__( 'Icon Material', 'nimmo' ),
                    'param_name' => 'icon_material_design',
                    'settings' => array(
                        'emptyIcon' => true,
                        'type' => 'material-design',
                        'iconsPerPage' => 200,
                    ),
                    'dependency' => array(
                        'element' => 'icon_list',
                        'value' => 'material_design',
                    ),
                    'description' => esc_html__( 'Select icon from library.', 'nimmo' ),
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__( 'Icon FontAwesome', 'nimmo' ),
                    'param_name' => 'icon_fontawesome',
                    'value' => '',
                    'settings' => array(
                        'emptyIcon' => true,
                        'type' => 'fontawesome',
                        'iconsPerPage' => 200,
                    ),
                    'dependency' => array(
                        'element' => 'icon_list',
                        'value' => 'fontawesome',
                    ),
                    'description' => esc_html__( 'Select icon from library.', 'nimmo' ),
                ),  
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__( 'Flaticon', 'nimmo' ),
                    'param_name' => 'icon_flaticon',
                    'settings' => array(
                        'emptyIcon' => true,
                        'type' => 'flaticon',
                        'iconsPerPage' => 200,
                    ),
                    'dependency' => array(
                        'element' => 'icon_list',
                        'value' => 'flaticon',
                    ),
                    'description' => esc_html__( 'Select icon from library.', 'nimmo' ),
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__( 'Icon ET Line', 'nimmo' ),
                    'param_name' => 'icon_etline',
                    'settings' => array(
                        'emptyIcon' => true,
                        'type' => 'etline',
                        'iconsPerPage' => 200,
                    ),
                    'dependency' => array(
                        'element' => 'icon_list',
                        'value' => 'etline',
                    ),
                    'description' => esc_html__( 'Select icon from library.', 'nimmo' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Icon Gradient Color1', 'nimmo'),
                    'param_name' => 'gradient_color1',
                    'value' => '',
                    'edit_field_class' => 'vc_col-sm-6 vc_column',
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Icon Gradient Color2', 'nimmo'),
                    'param_name' => 'gradient_color2',
                    'value' => '',
                    'edit_field_class' => 'vc_col-sm-6 vc_column',
                ),
            ),
        ),

        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Title Color', 'nimmo'),
            'param_name' => 'title_color',
            'value' => '',
        ),

        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Description Color', 'nimmo'),
            'param_name' => 'description_color',
            'value' => '',
        ),

        /* Extra */
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'nimmo' ),
            'param_name' => 'el_class',
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in Custom CSS.', 'nimmo' ),
            'group'            => esc_html__('Extra', 'nimmo')
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

class WPBakeryShortCode_ct_process extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>