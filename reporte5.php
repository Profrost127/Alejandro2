<?php 
require('fpdf186/fpdf.php'); 

$cn=mysqli_connect("localhost","root","","acto"); 

$pdf = new FPDF(); 
$pdf->AddPage(); 
$pdf->SetFont('Arial', 'B', 18); 
$pdf->Cell(0, 10, 'Reporte de Laboratorio 5', 0, 1, 'C'); 
$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 12); 
$pdf->Cell(10, 10, 'id', 1); 
$pdf->Cell(20, 10, 'nit', 1); 
$pdf->Cell(43, 10, 'cliente', 1); 
$pdf->Cell(22, 10, 'consumo', 1); 
$pdf->Cell(34, 10, 'restaurante', 1);
$pdf->Cell(25, 10, 'sexo', 1);
$pdf->Cell(27, 10, 'Descuento', 1);
$pdf->Cell(17, 10, 'Propina', 1);
$pdf->Ln(); 

$resultado = $cn->query("select*from maf"); 

$pdf->SetFont('Arial', '', 12); 
while ($fila = $resultado->fetch_assoc()) { 
    $pdf->Cell(10, 10, $fila['id'], 1); 
    $pdf->Cell(20, 10, $fila['nit'], 1); 
    $pdf->Cell(43, 10, $fila['cliente'], 1); 
    $pdf->Cell(22, 10, $fila['consumo'], 1); 
    $pdf->Cell(34, 10, $fila['restaurante'], 1);
    $pdf->Cell(25, 10, $fila['sexo'], 1); 
    $pdf->Cell(27, 10, '7%', 1,); 
    $pdf->Cell(17, 10, '3%', 1,);

 
    $pdf->Ln(); 
} 
$pdf->Output();
?> 