<?php
$term_list = cms_get_grid_term_list('portfolio');
vc_map(
    array(
        'name'     => esc_html__('Portfolio Grid', 'nimmo'),
        'base'     => 'ct_portfolio_grid',
        'class'    => 'ct-icon-element',
        'description' => esc_html__( 'Portfolio Displayed', 'nimmo' ),
        'category' => esc_html__('CaseThemes Shortcodes', 'nimmo'),
        'params'   => array(

            array(
                'type' => 'cms_template_img',
                'param_name' => 'cms_template',
                'shortcode' => 'ct_portfolio_grid',
                'heading' => esc_html__('Shortcode Template', 'nimmo'),
                'admin_label' => true,
                'std' => 'ct_portfolio_grid.php',
                'group' => esc_html__('Template', 'nimmo'),
            ),
            
            array(
                'type' => 'param_group',
                'heading' => esc_html__( 'Portfolio Lists', 'nimmo' ),
                'param_name' => 'ct_portfolio_list',
                'value' => '',
                'dependency' => array(
                    'element'=>'cms_template',
                    'value'=>array(
                        'ct_portfolio_grid.php',
                    )
                ),
                'params' => array(
                    /* Title */
                    array(
                        'type' => 'textarea',
                        'heading' => esc_html__('Title', 'nimmo'),
                        'param_name' => 'title',
                        'description' => 'Enter title.',
                        'admin_label' => true,
                    ),

                    /* Description */
                    array(
                        'type' => 'textarea',
                        'heading' => esc_html__('Description', 'nimmo'),
                        'param_name' => 'description',
                        'description' => 'Enter description.',
                    ),

                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__( 'Image', 'nimmo' ),
                        'param_name' => 'image',
                        'value' => '',
                        'description' => esc_html__( 'Select image from media library.', 'nimmo' ),
                    ),

                    array(
                        'type' => 'vc_link',
                        'class' => '',
                        'heading' => esc_html__('Custom Link', 'nimmo'),
                        'param_name' => 'item_link',
                        'value' => '',
                    ),

                    array(
                        'type' => 'textfield',
                        'heading' =>esc_html__('Category', 'nimmo'),
                        'param_name' => 'category',
                        'admin_label' => true,
                        'group' => esc_html__('Source Settings', 'nimmo'),
                        'description' => 'Enter category. Enter multiple categories (Example: "Category 1, Category 2, Category 3")'
                    ),
                    
                ),
            ),

            /* Layout 2 */
            array(
                'type'       => 'checkbox',
                'heading'    => esc_html__('Custom Source', 'nimmo'),
                'param_name' => 'custom_source',
                'value'      => '1',
                'description'        => 'Check here if you want custom source',
                'dependency' => array(
                    'element'=>'cms_template',
                    'value'=>array(
                        'ct_portfolio_grid--layout2.php',
                    )
                ),
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
            ),
            array(
                'type'       => 'autocomplete',
                'class'      => '',
                'heading'    => esc_html__('Select Post Name', 'nimmo'),
                'param_name' => 'post_ids',
                'description' => esc_html__('Leave blank to show all post', 'nimmo'),
                'settings'   => array(
                    'multiple' => true,
                    'values'   => cms_get_type_posts_data('portfolio')
                ),
                'dependency' => array(
                    'element'=>'custom_source',
                    'value'=>array(
                        'true',
                    )
                ),
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
                'dependency' => array(
                    'element'=>'cms_template',
                    'value'=>array(
                        'ct_portfolio_grid--layout2.php',
                    )
                ),
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
                'dependency' => array(
                    'element'=>'cms_template',
                    'value'=>array(
                        'ct_portfolio_grid--layout2.php',
                    )
                ),
            ),
            array(
                'type'       => 'textfield',
                'heading'    => esc_html__('Total items', 'nimmo'),
                'param_name' => 'limit',
                'value'      => '8',
                'description' => esc_html__('Set max limit for items in grid. Enter number only', 'nimmo'),
                'dependency' => array(
                    'element'=>'cms_template',
                    'value'=>array(
                        'ct_portfolio_grid--layout2.php',
                    )
                ),
            ),

            /* End layout 2 */

            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__('Filter', 'nimmo'),
                'param_name' => 'filter_l1',
                'value'      => array(
                    'Disable' => 'false',
                    'Enable'  => 'true',
                ),
                'group'      => esc_html__('Grid Settings', 'nimmo'),
                'dependency' => array(
                    'element'=>'cms_template',
                    'value'=>array(
                        'ct_portfolio_grid.php',
                    )
                ),
            ),

            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__('Filter Style', 'nimmo'),
                'param_name' => 'filter_style',
                'value'      => array(
                    'Style Dark' => 'style-dark',
                    'Style Light' => 'style-light',
                ),
                'group'      => esc_html__('Grid Settings', 'nimmo'),
                'dependency' => array(
                    'element' => 'filter_l1',
                    'value'   => 'true'
                ),
            ),

            array(
                'type'       => 'textfield',
                'heading'    => esc_html__('Filter Title', 'nimmo'),
                'param_name' => 'filter_default_title_l1',
                'value'      => 'All',
                'group'      => esc_html__('Grid Settings', 'nimmo'),
                'description' => esc_html__('Enter default title for filter option display, empty: All', 'nimmo'),
                'dependency' => array(
                    'element' => 'filter_l1',
                    'value'   => 'true'
                ),
            ),

            array(
                'type' => 'textfield',
                'heading' => __( 'Image size', 'nimmo' ),
                'param_name' => 'img_size',
                'value' => '',
                'description' => __( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height). Enter multiple sizes (Example: 100x100,200x200,300x300)).', 'nimmo' ),
                'group'      => esc_html__('Grid Settings', 'nimmo'),
            ),

            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__('Filter on Masonry', 'nimmo'),
                'param_name' => 'filter',
                'value'      => array(
                    'Enable'  => 'true',
                    'Disable' => 'false'
                ),
                'group'      => esc_html__('Grid Settings', 'nimmo'),
                'dependency' => array(
                    'element'=>'cms_template',
                    'value'=>array(
                        'ct_portfolio_grid--layout2.php',
                    )
                ),
            ),
            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__('Pagination Type', 'nimmo'),
                'param_name' => 'pagination_type',
                'value'      => array(
                    'Disable' => 'false',
                    'Loadmore' => 'loadmore',
                    'Pagination'  => 'pagination',
                ),
                'group'      => esc_html__('Grid Settings', 'nimmo'),
                'dependency' => array(
                    'element'=>'cms_template',
                    'value'=>array(
                        'ct_portfolio_grid--layout2.php',
                    )
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
                'type'             => 'dropdown',
                'heading'          => esc_html__('Columns XS', 'nimmo'),
                'param_name'       => 'col_xs',
                'edit_field_class' => 'ct_col_5 vc_column',
                'value'            => array(1, 2, 3, 4, 6, 12),
                'std'              => 1,
                'group'            => esc_html__('Grid Settings', 'nimmo')
            ),
            array(
                'type'             => 'dropdown',
                'heading'          => esc_html__('Columns SM', 'nimmo'),
                'param_name'       => 'col_sm',
                'edit_field_class' => 'ct_col_5 vc_column',
                'value'            => array(1, 2, 3, 4, 6, 12),
                'std'              => 1,
                'group'            => esc_html__('Grid Settings', 'nimmo')
            ),
            array(
                'type'             => 'dropdown',
                'heading'          => esc_html__('Columns MD', 'nimmo'),
                'param_name'       => 'col_md',
                'edit_field_class' => 'ct_col_5 vc_column',
                'value'            => array(1, 2, 3, 4, 6, 12),
                'std'              => 3,
                'group'            => esc_html__('Grid Settings', 'nimmo')
            ),
            array(
                'type'             => 'dropdown',
                'heading'          => esc_html__('Columns LG', 'nimmo'),
                'param_name'       => 'col_lg',
                'edit_field_class' => 'ct_col_5 vc_column',
                'value'            => array(1, 2, 3, 4, 6, 12),
                'std'              => 4,
                'group'            => esc_html__('Grid Settings', 'nimmo')
            ),
            array(
                'type'             => 'dropdown',
                'heading'          => esc_html__('Columns XL', 'nimmo'),
                'param_name'       => 'col_xl',
                'edit_field_class' => 'ct_col_5 vc_column',
                'value'            => array(1, 2, 3, 4, 6, 12),
                'std'              => 4,
                'group'            => esc_html__('Grid Settings', 'nimmo')
            ),
            array(
                'type'             => 'dropdown',
                'heading'          => esc_html__('Custom Column Item', 'nimmo'),
                'param_name'       => 'custom_column',
                'value'      => array(
                    'False'   => 'false',
                    'True' => 'true',
                ),
                'std'              => false,
                'group'            => esc_html__('Grid Settings', 'nimmo'),
                'dependency' => array(
                    'element'=>'cms_template',
                    'value'=>array(
                        'ct_portfolio_grid.php',
                    )
                ),
            ),
            array(
            'type' => 'param_group',
                'heading' => esc_html__( 'List Item', 'nimmo' ),
                'param_name' => 'cms_list_column',
                'description' => esc_html__( 'Column for each item', 'nimmo' ),
                'value' => '',
                'params' => array(
                    array(
                        'type'             => 'dropdown',
                        'heading'          => esc_html__('Columns XS', 'nimmo'),
                        'param_name'       => 'custom_col_xs',
                        'edit_field_class' => 'ct_col_5 vc_column',
                        'value'            => array(1, 2, 3, 4, 6, 12),
                        'std'              => 1,
                        'group'            => esc_html__('Grid Settings', 'nimmo'),
                        'admin_label' => true,
                    ),
                    array(
                        'type'             => 'dropdown',
                        'heading'          => esc_html__('Columns SM', 'nimmo'),
                        'param_name'       => 'custom_col_sm',
                        'edit_field_class' => 'ct_col_5 vc_column',
                        'value'            => array(1, 2, 3, 4, 6, 12),
                        'std'              => 2,
                        'group'            => esc_html__('Grid Settings', 'nimmo'),
                        'admin_label' => true,
                    ),
                    array(
                        'type'             => 'dropdown',
                        'heading'          => esc_html__('Columns MD', 'nimmo'),
                        'param_name'       => 'custom_col_md',
                        'edit_field_class' => 'ct_col_5 vc_column',
                        'value'            => array(1, 2, 3, 4, 6, 12),
                        'std'              => 3,
                        'group'            => esc_html__('Grid Settings', 'nimmo'),
                        'admin_label' => true,
                    ),
                    array(
                        'type'             => 'dropdown',
                        'heading'          => esc_html__('Columns LG', 'nimmo'),
                        'param_name'       => 'custom_col_lg',
                        'edit_field_class' => 'ct_col_5 vc_column',
                        'value'            => array(1, 2, 3, 4, 6, 12),
                        'std'              => 4,
                        'group'            => esc_html__('Grid Settings', 'nimmo'),
                        'admin_label' => true,
                    ),
                    array(
                        'type'             => 'dropdown',
                        'heading'          => esc_html__('Columns XL', 'nimmo'),
                        'param_name'       => 'custom_col_xl',
                        'edit_field_class' => 'ct_col_5 vc_column',
                        'value'            => array(1, 2, 3, 4, 6, 12),
                        'std'              => 4,
                        'group'            => esc_html__('Grid Settings', 'nimmo'),
                        'admin_label' => true,
                    ),
                ),
                'dependency' => array(
                    'element' => 'custom_column',
                    'value'   => 'true'
                ),
                'group'            => esc_html__('Grid Settings', 'nimmo'),
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

class WPBakeryShortCode_ct_portfolio_grid extends CmsShortCode
{
    protected function content($atts, $content = null)
    {
        $html_id = cmsHtmlID('ct-portfolio-grid');
        $atts['html_id'] = $html_id;
        return parent::content($atts, $content);
    }
}

?>