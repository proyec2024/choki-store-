<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="favicon2.jpg">

	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap4" />

	<!-- Bootstrap CSS -->
	<link href="<?php echo RUTA_PRINCIAL; ?>css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
	<link href="<?php echo RUTA_PRINCIAL; ?>css/tiny-slider.css" rel="stylesheet">
	<link href="<?php echo RUTA_PRINCIAL; ?>css/card.css" rel="stylesheet">
	<link href="<?php echo RUTA_PRINCIAL; ?>css/style.css" rel="stylesheet">
	<title>Choki Shop</title>
</head>

<body>

	<!-- Start Header/Navigation -->
	<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

		<div class="container">
			<a class="navbar-brand" href="<?php echo RUTA_PRINCIAL; ?>?pages=home">Choki store<span></span></a>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarsFurni">
				<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
					<li class="nav-item ">
					</li>
					<?php if (isset($_GET['pages']) && $_GET['pages'] == 'home') { ?>
						<li class="active"><a class="nav-link" href="<?php echo RUTA_PRINCIAL; ?>?pages=home"><i class="fa-solid fa-store"></i> TIENDA</a></li>
						<li><a class="nav-link" href="<?php echo RUTA_PRINCIAL; ?>?pages=card"><i class="fa-solid fa-cart-shopping"></i> Carrito de compras</a></li>
						<?php
						if (isset($_SESSION['nombre'])) {
						?>
							<li><a class="nav-link" href="<?php echo RUTA_PRINCIAL; ?>?pages=compras"><i class="fa-solid fa-tag"></i> Mis compras</a></li>
						<?php
						}

						?>
					<?php } else if (isset($_GET['pages']) && $_GET['pages'] == 'card') { ?>
						<li><a class="nav-link" href="<?php echo RUTA_PRINCIAL; ?>?pages=home"><i class="fa-solid fa-store"></i> TIENDA</a></li>
						<li class="active"><a class="nav-link" href="<?php echo RUTA_PRINCIAL; ?>?pages=card"><i class="fa-solid fa-cart-shopping"></i> Carrito de compras</a></li>


					<?php } else if (isset($_GET['pages']) && $_GET['pages'] == 'compras') { ?>
						<li><a class="nav-link" href="<?php echo RUTA_PRINCIAL; ?>?pages=home"><i class="fa-solid fa-store"></i> TIENDA</a></li>
						<li><a class="nav-link" href="<?php echo RUTA_PRINCIAL; ?>?pages=card"><i class="fa-solid fa-cart-shopping"></i> Carrito de compras</a></li>
						<?php
						if (isset($_SESSION['nombre'])) {
						?>
							<li class="active"><a class="nav-link" href="<?php echo RUTA_PRINCIAL; ?>?pages=compras"><i class="fa-solid fa-tag"></i> Mis compras</a></li>
						<?php
						}

						?>
					<?php } else { ?>
						<li><a class="nav-link" href="<?php echo RUTA_PRINCIAL; ?>?pages=home"><i class="fa-solid fa-store"></i> TIENDA</a></li>
						<li><a class="nav-link" href="<?php echo RUTA_PRINCIAL; ?>?pages=card"><i class="fa-solid fa-cart-shopping"></i> Carrito de compras</a></li>
						<?php
						if (isset($_SESSION['nombre'])) {
						?>
						<li><a class="nav-link" href="<?php echo RUTA_PRINCIAL; ?>?pages=compras"><i class="fa-solid fa-tag"></i> Mis compras</a></li>
						<?php
						}
						?>
						
					<?php } ?>
				</ul>

				<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">

					<?php
					if (isset($_SESSION['nombre'])) {
					?>
						<li><a class="btn btn-secondary" href="<?php echo RUTA_PRINCIAL; ?>?pages=Logout"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesion</a></li>
					<?php
					} else {

					?>
						<li><a class="btn btn-secondary" href="<?php echo RUTA_PRINCIAL; ?>?pages=login">Iniciar sesion <i class="fa-solid fa-right-to-bracket"></i></a></li>
					<?php
					}
					?>

				</ul>
			</div>
		</div>

	</nav>