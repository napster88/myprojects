<?php 
require_once('fpdf.php');

// create an instance of FPDF
$pdf = new fpdf();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);

// let's write some dynamic content
$text = 'This document is created with FPDF on '
    . date('r')
    . ' and digital signed with the SetaPDF-Signer component.';
$pdf->MultiCell(0, 8, $text);

// Output the PDF document to a string
$fpdf = $pdf->Output('', 'S');

//require_once('library/SetaPDF/Autoload.php');
// or if you use composer require_once('vendor/autoload.php');

// create a Http writer
$writer = new SetaPDF_Core_Writer_Http('fpdf-sign-demo.pdf', true);
// load document by filename
$document = SetaPDF_Core_Document::loadByString($fpdf, $writer);

// create a signer instance for the document
$signer = new SetaPDF_Signer($document);

// set some signature properties
$signer->setReason('Demo with FPDF');
$signer->setLocation('setasign.com');

// ccreate an OpenSSL module instance
$module = new SetaPDF_Signer_Signature_Module_OpenSsl();
// set the sign certificate
$module->setCertificate(file_get_contents('certificate.pem'));
// set the private key for the sign certificate
$module->setPrivateKey(array(file_get_contents('private-key.pem'), 'password'));

// sign/certify the document
$signer->sign($module);



?>