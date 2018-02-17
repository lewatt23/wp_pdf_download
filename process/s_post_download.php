<?php
/*
*
*@param $content
*@thus function  add the  content plus a btn 
*
*/

global $wpdb,$post;




function s_post_download($content){

    $mypost = get_post();
    
    //am getting  the  post  here  
        
    $wpd_options = get_option('wpd_ops');
    
    //getting  cat ID
    
    $cate = get_the_category($mypost->ID);
    
   //checking  if the  post type and cat


    
    if (get_post_type($mypost->ID) == 'post' ){
        
        
    if($wpd_options['pdf_down_text'] !== '' ){
        $post_custom_text = $wpd_options['pdf_down_text'] ;
        
        }else{
        
        $post_custom_text = 'Click here  Download this  post';
    }
        
    return $content."<a class='btn btn-primary btn-download' href='s_download.php?singlePost=".$singlename=$mypost->ID."'>".$post_custom_text ."</a>";
    }
    
    else{
        
        return $content;
    }
        
}



    function   checkids(){
        
    $myposts = get_post();
    
    //am getting  the  post  here  
        
    $wpd_options = get_option('wpd_ops');
    
     $cat = get_the_category($myposts->ID);
   
    foreach($cat as $c){
    if(in_array($c->term_id,$wpd_options['checked'])){
      return 1 ;  
    }else{
        return 0;
      }
        };
    }
    
