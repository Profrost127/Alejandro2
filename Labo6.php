<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>
		<form action="Labo6.php" method="post">
		<input type="text" name="nombre" placeholder="Ingrese Nombre"><br>
		<input type="text" name="nit" placeholder="Ingrese NIT"><br>
		<input type="text" name="cantidad" placeholder="Ingrese cantidad"><br>
		<select name="menu" size="1">
			<option value="sp">PLATO CALDO Y REFRESCO a Q30.00</option>
		</select><br>

		<select name="tipopago" size="2">
			<option value="efectivo">Efectivo</option>
			<option value="Debito">debito</option>
		</select><br>
		<input type="checkbox" name="r" value="c2">Para llevar -- 5%<br>
		<input type="checkbox" name="b" value="bi">Tarjeta Bi 5%<br>

		<select name="cupon" size="3">
			<option value="ca">Cupón A 4%</option>
			<option value="cb">Cupón B 6%</option>
			<option value="cc">Cupón C 8%</option>
		</select><br>

		<input type="submit" name="CALCULAR">

	</form>
</center>
</body>
</html>
<?php 
if($_POST){
	$nombre=$_POST['nombre'];
	$nit=$_POST['nit'];
	$cantidad=$_POST['cantidad'];

$precio=0;
$menu=$_POST['menu'];
if($menu=="sp"){
	$precio=30;
}

$parcial=$precio*$cantidad;

$cupon=$_POST['cupon'];
$d3=0;
if($cupon=="ca"){
 	$d3=$parcial*0.04;
}else if($cupon=="cb"){
 	$d3=$parcial*0.06;
}else if($cupon=="cc"){
 	$d3=$parcial*0.08;
}

$d1=0;
$pago=$_POST['tipopago'];
if($pago=="efectivo"){
	$d1=$parcial*0.06;
}else if($pago=="Debito"){
	$d1=$parcial*0.04;
}

$parallevar=$_POST['r'];
$d2=0;
if($parallevar=="c2"){
	$d2=$parcial*0.05;
}


$tarjetabac=$_POST['b'];
$d4=0;
if($tarjetabac=="bi"){
	$d4=$parcial*0.05;
}

$total=$parcial-$d1-$d2-$d3-$d4;

$sql="insert into toma values('$nombre','$nit','$parcial','$d1','$d2','$d3','$d4','$total')";
$cn=mysqli_connect("localhost","root","","Esto");
mysqli_query($cn,$sql);
echo"Datos Insertados Correctamente";
//Mostrar usuario
$sxl="select Nombre,Nit,Parcial,D1,D2,D3,D4,Total from toma";
$cx=mysqli_query($cn,$sxl);
while ($fila=mysqli_fetch_array($cx)) {
echo"<center>"."Nombre".$fila[0]."<br>";
	echo"Nit".$fila[1]."<br>";
	echo"Parcial".$fila[2]."<br>";
	echo"D1".$fila[3]."<br>";
	echo"D2".$fila[4]."<br>";
	echo"D3".$fila[5]."<br>";
	echo"D4".$fila[6]."<br>";
	echo"Total".$fila[7]."</center>";
}
}
 ?>