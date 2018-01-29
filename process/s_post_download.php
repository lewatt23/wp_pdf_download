<?php
/*
*
*@param $content
*@ thus function  add the  content plus a btn 
*
*/

global $wpdb,$post;




function s_post_download($content){

    $mypost = get_post();
    
    if ( is_singular('post')){
        
    //am getting  the  post  here  
        
    return $content."<a class='btn btn-primary btn-download' href='s_download.php?singlePost=".$singlename=$mypost->ID."'>Click here  Download this  post  </a>";
    }
    else{
        
        return $content;
    }
        
}



