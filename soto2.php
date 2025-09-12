<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>
		<form action="soto2.php" method="post">
			<input type="text" name="codigo" placeholder="Ingrese su Codigo"><br>
			<input type="text" name="cliente" placeholder="Ingrese el nombre del Cliente"><br>
			<input type="text" name="precio" placeholder="Ingrese el Precio"><br>
			<input type="text" name="docena" placeholder="Ingrese el numero de Docenas"><br>
			<select name="pago" size="2">
				<option value="efectivo">Efectivo</option>
				<option value="tarjeta">Tarjeta</option>
			</select><br>
			<input type="radio" name="r" value="cupon1">Cupon Oro<br>
			<input type="radio" name="r" value="cupon2">Cupon platino<br>
			<select name="color">
				<option value="rojo">Rojo</option>
				<option value="azul">Azul</option>
			</select>
			<br>
			<input type="submit" name="CALCULAR">
		</form>
	</center>
</body>
</html>
<?php 
if ($_POST){
	$codigo=$_POST['codigo'];
	$cliente=$_POST['cliente'];
	$precio=$_POST['precio'];
	$docena=$_POST['docena'];
	$cantidad=$docena*12;
	$parcial=$precio*$cantidad;
$d=0;
$pago=$_POST['pago'];
if($pago=="efectivo"){
	$d=$parcial*0.08;
}

$r=0;
if($pago=="tarjeta"){
	$r=$parcial*0.05;
}

$cupon=$_POST['r'];
$d1=0;
if($cupon=="cupon1"){
 	$d1=$parcial*0.08;
}else if($cupon=="cupon2"){
 	$d1=$parcial*0.06;
}

$color=$_POST['color'];
$d2=0;
if($color=="rojo"){
	$d2=$parcial*0.07;
} else if($color=="azul"){
	$d2=$parcial*0.05;
}
$total=$parcial-($d+$d1+$d2)+$r;

$sql="insert into tabla values('$codigo','$cliente','$parcial','$d','$d1','$d2','$r','$total')";
$cn=mysqli_connect("localhost","root","","compu");
mysqli_query($cn,$sql);
echo"Datos Insertados Correctamente";
}

?>