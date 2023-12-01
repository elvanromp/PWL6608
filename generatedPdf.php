<?
require_once __DIR__ . '/vendor/autoload.php';

$pdf = new \Dompdf\Dompdf();
$pdf->loadHtml('<h1>Hello</h1>');
$pdf->setPaper("A4", "Portrait");
$pdf->render('');
$pdf->stream('tes.pdf', array("Attachment" => FALSE));
