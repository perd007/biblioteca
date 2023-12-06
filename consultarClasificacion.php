<?php require_once('Connections/conexion.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$currentPage = $_SERVER["PHP_SELF"];
 
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


$maxRows_inv = 30;
$pageNum_inv = 0;
if (isset($_GET['pageNum_inv'])) {
  $pageNum_inv = $_GET['pageNum_inv'];
}
$startRow_inv = $pageNum_inv * $maxRows_inv;

mysql_select_db($database_conexion, $conexion);
$query_inv = "SELECT * FROM clasificacion order by fecha";
$query_limit_inv = sprintf("%s LIMIT %d, %d", $query_inv, $startRow_inv, $maxRows_inv);
$inv = mysql_query($query_limit_inv, $conexion) or die(mysql_error());
$row_inv = mysql_fetch_assoc($inv);

if (isset($_GET['totalRows_inv'])) {
  $totalRows_inv = $_GET['totalRows_inv'];
} else {
  $all_inv = mysql_query($query_inv);
  $totalRows_inv = mysql_num_rows($all_inv);
}
$totalPages_inv = ceil($totalRows_inv/$maxRows_inv)-1;

$queryString_inv = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_inv") == false && 
        stristr($param, "totalRows_inv") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_inv = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_inv = sprintf("&totalRows_inv=%d%s", $totalRows_inv, $queryString_inv);

if($totalRows_inv==0){
 		echo "<script type=\"text/javascript\">alert ('No exiten Clasificaciones Registradas'); location.href='Principal.php?link=link7' </script>";
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

			var valor=confirm('¿Esta seguro de Eliminar esta Clasificacion?');
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
<table width="500" class="bordes" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th colspan="6" bgcolor="#990033" class="blancas" scope="col">Consulta de Clasificacion</th>
  </tr>
  <tr align="center">
    <td width="67">Tipo</td>
    <td width="79">Titulo</td>
    <td width="92">Volumen</td>
    <td width="130">Fecha</td>
    <td width="61">Modificar</td>
    <td width="51">Eliminar</td>
  </tr>
  <?php do { ?>
    <tr align="center">
      <td><?php echo $row_inv['tipo']; ?></td>
      <td><?php echo $row_inv['titulo']; ?></td>
      <td><?php echo $row_inv['volumen']; ?></td>
      <td><?php echo $row_inv['fecha']; ?></td>
      <td bgcolor="<?php echo $color; ?>" class="Estilo5"><div align="center" class="Estilo5" <?php echo $color2; ?>><span class="Estilo1"><? echo "<a href='principal.php?id=$row_inv[id_clasificacion]&link=link20'>IR</a>";?></span></div></td>
      <td bgcolor="<?php echo $color; ?>" class="Estilo5"><div align="center" class="Estilo5" <?php echo $color2; ?>><span class="Estilo1"><? echo "<a onClick='return validar()' href='principal.php?id=$row_inv[id_clasificacion]&link=link21'>IR</a>"; ?></span></div></td>
    </tr>
    <?php } while ($row_inv = mysql_fetch_assoc($inv)); ?>
</table>
<table border="0" align="center">
  <tr>
    <td><?php if ($pageNum_inv > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_inv=%d%s", $currentPage, 0, $queryString_inv); ?>"><img src="imagenes/First.gif" /></a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_inv > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_inv=%d%s", $currentPage, max(0, $pageNum_inv - 1), $queryString_inv); ?>"><img src="imagenes/Previous.gif" /></a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_inv < $totalPages_inv) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_inv=%d%s", $currentPage, min($totalPages_inv, $pageNum_inv + 1), $queryString_inv); ?>"><img src="imagenes/Next.gif" /></a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_inv < $totalPages_inv) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_inv=%d%s", $currentPage, $totalPages_inv, $queryString_inv); ?>"><img src="imagenes/Last.gif" /></a>
        <?php } // Show if not last page ?></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($inv);
?>
