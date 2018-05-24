<?php
	include_once("../php/Funciones.php");
	include_once("../php/Modelo.php");

	$oMod = new Modelo();
	$oFun = new Funciones();

	function fnComboCategorias( $idSelect = ''){
		global $oMod;
		$combo = "";
		$infoCategorias = $oMod->fnListCategorias(); 
		if(!empty( $infoCategorias )){
			foreach($infoCategorias as $key =>$info){
				$selected = ( $idSelect == $info['id_categoria'] ? 'selected' : '');
				$combo .= '<option value="'.$info['id_categoria'].'" '.$selected.'>'.$info['nombre'].'</option>';
			}
		}

		return $combo;		
	}
	
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

				
				
				$template .= '<li '.$clase.'>
							<span class="num_id">'.$cont.'</span>
							<span class="nom_uni">'.$info["nombre_uni"].'</span>
							<a href="javascript:void(0)" class="edit_acreditado edit_int funct">Editar</a>
							<input type="hidden" name="idAcreditado[]" id="idAcreditado_'.$i.'" value="'.$info["id_universidad"].'"/> 
							
							<a href="javascript:void(0)" class="delete_acreditado del_int funct">Eliminar</a>
						</li>
						<li>
							<div class="new_programa">
								<ul>
								<li class="close_edit"><a class="close_edit_btn" href="javascript:void(0)">X</a></li>
									<li>
										<label>Universidad o Institución Educativa:</label>
										<input type="text" name="nombre_uni[]" id="nombre_uni_'.$i.'" max-lenght="500" value="'.$info["nombre_uni"].'" 
												class="requerido"  placeholder="">
									</li>
									<li>
										<label>Página Web:</label>
										<input type="text" name="pagina_web[]" id="pagina_web_'.$i.'" max-lenght="500" value="'.$info["website"].'" 
												class="requerido" placeholder="http:// ó https://">
									</li>
								</ul>
								<ul>
									<li>
										<label>Año:</label>
										<input type="text" name="anioAcreditado[]" maxlength="4" 
										 value="'.$info["anio"].'" id="anioAcreditado_'.$i.'" class="anioAcre">
									</li>
									<li>
										<label class="cat">Categorías:</label>
										<select class="fslect_cat"  name="categoriaAcreditado[]" id="categoriaAcreditado_'.$i.'">
											'.fnComboCategorias( $info["id_categoria"] ).'
										</select>
										<div class="fake_select"></div>
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
					<label>A&ntilde;o:</label>
					<input type="text" name="anioAcreditado[]" maxlength="4"  id="anioAcreditado_n" class="anioAcre" value="">
				</li>
				<li>
					<label>Categorías:</label>
					<select name="categoriaAcreditado[]" id="categoriaAcreditado_n">'.fnComboCategorias( ).'</select>
					</li>
			</ul>
			<button type="button" class="save_btn" id="guardar_acreditados_n" onclick="guardarAcreditados(this, \'n\');">Guardar</button>';

		return $template;	
	 }
?>	