<?php
	include_once("../php/Funciones.php");
	include_once("../php/Modelo.php");

	$oMod = new Modelo();
	$oFun = new Funciones();
	
	function fnTemplateAcreditados(){
		global $oMod;
		
		$infoAcreditado = $oMod->fnListAcreditados();	

		
		if(!empty( $infoAcreditado )){
			$cont  = 1;
			foreach($infoAcreditado as $key =>$info){
				$clase = "";	
				if(($cont%2)==0){ $clase ='class="clr2"'; }
				
				if($info['activo'] == 1) $activo = 'disable';
				else
					$activo = 'enable';
				
				$template .= '<li '.$clase.'>
							<span class="num_id">'.$cont.'</span>
							<span class="nom_uni">'.$info["nombre_uni"].'</span>
							<a href="javascript:void(0)" class="disable_acreditado funct">'.$activo.'</a>
							<input type="hidden" name="idAcreditado[]" value="'.$info["id_universidad"].'"/> 
							<input type="hidden" name="statusHabilitado[]" value="'.$info["activo"].'"/> 
							<a href="javascript:void(0)" class="edit_acreditado funct">editar</a>
						</li>
						<li>
							<div class="new_programa">
								<ul>
									<li>
										<label>Universidad o Institución Educativa:</label>
										<input type="text" name="nombre_uni[]" max-lenght="500" value="'.$info["nombre_uni"].'" class="requerido"  placeholder="">
									</li>
									<li>
										<label>Página Web:</label>
										<input type="text" name="pagina_web[]" max-lenght="500" value="'.$info["website"].'" class="requerido" placeholder="http:// ó https://">
									</li>
								</ul>
								<ul>
									<li>
										<label>Vigencia desde:</label>
										<input type="text" name="vigencia_ini[]" max-lenght="25" 
										value="'.$info["vigencia_ini"].'" id="datepickerinit_'.$cont.'" class="datepickerinit" placeholder="">
									</li>
									<li>
										<label>Vigencia hasta:</label>
										<input type="text" name="vigencia_fin[]" max-lenght="25"  value="'.$info["vigencia_fin"].'" id="datepickerfinit_'.$cont.'" 
											class="datepickerfinit" placeholder="">
									</li>
								</ul>
							</div>
						</li>';
				$cont++;		
			}
		}				
		return $template;
	}	
	
	
	
	function fnGuardarAcreditados( $id, $idAcreditado, $nombreUni, $paginaWeb, $fechaIni, $fechaFin )
	{
		global $oMod, $oFun;
		$error = '';
		
		if( empty($idSlide )){
			$id = $oMod->fnInsertaAcreditados( $nombreUni, $paginaWeb, $fechaIni, $fechaFin );
		}else{
			$id = $oMod->fnActualizaAcreditados( $idAcreditado, $nombreUni, $paginaWeb, $fechaIni, $fechaFin);
		}	
		
		
		return $error;
	}
	
?>	