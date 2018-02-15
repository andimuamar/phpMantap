<?php
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');
require_once('../koneksi.php');

if(isset($_GET['id'])){

	$id = $_GET['id'];

	$sql = "SELECT * FROM s_praktikum WHERE id=".$id;
	$result = mysqli_query($conn, $sql);

	$row = mysqli_fetch_array($result);

	$no_ser = strtoupper($row['no_sertifikat']);
	$nm_mahasiswa = strtoupper($row['nm_mahasiswa']);
	$npm = strtoupper($row['npm_mahasiswa']);
	$nm_prak = strtoupper($row['nm_praktikum']);
	$predikat = strtoupper($row['predikat']);
	$dosen_pengampu = $row['dosen_pengampu'];
	$nidn_dosen = strtoupper($row['nidn_dosen']);
	$smster = $row['semester'];
	$tgl_sertifikat = $row['tgl_sertifikat'];

	if($predikat > 85){
		$predikat2 = 'Sangat Memuaskan';
	} 
	else if ($predikat > 51) {
		$predikat2 = 'Memuaskan';

	}else if ($predikat <= 50){

		$predikat2 = 'Cukup';
	}

	$predikat = strtoupper($predikat2);

}

class MYPDF extends TCPDF {

	//Page header
	public function Header() {
		//font setting
		$fontname2 = TCPDF_FONTS::addTTFfont('./Times_New_Roman_Normal.ttf', 'TrueTypeUnicode', '', 96);
		$this->SetFont($fontname2, '', 14, '', true);

		//html write
$header_kop = <<<EOD

EOD;
		
		//$this->writeHTML($header_kop);
	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('times', 'I', 8);
		// Page number
		//$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');

		$this->Rect(0,200,300,10,'F','',$fill_color = array(0, 125, 0));
	}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU');
$pdf->SetTitle('TDG');
$pdf->SetSubject('PENERBITAN TDG');
//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

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

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
//$fontname = TCPDF_FONTS::addTTFfont('./Times_New_Roman_Normal.ttf', 'TrueTypeUnicode', '', 96);
//$pdf->SetFont('Times', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage('L', 'A4');

$pdf->SetMargins(10, 10, 10, true); // set the margins

$pdf->SetXY(0,0);
$pdf->SetAutoPageBreak(TRUE, 0);

// set text shadow effect
//$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));


//$img_file = K_PATH_IMAGES.'water.png';
//$pdf->Image($img_file, 55, 70, 100, 130, '', '', '', true, 100);
//$pdf->SetAlpha(1);

//$img_file = K_PATH_IMAGES.'pass_foto2.png';
//$pdf->Image($img_file, 78, 172, 30, 40, '', '', '', true, 100);

// Set some content to print
$html = <<<EOD
<br>
<br>
<br>

<table style="font-family: Arial,Helvetica Neue,Helvetica,sans-serif;min-height: 50px;max-width: 100%;vertical-align:top;font-size:8px;" border="0" cellspacing="5">
	<tbody>
		<tr>
			<td width="100%" align="center"><img src="img/logo_stt.png" style="width:100px;max-height:100%;"></td>
		</tr>
		<tr>
			<td colspan="3" align="center" style="line-height:150%;">
				<font style="font-size:20px;">LABORATORIUM TEKNIK INFORMATIKA PROGRAM STUDI TEKNIK INFORMATIKA</font>
				<br>
				<font style="font-size:20px;">SEKOLAH TINGGI TEKNIK (STT) IBNU SINA BATAM</font>
				<br>
				<font style="font-size:36px;"><b>SERTIFIKAT</b></font>
				<br>
				<font style="font-size:16px;"><b>Nomor</b>:$no_ser/Lab. Komp TF/STT/YAPISTA/$smster/2017</font>
			</td>
		</tr>
	</tbody>
</table>
<table style="min-height: 50px;max-width: 100%;vertical-align:top;" border="0" cellspacing="5">
	<tbody>
		<tr>
			<td colspan="3" align="center" style="line-height:150%;">
				<font style="font-size:16px;">Diberikan Kepada : </font>
				<br>
				<br>
				<font style="font-size:18px;"><b><u>$nm_mahasiswa</u></b></font>
				<br>
				<font style="font-size:18px;"><b>NPM : $npm</b></font>
			</td>
		</tr>
		<br>
		<tr>
			<td width="100%"><font style="font-size:17px;text-align:justify;">Mahasiswa Program Studi Teknik Informatika, telah mengikuti $nm_prak yang diselenggarakan pada semester ganjil 2017/2018 dan dinyatakan lulus dengan predikat: $predikat</font>
			</td>
		</tr>
		<br>
		<tr>
			<td width="100%"><font style="text-align:center;">Batam,  $tgl_sertifikat</font></td>
		</tr>
		<br>
		<br>
		<tr>
			<td width="70%" align="left">
			<table>
				<tr>
					<td>Ka. Lab Teknik Informatika</td>
				</tr>
				<tr>
					<td width="200" height="95" align="center"><img src="img/ttd_ketua.jpg" style="width:100px;"></td>
				</tr>
				<tr>
					<td><font style="text-align:left;font-weight:bold;"><u>HANAFI,. M.Kom</u></font></td>
				</tr>
				<tr>
					<td><font style="text-align:left;font-weight:bold;">NIDK : 8873810016</font></td>
				</tr>
			</table>
			</td>			
			<td width="30%" align="right">
			<table>
				<tr>
					<td><font style="text-align:left;">Dosen Pengampu</font></td>
				</tr>
				<tr>
					<td width="200" height="95" align="center"><img  src="img/ttd_buririt.png" style="width:260px;"></td>
				</tr>
				<tr>
					<td width="450"><font style="text-align:left;font-weight:bold;"><u>$dosen_pengampu</u></font></td>
				</tr>
				<tr>
					<td><font style="text-align:left;font-weight:bold;">NIDN: $nidn_dosen</font></td>
				</tr>
			</table>
			</td>
		</tr>
	</tbody>
</table>
EOD;

// Print text using writeHTMLCell()
//$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
$pdf->writeHTML($html);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('"'.$nm_mahasiswa.'_'.$npm.'".pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
