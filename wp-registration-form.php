<?php
/**
 * Plugin Name: WP Registration Form
 * Description: WP Registration Form for use cutom registration. 
 * Version:           1.0.0
 * Plugin URI: https://www.gaziakter.com/plugin/wp-registration-form/
 * Author Name: Gazi Akter
 * Author URI: https://www.gaziakter.com/
 * Text Domain: regi-form
 * Domain Path: /languages
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class Custom_registration_form{
    public function __construct(){
        add_action( 'init', array($this, 'registration_form_load_textdomain') );
        add_action( 'register_form', array($this, 'custom_register_form') );
        add_filter('registration_errors', array($this, 'custom_register_error'), 10, 3 );
        add_action( 'user_register', array($this, 'input_user_data') );
    }

    function registration_form_load_textdomain() {
        load_theme_textdomain( 'regi-form', plugin_dir_path( __FILE__ ) . '/languages' );
    }

    public function custom_register_form(){
        $first_name = $_POST['first_name'] ?? '';
        $last_name = $_POST['last_name'] ?? '';
        ?>
        <p>
            <label>
                <?php _e('First Name', 'regi-form'); ?>
            </label>
            <input type="text" name="first_name" id="first_name" value="<?php echo esc_attr( $first_name ); ?>">    
        </p>
        <p>
            <label>
                <?php _e('Last Name', 'regi-form'); ?>
            </label>
            <input type="text" name="last_name" id="last_name" value="<?php echo esc_attr( $last_name ); ?>">    
        </p>
        <?php
    }

    public function custom_register_error($errors, $sanitized_user_login, $user_email){
        if(empty($_POST['first_name'])){
            $errors->add('first_name_blank', __('First Name can not be blank', 'regi-form'));
        }

        if(empty($_POST['last_name'])){
            $errors->add('last_name_blank', __('last Name can not be blank', 'regi-form'));
        }

        return $errors;
    }

    public function input_user_data($user_id){
        if(!empty($_POST['first_name'])){
            update_user_meta( $user_id, 'first_name', sanitize_text_field($_POST['first_name'] ) );
        }

        if(!empty($_POST['last_name'])){
            update_user_meta( $user_id, 'last_name', sanitize_text_field($_POST['last_name'] ) );
        }
    }
}

new Custom_registration_form();