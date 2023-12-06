<?php require_once('Connections/conexion.php'); ?>
<?php
if($validacion==true){
	if($eli==0){
	echo "<script type=\"text/javascript\">alert ('Usted no posee permisos para realizar Eliminaciones'); location.href='principal.php' </script>";
 exit;
	}
}
else{
echo "<script type=\"text/javascript\">alert ('Error usuario invalido'); location.href='principal.php' </script>";
 exit;
 }
?>
<?php

//recibimos la id
$id=$_GET["id"];

$cedula=$_GET["cedula"];

$sql="delete from prestamo where id_prestamo=$id";
$verificar=mysql_query($sql,$conexion) or die(mysql_error());

if($verificar){
	echo"<script type=\"text/javascript\">alert ('Datos Eliminado'); location.href='principal.php?link=link8&cedula=$cedula' </script>";
}
else{
	echo"<script type=\"text/javascript\">alert ('Error'); location.href='principal.php?link=link8&cedula=$cedula' </script>";
	
}//fin de l primer else


?>