<?php
vc_map(array(
    'name' => 'List Icon',
    'base' => 'ct_list_icon',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'List Icon Displayed', 'nimmo' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'nimmo'),
    'params' => array(

        array(
            'type' => 'textarea',
            'heading' =>esc_html__('Content', 'nimmo'),
            'param_name' => 'content_list',
        ),

        /* Icon */
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Icon Library', 'nimmo' ),
            'value' => array(
                esc_html__( 'Font Awesome', 'nimmo' ) => 'fontawesome',
                esc_html__( 'Font Awesome 5', 'nimmo' ) => 'fontawesome5',
                esc_html__( 'Material Design', 'nimmo' ) => 'material_design',
                esc_html__( 'Flaticon', 'nimmo' ) => 'flaticon',
            ),
            'param_name' => 'icon_list',
            'description' => esc_html__( 'Select icon library.', 'nimmo' ),
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
            'heading' => esc_html__( 'Icon FontAwesome 4', 'nimmo' ),
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
            'heading' => esc_html__( 'Icon FontAwesome 5', 'nimmo' ),
            'param_name' => 'icon_fontawesome5',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true,
                'type' => 'awesome5',
                'iconsPerPage' => 200,
            ),
            'dependency' => array(
                'element' => 'icon_list',
                'value' => 'fontawesome5',
            ),
            'description' => esc_html__( 'Select icon from library.', 'nimmo' ),
            'group' => esc_html__('Icon', 'nimmo'),
        ),  
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Icon Weight', 'nimmo'),
            'param_name' => 'icon_weight',
            'value' => array(
                'Solid' => '',
                'Regular' => 'icon-far',
                'Light' => 'icon-fal',
                'Brands' => 'icon-fab',
            ),
            'group' => esc_html__('Icon', 'nimmo'),
            'dependency' => array(
                'element' => 'icon_list',
                'value' => 'fontawesome5',
            ),
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

class WPBakeryShortCode_ct_list_icon extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>