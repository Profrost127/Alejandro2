<!DOCTYPE html> 
<html> 
<head> 
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<title></title> 
</head> 
<body> 
<center> 
<form action="lab4u3.php" method="post"> 
<input type="text" name="codigo" placeholder="Ingrese codigo"><br> 
<input type="text" name="nombre" placeholder="Ingrese nombre"><br> 
<input type="text" name="email" placeholder="Ingrese Email"><br>
<input type="text" name="telefono" placeholder="Ingrese Telefono"><br>

<select name="pais" size="4">
			<option value="guatemala">Guatemala</option><br>
			<option value="mexico">Mexico</option><br>
			<option value="ee.uu.">EE.UU.</option><br>
			<option value="canada">Canada</option><br>
</select><br>

<br><select name="sexo" size="2">
			<option value="masculino">Masculino</option>
			<option value="femenino">Femenino</option>

</select><br>
<input type="submit"  name="btn" value="Registrar"><br> 
<a href="reporte4.php">Reporte</a> 
</form> 
</center> 
</body> 
</html>

<?php  
if ($_POST) { 
$cod=$_POST['codigo']; 
$pais=$_POST['pais']; 
$nom=$_POST['nombre']; 
$ema=$_POST['email']; 
$tele=$_POST['telefono']; 
$sexo=$_POST['sexo']; 

$cn=mysqli_connect("localhost","root","","contacto"); 
$sql="insert into kart (codigo,pais,nombre,email,telefono,sexo)values('$cod','$pais','$nom','$ema','$tele','$sexo')";
mysqli_query($cn,$sql); 
echo "Datos Insertado Correctos"; 

} 

 ?> 