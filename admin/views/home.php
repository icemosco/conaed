<?php
include_once('./header.php'); 
	include_once("../php/ControllerSlider.php");
	include_once("../php/ControllerAcreditados.php");
	include_once("../php/ControllerEvaluadores.php");
	include_once("../php/ControllerUsuarios.php");

	//======================= SLIDER
	//Guardado / Edicion
	if(isset($_POST['guardar_slider'])){
		$idSlide   = $_POST['idSlide'];
		$msgErr    = '';
		$mostrarMsgSlider = '';		
		
		foreach( $idSlide as $key => $info){
			$msgErr .= fnGuardarSlide( $key, $idSlide[ $key ]
								, $_POST['titulo'][ $key ]
								, $_POST['subtitulo'][ $key ]
								, $_POST['num_slider'][ $key ]
								, $folderSlider
								, $_FILES['imagenSlider'] );
		}
		if(empty($msgErr))
			$mostrarMsgSlider = 'Se ha guardado la información';		
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

	//======================= USUARIOS
	$numPaginaUsuarios = 1;
	if(isset( $_REQUEST['npu']) ){
		$numPaginaUsuario = $_REQUEST['npu'];
	}
	$infoUsus =  fnTemplateUsuarios( $numPaginaUsuarios );
	
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




	<div class="forms_cont programas">
		<div class="add_programa oxygenlight"><? echo fnTemplateNuevoAcreditado(); ?></div>
		<form class="prog" name="acreditados" id="acreditados" action="./home.php" method="post">
			<ul class="table_res"><?php echo $infoAcre['template']; ?></ul>
		</form>
		<ul class="paginator"> <?php  echo $infoAcre['paginador'];  ?> </ul>
	</div><!--forms_cont PROGRAMAS-->





	<div class="forms_cont evaluadores">
		<div class="add_evaluador"><?php echo fnTemplateNuevoEvaluadores(); ?></div>
		<form class="prog" name="evaluadores" id="evaluadores" action="./home.php" method="post" >
			<ul class="table_res"><?php  echo $infoEval['template']; ?></ul>
		</form>
		<ul class="paginator"> <?php echo $infoEval['paginador']; ?> </ul>
		
	</div><!--forms_cont-->




	<div class="forms_cont usuarios oxygenlight">
		<div class="add_usuario"><?php echo fnTemplateNuevoUsuario(); ?></div><!--add_usuario-->
		<form class="users_gest" name="usuarios" id="usuarios" action="./home.php" method="post">
			<ul class="table_res"> <?php echo $infoUsus['template']; ?> </ul>
		</form>
		<ul class="paginator"> <?php //echo $infoUsus['paginador']; ?> </ul>
	</div><!--forms_cont-->


	<div class="forms_cont asociados oxygenlight">
		<div class="add_asociado">

			<div class="asociado_fill">
				<div class="left mr">
					<span class="indications">Imágen .jpg ó .png</span>
					<input type="text" class="order_box_s requerido" name="" id=""  size="2" maxlength="1" value="" style="width: 5%"/> 
					<div class="img_loaded"><img src="" /></div>
					<div class="path">ruta del archivo</div>
					<div class="cont_r">
						<input type="hidden" name="" value=""/>
						<input type="file" name="" class="file_upload_1 " name="file" />
						<a href="javascript:void(0)" class="btn_cargar">Cargar</a>
					</div><!--cont_r-->
			</div><!--left-->
				
				
				<input type="hidden" name="" value=""/>
			</div><!--asociado_fill-->
		</div><!--add_asociado-->
		
		<form class="frm_asociados" name="asociados" id="asociados" action="./home.php" method="post" enctype="multipart/form-data">
			<div class="reel_asociados">
				<ul>
					<li>
					  <span class="img_asoc"><img src="../img/pic.png" /></span>
					  <span class="cont_ord"><input type="text" name="order_asoc" class="asoc" maxlength="1" >
					</li>
					<li>
					  <span class="img_asoc"><img src="../img/pic.png" /></span>
					  <span class="cont_ord"><input type="text" name="order_asoc" class="asoc" maxlength="1" >
					</li>
					<li>
					  <span class="img_asoc"><img src="../img/pic.png" /></span>
					  <span class="cont_ord"><input type="text" name="order_asoc" class="asoc" maxlength="1" >
					</li>
					<li>
					  <span class="img_asoc"><img src="../img/pic.png" /></span>
					  <span class="cont_ord"><input type="text" name="order_asoc" class="asoc" maxlength="1" style="">
					</li>
					

				</ul>
			</div>

		</form>


	</div><!--form_cont-asociados-->

	<div class="forms_cont temasynoticias oxygenlight">
		<div class="add_tema">
			<div class="temas_fill">
				<div class="left mr">
					<span class="indications">Imágen .jpg ó .png</span>
					<div class="img_loaded" style="margin-top:0;" ><img src="../../img/noticias/"/></div>
					<div class="path">ruta del archivo</div>
					<div class="cont_r">
						<input type="hidden" name="" value=""/>
						<input type="file" name="" class="file_upload_2" name="file" />
						<a href="javascript:void(0)" class="btn_cargar">Cargar</a>
					</div><!--cont_r-->
				</div><!--left-->
				
				<div class="right">
					<div class="sub_text_cont">
						<textarea name="titulo_tema" class="infoSlide requeridoSlider"  maxlength="200" placeholder="Titulo del Tema" ></textarea>
					</div>
					
					<div class="sub_text_cont">
						<textarea name="contenido_tema" class="infoSlide requeridoSlider" maxlength="" placeholder="Nota completa del Tema"></textarea>
					</div>
					
				</div>
				<input type="hidden" name="" value=""/> 	
			</div><!--tema_fill-->
		</div>
		<!---termina add tema-->
		<form class="frm_temasynoticias" name="temasynoticias" id="temasynoticias" action="./home.php" method="post" enctype="multipart/form-data">
			<div class="temas_fill">
				<div class="left mr">
					<span class="indications">Imágen .jpg ó .png</span>
					<div class="img_loaded" style="margin-top:0;" ><img src="../../img/noticias/"/></div>
					<div class="path">ruta del archivo</div>
					<div class="cont_r">
						<input type="hidden" name="" value=""/>
						<input type="file" name="" class="file_upload_2" name="file" />
						<a href="javascript:void(0)" class="btn_cargar">Cargar</a>
					</div><!--cont_r-->
				</div><!--left-->
				
				<div class="right">
					<div class="sub_text_cont">
						<textarea name="titulo_tema" class="infoSlide requeridoSlider"  maxlength="200" placeholder="Titulo del Tema" ></textarea>
					</div>
					
					<div class="sub_text_cont">
						<textarea name="contenido_tema" class="infoSlide requeridoSlider" maxlength="" placeholder="Nota completa del Tema"></textarea>
					</div>
					
					
				</div><!--right-->
				<input type="hidden" name="" value=""/> 	
			</div><!--tema_fill-->

		</form>
	</div>
	

	
	
</div><!--wrapper_right-->

</div><!--main_wrapper-->
<div class="msg"><span>kjshdvkj bdsvkjb </span></div>
<script src="../js/jquery-3.3.1.min.js"></script>
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.2.0/zxcvbn.js"></script>

 <script src="../plugins/croppie/prism.js"></script>
 <script src="../plugins/croppie/croppie.js"></script>
 <script src="../plugins/croppie/img_perfil.js"></script>

 <script src="../js/main.js"></script>
 <script>
	 $(document).ready(function(){
		 
		function showMessages( msg ){
			
			$(".msg").html(msg); 
			
			/*$('.msg').fadeIn(100).animate({"bottom":"0px"}, "slow");
			 setTimeout(function() {
		        $(".msg").fadeOut(1500).animate({"bottom":"-120px"}, "slow");
		    },3000);*/
		    
		    $('.msg').fadeIn(200).animate({"bottom":"0px"}, "slow");
			setTimeout(function() {
				$(".msg").fadeOut(1500).animate({"bottom":"-50px"}, "slow");
    		},3000);
		    
		    
		    
		 } 
		 
		 //Muestra imagenes de slider
		 var msgSlider = "<?php echo $mostrarMsgSlider; ?>";
		 if(msgSlider ){
			 var msg = "<span>"+msgSlider+"</span>";
			 showMessages( msg );
		 } 
	 })	 
 </script>
</body>

</html>
