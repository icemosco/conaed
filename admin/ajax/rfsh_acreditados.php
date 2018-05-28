<?php
	
	include_once("../php/config.php");
	include_once("../php/DbConnect.php");
	include_once("../php/Modelo.php");
	include_once("../php/ControllerAcreditados.php");


$numPaginaAcreditados = 1;
	if(isset( $_REQUEST['npa']) ){
		$numPaginaAcreditados = $_REQUEST['npa'];
	}
	$infoAcre =  fnTemplateAcreditados( $numPaginaAcreditados );

?>
<!doctype html>
<html>
<head>
</head>
<body>

		<div class="add_programa oxygenlight"><? echo fnTemplateNuevoAcreditado(); ?></div>
		<form class="prog" name="acreditados" id="acreditados" action="./home.php" method="post">
			<ul class="table_res"><?php echo $infoAcre['template']; ?></ul>
		</form>
		<ul class="paginator"> <?php  echo $infoAcre['paginador'];  ?> </ul>
	


	
</body>
</html>