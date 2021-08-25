<?php
vc_map(
    array(
        'name'     => esc_html__('Team Grid', 'nimmo'),
        'base'     => 'ct_team_grid',
        'class'    => 'ct-icon-element',
        'description' => esc_html__( 'Team Displayed', 'nimmo' ),
        'category' => esc_html__('CaseThemes Shortcodes', 'nimmo'),
        'params'   => array(
            array(
                'type' => 'cms_template_img',
                'param_name' => 'cms_template',
                'shortcode' => 'ct_team_grid',
                'heading' => esc_html__('Shortcode Template', 'nimmo'),
                'admin_label' => true,
                'std' => 'ct_team_grid.php',
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
                        'type' => 'param_group',
                        'heading' => esc_html__( 'Social List', 'nimmo' ),
                        'param_name' => 'social',
                        'description' => esc_html__( 'Enter values for team social', 'nimmo' ),
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
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Image size', 'nimmo' ),
                'param_name' => 'img_size',
                'value' => '',
                'description' => esc_html__( "Enter image size (Example: 'thumbnail', 'medium', 'large', 'full' or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).", 'nimmo' ),
                'group'      => esc_html__('Source Settings', 'nimmo')
            ),
            array(
                "type"             => "dropdown",
                "heading"          => esc_html__( "Columns XS", 'nimmo' ),
                "param_name"       => "col_xs",
                "edit_field_class" => "ct-col-5",
                "value"            => array( 1, 2, 3, 4 ),
                "std"              => 1,
                "group"            => 'Column Settings',
            ),
            array(
                "type"             => "dropdown",
                "heading"          => esc_html__( "Columns SM", 'nimmo' ),
                "param_name"       => "col_sm",
                "edit_field_class" => "ct-col-5",
                "value"            => array( 1, 2, 3, 4 ),
                "std"              => 2,
                "group"            => 'Column Settings',
            ),
            array(
                "type"             => "dropdown",
                "heading"          => esc_html__( "Columns MD", 'nimmo' ),
                "param_name"       => "col_md",
                "edit_field_class" => "ct-col-5",
                "value"            => array( 1, 2, 3, 4, 5 ),
                "std"              => 3,
                "group"            => 'Column Settings',
            ),
            array(
                "type"             => "dropdown",
                "heading"          => esc_html__( "Columns LG", 'nimmo' ),
                "param_name"       => "col_lg",
                "edit_field_class" => "ct-col-5",
                "value"            => array( 1, 2, 3, 4, 5, 6 ),
                "std"              => 4,
                "group"            => 'Column Settings',
            ),
            array(
                "type"             => "dropdown",
                "heading"          => esc_html__( "Columns XL", 'nimmo' ),
                "param_name"       => "col_xl",
                "edit_field_class" => "ct-col-5",
                "value"            => array( 1, 2, 3, 4, 5, 6 ),
                "std"              => 4,
                "group"            => 'Column Settings',
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
    )
);

class WPBakeryShortCode_ct_team_grid extends CmsShortCode
{
    protected function content($atts, $content = null)
    {
        $html_id = cmsHtmlID('ct-grid-team');
        $atts['html_id'] = $html_id;
        return parent::content($atts, $content);
    }
}

?>