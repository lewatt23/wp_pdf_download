<?php


function add_enqueue_admin(){
    
    global $typenow;

	if( $typenow != "book" ){
		return;
	}

    
    
	wp_register_style(
		'book_bootstrap',
		plugins_url( '/../inc/styles/bootstrap.css', BOOK_PLUGIN_URL )
	);

	wp_enqueue_style( 'book_bootstrap' );
    
    wp_register_script(
		'book_bootstrapjs',
		plugins_url( '/../inc/js/bootstrap.min.js', BOOK_PLUGIN_URL )
	);

	wp_enqueue_script( 'book_bootstrapjs' );
}
    
