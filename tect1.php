<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>
		<form action="tect1.php" method="post">
			<input type="text" name="codigo"><br>
			<input type="text" name="nombre"><br>
			<input type="text" name="monto"><br>
			<input type="radio" name="r" value="dx">Descuento 5%<br>
			
			<input type="checkbox" name="ck" value="dt">Descuento 7%<br>
			<input type="submit" value="Registrar">

		</form>

	</center>
</body>
</html>
<?php  
if ($_POST){
	$cod=$_POST['codigo'];
	$nom=$_POST['nombre'];
	$mon=$_POST['monto'];

	//Descuento Sobre el radio
	$dxx=$_POST['r'];
$d=0;
if($dxx=="dx"){
	$d=$mon*0.05;
}


//Descuento sobre
$dr=$_POST['ck'];
$d1=0;
if ($dr=="dt"){
	$d1=$mon*0.07;
}
//Total
$total=$mon-($d+$d1);
$cn=mysqli_connect("localhost","root","","toc");
$sql="insert into taco values ('$cod','$nom','$d','$d1','$total')";
mysqli_query($cn,$sql);
echo"Datos Insertados Correctamente";
//Mostrar usuario
$sxl="select Codigo,Nombre,D1,D2,Total from taco";
$cx=mysqli_query($cn,$sxl);
while ($fila=mysqli_fetch_array($cx)) {
echo"<center>"."Codigo".$fila[0]."<br>";
	echo"Nombre".$fila[1]."<br>";
	echo"D1".$fila[2]."<br>";
	echo"D2".$fila[3]."<br>";
	echo"Total".$fila[4]."</center>";
}
}
?>