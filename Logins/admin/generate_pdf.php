<?php
// Include the TCPDF library
require_once __DIR__ . '/../../vendor/autoload.php';

function generate_pdf() {
  // Create new PDF document
  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

  // Set document information
  $pdf->SetCreator(PDF_CREATOR);
  $pdf->SetAuthor('John Doe');
  $pdf->SetTitle('Sample PDF Document');
  $pdf->SetSubject('Sample PDF Document');
  $pdf->SetKeywords('TCPDF, PDF, sample');

  // Add a page
  $pdf->AddPage();

  // Set some content
  $pdf->SetFont('times', '', 12);
  $pdf->Write(0, 'This is a sample PDF document generated using TCPDF.');

  // Output the PDF content
  $pdfContent = $pdf->Output('sample.pdf', 'S');
  return $pdfContent;
}

// Generate the PDF and output the content
echo generate_pdf();
?>