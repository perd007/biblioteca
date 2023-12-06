<?php require_once('Connections/conexion.php'); ?>
<?php 
//validar usuario
if($validacion==true){
	if($cons==0){
	echo "<script type=\"text/javascript\">alert ('Usted no posee permisos para realizar Consultas'); location.href='principal.php' </script>";
    exit;
	}
}
else{
echo "<script type=\"text/javascript\">alert ('Error usuario invalido');  location.href='principal.php'  </script>";
 exit;
}
?>
<?php

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_prestamo = 30;
$pageNum_prestamo = 0;
if (isset($_GET['pageNum_prestamo'])) {
  $pageNum_prestamo = $_GET['pageNum_prestamo'];
}
$startRow_prestamo = $pageNum_prestamo * $maxRows_prestamo;

$cedula=$_GET["cedula"];

mysql_select_db($database_conexion, $conexion);
$query_prestamo = "SELECT * FROM prestamo where cedula=$cedula order by fecha_prestamo";
$query_limit_prestamo = sprintf("%s LIMIT %d, %d", $query_prestamo, $startRow_prestamo, $maxRows_prestamo);
$pre = mysql_query($query_limit_prestamo, $conexion) or die(mysql_error());
$row_pre = mysql_fetch_assoc($pre);

if (isset($_GET['totalRows_prestamo'])) {
  $totalRows_prestamo = $_GET['totalRows_prestamo'];
} else {
  $all_prestamo = mysql_query($query_prestamo);
  $totalRows_prestamo = mysql_num_rows($all_prestamo);
}
$totalPages_prestamo = ceil($totalRows_prestamo/$maxRows_prestamo)-1;

$queryString_prestamo = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_prestamo") == false && 
        stristr($param, "totalRows_prestamo") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_prestamo = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_prestamo = sprintf("&totalRows_prestamo=%d%s", $totalRows_prestamo, $queryString_prestamo);

if($totalRows_prestamo==0){
 		echo "<script type=\"text/javascript\">alert ('Este Usuario no tiene prestamos'); location.href='Principal.php?link=link7' </script>";
  		exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="estilos.css" rel="stylesheet" type="text/css" />
<title>Documento sin título</title>
</head>
<script language="javascript">
<!--

function validar(){

			var valor=confirm('¿Esta seguro de Eliminar este Prestamo?');
			if(valor==false){
			return false;
			}
			else{
			return true;
			}
		
}
//-->
</script>
<body>
 <table width="533" class="bordes" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr align="center">
    <th colspan="6" bgcolor="#990033" class="blancas" scope="col">CONSULTA DE PRESTAMOS</th>
  </tr>
  <tr align="center">
    <th colspan="6" scope="col"><?php echo $row_pre['cedula']; ?>&nbsp;&nbsp; <?php echo $row_pre['usuario']; ?></th>
  </tr>
  <tr align="center" class="blancas">
    <td width="135" bgcolor="#990033">Prestamo</td>
    <td width="150" bgcolor="#990033">Devolucion:</td>
    <td width="84" bgcolor="#990033">Titulo</td>
    <td width="59" bgcolor="#990033">Modificar</td>
    <td width="42" bgcolor="#990033">Detalle</td>
    <td width="48" bgcolor="#990033">Eliminar</td>
  </tr>
  <?php do { ?>
    <tr align="center">
      <td><?php echo $row_pre['fecha_prestamo']; ?></td>
      <td><?php echo $row_pre['fecha_devolucion']; ?></td>
      <td><?php echo $row_pre['titulo']; ?></td>
      <td bgcolor="<?php echo $color; ?>" class="Estilo5"><div align="center" class="Estilo5" <?php echo $color2; ?>><span class="Estilo1"><? echo "<a href='principal.php?id= $row_pre[id_prestamo]&cedula=$row_pre[cedula]&link=link9'>IR</a>";?></span></div></td>
      <td bgcolor="<?php echo $color; ?>" class="Estilo5"><span class="Estilo1"><? echo "<a href='principal.php?id=$row_pre[id_prestamo]&cedula= $row_pre[cedula]&link=link10'>IR</a>"; ?></span></td>
      <td bgcolor="<?php echo $color; ?>" class="Estilo5"><div align="center" class="Estilo5" <?php echo $color2; ?>><span class="Estilo1"><? echo "<a onClick='return validar()' href='principal.php?id=$row_pre[id_prestamo]&link=link11&cedula=$row_pre[cedula]'>IR</a>"; ?></span></div></td>
    </tr>
    <?php } while ($row_pre = mysql_fetch_assoc($pre)); ?>
</table>
<table border="0" align="center">
  <tr>
    <td><?php if ($pageNum_prestamo > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_prestamo=%d%s", $currentPage, 0, $queryString_prestamo); ?>"><img src="imagenes/First.gif" /></a>
      <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_prestamo > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_prestamo=%d%s", $currentPage, max(0, $pageNum_prestamo - 1), $queryString_prestamo); ?>"><img src="imagenes/Previous.gif" /></a>
      <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_prestamo < $totalPages_prestamo) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_prestamo=%d%s", $currentPage, min($totalPages_prestamo, $pageNum_prestamo + 1), $queryString_prestamo); ?>"><img src="imagenes/Next.gif" /></a>
      <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_prestamo < $totalPages_prestamo) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_prestamo=%d%s", $currentPage, $totalPages_prestamo, $queryString_prestamo); ?>"><img src="imagenes/Last.gif" /></a>
      <?php } // Show if not last page ?></td>
  </tr>
</table>
</body>
</html>

