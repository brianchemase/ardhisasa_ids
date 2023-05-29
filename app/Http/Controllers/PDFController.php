<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
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

        $pdf->Image(public_path('img/bg/idcards.png'), 0, 0, $pdf->GetPageWidth(), $pdf->GetPageHeight(), 'PNG');
        

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
    $Directorate="Directorate";
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


       
       $pdf->Image(public_path('img/bg/staffidcards.png'), 0, 0, $pdf->GetPageWidth(), $pdf->GetPageHeight(), 'PNG');
        //$pdf->Image(public_path('img/staffidcards.png'), 0, 0, $pdf->GetPageWidth(), $pdf->GetPageHeight(), 'PNG');

        // Add the image
        $pdf->Image($imagePath, 52, 55, 51, 0, 'JPEG');

       $pdf->SetFont('Arial', 'B', 16);
       $pdf->SetTextColor(0, 0, 0); // Set text color (RGB values)
       $pdf->SetXY(58, 106); // Set position for text
       $pdf->Cell(0, 10, $client_names, 0, 1); // Add the text

       $pdf->SetXY(58, 115); // Set position for text
       $pdf->Cell(0, 10, $station, 0, 1); // Add the text

       $pdf->SetXY(58, 125); // Set position for text
       $pdf->Cell(0, 10, $personalNo, 0, 1); // Add the text

       $pdf->SetXY(58, 134); // Set position for text
       $pdf->Cell(0, 10, $Designation, 0, 1); // Add the text

       $pdf->SetXY(58, 142); // Set position for text
       $pdf->Cell(0, 10, $Directorate, 0, 1); // Add the text


      // $pdf->SetXY(80, 130); // Set position for text
       //$pdf->Cell(0, 10, $id_no, 0, 1); // Add the text

       
       

      


       $pdf->SetXY(16, 157); // Set position for text
       $pdf->Cell(0, 10, $approval_date, 0, 1); // Add the text


       $pdf->SetXY(16, 170); // Set position for text
       $pdf->Cell(0, 10, $experyDate, 0, 1); // Add the text

       $pdf->SetXY(97, 179); // Set position for text
       $pdf->Cell(0, 10, $serialNo, 0, 1); // Add the text

       
       
       
       $pdf->Output();
        exit;

    }

    public function generatePdfWithQRCode()
    {
        // Create a new FPDF instance
        $pdf = new FPDF();

        // Add a new page
        $pdf->AddPage();

        // Generate the QR code using the "endroid/qr-code" library
        $qrCodeText = 'https://www.example.com'; // The content you want to encode in the QR code
        $qrCodeSize = 100; // The size of the QR code in pixels

        // Create a new instance of the QrCode class
        $qrCode = new QrCode($qrCodeText);

        // Set the size of the QR code
        $qrCode->setSize($qrCodeSize);

        // Create a new instance of the PngWriter class to write the QR code as PNG
        $writer = new PngWriter();

        // Define the path to save the QR code image file
        $qrCodeImagePath = sys_get_temp_dir() . '/qrcode.png';

        // Write the QR code image data to the file without a logo
        $writer->write($qrCode, $qrCodeImagePath, null);

        // Add the QR code image to the PDF
        $pdf->Image($qrCodeImagePath, 10, 10, 50, 50, 'PNG');

        // Output or save the PDF
        $pdf->Output('output.pdf', 'I');
    }

    public function viewqr()
    {
        return view('view_qr_code');
    }


}
