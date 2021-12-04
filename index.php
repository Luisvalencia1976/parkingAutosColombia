<?php
require_once('mysql.php');

session_start();

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

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>Autos Colombia Demo - Bootstrap 5 Admin Template</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
					<span class="align-middle">Autos Colombia</span>
					<img src="img\avatars\autologo.png" alt="XXX" class="img-fluid rounded-circle" width="132" height="132" />
				</a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Pages
					</li>

					<li class="sidebar-item active">
						<a class="sidebar-link" href="index.html">
							<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
						</a>
					</li>


					<!-- <li class="sidebar-item">
						<a class="sidebar-link" href="pages-profile.html">
							<i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
						</a>
					</li> -->

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-sign-in.php">
							<i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Sign In</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-sign-up.php">
							<i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Sign
								Up</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-busqueda.html">
							<i class="align-middle" data-feather="search"></i> <span class="align-middle">Buscar</span>
						</a>
					</li>

				</ul>

				<div class="sidebar-cta">
					<div class="sidebar-cta-content">
						<strong class="d-inline-block mb-2"></strong>


					</div>
				</div>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
					<i class="hamburger align-self-center"></i>
				</a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">

						<?php
						if (isset($_SESSION['user_email'])) {
						?>
							<li class="nav-item dropdown">
								<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
									<i class="align-middle" data-feather="settings"></i>
								</a>

								<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
									<img src="img\avatars\avatar.png" class="avatar img-fluid rounded me-1" alt="<IUDigital" /> <span class="text-dark">Bienvenido!Tu sesion esta activa</span>
								</a>


								<div class="dropdown-menu dropdown-menu-end">
									<a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
									<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="index.html"><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a>
									<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="singout.php">Log out</a>
								</div>
							</li>
						<?php

						} else {
						?>
							<li class="nav-item dropdown me-2">
								<a href="pages-sign-in.php" class="list-group-item">Inicio Sesion</a>
							</li>

							<li class="nav-item dropdown">
								<a href="pages-sign-up.php" class="list-group-item">Registro</a>
							</li>
						<?php
						}

						?>




					</ul>




				</div>
			</nav>

			<main class="content">


				<div class="album py-5 bg-light">
					<div class="container">

						<div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-3">

							<?php


							// $sql = "SELECT * FROM productos";
							// $stmt = $conn->prepare($sql);
							// $stmt->execute();
							// $results = $stmt->get_result();
							// //$row = $results->fetch_assoc();


							// foreach ($results->fetch_row() as $row) {
							//   echo $row;
							// }
							if (isset($_SESSION['user_email'])) {



								$sql = "SELECT * FROM celdas";
								$stmt = $conn->prepare($sql);
								$stmt->execute();
								$result = $stmt->get_result();
								while ($row = $result->fetch_assoc()) {

									echo   '<div class="col">';
									echo    '<div class="card shadow-sm">';
									echo           '<h3>' . $row['tipovehiculo'] . '</h3>';
									if ($row['estado'] == 0) {
										echo     '<img src="https://firebasestorage.googleapis.com/v0/b/datos-ceb65.appspot.com/o/New%20Project%20(6).png?alt=media&token=8e603bf2-0532-4bb8-8b6b-8cb7978b20c3" class="rounded float-start" alt="...">';
										echo     ' <div class="card-body">';
										echo       '<div class="d-flex justify-content-between align-items-center">';
										echo         '<div class="btn-group">';
										echo 			'<a class="btn btn-primary me-2" href="pages-registro-celda.php?id=' . $row['id'] . '">Asignar </a>';


										echo          '<h6>CELDA#' . $row['id'] . '</h6>';
										echo       '</div>';
										echo        '<small class="text-muted"></small>';
										echo      '</div>';
										echo     '</div>';
										echo   '</div>';
										echo '</div>';
									} else {
										echo     '<img src="https://firebasestorage.googleapis.com/v0/b/datos-ceb65.appspot.com/o/WhatsApp%20Image%202021-11-07%20at%208.58.40%20AM.jpeg?alt=media&token=958d436d-a97a-4a7a-9464-6baddbffe305" class="rounded float-start" alt="...">';
										echo     ' <div class="card-body">';
										echo       '<div class="d-flex justify-content-between align-items-center">';
										echo         '<div class="btn-group">';
										echo 			'<a class="btn btn-success me-2" href="pages-factura.php?id=' . $row['id'] . '">Factutar</a>';


										echo          '<h6>CELDA#' . $row['id'] . '</h6>';
										echo       '</div>';
										echo        '<small class="text-muted"></small>';
										echo      '</div>';
										echo     '</div>';
										echo   '</div>';
										echo '</div>';
									}
								}
							} else {
								echo '<div class="col-xl-6 col-xxl-5 d-flex">';
								echo '<div class="container-fluid p-0">';
								echo '<h1 class="h3 mb-3"><strong>Autos Colombia Sede: </strong> Medellín</h1>';

								echo	'<a class="sidebar-brand" href="index.html">';
								echo '<span class="align-middle">Autos Colombia</span>';
								echo '<img src="img\avatars\autologo.png" alt="XXX" class="img-fluid rounded-circle" width="13200" height="13200" />';
								echo '</a>';
								echo '<h1 class="h3 mb-3"><strong>Ingresa tus credenciales para acceder a las funciones</strong></h1>';
								echo '<h4>Aplicacion con fines educativos creada por :</h4>';
								echo '<h4>Luis Valencia </h4>';
								echo '<h4>Paola Gallego</h4>';
								echo '<h4>Kevin Cadavid </h4>';
								echo '<h4>Damián Perez</h4>';
								echo '<h4>Jhon Valencia</h4>';


								echo '</div>';
								echo '</div>';
							}




							?>




						</div>
					</div>
				</div>


				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Autos Colombia Sede: </strong> Medellin</h1>


					<div class="row">
						<div class="col-xl-6 col-xxl-5 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-6">


									</div>
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Medellín</h5>
														<!-- clock widget start -->
														<script type="text/javascript">
															var css_file = document.createElement("link");
															css_file.setAttribute("rel", "stylesheet");
															css_file.setAttribute("type", "text/css");
															css_file.setAttribute("href", "https://s.bookcdn.com//css/cl/bw-cl-c22.css?v=0.0.1");
															document.getElementsByTagName("head")[0].appendChild(css_file);
														</script>
														<div id="tw_22_272007161">
															<div style="width:200px; height:px; margin: 0 auto;"><a href="https://hotelmix.es/time/medellin-19102">Medellín</a><br /></div>
														</div>
														<script type="text/javascript">
															function setWidgetData_272007161(data) {
																if (typeof(data) != 'undefined' && data.results.length > 0) {
																	for (var i = 0; i < data.results.length; ++i) {
																		var objMainBlock = '';
																		var params = data.results[i];
																		objMainBlock = document.getElementById('tw_' + params.widget_type + '_' + params.widget_id);
																		if (objMainBlock !== null) objMainBlock.innerHTML = params.html_code;
																	}
																}
															}
															var clock_timer_272007161 = -1;
															widgetSrc = "https://widgets.booked.net/time/info?ver=2;domid=582;type=22;id=272007161;scode=2;city_id=19102;wlangid=4;mode=1;details=0;background=ffffff;border_color=ffffff;color=686868;add_background=ffffff;add_color=333333;head_color=ffffff;border=0;transparent=0";
															var widgetUrl = location.href;
															widgetSrc += '&ref=' + widgetUrl;
															var wstrackId = "";
															if (wstrackId) {
																widgetSrc += ';wstrackId=' + wstrackId + ';'
															}
															var timeBookedScript = document.createElement("script");
															timeBookedScript.setAttribute("type", "text/javascript");
															timeBookedScript.src = widgetSrc;
															document.body.appendChild(timeBookedScript);
														</script>
														<!-- clock widget end -->

													</div>


												</div>

												<div class="mb-0">


												</div>
											</div>
										</div>
										<div class="card">

										</div>
									</div>
								</div>
							</div>
						</div>


					</div>



				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>IUDigital2021</strong></a> &copy;
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Soporte</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Centro de Ayudas</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Seguridad</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Terminos</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="js/app.js"></script>

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
			gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
			// Line chart
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: "line",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Sales ($)",
						fill: true,
						backgroundColor: gradient,
						borderColor: window.theme.primary,
						data: [
							2115,
							1562,
							1584,
							1892,
							1587,
							1923,
							2566,
							2448,
							2805,
							3438,
							2917,
							3327
						]
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 1000
							},
							display: true,
							borderDash: [3, 3],
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Pie chart
			new Chart(document.getElementById("chartjs-dashboard-pie"), {
				type: "pie",
				data: {
					labels: ["Chrome", "Firefox", "IE"],
					datasets: [{
						data: [4306, 3801, 1689],
						backgroundColor: [
							window.theme.primary,
							window.theme.warning,
							window.theme.danger
						],
						borderWidth: 5
					}]
				},
				options: {
					responsive: !window.MSInputMethodContext,
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					cutoutPercentage: 75
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar"), {
				type: "bar",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "This year",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
						barPercentage: .75,
						categoryPercentage: .5
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							}
						}],
						xAxes: [{
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var markers = [{
					coords: [31.230391, 121.473701],
					name: "Shanghai"
				},
				{
					coords: [28.704060, 77.102493],
					name: "Delhi"
				},
				{
					coords: [6.524379, 3.379206],
					name: "Lagos"
				},
				{
					coords: [35.689487, 139.691711],
					name: "Tokyo"
				},
				{
					coords: [23.129110, 113.264381],
					name: "Guangzhou"
				},
				{
					coords: [40.7127837, -74.0059413],
					name: "New York"
				},
				{
					coords: [34.052235, -118.243683],
					name: "Los Angeles"
				},
				{
					coords: [41.878113, -87.629799],
					name: "Chicago"
				},
				{
					coords: [51.507351, -0.127758],
					name: "London"
				},
				{
					coords: [40.416775, -3.703790],
					name: "Madrid "
				}
			];
			var map = new jsVectorMap({
				map: "world",
				selector: "#world_map",
				zoomButtons: true,
				markers: markers,
				markerStyle: {
					initial: {
						r: 9,
						strokeWidth: 7,
						stokeOpacity: .4,
						fill: window.theme.primary
					},
					hover: {
						fill: window.theme.primary,
						stroke: window.theme.primary
					}
				},
				zoomOnScroll: false
			});
			window.addEventListener("resize", () => {
				map.updateSize();
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
			var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
			document.getElementById("datetimepicker-dashboard").flatpickr({
				inline: true,
				prevArrow: "<span title=\"Previous month\">&laquo;</span>",
				nextArrow: "<span title=\"Next month\">&raquo;</span>",
				defaultDate: defaultDate
			});
		});
	</script>

</body>

</html>