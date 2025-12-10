<?php
require_once 'tcpdf/tcpdf.php';
include 'config.php';

if (!isset($_GET['id'])) die("Error: Platillo no especificado");
$id_platillo = intval($_GET['id']);

$sql = "SELECT nombre, descripcion FROM platillos WHERE id_platillo = $id_platillo";
$result = $conn->query($sql);
if ($result->num_rows == 0) die("Platillo no encontrado");
$platillo = $result->fetch_assoc();

$sql_receta = "SELECT ingredientes, pasos FROM receta WHERE id_platillo = $id_platillo";
$result_receta = $conn->query($sql_receta);
$receta = $result_receta->num_rows > 0 ? $result_receta->fetch_assoc() : null;

$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator('Eduardo Santiago Acosta Cárdenas');
$pdf->SetAuthor('Sabores de Mi Tierra');
$pdf->SetTitle($platillo['nombre']);
$pdf->SetMargins(15, 20, 15);
$pdf->SetAutoPageBreak(true, 15);
$pdf->AddPage();

$pdf->SetFont('helvetica', 'B', 28);
$pdf->SetTextColor(139, 69, 19);
$pdf->Cell(0, 15, $platillo['nombre'], 0, 1, 'C');
$pdf->Ln(8);

$pdf->SetFont('helvetica', 'I', 12);
$pdf->SetTextColor(100, 100, 100);
$pdf->Cell(0, 10, 'Receta tradicional de San Luis Potosí', 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetTextColor(0);
$pdf->SetFont('helvetica', 'B', 14);
$pdf->Write(0, 'Descripción:', '', 0, 'L', true);
$pdf->SetFont('helvetica', '', 12);
$pdf->MultiCell(0, 10, $platillo['descripcion'], 0, 'L');
$pdf->Ln(8);

if ($receta) {
    $pdf->SetFont('helvetica', 'B', 14);
    $pdf->Write(0, 'Ingredientes:', '', 0, 'L', true);
    $pdf->SetFont('helvetica', '', 11);
    $ingredientes = explode("\n", trim($receta['ingredientes']));
    foreach ($ingredientes as $ing) {
        if (trim($ing)) $pdf->Write(0, "• " . trim($ing), '', 0, 'L', true);
    }
    $pdf->Ln(8);

    $pdf->SetFont('helvetica', 'B', 14);
    $pdf->Write(0, 'Preparación:', '', 0, 'L', true);
    $pdf->SetFont('helvetica', '', 11);
    $pasos = explode("\n", trim($receta['pasos']));
    $n = 1;
    foreach ($pasos as $paso) {
        if (trim($paso)) {
            $pdf->Write(0, $n . ". " . trim($paso), '', 0, 'L', true);
            $n++;
        }
    }
} else {
    $pdf->SetFont('helvetica', 'I', 12);
    $pdf->Write(0, 'Receta no disponible aún.', '', 0, 'L', true);
}

$pdf->Ln(20);
$pdf->SetFont('helvetica', 'I', 10);
$pdf->SetTextColor(100, 100, 100);
$pdf->Cell(0, 10, 'Proyecto Final - Programación Web | 7° Semestre ISC', 0, 1, 'C');
$pdf->Cell(0, 10, 'Eduardo Santiago Acosta Cárdenas - 22660221', 0, 1, 'C');
$pdf->Cell(0, 10, 'Instituto Tecnológico de Matehuala - 2025', 0, 1, 'C');

$nombre_pdf = preg_replace('/[^a-zA-Z0-9_-]/', '_', $platillo['nombre']) . "_receta.pdf";
$pdf->Output($nombre_pdf, 'D');
?>