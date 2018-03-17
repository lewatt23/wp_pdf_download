<?php


function pdf_plugin_functions(){
  //adding Hook 
  add_action('the_content', 's_post_download');
  add_action('admin_post_s_save_options','s_save_options');
  add_action('admin_post_s_save_stats','s_save_stats');    
    
}

