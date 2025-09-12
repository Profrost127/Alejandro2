<?php 
require('fpdf186/fpdf.php'); 

$cn = mysqli_connect("localhost", "root", "", "camello"); 

$pdf = new FPDF(); 
$pdf->AddPage(); 


//$pdf->image('Trifuerza.png', 10, 10, 30); 

$pdf->Ln(20); 

$pdf->SetFont('Arial', 'B', 18); 
$pdf->Cell(0, 10, 'Reporte de Laboratorio 6', 0, 1, 'C'); 
$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 12); 
$pdf->Cell(10, 10, 'id', 1); 
$pdf->Cell(25, 10, 'consumo', 1); 
$pdf->Cell(20, 10, 'd1', 1); 
$pdf->Cell(20, 10, 'd2', 1); 
$pdf->Cell(34, 10, 'recargo', 1);
$pdf->Cell(25, 10, 'total', 1);
$pdf->Ln(); 

$resultado = $cn->query("SELECT * FROM ela"); 

$pdf->SetFont('Arial', '', 12); 
while ($fila = $resultado->fetch_assoc()) { 
    $pdf->Cell(10, 10, $fila['id'], 1); 
    $pdf->Cell(25, 10, $fila['consumo'], 1); 
    $pdf->Cell(20, 10, $fila['d1'], 1); 
    $pdf->Cell(20, 10, $fila['d2'], 1); 
    $pdf->Cell(34, 10, $fila['recargo'], 1);
    $pdf->Cell(25, 10, $fila['total'], 1);  
    $pdf->Ln(); 
} 

$pdf->Output();
?>  