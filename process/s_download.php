<?php

if(isset($_GET['singlePost'])){
    
    
    //Here  we  get  the post  if 

$s_postId= $_GET['singlePost'];
   

    
    
//trying to get the post title
    
try{
$mysinglePost    = get_post($s_postId);  
  
}catch(Exception $e){
    echo "Error  while getting postid".$e->getMessage();
} 
  
    
//trying to get  the post  content    
    
try{
        $mycontent =  apply_filters('the_content', $mysinglePost->post_content);
//    echo $mycontent;

}catch(Exception $e){
    echo "error while getting post  content".$e->getMessage();
}    
   
//trying to  get   post title
    
try{
        $mytitle = $mysinglePost->post_title;

}catch(Exception $e){
    
    echo "error  while getting post  title".$e->getMessage();
    
}    
    
    
//calling the  post creation method

     
try{
    require_once(WPD_PATH.'/inc/tcpdf_min/tcpdf.php');
}
catch (Exception $e) {
   echo "Error  while uploading TCPDF lib".$e->getMessage();
  }
  
    
    
//importing  simple dom    
    
    
 try{
    require_once(WPD_PATH.'/inc/simplehtmldom/simple_html_dom.php');
}
catch (Exception $e) {
   echo "Error  while uploading simple dom lib".$e->getMessage();
  }   
    
    
    
    
  
    
  
class MYPDF extends TCPDF {

	//Page header
	public function Header() {
        
    //I commented this  place  out cause  i did not  want to  add  header image    
        
//		// Logo
//		$image_file = K_PATH_IMAGES.'logo_example.jpg';
//		$this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// Set font
		$this->SetFont('helvetica', 'B', 20);
		// here am  setting the title
		$this->Cell(0, 15, 'www.cameroongcerevision.com', 0, false, 'C', 0, '', 0, false, 'M', 'M');
	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Page number
		$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages().' ' .'more at www.cameroongcerevision.com', 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 003');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', 'BI', 12);

// add a page
$pdf->AddPage();


//creating pdf file    

      
     
// set some text to print
//getiing  content  variable  the  adding  
// my own kind of header  then  parsing  it 
$html ='';    
    
$html = '<p>
For more visite www.cameroongcerevision.com
</p>';
$html .= '<body><br><hr><br>'.htmlspecialchars_decode ( htmlentities ( $mycontent, ENT_NOQUOTES, 'UTF-8', false ), ENT_NOQUOTES );
$html .="</body>";    

    
    
// prasing images  in the  content  
// to  undertand  better  please  google  simple_html_dom
//not really  the best  way  of orangizing  my  code  sorry :)    
    
include(WPD_PATH.'/process/parseing_images.php');
    

    
    

    
    
    
// print a block of text using Write()
$pdf->writeHTML ( $html, true, 0, true, 0 );


//working  on  adding water  mark 

$pageno = $pdf->getNumPages ();
    
for($i = 1; $i <= $pageno; $i ++){ 
    $pdf->setPage ( $i );
					
    // Get the page width/height
    $myPageWidth = $pdf->getPageWidth ();
					
    $myPageHeight = $pdf->getPageHeight ();
					
  // Find the middle of the page and adjust.
   $myX = ($myPageWidth / 2) - 75;
   $myY = ($myPageHeight / 2) + 25;
					
  // Set the transparency of the text to really light
   $pdf->SetAlpha ( 0.09 );
					
  // Rotate 45 degrees and write the watermarking text
					
    $pdf->StartTransform ();
    //rotation degree
    $rotate_degr =  '45';
   $pdf->Rotate ( $rotate_degr, $myX, $myY );
   $water_font =  'courier';
  $pdf->SetFont ( $water_font, "", 30 );
   $watermark_text = 'www.cameroongcerevision.com';
  $pdf->Text ( $myX, $myY, $watermark_text );
  $pdf->StopTransform ();
					
// Reset the transparency to default
$pdf->SetAlpha ( 1 );
				
			
    
    
}
    
    
    
    
//Close and output PDF document
$pdf->Output($mytitle.'.pdf', 'I');

}