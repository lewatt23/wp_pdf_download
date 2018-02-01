<?php 

    
//what  we will be trying to do  is simple we will  try  to  parse the dom to fine any  image 
     
  $dom = new simple_html_dom();
  $dom->load ( $html );
			
 foreach ( $dom->find ( 'img' ) as $e ) {
				$exurl = ''; // external streams
				$imsize = FALSE;
				$file = $e->src;
				// check if we are passing an image as file or string
				if ($file [0] === '@') {
					// image from string
					$imgdata = substr ( $file, 1 );
				} else { // image file
					if ($file {0} === '*') {
						// image as external stream
						$file = substr ( $file, 1 );
						$exurl = $file;
					}
					// check if is local file
					if (! @file_exists ( $file )) {
						// encode spaces on filename (file is probably an URL)
						$file = str_replace ( ' ', '%20', $file );
					}
					if (@file_exists ( $file )) {
						// get image dimensions
						$imsize = @getimagesize ( $file );
					}
					if ($imsize === FALSE) {
						$imgdata = TCPDF_STATIC::fileGetContents ( $file );
					}
				}
				if (isset ( $imgdata ) and ($imgdata !== FALSE) and (strpos ( $file, '__tcpdf_img' ) === FALSE)) {
					// check Image size
					$imsize = @getimagesize ( $file );
				}
				if ($imsize === FALSE) {
					$e->outertext = '';
				} else {
					// End Image Check
					if (preg_match ( '/alignleft/i', $e->class )) {
						$imgalign = 'left';
					} elseif (preg_match ( '/alignright/i', $e->class )) {
						$imgalign = 'right';
					} elseif (preg_match ( '/aligncenter/i', $e->class )) {
						$imgalign = 'center';
						$htmlimgalign = 'middle';
					} else {
						$imgalign = 'none';
					}
					$e->class = null;
					$e->align = $imgalign;
					if (isset ( $htmlimgalign )) {
						$e->style = 'float:' . $htmlimgalign;
					} else {
						$e->style = 'float:' . $imgalign;
					}
					
					if (strtolower ( substr ( $e->src, - 4 ) ) == '.svg') {
						$e->src = null;
						if($imgalign!='none'){
							$e->outertext = '<div style="text-align:' . $imgalign . '">[ SVG: ' . $e->alt . ' ]</div><br/>';
						}
					} else {
						if($imgalign!='none'){
							$e->outertext = '<div style="text-align:' . $imgalign . '">' . $e->outertext . '</div>';
						}
					}
				}
			}
/******parsing dom element and passing null action attribute if action attribute is not set ***/
foreach ($dom->find ('form') as $e)
 {
				if(!isset($e->attr['action']))
				{
 					$e->action = '';
				}
			}

 $html = $dom->save ();
 $dom->clear ();

