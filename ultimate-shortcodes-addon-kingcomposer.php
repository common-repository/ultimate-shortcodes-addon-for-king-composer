<?php

/*
Plugin Name: Ultimate Shortcodes Addon for King Composer
Plugin URI: http://demo.themebon.com/
Description: 
Author: WPeffects
Author URI: http://demo.themebon.com/
Version: 1.0.4
*/

if ( ! defined( 'ABSPATH' ) ) exit;


if(!function_exists('is_plugin_active')){
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

if ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ){
    //loading shortcodes
    require_once ( 'shortcodes/hover_effects/hover-effects-shortcode.php' );
    require_once ( 'shortcodes/before_after/before-after-shortcode.php' );
    require_once ( 'shortcodes/accordion/accordion-shortcode.php' );
    
} 


add_action( 'admin_init', 'usa_required_plugin' );
function usa_required_plugin() {
    if ( is_admin() && current_user_can( 'activate_plugins' ) &&  !is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
        add_action( 'admin_notices', 'usa_required_plugin_notice' );

        deactivate_plugins( plugin_basename( __FILE__ ) ); 

        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
    }

}

function usa_required_plugin_notice(){
    ?><div class="error"><p>Error! you need to install or activate the <a href="https://wordpress.org/plugins/kingcomposer/">King Composer</a> plugin to run this plugin.</p></div><?php
}



?>