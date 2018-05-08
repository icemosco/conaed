<?php
    $oCnx      = new DbConnect();
	$itemsMenu = "";
	$permisos  = (!empty($_SESSION['permisosMenu'])) ? implode(",",explode("|",$_SESSION['permisosMenu'])) : '';
	$sql  	   = "SELECT * FROM menu 
			      WHERE id IN  ({$permisos}) ORDER BY orden";
	$res       = $oCnx->query($sql) or 
	   			 die("Error en el menu ". $oCnx->errno());
	$regs      = $res->num_rows;
    if($regs != 0)
    {
	   while($info = $res->fetch_array(MYSQLI_ASSOC))
	   {
		 	$itemsMenu .= '<li>
		 					<a href="'.$info['url'].'" class="btns_menu" rel="'.$info['relacion'].'">
		 						<span class="'.$info['icono'].'"></span>
		 						<span>'.$info['descripcion'].'</span>
		 					</a>
		 				 </li>';					
	   }
	}	  
	
	
?>
<ul class="menu">
	<?php echo $itemsMenu ?>
</ul>