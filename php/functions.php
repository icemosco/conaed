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


?>
