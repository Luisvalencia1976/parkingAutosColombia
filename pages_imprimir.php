<?php
require_once('mysql.php');
session_start();
?>
<?php

$sql = "SELECT * FROM factura WHERE id=?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $id);
		$id =intval( $_GET['id']);
		$stmt->execute();
		$results = $stmt->get_result();
		$row = $results->fetch_row();
    $totalhoras=round((strtotime($row[4]) - strtotime($row[3]))/3600,2);
    if ($totalhoras > 0 && $totalhoras < 1 ){
      $totalhoras=1;

    }elseif($totalhoras>24){
      $dia=$totalhoras/24;
    }



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Example 1</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
  <header class="clearfix">
    <div id="logo">
      <img src="img\avatars\autologo.png" alt="XXX" class="img-fluid rounded-circle" width="132" height="132" />
    </div>
    <h1>Autos Colombia</h1>
    <br>
    <div id="company" class="clearfix">
      <div></div>
      <div>Calle 50 # 20-34<br />Medellin-Colombia</div>
      <div>(604) 51155XX</div>
      <div><a href="mailto:company@example.com">autos_colombia@correo.com</a></div>
    </div>
    <br>
    <div id="project">
      <div><span>FACTURA DE VENTA N#: </span> <?php echo $row[0] ?></div>
      <div><span>PLACA: </span><?php echo $row[1] ?></div>
      <div><span>MODALIDAD COBRO: </span><?php echo $row[2] ?></div>
      <div><span>FECHA Y HORA DE INGRESO: </span></span><?php echo $row[3] ?> </a></div>
      <div><span>FECHA Y HORA DE SALIDA: </span></span><?php echo $row[4] ?> </div>
      
    </div>
  </header>
  <main>
  <div class="col-md-7">
    <table class="
              table table-striped table-hover table-bordered table-sm
              bg-white
            ">
      <thead>
        <tr>
          <th class="service">SERVICIO</th>
          <th class="desc">MODALIDAD</th>
          <th>VALOR HORA</th>
          <th>CANTIDAD</th>
          <th>TOTAL A PAGAR</th>
        </tr>
      </thead>
      <tbody>

        <tr>
          <td class="service">Parqueadero</td>
          <td class="desc"> </span><?php echo $row[2] ?> </td>
          <td class="unit" ><?php echo $row[7] ?></td>
          <td class="qty"><?php echo $totalhoras?> </td>
          <td class="total"><?php echo ($totalhoras)*$row[7] ?></td>
        </tr>
        <tr>
          <td colspan="4">SUBTOTAL</td>
          <td class="total"><?php echo ($totalhoras)*$row[7] ?></td>
        </tr>
        <tr>
          <td colspan="4">TAX 0%</td>
          <td class="total">$0.00</td>
        </tr>
        <tr>
          <td colspan="4" class="grand total">GRAN TOTAL</td>
          <td class="grand total"><?php echo ($totalhoras)*$row[7] ?></td>
        </tr>
      </tbody>
    </table>
    <div class="mb-3">
											<label class="form-label">MEDIO DE PAGO:</label>
											<select class="form-select mb-3" name="tipocobro">
												<option selected="">Selecciona una Opción</option>
												<option>EFECTIVO</option>
												<option>TARJETA DE CREDITO</option>
											</select>
										</div>
                    <button type="submit" class="btn btn-lg btn-primary" name="formFacturar">Registrar Pago</button>
    </div>
    <div id="notices">
      <div>NOTA:</div>
      <div class="notice">A partir del ingreso el valor hora o fraccion es : $<?php echo $row[7] ?>  </div>
    </div>
    
  </main>
  <footer>
    Factura creada como recurso educativo para la IU Digital de Antioquia 2021 
    
  </footer>
  <div>
  
  
  </div>
</body>

</html>