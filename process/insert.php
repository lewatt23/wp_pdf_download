<?php


function db_insert(){

global $wpdb;
$num = 1 ;
$date =  current_time( 'Y-m-d' );  
$mydate = $date;    
$table_name = $wpdb->prefix . 'wpd_data';

    
// this  permit us  to insert   in the database 
    
//the process is easy  frist  we getall the value date vale
    
$get = $wpdb->get_results( "SELECT * FROM ".$table_name." WHERE DATE = CURRENT_DATE LIMIT 1");

  
//checking  for the value  of the date before updating the query
    
print_r($get);  
    die();
    

if($get[0]->date == $mydate ){

$update_value = $get[0]->download_num +1 ;
    
    
$wpdb->update( 
	$table_name, 
	array( 
		'download_num' => $update_value 
    ), 
	array( 'date' => $date )
);
    
 //else  we just  insert  a new value  in a new table   
}else{
    $wpdb->insert( 
	$table_name, 
	array( 
		'download_num' => $num ,
		 'date' => current_time( 'mysql' )
	) 
);    
    
}    
    
    


}