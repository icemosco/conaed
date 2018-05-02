<?php
	
class Funciones extends DbConnect 
{
	//Generamos un password aleatorio
	function randomPassword()
	{
		$longitud = 8;
		$carac = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
		$pwd = '';
		for ($i=0; $i<$longitud; ++$i){ 
			  $pwd .= substr($carac, (mt_rand() % strlen($carac)), 1);
		}	 
	    return trim($pwd);
	}
}	
?>	
