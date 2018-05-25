<?php 
include_once("config.php");
include_once("DbConnect.php");

$id=$_POST['id'];
$oCnx = new DbConnect();
$sql = "Delete From referencias_asociados Where id='$id'";
$res = $oCnx->query($sql) or die( "Error al borrar ". $oCnx->errno() );

echo $res;


?>