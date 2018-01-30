<?php 



function init_function(){
    
    if(version_compare(get_bloginfo('version'),'4.5','<')){
          
        wp_die(__('You  must update your  wordpress  version before  using  '));
        
    }
    
}