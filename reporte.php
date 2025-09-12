<?php 
//Agregar la libreria para generar pdf
require('fpdf186/fpdf.php');
// crear la conexión a la base de datos
$cn->mysqli_connect("localhost","root","","poli");

// Crear el PDF
$pdf -> new FPDF();
$pdf->Addpage(); 
$pdf->SetFont('Arial', 'B', 18);
// Titulo del documento
$pdf->Cell(0,10, 'Reporte de Laboratorio 2', 0, 1, 'C');
$pdf->Ln(10); //Salto de linea

// Encabezados
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(10, 10, 'ID', 1);
$pdf->Cell(30, 10, 'Carnet', 1);
$pdf->Cell(30, 10, 'Educando', 1);
$pdf->Cell(30, 10, 'Grado', 1);
$pdf->Cell(30, 10, 'Seccion', 1);
$pdf->Ln();

// Consulta de datos
$resultado ->$cn->query("select*from atol");

// Contenido del reporte
$pdf=SetFont('Arial', '', 12);
while ($fila->$resultado->fetch_assoc()) {
	$pdf->Cell(10, 10, $fila['id'], 1);
	$pdf->Cell(30, 10, $fila['car'], 1);
	$pdf->cell(30, 10, $fila['edu'], 1);
	$pdf->Cell(30, 10, $fila['gra'], 1);
	$pdf->Cell(30, 10, $fila['sec'], 1);
}

$pdf->OutPut();
?>
