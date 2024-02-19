<?php
namespace App\Services;
use TCPDF;
class PDFService {
    public function generateMokasherPartsPDF($data, $fileName)
    {
        // Create new PDF instance
        $pdf = new TCPDF();
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);
        $pdf->setRTL(true); // Set RTL direction
        $pdf->AddPage();

        // Set font with UTF-8 encoding for Arabic text
        $pdf->SetFont('aealarabiya'); // 'aealarabiya' is an example Unicode font

        // Set background color
        $pdf->SetFillColor(238, 238, 238); // #eee (light gray) background
        // Add content to PDF
        $html = view('gehat.reports.print-report.mokashert_parts_report', $data)->render();
        $pdf->writeHTML($html, true, false, true, false, '');

        // Output PDF to browser for preview
        $pdf->Output($fileName, 'I');

    }

    public function generateMokasherYearsPDF($data, $fileName)
    {
        // Create new PDF instance
        $pdf = new TCPDF();
        $pdf->setRTL(true); // Set RTL direction
        $pdf->AddPage();

        // Exclude header and footer
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);

        // Set font with UTF-8 encoding for Arabic text
        $pdf->SetFont('aealarabiya', '', 12); // Set font family and size, with empty string for style (regular)

        // Add content to PDF
        $html = view('gehat.reports.print-report.mokasher_years_report', $data)->render();
        $pdf->writeHTML($html, true, false, false, false, '');

        // Output PDF to browser for preview
        $pdf->Output($fileName, 'I');
    }

}
