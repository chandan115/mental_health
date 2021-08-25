<?php
$args = array(
    'name' => 'Team Carousel',
    'base' => 'ct_team_carousel',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Team Displayed', 'nimmo' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'nimmo'),
    'params' => array(

        /* Template */
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            'shortcode' => 'ct_team_carousel',
            'heading' => esc_html__('Shortcode Template', 'nimmo'),
            'admin_label' => true,
            'std' => 'ct_team_carousel.php',
            'group' => esc_html__('Template', 'nimmo'),
        ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Style', 'nimmo'),
            'param_name' => 'style',
            'value' => array(
                'Light' => 'style-light',
                'Dark' => 'style-dark',
            ),
            'group' => esc_html__('Template', 'nimmo'),
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_team_carousel.php',
                )
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'nimmo' ),
            'param_name' => 'el_class',
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in Custom CSS.', 'nimmo' ),
            'group'            => esc_html__('Template', 'nimmo')
        ),
        array(
            'type' => 'animation_style',
            'heading' => esc_html__( 'Animation Style', 'nimmo' ),
            'param_name' => 'animation',
            'description' => esc_html__( 'Choose your animation style', 'nimmo' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Template', 'nimmo'),
        ),
        
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Content', 'nimmo' ),
            'param_name' => 'content_list',
            'description' => esc_html__( 'Enter values for team item', 'nimmo' ),
            'value' => '',
            'group' => esc_html__('Source Settings', 'nimmo'),
            'params' => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Image', 'nimmo' ),
                    'param_name' => 'image',
                    'value' => '',
                    'description' => esc_html__( 'Select image from media library.', 'nimmo' ),
                    'group' => esc_html__('Source Settings', 'nimmo'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' =>esc_html__('Title', 'nimmo'),
                    'param_name' => 'title',
                    'admin_label' => true,
                    'group' => esc_html__('Source Settings', 'nimmo'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' =>esc_html__('Position', 'nimmo'),
                    'param_name' => 'position',
                    'admin_label' => true,
                    'group' => esc_html__('Source Settings', 'nimmo'),
                ),
                array(
                    'type' => 'param_group',
                    'heading' => esc_html__( 'Social', 'nimmo' ),
                    'param_name' => 'social',
                    'description' => esc_html__( 'Enter values for team item', 'nimmo' ),
                    'value' => '',
                    'group' => esc_html__('Source Settings', 'nimmo'),
                    'params' => array(
                        array(
                            'type' => 'iconpicker',
                            'heading' => esc_html__( 'Icon', 'nimmo' ),
                            'param_name' => 'icon',
                            'value' => '',
                            'settings' => array(
                                'emptyIcon' => true,
                                'type' => 'fontawesome',
                                'iconsPerPage' => 200,
                            ),
                            'description' => esc_html__( 'Select icon from library.', 'nimmo' ),
                            'admin_label' => true,
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' =>esc_html__('Link', 'nimmo'),
                            'param_name' => 'social_link',
                            'admin_label' => true,
                        ),
                    ),
                ),
            ),
        ),

    ));

$args = nimmo_add_vc_extra_param($args);
vc_map($args);

class WPBakeryShortCode_ct_team_carousel extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>