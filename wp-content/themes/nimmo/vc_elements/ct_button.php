<?php
vc_map(array(
    'name' => 'Button',
    'base' => 'ct_button',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Button Displayed', 'nimmo' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'nimmo'),
    'params' => array(
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Button Layout', 'nimmo'),
            'param_name' => 'button_layout',
            'value' => array(
                'Normal' => 'normal',
                'Custom' => 'custom',
            ),
            'group' => esc_html__('Button Settings', 'nimmo'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Sub Text', 'nimmo' ),
            'param_name' => 'button_subtext',
            'value' => '',
            'group' => esc_html__('Button Settings', 'nimmo'),
            'dependency' => array(
                'element'=>'button_layout',
                'value'=>array(
                    'custom',
                )
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Text', 'nimmo' ),
            'param_name' => 'button_text',
            'value' => '',
            'admin_label' => true,
            'group' => esc_html__('Button Settings', 'nimmo')
        ),
        array(
            'type' => 'vc_link',
            'class' => '',
            'heading' => esc_html__('Link', 'nimmo'),
            'param_name' => 'button_link',
            'value' => '',
            'group' => esc_html__('Button Settings', 'nimmo')
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Button Style', 'nimmo'),
            'param_name' => 'button_style',
            'value' => array(
                'Default' => 'btn-default',
                'Primary' => 'btn-primary',
                'Secondary' => 'btn-secondary',
                'Third' => 'btn-third',
                'Gradient One (Preset 1)' => 'btn-gradient1',
                'Gradient One (Preset 2)' => 'btn-gradient1 btn-gradient-preset1',
                'Gradient Two' => 'btn-gradient-2',
                'Gray One' => 'btn-gray1',
                'Gray Two' => 'btn-gray2',
                'Gray Three' => 'btn-gray3',
            ),
            'group' => esc_html__('Button Settings', 'nimmo'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Button Size', 'nimmo'),
            'param_name' => 'button_size',
            'value' => array(
                'Default' => 'size-default',
                'Large' => 'size-lg',
            ),
            'group' => esc_html__('Button Settings', 'nimmo'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Button Shadow', 'nimmo'),
            'param_name' => 'button_shadow',
            'value' => array(
                'No' => 'no-shadow',
                'Yes' => 'btn-shadow',
            ),
            'group' => esc_html__('Button Settings', 'nimmo'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Align Large', 'nimmo'),
            'param_name' => 'align_lg',
            'value' => array(
                'Left' => 'align-left',
                'Center' => 'align-center',
                'Right' => 'align-right',
            ),
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Button Settings', 'nimmo'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Align Medium', 'nimmo'),
            'param_name' => 'align_md',
            'value' => array(
                'Left' => 'align-left-md',
                'Center' => 'align-center-md',
                'Right' => 'align-right-md',
            ),
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Button Settings', 'nimmo'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Align Small', 'nimmo'),
            'param_name' => 'align_sm',
            'value' => array(
                'Left' => 'align-left-sm',
                'Center' => 'align-center-sm',
                'Right' => 'align-right-sm',
            ),
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Button Settings', 'nimmo'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Align Mini', 'nimmo'),
            'param_name' => 'align_xs',
            'value' => array(
                'Left' => 'align-left-xs',
                'Center' => 'align-center-xs',
                'Right' => 'align-right-xs',
            ),
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Button Settings', 'nimmo'),
        ),
        /* Padding */
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Padding Top', 'nimmo'),
            'param_name' => 'padding_top',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Button Settings', 'nimmo'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Padding Right', 'nimmo'),
            'param_name' => 'padding_right',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Button Settings', 'nimmo'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Padding Bottom', 'nimmo'),
            'param_name' => 'padding_bottom',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Button Settings', 'nimmo'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Padding Left', 'nimmo'),
            'param_name' => 'padding_left',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Button Settings', 'nimmo'),
        ),
        /* Border radius */
        /* Padding */
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Border Radius Top', 'nimmo'),
            'param_name' => 'br_top',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Button Settings', 'nimmo'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Border Radius Right', 'nimmo'),
            'param_name' => 'br_right',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Button Settings', 'nimmo'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Border Radius Bottom', 'nimmo'),
            'param_name' => 'br_bottom',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Button Settings', 'nimmo'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Border Radius Left', 'nimmo'),
            'param_name' => 'br_left',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Button Settings', 'nimmo'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Icon Library', 'nimmo' ),
            'value' => array(
                esc_html__( 'Font Awesome', 'nimmo' ) => 'fontawesome',
                esc_html__( 'Material Design', 'nimmo' ) => 'material_design',
                esc_html__( 'ET Line', 'nimmo' ) => 'etline',
                esc_html__( 'Themify', 'nimmo' ) => 'themify',
            ),
            'param_name' => 'icon_list',
            'description' => esc_html__( 'Select icon library.', 'nimmo' ),
            'group' => esc_html__('Icon', 'nimmo'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Material', 'nimmo' ),
            'param_name' => 'icon_material_design',
            'settings' => array(
                'emptyIcon' => true,
                'type' => 'material-design',
                'iconsPerPage' => 200,
            ),
            'dependency' => array(
                'element' => 'icon_list',
                'value' => 'material_design',
            ),
            'description' => esc_html__( 'Select icon from library.', 'nimmo' ),
            'group' => esc_html__('Icon', 'nimmo'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon FontAwesome', 'nimmo' ),
            'param_name' => 'icon_fontawesome',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true,
                'type' => 'fontawesome',
                'iconsPerPage' => 200,
            ),
            'dependency' => array(
                'element' => 'icon_list',
                'value' => 'fontawesome',
            ),
            'description' => esc_html__( 'Select icon from library.', 'nimmo' ),
            'group' => esc_html__('Icon', 'nimmo'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon ET Line', 'nimmo' ),
            'param_name' => 'icon_etline',
            'settings' => array(
                'emptyIcon' => true,
                'type' => 'etline',
                'iconsPerPage' => 200,
            ),
            'dependency' => array(
                'element' => 'icon_list',
                'value' => 'etline',
            ),
            'description' => esc_html__( 'Select icon from library.', 'nimmo' ),
            'group' => esc_html__('Icon', 'nimmo'),
        ),      
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Themify', 'nimmo' ),
            'param_name' => 'icon_themify',
            'settings' => array(
                'emptyIcon' => true,
                'type' => 'themify',
                'iconsPerPage' => 200,
            ),
            'dependency' => array(
                'element' => 'icon_list',
                'value' => 'themify',
            ),
            'description' => esc_html__( 'Select icon from library.', 'nimmo' ),
            'group' => esc_html__('Icon', 'nimmo'),
        ),      
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'nimmo' ),
            'param_name' => 'el_class',
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in Custom CSS.', 'nimmo' ),
            'group'            => esc_html__('Button Settings', 'nimmo')
        ),
        array(
            'type' => 'animation_style',
            'heading' => esc_html__( 'Animation Style', 'nimmo' ),
            'param_name' => 'animation',
            'description' => esc_html__( 'Choose your animation style', 'nimmo' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Button Settings', 'nimmo'),
        ),
    )
));

class WPBakeryShortCode_ct_button extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>