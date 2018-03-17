<?php

function s_enqueue_scripts(){
    
    global $typenow;
    $screen = get_current_screen();
    
    if(!isset($_GET['page']) || $_GET['page'] != "s_plugin_opts" )  {
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
    
     wp_enqueue_script( 'wpd_js',
     WPD_PLUGIN_URL . 'inc/scripts/main.js', array('jquery'),true );
     wp_enqueue_script('wpd_js');
    
        
    wp_enqueue_script( 'wpd_bootstrap',
    WPD_PLUGIN_URL . 'inc/scripts/bootstrap.min', array('jquery'),true );
    wp_enqueue_script('wpd_bootstrap');

    
    
    wp_enqueue_script( 'wpd_chartjs',
    WPD_PLUGIN_URL . 'inc/scripts/Chart.bundle.min', array('jquery'),true );
    wp_enqueue_script('wpd_chartjs');

   
}

