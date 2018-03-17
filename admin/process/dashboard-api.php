<?php


function add_dashboard_wpd() {

	    wp_add_dashboard_widget(
	                 'wpd_dashboard_widget', // Widget slug.
	                 'Download  Statistiques', // Title.
	                 'wpd_dashboard_widget_content' // Display function.
	        );
	}




function wpd_dashboard_widget_content() {
    
   
	   ?>   
                            <button id="btn1"> Show stats</button>

    <div class="row" style='margin-top:50px;' id="api_calls">
       <form >
        <div class="col-md-6" style="margin-bottom: -50px;">
                <div class="form-group">
                    <label class="mylabel">Select  your stats</label>
                    <select class="form-control" name="stats" id=stats>
                       <option value="today"> <?php  _e('Today','wpd'); ?></option>
                       <option value="yesterday"><?php   _e('Yesterday','wpd');?></option>
                       <option value="week"><?php  _e('This Week','wpd');?></option>
       
                 </select>
                </div>
                <br>
                <input type="submit" value="submit" hidden>

           
            
         
            <br>
            
        </div>
        </form>

        
        <div class="container1"></div>
    </div>

	<?php
}
