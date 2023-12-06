<?php require_once('Connections/conexion.php'); ?>
<?php
if($validacion==true){
	if($Admi==0){
	echo "<script type=\"text/javascript\">alert ('Usted no posee permisos Administrativos'); location.href='principal.php' </script>";
 exit;
	}
}
else{
echo "<script type=\"text/javascript\">alert ('Error usuario invalido'); location.href='principal.php' </script>";
 exit;
 }

//recibimos la id
$id=$_GET["id"];


$sql2="select * from seguridad where id_seg=$id";
$verificar2=mysql_query($sql2,$conexion) or die(mysql_error());
$row_verificar2=mysql_fetch_assoc($verificar2);

if($row_verificar2["administrar"]==1){
$sql3="select count(*) from seguridad where id_seg!=$id and administrar=1 ";
$verificar3=mysql_query($sql3,$conexion) or die(mysql_error());
$row_verificar3=mysql_fetch_assoc($verificar3);
	if($row_verificar3["count(*)"]==0){
		echo "<script type=\"text/javascript\">alert ('No puede eliminar todos los usuarios con permisos de administrar');  location.href='principal.php?link=link23' </script>";
		exit;
		}
}

$sql="delete from seguridad where id_seg=$id";
$verificar=mysql_query($sql,$conexion) or die(mysql_error());

if($verificar){
	if($HTTP_COOKIE_VARS["usr"]==$row_verificar2['usuario']){
 echo "<script type=\"text/javascript\">alert ('INICIE SESION NUEVAMENTE');  location.href='cerrarSesion.php' </script>";

 }else{
	echo"<script type=\"text/javascript\">alert ('usuario Eliminada'); location.href='principal.php?link=link23' </script>";
 }}
else{
	echo"<script type=\"text/javascript\">alert ('Error'); location.href='principal.php?link=link23' </script>";
	
}//fin de l primer else

*/
?>