<?php

//this  hook  is to  handle the ajax  for the  chartjs side
function  Ajax_chartjs(){
global $wpdb;
    
$date =  current_time( 'Y-m-d' );  
$mydate = $date;    
$table_name = $wpdb->prefix . 'wpd_data';

//getting  the data
$number_downloads = $wpdb->get_results( "SELECT * FROM ".$table_name." WHERE DATE <= CURRENT_DATE LIMIT 7");
    
    echo  json_encode($number_downloads); ;
 
    
	wp_die();
}