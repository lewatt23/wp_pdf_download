<?php 
/*
* this wordpress  func checks if the wordpress  vesion is greater than 4.5
*
*
*/



function s_activate_plugin(){
    if(version_compare(get_bloginfo('version'),'4.5','<')){
        wp_die(__('you must  update your wordpress version'));
    }
}