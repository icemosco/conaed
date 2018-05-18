<?php
function programas( $limite, $contador = false ){
	
	if(!empty ($limite) && $contador == false ){
		$extra='LIMIT '.$limite;
	}

	$oCnx      = new DbConnect();
	$sql  	   = "SELECT * FROM programas_1 ORDER BY id_universidad ".$extra;
	$res       = $oCnx->query($sql) or die( "Error en la universidad ". $oCnx->errno() );
	$regs      = $res->num_rows;
	$rowsTable = '';
	$contAcreditados = 1;
    if( $regs != 0 )
    {
	   while( $info = $res->fetch_array( MYSQLI_ASSOC ) )
	   {
		 	$rowsTable .= '<li>
								<span class="num">'.$contAcreditados.'</span>

								<span>'.$info['nombre_uni'].'</span>
								<a href="'.$info['website'].'" target="_blank">'.$info['website'].'</a>
								<span>'.$info['vigencia_ini'].' - '.$info['vigencia_fin'].'</span>								
							</li>';	
							$contAcreditados++;				
	   }

	}
	if($contador == true)
		return ($contAcreditados-1);
	else	
		return $rowsTable;
	
}

function padronEvaluadores( $limite = '' , $contador = false ){
	
	if(!empty ($limite) && $contador == false ){
		$extra='LIMIT '.$limite;
	}
	
	$oCnx      = new DbConnect();
	$sql  	   = "SELECT * FROM evaluadores ORDER BY a_paterno ".$extra;
	$res       = $oCnx->query($sql) or die( "Error en la evaluadores ". $oCnx->errno() );
	$regs      = $res->num_rows;
	
	if(!empty($limite))
		$numColum = ceil( $limite / 3 );
	else
		$numColum = ceil( $regs / 3 );
	
	$rowsTable = '';
	$contEvaluadores = 1;
	$contTemp  = 0;
    if( $regs != 0 )
    {
	   while( $info = $res->fetch_array( MYSQLI_ASSOC ) )
	   {
		    if( $contTemp == $numColum ){
			 	$rowsTable .="</ul></div>";  	
			   	$contTemp = 0;
		   	}
		   	if( $contTemp == 0 ){
				$rowsTable .= '<div class="cont_names">
								<span class="title_top">Nombre</span>
									<ul class="padron">';					
		   	}
		   	
		   	$rowsTable .= '<li><span class="num">'.$contEvaluadores.'</span><span>'.$info['a_paterno'].' '.$info['a_materno'].' '.$info['nombre'].'</span></li>';
		   	
		 	
		 	$contTemp++;
			$contEvaluadores++;				
	   }
	   
	   $rowsTable .="</ul></div>";  
	   
	   
	   if($contador == true)
			return ($contEvaluadores-1);
		else
			return $rowsTable;

	}
	
}


function mostrarSlider(){
	$oCnx       = new DbConnect();
	$sql  	    = "SELECT * FROM slider ORDER BY orden ";
	$regs       = $oCnx->query($sql) or die( "Error en slider ". $oCnx->errno() );
	$rowSliders = "";
	if( count($regs) > 0 )
    {
	   while( $info = $regs->fetch_array( MYSQLI_ASSOC ) )
	    {
			$rowSliders .= '<div class="swiper-slide">
								<div class="screen_slider"></div>
								<div class="txt1">'.$info['titulo'].'</div>
								<div class="txt2">'.$info['subtitulo'].'</div>
								<img src="img/slider/'.$info['img'].'">
							</div>';
		}
	}
	return $rowSliders;
		
}

function mostrarAsociados(){
	$oCnx = new DbConnect();
	$sql  = "SELECT * FROM referencias_asociados WHERE orden > 0 ORDER BY orden"; 
	$regs = $oCnx->query($sql) or die( "Error en asociados ". $oCnx->errno() );
	$rowAsociados = "";
	if( count($regs) > 0 )
    {
	   while( $info = $regs->fetch_array( MYSQLI_ASSOC ) )
	    {
			$rowAsociados .= '<li><img src="img/asociados/'.$info['img'].'"></li>';
		}
	}
	return $rowAsociados;	
}


?>
