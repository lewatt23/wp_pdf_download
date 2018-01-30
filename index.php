<?php
/*
*Plugin Name: wp-post-to-pdf-download
*Description:A simple wp  plugin that  permets us to download our post  as pdf's 
*Version:1.0
*Author:Mfou'ou medjo stanly
*Text Domain:Wp-post-to-pdf-download
*
*/



if(!function_exists('add_action')){
    die("Hi  there ! I'm just  a  plugin , not  much I can  do  when  called directly. ");
}




//Setup

define('DOWNLOAD_PDF_PLUGIN_URL',__FILE__);





//Includes 
include('process/s_post_download.php');
include('process/s_activate_plugin.php');
include('process/s_download.php');
include('process/enqueue.php');

//Hooks
register_activation_hook(__FILE__,'s_activate_plugin');    
    
add_action('the_content', 's_post_download');
add_action( 'wp_enqueue_scripts', 's_enqueue_scripts');

//ShortCodes