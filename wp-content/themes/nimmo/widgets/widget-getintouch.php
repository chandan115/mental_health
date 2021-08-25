<?php
class GetInTouch_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'getintouch_widget',
            esc_html__('* Get In Touch', 'nimmo'),
            array('description' => esc_html__('Get In Touch Widget', 'nimmo'),)
        );
    }

    function widget($args, $instance) {

        extract($args);

        $title = isset($instance['title']) ? (!empty($instance['title']) ? $instance['title']: '') : '';
        $address_text = isset($instance['address_text']) ? (!empty($instance['address_text']) ? $instance['address_text']: '') : '';
        $phone_text = isset($instance['phone_text']) ? (!empty($instance['phone_text']) ? $instance['phone_text']: '') : '';
        $phone_text_result = preg_replace('#[+ () ]*#', '', $phone_text);
        $email_text = isset($instance['email_text']) ? (!empty($instance['email_text']) ? $instance['email_text']: '') : '';
        ?>
        <div class="contact-info widget">
            <?php if(!empty($title)) : ?>
                <h3 class="footer-widget-title"><?php echo esc_attr($title); ?></h3>
            <?php endif; ?>
            <ul class="ct-contact-info-inner">
                <?php if(!empty($phone_text)): ?>
                    <li>
                        <i class="fa fa-phone"></i>
                        <span><?php echo wp_kses_post( $phone_text  ); ?></span>
                    </li>
                <?php endif; ?>
                <?php if(!empty($email_text)): ?>
                    <li>
                        <i class="fa fa-envelope"></i>
                        <span><?php echo wp_kses_post( $email_text  ); ?></span>
                    </li>
                <?php endif; ?>
                <?php if(!empty($address_text)): ?>
                    <li>
                        <i class="fa fa-home"></i>
                        <span><?php echo wp_kses_post( $address_text  ); ?></span>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    <?php }

    function update( $new_instance, $old_instance ) {
         $instance = $old_instance;
         $instance['title'] = strip_tags($new_instance['title']);
         $instance['address_text'] = strip_tags($new_instance['address_text']);
         $instance['phone_text'] = strip_tags($new_instance['phone_text']);
         $instance['email_text'] = strip_tags($new_instance['email_text']);

         return $instance;
    }

    function form( $instance ) {
         $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
         $address_text = isset($instance['address_text']) ? esc_attr($instance['address_text']) : '';
         $phone_text = isset($instance['phone_text']) ? esc_attr($instance['phone_text']) : '';
         $email_text = isset($instance['email_text']) ? esc_attr($instance['email_text']) : '';

         ?>
        <p><label for="<?php echo esc_url($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title', 'nimmo' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>

        <p><label for="<?php echo esc_url($this->get_field_id('address_text')); ?>"><?php esc_html_e( 'Address', 'nimmo' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('address_text') ); ?>" name="<?php echo esc_attr( $this->get_field_name('address_text') ); ?>" type="text" value="<?php echo esc_attr( $address_text ); ?>" /></p>

        <p><label for="<?php echo esc_url($this->get_field_id('phone_text')); ?>"><?php esc_html_e( 'Phone', 'nimmo' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('phone_text') ); ?>" name="<?php echo esc_attr( $this->get_field_name('phone_text') ); ?>" type="text" value="<?php echo esc_attr( $phone_text ); ?>" /></p>
        
        <p><label for="<?php echo esc_url($this->get_field_id('email_text')); ?>"><?php esc_html_e( 'Email Text', 'nimmo' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('email_text') ); ?>" name="<?php echo esc_attr( $this->get_field_name('email_text') ); ?>" type="text" value="<?php echo esc_attr( $email_text ); ?>" /></p>
    <?php
    }
}
add_action( 'widgets_init', 'nimmo_register_getintouch_widget' );
function nimmo_register_getintouch_widget(){
    if(function_exists('ct_allow_RegisterWidget')){
        ct_allow_RegisterWidget( 'GetInTouch_Widget' );
    }
}
?>