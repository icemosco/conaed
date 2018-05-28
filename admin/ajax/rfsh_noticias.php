<?php
	
	include_once("../php/config.php");
	include_once("../php/DbConnect.php");
	include_once("../php/Modelo.php");
include_once("../php/ControllerNoticias.php");


$numPaginaNoticias = 1;
	if(isset( $_REQUEST['np']) ){
		$numPaginaNoticias = $_REQUEST['npn'];
	}
	$infoNotice =  fnTemplateNoticias( $numPaginaNoticias );

?>
<!doctype html>
<html>
<head>
</head>
<body>

		<div class="add_tema oxygenlight">
			<form class="frm_temasynoticias" name="temasynoticias_n" id="temasynoticias_n" action="./home.php" method="post" enctype="multipart/form-data">	
				<?php echo fnTemplateNuevasNoticias();?>
			</form>	
		</div>
		<!---termina add tema-->
		<form class="frm_temasynoticias" name="temasynoticias_1" id="temasynoticias_1" action="./home.php" method="post" enctype="multipart/form-data">
			<ul class="table_res"><?php  echo $infoNotice['template']; ?></ul>
		</form>
		<ul class="paginator"> <?php echo $infoNotice['paginador']; ?> </ul>
	


	
</body>
</html>