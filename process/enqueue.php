<?php

function s_enqueue_scripts(){
    
    global $typenow;
    
    if(!isset($_GET['page']) || $_GET['page'] != "s_plugin_opts" ){
        return ;
    }
    
    //adding different  css styles needed by plugin 
    
   wp_register_style(
		'wpd_bootstrap',
		plugins_url( 'inc/styles/bootstrap.css',WPD_PLUGIN_URL )
	);

	wp_enqueue_style( 'wpd_bootstrap');
    
       
	wp_register_style(
		'wpd_main',
		plugins_url( 'inc/styles/main.css',WPD_PLUGIN_URL )
	);

	wp_enqueue_style( 'wpd_main');

    //adding scripts 
    
   
}

