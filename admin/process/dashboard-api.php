<?php


function add_dashboard_wpd() {

	    wp_add_dashboard_widget(
	                 'wpd_dashboard_widget', // Widget slug.
	                 'Download  Statistiques', // Title.
	                 'wpd_dashboard_widget_content' // Display function.
	        );
	}




function wpd_dashboard_widget_content() {
    
    global $wpdb;
    
     $date =  '2018-02-16' ;
    
     $number_downloads = $wpdb->get_results(
         "SELECT SUM(download_num)  FROM `wp_wpd_data`  WHERE  `date` = CURRENT_DATE
ORDER BY `wp_wpd_data`.`date`  ASC "    
     );
    
    
  // var_dump($number_downloads[0]); 
    
    foreach($number_downloads[0] as $c){
        $value=  $c;
    }
    
    
	   ?>   
       
           <div class="row"style='margin-top:50px;'>
        <div class="col-md-6">
            <form method="POST" action="admin-post.php">
                <input type="hidden" name="action" value="s_save_stats">
               <?php wp_nonce_field('s_stats_verify'); ?>
                <div class="form-group">
                    <label>choose  your stats</label>
                    <select class="form-control" name="stats">
                       <option value="today"> <?php  _e('Today','wpd'); ?></option>
                       <option value="week"><?php   _e('This Week','wpd');?></option>
                       <option value="month"><?php  _e('This Month','wpd');?></option>
       
                 </select>
                </div>
                <br>
                
         <button type="submit" class="btn btn-primary">Show</button>

            </form>
            <div class="col-md-offset-1 col-md-5" style="margin-top:40px;">
                <h1 style="font-size:26px;"><?php echo $value .' '.'Downloads Today' ;?> </h1>
            </div>
            <br>
            
        </div>
    </div>

	<?php
}
