<?php

function admin_dashbord_scripts($hook){
    
    global $typenow;
 
    if( 'index.php' != $hook ) {
	// Only applies to dashboard panel
	return;
    }
  
    
    //adding different  css styles needed by plugin 
    
//   wp_register_style(
//		'wpd_bootstrap',
//		plugins_url( 'inc/styles/bootstrap.css',WPD_PLUGIN_URL )
//	);
//
//	wp_enqueue_style( 'wpd_bootstrap');
//    
//       
	wp_register_style(
		'wpd_main',
		plugins_url( 'inc/styles/main.css',WPD_PLUGIN_URL )
	);

	wp_enqueue_style( 'wpd_main');

    //adding scripts 
    
    
        
    wp_enqueue_script( 'wpd_bootstrap',
   plugins_url( 'inc/scripts/bootstrap.min.js',WPD_PLUGIN_URL ), array('jquery'),true );
        
    wp_enqueue_script( 'wpd_chartjs',
    plugins_url( 'inc/scripts/Chart.bundle.min.js',WPD_PLUGIN_URL ));
    
    wp_enqueue_script( 'wpd_utilsjs',
    plugins_url( 'inc/scripts/utils.js',WPD_PLUGIN_URL ) );   
    
    wp_enqueue_script( 'wpd_chartjs.js',
    plugins_url( 'inc/scripts/chart.js',WPD_PLUGIN_URL ) );

   
     wp_enqueue_script( 'wpd_mainjs',
     plugins_url( 'inc/scripts/main.js',WPD_PLUGIN_URL ), array('jquery'),true );
    // in JavaScript, object properties are accessed as ajax_object.ajax_url, ajax_object.we_value
   wp_localize_script( 'wpd_mainjs', 'ajax_object',
  array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'we_value' => 1234 ) );

}

