<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>
		<form action="labo5.php" method="post">
		<input type="text" name="nombre" placeholder="Ingrese Nombre"><br>
		<input type="text" name="nit" placeholder="Ingrese NIT"><br>
		<input type="text" name="cantidad" placeholder="Ingrese cantidad"><br>
		<select name="menu" size="3">
			<option value="sp">Super Hamburguesa Papas y agua --- Q35</option>
			<option value="cf">Super Hot Dog Gigante Papas y agua --- Q45</option>
			<option value="cd">Super Wrap Gigante Papas y agua --- Q55</option>
		</select><br>

		<select name="tipopago" size="3">
			<option value="efectivo">Efectivo</option>
			<option value="Debito">Recargo</option>
			<option value="Credito">Credito</option>
		</select><br>
		
		<input type="checkbox" name="r" value="c1">Restaurante-- 4%<br>
		<input type="checkbox" name="r" value="c2">Para llevar -- 8%<br>
		<input type="checkbox" name="b" value="bac">Tarjeta Bac 4%<br>

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
	$precio=35;
} else if($menu=="cf"){
	$precio=45;
} else if($menu=="cd"){
	$precio=55;
}

$parcial=$precio*$cantidad;

$cupon=$_POST['r'];
$d2=0;
if($cupon=="c1"){
 	$d2=$parcial*0.04;
}else if($cupon=="c2"){
 	$d2=$parcial*0.08;
}

$d1=0;
$pago=$_POST['tipopago'];
if($pago=="efectivo"){
	$d1=$parcial*0.07;
}else if($pago=="Debito"){
	$d1=$parcial*0.05;
}

$r=0;
if($pago=="Credito"){
	$r=$parcial*0.03;
}

$tarjetabac=$_POST['b'];
$d3=0;
if($tarjetabac=="bac"){
	$d3=$parcial*0.04;
}

$total=$parcial-$d1-$d2-$d3+$r;

$sql="insert into ale values('$nombre','$nit','$parcial','$d1','$d2','$d3','$r','$total')";
$cn=mysqli_connect("localhost","root","","Camilo");
mysqli_query($cn,$sql);
echo"Datos Insertados Correctamente";

}
 ?>
