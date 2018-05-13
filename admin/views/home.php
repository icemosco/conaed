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
	
	//======================= EVALUADORES
	$numPaginaEvaluadores = 1;
	if(isset( $_REQUEST['npe']) ){
		$numPaginaEvaluadores = $_REQUEST['npe'];
	}
	
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
		
	</div><!--forms_cont-->
	<div class="forms_cont programas" style="display:none;">
		<div class="add_programa oxygenlight">
			<ul>
				<li>
					<label>Universidad o Institución Educativa:</label>
					<input type="text" name="" id="" max-lenght="500" value="" class="requerido" placeholder="">
									</li>
									<li>
										<label>Página Web:</label>
										<input type="text" name="pagina_web[]" id="pagina_web_4" max-lenght="500" value="www.pjedomex.gob.mx/ejem/" class="requerido" placeholder="http:// ó https://">
									</li>
								</ul>
								<ul>
									<li>
										<label>Vigencia desde:</label>
										<input type="text" name="datepickerinit[]" max-lenght="25" readonly="" value="" id="datepickerinit_4" class="datepickerinit hasDatepicker" placeholder="">
									</li>
									<li>
										<label>Vigencia hasta:</label>
										<input type="text" name="datepickerfinit[]" max-lenght="25" readonly="" value="" id="datepickerfinit_4" class="datepickerfinit hasDatepicker" placeholder="">
									</li>
								</ul>
								<button type="button" class="save_btn" id="guardar_acreditados_4" onclick="guardarAcreditados(this, 4);">Guardar</button>
							</div>
			
		<form class="prog" name="programas" id="" action="./home.php" method="post" enctype="multipart/form-data">
			<style>
		
		

		/*ul.table_res{width:100%;overflow:hidden;}
			ul.table_res li {height: auto;overflow:hidden;}
			ul.table_res li .nom_uni{width:50%;display:inline-block;max-width: 50%; overflow:hidden;}
			ul.table_res a{float:right;font-size:0.7em; font-family: oxygenlight;padding:10px 30px;width:auto: margin-right:5%;display:block;}
			ul.table_res li span{float:left;padding:0 5px;width: auto;}
			ul.table_res li span.nom_uni{float:left;max-width:60%;}*/
			</style>
			
			<ul class="table_res">
				<?php 
					$infoAcreditados =  fnTemplateAcreditados( $numPaginaAcreditados );
					echo $infoAcreditados['template']; 
				?>
			</ul>

			<button type="submit"  class="save_btn" name="guardar_acreditados" id="guardar_acreditados" >Guardar</button>
		</form>
		<ul calss="paginator">
			<?php 
				for($i = 1; $infoAcreditados['totalPagina'] >= $i; $i++){
					echo '<li><a href="./home.php?npa='.$i.'" class="number_link">'.$i .'</a></li>';
				}
			?>
		</ul>
	</div><!--forms_cont-->
	<div class="forms_cont evaluadores">
		
			
		<form class="prog" name="evaluadores" id="" action="./home.php" method="post" enctype="multipart/form-data">
			<style>
			
			
			</style>
			
			<ul class="table_res">
				<?php 
					$infoEvaluadores =  fnTemplateEvaluadores( $numPaginaEvaluadores );
					echo $infoEvaluadores['template']; 
				?>
			</ul>

			<button type="submit"  class="save_btn" name="guardar_evaluadores" id="guardar_evaluadores" >Guardar</button>
		</form>
		<ul calss="paginator">
			<?php 
				for($i = 1; $infoEvaluadores['totalPagina'] >= $i; $i++){
					echo '<li><a href="./home.php?npe='.$i.'" class="number_link">'.$i .'</a></li>';
				}
			?>
		</ul>
		
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
