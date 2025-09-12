<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>
		<form action="examenu.php" method="post">
			<input type="text" name="nit" placeholder="Ingrese el nit"><br>
			<input type="text" name="nombre" placeholder="Ingrese el nombre"><br>
			<input type="text" name="cantidad" placeholder="Ingrese la cantidad"><br>
			
			<select name="ropa" size="3">
			<option value="c">Camisa</option><br>
			<option value="s">Saco</option><br>
			<option value="p">Pantalon</option><br>
		</select><br>

			<br><select name="tipopago" size="2">
			<option value="efectivo">Efectivo</option>
			<option value="debito">Debito</option>


		</select><br>
		<input type="checkbox" name="r" value="sd">Servicio a domicilio<br>
		<input type="checkbox" name="b" value="bi">Tarjeta Bi 3%<br>

		<br><select name="Etiqueta" size="3">
			<option value="ea">Etiqueta AZUL</option>
			<option value="en">Etiqueta NEGRO</option>
			<option value="eg">Etiqueta GRIS</option>
		</select><br>

			<br><select name="talla" size="3">
			<option value="s">S</option>
			<option value="l">L</option>
			<option value="m">M</option>
		</select><br>

		<input type="submit" name="CALCULAR">


		</form>
	</center>
</body>
</html>
<?php
if($_POST){
	$nit=$_POST['nit'];
	$nombre=$_POST['nombre'];
	$cantidad=$_POST['cantidad'];

$ropa=$_POST['ropa'];
$precio=0;
if($ropa=="c"){
	$precio=150;
} else if($ropa=="s"){
	$precio=200;
} else if($ropa=="p"){
	$precio=350;
}

$parcial=$precio*$cantidad;


$Etiqueta=$_POST['Etiqueta'];
$d3=0;
if($Etiqueta=="ea"){
 	$d3=$parcial*0.03;
}else if($Etiqueta=="en"){
 	$d3=$parcial*0.04;
}else if($Etiqueta=="eg"){
 	$d3=$parcial*0.06;
}

$d1=0;
$tipopago=$_POST['tipopago'];
if($tipopago=="efectivo"){
	$d1=$parcial*0.03;
}

$parallevar=$_POST['r'];
$d0=0;
if($parallevar=="sd"){
	$d0=$parcial*0.05;
}


$tarjetabac=$_POST['b'];
$d4=0;
if($tarjetabac=="bi"){
	$d4=$parcial*0.04;
}

$talla=$_POST['talla'];
$d2=0;
if($talla=="s"){
 	$d2=$parcial*0.04;
}else if($talla=="l"){
 	$d2=$parcial*0.06;
}else if($talla=="m"){
 	$d2=$parcial*0.08;
}

$recargo=0;
if ($tipopago=="debito"){
$recargo=$parcial*0.04;
}

$total=$parcial-$d0-$d1-$d2-$d3-$d4+$recargo;

$sql="insert into toma values('$nombre','$nit','$parcial','$d0','$d1','$d2','$d3','$d4','$recargo','$total')";
$cn=mysqli_connect("localhost","root","","Esto");
mysqli_query($cn,$sql);
echo"Datos Insertados Correctamente";
//Mostrar usuario
$sxl="select Nombre,Nit,Parcial,D0,D1,D2,D3,D4,recargo,Total from toma";
$cx=mysqli_query($cn,$sxl);
while ($fila=mysqli_fetch_array($cx)) {
echo"<center>"."Nombre".$fila[0]."<br>";
	echo"Nit".$fila[1]."<br>";
	echo"Parcial".$fila[2]."<br>";
	echo"D0".$fila[3]."<br>";
	echo"D1".$fila[4]."<br>";
	echo"D2".$fila[5]."<br>";
	echo"D3".$fila[6]."<br>";
	echo"D4".$fila[7]."<br>";
	echo"Recargo".$fila[8]."<br>";
	echo"Total".$fila[9]."</center>";
}
}

  ?>
