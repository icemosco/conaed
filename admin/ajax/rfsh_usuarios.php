<?php
	
	include_once("../php/config.php");
	include_once("../php/DbConnect.php");
	include_once("../php/Modelo.php");
	include_once("../php/ControllerUsuarios.php");


	$numPaginaUsuarios = 1;
	if(isset( $_REQUEST['npu']) ){
		$numPaginaUsuario = $_REQUEST['npu'];
	}
	$infoUsus =  fnTemplateUsuarios( $numPaginaUsuarios );

?>
<!doctype html>
<html>
<head>
</head>
<body>

		<div class="add_usuario"><?php echo fnTemplateNuevoUsuario(); ?></div><!--add_usuario-->
		<form class="users_gest" name="usuarios" id="usuarios" action="./home.php" method="post">
			<ul class="table_res"> <?php echo $infoUsus['template']; ?> </ul>
		</form>
		<ul class="paginator"> <?php echo $infoUsus['paginador']; ?> </ul>

</body>
</html>