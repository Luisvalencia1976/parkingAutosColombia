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

if (isset($_POST['formSingup'])&& !empty($_POST['email']) && !empty($_POST['passwordA']) && !empty($_POST['passwordB'])) {
    if ($_POST['passwordA']  ===  $_POST['passwordB']) {
        $stmt = $conn->prepare("INSERT INTO usuario (name,email, password) VALUES (?, ?,?)");
        $stmt->bind_param("sss",$name, $email, $password);
		$name = $_POST['name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['passwordA'], PASSWORD_BCRYPT);

        if (!$stmt->execute()) {
?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong>
                <?php
                echo  htmlspecialchars($stmt->error);
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        } else {
			header('Location: /parking/pages-sign-in.php');
        ?>
		
            <!-- <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Usuario</strong> registrado satisfactoriamente.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> -->
        <?php
            $stmt->close();
        }
    } else {
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> la contraseña no coincide
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php
    }
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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
								Confianza y Seguridad para tu Vehiculo
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form action="pages-sign-up.php" method="post">
										<div class="mb-3">
											<label class="form-label">Name</label>
											<input class="form-control form-control-lg" type="text" name="name" placeholder="Enter your name" />
										</div>
										
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="passwordA" placeholder="Enter password" />
										</div>
										<div class="mb-3">
											<label class="form-label">Repeat Password</label>
											<input class="form-control form-control-lg" type="password" name="passwordB" placeholder="Enter password" />
										</div> 
										<button type="submit" class="btn btn-lg btn-outline-dark"  name="formSingup">Registrar un Colaborador</button>
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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>