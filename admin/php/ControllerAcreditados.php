<?php
	include_once("../php/Funciones.php");
	include_once("../php/Modelo.php");

	$oMod = new Modelo();
	$oFun = new Funciones();
	
	function fnTemplateAcreditados( $numPagina ){
		global $oMod, $oFun;
		
		$totalRegXpag   = 15; 
		
		//Obtenemos todos los registros
		$totalRegistros = count($oMod->fnListAcreditados());	
		$totalPaginas   = ceil( $totalRegistros / $totalRegXpag );
		$empezarDesde   = ($numPagina-1) * $totalRegXpag;

		$infoAcreditado = $oMod->fnListAcreditados( $empezarDesde, $totalRegXpag );
		if(!empty( $infoAcreditado )){
			$cont  = ($empezarDesde+1);
			$i     = 0;
			foreach($infoAcreditado as $key =>$info){
				$clase = "";	
				if(($cont%2)==0){ $clase ='class="clr2"'; }

				$fechaI = 	(!empty($info["vigencia_ini"]) ? date('d-m-Y', strtotime($info["vigencia_ini"])) : '');
				$fechaF = 	(!empty($info["vigencia_fin"]) ? date('d-m-Y', strtotime($info["vigencia_fin"])) : '');
				
				$template .= '<li '.$clase.'>
							<span class="num_id">'.$cont.'</span>
							<span class="nom_uni">'.$info["nombre_uni"].'</span>
							<a href="javascript:void(0)" class="delete_acreditado funct">eliminar</a>
							<input type="hidden" name="idAcreditado[]" id="idAcreditado_'.$i.'" value="'.$info["id_universidad"].'"/> 
							<a href="javascript:void(0)" class="edit_acreditado funct">editar</a>
						</li>
						<li>
							<div class="new_programa">
								<ul>
									<li>
										<label>Universidad o Institución Educativa:</label>
										<input type="text" name="nombre_uni[]" id="nombre_uni_'.$i.'" max-lenght="500" value="'.$info["nombre_uni"].'" >
									</li>
									<li>
										<label>Página Web:</label>
										<input type="text" name="pagina_web[]" id="pagina_web_'.$i.'" max-lenght="500" value="'.$info["website"].'"  placeholder="http:// ó https://">
									</li>
								</ul>
								<ul>
									<li>
										<label>Vigencia desde:</label>
										<input type="text" name="datepickerinit[]" max-lenght="25"  readonly
										value="'.$fechaI.'" id="datepickerinit_'.$i.'" class="datepickerinit" placeholder="">
									</li>
									<li>
										<label>Vigencia hasta:</label>
										<input type="text" name="datepickerfinit[]" max-lenght="25"  readonly
										value="'.$fechaF.'" id="datepickerfinit_'.$i.'"  class="datepickerfinit" placeholder="">
									</li>
								</ul>
								<button type="button" class="save_btn" id="guardar_acreditados_'.$i.'" onclick="guardarAcreditados(this, '.$i.');">Guardar</button>
							</div>
						</li>';
				$cont++;
				$i++;		
			}
		}
		
		$paginador = $oFun->Paginador($numPagina, $totalPaginas, 'npa');
				
		return array( 'template' => $template, 'paginador' => $paginador);
	}

	 function fnTemplateNuevoAcreditado(){
	 		$template = '<ul>
				<li>
					<label>Universidad o Institución Educativa:</label>
					<input type="hidden" name="idAcreditado[]" id="idAcreditado_n" value=""/>
					<input type="text" name="nombre_uni[]" id="nombre_uni_n" max-lenght="500" value="">
				</li>
				<li>
					<label>Página Web:</label>
					<input type="text" name="pagina_web[]" id="pagina_web_n" max-lenght="500" value="" placeholder="http:// ó https://">
				</li>
			</ul>
			<ul>
				<li>
					<label>Vigencia desde:</label>
					<input type="text" name="datepickerinit[]" max-lenght="25"  id="datepickerinit_n" class="">
				</li>
				<li>
					<label>Vigencia hasta:</label>
					<input type="text" name="datepickerfinit[]" max-lenght="25"  id="datepickerfinit_n" class="">
					</li>
			</ul>
			<button type="button" class="save_btn" id="guardar_acreditados_n" onclick="guardarAcreditados(this, \'n\');">Guardar</button>';

		return $template;	
	 }
?>	