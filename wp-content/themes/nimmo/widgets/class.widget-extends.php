<?php
/**
 * This class simply add fields to widget admin that allows you to:
 * - Add additional css class to it for further styling.
 * - Add option to hide widget title (most of default widgets does not do this)
 * - Add option to create theme-based tag cloud without affecting default one.
 *
 * @author  CaseThemes
 * @version 1.0
 * @package Nimmo
 * @since   Nimmo
 */

class Nimmo_Widget_Extends
{
    /**
     * Construction
     */
    function __construct()
    {
        global $pagenow;

        if ( is_admin() )
        {
            add_action( 'in_widget_form', array( $this, 'nimmo_extend_widget_form' ), 10, 3 );
            add_filter( 'widget_update_callback', array( $this, 'nimmo_extend_widget_update' ), 10, 4 );
        }
        add_filter( 'dynamic_sidebar_params', array( $this, 'nimmo_extend_widget_params'), 10, 2 );
    }


    /**
     * Adds form fields to the end of Widget form
     * 
     * @param   $widget     object  WP_Widget | The widget instance, passed by reference.
     * @param   $return     null    Return null if new fields are added.
     * @param   $instance   array   An array of the widget's settings.
     * @return  array               An array of the new widget's settings.
     */
    function nimmo_extend_widget_form( $widget, $return, $instance )
    {
        if ( ! isset( $instance['el_class'] ) )
        {
            $instance['el_class'] = '';
        } ?>
        <p>
            <label for="widget-<?php echo esc_attr( $widget->id_base . '-' . $widget->number ); ?>-el_class"><?php esc_html_e( 'CSS Class', 'nimmo' ); ?></label>
            <input type="text" class="widefat code" 
                name="widget-<?php echo esc_attr( $widget->id_base . '[' . $widget->number . '][el_class]' ); ?>" 
                id="widget-<?php echo esc_attr( $widget->id_base . '-' . $widget->number ); ?>-el_class" 
                value="<?php echo esc_attr( $instance['el_class'] ); ?>" />
        </p>
        <?php
        return $instance;
    }


    /**
     * Add css class param to the widget before saving
     * 
     * @param   $instance       array   The current widget instance's settings.
     * @param   $new_instance   array   Array of new widget settings.
     * @return  array                   An array of the new widget's settings.
     */
    function nimmo_extend_widget_update( $instance, $new_instance, $old_instance, $object )
    {
        $instance['el_class'] = $new_instance['el_class'];
        
        return $instance;
    }


    /**
     * Add css class to widget front-end display by filtering widget params
     * @param   $params array
     * @return  array   Extended widget parameters
     */
    function nimmo_extend_widget_params( $params )
    {
        global $wp_registered_widgets;
        
        $widget_obj = $wp_registered_widgets[$params[0]['widget_id']];
        $widget_num = $widget_obj['params'][0]['number'];
        $instances = get_option( $widget_obj['callback'][0]->option_name );
        $instance = $instances[$widget_num];

        if ( isset( $instance['el_class'] ) )
        {
            $classes = array();

            if ( isset( $instance['el_class'] ) )
            {
                $classes[] = $instance['el_class'];
            }

            $classes = array_map( 'esc_attr', $classes );
            $class_string = join( ' ', $classes );
            $class_string = trim( $class_string );

            if ( strlen( $class_string ) )
            {
                $params[0]['before_widget'] = preg_replace( '/class="/', "class=\"{$class_string} ", $params[0]['before_widget'], 1 );
            }
        }

        return $params;
    }
}

new Nimmo_Widget_Extends();