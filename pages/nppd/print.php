<?php
require('../../inc/fpdf.php');
define('FPDF_FONTPATH', '../../inc/font/');

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // Arial bold 15
        $this->SetFont('Arial', 'BU', 15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(30, 10, 'Title', 1, 0, 'C');
        // Line break
        $this->Ln(20);
    }
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);
for ($i = 1; $i <= 40; $i++)
    $pdf->Cell(0, 10, 'Printing line number ' . $i, 0, 1);
$pdf->Output();
?>