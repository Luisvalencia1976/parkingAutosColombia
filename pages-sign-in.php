<?php
session_start();
if(isset($_SESSION['user_email'] )){
	header('Location: /parking/index.php');
}

require_once('mysql.php');
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

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.html" />

	<title>Sign In | AdminKit Demo</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>




<body>


	<?php
	if (isset($_POST['formSingin'])) {		
		$sql = "SELECT * FROM usuario WHERE email=?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $email);
		$email = $_POST['email'];
		$stmt->execute();
		$results = $stmt->get_result();
		$row = $results->fetch_assoc();
		if ($row) {
			if (count($row) > 0 && password_verify($_POST['password'], $row['password'])) {
				$_SESSION['user_email'] = $row['email'];				
				header('Location: /parking/index.php');
			} else {
				echo $row['email'];
				?>
				<div class="alert alert-danger" role="alert">
					Error de autenticación!
				</div>
				<?php

			}
		}
	}

	?>


	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Bienvenido a Autos Colombia,</h1>
							<p class="lead">
								Inicia Sesión con tu cuenta para continuar
							</p>
						</div>

						<div class="card-body">
								<div class="m-sm-4">
									<div class="text-center">
										<img src="img\avatars\avatar.png" alt="XXX" class="img-fluid rounded-circle" width="132" height="132" />
									</div>
									<form action="pages-sign-in.php?menu=singin" method="post">
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" />
											<br>
											<small>
												<a href="index.html">Forgot password?</a>
											</small>
										</div>
										<div>
											<label class="form-check">
												<input class="form-check-input" type="checkbox" value="remember-me" name="remember-me" checked>
												<span class="form-check-label">
													Remember me next time
												</span>
											</label>
											<br>
										</div>

										<button type="submit" class="btn btn-lg btn-outline-dark" name="formSingin">Iniciar Sesión</button>
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