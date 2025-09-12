<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>
		<form action="labo3.php" method="post">
		<input type="text" name="nombre" placeholder="Ingrese Nombre"><br>
		<input type="text" name="nit" placeholder="Ingrese NIT"><br>
		<input type="text" name="cantidad" placeholder="Ingrese cantidad"><br>
		<select name="menu" size="4">
			<option value="sp">Super LINDO --- Q40</option>
			<option value="cf">Campero Familiar --- Q60</option>
			<option value="cd">Campero DeLindo --- Q70</option>
			<option value="ct">Campero TraLindo --- Q50</option>
		</select><br>

		<select name="tipopago" size="3">
			<option value="efectivo">Efectivo</option>
			<option value="tarjetac">Tarjeta de Credito</option>
			<option value="debito">Tarjeta de Debito</option>
		</select><br>
		
		<input type="checkbox" name="r" value="c1">Cupón Lindo 3%<br>
		<input type="checkbox" name="r" value="c2">Cupón Lulindo 5%<br>
		<input type="checkbox" name="b" value="bi">Tarjeta Bi 4%<br>

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
	$precio=40;
} else if($menu=="cf"){
	$precio=60;
} else if($menu=="cd"){
	$precio=70;
} else if($menu=="ct"){
	$precio=50;
}

$parcial=$precio*$cantidad;

$cupon=$_POST['r'];
$d=0;
if($cupon=="c1"){
 	$d=$parcial*0.03;
}else if($cupon=="c2"){
 	$d=$parcial*0.05;
}


$d1=0;
if($parcial>=100 && $parcial<300){
	$d1=$parcial*0.04;
} else if($parcial>=300 && $parcial<600){
	$d1=$parcial*0.06;
} else if($parcial>=600){
	$d1=$parcial*0.08;
}

$d2=0;
$pago=$_POST['tipopago'];
if($pago=="efectivo"){
	$d2=$parcial*0.05;
}else if($pago=="debito"){
	$d2=$parcial*0.03;
}

$r=0;
if($pago=="tarjetac"){
	$r=$parcial*0.04;
}

$tarjetabi=$_POST['b'];
$d3=0;
if($tarjetabi=="bi"){
	$d3=$parcial*0.04;
}

$total=$parcial-$d-$d1-$d2-$d3+$r;

$sql="insert into amy values('$nombre','$nit','$parcial','$d','$d1','$d2','$d3','$r','$total')";
´9o7
}
 ?>
