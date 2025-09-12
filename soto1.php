<!DOCTYPE html>
<html>
<head>
	<title>
	</title>
</head>
<body>
	<center>
		<form action="soto1.php" method="post">
			<input type="text" name="nit" placeholder="Ingrese Nit"><br>
			<input type="text" name="nombre" placeholder="Ingrese su nombre"><br>
			<input type="text" name="cantidad" placeholder="Ingrese la cantidad"><br>
			<select name="pago" size="2">
				<option value="efectivo">Efectivo</option>
				<option value="tarjeta">Tarjeta</option>
			</select><br>
			<input type="checkbox" name="miau" value="bi">Tarjeta Bi 4%<br>
			<input type="submit" name="Calcular">
		</form>
	</center>
</body>
</html>
<?php
if ($_POST) {
$nit=$_POST['nit'];
$nombre=$_POST['nombre'];
$cantidad=$_POST['cantidad'];

$parcial=$cantidad*15;
$d=0;
$pago=$_POST['pago'];
if($pago=="efectivo"){
	$d=$parcial*0.05;
}else if($paga=="tajeta"){
	$d=$parcial*0.04;
}
$d1=0;
$bi=$_POST['miau'];
if ($bi=="bi") {
$d1=$parcial*0.04;
}
$total=$parcial-($d+$d1);
$sql="insert into jade values('$nit','$nombre','$d','$d1','$total')";
$cn=mysqli_connect("localhost","root","","maco");
mysqli_query($cn,$sql);
echo"Datos inserados Correctamente";
}

?>