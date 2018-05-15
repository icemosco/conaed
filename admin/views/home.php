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
	<div class="forms_cont programas">
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
			
		<form class="prog" name="acreditados" id="acreditados" action="./home.php" method="post">
			<ul class="table_res">
				<?php echo $infoAcre['template']; ?>
			</ul>
		</form>
		<ul class="paginator"> <?php  echo $infoAcre['paginador'];  ?> </ul>
	</div><!--forms_cont ACREDITADOS-->
	<div class="forms_cont evaluadores">
		<div class="add_evaluador">
			<ul>
				<li>
					<label>Nombre:</label>
					<input type="text" name="nombre_evaluador" max-lenght="500" value="" class="requerido" placeholder="">
				</li>
				<li>
					<label>Apellido Paterno:</label>
					<input type="text" name="paterno_evaluador" max-lenght="500" value="Accinelli" class="requerido" placeholder="">
				</li>
			</ul>
			<ul>
				<li>
					<label>Apellido Materno:</label>
					<input type="text" name="materno_evaluador" max-lenght="500" value="Rezkalah" class="requerido" placeholder="">
				</li>
			</ul>
		</div>
		
			
		<form class="prog" name="evaluadores" id="evaluadores" action="./home.php" method="post" >
			
			<ul class="table_res">
				<?php  echo $infoEval['template']; ?>
			</ul>

			<button type="submit"  class="save_btn" name="guardar_evaluadores" id="guardar_evaluadores" >Guardar</button>
		</form>
		<ul class="paginator"> <?php echo $infoEval['paginador']; ?> </ul>
		
	</div><!--forms_cont-->
	<div class="forms_cont usuarios oxygenlight">
		<div class="add_usuario">
				<ul>
					<li>
						<label>Nombre(s):</label>
						<input type="text" class="" name="nombres" required="required" />
					</li>
					<li>
						<label>Apellido Paterno:</label>
						<input type="text" class="" name="a_paterno" required="required" />
					</li>
					<li>
						<label>Apellido Materno:</label>
						<input type="text" class="" name="a_materno" required="required" />
					</li>
				</ul>
				<ul>
					<li>
						<label>Nombre de usuario:</label>
						<input type="text" class="" name="nom_user" required="required" maxlength="8"
						placeholder="máximo 8 caracteres" />
					</li>
					<li>
						<label>Email:</label>
						<input type="text" class="" name="email_usario" required="required" maxlength="8" placeholder="correo@correo.com" />
					</li>
					<li>
						<label>Confirmar Email:</label>
						<input type="email" class="" name="conf_email_usuario" required="required" placeholder="correo@correo.com" />
					</li>
				</ul>
				<ul>
					<li>
						<label>Contraseña:</label>
						<input type="password" class="" id="password" name="contrasena" required="required" maxlength="10"
						placeholder="máximo 10 caracteres" />
					</li>
					<li>
						<label>Confirmar contraseña:</label>
						<input type="password" class="" name="conf_contrasena" required="required" maxlength="10" placeholder="confirma la contraseña" />
					</li>
				
					<li>
						<meter max="4" id="password-strength-meter"></meter>
						<p id="password-strength-text"></p>
					</li>
					
				</ul>
				<div class="mensaje_bot"></div>

				<div class="privilege">
					<ul>
						<li>
							<input type="checkbox" name="sl1" id="1" class="">
							<label>Slider Home Page</label>
						</li>
						<li>
							<input type="checkbox" name="sl1" id="2" class="">
							<label>Programas Acreditados</label>
						</li>
						<li>
							<input type="checkbox" name="sl1" id="3" class="">
							<label>Padrón de Evaluadores</label>
						</li>
						<li>
							<input type="checkbox" name="sl1" id="4" class="">
							<label>Referencias y Asociados</label>
						</li>
						<li>
							<input type="checkbox" name="sl1" id="5" class="">
							<label>Temas y Noticias</label>
						</li>
						<li>
							<input type="checkbox" name="sl1" id="6" class="">
							<label>Gestor de Usuarios</label>
						</li>

					</ul>
						
				</div>
				<button type="submit" class="save_btn" name="guardar_nuevo_usuario" id="add_nuevo_user">Agregar Usuario</button>
				
			</div><!--add_usuario-->
		<form class="users_gest" name="usuarios" id="usuarios" action="./home.php" method="post" enctype="multipart/form-data">

			

			<ul class="table_res">
				<li>
					<span class="nom_user">Accinelli Rezkalah Eduardo</span>
					<a href="javascript:void(0)" class="disable funct">disable</a>
					<a href="javascript:void(0)" class="edit_user funct">editar</a>
				</li>
				<li>
					<div class="new_user">
							<ul>
					 <li>
						<label>Nombre(s):</label>
						<input type="text" class="" name="nombres" required="required" />
					 </li>
					 <li>
						<label>Apellido Paterno:</label>
						<input type="text" class="" name="a_paterno" required="required" />
					 </li>
					 <li>
						<label>Apellido Materno:</label>
						<input type="text" class="" name="a_materno" required="required" />
					 </li>
				    </ul>
				<ul>
					<li>
						<label>Nombre de usuario:</label>
						<input type="text" class="" name="nom_user" required="required" maxlength="8"
						placeholder="máximo 8 caracteres" />
					</li>
					<li>
						<label>Email:</label>
						<input type="text" class="" name="email_usario" required="required" maxlength="8" placeholder="correo@correo.com" />
					</li>
					<li>
						<label>Confirmar Email:</label>
						<input type="email" class="" name="conf_email_usuario" required="required" placeholder="correo@correo.com" />
					</li>
				</ul>
				<ul>
					<li>
						<label>Contraseña:</label>
						<input type="password" class="" id="password" name="contrasena" required="required" maxlength="10"
						placeholder="máximo 10 caracteres" />
					</li>
					<li>
						<label>Confirmar contraseña:</label>
						<input type="password" class="" name="conf_contrasena" required="required" maxlength="10" placeholder="confirma la contraseña" />
					</li>
				
					<li>
						<meter max="4" id="password-strength-meter"></meter>
						<p id="password-strength-text"></p>
					</li>
					
				</ul>
				<div class="mensaje_bot"></div>

				<div class="privilege">
					<ul>
						<li>
							<input type="checkbox" name="sl1" id="1-7" class="">
							<label>Slider Home Page</label>
						</li>
						<li>
							<input type="checkbox" name="sl1" id="1-8" class="">
							<label>Programas Acreditados</label>
						</li>
						<li>
							<input type="checkbox" name="sl1" id="1-9" class="">
							<label>Padrón de Evaluadores</label>
						</li>
						<li>
							<input type="checkbox" name="sl1" id="1-10" class="">
							<label>Referencias y Asociados</label>
						</li>
						<li>
							<input type="checkbox" name="sl1" id="1-11" class="">
							<label>Temas y Noticias</label>
						</li>
						<li>
							<input type="checkbox" name="sl1" id="1-12" class="">
							<label>Gestor de Usuarios</label>
						</li>

					</ul>
						
				</div>
				<button type="button" class="save_btn" id="guardar_usuarios" onclick="">Actualizar Usuario</button>	
				</div><!--new_user-->
				</li>
				<li class="clr2">
					<span class="nom_user">Accinelli Rezkalah Eduardo 2</span>
					<a href="javascript:void(0)" class="disable funct">disable</a>
					<a href="javascript:void(0)" class="edit_user funct">editar</a>
				</li>
				<li>
					<div class="new_user">
							<ul>
					 <li>
						<label>Nombre(s):</label>
						<input type="text" class="" name="nombres" required="required" />
					 </li>
					 <li>
						<label>Apellido Paterno:</label>
						<input type="text" class="" name="a_paterno" required="required" />
					 </li>
					 <li>
						<label>Apellido Materno:</label>
						<input type="text" class="" name="a_materno" required="required" />
					 </li>
				    </ul>
				<ul>
					<li>
						<label>Nombre de usuario:</label>
						<input type="text" class="" name="nom_user" required="required" maxlength="8"
						placeholder="máximo 8 caracteres" />
					</li>
					<li>
						<label>Email:</label>
						<input type="text" class="" name="email_usario" required="required" maxlength="8" placeholder="correo@correo.com" />
					</li>
					<li>
						<label>Confirmar Email:</label>
						<input type="email" class="" name="conf_email_usuario" required="required" placeholder="correo@correo.com" />
					</li>
				</ul>
				<ul>
					<li>
						<label>Contraseña:</label>
						<input type="password" class="" id="password" name="contrasena" required="required" maxlength="10"
						placeholder="máximo 10 caracteres" />
					</li>
					<li>
						<label>Confirmar contraseña:</label>
						<input type="password" class="" name="conf_contrasena" required="required" maxlength="10" placeholder="confirma la contraseña" />
					</li>
				
					<li>
						<meter max="4" id="password-strength-meter"></meter>
						<p id="password-strength-text"></p>
					</li>
					
				</ul>
				<div class="mensaje_bot"></div>

				<div class="privilege">
					<ul>
						<li>
							<input type="checkbox" name="sl1" id="1" class="">
							<label>Slider Home Page</label>
						</li>
						<li>
							<input type="checkbox" name="sl1" id="1" class="">
							<label>Programas Acreditados</label>
						</li>
						<li>
							<input type="checkbox" name="sl1" id="1" class="">
							<label>Padrón de Evaluadores</label>
						</li>
						<li>
							<input type="checkbox" name="sl1" id="1" class="">
							<label>Referencias y Asociados</label>
						</li>
						<li>
							<input type="checkbox" name="sl1" id="1" class="">
							<label>Temas y Noticias</label>
						</li>
						<li>
							<input type="checkbox" name="sl1" id="1" class="">
							<label>Gestor de Usuarios</label>
						</li>

					</ul>
						
				</div>
				<button type="button" class="save_btn" id="guardar_usuarios" onclick="">Actualizar Usuario</button>	
				</div><!--new_user-->
				</li>
			</ul>
			





		</form>
	</div><!--forms_cont-->
	<div class="forms_cont asociados oxygenlight">
		<div class="add_asociado">

			<div class="asociado_fill">
				<div class="left mr">
					<span class="indications">Imágen .jpg ó .png</span>
					<input type="text" class="order_box_s requerido" name="num_slider[]" id="num_slider"  size="2" maxlength="1" value="[NUMSLIDE]" style="width: 5%"/> 
					<div class="img_loaded"><img src="../../img/slider/[IMAGENSLIDE]" /></div>
					<div class="path">ruta del archivo</div>
					<div class="cont_r">
						<input type="hidden" name="nombreSlideImg[]" value="[NOMIMGSLIDE]"/>
						<input type="file" name="imagenSlider[]" class="file_upload requerido" name="file" />
						<a href="javascript:void(0)" class="btn_cargar">Cargar</a>
					</div><!--cont_r-->
				</div><!--left-->
				
				
				<input type="hidden" name="" value=""/> 	
			</div><!--asociado_fill-->'
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
	

	
	<div class="msg">
	</div>
</div><!--wrapper_right-->

</div><!--main_wrapper-->
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/main.js"></script>
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.2.0/zxcvbn.js"></script>
<script>
	var strength = {
  0: "Necesitas Mejorar",
  1: "Muy débil",
  2: "Débil",
  3: "Buena",
  4: "Perfecta"
}
var password = document.getElementById('password');
var meter = document.getElementById('password-strength-meter');
var text = document.getElementById('password-strength-text');

password.addEventListener('input', function() {
  var val = password.value;
  var result = zxcvbn(val);

  // Update the password strength meter
  meter.value = result.score;

  // Update the text indicator
  if (val !== "") {
    text.innerHTML = "Strength: " + strength[result.score]; 
  } else {
    text.innerHTML = "";
  }
});
</script>
</body>

</html>
