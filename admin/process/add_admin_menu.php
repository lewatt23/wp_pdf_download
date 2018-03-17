<?php

function s_add_admin_menu(){
    
    add_menu_page(
    'wpd Options',
        'wpd Options',
        'edit_theme_options',
        's_plugin_opts',
        's_plugin_opts_page'
    ); 
    add_submenu_page(
        's_plugin_opts',
        'wpd stats',
        'wpd stats',
        'manage_options',
        'wpd_stats',
        'wpdocs_my_custom_submenu_page_callback' );

    
}
 


