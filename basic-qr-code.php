<?php

/*
 * Plugin Name:       Basic QR Code
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Mustafizur Munna
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       bqc
 * Domain Path:       /languages
 * Requires Plugins:  
 */





 class Bqc_basic_qr_code{
    public function __construct(){
        add_action('init', array($this, 'bqc_initialize'));
    }
    public function bqc_initialize(){
        add_filter('the_content', array($this, 'bqc_display_qr_code'));
    }
    public function bqc_display_qr_code($post_content){
        $current_post_url = get_permalink();
        $qr_code_image = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=".$current_post_url;
        return $post_content."<p><img src='$qr_code_image'></p>";
    }
 }


 new Bqc_basic_qr_code();