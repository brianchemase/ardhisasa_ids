<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;
//use Fpdf;

class PDFController extends Controller
{
    //
    public function generatePDF()
    {
        $text="Text";

     $id_no ="123456" ;
	 $client_names = "Staff Names";
	$serialNo = "255255";
	$personalNo = "2023123456";
	$station = "Station";
	$Designation = "Supervisor";
	$tarehe = "2023-04-23";
	$experyDate = "2023-04-23";
     $imagePath = public_path('img/ppt.jpg'); // Update with the correct path to your image
     //$imagePath = public_path('img/bg/bg.jpg');

    $date=date_create($tarehe);
    $approval_date= date_format($date,"d F Y");

    $date=date_create($experyDate);
    $experyDate= date_format($date,"d F Y");


        $pdf = new Fpdf('L', 'mm', 'A4');
        $pdf->AddPage('L', 'A4');

        $pdf->Image(public_path('img/idcards.png'), 0, 0, $pdf->GetPageWidth(), $pdf->GetPageHeight(), 'PNG');

        // Add the image
        $pdf->Image($imagePath, 14, 65, 58, 0, 'JPEG');

       $pdf->SetFont('Arial', 'B', 16);
       $pdf->SetTextColor(0, 0, 0); // Set text color (RGB values)
       $pdf->SetXY(80, 63); // Set position for text
       $pdf->Cell(0, 10, $client_names, 0, 1); // Add the text

       $pdf->SetXY(80, 80); // Set position for text
       $pdf->Cell(0, 10, $id_no, 0, 1); // Add the text

       $pdf->SetXY(80, 100); // Set position for text
       $pdf->Cell(0, 10, $personalNo, 0, 1); // Add the text

       $pdf->SetXY(80, 115); // Set position for text
       $pdf->Cell(0, 10, $station, 0, 1); // Add the text

       $pdf->SetXY(80, 132); // Set position for text
       $pdf->Cell(0, 10, $Designation, 0, 1); // Add the text


       $pdf->SetXY(12, 153); // Set position for text
       $pdf->Cell(0, 10, $approval_date, 0, 1); // Add the text


       $pdf->SetXY(12, 167); // Set position for text
       $pdf->Cell(0, 10, $experyDate, 0, 1); // Add the text

       $pdf->SetXY(97, 179); // Set position for text
       $pdf->Cell(0, 10, $serialNo, 0, 1); // Add the text
       
       
       $pdf->Output();
        exit;
    }

    public function generateStaffID()
    {
        $text="Text";

     $id_no ="123456" ;
	 $client_names = "Staff Names";
	$serialNo = "255255";
	$personalNo = "2023123456";
	$station = "Station";
	$Designation = "Supervisor";
	$tarehe = "2023-04-23";
	$experyDate = "2023-04-23";
     $imagePath = public_path('img/ppt.jpg'); // Update with the correct path to your image

     // Get the path to the image
    $bgpath = public_path('img/bg/bg.jpg');

    $date=date_create($tarehe);
    $approval_date= date_format($date,"d F Y");

    $date=date_create($experyDate);
    $experyDate= date_format($date,"d F Y");


        $pdf = new Fpdf('L', 'mm', 'A4');
        $pdf->AddPage('L', 'A4');


        //$pdf->Image($bgpath, 0, 0, $pdf->getPageWidth(), $pdf->getPageHeight(), '', '', '', false, 300, '', false, false, 0);

       $pdf->Image(public_path('img/bg/bg.jpg'), 0, 0, $pdf->GetPageWidth(), $pdf->GetPageHeight(), 'JPG');
        //$pdf->Image(public_path('img/staffidcards.png'), 0, 0, $pdf->GetPageWidth(), $pdf->GetPageHeight(), 'PNG');

        // Add the image
        $pdf->Image($imagePath, 14, 65, 58, 0, 'JPEG');

       $pdf->SetFont('Arial', 'B', 16);
       $pdf->SetTextColor(0, 0, 0); // Set text color (RGB values)
       $pdf->SetXY(80, 63); // Set position for text
       $pdf->Cell(0, 10, $client_names, 0, 1); // Add the text

       $pdf->SetXY(80, 80); // Set position for text
       $pdf->Cell(0, 10, $id_no, 0, 1); // Add the text

       $pdf->SetXY(80, 100); // Set position for text
       $pdf->Cell(0, 10, $personalNo, 0, 1); // Add the text

       $pdf->SetXY(80, 115); // Set position for text
       $pdf->Cell(0, 10, $station, 0, 1); // Add the text

       $pdf->SetXY(80, 132); // Set position for text
       $pdf->Cell(0, 10, $Designation, 0, 1); // Add the text


       $pdf->SetXY(12, 153); // Set position for text
       $pdf->Cell(0, 10, $approval_date, 0, 1); // Add the text


       $pdf->SetXY(12, 167); // Set position for text
       $pdf->Cell(0, 10, $experyDate, 0, 1); // Add the text

       $pdf->SetXY(97, 179); // Set position for text
       $pdf->Cell(0, 10, $serialNo, 0, 1); // Add the text
       
       
       $pdf->Output();
        exit;

    }
}
