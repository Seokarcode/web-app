<?php
/**
 * Plugin Name: seokar web app
 * Description: به راحتی سایت ورد پرسی را پس از فعال کردن تبدیل به اپلیکیشن برای گوشی های اندروید و ای او اس میکندبرنامه های وب پیشرو (PWA) یک فناوری جدید است که بهترین وب موبایل و بهترین برنامه های تلفن همراه را برای ایجاد یک تجربه برتر وب تلفن همراه ترکیب می کند. 
 * Version: 0.1
 * Author: sajjad akbari 
 * Text Domain: seokar
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Include the settings class
require_once plugin_dir_path( __FILE__ ) . 'includes/class-seokar-web-app-settings.php';

// Initialize the plugin settings
add_action( 'init', array( 'Seokar_Web_App_Settings', 'init' ) );

// Enqueue necessary scripts and styles
function seokar_web_app_enqueue_scripts() {
    wp_enqueue_script( 'seokar-web-app-service-worker', plugin_dir_url( __FILE__ ) . 'service-worker.js', array(), '1.0', true );
    wp_enqueue_script( 'seokar-web-app-manifest', plugin_dir_url( __FILE__ ) . 'manifest.json', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'seokar_web_app_enqueue_scripts' );

// Add manifest link to the head
function seokar_web_app_add_manifest_link() {
    echo '<link rel="manifest" href="' . plugin_dir_url( __FILE__ ) . 'manifest.json">';
}
add_action( 'wp_head', 'seokar_web_app_add_manifest_link' );
