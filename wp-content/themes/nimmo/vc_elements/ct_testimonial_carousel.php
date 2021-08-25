<?php
$args = array(
    'name' => 'Testimonial Carousel',
    'base' => 'ct_testimonial_carousel',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Testimonial Displayed', 'nimmo' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'nimmo'),
    'params' => array(

        /* Template */
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            'shortcode' => 'ct_testimonial_carousel',
            'heading' => esc_html__('Shortcode Template', 'nimmo'),
            'admin_label' => true,
            'std' => 'ct_testimonial_carousel.php',
            'group' => esc_html__('Template', 'nimmo'),
        ),
        
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'nimmo' ),
            'param_name' => 'el_class',
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in Custom CSS.', 'nimmo' ),
            'group'            => esc_html__('Template', 'nimmo')
        ),

        /* Layout 1 */
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Testimonial Item', 'nimmo' ),
            'value' => '',
            'param_name' => 'testimonial_item',
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_testimonial_carousel.php',
                    'ct_testimonial_carousel--layout3.php',
                )
            ),
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' =>esc_html__('Title', 'nimmo'),
                    'param_name' => 'title',
                    'admin_label' => true,
                ),
                array(
                    'type' => 'textfield',
                    'heading' =>esc_html__('Position', 'nimmo'),
                    'param_name' => 'position',

                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Content', 'nimmo'),
                    'param_name' => 'content',
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Image', 'nimmo' ),
                    'param_name' => 'image',
                    'value' => '',
                    'description' => esc_html__( 'Select image from media library.', 'nimmo' ),
                ),
            ),
        ),

        /* Layout 2 */
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Testimonial Item', 'nimmo' ),
            'value' => '',
            'param_name' => 'testimonial_item_l2',
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_testimonial_carousel--layout2.php',
                )
            ),
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' =>esc_html__('Title', 'nimmo'),
                    'param_name' => 'title',
                    'admin_label' => true,
                ),
                array(
                    'type' => 'textfield',
                    'heading' =>esc_html__('Position', 'nimmo'),
                    'param_name' => 'position',

                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Content', 'nimmo'),
                    'param_name' => 'content',
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Image', 'nimmo' ),
                    'param_name' => 'image',
                    'value' => '',
                    'description' => esc_html__( 'Select image from media library.', 'nimmo' ),
                ),
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
                ),
                array(
                    'type' => 'vc_link',
                    'class' => '',
                    'heading' => esc_html__('Link', 'nimmo'),
                    'param_name' => 'link',
                    'value' => '',
                ),
            ),
        ),
        /* Layout 4 */
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Testimonial Item', 'nimmo' ),
            'value' => '',
            'param_name' => 'testimonial_item_l4',
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_testimonial_carousel--layout4.php',
                )
            ),
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' =>esc_html__('Title', 'nimmo'),
                    'param_name' => 'title',
                    'admin_label' => true,
                ),
                array(
                    'type' => 'textfield',
                    'heading' =>esc_html__('Position', 'nimmo'),
                    'param_name' => 'position',

                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Content', 'nimmo'),
                    'param_name' => 'content',
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Image', 'nimmo' ),
                    'param_name' => 'image',
                    'value' => '',
                    'description' => esc_html__( 'Select image from media library.', 'nimmo' ),
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
            'heading' => esc_html__('Content Color', 'nimmo'),
            'param_name' => 'content_color',
            'value' => '',
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Position Color', 'nimmo'),
            'param_name' => 'position_color',
            'value' => '',
        ),
    ));

$args = nimmo_add_vc_extra_param($args);
vc_map($args);

class WPBakeryShortCode_ct_testimonial_carousel extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>