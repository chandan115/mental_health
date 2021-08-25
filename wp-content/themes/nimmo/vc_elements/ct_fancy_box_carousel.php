<?php
$args = array(
    'name' => 'Fancy Box Carousel',
    'base' => 'ct_fancy_box_carousel',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Fancy Box Displayed', 'nimmo' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'nimmo'),
    'params' => array(

        /* Layout 1 */
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Content', 'nimmo' ),
            'value' => '',
            'param_name' => 'fancy_box_item',
            'params' => array(
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
                    'type' => 'textfield',
                    'heading' =>esc_html__('Title', 'nimmo'),
                    'param_name' => 'title',
                    'admin_label' => true,
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Description', 'nimmo'),
                    'param_name' => 'desc',
                ),
                array(
                    'type' => 'textfield',
                    'heading' =>esc_html__('Button Text', 'nimmo'),
                    'param_name' => 'btn_text',
                    'admin_label' => true,
                ),
                array(
                    'type' => 'vc_link',
                    'class' => '',
                    'heading' => esc_html__('Button Link', 'nimmo'),
                    'param_name' => 'btn_link',
                    'value' => '',
                ),
            ),
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'nimmo' ),
            'param_name' => 'el_class',
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in Custom CSS.', 'nimmo' ),
            'group'            => esc_html__('Extra', 'nimmo')
        ),
    ));

$args = nimmo_add_vc_extra_param($args);
vc_map($args);

class WPBakeryShortCode_ct_fancy_box_carousel extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>