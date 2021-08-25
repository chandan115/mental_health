<?php
vc_map(
	array(
		'name' => esc_html__('Progress Bar', 'nimmo'),
	    'base' => 'ct_progressbar',
	    'class'    => 'ct-icon-element',
	    'description' => esc_html__( 'Progress Bar Displayed', 'nimmo' ),
	    'category' => esc_html__('CaseThemes Shortcodes', 'nimmo'),
	    'params' => array(
	    
	        array(
	            'type' => 'param_group',
	            'heading' => esc_html__( 'Progress Bar Lists', 'nimmo' ),
	            'param_name' => 'ct_progressbar_list',
	            'value' => '',
	            'params' => array(
	                array(
			            'type' => 'textfield',
			            'heading' => esc_html__('Item Title', 'nimmo'),
			            'param_name' => 'item_title',
			            'value' => '',
			            'group' => esc_html__('Progress Bar Settings', 'nimmo'),
			            'admin_label' => true,
			        ),
					array(
						'type' => 'textfield',
						'class' => '',
						'value' => '',
						'heading' => esc_html__( 'Value', 'nimmo' ),
						'param_name' => 'value',
						'description' => 'Enter number only 1 to 100',
						'group' => esc_html__('Progress Bar Settings', 'nimmo'),
						'admin_label' => true,
					),
					array(
			            'type' => 'dropdown',
			            'heading' => esc_html__('Color', 'nimmo'),
			            'param_name' => 'progress_color',
			            'value' => array(
			                'Primary' => 'primary',
			                'Secondary' => 'secondary',
			                'Third' => 'third',
			                'Gradient' => 'gradient',
			                'Custom' => 'custom',
			            ),
			            'std' => 'primary',
			        ),
			        array(
			            'type' => 'colorpicker',
			            'heading' => esc_html__('Custom Color', 'nimmo'),
			            'param_name' => 'custom_color',
			            'value' => '',
			            'dependency' => array(
			                'element'=>'progress_color',
			                'value'=>array(
			                    'custom',
			                )
			            ),
			        ),
	            ),
	        ),
	        array(
	            'type' => 'dropdown',
	            'heading' => esc_html__('Style', 'nimmo'),
	            'param_name' => 'style',
	            'value' => array(
	                'Style 1' => 'style1',
	                'Style 2' => 'style2',
	                'Style 3 (Light)' => 'style3',
	            ),
	        ),
	        array(
	            'type' => 'textfield',
	            'heading' => esc_html__('Extra Class', 'nimmo'),
	            'param_name' => 'el_class',
	            'value' => '',
	            'group' => esc_html__('Extra', 'nimmo')
	        ),
	    )
	)
);
class WPBakeryShortCode_ct_progressbar extends CmsShortCode{
	protected function content($atts, $content = null){
		/* CSS */
	    wp_enqueue_style('progressbar', get_template_directory_uri() . '/assets/css/progressbar.min.css', array(), '0.7.1');
	    /* JS */
	    wp_enqueue_script('progressbar', get_template_directory_uri() . '/assets/js/progressbar.min.js', array( 'jquery' ), '0.7.1', true);
	    wp_enqueue_script('ct-progressbar', get_template_directory_uri() . '/assets/js/progressbar.ct.js', array( 'jquery' ), 'all', true);
	    wp_enqueue_script('waypoints');
		return parent::content($atts, $content);
	}
}

?>