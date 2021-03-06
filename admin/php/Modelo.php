<?php
if(!isset($_SESSION)) { session_start(); }
class Modelo extends DbConnect 
{
	public function __construct()
	{	 
    	parent::__construct();  
  	}
  	function fnBuscaSlide(){
  		$infoSlider = array();
  		$sql   = "SELECT * FROM slider ORDER BY orden";
  		$res   = $this->query($sql) or die( "Error en el slider ". $oCnx->errno() );
		$regs  = $res->num_rows;
		
	    if( $regs != 0 ){
		   while( $info = $res->fetch_array( MYSQLI_ASSOC ) ){	
		   		$infoSlider[] =  $info;
		   }
		}
		return $infoSlider;
  	}
  	
	function fnInsertaSlide( $numSlide, $titulo, $subTitulo, $nomImagen)
	{
		$sql  = "INSERT INTO slider(titulo, subtitulo, orden, img)
					 VALUES('".$titulo."','".$subTitulo."',".$numSlide.",'".$nomImagen."')";
		$res  = $this->query($sql) or 
		   			die("Error en query insertar slider ". $this->errno());
		   	
		 $id   = $this->insert_id();	
		 return $id;	
		
	}
	function fnActualizaSlide( $idSlide, $numSlide, $titulo, $subTitulo, $nomImagen)
	{
		$extra = '';
		if(!empty($nomImagen)) $extra = ", img = '".$nomImagen."'";
		$sql = "UPDATE slider SET titulo    = '{$titulo}'
									, subtitulo = '{$subTitulo}'
									, orden     = '{$numSlide}' 
									{$extra}
						WHERE id= {$idSlide}";
		$res  = $this->query($sql);		
		return $idSlide;	
	}
	
	function fnListAcreditados( $empezarDesde = '', $cantidadReg = ''){
		
		$limit = (!empty($cantidadReg) ? "LIMIT {$empezarDesde}, {$cantidadReg} " : '');
		
		$sql   = "SELECT * FROM programas_1 ORDER BY id_universidad DESC $limit";
		$res   = $this->query($sql) or die( "Error en  Acreditados ". $oCnx->errno() );
		$regs  = $res->num_rows;
	    if( $regs != 0 ){
		   while( $info = $res->fetch_array( MYSQLI_ASSOC ) ){	
		   		$infoAcreditados[] =  $info;
		   }
		}
		
		return $infoAcreditados;
	}
	
	
	function fnInsertaAcreditados( $nombreUni, $paginaWeb, $anio, $idCategoria ){
		$sql  = "INSERT INTO programas_1(nombre_uni, website, anio, id_categoria)
					VALUES('".addslashes( $nombreUni )."','".$paginaWeb."', ".$anio.", ".$idCategoria.")";	
		$res  = $this->query($sql) or 
		   			die("Error en query insertar acreditados ". $this->errno());
		   	
		 $id   = $this->insert_id();	
		 return $id;
	}
	
	function fnActualizaAcreditados( $idAcreditado, $nombreUni, $paginaWeb, $anio, $idCategoria )
	{
		//STR_TO_DATE('".$fechaIni."', '%d-%m-%Y')
		$sql = "UPDATE programas_1 SET nombre_uni    = '".addslashes( $nombreUni )."'
									, website        = '".$paginaWeb."'
									, anio   		 = ".$anio."
									, id_categoria   = ".$idCategoria."
						WHERE id_universidad = ".$idAcreditado;				
		$res  = $this->query($sql);		
		return $idAcreditado;	
	}
	
	function fnEliminarAcreditados( $idAcreditado ){
		$sql = "DELETE FROM programas_1 WHERE id_universidad = {$idAcreditado}";
		$this->query($sql);		
		
		return "OK";		
	}
	
	function fnListEvaluadores( $empezarDesde = '', $cantidadReg = '' ){
		$limit = (!empty($cantidadReg) ? "LIMIT {$empezarDesde}, {$cantidadReg} " : '');
		
		$sql   = "SELECT * FROM evaluadores ORDER BY id_evaluador DESC ".$limit;
		$res   = $this->query($sql) or die( "Error en evaluadores ". $oCnx->errno() );
		$regs  = $res->num_rows;
	    if( $regs != 0 ){
		   while( $info = $res->fetch_array( MYSQLI_ASSOC ) ){	
		   		$infoEvaluadores[] =  $info;
		   }
		}
		
		return $infoEvaluadores;
	}

