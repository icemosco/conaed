<?php 
	include_once('./header.php'); 
	include_once("../php/ControllerSlider.php");
	include_once("../php/ControllerAcreditados.php");
	include_once("../php/ControllerEvaluadores.php");

	//======================= SLIDER
	//Guardado / Edicion
	if(isset($_POST['guardar_slider'])){
		$idSlide   = $_POST['idSlide'];
		$msgErr    = '';
		
		foreach( $idSlide as $key => $info){
			$msgErr .= fnGuardarSlide( $key, $idSlide[ $key ]
								, $_POST['titulo'][ $key ]
								, $_POST['subtitulo'][ $key ]
								, $_POST['num_slider'][ $key ]
								, $folderSlider
								, $_FILES['imagenSlider'] );
		}		
	}

	//======================= ACREDITADOS
	$numPaginaAcreditados = 1;
	if(isset( $_REQUEST['npa']) ){
		$numPaginaAcreditados = $_REQUEST['npa'];
	}
	$infoAcre =  fnTemplateAcreditados( $numPaginaAcreditados );
	
	//======================= EVALUADORES
	$numPaginaEvaluadores = 1;
	if(isset( $_REQUEST['npe']) ){
		$numPaginaEvaluadores = $_REQUEST['npe'];
	}
	$infoEval =  fnTemplateEvaluadores( $numPaginaEvaluadores );
	
?>

<div class="wrapper_right">
	<div class="header_int">
		<h2 class="muestra_msg">Slider Home Page</h2>
		<div class="search">
			<!--<a href="javascript:void(0)" class="add_n_slider" title="Agregar un nuevo slider">
				<img src="../img/plus.png" alt="" /></a>-->
		</div>
	</div>
	<div class="forms_cont sliders">
		<form class="slider" name="sliders" id="sliders" action="./home.php" method="post" enctype="multipart/form-data">
			
			<?php echo fnTemplateSlide(); ?>
			<button type="submit"  class="save_btn" name="guardar_slider" id="guardar_slider" >Guardar</button>
		</form>
		
	</div><!--forms_cont. SLIDE-->
	<div class="forms_cont programas" style="display:none;">
		<div class="add_programa oxygenlight">
			<ul>
				<li>
					<label>Universidad o Institución Educativa:</label>
					<input type="text" name="nombre_uni[]" id="nombre_uni_" max-lenght="500" value="" class="requerido" placeholder="">
				</li>
				<li>
					<label>Página Web:</label>
					<input type="text" name="pagina_web[]" id="pagina_web_" max-lenght="500" value="www.pjedomex.gob.mx/ejem/" class="requerido" placeholder="http:// ó https://">
				</li>
			</ul>
			<ul>
				<li>
					<label>Vigencia desde:</label>
					<input type="text" name="datepickerinit[]" max-lenght="25"  id="datepickerinit" class="datepickerfinit hasDatepicker" placeholder="">
				</li>
				<li>
					<label>Vigencia hasta:</label>
					<input type="text" name="datepickerfinit[]" max-lenght="25"  id="datepickerfinit" class="datepickerfinit hasDatepicker" placeholder="">
					</li>
			</ul>
			<button type="button" class="save_btn" id="guardar_acreditados_" >Guardar</button>
		</div>
			
		<form class="prog" name="acreditados" id="" action="./home.php" method="post">
			<ul class="table_res">
				<?php echo $infoAcre['template']; ?>
			</ul>
		</form>
		<ul class="paginator"> <?php  echo $infoAcre['paginador'];  ?> </ul>
	</div><!--forms_cont ACREDITADOS-->
	<div class="forms_cont evaluadores">
		
			
		<form class="prog" name="evaluadores" id="" action="./home.php" method="post" >
			
			<ul class="table_res">
				<?php  echo $infoEval['template']; ?>
			</ul>

			<button type="submit"  class="save_btn" name="guardar_evaluadores" id="guardar_evaluadores" >Guardar</button>
		</form>
		<ul class="paginator"> <?php echo $infoEval['paginador']; ?> </ul>
		
	</div><!--forms_cont-->
	
	

	
	<div class="msg">
	</div>
</div><!--wrapper_right-->

</div><!--main_wrapper-->
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/main.js"></script>
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</body>

</html>
