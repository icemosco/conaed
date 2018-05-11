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
		<h2 class="muestra_msg">Slider Home Page</h2>
		<div class="search">
			<a href="javascript:void(0)" class="add_n_slider" title="Agregar un nuevo slider">
				<img src="../img/plus.png" alt="" /></a>
		</div>
	</div>
	<div class="forms_cont sliders">
		<form class="slider" name="sliders" id="" action="./home.php" method="post" enctype="multipart/form-data">
			
			<?php echo fnTemplateSlide(); ?>
			<button type="submit"  class="save_btn" name="guardar" id="guardar" >Guardar</button>
		</form>
		
	</div><!--forms_cont-->
	<div class="forms_cont programas">
		
			
		<form class="prog" name="programas" id="" action="./home.php" method="post" enctype="multipart/form-data">
			<style>
			.new_programa{width:100%; float:left;overflow:hidden;}
			.new_programa ul{width:100%; height:auto;display:block;}
			.new_programa ul li{width:48%; display: inline-block;padding:5px;outline:1px solid red;}
			</style>
			
			
			<button type="submit"  class="save_btn" name="guardar" id="guardar" >Guardar</button>
		</form>
		<div class="new_programa">
				<ul>
					<li>
						<label>Universidad o Institucion Educativa:</label>
						<input type="text" name="nombre_uni" max-lenght="500" class="" required="required" placeholder="">
					</li>
					<li>
						<label>Página Web:</label>
						<input type="text" name="pagina_web" max-lenght="500" class="" required="required" placeholder="http:// ó https://">
					</li>
				</ul>
				<ul>
					<li>
						<label>Vigencia desde:</label>
						<input type="text" name="vigencia_ini " max-lenght="100" id="datepickerini" required="required" placeholder="">
					</li>
					<li>
						<label>Vigencia hasta:</label>
						<input type="text" name="vigencia_fin " max-lenght="100" id="datepickerfin" required="required" placeholder="">
					</li>
				</ul>

			</div>
			
			
		
	</div><!--forms_cont-->
	<div class="forms_cont evaluadores">
		
			
		<form class="prog" name="programas" id="" action="./home.php" method="post" enctype="multipart/form-data">
			<style>
			.new_programa{width:100%; float:left;overflow:hidden;}
			.new_programa ul{width:100%; height:auto;display:block;}
			.new_programa ul li{width:48%; display: inline-block;padding:5px;outline:1px solid red;}
			</style>
			
			
			<button type="submit"  class="save_btn" name="guardar" id="guardar" >Guardar</button>
		</form>
		<div class="new_programa">
				<ul>
					<li>
						<label>Universidad o Institucion Educativa:</label>
						<input type="text" name="nombre_uni" max-lenght="500" class="" required="required" placeholder="">
					</li>
					<li>
						<label>Página Web:</label>
						<input type="text" name="pagina_web" max-lenght="500" class="" required="required" placeholder="http:// ó https://">
					</li>
				</ul>
				<ul>
					<li>
						<label>Vigencia desde:</label>
						<input type="text" name="vigencia_ini " max-lenght="100" id="datepickerini" required="required" placeholder="">
					</li>
					<li>
						<label>Vigencia hasta:</label>
						<input type="text" name="vigencia_fin " max-lenght="100" id="datepickerfin" required="required" placeholder="">
					</li>
				</ul>

			</div>
			
			
		
	</div><!--forms_cont-->
	
	
	<div class="msg">
		<span>El slider se ha guardado con éxito</span>
	</div>
</div><!--wrapper_right-->

</div><!--main_wrapper-->
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/main.js"></script>
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
	$( function() {
    $( "#datepickerini" ).datepicker();
    $( "#datepickerfin" ).datepicker();
  } );
</script>
</body>

</html>
