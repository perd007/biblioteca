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

$maxRows_pre = 10;
$pageNum_pre = 0;
if (isset($_GET['pageNum_pre'])) {
  $pageNum_pre = $_GET['pageNum_pre'];
}
$startRow_pre = $pageNum_pre * $maxRows_pre;

mysql_select_db($database_conexion, $conexion);
$query_pre = "SELECT * FROM prestamo";
$query_limit_pre = sprintf("%s LIMIT %d, %d", $query_pre, $startRow_pre, $maxRows_pre);
$pre = mysql_query($query_limit_pre, $conexion) or die(mysql_error());
$row_pre = mysql_fetch_assoc($pre);

if (isset($_GET['totalRows_pre'])) {
  $totalRows_pre = $_GET['totalRows_pre'];
} else {
  $all_pre = mysql_query($query_pre);
  $totalRows_pre = mysql_num_rows($all_pre);
}
$totalPages_pre = ceil($totalRows_pre/$maxRows_pre)-1;

$queryString_pre = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_pre") == false && 
        stristr($param, "totalRows_pre") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_pre = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_pre = sprintf("&totalRows_pre=%d%s", $totalRows_pre, $queryString_pre);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="estilos.css" rel="stylesheet" type="text/css" />

<title>Documento sin título</title>
</head>

<body>
<table width="585" class="bordes" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr align="center">
    <th colspan="5" bgcolor="#990033" class="blancas" scope="col">CONSULTA GENERAL DE PRESTAMOS</th>
  </tr>
  <tr align="center" class="blancas">
    <td width="135" bgcolor="#990033">Prestamo:</td>
    <td width="132" bgcolor="#990033">Entrega:</td>
    <td width="146" bgcolor="#990033">Devolucion:</td>
    <td width="85" bgcolor="#990033">Titulo</td>
    <td width="69" bgcolor="#990033">Detalle</td>
  </tr>
  <?php do { ?>
  <tr align="center">
    <td><?php echo $row_pre['fecha_prestamo']; ?></td>
    <td><?php echo $row_pre['fecha_entrega']; ?></td>
    <td><?php echo $row_pre['fecha_devolucion']; ?></td>
    <td bgcolor="<?php echo $color; ?>" class="Estilo5"><div align="center" class="Estilo5" <?php echo $color2; ?>><?php echo $row_pre['titulo']; ?></div></td>
    <td bgcolor="<?php echo $color; ?>" class="Estilo5"><span class="Estilo1"><? echo "<a href='principal.php?cedula=$row_pre[cedula]&link=link8'>IR</a>"; ?></span></td>
    </tr>
  <?php } while ($row_pre = mysql_fetch_assoc($pre)); ?>
</table>
<table border="0" align="center">
  <tr>
    <td><?php if ($pageNum_pre > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_pre=%d%s", $currentPage, 0, $queryString_pre); ?>"><img src="First.gif" /></a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_pre > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_pre=%d%s", $currentPage, max(0, $pageNum_pre - 1), $queryString_pre); ?>"><img src="Previous.gif" /></a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_pre < $totalPages_pre) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_pre=%d%s", $currentPage, min($totalPages_pre, $pageNum_pre + 1), $queryString_pre); ?>"><img src="Next.gif" /></a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_pre < $totalPages_pre) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_pre=%d%s", $currentPage, $totalPages_pre, $queryString_pre); ?>"><img src="Last.gif" /></a>
        <?php } // Show if not last page ?></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($pre);
?>
