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
    require_once('/../inc/TCPDF/tcpdf.php');
}
catch (Exception $e) {
   echo "Error  while uploading TCPDF lib";
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
		$this->Cell(0, 15, $mytitle, 0, false, 'C', 0, '', 0, false, 'M', 'M');
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
try{    
    
// set some text to print
$txt = <<<EOD
For more visite www.cameroongcerevision.com
EOD;

$txt.='<br><hr><br>'.$mycontent;    
    
// print a block of text using Write()
$pdf->writeHTML($txt, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output($mytitle.'.pdf', 'I');

}catch(Exception $e){
    echo " Error while creating  pdf  " .$e;
}
    
}

