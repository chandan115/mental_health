<?php
vc_map(array(
    'name' => 'Video Player',
    'base' => 'ct_video_player',
    'class'    => 'ct-icon-element',
    'description' => 'Embed Youtube/Vimeo player',
    'category' => esc_html__('CaseThemes Shortcodes', 'nimmo'),
    'params' => array(

        array(
            'type' => 'vc_link',
            'heading' => esc_html__( 'Video Url', 'nimmo' ),
            'param_name' => 'video_link',
            'value' => 'https://www.youtube.com/watch?v=SF4aHwxHtZ0',
            'description' => 'Video url on Youtube, Vimeo'
        ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Video Button Style', 'nimmo'),
            'param_name' => 'video_button_style',
            'value' => array(
                'Style 1' => 'style1',
                'Style 2' => 'style2',
            ),
        ),

        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Intro', 'nimmo' ),
            'param_name' => 'intro',
            'value' => '',
            'description' => esc_html__( 'Select image from media library.', 'nimmo' ),
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

class WPBakeryShortCode_ct_video_player extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>