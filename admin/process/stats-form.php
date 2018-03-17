<?php

function s_save_stats(){

if(!current_user_can('edit_theme_options')){
    wp_die(__('you are not allowed  to  access this page' , 'wpd')); 
}
   
    //checking  if  the  request  came from  the  correct page
    check_admin_referer('s_stats_verify');
    
    $wpd_stats = get_option('wpd_stats');
    
    $wpd_stats['stats'] = $_POST['stats'];
   
    
    update_option('wpd_stats',$wpd_stats);
    wp_redirect(admin_url('index.php'));
 }