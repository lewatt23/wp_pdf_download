<?php


function s_plugin_opts_page(){
  
    ?>
    <!--header  title-->
    <?php         $wpd_options = get_option('wpd_ops');
    ?>
    
    <div class="row" >
        <div class="col-md-8" style="margin:30px 0px;">
            <h3>
                <?php _e('Editing PDF','wpd'); ?>
                
    <br>
          <?php
    if(isset($_GET['status']) && isset($_GET['status'] )== 1) {
     
        ?>
        <br>
        <br>
      
      
        <div class='alert alert-info'> Setting saved !!</div> <?php
        
    }
    
    
    ?>
            </h3>
        </div>
    </div>



    <!--editing pdf-->
    <div class="row">
        <div class="col-md-8">
            <form  method="POST" action="admin-post.php" >
               <input type="hidden" name="action" value="s_save_options">
               <?php wp_nonce_field('s_options_verify'); ?>
                <div class="form-group">
                    <label><?php  _e('Adding header and footer text','wpd'); ?></label>
                    <select class="form-control" name="pdf_header_yn">
        <option value="NO ">NO</option>
        <option <?php if(!empty($wpd_options['pdf_header_yn'])) echo  $wpd_options['pdf_header_yn'] == 'YES'?'SELECTED':''; ?> 
        
        value="YES">YES</option>
       
    </select>
                </div>
                
                
                <div class="form-group">
                <label><?php _e('select which  page the  download  button should be displayed','wpd') ?></label>
                   <ul>
                    <li>
<?php
                 
   $args = array(
         'taxonomy'     => 'category',
         'orderby'      => 'name',
         'show_count'   => false,
         'pad_counts'   => false,
         'hierarchical' => true,
         'title_li'     => ''
  );
                        
            
    $sub_cats = get_categories( $args );
            if($sub_cats) {
                     

                foreach($sub_cats as $sub_category) {
                     
                    
                        if(in_array($sub_category->term_id,$wpd_options['checked'])){
                     echo  '<br/><input value="'.$sub_category->term_id .'"
                     type="checkbox" checked name="checked[]"'.'>'. $sub_category->name.'<br/>';
                    
                   //print_r($wpd_options['checked']);
                        }
                       else{
                          echo  '<br/><input value="'.$sub_category->term_id .'"
                     type="checkbox" name="checked[]"'.'>'. $sub_category->name.'<br/>'; 
                       } 
                    
                     
                
            }   
                        
               
            }
                        
  ?>        
                  </li> 
                   </ul>
                </div>
                

                <div class="form-group">
                    <label><?php  _e('If yes add header and footer text','wpd'); ?>  </label>
                    <input type="text" value="<?php if(!empty($wpd_options['pdf_header_text']))  echo $wpd_options['pdf_header_text']; ?>" class="form-control " name="pdf_header_text">
                </div>

                <div class="form-group">
                    <label><?php _e('Adding watermark','wpd'); ?></label>
                    <select class="form-control" name="pdf_water_yn">
        <option value="NO ">NO</option>
        <option <?php if(!empty($wpd_options['pdf_water_yn'])) echo  $wpd_options['pdf_water_yn'] == 'YES'?'SELECTED':''; ?> 
        
        value="YES">YES</option>
       
    </select>
                </div>

                <div class="form-group">
                    <label><?php _e('If yes add watermark text','wpd'); ?></label>
                    <input type="text" value="<?php if(!empty($wpd_options['pdf_water_text'])) echo $wpd_options['pdf_water_text']; ?>" class="form-control" name="pdf_water_text">
                </div>


                <div class="form-group">
                    <label><?php _e('Text to  be seen  on  download button','wpd') ?> </label>
                    <input type="text" value="<?php if(!empty($wpd_options['pdf_down_text'])) echo $wpd_options['pdf_down_text']; ?>" class="form-control" name="pdf_down_text">
                </div>



                <div class="form-group">
                    <label><?php _e('Using the post title  as the pdf title','wpd'); ?> </label>
                    <select class="form-control" name="pdf_post_title">
        <option value="NO ">NO</option>
        <option <?php if(!empty($wpd_options['pdf_post_title'])) echo  $wpd_options['pdf_post_title'] == 'YES'?'SELECTED':''; ?> 
        
        value="YES">YES</option>
       
    </select>
                </div>

                <div class="form-group">
                    <label><?php _e('No  use a  custom  title','wpd'); ?> </label>
                    <input type="text" value="<?php if(!empty($wpd_options['pdf_custom_title'])) echo $wpd_options['pdf_custom_title']; ?>" class="form-control" name="pdf_custom_title">
                </div>


                <button type="submit" class="btn btn-primary">Save settings</button>

            </form>
        </div>
    </div>


    <?php
    
    
}
