<?php
/*
*Plugin Name: wp_pdf_download
*Description:A simple wp  plugin that  permets us to download our post  as pdf's 
*Version:1.0
*Author:Mfou'ou medjo stanly
*Text Domain:Wp-post-to-pdf-download
*
*/


//security checks


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


if(!function_exists('add_action')){
    die("Hi  there ! I'm just  a  plugin , not  much I can  do  when  called directly. ");
}




//Setup



//table prefix
define ( 'WPD_PREFIX', 'wpd' );


//defining plugin  url path 
//we check  is our url  is https or not then we define our  plugin  path 

if( $_SERVER['REQUEST_SCHEME'] == "https" ){
	define ( 'WPD_URL',  str_replace( "http://", "https://", WP_PLUGIN_URL . '/wp_pdf_download2' ) );
} else {
	define ( 'WPD_URL', WP_PLUGIN_URL . '/wp_pdf_download2' );
}

//defining  our  plugin path

define ( 'WPD_PATH', WP_PLUGIN_DIR . '/wp_pdf_download2' );

//defining  cach dir
//Been  seeing similar pluging using a  caching  
//dir dont really  know why  they are doing it  
// but  will create  a variabel in case i am in need 

define ( 'WPD_CACH_DIR', WP_CONTENT_DIR . '/uploads/wp_pdf_download2/');



//Includes 
include('process/s_post_download.php');
include('process/s_activate_plugin.php');
include('process/s_download.php');
include('process/enqueue.php');
include('process/plugin_functions_pdfs.php');


//Hooks
register_activation_hook(__FILE__,'s_activate_plugin');    
add_action('init','pdf_plugin_functions');   
add_action( 'wp_enqueue_scripts', 's_enqueue_scripts');

//ShortCodes

