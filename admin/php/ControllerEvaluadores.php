<?php
	include_once("../php/Funciones.php");
	include_once("../php/Modelo.php");

	$oMod = new Modelo();
	$oFun = new Funciones();
	
	function fnTemplateEvaluadores(){
		global $oMod;
		
		$infoEvaluadores = $oMod->fnListEvaluadores();	

		
		if(!empty( $infoEvaluadores )){
			$cont  = 1;
			foreach($infoEvaluadores as $key =>$info){
				$clase = "";	
				if(($cont%2)==0){ $clase ='class="clr2"'; }
				
				$template .= '<li '.$clase.'>
							<span class="num_id">'.$cont.'</span>
							<span class="nom_uni">'.$info["a_paterno"].' '.$info["a_materno"].' '.$info["nombre"].'</span>
							<a href="javascript:void(0)" class="disable funct">disable</a>
							<a href="javascript:void(0)" class="edit funct">editar</a>
						</li>
						<li>
							<div class="new_evaluador">
								<ul>
									<li>
										<label>Nombre:</label>
										<input type="text" name="nombre_evaluador[]" max-lenght="500" value="'.$info["nombre"].'" class="" required="required" placeholder="">
									</li>
									<li>
										<label>Apellido Paterno:</label>
										<input type="text" name="paterno_evaluador[]" max-lenght="500" value="'.$info["a_paterno"].'" class="" required="required" placeholder="">
									</li>
								</ul>
								<ul>
									<li>
										<label>Apellido Materno:</label>
										<input type="text" name="materno_evaluador[]" max-lenght="100" value="'.$info["a_materno"].'" required="required" placeholder="">
										<input type="hidden" name="idEvaluador[]" value="'.$info["id_evaluador"].'"/> 
									</li>
								</ul>
							</div>
						</li>';
				$cont++;		
			}
		}				
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