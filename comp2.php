<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registro de Educando</title>
	<!-- Enlace a Bootstrap 5 -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card shadow">
					<div class="card-header text-center bg-primary text-white">
						<h4>Registro de Educando</h4>
					</div>
					<div class="card-body">
						<form action="comp2.php" method="post">
							<div class="mb-3">
								<input type="text" class="form-control" name="carnet" placeholder="Ingrese Carnet" required>
							</div>
							<div class="mb-3">
								<input type="text" class="form-control" name="educando" placeholder="Ingrese Educando" required>
							</div>
							<div class="mb-3">
								<input type="text" class="form-control" name="grado" placeholder="Ingrese Grado" required>
							</div>
							<div class="mb-3">
								<input type="text" class="form-control" name="seccion" placeholder="Ingrese Sección" required>
							</div>
							<div class="d-grid">
								<button type="submit" class="btn btn-success">Registrar</button>
							</div>
						</form>
						<div class="text-center mt-3">
							<a href="reporte.php" class="btn btn-link">REPORTE EDUCANDO</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Script de Bootstrap -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php 
if ($_POST){
$c=$_POST['carnet'];
$e=$_POST['educando'];
$g=$_POST['grado'];
$s=$_POST['seccion'];

$cn=mysql_connect("localhost","root","","poli");
$sql="insert into atol(carnet,educando,grado,seccion)values('$c','$e','$g','$s')";
mysqli_query($cn,$sql);
echo "Datos ingresados Correctamente";
}
 ?>