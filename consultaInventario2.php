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

$maxRows_inventario = 30;
$pageNum_inventario = 0;
if (isset($_GET['pageNum_inventario'])) {
  $pageNum_inventario = $_GET['pageNum_inventario'];
}
$startRow_inventario = $pageNum_inventario * $maxRows_inventario;

$fecha=$_GET["fecha"];
mysql_select_db($database_conexion, $conexion);
$query_inventario = "SELECT * FROM inventario where fecha='$fecha' ";
$query_limit_inventario = sprintf("%s LIMIT %d, %d", $query_inventario, $startRow_inventario, $maxRows_inventario);
$inventario = mysql_query($query_limit_inventario, $conexion) or die(mysql_error());
$row_inventario = mysql_fetch_assoc($inventario);

if (isset($_GET['totalRows_inventario'])) {
  $totalRows_inventario = $_GET['totalRows_inventario'];
} else {
  $all_inventario = mysql_query($query_inventario);
  $totalRows_inventario = mysql_num_rows($all_inventario);
}
$totalPages_inventario = ceil($totalRows_inventario/$maxRows_inventario)-1;

$queryString_inventario = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_inventario") == false && 
        stristr($param, "totalRows_inventario") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_inventario = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_inventario = sprintf("&totalRows_inventario=%d%s", $totalRows_inventario, $queryString_inventario);

if($totalRows_inventario==0){
 		echo "<script type=\"text/javascript\">alert ('No existen inventarios registrados con esta Fecha'); location.href='Principal.php?link=link13' </script>";
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

			var valor=confirm('¿Esta seguro de Eliminar este Inventario?');
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
<table width="401" border="1" align="center" cellpadding="0" cellspacing="0" class="bordes">
  <tr align="center">
    <th colspan="4" bgcolor="#990033" class="blancas" scope="col">CONSULTA DE INVENTARIOS</th>
  </tr>
  <tr align="center" class="centrar">
    <td width="133" align="center">Fecha</td>
    <td width="102">Modificar</td>
    <td width="68">Detalles</td>
    <td width="70">Eliminar</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_inventario['fecha']; ?></td>
      <td><div align="center" class="Estilo5"><span class="Estilo1"><? echo "<a href='principal.php?id=$row_inventario[id_inventario]&link=link15'>IR</a>";?></span></div></td>
      <td><div align="center" class="Estilo5" ><span class="Estilo1"><? echo "<a href='principal.php?id=$row_inventario[id_inventario]&link=link16'>IR</a>";?></span></div></td>
      <td><div align="center" class="Estilo5" ><span class="Estilo1"><? echo "<a onClick='return validar()' href='principal.php?id=$row_inventario[id_inventario]&link=link17'>IR</a>"; ?></span></div></td>
    </tr>
    <?php } while ($row_inventario = mysql_fetch_assoc($inventario)); ?>
</table>
<table border="0" align="center">
  <tr>
    <td><?php if ($pageNum_inventario > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_inventario=%d%s", $currentPage, 0, $queryString_inventario); ?>"><img src="imagenes/First.gif" /></a>
      <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_inventario > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_inventario=%d%s", $currentPage, max(0, $pageNum_inventario - 1), $queryString_inventario); ?>"><img src="imagenes/Previous.gif" /></a>
      <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_inventario < $totalPages_inventario) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_inventario=%d%s", $currentPage, min($totalPages_inventario, $pageNum_inventario + 1), $queryString_inventario); ?>"><img src="imagenes/Next.gif" /></a>
      <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_inventario < $totalPages_inventario) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_inventario=%d%s", $currentPage, $totalPages_inventario, $queryString_inventario); ?>"><img src="imagenes/Last.gif" /></a>
      <?php } // Show if not last page ?></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($inventario);
?>
