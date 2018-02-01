<?php

function s_enqueue_scripts(){
    
    //adding different  css styles needed by plugin 
    
    wp_register_style('s_boostrap',
    WPD_URL.'/inc/styles/boostrap.css'
    );   
wp_enqueue_style( 's_boostrap' );

    
    wp_register_style('s_main',
 WPD_URL.'/inc/styles/main.css' 
    ); 
    wp_enqueue_style( 's_main' );

}

