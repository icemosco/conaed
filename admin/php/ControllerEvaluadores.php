<?php
	include_once("../php/Funciones.php");
	include_once("../php/Modelo.php");

	$oMod = new Modelo();
	$oFun = new Funciones();
	
	function fnTemplateEvaluadores( $numPagina ){
		global $oMod, $oFun;
		
		$totalRegXpag    = 15; 
		
		//Obtenemos todos los registros
		$totalRegistros  = count($oMod->fnListEvaluadores());	
		$totalPaginas    = ceil( $totalRegistros / $totalRegXpag );
		$empezarDesde    = ($numPagina-1) * $totalRegXpag;
		
		$infoEvaluadores = $oMod->fnListEvaluadores( $empezarDesde, $totalRegXpag);
		if(!empty( $infoEvaluadores )){
			$cont  = ($empezarDesde+1);
			$i     = 0;
			foreach($infoEvaluadores as $key =>$info){
				$clase = "";	
				if(($cont%2)==0){ $clase ='class="clr2"'; }
				
				$template .= '<li '.$clase.'>
							<span class="num_id">'.$cont.'</span>
							<span class="nom_uni">'.$info["a_paterno"].' '.$info["a_materno"].' '.$info["nombre"].'</span>
							<a href="javascript:void(0)" class="edit_evaluador edit_int funct">editar</a>
							<input type="hidden" name="idEvaluador[]" id="idEvaluador_'.$i.'" value="'.$info["id_evaluador"].'"/> 
							<a href="javascript:void(0)" class="delete_evaluador del_int funct">Eliminar</a>
						</li>
						<li>
							<div class="new_evaluador">
								<ul>
									<li class="close_edit"><a class="close_edit_btn" href="javascript:void(0)">X</a></li>
									<li>
										<label>Nombre:</label>
										<input type="text" name="nombre_evaluador[]" id="nombre_evaluador_'.$i.'" max-lenght="100" value="'.$info["nombre"].'" 
										class="requerido" placeholder="">
									</li>
									<li>
										<label>Apellido Paterno:</label>
										<input type="text" name="paterno_evaluador[]" id="paterno_evaluador_'.$i.'" max-lenght="100" value="'.$info["a_paterno"].'" class="requerido" placeholder="">
									</li>
								</ul>
								<ul>
									<li>
										<label>Apellido Materno:</label>
										<input type="text" name="materno_evaluador[]"  id="materno_evaluador_'.$i.'" max-lenght="100" value="'.$info["a_materno"].'" class="requerido" placeholder="">
									</li>
								</ul>
								<button type="submit"  class="save_btn" name="guardar_evaluadores" id="guardar_evaluadores_'.$i.'"  onclick="guardarEvaluadores(this, '.$i.');">Guardar</button>
							</div>
						</li> ';
				$cont++;		
				$i++;
			}
		}
		
		$paginador = $oFun->Paginador($numPagina, $totalPaginas, 'npe');
		
		return array( 'template' => $template, 'paginador' => $paginador);
	}


	function fnTemplateNuevoEvaluadores(){
		$template= '<ul>
				<li>
					<label>Nombre:</label>
					<input type="text" name="nombre_evaluador" id="nombre_evaluador_n" max-lenght="100" value="" class="requerido" placeholder="">
				</li>
				<li>
					<label>Apellido Paterno:</label>
					<input type="text" name="paterno_evaluador" id="paterno_evaluador_n" max-lenght="100" value="" class="requerido" placeholder="">
				</li>
			</ul>
			<ul>
				<li>
					<label>Apellido Materno:</label>
					<input type="text" name="materno_evaluador" id="materno_evaluador_n"  max-lenght="100" value="" class="requerido" placeholder="">
				</li>
			</ul>
			<button type="button" class="save_btn" id="guardar_acreditados_n" onclick="guardarEvaluadores(this, \'n\');">Guardar</button>';
		return $template;	
	}	
	
	
	
	function fnGuardarEvaluadores( $id, $idAcreditado, $nombreUni, $paginaWeb, $fechaIni, $fechaFin )
	{
		/*global $oMod, $oFun;
		$error = '';
		
		if( empty($idSlide )){
			$id = $oMod->fnInsertaAcreditados( $nombreUni, $paginaWeb, $fechaIni, $fechaFin );
		}else{
			$id = $oMod->fnActualizaAcreditados( $idAcreditado, $nombreUni, $paginaWeb, $fechaIni, $fechaFin);
		}	
		
		
		return $error;*/
	}
	
?>	