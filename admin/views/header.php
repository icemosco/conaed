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
			<div class="logo"><img src="../img/logo_conaed.png" width="100%" height="100%"/></div>
			<span>Consejo para la Acreditación de la Enseñanza de Derecho, A.C.</span>
			<a href="../php/cerrar_sesion.php" class="close_s">Cerrar Sesión</a>
			<link rel="Stylesheet" type="text/css" href="../plugins/croppie/prism.css">
			<link rel="Stylesheet" type="text/css" href="../plugins/croppie/croppie.css">
			<link rel="Stylesheet" type="text/css" href="../plugins/croppie/imagenPerfil.css">
	</header>
<div class="main_wrapper">
	<div class="menu_cont">
		<div class="cont_img">
			<div class="demo-wrap upload-demo">
                <div class="container_demo">
                    <div class="grid">
                        <div class="actions">
                            <a class="btn file-btn">
                                <span>Upload</span>
                                <input type="file" id="img_usr" value="Choose a file" accept="image/*" />
                            </a>
                            <button class="upload-result">Result</button>
                        </div>
                        <div class="upload-msg">
                            <img id="perfil_usuario" src="../img/users/<?php echo $_SESSION['imgPerfil']; ?>" width="100%" height="100%"/>
                        </div>
                        <div class="upload-demo-wrap">
                            <div id="upload-demo"></div>
                        </div>
                    </div>
                </div>
             </div>
			<span class="n_usuario" style="font-size:10px"><?php echo $_SESSION['nombreCompleto']; ?></span>
           	
                



		</div>
		
		<?php include('./menu.php') ?>
		
	</div><!--cont_menu-->