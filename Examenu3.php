<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<center>
		<form action="Examenu3.php" method="post">
		<input type="text" name="nit" placeholder="Ingrese su NIT"><br>
		<input type="text" name="nombre" placeholder="Ingrese nombre"><br>
		<input type="text" name="cantidad" placeholder="Ingrese Cantidad"><br>

		<br><select name="producto" size="4">
			<option value="camisapolo">Camisa Polo</option><br>
			<option value="pantalonescolars">Pantalon Escolar</option><br>
			<option value="jumperniñas">Jumper (niñas)</option><br>
			<option value="sudadera">Sudadera</option><br>
		</select><br>

		<br><select name="pago" size="3">
			<option value="efectivo">Efectivo</option>
			<option value="debito">Debito</option>
			<option value="recargo">Recargo Por Credito</option>
		</select><br>

		<br><select name="talla" size="3">
			<option value="XL">XL</option><br>
			<option value="L">L</option><br>
			<option value="M">M</option><br>
		</select><br>

		<br><select name="tela" size="3">
			<option value="algodonpremium">Algodon Premium</option><br>
			<option value="polialgodon">Polialgodon</option><br>
			<option value="Microfibra">Microfibra</option><br>
		</select><br>

		<br><input type="checkbox" name="tarjeta" value="tarjetadefidelidad">Tarjeta de fidelidad Elite<br>

		<br><input type="submit"  name="btn" value="Calcular"><br> 

		</form>
	</center>
</body>
</html>
<?php  
if ($_POST) {  
$nit=$_POST['nit']; 
$nombre=$_POST['nombre'];
$cantidad=$_POST['cantidad']; 
$producto=$_POST['producto']; 
$pago=$_POST['pago'];  
$talla=$_POST['talla'];
$tela=$_POST['tela'];

$precio=0;
if($producto=="camisapolo"){
	$precio=150;
} else if($producto=="pantalonescolars"){
	$precio=180;
} else if($producto=="jumperniñas"){
	$precio=220;
}else if($producto=="sudadera"){
	$precio=250;
}

$parcial=$precio*$cantidad;

$d1=0;
if($pago=="efectivo"){
	$d1=$parcial*0.05;
} else if($pago=="debito"){
	$d1=$parcial*0.04;
}

$r1=0;
if($pago=="recargo"){
	$r1=$parcial*0.03;
}


$tarjeta=$_POST['tarjeta'];
$d4=0;
if($tarjeta=="tarjetadefidelidad"){
	$d4=$parcial*0.03;
}

$d2=0;
if($talla=="XL"){
 	$d2=$parcial*0.04;
}else if($talla=="L"){
 	$d2=$parcial*0.06;
}else if($talla=="M"){
 	$d2=$parcial*0.08;
}

$d3=0;
if($tela=="algodonpremium"){
	$d3=$parcial*0.03;
} else if($tela=="polialgodon"){
	$d3=$parcial*0.04;
} else if($tela=="Microfibra"){
	$d3=$parcial*0.06;
}

$total=$parcial-($d1+$d2+$d3+$d4)+$r1;


$cn=mysqli_connect("localhost","root","","datos"); 
$sql="insert into tablita (nit,nombre,cantidad,parcial,d1,d2,d3,d4,r1,total)values('$nit','$nombre','$cantidad','$parcial','$d1','$d2','$d3','$d4','$r1','$total')";
mysqli_query($cn,$sql); 
echo "Datos Insertado Correctos"; 
}
?>