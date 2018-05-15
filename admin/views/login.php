<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>.:: CMS-CONAED ::.</title>
<link href="../css/main_admin.css" rel="stylesheet" title="stylesheet" type="text/css" />
<meta name="viewport" content="width=device-width, user-scalable=no">
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="author" content="Alejandro Espino, Angélica Pérez Serrano" />
<meta name="robots" content="noindex">
<meta name="googlebot" content="noindex">
<meta name="language" content="ES">
<meta name="distribution" content="Local">
<meta name="country" content="MX">
<style>
</style>
</head>
<body>
<div class="middle_wrapper">
	<div class="login_cont">
		<div class="logo"><img src="../img/logo_conaed.png" /></div>
		<form class="" action="../php/validateLogin.php" method="post">
			<label>Usuario:</label>
			<input type="text" name="usuario" id="usuario" class="" maxlength="10" required />
			<label>Contraseña:</label>
			<input type="password" name="contrasena" id="contrasena" class="" maxlength="8" required />
			<a href="#" title="" class="">Reestablecer Contraseña</a>
			<div class="restablecer">
				<span class="txt"><?=$_REQUEST['msg']?></span>
				<!--<a href="javascript:void(0)" class="env_res">Restablecer</a>-->
				<div class="respuesta_res"></div>
			</div>
			<input type="submit" class="entrar" value="Entrar">
		</form>

	</div>
</div><!--middle_wrapper-->
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/main.js"></script>
</body>

</html>