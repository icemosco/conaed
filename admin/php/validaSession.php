<?php
	include_once("../php/config.php");
	
	
	//Si el usuario no se encuentra logueado lo sacamos de la sesion
	if(!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] != true ) {
		
    header ("Location: ./views/login.php");
    exit;
	}
	
?>	