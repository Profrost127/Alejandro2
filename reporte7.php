<?php 
require('fpdf186/fpdf.php'); 

$cn = mysqli_connect("localhost", "root", "", "INTERNET"); 

$pdf = new FPDF(); 
$pdf->AddPage(); 
$pdf->SetFont('Arial', 'B', 18); 
$pdf->Cell(0, 10, 'INTERNET Y CANALES', 0, 1, 'C'); 
$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 12); 
$pdf->Cell(10, 10, 'id', 1); 
$pdf->Cell(25, 10, 'nit', 1); 
$pdf->Cell(20, 10, 'cliente', 1);
$pdf->Cell(20, 10, 'pago', 1); 
$pdf->Cell(20, 10, 'megas', 1); 
$pdf->Cell(34, 10, 'canales', 1);
$pdf->Cell(25, 10, 'compania', 1);
$pdf->Ln(); 

$resultado = $cn->query("SELECT * FROM CANALES"); 

$pdf->SetFont('Arial', '', 12); 
while ($fila = $resultado->fetch_assoc()) { 
    $pdf->Cell(10, 10, $fila['id'], 1); 
    $pdf->Cell(25, 10, $fila['nit'], 1); 
    $pdf->Cell(20, 10, $fila['cliente'], 1); 
    $pdf->Cell(20, 10, $fila['pago'], 1); 
    $pdf->Cell(20, 10, $fila['megas'], 1); 
    $pdf->Cell(34, 10, $fila['canales'], 1);
    $pdf->Cell(25, 10, $fila['compania'], 1);  
    $pdf->Ln(); 
} 

$pdf->Output();
?>  