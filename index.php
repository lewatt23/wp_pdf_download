<?php
/*
*Plugin Name: wp_author_books
*Description:This  plugin creates a new type   of post  called  'Book_authors' , this plugin  will  permit book  authors to  be able to  publish  books in the website. 
*Version:0.1
*Author:Mfou'ou medjo stanly
*Text Domain:wp_author_books
*
*/



if(!function_exists('add_action')){
    die("Hi  there ! I'm just  a  plugin , not  much I can  do  when  called directly. ");
}




//Setup

define('BOOK_PLUGIN_URL',__FILE__);





//Includes 
include('/process/init.php');
include('/process/Book_init.php');
include('/admin/Book_admin_init.php');



//Hooks
register_activation_hook(__FILE__,'init_function');
add_action('init','Book_init');
add_action('admin_init','Book_admin_init');

//ShortCodes

