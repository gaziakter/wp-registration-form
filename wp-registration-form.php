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
    }

    function registration_form_load_textdomain() {
        load_theme_textdomain( 'regi-form', plugin_dir_path( __FILE__ ) . '/languages' );
    }
}

new Custom_registration_form();