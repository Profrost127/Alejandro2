<?php 
require('fpdf186/fpdf.php'); 

$cn=mysqli_connect("localhost","root","","contacto"); 

$pdf = new FPDF(); 
$pdf->AddPage(); 
$pdf->SetFont('Arial', 'B', 18); 
// Títulos 
$pdf->Cell(0, 10, 'Reporte de Laboratorio 4', 0, 1, 'C'); 
$pdf->Ln(10); // Salto de línea 

$pdf->SetFont('Arial', 'B', 12); 
$pdf->Cell(10, 10, 'ID', 1); 
$pdf->Cell(15, 10, 'codigo', 1); 
$pdf->Cell(25, 10, 'pais', 1); 
$pdf->Cell(20, 10, 'nombre', 1); 
$pdf->Cell(50, 10, 'email', 1);
$pdf->Cell(40, 10, 'telefono', 1);
$pdf->Cell(30, 10, 'sexo', 1);
$pdf->Ln(); 

$resultado = $cn->query("select*from kart"); 

$pdf->SetFont('Arial', '', 12); 
while ($fila = $resultado->fetch_assoc()) { 
    $pdf->Cell(10, 10, $fila['id'], 1); 
    $pdf->Cell(15, 10, $fila['codigo'], 1); 
    $pdf->Cell(25, 10, $fila['pais'], 1); 
    $pdf->Cell(20, 10, $fila['nombre'], 1); 
    $pdf->Cell(50, 10, $fila['email'], 1);
    $pdf->Cell(40, 10, $fila['telefono'], 1); 
    $pdf->Cell(30, 10, $fila['sexo'], 1); 
 
    $pdf->Ln(); 
} 
$pdf->Output();
?> 