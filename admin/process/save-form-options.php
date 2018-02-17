<?php


function s_save_options(){

if(!current_user_can('edit_theme_options')){
    wp_die(__('you are not allowed  to  access this page' , 'wpd')); 
}
   
    //checking  if  the  request  came from  the  correct page
    check_admin_referer('s_options_verify');
    
    $wpd_options = get_option('wpd_ops');
   
    $wpd_options['pdf_header_yn'] = $_POST['pdf_header_yn'];
    $wpd_options['pdf_header_text'] = $_POST['pdf_header_text'];
    $wpd_options['pdf_water_yn'] = $_POST['pdf_water_yn'];
    $wpd_options['pdf_water_text'] = $_POST['pdf_water_text'];
    $wpd_options['pdf_down_text'] = $_POST['pdf_down_text'];
    $wpd_options['pdf_post_title']  = $_POST['pdf_post_title'];
    $wpd_options['pdf_custom_title'] = $_POST['pdf_custom_title'];
    $wpd_options['checked'] = array();
    
    foreach($_POST['checked'] as $checking){
    array_push($wpd_options['checked'],$checking); 
       // var_dump($wpd_options['checked']);
       // die();
       
    }
    update_option('wpd_ops',$wpd_options);
    wp_redirect(admin_url('admin.php?page=s_plugin_opts&status=1'));
}