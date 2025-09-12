<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>
		<form action="comV1.php"method="post">
		<input type="text" name="codigo" placeholder="Ingrese Codigo"><br>
		<input type="text" name="empleado" placeholder="Ingrese Empleado"><br>
		<input type="text" name="sueldo" placeholder="Ingrese Sueldo"><br>
		<select name="depa" size="3">
			<option value="info">Informatica</option>
			<option value="conta">Contablidad</option>
			<option value="admi">Administracion</option>
		</select><br>
		<input type="checkbox" name="ck" value="at">Antiguedad<br>
		<input type="submit" name="btn" value="Registrar"><br>
		<input type="submit" name="btn" value="Mostrar"><br>
	</form>
</center>
</body>
</html>
<?php 
if(isset($_POST['btn'])){
 $boton=$_POST['btn'];
 if($boton=="Registrar"){
 	$cod=$_POST['codigo'];
 	$emp=$_POST['empleado'];
 	$sue=$_POST['sueldo'];

$a1=0;
$area=$_POST['depa'];
if($area=="info"){
	$a1=$sue*0.08;
}else if($area=="conta"){
	$a1=$sue*0.07;
}else if($area=="admi"){
	$a1=$sue*0.06;
}

$a2=0;
$ax=$_POST['ck'];
if($ax=="at"){
	$a2=$sue*0.09;
}

$sueldoT=$sue+$a1+$a2;
$sql="insert into tabla value ('$cod','$emp','$a1','$a2','$sueldoT')";
$cn=mysqli_connect("localhost","root","","goku");
mysqli_query($cn,$sql);
echo"Datos Insertados Correctamente";

}else if ($boton=="Mostrar"){
$cn=mysqli_connect("localhost","root","","goku");
$sql="select Codigo,Empleado,A1,A2,ST from tabla";
$cx=mysqli_query($cn,$sql);

while ($fila=mysqli_fetch_array($cx)) {
 echo "Codigo=".$fila[0]."---";
 echo "Empleado=".$fila[1]."---";
 echo "Aumento1=".$fila[2]."---";
 echo "Aumento2=".$fila[3]."---";
 echo "Stotal=".$fila[4]."<br>";

}
 }
}




 ?>