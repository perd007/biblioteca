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


$fecha1=$_GET["fecha"];
$fecha2=$_GET["fecha2"];

if($fecha1>$fecha2){
	echo "<script type=\"text/javascript\">alert ('La fecha desde no puede ser mayor que la fecha hasta'); location.href='Principal.php?link=link28' </script>";
  		exit;
}

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_usu = 20;
$pageNum_usu = 0;
if (isset($_GET['pageNum_usu'])) {
  $pageNum_usu = $_GET['pageNum_usu'];
}
$startRow_usu = $pageNum_usu * $maxRows_usu;

mysql_select_db($database_conexion, $conexion);
$query_usu = "SELECT fecha FROM usuario  where fecha>='$fecha1' and fecha<='$fecha2' order by fecha";
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

<body>
<table width="494" border="1" align="center" cellpadding="0" cellspacing="0" class="bordes">
  <tr bgcolor="#990033">
    <th width="168" align="center" valign="bottom" scope="col"><span class="blancas">Fecha</span></th>
    <th colspan="3" align="center" bgcolor="#990033" scope="col"><span class="blancas">Usuarios</span></th>
  </tr>
  <tr class="centrar">
    <th width="168" align="center" valign="bottom" bgcolor="#990033" scope="col"><div class="blancas"><?php echo $fecha1." - ".$fecha2;?></div></th>
    <td width="90" bgcolor="#990033"><span class="blancas">Sala</span></td>
    <td width="102" bgcolor="#990033"><span class="blancas">Circulante</span></td>
    <td width="118" bgcolor="#990033"><span class="blancas">Aula</span></td>
  </tr>
  <?php
  $contador1=0;
  $contador2=0;
  $contador3=0;
  
  do {
	  
	  mysql_select_db($database_conexion, $conexion);
$query_usu1 = "SELECT count(*) FROM usuario where tipo='SALA' and fecha='$row_usu[fecha]' group by fecha";
$usu1 = mysql_query($query_usu1, $conexion) or die(mysql_error());
$row_usu1 = mysql_fetch_assoc($usu1);
$totalRows_usu1 = mysql_num_rows($usu1);

mysql_select_db($database_conexion, $conexion);
$query_usu2 = "SELECT count(*) FROM usuario where tipo='CIRCULANTE' and fecha='$row_usu[fecha]' group by fecha";
$usu2 = mysql_query($query_usu2, $conexion) or die(mysql_error());
$row_usu2 = mysql_fetch_assoc($usu2);
$totalRows_usu2 = mysql_num_rows($usu2);

mysql_select_db($database_conexion, $conexion);
$query_usu3 = "SELECT count(*) FROM usuario where tipo='AULA' and fecha='$row_usu[fecha]' group by fecha";
$usu3 = mysql_query($query_usu3, $conexion) or die(mysql_error());
$row_usu3 = mysql_fetch_assoc($usu3);
$totalRows_usu3 = mysql_num_rows($usu3);

if($row_usu1["count(*)"]>0){
	$var1=$row_usu1["count(*)"];
}else{
	$var1=0;	
}

if($row_usu2["count(*)"]>0){
	$var2=$row_usu2["count(*)"];
}else{
	$var2=0;	
}

if($row_usu3["count(*)"]>0){
	$var3=$row_usu3["count(*)"];
}else{
	$var3=0;	
}

//contadores
$contador1= $contador1 + $var1;
$contador2= $contador2 + $var2;
$contador3= $contador3 + $var3;
	  
	  ?>
    <tr align="center">
      <td><div class="centrar"><?php echo $row_usu["fecha"];?></div></td>
      <td><div class="centrar"><?php echo $var1;?></div></td>
      <td><div class="centrar"><?php echo $var2;?></div></td>
      <td><div class="centrar"><?php echo $var3;?></div></td>
    </tr>
    <?php } while ($row_usu = mysql_fetch_assoc($usu)); ?>
    <tr align="center" bgcolor="#990033">
      <td ><div class="blancas">TOTAL</div></td>
      <td><div class="blancas"><?php echo $contador1;?></div></td>
      <td><div class="blancas"><?php echo $contador2;?></div></td>
      <td><div class="blancas"><?php echo $contador3;?></div></td>
    </tr>
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
mysql_free_result($usu1);

mysql_free_result($usu2);

mysql_free_result($usu3);

mysql_free_result($usu);
?>
