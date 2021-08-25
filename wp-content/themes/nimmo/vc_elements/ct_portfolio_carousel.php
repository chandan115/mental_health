<?php
$args = array(
    'name' => 'Portfolio Carousel',
    'base' => 'ct_portfolio_carousel',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Portfolio Carousel Displayed', 'nimmo' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'nimmo'),
    'params' => array(

        /* Template */
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            'shortcode' => 'ct_portfolio_carousel',
            'heading' => esc_html__('Shortcode Template', 'nimmo'),
            'admin_label' => true,
            'group' => esc_html__('Template', 'nimmo'),
            'std' => 'ct_portfolio_carousel.php'
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'nimmo' ),
            'param_name' => 'el_class',
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in Custom CSS.', 'nimmo' ),
            'group'            => esc_html__('Template', 'nimmo')
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
                    'type' => 'textfield',
                    'heading' =>esc_html__('Title', 'nimmo'),
                    'param_name' => 'title',
                    'admin_label' => true,
                    'group' => esc_html__('Source Settings', 'nimmo'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' =>esc_html__('Sub Title', 'nimmo'),
                    'param_name' => 'subtitle',
                    'group' => esc_html__('Source Settings', 'nimmo'),
                ),
                array(
                    'type' => 'vc_link',
                    'class' => '',
                    'heading' => esc_html__('Link', 'nimmo'),
                    'param_name' => 'item_link',
                    'value' => '',
                    'group' => esc_html__('Source Settings', 'nimmo')
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Image', 'nimmo' ),
                    'param_name' => 'image',
                    'value' => '',
                    'description' => esc_html__( 'Select image from media library.', 'nimmo' ),
                    'group' => esc_html__('Source Settings', 'nimmo'),
                ),
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Image size', 'nimmo' ),
            'param_name' => 'img_size',
            'value' => '',
            'description' => esc_html__( "Enter image size (Example: 'thumbnail', 'medium', 'large', 'full' or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).", 'nimmo' ),
            'group'      => esc_html__('Source Settings', 'nimmo')
        ),
    ));

$args = nimmo_add_vc_extra_param($args);
vc_map($args);

class WPBakeryShortCode_ct_portfolio_carousel extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        $html_id = cmsHtmlID('ct-carousel-portfolio');
        $atts['html_id'] = $html_id;
        return parent::content($atts, $content);
    }
}

?>