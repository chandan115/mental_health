<?php
$args = array(
    'name' => 'History',
    'base' => 'ct_history',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'History Displayed', 'nimmo' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'nimmo'),
    'params' => array(

        /* Layout 1 */
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Content', 'nimmo' ),
            'value' => '',
            'param_name' => 'history',
            'params' => array(
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
            ),
        ),

        array(
            'type' => 'textfield',
            'heading' =>esc_html__('See More Text', 'nimmo'),
            'param_name' => 'btn_text',
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

class WPBakeryShortCode_ct_history extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>