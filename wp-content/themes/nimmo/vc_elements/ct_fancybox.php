<?php
vc_map(array(
    'name' => 'Fancy Box',
    'base' => 'ct_fancybox',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Fancy Box Displayed', 'nimmo' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'nimmo'),
    'params' => array(

        /* Template */
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            'shortcode' => 'ct_fancybox',
            'heading' => esc_html__('Shortcode Template', 'nimmo'),
            'admin_label' => true,
            'std' => 'ct_fancybox.php',
            'group' => esc_html__('Template', 'nimmo'),
        ),

        /* Title */
        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Box Image', 'nimmo' ),
            'param_name' => 'box_image',
            'value' => '',
            'description' => esc_html__( 'Select image from media library.', 'nimmo' ),
            'group' => esc_html__('Title', 'nimmo'),
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_fancybox.php',
                    'ct_fancybox--layout4.php',
                    'ct_fancybox--layout7.php',
                )
            ),
        ),

        array(
            'type' => 'vc_link',
            'class' => '',
            'heading' => esc_html__('Link', 'nimmo'),
            'param_name' => 'item_link',
            'value' => '',
            'group' => esc_html__('Title', 'nimmo'),
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_fancybox.php',
                    'ct_fancybox--layout4.php',
                    'ct_fancybox--layout7.php',
                )
            ),
        ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Style', 'nimmo'),
            'param_name' => 'style',
            'value' => array(
                'Light' => 'style-light',
                'Dark' => 'style-dark',
            ),
            'group' => esc_html__('Title', 'nimmo'),
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_fancybox.php',
                )
            ),
        ),
        array(
            'type' => 'textarea',
            'heading' => esc_html__('Title', 'nimmo'),
            'param_name' => 'title',
            'description' => 'Enter title.',
            'group' => esc_html__('Title', 'nimmo'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Text Color', 'nimmo'),
            'param_name' => 'title_color',
            'value' => '',
            'group' => esc_html__('Title', 'nimmo'),
            'edit_field_class' => 'vc_col-sm-4 vc_column',
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Font Size', 'nimmo'),
            'param_name' => 'title_font_size',
            'description' => 'Enter number.',
            'group' => esc_html__('Title', 'nimmo'),
            'edit_field_class' => 'vc_col-sm-4 vc_column',
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Line Height', 'nimmo'),
            'param_name' => 'title_line_height',
            'description' => 'Enter number.',
            'group' => esc_html__('Title', 'nimmo'),
            'edit_field_class' => 'vc_col-sm-4 vc_column',
        ),

        /* Description */
        array(
            'type' => 'textarea',
            'heading' => esc_html__('Description', 'nimmo'),
            'param_name' => 'description',
            'description' => 'Enter description.',
            'group' => esc_html__('Description', 'nimmo'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Text Color', 'nimmo'),
            'param_name' => 'description_color',
            'value' => '',
            'group' => esc_html__('Description', 'nimmo'),
        ),

        /* Button */
        array(
            'type' => 'textarea',
            'heading' => esc_html__('Button Text', 'nimmo'),
            'param_name' => 'btn_text',
            'group' => esc_html__('Button', 'nimmo'),
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_fancybox--layout6.php',
                )
            ),
        ),
        array(
            'type' => 'vc_link',
            'class' => '',
            'heading' => esc_html__('Button Link', 'nimmo'),
            'param_name' => 'btn_link',
            'value' => '',
            'group' => esc_html__('Button', 'nimmo'),
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_fancybox--layout6.php',
                )
            ),
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
            'edit_field_class' => 'vc_col-sm-4 vc_column',
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Icon Background Color', 'nimmo'),
            'param_name' => 'icon_bg_color',
            'value' => '',
            'group' => esc_html__('Icon', 'nimmo'),
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_fancybox--layout3.php',
                )
            ),
            'edit_field_class' => 'vc_col-sm-4 vc_column',
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
            'edit_field_class' => 'vc_col-sm-4 vc_column',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Icon Hover Style', 'nimmo'),
            'param_name' => 'icon_hover_style',
            'value' => array(
                'Style 1' => 'style1',
                'Style 2' => 'style2',
            ),
            'group' => esc_html__('Icon', 'nimmo'),
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_fancybox--layout2.php',
                )
            ),
        ),

        /* Extra */
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Box Background Color', 'nimmo'),
            'param_name' => 'box_bg_color',
            'value' => '',
            'group' => esc_html__('Extra', 'nimmo'),
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_fancybox--layout6.php',
                )
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Item Active', 'nimmo'),
            'param_name' => 'item_active',
            'value' => array(
                'No' => 'no',
                'Yes' => 'yes',
            ),
            'group' => esc_html__('Extra', 'nimmo'),
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_fancybox--layout6.php',
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

class WPBakeryShortCode_ct_fancybox extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>