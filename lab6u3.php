<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<center> 
<form action="lab6u3.php" method="post"> 
<input type="text" name="consumo" placeholder="Ingrese cuanto consumio"><br>

<select name="pago" size="3">
			<option value="efectivo">Efectivo</option><br>
			<option value="transferencia">Transferencia</option><br>
			<option value="credito">Tarjeta de crédito</option><br>
</select><br>

<br><select name="bi" size="1">
			<option value="bi">Tarjeta Bi</option>

</select><br>
<input type="submit"  name="btn" value="Registrar"><br> 
<a href="reporte6.php">Reporte</a> 
</form> 
</center> 
</body>
</html>
<?php
if ($_POST) {  
$consumo=$_POST['consumo']; 
$bi=$_POST['bi']; 
$pago=$_POST['pago']; 


$d1=0;
if($pago=="efectivo"){
	$d1= $consumo * 0.10;
} else if($pago=="transferencia"){
	$d1= $consumo * 0.07;
}

$d2=0;
if($bi=="bi"){
	$d2=$consumo * 0.07;
}

$recargo=0;
if($pago=="credito"){
	$recargo= $consumo * 0.05;
}

$total=$consumo - ($d1+$d2) + $recargo;

$cn=mysqli_connect("localhost","root","","camello"); 
$sql="insert into ela (consumo,d1,d2,recargo,total)values('$consumo','$d1','$d2','$recargo','$total')";
mysqli_query($cn,$sql); 
echo "Datos Insertado Correctos"; 
}
  ?>