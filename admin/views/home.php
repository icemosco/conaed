<?php 
	include_once('./header.php'); 
	include_once("../php/ControllerSlider.php");

	//Guardado / Edicion
	if(isset($_POST['guardar'])){
		$idSlide   = $_POST['idSlide'];
		foreach( $idSlide as $key => $info){
			$msgErr = fnGuardarSlide( $key, $idSlide[ $key ]
								, $_POST['titulo'][ $key ]
								, $_POST['subtitulo'][ $key ]
								, $_POST['num_slider'][ $key ]
								, $folderSlider
								, $_FILES['imagenSlider'] );
		}		
	}
	
?>

<div class="wrapper_right">
	<div class="header_int">
		<h2>Slider Home Page</h2>
		<div class="search">
			<a href="javascript:void(0)" class="add_n_slider" title="Agregar un nuevo slider"><img src="../img/plus.png" alt="" /></a>
		</div>
	</div>
	<div class="forms_cont">
		<form class="slider" name="sliders" id="" action="./home.php" method="post" enctype="multipart/form-data">
			<button type="submit" name="guardar" id="guardar" >Guardar</button>
			<?php echo fnTemplateSlide(); ?>
		</form>
	</div><!--forms_cont-->
	<style>
		.save_slider{width:100%; padding:5px 0;}
		.save_slider {}
	</style>
	<div class="save_slider">
		
	</div>
</div><!--wrapper_right-->

</div><!--main_wrapper-->
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/main.js"></script>
<script src="../js/jquery-validate.min.js"></script>
<script>
	
</script>
</body>

</html>
