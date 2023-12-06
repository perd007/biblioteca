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

$maxRows_usu = 30;
$pageNum_usu = 0;
if (isset($_GET['pageNum_usu'])) {
  $pageNum_usu = $_GET['pageNum_usu'];
}
$startRow_usu = $pageNum_usu * $maxRows_usu;

mysql_select_db($database_conexion, $conexion);
$query_usu = "SELECT * FROM usuario";
$query_limit_usu = sprintf("%s LIMIT %d, %d", $query_usu, $startRow_usu, $maxRows_usu);
$usu = mysql_query($query_limit_usu, $conexion) or die(mysql_error());
$row_usu = mysql_fetch_assoc($usu);

if (isset($_GET['totalRows_usu'])) {
  $totalRows_usu = $_GET['totalRows_usu'];
} else {
  $all_usu = mysql_query($query_usu);
  $totalRows_usu = mysql_num_rows($all_usu);
}
$totalPages_usu = ceil($totalRows_usu/$maxRows_usu)-1;

$queryString_usu = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_usu") == false && 
        stristr($param, "totalRows_usu") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_usu = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_usu = sprintf("&totalRows_usu=%d%s", $totalRows_usu, $queryString_usu);
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

			var valor=confirm('¿Esta seguro de Eliminar este Usuario?');
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
<table width="530" border="1" align="center" cellpadding="0" cellspacing="0" class="bordes">
  <tr align="center" bgcolor="#990033" class="blancas">
    <td width="90">Nombre</td>
    <td width="63">Cedula</td>
    <td width="123">Dependencia</td>
    <td width="46">Tipo</td>
    <td width="49">Fecha</td>
    <td width="60">Modificar</td>
    <td width="53">Eliminar</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_usu['nombre']; ?></td>
      <td><?php echo $row_usu['cedula']; ?></td>
      <td><?php echo $row_usu['depencia']; ?></td>
      <td><?php echo $row_usu['tipo']; ?></td>
      <td><?php echo $row_usu['fecha']; ?></td>
      <td class="Estilo5"><div align="center" class="Estilo5"><span class="Estilo1"><? echo "<a href='principal.php?id=$row_usu[id_usuario]&link=link4'>IR</a>";?></span></div></td>
      <td  class="Estilo5"><div align="center" class="Estilo5" ><span class="Estilo1"><? echo "<a onClick='return validar()' href='principal.php?id=$row_usu[id_usuario]&link=link5'>IR</a>"; ?></span></div></td>
    </tr>
    <?php } while ($row_usu = mysql_fetch_assoc($usu)); ?>
</table>
<table border="0" align="center">
  <tr>
    <td><?php if ($pageNum_usu > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_usu=%d%s", $currentPage, 0, $queryString_usu); ?>"><img src="imagenes/First.gif" /></a>
    <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_usu > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_usu=%d%s", $currentPage, max(0, $pageNum_usu - 1), $queryString_usu); ?>"><img src="imagenes/Previous.gif" /></a>
    <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_usu < $totalPages_usu) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_usu=%d%s", $currentPage, min($totalPages_usu, $pageNum_usu + 1), $queryString_usu); ?>"><img src="imagenes/Next.gif" /></a>
    <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_usu < $totalPages_usu) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_usu=%d%s", $currentPage, $totalPages_usu, $queryString_usu); ?>"><img src="imagenes/Last.gif" /></a>
    <?php } // Show if not last page ?></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($usu);
?>
