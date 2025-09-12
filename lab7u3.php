<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<center> 
<form action="lab7u3.php" method="post"> 
<input type="text" name="nit" placeholder="Ingrese su NIT"><br>
<input type="text" name="cliente" placeholder="Ingrese nombre"><br>


<br><select name="megas" size="3">
			<option value="50 Megas">50 Megas</option><br>
			<option value="30 Megas">30 Megas</option><br>
			<option value="10 Megas">10 Megas</option><br>
</select><br>

<br><select name="pago" size="3">
			<option value="Efectivo">Efectivo</option>
			<option value="Transferencia">Transferencia</option>
			<option value="Tarjeta">Tarjeta</option>
</select><br>

<br><select name="canales" size="3">
			<option value="200 Canales">200 Canales</option><br>
			<option value="150 Canales">150 Canales</option><br>
			<option value="100 Canales">100 Canales</option><br>
</select><br>

<br><input type="checkbox" name="compania" value="Claro">Claro<br>
		<br><input type="checkbox" name="compania" value="Tigo">Tigo<br>

<br><input type="submit"  name="btn" value="Registrar"><br> 
<a href="reporte7.php">Reporte</a> 
</form> 
</center> 
</body>
</html>
<?php
if ($_POST) {  
$nit=$_POST['nit']; 
$cliente=$_POST['cliente']; 
$megas=$_POST['megas']; 
$pago=$_POST['pago'];  
$canales=$_POST['canales'];
$compania=$_POST['compania'];

$cn=mysqli_connect("localhost","root","","INTERNET"); 
$sql="insert into CANALES (nit,cliente,pago,megas,canales,compania)values('$nit','$cliente','$pago','$megas','$canales','$compania')";
mysqli_query($cn,$sql); 
echo "Datos Insertado Correctos"; 
}
  ?>