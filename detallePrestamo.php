<?php require_once('Connections/conexion.php'); ?>
<?php

$id=$_GET["id"];
mysql_select_db($database_conexion, $conexion);
$query_prestamo = "SELECT * FROM prestamo where id_prestamo=$id";
$prestamo = mysql_query($query_prestamo, $conexion) or die(mysql_error());
$row_prestamo = mysql_fetch_assoc($prestamo);
$totalRows_prestamo = mysql_num_rows($prestamo);

$cedula=$_GET["cedula"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="estilos.css" rel="stylesheet" type="text/css" />

<title>Documento sin título</title>
</head>

<body>
<table align="center" class="bordes">
  <tr valign="baseline">
    <td colspan="2" align="center" nowrap="nowrap" bgcolor="#990033" class="blancas">FICHA DE PRESTAMO: MATERIAL BILBIOGRÁFICO</td>
  </tr>
  <tr valign="baseline">
    <td nowrap="nowrap" align="right">Prestamo:</td>
    <td><?php echo $row_prestamo['tipo_prestamo']; ?></td>
  </tr>
  <tr valign="baseline">
    <td nowrap="nowrap" align="right">Tipo de Material:</td>
    <td><?php echo $row_prestamo['tipo_material']; ?></td>
  </tr>
  <tr valign="baseline">
    <td nowrap="nowrap" align="right">Cota:</td>
    <td><?php echo $row_prestamo['cota']; ?></td>
  </tr>
  <tr valign="baseline">
    <td nowrap="nowrap" align="right">Autor:</td>
    <td><?php echo $row_prestamo['autor']; ?></td>
  </tr>
  <tr valign="baseline">
    <td nowrap="nowrap" align="right">Cedula:</td>
    <td><?php echo $row_prestamo['cedula']; ?></td>
  </tr>
  <tr valign="baseline">
    <td nowrap="nowrap" align="right">Titulo:</td>
    <td><?php echo $row_prestamo['titulo']; ?></td>
  </tr>
  <tr valign="baseline">
    <td nowrap="nowrap" align="right">Dependencia:</td>
    <td><?php echo $row_prestamo['dependencia']; ?></td>
  </tr>
  <tr valign="baseline">
    <td nowrap="nowrap" align="right">Nombre del Usuario:</td>
    <td><?php echo $row_prestamo['usuario']; ?></td>
  </tr>
  <tr valign="baseline">
    <td nowrap="nowrap" align="right">Fecha de Prestamo:</td>
    <td><?php echo $row_prestamo['fecha_prestamo']; ?></td>
  </tr>
  <tr valign="baseline">
    <td nowrap="nowrap" align="right">Fecha de Entrega:</td>
    <td><?php echo $row_prestamo['fecha_entrega']; ?></td>
  </tr>
  <tr valign="baseline">
    <td nowrap="nowrap" align="right">Fecha de Devolucion:</td>
    <td><?php echo $row_prestamo['fecha_devolucion']; ?></td>
  </tr>
  <tr valign="baseline">
    <td nowrap="nowrap" align="right">Responsable:</td>
    <td><?php echo $row_prestamo['responsable']; ?></td>
  </tr>
  <tr valign="baseline">
    <td colspan="2" align="center" nowrap="nowrap" bgcolor="#990033"><a href="principal.php?link=link8&cedula=<? echo $cedula; ?>"><input type="submit" value="Regresar" /></a></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($prestamo);
?>