	function fnInsertaEvaluadores( $nombre, $paterno, $materno ){
		global $_SESSION;
		$sql  = "INSERT INTO evaluadores(nombre, a_paterno, a_materno, by_user)
					VALUES('".$nombre."','".$paterno."','".$materno."','".$_SESSION['usrName']."')";	
		$res  = $this->query($sql) or 
		   			die("Error en query insertar acreditados ". $this->errno());
		   	
		 $id   = $this->insert_id();	
		 return $id;
	}
	//, last_update   = NOW()
	function fnActualizaEvaluadores( $idEvaluador, $nombre, $paterno, $materno )
	{
		$sql = "UPDATE evaluadores SET nombre         = '{$nombre}'
									  , a_paterno       = '{$paterno}'
									  , a_materno       = '{$materno}'
									  , by_user       = '".$_SESSION['usrName']."'
						WHERE id_evaluador = {$idEvaluador}";				
		$res  = $this->query($sql);		
		return $idAcreditado;	
	}
	
	function fnEliminarEvaluadores( $idEvaluador ){
		$sql = "DELETE FROM evaluadores WHERE id_evaluador = {$idEvaluador}";
		$this->query($sql);		
		
		return "OK";		
	}
	
	function fnInsertaAsociados( $imgAsociado ){
		$sql  = "INSERT INTO referencias_asociados(img)
					VALUES('".$imgAsociado."')";	
		$this->query($sql) or 
		   			die("Error en query insertar asociados ". $this->errno());
		 return 'OK';
	}

	function fnActualizaOrdenAsociado($idAsociado, $orden){
		$sql = "UPDATE referencias_asociados SET orden = {$orden} WHERE id={$idAsociado}";
		$this->query($sql) or die( "Error en orden asociados ". $oCnx->errno() );
		return "OK";
	}
	function fnEliminarSociados( $idAsociado ){
		$sql = "DELETE FROM referencias_asociados WHERE id = {$idAsociado}";
  	$this->query($sql);  
  
		return "OK";  
	}
	
	function fnListAsociados(){
  		$infoASociados = array();
  		$sql   = "SELECT * FROM referencias_asociados ORDER BY orden";
  		$res   = $this->query($sql) or die( "Error en asociados ". $oCnx->errno() );
		$regs  = $res->num_rows;
		
	    if( $regs != 0 ){
		   while( $info = $res->fetch_array( MYSQLI_ASSOC ) ){	
		   		$infoASociados[] =  $info;
		   }
		}
		return $infoASociados;
  	}

  	//Obtenemos las categorias de acreditados
  	 function fnListCategorias(){
  	 	$listCategorias = array();
  		$sql   = "SELECT * FROM cat_categorias ORDER BY nombre";
  		$res   = $this->query($sql) or die( "Error en categorias ". $oCnx->errno() );
		$regs  = $res->num_rows;
		
	    if( $regs != 0 ){
		   while( $info = $res->fetch_array( MYSQLI_ASSOC ) ){	
		   		$listCategorias[] =  $info;
		   }
		}
		return $listCategorias;

  	 }

  	 function fnListNoticias( $empezarDesde = '', $cantidadReg = '' ){
  	 	$noticias = array();

  		/*$sql   = "SELECT * FROM temas_noticias ORDER BY id";
  		$res   = $this->query($sql) or die( "Error en noticias ". $oCnx->errno() );
		$regs  = $res->num_rows;

		$limit = (!empty($cantidadReg) ? "LIMIT {$empezarDesde}, {$cantidadReg} " : '');
*/
		
		$sql   = "SELECT * FROM temas_noticias ORDER BY id DESC ".$limit;
		$res   = $this->query($sql) or die( "Error en noticias ". $oCnx->errno() );
		$regs  = $res->num_rows;
	    if( $regs != 0 ){
		   while( $info = $res->fetch_array( MYSQLI_ASSOC ) ){	
		   		$noticias[] =  $info;
		   }
		}
		
		return $noticias;
	}


	function fnInsertaNotica( $titulo, $contenido, $nomImagen)
	{
			
		$sql  = "INSERT INTO temas_noticias(titulo, contenido, img, fecha)
					 VALUES('".$titulo."','".$contenido."','".$nomImagen."', NOW())";
		$res  = $this->query($sql) or 
		   			die("Error en query insertar noticia ". $this->errno());
		   	
		 $id   = $this->insert_id();	
		 return $id;	
		
	}

	function fnActualizaNoticia( $idNoticia, $titulo, $contenido, $nomImagen)
	{
		$extra = '';
		if(!empty($nomImagen)) $extra = ", img = '".$nomImagen."'";

		$sql = "UPDATE temas_noticias SET titulo    = '{$titulo}'
									, contenido = '{$contenido}'
									, fecha = NOW()
									{$extra}
						WHERE id= {$idNoticia}";
		$res  = $this->query($sql);		
		return $idNoticia;	
	}
	function fnEliminarNoticia ( $idNoticia ){
		$sql = "DELETE FROM temas_noticias WHERE id = {$idNoticia}";
		$this->query($sql);		
		
		return "OK";		
	}
	
}	
?>	
