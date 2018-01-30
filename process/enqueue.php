<?php

function s_enqueue_scripts(){
    
    //adding different  css styles needed by plugin 
    
    wp_register_style('s_boostrap',
    plugins_url('/inc/styles/boostrap.css',DOWNLOAD_PDF_PLUGIN_URL) 
    );   
wp_enqueue_style( 's_boostrap' );

    
    wp_register_style('s_main',
    plugins_url('/inc/styles/main.css',DOWNLOAD_PDF_PLUGIN_URL) 
    ); 
    wp_enqueue_style( 's_main' );

}

