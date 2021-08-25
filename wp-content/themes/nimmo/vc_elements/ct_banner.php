<?php
vc_map(array(
    'name' => 'Banner',
    'base' => 'ct_banner',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Banner Displayed', 'nimmo' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'nimmo'),
    'params' => array(

        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Banner', 'nimmo' ),
            'param_name' => 'banner',
            'value' => '',
            'description' => esc_html__( 'Select image from media library.', 'nimmo' ),
        ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Style', 'nimmo'),
            'param_name' => 'banner_color',
            'value' => array(
                'Primary' => 'primary',
                'Secondary' => 'secondary',
                'Third' => 'third',
                'Dark' => 'dark',
            ),
            'std' => 'primary',
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

class WPBakeryShortCode_ct_banner extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>