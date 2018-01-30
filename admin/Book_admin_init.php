<?php


function Book_admin_init(){
     //includes
    include('/process/create_meta.php');
    include('/process/Book_authors_options.php');
    include('/process/admin_enqueue.php');
    
        
    //Hooks
    
    add_action('add_meta_boxes_book','Book_create_metaboxes');
  	add_action( 'admin_enqueue_scripts', 'add_enqueue_admin' );
  
}