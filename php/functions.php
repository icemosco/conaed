<?php
// Conectando, seleccionando la base de datos
$link = mysql_connect('localhost', 'conaed_admin', 'caludia0Peniche2018')
    or die('No se pudo conectar: ' . mysql_error());
echo 'Connected successfully';
mysql_select_db('cms-conaed') or die('No se pudo seleccionar la base de datos');



?>
