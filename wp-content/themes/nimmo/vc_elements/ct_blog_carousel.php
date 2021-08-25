<?php
$term_list = cms_get_grid_term_list('post');
$args = array(
    'name' => 'Blog Carousel',
    'base' => 'ct_blog_carousel',
    'class' => 'ct-icon-element',
    'description' => esc_html__( 'Post in Carousel', 'nimmo' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'nimmo'),
    'params' => array(

        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            'shortcode' => 'ct_blog_carousel',
            'heading' => esc_html__('Shortcode Template', 'nimmo'),
            'admin_label' => true,
            'std' => 'ct_blog_carousel.php',
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
                    'ct_blog_carousel.php',
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
            'type'       => 'checkbox',
            'heading'    => esc_html__('Custom Source', 'nimmo'),
            'param_name' => 'custom_source',
            'value'      => '1',
            'description'        => 'Check here if you want custom source',
            'group'      => esc_html__('Source Settings', 'nimmo')
        ),
        array(
            'type'       => 'autocomplete',
            'heading'    => esc_html__('Select Categories', 'nimmo'),
            'param_name' => 'source',
            'description' => esc_html__('Leave blank to select all category', 'nimmo'),
            'settings'   => array(
                'multiple' => true,
                'values'   => $term_list['auto_complete'],
            ),
            'dependency' => array(
                'element'=>'custom_source',
                'value'=>array(
                    'true',
                )
            ),
            'group'      => esc_html__('Source Settings', 'nimmo'),
        ),
        array(
            'type'       => 'autocomplete',
            'class'      => '',
            'heading'    => esc_html__('Select Post Name', 'nimmo'),
            'param_name' => 'post_ids',
            'description' => esc_html__('Leave blank to show all post', 'nimmo'),
            'settings'   => array(
                'multiple' => true,
                'values'   => cms_get_type_posts_data('post')
            ),
            'dependency' => array(
                'element'=>'custom_source',
                'value'=>array(
                    'true',
                )
            ),
            'group'      => esc_html__('Source Settings', 'nimmo'),
        ),
        array(
            'type'       => 'dropdown',
            'heading'    => esc_html__('Order by', 'nimmo'),
            'param_name' => 'orderby',
            'value'      => array(
                'Date'   => 'date',
                'ID'     => 'ID',
                'Author' => 'author',
                'Title'  => 'title',
                'Random' => 'rand',
            ),
            'std'        => 'date',
            'group'      => esc_html__('Source Settings', 'nimmo')
        ),
        array(
            'type'       => 'dropdown',
            'heading'    => esc_html__('Sort order', 'nimmo'),
            'param_name' => 'order',
            'value'      => array(
                'Ascending'  => 'ASC',
                'Descending' => 'DESC',
            ),
            'std'        => 'DESC',
            'group'      => esc_html__('Source Settings', 'nimmo')
        ),
        array(
            'type'       => 'textfield',
            'heading'    => esc_html__('Total items', 'nimmo'),
            'param_name' => 'limit',
            'value'      => '6',
            'group'      => esc_html__('Source Settings', 'nimmo'),
            'description' => esc_html__('Set max limit for items in carousel. Enter number only', 'nimmo'),
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Image size', 'nimmo' ),
            'param_name' => 'img_size',
            'value' => '',
            'description' => __( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).', 'nimmo' ),
            'group'      => esc_html__('Source Settings', 'nimmo'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Readmore Button Text', 'nimmo'),
            'param_name' => 'btn_text_more',
            'description' => 'Default: View now',
            'group' => esc_html__('Source Settings', 'nimmo'),
        ),
    ));

$args = nimmo_add_vc_extra_param($args);
vc_map($args);

class WPBakeryShortCode_ct_blog_carousel extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        $html_id = cmsHtmlID('ct-blog-carousel');
        $atts['html_id'] = $html_id;
        return parent::content($atts, $content);
    }
}

?>