<?php


function db_insert(){

    global $wpdb;
    
// this  permit us  to insert   in the database 
$num = 1 ;
$date =  current_time( 'mysql' );   

$table_name = $wpdb->prefix . 'wpd_data';

$wpdb->insert( 
	$table_name, 
	array( 
		'download_num' => $num ,
		 'date' => current_time( 'mysql' )
	) 
);

}