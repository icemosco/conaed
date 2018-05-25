<?php

    error_reporting(0); 
    include_once('./header.php'); 
	include_once("../php/ControllerSlider.php");
	include_once("../php/ControllerAcreditados.php");
	include_once("../php/ControllerEvaluadores.php");
	include_once("../php/ControllerUsuarios.php");
	include_once("../php/ControllerAsociados.php");
	include_once("../php/ControllerNoticias.php");



//cxomment

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
	<!------------------------- -->
	<!-- -----------SLIDER -->
	<!------------------------- -->
	<div class="header_int">
		<h2 class="muestra_msg">Slider Home Page</h2>
		<div class="search">
		</div>
	</div>
	<div class="forms_cont sliders" style="display:block">
		<form class="slider" name="sliders" id="sliders" action="./home.php" method="post" enctype="multipart/form-data">
			
			<?php echo fnTemplateSlide(); ?>
			<button type="button"  class="save_btn" name="guardar_slider" id="guardar_slider" onclick="guardarSlider()" >Guardar</button>
		</form>
		
	</div><!--forms_cont. SLIDE-->



	<!------------------------- -->
	<!-- --------ACREDITADOS -->
	<!------------------------- -->
	<div class="forms_cont programas">
		<div class="add_programa oxygenlight"><? echo fnTemplateNuevoAcreditado(); ?></div>
		<form class="prog" name="acreditados" id="acreditados" action="./home.php" method="post">
			<ul class="table_res"><?php echo $infoAcre['template']; ?></ul>
		</form>
		<ul class="paginator"> <?php  echo $infoAcre['paginador'];  ?> </ul>
	</div><!--forms_cont PROGRAMAS-->




	<!------------------------- -->
	<!-- -------EVALUADORES   -->
	<!------------------------- -->
	<div class="forms_cont evaluadores">
		<div class="add_evaluador"><?php echo fnTemplateNuevoEvaluadores(); ?></div>
		<form class="prog" name="evaluadores" id="evaluadores" action="./home.php" method="post" >
			<ul class="table_res"><?php  echo $infoEval['template']; ?></ul>
		</form>
		<ul class="paginator"> <?php echo $infoEval['paginador']; ?> </ul>
		
	</div><!--forms_cont-->



	<!------------------------- -->
	<!-- -----------USUARIO -->
	<!------------------------- -->
	<div class="forms_cont usuarios oxygenlight">
		<div class="add_usuario"><?php echo fnTemplateNuevoUsuario(); ?></div><!--add_usuario-->
		<form class="users_gest" name="usuarios" id="usuarios" action="./home.php" method="post">
			<ul class="table_res"> <?php echo $infoUsus['template']; ?> </ul>
		</form>
		<ul class="paginator"> <?php echo $infoUsus['paginador']; ?> </ul>
	</div><!--forms_cont-->



	<!------------------------- -->
	<!-- --------ASOCIADOS -->
	<!------------------------- -->
	<div class="forms_cont asociados oxygenlight">
		<div class="add_asociado"><?php echo fnTemplateNuevoAsociado(); ?></div><!--add_asociado-->
		<form class="frm_asociados" name="asociados" id="asociados" action="./home.php" method="post" enctype="multipart/form-data">
			<div class="reel_asociados">
				<ul><?php echo fnTemplateAsociados(); ?></ul>
			</div>
			<button type="button" class="save_btn" id="guardar_asociados_i" onclick="guardarOrdenAsociados()">Guardar</button>
		</form>
	</div><!--form_cont-asociados-->
	

	<!-- ----------------------- -->
	<!-- --------NOTICIAS -->
	<!-- ----------------------- -->
	<div class="forms_cont temasynoticias oxygenlight">
		<div class="add_tema oxygenlight">
			<div class="temas_fill">
				<div class="left mr">
					<span class="indications">Imágen .jpg ó .png</span>
					<div class="img_loaded" style="margin-top:0;">
						<img src="../../img/noticias/">
					</div>
					<div class="path">Ruta del archivo</div>
					<div class="cont_r">
						<input type="hidden" name="" value="">
						<input type="file" name="" class="file_upload_2 requeridoTema">
						<a href="javascript:void(0)" class="btn_cargar">Cargar</a>
					</div><!--cont_r-->
				</div><!--left-->
				<div class="right">
					<div class="sub_text_cont">
						<textarea name="" class="infoNoticia requeridoNoticia" maxlength="200" placeholder="Titulo del Tema"></textarea>
					</div>
					
					<div class="sub_text_cont">
						<textarea name="contenido_tema" class="infoNoticia requeridoNoticia" maxlength="" placeholder="Nota completa del Tema"></textarea>
					</div>
					
					
				</div><!--right-->
				<!--<input type="hidden" name="" class="idNoticiasCont" value="">-->
				<button type="submit"  class="save_btn" name="guardar_noticia" id="guardar_noticia" >Guardar</button>
					</ul>
				</div>
		
		</div>
		<!---termina add tema-->
		<form class="frm_temasynoticias" name="temasynoticias" id="temasynoticias" action="./home.php" method="post" enctype="multipart/form-data">
		<ul class="table_res">
			<li>
				<span class="num_id">1</span>
				<span class="nom_uni">Este es el titulo de la nota o tema</span>
				<a href="javascript:void(0)" class="edit_tema edit_int funct">editar</a>
				<!--<input type="hidden" name="" id="" value=""> -->
				<a href="javascript:void(0)" class="delete_tema del_int funct">Eliminar</a>
			</li>
			<li>
				<div class="new_tema">
					<ul>
						<li class="close_edit"><a class="close_edit_btn" href="javascript:void(0)">X</a></li>
						<div class="temas_fill">
							<div class="left mr">
								<span class="indications">Imágen .jpg ó .png</span>
								<div class="img_loaded" style="margin-top:0;">
									<img src="../../img/noticias/">
								</div>
								<div class="path">ruta del archivo</div>
								<div class="cont_r">
									<!--<input type="hidden" name="" value="">-->
									<input type="file" name="" class="file_upload_2 requeridoNoticia">
									<a href="javascript:void(0)" class="btn_cargar">Cargar</a>
								</div><!--cont_r-->
							</div><!--left-->
						
				
				<div class="right">
					<div class="sub_text_cont">
						<textarea name="" class="infoNoticia requeridoNoticia" maxlength="200" placeholder="Titulo del Tema"></textarea>
					</div>
					
					<div class="sub_text_cont">
						<textarea name="contenido_tema" class="infoNoticia requeridoNoticia" maxlength="" placeholder="Nota completa del Tema"></textarea>
					</div>
					
					
				</div><!--right-->
				<input type="hidden" name="" class="idNoticiasCont" value="">
				<button type="submit"  class="save_btn" name="guardar_noticia" id="guardar_noticia" >Guardar</button>
					</ul>
				</div>
			</li>
			<li class="clr2">
				<span class="num_id">2</span>
				<span class="nom_uni">Este es el titulo de la nota o tema 2</span>
				<a href="javascript:void(0)" class="edit_tema edit_int funct">editar</a>
				<input type="hidden" name="" id="" value=""> 
				<a href="javascript:void(0)" class="delete_tema del_int funct">Eliminar</a>
			</li>
		</ul>
			<?php // echo fnTemplateNoticias(); ?>
			
		</form>
	</div>
	
</div><!--wrapper_right-->

</div><!--main_wrapper-->

<div class="msg"></div>

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
		 
		 //Muestra mensajes del slider
		 var msgSlider = "<?php echo $mostrarMsgSlider; ?>";
		 if(msgSlider ){
			 var msg = "<span>"+msgSlider+"</span>";
			 
			$(".msg").html(msg); 
		    $('.msg').fadeIn(200).animate({"bottom":"0px"}, "slow");
			setTimeout(function() {
				$(".msg").fadeOut(1500).animate({"bottom":"-50px"}, "slow");
    		},3000);


		 } 
	 })	 
 </script>
</body>

</html>
