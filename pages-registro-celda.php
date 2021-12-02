<?php
require_once('mysql.php');
session_start();
?>
<?php



if (isset($_SESSION['user_email'])) {
?>
	<script>
		let form = document.createElement('form');
		form.action = 'index.php?menu=index';
		form.method = 'GET';
		document.body.append(form);
		form.submit();
	</script>
<?php
	// header('Location: /prueba/index.php?menu=users');
}

if (isset($_POST['formasignarCelda'])) {

	$stmt = $conn->prepare("UPDATE  celdas  SET placa = ?, tipocobro = ?, estado = ?, horaingreso = ? WHERE id = ?");
	$stmt->bind_param("ssisi", $placa, $tipocobro, $estado, $horaingreso,  $id);
	$placa = $_POST['placa'];
	$tipocobro = $_POST['tipocobro'];
	$estado = 1;
	$horaingreso = $_POST['horaingreso'];
	$id = $_POST['id'];
	if ($stmt->execute()) {
		echo 'probando';
	} else {
		echo 'error';
	}
	header('Location: /parking/index.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />
	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-up.html" />
	<title>Sign Up | AdminKit Demo</title>
	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">
						<div class="text-center mt-4">
							<h1 class="h2">Autos Colombia</h1>
							<p class="lead">
								Seguridad y confianza para tu vehiculo.
							</p>
						</div>
						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form action="pages-registro-celda.php" method="post">
										<div class="mb-3">
											<p class="lead">
												Ingresa los datos del vehiculo:
											</p>
											<label class="form-label">id</label>
											<input class="form-control form-control-lg" readonly type="text" name="id" value="<?php echo $_GET['id'] ?>" />
										</div>
										<div class="mb-3">
											<label class="form-label">Placa</label>
											<input class="form-control form-control-lg" type="text" name="placa" placeholder="Enter license plate " />
										</div>
										<div class="mb-3">
											<label class="form-label">Cobro por:</label>
											<select class="form-select mb-3" name="tipocobro">
												<option selected="">Selecciona una Opción</option>
												<option>horas</option>
												<option>mensualidad</option>
											</select>
										</div>
										<div class="mb-3">
											<label class="form-label">Hora de Ingreso</label>
											<input class="form-control form-control-lg" type="datetime-local" name="horaingreso" placeholder="Enter entry time" />
										</div>
										<div class="mb-3">
											<label class="form-label">Inicio Mensualidad</label>
											<input class="form-control form-control-lg" type="datetime-local" name="iniciomensualidad" placeholder="Enter monthly payment start" />
										</div>
										<div class="mb-3">
											<label class="form-label">Fin Mensualidad</label>
											<input class="form-control form-control-lg" type="datetime-local" name="finmensualidad" placeholder="Enter end of monthly payment" />
										</div>
										<button type="submit" class="btn btn-lg btn-primary" name="formasignarCelda">Registrar Entrada</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<script src="js/app.js"></script>
</body>
</html>