<?php 
	session_start();
	include_once("../php/config.php");
	include_once("../php/DbConnect.php");
	include_once("../php/validaSession.php");
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<title>.:: CMS-CONAED ::.</title>
	<link href="../css/main_admin.css" rel="stylesheet" title="stylesheet" type="text/css" />
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="author" content="Alejandro Espino, Angélica Pérez Serrano" />
	<meta name="robots" content="noindex">
	<meta name="googlebot" content="noindex">
	<meta name="language" content="ES">
	<meta name="distribution" content="Local">
	<meta name="country" content="MX">
</head>
<body>
	<header>
			<div class="logo"><img src="../img/logo_conaed.png" /></div>
			<span>Consejo para la Acreditación de la Enseñanza de Derecho, A.C.</span>
			<a href="../php/cerrar_sesion.php" class="close_s">Cerrar Sesión</a>
	</header>
<div class="main_wrapper">
	<div class="menu_cont">
		<div class="cont_img">
			<span class="image">
					<img src="../img/pic.png" alt="">
			</span>
			<a href="javascript:void(0)" class="edit">
					<img src="../img/edit.png" alt="">
			</a>
			<span class="n_usuario">Marco Picil</span>
		</div>
		
		<?php include('./menu.php') ?>
		
	</div><!--cont_menu-->