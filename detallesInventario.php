<?php require_once('Connections/conexion.php'); ?>
<?php

$id=$_GET["id"];
mysql_select_db($database_conexion, $conexion);
$query_inventario = "SELECT * FROM inventario where id_inventario=$id";
$inventario = mysql_query($query_inventario, $conexion) or die(mysql_error());
$row_inventario = mysql_fetch_assoc($inventario);
$totalRows_inventario = mysql_num_rows($inventario);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="estilos.css" rel="stylesheet" type="text/css" />
<title>Documento sin título</title>
</head>

<body>
<table class="bordes" width="358" align="center">
  <tr valign="baseline">
    <td colspan="4" align="center" nowrap="nowrap" bgcolor="#990033" class="blancas">INVENTARIO DEL MATERIAL BIBLIOGRAFICO</td>
  </tr>
  <tr valign="baseline">
    <td colspan="2" align="right" nowrap="nowrap">Clasificacion:</td>
    <td colspan="2"><?php echo $row_inventario['clasificacion']; ?></td>
  </tr>
  <tr valign="baseline">
    <td colspan="2" align="right" nowrap="nowrap">Tipo de Material</td>
    <td colspan="2"><?php echo $row_inventario['tipo']; ?></td>
  </tr >
  <tr valign="baseline">
    <td colspan="2" align="right" nowrap="nowrap">BIOG.:</td>
    <td colspan="2"><?php echo $row_inventario['biog']; ?></td>
  </tr>
  <tr align="center" valign="baseline">
    <td colspan="2" nowrap="nowrap" bgcolor="#990033" class="blancas">Titulo</td>
    <td colspan="2" bgcolor="#990033" class="blancas">Volumen</td>
  </tr>
  <tr align="center" valign="baseline">
    <td width="83" nowrap="nowrap" >EXIST</td>
    <td width="83" nowrap="nowrap" >PERD</td>
    <td width="83"  nowrap="nowrap">EXIST</td>
    <td width="83"  nowrap="nowrap">PERD</td>
  </tr>
  <tr align="center" valign="baseline">
    <td nowrap="nowrap" ><?php echo $row_inventario['exiTitulo']; ?></td>
    <td nowrap="nowrap" ><?php echo $row_inventario['perdTitulo']; ?></td>
    <td  nowrap="nowrap"><?php echo $row_inventario['exiVolumen']; ?></td>
    <td nowrap="nowrap"><?php echo $row_inventario['perdVolume']; ?></td>
  </tr>
  <tr valign="baseline">
    <td colspan="2" align="right" nowrap="nowrap">Genero Literario:</td>
    <td colspan="2"><?php echo $row_inventario['genero']; ?></td>
  </tr>
  <tr valign="baseline">
    <td colspan="2" align="right" nowrap="nowrap">Fecha:</td>
    <td colspan="2"><?php echo $row_inventario['fecha']; ?>
    </td>
  </tr>
  <tr valign="baseline">
    <td colspan="4" align="center" nowrap="nowrap" bgcolor="#990033"><a href="principal.php?link=link14&fecha=<?  echo $row_inventario['fecha']; ?>">
        <input type="submit" value="Regresar" />
      </a></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($inventario);
?>
