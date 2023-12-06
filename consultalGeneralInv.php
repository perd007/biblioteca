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

$maxRows_inventario = 10;
$pageNum_inventario = 0;
if (isset($_GET['pageNum_inventario'])) {
  $pageNum_inventario = $_GET['pageNum_inventario'];
}
$startRow_inventario = $pageNum_inventario * $maxRows_inventario;

mysql_select_db($database_conexion, $conexion);
$query_inventario = "SELECT * FROM inventario";
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="estilos.css" rel="stylesheet" type="text/css" />
<title>Documento sin título</title>
</head>

<body>
<table width="425" border="1" align="center" cellpadding="0" cellspacing="0" class="bordes">
  <tr align="center">
    <th colspan="3" bgcolor="#990033" class="blancas" scope="col">CONSULTA GENERAL DE INVENTARIOS</th>
  </tr>
  <tr align="center" class="centrar">
    <td width="165" align="center">Fecha</td>
    <td width="127">Tipo</td>
    <td width="119">Mas Detalles</td>
  </tr>
  <?php do { ?>
  <tr>
    <td><?php echo $row_inventario['fecha']; ?></td>
    <td><div align="center" class="Estilo5"><?php echo $row_inventario['tipo']; ?></div></td>
    <td><div align="center" class="Estilo5" ><span class="Estilo1"><? echo "<a href='principal.php?fecha=$row_inventario[fecha]&link=link14'>IR</a>";?></span></div></td>
    </tr>
  <?php } while ($row_inventario = mysql_fetch_assoc($inventario)); ?>
</table>
<table border="0" align="center">
  <tr>
    <td><?php if ($pageNum_inventario > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_inventario=%d%s", $currentPage, 0, $queryString_inventario); ?>"><img src="First.gif" /></a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_inventario > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_inventario=%d%s", $currentPage, max(0, $pageNum_inventario - 1), $queryString_inventario); ?>"><img src="Previous.gif" /></a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_inventario < $totalPages_inventario) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_inventario=%d%s", $currentPage, min($totalPages_inventario, $pageNum_inventario + 1), $queryString_inventario); ?>"><img src="Next.gif" /></a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_inventario < $totalPages_inventario) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_inventario=%d%s", $currentPage, $totalPages_inventario, $queryString_inventario); ?>"><img src="Last.gif" /></a>
        <?php } // Show if not last page ?></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($inventario);
?>
