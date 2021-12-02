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

if (isset($_POST['formFacturar'])) {
    $stmt = $conn->prepare("UPDATE  celdas  SET estado = ? WHERE id = ?");
    $stmt->bind_param("ii", $estado, $id); 
    $estado = 0;   
    $id = $_POST['id'];
    if ($stmt->execute()) {
        echo 'probando';
    } else {
        echo 'error';
    }     

    $stmt = $conn->prepare("INSERT INTO factura (placa, tipocobro, ingreso, salida, iniciomensualidad, finmensualidad, valorhora, valormensual, pago) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssiii", $placa, $tipocobro, $ingreso, $salida, $iniciomensualidad, $finmensualidad, $valorhora, $valormensual, $pago);
    $placa = $_POST['placa'];
    $tipocobro = $_POST['tipocobro'];
    $ingreso = $_POST['horaingreso'];
    $salida = $_POST['horasalida'];
    $iniciomensualidad = $_POST['iniciomensualidad'];
    $finmensualidad = $_POST['finmensualidad'];  
    $valorhora = intval($_POST['valorhora']); 
    $valormensual = intval($_POST['valormensual']);     
    if ($_POST['tipocobro'] === "mensualidad") {
        $pago = intval($_POST['valormensual']);
    } else {
        $pago =0;
    }

    if ($stmt->execute()) {
        
    } else {
        echo 'error';
    }
    
    
    echo $temp;
    header('Location: /parking/pages_imprimir.php?id='.$stmt->insert_id.'');
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
                                    <form action="pages-factura.php" method="post">
                                        <div class="mb-3">
                                            <p class="lead">
                                                Facturacion de Servicios de Parqueadero:
                                            </p>
                                            <label class="form-label">id</label>
                                            <input class="form-control form-control-lg" readonly type="text" name="id" value="<?php echo $_GET['id'] ?>" />
                                        </div>
                                        <?php
                                        $idvalue = $_GET['id'];
                                        $sql = ("SELECT* FROM celdas WHERE id=$idvalue ");
                                        $stmt = $conn->prepare($sql);
                                        $stmt->execute();
                                        $result = $stmt->get_result();
                                        if (!$sql) {
                                            echo 'No se pudo ejecutar la consulta: ';
                                            exit;
                                        }
                                        $row = $result->fetch_row();
                                        ?>



                                        <div class="mb-3">
                                            <label class="form-label">Tipo de Vehiculo</label>
                                            <input class="form-control form-control-lg" readonly type="text" name="tipov" value="<?php echo $row[2]; ?>" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Placa</label>
                                            <input class="form-control form-control-lg" readonly type="text" name="placa" value="<?php echo $row[1]; ?>" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Modalidad</label>
                                            <input class="form-control form-control-lg" readonly type="text" name="tipocobro" value="<?php echo $row[3]; ?>" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Inicio Mensualidad</label>
                                            <input class="form-control form-control-lg" readonly type="text" name="iniciomensualidad" value="<?php echo $row[7] ?>" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Fin Mensualidad</label>
                                            <input class="form-control form-control-lg" readonly type="text" name="finmensualidad" value="<?php echo $row[8] ?>" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Hora de Ingreso</label>
                                            <input class="form-control form-control-lg" readonly type="text" name="horaingreso" value="<?php echo $row[5]; ?>" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Hora de Salida</label>
                                            <input class="form-control form-control-lg" type="datetime-local" name="horasalida" required />
                                        </div>
                                        <div class="mb-3" hidden>
                                            <input hidden class="form-control form-control-lg" type="text" name="valorhora" value="<?php echo $row[9] ?>" />
                                        </div>

                                        <div class="mb-3" hidden>
                                            <input hidden class="form-control form-control-lg" type="text" name="valormensual" value="<?php echo $row[10] ?>" />
                                        </div>

                                        <button type="submit" class="btn btn-lg btn-primary" name="formFacturar">Generar Factura</button>
                                        
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