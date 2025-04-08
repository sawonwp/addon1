<?php

/**
 * Plugin Name: Elementor addon plugin
 * Description: Add widget to increase functionality.
 * Plugin URI:  https://elementor.com/
 * Version:     1.0.0
 * Author:      Elementor Developer
 * Author URI:  https://developers.elementor.com/
 * Text Domain: elem_addon
 *
 * Requires Plugins: elementor
 * Elementor tested up to: 3.25.0
 * Elementor Pro tested up to: 3.25.0
 */



 if (!defined('ABSPATH') ){
    exit;
 }

 function register_elem_addon($widgets_register){
    require_once(__DIR__ . '/widgets/addon-widget1.php');
    require_once(__DIR__ .'/widgets/duel-button-widget.php');
    require_once(__DIR__.'/widgets/read-more.php');
    require_once(__DIR__. '/widgets/in-scroll.php');

    //register class
    $widgets_register->register(new \elem_addon_widget());
    $widgets_register->register(new \elem_duel_btn_widget());
    $widgets_register->register(new \elem_read_more());
    $widgets_register->register(new \elem_in_scroll());
 }

 add_action('elementor/widgets/register','register_elem_addon');

//  css & js enqueue
function elem_addon_reg_dep(){
   wp_enqueue_style('duel-btn-css', plugins_url('assets/css/duel-btn.css', __FILE__), '1.0.0');
   wp_enqueue_style('read-more-css', plugins_url('assets/css/read-more.css', __FILE__), '1.0.0');
   wp_enqueue_script('read-more-js', plugins_url('assets/js/read-more.js', __FILE__), '1.0.0');

   wp_enqueue_script('jquery');
   wp_enqueue_style('in-scroll-css', plugins_url('assets/css/in-scroll.css', __FILE__), '1.0.0');
   wp_enqueue_script('in-scroll-js', plugins_url('assets/js/in-scroll.js', __FILE__), '1.0.0', ['jquery']);

}

add_action('wp_enqueue_scripts', 'elem_addon_reg_dep');