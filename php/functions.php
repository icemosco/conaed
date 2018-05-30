<?php


    //Paginador
	function Paginador($numPagina, $totalPaginas, $var ){
		$paginador = "";
		
		if(($numPagina-1) >= 1) 
			$paginador = '<li class="radius-left"><a href="./programas-acreditados.php?'.$var.'='.($numPagina-1).'">Anterior</a></li>';
		for($i = 1; $totalPaginas >= $i; $i++){
			$stylePag = ""; 
			if( $numPagina == $i) $stylePag = "active_page";
					
			$paginador .= '<li><a href="./programas-acreditados.php?'.$var.'='.$i.'" class="number_link '.$stylePag.'">'.$i .'</a></li>';
		}
		if(($numPagina+1) <= $totalPaginas) 
			$paginador .=  '<li class="radius-right"><a href="./programas-acreditados.php?'.$var.'='.($numPagina+1).'">Siguiente</a></li>';
		
		return $paginador;	
		
	}

//Paginador2
 function Paginador2($numPagina, $totalPaginas, $var ){
  $paginador = "";
  
  if(($numPagina-1) >= 1) 
   $paginador = '<li class="radius-left"><a href="#" onclick="paginadorAcreditados('.($numPagina-1).')">Anterior</a></li>';
  
  for($i = 1; $totalPaginas >= $i; $i++){
   $stylePag = ""; 
   if( $numPagina == $i) $stylePag = "active_page";
     
   
   $paginador .= '<li><a href="#" class="number_link '.$stylePag.'" onclick="paginadorAcreditados('.$i.')">'.$i.'</a></li>';
  }

  if(($numPagina+1) <= $totalPaginas) 
   $paginador .= '<li class="radius-right"><a href="#" onclick="paginadorAcreditados('.($numPagina+1).')">Siguiente</a></li>';
  
  return $paginador; 
  
 }

function programas( $numPagina, $filtro = '' ){
 
 $oCnx = new DbConnect();

 $condicion = '';
 if(!empty($filtro)){
  $condicion =  ' WHERE p.id_categoria = '.$filtro;
 }
 
 $totalRegXpag    = 15; 
 $inf['cantidad'] = 0;
 $sql             = "SELECT count(id_universidad) as cantidad FROM programas_1 p".$condicion;
 $res             = $oCnx->query($sql) or die( "Error en la universidad ". $oCnx->errno() );
 if( $res != 0 ){ $inf = $res->fetch_array( MYSQLI_ASSOC );} 

 $totalRegistros  = $inf['cantidad'];
 $totalPaginas    = ceil( $totalRegistros / $totalRegXpag );
 $empezarDesde    = ($numPagina-1) * $totalRegXpag;

 
 $limit = (!empty($totalRegXpag) ? "LIMIT {$empezarDesde}, {$totalRegXpag} " : '');
 
 

 $oCnx      = new DbConnect();
 $sql      = "SELECT * FROM programas_1 p 
      LEFT JOIN cat_categorias cat ON p.id_categoria = cat.id_categoria
      ".$condicion."
      ORDER BY id_universidad DESC ".$limit;
 $res       = $oCnx->query($sql) or die( "Error en la universidad ". $oCnx->errno() );
 $regs      = $res->num_rows;
 $rowsTable = '';
 $cont      = ($empezarDesde+1);
    if( $regs != 0 )
    {
    while( $info = $res->fetch_array( MYSQLI_ASSOC ) )
    {
    $rowsTable .= '<li>
        <span class="num">'.$cont.'</span>

        <span class="nom">'.$info['nombre_uni'].'</span>
        <a href="'.$info['website'].'" target="_blank">'.$info['website'].'</a>
        <span class="vig">'.$info['anio'].'</span>
        <span class="cat">'.$info['nombre'].'</span>
                
       </li>'; 
   $cont++;    
    }

 }
 
 $paginador = Paginador2($numPagina, $totalPaginas, 'pro');
 
 return array( 'template' => $rowsTable, 'paginador' => $paginador, 'totalRegistros' => $totalRegistros);
 
}

