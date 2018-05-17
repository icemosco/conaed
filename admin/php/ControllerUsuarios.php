<?php
	include_once("../php/Funciones.php");
	include_once("../php/Usuario.php");
	$oUsu = new Usuario();
	$oFun = new Funciones();
	
	function fnTemplateUsuarios( $numPagina ){
		global $oUsu, $oFun;
		
		$totalRegXpag   = 15; 
		
		//Obtenemos todos los registros
		$totalRegistros = count($oUsu->fnListadoUsuarios());	
		$totalPaginas   = ceil( $totalRegistros / $totalRegXpag );
		$empezarDesde   = ($numPagina-1) * $totalRegXpag;
		
		$infoUsuarios = $oUsu->fnListadoUsuarios( $empezarDesde, $totalRegXpag );
		if(!empty( $infoUsuarios )){
			$cont  = ($empezarDesde+1);
			$i     = 0;
			foreach($infoUsuarios as $key =>$infoUsu){

				$permisosM = (!empty($infoUsu['permisos_menu'])) ? explode("|", $infoUsu['permisos_menu']) : array();
				$clase = "";	
				if(($cont%2)==0){ $clase ='class="clr2"'; }
				
				$template .= '<li '.$clase.'>
									<span class="num_id">'.$cont.'</span>
									<span class="nom_user">'.$infoUsu['nombre'].' '.$infoUsu['apellido_pat'].' '.$infoUsu['apellido_mat'].'</span>
									<a href="javascript:void(0)" class="delete_usuario funct">Eliminar</a>
									<input type="hidden" name="idUsuario[]" id="idUsuario_'.$i.'" value="'.$infoUsu["id"].'"/> 
									<a href="javascript:void(0)" class="edit_user funct">editar</a>
								</li>
								<li>
								<div class="new_user">
									<ul>
										<li>
											<label>Nombre(s):</label>
											<input type="text" name="nombre_usuario[]" id="nombre_usuario_'.$i.'" value="'.$infoUsu['nombre'].'" class="requerido_usu"/>
										</li>
										<li>
											<label>Apellido Paterno:</label>
											<input type="text" name="paterno_usuario[]" id="paterno_usuario_'.$i.'" value="'.$infoUsu['apellido_pat'].'" class="requerido_usu"/>
										</li>
										<li>
											<label>Apellido Materno:</label>
											<input type="text" name="materno_usuario[]" id="materno_usuario_'.$i.'" value="'.$infoUsu['apellido_mat'].'" class="requerido_usu"/>
										</li>
									</ul>
									<ul>
										<li>
											<label>Nombre de usuario:</label>
											<input type="text" name="usuario[]" id="usuario_'.$i.'" maxlength="20" value="'.$infoUsu['usuario'].'" readonly/>
										</li>
										<li>
											<label>Email:</label>
											<input type="text" name="email_usario[]" id="email_usario_'.$i.'" maxlength="50" value="'.$infoUsu['email'].'" class="requerido_usu validarEmail" placeholder="correo@correo.com" />
										</li>
										<li>
											<label>Confirmar Email:</label>
											<input type="email" name="conf_email_usuario[]" id="conf_email_usuario_'.$i.'"  maxlength="50" class="validarEmail" placeholder="correo@correo.com" />
										</li>
									</ul>
									<ul>
										<li>
											<label>Contraseña:</label>
											<input type="password" name="contrasena_usu[]" id="contrasena_usu_'.$i.'"  class="requerido_usu pass_complexity"  maxlength="10"
											placeholder="máximo 10 caracteres" />
										</li>
										<li>
											<label>Confirmar contraseña:</label>
											<input type="password" name="conf_contrasena[]"  id="conf_contrasena_'.$i.'" class="" maxlength="10" placeholder="confirma la contraseña" />
										</li>
									
										<li>
											<meter max="4" id="password-strength-meter_'.$i.'"></meter>
											<p id="password-strength-text_'.$i.'"></p>
										</li>
										
									</ul>
									<div class="mensaje_bot"></div>
									<div class="privilege">
										<ul>
											<li>
												<input type="checkbox" class="check_usu_permisos" name="permisos_slider[]" id="permisos_slider_'.$i.'" value="1" '. (in_array("1", $permisosM) ? 'checked' : '') .'>
												<label>Slider Home Page</label>
											</li>
											<li>
												<input type="checkbox" class="check_usu_permisos" name="permisos_acreditados[]" id="permisos_acreditados_'.$i.'" value="2" '. (in_array("2", $permisosM) ? 'checked' : '') .'>
												<label>Programas Acreditados</label>
											</li>
											<li>
												<input type="checkbox" class="check_usu_permisos" name="permisos_evaluadores[]" id="permisos_evaluadores_'.$i.'" value="3" '. (in_array("3", $permisosM) ? 'checked' : '') .'>
												<label>Padrón de Evaluadores</label>
											</li>
											<li>
												<input type="checkbox" class="check_usu_permisos" name="permisos_referencias[]" id="permisos_referencias_'.$i.'" value="4" '. (in_array("4", $permisosM) ? 'checked' : '') .'>
												<label>Referencias y Asociados</label>
											</li>
											<li>
												<input type="checkbox" class="check_usu_permisos" name="permisos_temas[]" id="permisos_temas_'.$i.'" value="5" '. (in_array("5", $permisosM) ? 'checked' : '') .'>
												<label>Temas y Noticias</label>
											</li>
											<li>
												<input type="checkbox" class="check_usu_permisos" name="permisos_gestor[]" id="permisos_gestor_'.$i.'" value="6" '. (in_array("6", $permisosM) ? 'checked' : '') .'>
												<label>Gestor de Usuarios</label>
											</li>
										</ul>
											
									</div>
									<button type="button" class="save_btn" name="guardar_usuario[]" id="guardar_usuario_'.$i.'" onclick="guardarUsuarios(this, \''.$i.'\');">Guardar Usuario</button>
								</div><!--new_user-->
							</li>';
				$cont++;
				$i++;			
			}
		}				
		$paginador = $oFun->Paginador($numPagina, $totalPaginas, 'npu');
				
		return array( 'template' => $template, 'paginador' => $paginador);
	}
	function fnTemplateNuevoUsuario(){
		$template = '<ul>
					<li>
						<label>Nombre(s):</label>
						<input type="text" name="nombre_usuario[]" id="nombre_usuario_n" class="requerido_usu"/>
						<input type="hidden" name="idUsuario[]" id="idUsuario_n" value=""/> 
					</li>
					<li>
						<label>Apellido Paterno:</label>
						<input type="text" name="paterno_usuario[]" id="paterno_usuario_n" class="requerido_usu"/>
					</li>
					<li>
						<label>Apellido Materno:</label>
						<input type="text" name="materno_usuario[]" id="materno_usuario_n" class="requerido_usu" />
					</li>
				</ul>
				<ul>
					<li>
						<label>Nombre de usuario:</label>
						<input type="text" name="usuario[]" id="usuario_n" class="requerido_usu" maxlength="20" placeholder="máximo 20 caracteres" />
					</li>
					<li>
						<label>Email:</label>
						<input type="text" name="email_usario[]" id="email_usario_n" class="requerido_usu validarEmail" maxlength="50" placeholder="correo@correo.com" />
					</li>
					<li>
						<label>Confirmar Email:</label>
						<input type="email" name="conf_email_usuario[]" id="conf_email_usuario_n" maxlength="50" class="validarEmail" placeholder="correo@correo.com" />
					</li>
				</ul>
				<ul>
					<li>
						<label>Contraseña:</label>
						<input type="password" name="contrasena_usu[]" id="contrasena_usu_n"  class="requerido_usu pass_complexity" maxlength="10"
						placeholder="máximo 10 caracteres" />
					</li>
					<li>
						<label>Confirmar contraseña:</label>
						<input type="password" name="conf_contrasena[]"  id="conf_contrasena_n" class="" maxlength="10" placeholder="confirma la contraseña" />
					</li>
				
					<li>
						<meter max="4" id="password-strength-meter_n" value=""></meter>
						<p id="password-strength-text_n"></p>
					</li>
					
				</ul>
				<div class="mensaje_bot"></div>
				<div class="privilege">
					<ul>
						<li>
							<input type="checkbox" class="check_usu_permisos" name="permisos_slider[]" id="permisos_slider_n" value="1">
							<label>Slider Home Page</label>
						</li>
						<li>
							<input type="checkbox" class="check_usu_permisos" name="permisos_acreditados[]" id="permisos_acreditados_n" value="2">
							<label>Programas Acreditados</label>
						</li>
						<li>
							<input type="checkbox" class="check_usu_permisos" name="permisos_evaluadores[]" id="permisos_evaluadores_n" value=3>
							<label>Padrón de Evaluadores</label>
						</li>
						<li>
							<input type="checkbox" class="check_usu_permisos" name="permisos_referencias[]" id="permisos_referencias_n" value="4">
							<label>Referencias y Asociados</label>
						</li>
						<li>
							<input type="checkbox" class="check_usu_permisos" name="permisos_temas[]" id="permisos_temas_n" value="5">
							<label>Temas y Noticias</label>
						</li>
						<li>
							<input type="checkbox" class="check_usu_permisos" name="permisos_gestor[]" id="permisos_gestor_n" value="6">
							<label>Gestor de Usuarios</label>
						</li>
					</ul>
						
				</div>
				<button type="button" class="save_btn" name="guardar_usuario[]" id="guardar_usuario_n" onclick="guardarUsuarios(this, \'n\');">Agregar Usuario</button>';
		return $template;
	}


	function fnGuardarUsuario( $id, $idSlide, $titulo, $subTitulo, $numSlide, $folderSlider, $fileImgUsu )
	{
		global $oUsu;
		

		/*if(isset($fileImgUsu['name'][$id]) && !empty($fileImgUsu['name'][$id])){

			$infoImg = array( 'name' => $fileImgUsu['name'][$id]
							, 'type' => $fileImgUsu['type'][$id]
							, 'tmp_name' => $fileImgUsu['tmp_name'][$id]
							, 'error' =>  $fileImgUsu['error'][$id]
							, 'size' =>$fileImgUsu['size'][$id]);	
			$newSizeW = 1366;
			$newSizeH = 620;
			$msgArch = $oFun->guardarArchivos($folderSlider, $infoImg, $newSizeW, $newSizeH );

			if($msgArch == "OK"){ 
				$nomImgUsu  = $oFun->getnameArch();}
			else{
				$error = "Hubo un problema con la imagen";
			} 
		}*/

		if(empty($error)){
			$nomImagen = (!empty($nomImgUsu) ? $nomImgSlide : '');
			if( empty($idSlide )){
				$id = $oUsu->insertarUsuario( $data, $usuario , $numSlide, $titulo, $subTitulo, $nomImagen);
			}else{
				$id = $oMod->actualizarUsuario( $idSlide, $numSlide, $titulo, $subTitulo, $nomImagen);
			}	
		}
		return $error;
	}

?>