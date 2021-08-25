<?php
vc_map(array(
    'name' => 'Google Map',
    'base' => 'ct_googlemap',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Google Map Displayed', 'nimmo' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'nimmo'),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('API Key', 'nimmo'),
            'param_name' => 'api',
            'value' => '',
            'description' => esc_html__('Enter you api key of map, get key from (https://console.developers.google.com)', 'nimmo')
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Address', 'nimmo'),
            'param_name' => 'address',
            'value' => 'New York, United States',
            'description' => esc_html__('Enter address of Map', 'nimmo')
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Coordinate', 'nimmo'),
            'param_name' => 'coordinate',
            'value' => '',
            'description' => esc_html__('Enter coordinate of Map, format input (latitude, longitude)', 'nimmo')
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Click Show Info window', 'nimmo'),
            'param_name' => 'infoclick',
            'value' => array(
                esc_html__('Yes, please', 'nimmo') => true
            ),
            'description' => esc_html__('Click a marker and show info window (Default Show).', 'nimmo')
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Marker Coordinate', 'nimmo'),
            'param_name' => 'markercoordinate',
            'value' => '',
            'description' => esc_html__('Enter marker coordinate of Map, format input (latitude, longitude)', 'nimmo')
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Marker Title', 'nimmo'),
            'param_name' => 'markertitle',
            'value' => '',
            'description' => esc_html__('Enter Title Info windows for marker', 'nimmo')
        ),
        array(
            'type' => 'textarea',
            'heading' => esc_html__('Marker Description', 'nimmo'),
            'param_name' => 'markerdesc',
            'value' => '',
            'description' => esc_html__('Enter Description Info windows for marker', 'nimmo')
        ),
        array(
            'type' => 'attach_image',
            'heading' => esc_html__('Marker Icon', 'nimmo'),
            'param_name' => 'markericon',
            'value' => '',
            'description' => esc_html__('Select image icon for marker', 'nimmo')
        ),
        array(
            'type' => 'textarea_raw_html',
            'heading' => esc_html__('Marker List', 'nimmo'),
            'param_name' => 'markerlist',
            'value' => '',
            'description' => esc_html__('[{"coordinate":"41.058846,-73.539423","icon":"","title":"title demo 1","desc":"desc demo 1"},{"coordinate":"40.975699,-73.717636","icon":"","title":"title demo 2","desc":"desc demo 2"},{"coordinate":"41.082606,-73.469718","icon":"","title":"title demo 3","desc":"desc demo 3"}]', 'nimmo')
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Info Window Max Width', 'nimmo'),
            'param_name' => 'infowidth',
            'value' => '200',
            'description' => esc_html__('Set max width for info window', 'nimmo')
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Map Type', 'nimmo'),
            'param_name' => 'type',
            'value' => array(
                'ROADMAP' => 'ROADMAP',
                'HYBRID' => 'HYBRID',
                'SATELLITE' => 'SATELLITE',
                'TERRAIN' => 'TERRAIN'
            ),
            'description' => esc_html__('Select the map type.', 'nimmo')
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Style Template', 'nimmo'),
            'param_name' => 'style',
            'value' => array(
                'Default' => '',
                'Custom' => 'custom',
                'Light Monochrome' => 'light-monochrome',
                'Blue water' => 'blue-water',
                'Midnight Commander' => 'midnight-commander',
                'Paper' => 'paper',
                'Red Hues' => 'red-hues',
                'Hot Pink' => 'hot-pink'
            ),
            'description' => 'Select your heading size for title.'
        ),
        array(
            'type' => 'textarea_raw_html',
            'heading' => esc_html__('Custom Template', 'nimmo'),
            'param_name' => 'content',
            'value' => '',
            'description' => esc_html__('Get template from http://snazzymaps.com', 'nimmo')
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Zoom', 'nimmo'),
            'param_name' => 'zoom',
            'value' => '13',
            'description' => esc_html__('zoom level of map, default is 13', 'nimmo')
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Width', 'nimmo'),
            'param_name' => 'width',
            'value' => 'auto',
            'description' => esc_html__('Width of map without pixel, default is auto', 'nimmo')
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Height', 'nimmo'),
            'param_name' => 'height',
            'value' => '350px',
            'description' => esc_html__('Height of map without pixel, default is 350px', 'nimmo')
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Scroll Wheel', 'nimmo'),
            'param_name' => 'scrollwheel',
            'value' => array(
                esc_html__('Yes, please', 'nimmo') => true
            ),
            'description' => esc_html__('If false, disables scrollwheel zooming on the map. The scrollwheel is disable by default.', 'nimmo')
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Pan Control', 'nimmo'),
            'param_name' => 'pancontrol',
            'value' => array(
                esc_html__('Yes, please', 'nimmo') => true
            ),
            'description' => esc_html__('Show or hide Pan control.', 'nimmo')
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Zoom Control', 'nimmo'),
            'param_name' => 'zoomcontrol',
            'value' => array(
                esc_html__('Yes, please', 'nimmo') => true
            ),
            'description' => esc_html__('Show or hide Zoom Control.', 'nimmo')
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Scale Control', 'nimmo'),
            'param_name' => 'scalecontrol',
            'value' => array(
                esc_html__('Yes, please', 'nimmo') => true
            ),
            'description' => esc_html__('Show or hide Scale Control.', 'nimmo')
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Map Type Control', 'nimmo'),
            'param_name' => 'maptypecontrol',
            'value' => array(
                esc_html__('Yes, please', 'nimmo') => true
            ),
            'description' => esc_html__('Show or hide Map Type Control.', 'nimmo')
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Street View Control', 'nimmo'),
            'param_name' => 'streetviewcontrol',
            'value' => array(
                esc_html__('Yes, please', 'nimmo') => true
            ),
            'description' => esc_html__('Show or hide Street View Control.', 'nimmo')
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Over View Map Control', 'nimmo'),
            'param_name' => 'overviewmapcontrol',
            'value' => array(
                esc_html__('Yes, please', 'nimmo') => true
            ),
            'description' => esc_html__('Show or hide Over View Map Control.', 'nimmo')
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'nimmo' ),
            'param_name' => 'el_class',
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in Custom CSS.', 'nimmo' ),
        ),
    )
));

class WPBakeryShortCode_ct_googlemap extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>