function padronEvaluadores( $limite = '' , $contador = false ){
 
 if(!empty ($limite) && $contador == false ){
  $extra='LIMIT '.$limite;
 }
 
 $oCnx      = new DbConnect();
 $sql      = "SELECT * FROM evaluadores ORDER BY id_evaluador DESC ".$extra;
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
    
    if($contTemp < $numColum)
    {
     for($i = ($contTemp); $numColum > $i ; $i++){
      $rowsTable .= '<li><span class="num">&nbsp;</span><span>&nbsp;</span></li>';
     }
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

function fnListCategorias(){
   $oCnx = new DbConnect();
     $listCategorias = array();
    $sql   = "SELECT * FROM cat_categorias ORDER BY nombre";
    $res   = $oCnx->query($sql) or die( "Error en categorias ". $oCnx->errno() );
  $regs  = $res->num_rows;
  
     if( $regs != 0 ){
     while( $info = $res->fetch_array( MYSQLI_ASSOC ) ){ 
       $listCategorias[] =  $info;
     }
  }
  return $listCategorias;

    }


//funcion de noticias en home
function mostrarnota_home(){
	$oCnx = new DbConnect();
	$sql  = "SELECT * FROM temas_noticias ORDER BY id DESC LIMIT 1"; 
	$regs = $oCnx->query($sql) or die( "Error en noticias ". $oCnx->errno() );
	$rownoticias = "";
	
	if( count($regs) > 0 )
    {
	   while( $info = $regs->fetch_array( MYSQLI_ASSOC ) )
	    {
			$contenido=$info["contenido"];
			$contenido = str_replace(PHP_EOL, '<br />', $contenido);
			$rownoticias .= '
								<h3>'.$info['titulo'].'</h3>
							 <span class="sub_"><strong>'.$info['fecha'].' / Lic. Fernando Peniche</strong></span>
							 <div class="img_t"><img src="img/temas/'.$info['img'].'" alt="" /></div>
							<p>'.$contenido.'</p>
							
			
			';
		}
	}
	return $rownoticias;	
}

function mostrarnota_int(){
	$oCnx = new DbConnect();
	$sql  = "SELECT * FROM temas_noticias ORDER BY id DESC"; 
	$regs = $oCnx->query($sql) or die( "Error en noticias ". $oCnx->errno() );
	$rownoticias_int = "";
	if( count($regs) > 0 )
    {
	   while( $info = $regs->fetch_array( MYSQLI_ASSOC ) )
	    {
			$contenido=$info["contenido"];
			$contenido = str_replace(PHP_EOL, '<br /><br />', $contenido);
			$rownoticias_int .= '
									<div class="block_t_int">
									
									<h3>'.$info['titulo'].'</h3>
							 <span class="sub_"><strong>'.$info['fecha'].' / Lic. Fernando Peniche</strong></span>
							 <div class="img_t_int"><img src="img/temas/'.$info['img'].'" alt="" /></div>
							<p class="nopadding1 int_art">'.$contenido.'</p>
							<div class="redes_int">
								<a href="" class="">fb</a>
								<a href="" class="">tw</a>
								<a href="" class="">lnkd</a>
							</div>
							</div>
							
							
			
			';
		}
	}
	return $rownoticias_int;	
}
function mostrartitulos_slider(){
	$oCnx = new DbConnect();
	$sql  = "SELECT * FROM slider ORDER BY id DESC LIMIT 3"; 
	$regs = $oCnx->query($sql) or die( "Error en not_slider ". $oCnx->errno() );
	$rownonot_slide = "";
	if( count($regs) > 0 )
    {
	   while( $info = $regs->fetch_array( MYSQLI_ASSOC ) )
	    {
			$rownonot_slide .= '<li>
									<a href="javascript:void(0)">
										<span>'.$info['titulo'].'</span>
									</a>
									<span class="autor"><strong>03 May 2018 / Lic. Fernando Peniche</strong>
									</span>
								</li>
			
			';
		}
	}
	return $rownonot_slide;	
}

function mostrartitulos_slider_int(){
	$oCnx = new DbConnect();
	$sql  = "SELECT * FROM slider ORDER BY id DESC"; 
	$regs = $oCnx->query($sql) or die( "Error en not_slider ". $oCnx->errno() );
	$rownonot_slide_int = "";
	if( count($regs) > 0 )
    {
	   while( $info = $regs->fetch_array( MYSQLI_ASSOC ) )
	    {
			$rownonot_slide_int .= '<li>
									<a href="javascript:void(0)">
										<span>'.$info['titulo'].'</span>
									</a>
									<span class="autor"><strong>03 May 2018 / Lic. Fernando Peniche</strong>
									</span>
								</li>
			
			';
		}
	}
	return $rownonot_slide_int;	
}

?>
