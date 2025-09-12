<?php 

//Agregar la libreria para generar pdf 


require('fpdf186/fpdf.php'); 

// crear la conexión a la base de datos 
$cn=mysqli_connect("localhost","root","","n"); 

// Crear el PDF 
$pdf = new FPDF(); 
$pdf->AddPage(); 
$pdf->SetFont('Arial', 'B', 18); 
// Títulos 
$pdf->Cell(0, 10, 'Reporte de Laboratorio 2', 0, 1, 'C'); 
$pdf->Ln(10); // Salto de línea 

// Encabezados 5to PreB aqui se quedo 
$pdf->SetFont('Arial', 'B', 12); 
$pdf->Cell(10, 10, 'ID', 1); 
$pdf->Cell(30, 10, 'codigo', 1); 
$pdf->Cell(30, 10, 'salon', 1); 
$pdf->Cell(70, 10, 'edificio', 1); 
$pdf->Cell(30, 10, 'facultad', 1);
$pdf->Ln(); 

// Consulta de datos 
$resultado = $cn->query("select*from pacha"); 

// Contenido del reporte 
$pdf->SetFont('Arial', '', 12); 
while ($fila = $resultado->fetch_assoc()) { 
    $pdf->Cell(10, 10, $fila['id'], 1); 
    $pdf->Cell(30, 10, $fila['codigo'], 1); 
    $pdf->Cell(30, 10, $fila['salon'], 1); 
    $pdf->Cell(70, 10, $fila['edificio'], 1); 
    $pdf->Cell(30, 10, $fila['facultad'], 1); 
    $pdf->Ln(); 
} 
$pdf->Output(); // Muestra el PDF en el navegador 
?> 