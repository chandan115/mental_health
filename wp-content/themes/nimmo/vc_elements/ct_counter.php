<?php
vc_map(array(
    'name' => 'Counter',
    'base' => 'ct_counter',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Counter Displayed', 'nimmo' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'nimmo'),
    'params' => array(

        /* Title */
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Layout', 'nimmo'),
            'param_name' => 'layout',
            'value' => array(
                'Layout 1' => 'default',
                'Layout 2' => 'layout2',
            ),
            'group' => esc_html__('Title', 'nimmo'),
        ),
        array(
            'type' => 'textarea',
            'heading' => esc_html__('Title', 'nimmo'),
            'param_name' => 'title',
            'description' => 'Enter title.',
            'group' => esc_html__('Title', 'nimmo'),
            'admin_label' => true,
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Color', 'nimmo'),
            'param_name' => 'title_color',
            'value' => '',
            'group' => esc_html__('Title', 'nimmo'),
        ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Font Weight', 'nimmo'),
            'param_name' => 'font_weight_title',
            'value' => array(
                'Default' => '',
                'Bold 700' => '700',
                'Bold 800' => '800',
                'SemiBold' => '600',
                'Medium' => '500',
                'Normal' => '400',
                'Light' => '300',
            ),
            'std' => 'none',
            'group' => esc_html__('Title', 'nimmo'),
        ),

        /* Digit */
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Digit', 'nimmo'),
            'param_name' => 'digit',
            'description' => 'Enter digit.',
            'group' => esc_html__('Digit', 'nimmo'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Prefix', 'nimmo'),
            'param_name' => 'prefix',
            'description' => 'Enter prefix.',
            'group' => esc_html__('Digit', 'nimmo'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Suffix', 'nimmo'),
            'param_name' => 'suffix',
            'description' => 'Enter suffix.',
            'group' => esc_html__('Digit', 'nimmo'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Color', 'nimmo'),
            'param_name' => 'digit_color',
            'value' => '',
            'group' => esc_html__('Digit', 'nimmo'),
        ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Use Grouping', 'nimmo'),
            'param_name' => 'grouping',
            'value' => array(
                'No' => '0',
                'Yes' => '1',
            ),
            'group' => esc_html__('Digit', 'nimmo'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Separator', 'nimmo'),
            'param_name' => 'separator',
            'group' => esc_html__('Digit', 'nimmo'),
            'dependency' => array(
                'element'=>'grouping',
                'value'=>array(
                    '1',
                )
            ),
        ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Font Weight', 'nimmo'),
            'param_name' => 'font_weight_digit',
            'value' => array(
                'Default' => '',
                'Bold 700' => '700',
                'Bold 800' => '800',
                'SemiBold' => '600',
                'Medium' => '500',
                'Normal' => '400',
                'Light' => '300',
            ),
            'std' => 'none',
            'group' => esc_html__('Digit', 'nimmo'),
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
            'group' => esc_html__('Icon', 'nimmo'),
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
            'group' => esc_html__('Icon', 'nimmo'),
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
            'group' => esc_html__('Icon', 'nimmo'),
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
            'group' => esc_html__('Icon', 'nimmo'),
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
            'group' => esc_html__('Icon', 'nimmo'),
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
            'group' => esc_html__('Icon', 'nimmo'),
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
            'group' => esc_html__('Icon', 'nimmo'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Icon Color', 'nimmo'),
            'param_name' => 'icon_color',
            'value' => '',
            'group' => esc_html__('Icon', 'nimmo'),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'icon',
            ),
            'edit_field_class' => 'vc_col-sm-6 vc_column',
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Icon Font Size', 'nimmo'),
            'param_name' => 'icon_font_size',
            'group' => esc_html__('Icon', 'nimmo'),
            'description' => 'Enter number.',
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'icon',
            ),
            'edit_field_class' => 'vc_col-sm-6 vc_column',
        ),

        /* Extra */
        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Box Image Hover', 'nimmo' ),
            'param_name' => 'box_image',
            'value' => '',
            'description' => esc_html__( 'Select image from media library.', 'nimmo' ),
            'group' => esc_html__('Extra', 'nimmo'),
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_counter--layout2.php',
                )
            ),
        ),
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

class WPBakeryShortCode_ct_counter extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>