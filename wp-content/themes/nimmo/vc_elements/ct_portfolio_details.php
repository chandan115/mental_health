<?php
vc_map(
    array(
        'name'     => esc_html__('Portfolio Details', 'nimmo'),
        'base'     => 'ct_portfolio_details',
        'class'    => 'ct-icon-element',
        'description' => esc_html__( 'Portfolio Details Displayed', 'nimmo' ),
        'category' => esc_html__('CaseThemes Shortcodes', 'nimmo'),
        'params'   => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Client:', 'nimmo'),
                'param_name' => 'portfolio_client',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Date:', 'nimmo'),
                'param_name' => 'portfolio_date',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Website:', 'nimmo'),
                'param_name' => 'portfolio_website',
            ),
        )
    )
);

class WPBakeryShortCode_ct_portfolio_details extends CmsShortCode
{
    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>