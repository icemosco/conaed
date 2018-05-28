<?php
	
	include_once("../php/config.php");
	include_once("../php/DbConnect.php");
	include_once("../php/Modelo.php");
	include_once("../php/ControllerAsociados.php");


?>
<!doctype html>
<html>
<head>
</head>
<body>

		<div class="add_asociado"><?php echo fnTemplateNuevoAsociado(); ?></div><!--add_asociado-->
		<form class="frm_asociados" name="asociados" id="asociados" action="./home.php" method="post" enctype="multipart/form-data">
			<div class="reel_asociados">
				<ul><?php echo fnTemplateAsociados(); ?></ul>
			</div>
			<button type="button" class="save_btn" id="guardar_asociados_i" onclick="guardarOrdenAsociados()">Guardar</button>
		</form>
</body>
</html>