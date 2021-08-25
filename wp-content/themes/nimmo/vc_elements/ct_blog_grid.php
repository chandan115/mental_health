<?php
$term_list = cms_get_grid_term_list('post');
vc_map(
    array(
        'name'     => esc_html__('Blog Grid', 'nimmo'),
        'base'     => 'ct_blog_grid',
        'class'    => 'ct-icon-element',
        'description' => esc_html__( 'Posts in masonry grid', 'nimmo' ),
        'category' => esc_html__('CaseThemes Shortcodes', 'nimmo'),
        'params'   => array(

            array(
                'type' => 'cms_template_img',
                'param_name' => 'cms_template',
                'shortcode' => 'ct_blog_grid',
                'heading' => esc_html__('Shortcode Template', 'nimmo'),
                'admin_label' => true,
                'std' => 'ct_blog_grid.php',
                'group' => esc_html__('Template', 'nimmo'),
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
                'description' => esc_html__('Set max limit for items in grid. Enter number only', 'nimmo'),
                'dependency' => array(
                    'element'=>'cms_template',
                    'value'=>array(
                        'ct_blog_grid.php',
                    )
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => __( 'Image size', 'nimmo' ),
                'param_name' => 'img_size',
                'value' => '',
                'description' => __( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).', 'nimmo' ),
                'group'      => esc_html__('Grid Settings', 'nimmo'),
                'dependency' => array(
                    'element'=>'cms_template',
                    'value'=>array(
                        'ct_blog_grid.php',
                    )
                ),
            ),
            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__('Layout Type', 'nimmo'),
                'param_name' => 'layout',
                'value'      => array(
                    'Basic'   => 'basic',
                    'Masonry' => 'masonry',
                ),
                'group'      => esc_html__('Grid Settings', 'nimmo'),
                'dependency' => array(
                    'element'=>'cms_template',
                    'value'=>array(
                        'ct_blog_grid.php',
                    )
                ),
            ),
            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__('Filter on Masonry', 'nimmo'),
                'param_name' => 'filter',
                'value'      => array(
                    'Enable'  => 'true',
                    'Disable' => 'false'
                ),
                'dependency' => array(
                    'element' => 'layout',
                    'value'   => 'masonry'
                ),
                'group'      => esc_html__('Grid Settings', 'nimmo'),
            ),
            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__('Pagination Type', 'nimmo'),
                'param_name' => 'pagination_type',
                'value'      => array(
                    'Pagination'  => 'pagination',
                    'Loadmore' => 'loadmore',
                    'Disable' => 'false',
                ),
                'dependency' => array(
                    'element' => 'layout',
                    'value'   => 'masonry'
                ),
                'group'      => esc_html__('Grid Settings', 'nimmo')
            ),
            array(
                'type'       => 'textfield',
                'heading'    => esc_html__('Load More Text', 'nimmo'),
                'param_name' => 'load_more_text',
                'value'      => '',
                'group'      => esc_html__('Grid Settings', 'nimmo'),
                'dependency' => array(
                    'element' => 'pagination_type',
                    'value'   => 'loadmore'
                ),
            ),
            array(
                'type'       => 'textfield',
                'heading'    => esc_html__('Default Title', 'nimmo'),
                'param_name' => 'filter_default_title',
                'value'      => 'All',
                'group'      => esc_html__('Filter', 'nimmo'),
                'description' => esc_html__('Enter default title for filter option display, empty: All', 'nimmo'),
                'dependency' => array(
                    'element' => 'filter',
                    'value'   => 'true'
                ),
            ),
            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__('Alignment', 'nimmo'),
                'param_name' => 'filter_alignment',
                'value'      => array(
                    'Center'   => 'center',
                    'Left'   => 'left',
                    'Right'   => 'right',
                ),
                'description' => esc_html__('Select filter alignment.', 'nimmo'),
                'group'      => esc_html__('Filter', 'nimmo'),
                'dependency' => array(
                    'element' => 'filter',
                    'value'   => 'true'
                ),
            ),

            array(
                'type'       => 'textfield',
                'heading'    => esc_html__('Item Gap', 'nimmo'),
                'param_name' => 'gap',
                'value'      => '30',
                'group'      => esc_html__('Grid Settings', 'nimmo'),
                'description' => esc_html__('Select gap between grid elements. Enter number only', 'nimmo'),
                'dependency' => array(
                    'element'=>'cms_template',
                    'value'=>array(
                        'ct_blog_grid.php',
                    )
                ),
            ),
            array(
                'type'             => 'dropdown',
                'heading'          => esc_html__('Columns XS Devices', 'nimmo'),
                'param_name'       => 'col_xs',
                'edit_field_class' => 'vc_col-sm-3 vc_column',
                'value'            => array(1, 2, 3, 4, 6, 12),
                'std'              => 1,
                'group'            => esc_html__('Grid Settings', 'nimmo'),
                'dependency' => array(
                    'element'=>'cms_template',
                    'value'=>array(
                        'ct_blog_grid.php',
                    )
                ),
            ),
            array(
                'type'             => 'dropdown',
                'heading'          => esc_html__('Columns SM Devices', 'nimmo'),
                'param_name'       => 'col_sm',
                'edit_field_class' => 'vc_col-sm-3 vc_column',
                'value'            => array(1, 2, 3, 4, 6, 12),
                'std'              => 2,
                'group'            => esc_html__('Grid Settings', 'nimmo'),
                'dependency' => array(
                    'element'=>'cms_template',
                    'value'=>array(
                        'ct_blog_grid.php',
                    )
                ),
            ),
            array(
                'type'             => 'dropdown',
                'heading'          => esc_html__('Columns MD Devices', 'nimmo'),
                'param_name'       => 'col_md',
                'edit_field_class' => 'vc_col-sm-3 vc_column',
                'value'            => array(1, 2, 3, 4, 6, 12),
                'std'              => 3,
                'group'            => esc_html__('Grid Settings', 'nimmo'),
                'dependency' => array(
                    'element'=>'cms_template',
                    'value'=>array(
                        'ct_blog_grid.php',
                    )
                ),
            ),
            array(
                'type'             => 'dropdown',
                'heading'          => esc_html__('Columns LG Devices', 'nimmo'),
                'param_name'       => 'col_lg',
                'edit_field_class' => 'vc_col-sm-3 vc_column',
                'value'            => array(1, 2, 3, 4, 6, 12),
                'std'              => 4,
                'group'            => esc_html__('Grid Settings', 'nimmo'),
                'dependency' => array(
                    'element'=>'cms_template',
                    'value'=>array(
                        'ct_blog_grid.php',
                    )
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Extra class name', 'nimmo' ),
                'param_name' => 'el_class',
                'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in Custom CSS.', 'nimmo' ),
                'group'            => esc_html__('Grid Settings', 'nimmo')
            ),
        )
    )
);

class WPBakeryShortCode_ct_blog_grid extends CmsShortCode
{
    protected function content($atts, $content = null)
    {
        $html_id = cmsHtmlID('ct-blog-grid');
        $atts['html_id'] = $html_id;
        return parent::content($atts, $content);
    }
}

?>