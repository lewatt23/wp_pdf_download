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
    
    //global $wpdb;
    
    
   flush_rewrite_rules();
    
    //creating  plugin  database

   global $wpdb;

	$createSQL              =   "
	CREATE TABLE `" . $wpdb->prefix . "wpd_data` (
		`ID` INT(200) NOT NULL AUTO_INCREMENT,
		`download_num` INT(200)  NOT NULL,
		`date` DATE  NOT NULL,
		 PRIMARY KEY (`ID`)
	) ENGINE=InnoDB " . $wpdb->get_charset_collate() . " AUTO_INCREMENT=1;";

	require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
	dbDelta( $createSQL );

  
    //initailising plugin dashboard data
    
    $wpd_options = get_option('wpd_ops');
    
    if(!$wpd_options){
        $options =[
            
    'pdf_header_yn' =>'yes',
    'pdf_header_text' =>'',
    'pdf_water_yn' =>'no',
    'pdf_water_text'=>'',
    'pdf_down_text' =>'download  this post',
    'pdf_post_title' =>'yes',
    'checked' =>0,  
    'pdf_custom_title' =>''
            
            
        ];
        
        add_option('wpd_ops',$options);
    }
    
    $wpd_stats = get_option('wpd_stats');
    
    if(!$wpd_stats){
        $stats = [
                'stats'  => 'today'       

        ];
        add_option('wpd_stats',$stats);
    }
    
}