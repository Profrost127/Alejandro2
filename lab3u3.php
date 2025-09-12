<!DOCTYPE html> 
<html> 
<head> 
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<title></title> 
</head> 
<body> 
<center> 
<form action="lab3u3.php" method="post"> 
<input type="text" name="codigo" placeholder="Ingrese codigo"><br> 
<input type="text" name="salon" placeholder="Ingrese salon"><br> 
<input type="text" name="edificio" placeholder="Ingrese edificio"><br> 
<input type="text" name="facultad" placeholder="Ingrese facultad"><br> 
<input type="submit"  name="btn" value="Registrar"><br> 
<a href="reporte2.php">Reporte</a> 
</form> 
</center> 
</body> 
</html>

<?php  
if ($_POST) { 
$cod=$_POST['codigo']; 
$sal=$_POST['salon']; 
$edi=$_POST['edificio']; 
$fac=$_POST['facultad']; 

$cn=mysqli_connect("localhost","root","","rata"); 
$sql="insert into pacha (codigo,salon,edificio,facultad)values('$cod','$sal','$edi','$fac')"; 
mysqli_query($cn,$sql); 
echo "Datos Insertado Correctos"; 

} 

 ?> 