<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<center> 
<form action="lab5u3.php" method="post"> 
<input type="text" name="nit" placeholder="Ingrese su Nit"><br> 
<input type="text" name="cliente" placeholder="Ingrese su Nombre"><br> 
<input type="text" name="consumo" placeholder="Ingrese cuanto consumio"><br>

<select name="restaurante" size="3">
			<option value="McDonalds">McDonalds</option><br>
			<option value="ElPuente">ElPuente</option><br>
			<option value="Wendys">Wendys</option><br>
</select><br>

<br><select name="sexo" size="2">
			<option value="masculino">Masculino</option>
			<option value="femenino">Femenino</option>

</select><br>
<input type="submit"  name="btn" value="Registrar"><br> 
<a href="reporte5.php">Reporte</a> 
</form> 
</center> 
</body>
</html>

<?php
if ($_POST) { 
$nit=$_POST['nit']; 
$cliente=$_POST['cliente']; 
$consumo=$_POST['consumo']; 
$restaurante=$_POST['restaurante']; 
$sexo=$_POST['sexo']; 


$cn=mysqli_connect("localhost","root","","acto"); 
$sql="insert into maf (nit,cliente,consumo,restaurante,sexo)values('$nit','$cliente','$consumo','$restaurante','$sexo')";
mysqli_query($cn,$sql); 
echo "Datos Insertado Correctos"; 
}
  ?>