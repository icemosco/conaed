<?php
	
	include_once("../php/config.php");
	include_once("../php/DbConnect.php");
	include_once("../php/Modelo.php");
	include_once("../php/ControllerEvaluadores.php");


$numPaginaEvaluadores = 1;
	if(isset( $_REQUEST['npe']) ){
		$numPaginaEvaluadores = $_REQUEST['npe'];
	}
	$infoEval =  fnTemplateEvaluadores( $numPaginaEvaluadores );
?>
<!doctype html>
<html>
<head>
</head>
<body>

		<div class="add_evaluador"><?php echo fnTemplateNuevoEvaluadores(); ?></div>
		<form class="prog" name="evaluadores" id="evaluadores" action="./home.php" method="post" >
			<ul class="table_res"><?php  echo $infoEval['template']; ?></ul>
		</form>
		<ul class="paginator"> <?php echo $infoEval['paginador']; ?> </ul>

</body>
</html>