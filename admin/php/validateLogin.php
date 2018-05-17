<?php
	include("../php/config.php");
	include("../php/DbConnect.php");
	include("../php/Usuario.php"); 
    
    $usr = trim($_POST['usuario']);
    $pwd = trim($_POST['contrasena']);
    
    
    if(empty( $usr )){
	    $enlace = "../views/index.php?msg=Ingrese un usuario";
		header("location: {$enlace}");
		exit;    
    }
    
    if(empty( $pwd )){
	    $enlace = "../views/index.php?msg=Ingrese una contraseña";
		header("location: {$enlace}");
		exit;
    }
    $oUsr  = new Usuario();
	  
	$oUsr->setUsuario($usr);
	$oUsr->setPassword( md5($pwd) );
	  
	$err   = $oUsr->login($_POST);

	if(!empty( $err )){
		header("location: ../views/login.php?msg=".$err); 
	}
?>	