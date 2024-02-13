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
    }

    function registration_form_load_textdomain() {
        load_theme_textdomain( 'regi-form', plugin_dir_path( __FILE__ ) . '/languages' );
    }

    public function custom_register_form(){
        ?>
        <p>
            <label>
                <?php _e('First Name', 'regi-form'); ?>
            </label>
            <input type="text" name="first_name" id="first_name">    
        </p>
        <p>
            <label>
                <?php _e('Last Name', 'regi-form'); ?>
            </label>
            <input type="text" name="last_name" id="last_name">    
        </p>
        <?php
    }

}

new Custom_registration_form();