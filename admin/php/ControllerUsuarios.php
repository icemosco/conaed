<?php
	include_once("../php/Funciones.php");
	include_once("../php/Modelo.php");

	$oMod = new Modelo();
	$oFun = new Funciones();
	
	function fnTemplateUsuarios( $numPagina ){
		global $oMod, $oFun;
		
		$totalRegXpag   = 15; 
		
		//Obtenemos todos los registros
		$totalRegistros = count($oMod->fnListadoUsuarios());	
		$totalPaginas   = ceil( $totalRegistros / $totalRegXpag );
		$empezarDesde   = ($numPagina-1) * $totalRegXpag;
		
		$infoUsuarios = $oMod->fnListadoUsuarios( $empezarDesde, $totalRegXpag );
		if(!empty( $infoUsuarios )){
			$cont  = ($empezarDesde+1);
			$i     = 0;
			foreach($infoUsuarios as $key =>$infoUsu){
				$clase = "";	
				if(($cont%2)==0){ $clase ='class="clr2"'; }
				
				$template .= '<li '.$clase.'>
									<span class="num_id">'.$cont.'</span>
									<span class="nom_user">'.$infoUsu['nombre'].' '.$infoUsu['a_paterno'].' '.$infoUsu['a_materno'].'</span>
									<a href="javascript:void(0)" class="delete_usuario funct">Eliminar</a>
									<input type="hidden" name="idUsuario[]" id="idUsuario_'.$i.'" value="'.$info["id"].'"/> 
									<a href="javascript:void(0)" class="edit_user funct">editar</a>
								</li>
								<li>
								<div class="new_user">
									<ul>
										<li>
											<label>Nombre(s):</label>
											<input type="text" class="" name="nombre_usuario[]" id="nombre_usuario_'.$i.'" class="requerido_usu"/>
										</li>
										<li>
											<label>Apellido Paterno:</label>
											<input type="text" class="" name="paterno_usuario[]" id="paterno_usuario_'.$i.'" class="requerido_usu"/>
										</li>
										<li>
											<label>Apellido Materno:</label>
											<input type="text" class="" name="materno_usuario[]" id="materno_usuario_'.$i.'" class="requerido_usu"/>
										</li>
									</ul>
									<ul>
										<li>
											<label>Nombre de usuario:</label>
											<input type="text" class="" name="usuario[]" id="usuario_'.$i.'" maxlength="8" class="requerido_usu"
											placeholder="máximo 8 caracteres" />
										</li>
										<li>
											<label>Email:</label>
											<input type="text" class="" name="email_usario[]" id="email_usario_'.$i.'" maxlength="8" class="requerido_usu" placeholder="correo@correo.com" />
										</li>
										<li>
											<label>Confirmar Email:</label>
											<input type="email" class="" name="conf_email_usuario[]" id="conf_email_usuario_'.$i.'" class="requerido_usu" placeholder="correo@correo.com" />
										</li>
									</ul>
									<ul>
										<li>
											<label>Contraseña:</label>
											<input type="password" class="" name="contrasena_usu[]" id="contrasena_usu_'.$i.'"  class="requerido_usu"  maxlength="10"
											placeholder="máximo 10 caracteres" />
										</li>
										<li>
											<label>Confirmar contraseña:</label>
											<input type="password" class="" name="conf_contrasena[]"  id="conf_contrasena_'.$i.'" class="requerido_usu" maxlength="10" placeholder="confirma la contraseña" />
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
												<input type="checkbox" name="permisos_slider[]" id="permisos_slider_'.$i.'" value="S">
												<label>Slider Home Page</label>
											</li>
											<li>
												<input type="checkbox" name="permisos_acreditados[]" id="permisos_acreditados_'.$i.'" value="S">
												<label>Programas Acreditados</label>
											</li>
											<li>
												<input type="checkbox" name="permisos_evaluadores[]" id="permisos_evaluadores_'.$i.'" value="S">
												<label>Padrón de Evaluadores</label>
											</li>
											<li>
												<input type="checkbox" name="permisos_referencias[]" id="permisos_referencias_'.$i.'" value="S">
												<label>Referencias y Asociados</label>
											</li>
											<li>
												<input type="checkbox" name="permisos_temas[]" id="permisos_temas_'.$i.'" value="S">
												<label>Temas y Noticias</label>
											</li>
											<li>
												<input type="checkbox" name="permisos_gestor[]" id="permisos_gestor_'.$i.'" value="S">
												<label>Gestor de Usuarios</label>
											</li>

										</ul>
											
									</div>
									<button type="submit" class="save_btn" name="guardar_usuario[]" id="guardar_usuario_'.$i.'">Agregar Usuario</button>
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
						<input type="text" name="usuario[]" id="usuario_n" class="requerido_usu" maxlength="8"
						placeholder="máximo 8 caracteres" />
					</li>
					<li>
						<label>Email:</label>
						<input type="text" name="email_usario[]" id="email_usario_n" class="requerido_usu" maxlength="8" placeholder="correo@correo.com" />
					</li>
					<li>
						<label>Confirmar Email:</label>
						<input type="email" name="conf_email_usuario[]" id="conf_email_usuario_n" class="requerido_usu" placeholder="correo@correo.com" />
					</li>
				</ul>
				<ul>
					<li>
						<label>Contraseña:</label>
						<input type="password" name="contrasena_usu[]" id="contrasena_usu_n"  class="requerido_usu" maxlength="10"
						placeholder="máximo 10 caracteres" />
					</li>
					<li>
						<label>Confirmar contraseña:</label>
						<input type="password" name="conf_contrasena[]"  id="conf_contrasena_n" class="requerido_usu" maxlength="10" placeholder="confirma la contraseña" />
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
							<input type="checkbox" name="permisos_slider[]" id="permisos_slider_n" value="S">
							<label>Slider Home Page</label>
						</li>
						<li>
							<input type="checkbox" name="permisos_acreditados[]" id="permisos_acreditados_n" value="S">
							<label>Programas Acreditados</label>
						</li>
						<li>
							<input type="checkbox" name="permisos_evaluadores[]" id="permisos_evaluadores_n" value="S">
							<label>Padrón de Evaluadores</label>
						</li>
						<li>
							<input type="checkbox" name="permisos_referencias[]" id="permisos_referencias_n" value="S">
							<label>Referencias y Asociados</label>
						</li>
						<li>
							<input type="checkbox" name="permisos_temas[]" id="permisos_temas_n" value="S">
							<label>Temas y Noticias</label>
						</li>
						<li>
							<input type="checkbox" name="permisos_gestor[]" id="permisos_gestor_n" value="S">
							<label>Gestor de Usuarios</label>
						</li>

					</ul>
						
				</div>
				<button type="submit" class="save_btn" name="guardar_usuario[]" id="guardar_usuario_n">Agregar Usuario</button>';
		return $template;
	}	
?>	
	