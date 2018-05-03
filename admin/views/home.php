<?php 
	include_once('./header.php'); 
	
	echo "<pre>";
	print_r($_POST);
	print_r($_FILES);
	echo "</pre>";
	
	if(isset($_POST['guardar'])){
		$numSlider = $_POST['num_slider'];
		$titulo    = $_POST['titulo'];
		$subTitulo = $_POST['subtitulo'];
		$idSlide   = $_POST['idSlide'];
		$imgSlide  = $_FILES['imagenSlider'];
		
		foreach( $idSlide as $key => $info){
			//Si el idSlide no tiene valor significa que no existe  registro

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
			<div class="slider_fill">
				<span class="title_sl">Slider 1</span>
				
				<div class="left mr">
					<span class="indications">Imágen .jpg ó .png</span>
					<input type="text" name="num_slider[]" id="num_slider"  size="2" style="width: 5%"/> 
					<div class="img_loaded"><img src="../../img/slider/img_1.png" /></div>
					<div class="path">ruta del archivo</div>
					<div class="cont_r">
						<input type="file" name="imagenSlider[]" id="imagenSlider" class="file_upload" name="file" />
						<a href="javascript:void(0)" class="btn_cargar">Cargar</a>
					</div><!--cont_r-->
				</div><!--left-->
				
				<div class="right">
					<div class="sub_text_cont">
						<span class="">Titulo (100 caracteres máx)</span>
						<span class="conteo_char">0 caracteres</span>
						<textarea name="titulo[]" id="titulo" class="infoSlide" maxlength="100" required></textarea>
					</div>

					<div class="sub_text_cont">
						<span class="">Subtitulo (225 caracteres máx)</span>
						<span class="conteo_char">0 caracteres</span>
						<textarea name="subtitulo[]" id="subtitulo" class="infoSlide" maxlength="225" required></textarea>
					</div>
				</div>
				<input type="hidden" name="idSlide[]" id="idSlide"  value=""/> 	
			</div><!--slider_fill-->
		</form>
	</div><!--forms_cont-->
</div><!--wrapper_right-->

</div><!--main_wrapper-->
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/main.js"></script>
<script>


</script>
</body>

</html>