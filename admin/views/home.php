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
			<!--<a href="javascript:void(0)" class="add_n_slider" title="Agregar un nuevo slider">
				<img src="../img/plus.png" alt="" /></a>-->
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
			.new_programa ul{width:100%; height:auto;display:block;margin-bottom:5%;}
			.new_programa ul li{width:48%; display: inline-block;padding:5px;outline:1px solid red;}
			ul.table_res{width:100%;overflow:hidden;}
			ul.table_res li {width:100%;height: auto;overflow:hidden;}
			ul.table_res li .nom_uni{width:50%;display:inline-block;max-width: 50%; overflow:hidden;}
			ul.table_res a{float:right;font-size:0.7em; font-family: oxygenlight;padding:10px 30px;width:auto: margin-right:5%;display:block;}
			ul.table_res li span{float:left;padding:0 5px;width: auto;}
			ul.table_res li span.nom_uni{float:left;max-width:60%;}
			</style>
			
			<ul class="table_res">
				<li>
					<span class="num_id">1</span>
					<span class="nom_uni">Unviversidad del Valle de mexico</span>
					<a href="javascript:void(0)" class="disable funct">disable</a>
					<a href="javascript:void(0)" class="camb funct">editar</a>
					
				</li>
				<li>
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
				</li>
				<li class="clr2">
					<span class="num_id">1</span>
					<span class="nom_uni">Unviversidad del Valle de mexico</span>
					<a href="javascript:void(0)" class="disable funct">disable</a>
					<a href="javascript:void(0)" class="edit funct">editar</a>
					
				</li>

			</ul>
			
			
			
			
			<button type="submit"  class="save_btn" name="guardar" id="guardar" >Guardar</button>
		</form>
		
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
  <!--<script>
				$('.cambt').click(function(){º
					alert('edit');

				}
			</script>
<script>
	$( function() {
    $( "#datepickerini" ).datepicker();
    $( "#datepickerfin" ).datepicker();
   } );
</script>-->
</body>

</html>
