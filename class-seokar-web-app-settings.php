<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class Seokar_Web_App_Settings {
    
    public static function init() {
        add_action( 'admin_menu', array( __CLASS__, 'add_admin_menu' ) );
    }

    public static function add_admin_menu() {
        add_options_page(
            'PWA Settings',
            'PWA',
            'manage_options',
            'seokar-web-app',
            array( __CLASS__, 'create_admin_page' )
        );
    }

    public static function create_admin_page() {
        ?>
        <div class="wrap">
            <h1>PWA Settings</h1>
            <form method="post" action="options.php">
                <?php
                settings_fields( 'seokar_web_app_options' );
                do_settings_sections( 'seokar-web-app' );
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }
}

Seokar_Web_App_Settings::init();
?>
