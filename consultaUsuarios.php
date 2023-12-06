<?php require_once('Connections/conexion.php'); ?>
<?php 
//validar usuario
if($validacion==true){
	if($Admi==0){
	echo "<script type=\"text/javascript\">alert ('Usted no posee permisos para consultar usuarios Registros');location.href='principal.php' </script>";
    exit;
	}
}
else{
echo "<script type=\"text/javascript\">alert ('Error usuario invalido'); location.href='principal.php' </script>";
 exit;
}
?>
<?php
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_usuarios = 10;
$pageNum_usuarios = 0;
if (isset($_GET['pageNum_usuarios'])) {
  $pageNum_usuarios = $_GET['pageNum_usuarios'];
}
$startRow_usuarios = $pageNum_usuarios * $maxRows_usuarios;

mysql_select_db($database_conexion, $conexion);
$query_usuarios = "SELECT * FROM seguridad";
$query_limit_usuarios = sprintf("%s LIMIT %d, %d", $query_usuarios, $startRow_usuarios, $maxRows_usuarios);
$usuarios = mysql_query($query_limit_usuarios, $conexion) or die(mysql_error());
$row_usuarios = mysql_fetch_assoc($usuarios);

if (isset($_GET['totalRows_usuarios'])) {
  $totalRows_usuarios = $_GET['totalRows_usuarios'];
} else {
  $all_usuarios = mysql_query($query_usuarios);
  $totalRows_usuarios = mysql_num_rows($all_usuarios);
}
$totalPages_usuarios = ceil($totalRows_usuarios/$maxRows_usuarios)-1;

$queryString_usuarios = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_usuarios") == false && 
        stristr($param, "totalRows_usuarios") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_usuarios = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_usuarios = sprintf("&totalRows_usuarios=%d%s", $totalRows_usuarios, $queryString_usuarios);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="estilos.css" rel="stylesheet" type="text/css" />
<title>Documento sin t&iacute;tulo</title>

<style type="text/css">
<!--
.Estilo3 {color: #FFFFFF; font-weight: bold; }
.Estilo4 {color: #000000}
-->
</style>
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
<table width="541" class="bordes" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr bgcolor="#00CCFF">
    <th colspan="9" bgcolor="#990033" align="center" ><span class="blancas"><strong>Usuarios</strong></span></th>
  </tr>
  <tr>
    <td colspan="2"><div align="center" ><strong>Login y Contrase&ntilde;as </strong></div></td>
    <td colspan="5"><div align="center" ><strong>Permisos que Posee el Usuario </strong></div></td>
    <td colspan="2"><div align="center" ><strong>Opciones</strong></div></td>
  </tr>
  <tr bgcolor="#990033" class="blancas">
    <td width="71"><span class="blancas ">Usuario</span></td>
    <td width="59"><span class="blancas ">Clave</span></td>
    <td width="68"><span class="blancas ">Modificar</span></td>
    <td width="56"><span class="blancas ">Eliminar</span></td>
    <td width="64"><span class="blancas ">Registrar</span></td>
    <td width="66"><span class="blancas ">Consultar</span></td>
    <td width="80"><span class="blancas ">Administrar</span></td>
    <td width="49"><span class="blancas ">Op1</span></td>
    <td width="28"><span class="blancas ">Op2</span></td>
  </tr>
  <?php do { 
  	$m=$row_usuarios["modificar"];
$r=$row_usuarios["registrar"];
$e=$row_usuarios["eliminar"];
$c=$row_usuarios["consultar"];
$a=$row_usuarios["administrar"];
//validar permisos
if($m!=0){
$m="si";
}
else{
$m="no";
}

if($c!=0){
$c="si";
}
else{
$c="no";
}

if($e!=0){
$e="si";
}
else{
$e="no";
}

if($r!=0){
$r="si";
}
else{
$r="no";
}

if($a!=0){
$a="si";
}
else{
$a="no";
}

  
  	$modulo=$cont%2;
			
			if($modulo!=0){
			$color="#FFFFFF";
			}else{
			$color="#FFFFFF";
			}
			
	
	  ?>
<tr bgcolor="<?php echo $color; ?>">
      <td><span class="Estilo4"><?php echo "$row_usuarios[usuario]"; ?></span></td>
      <td><span class="Estilo4"><?php echo "$row_usuarios[clave]"; ?></span></td>
      <td><div align="center" class="Estilo4"><?php echo $m; ?></div></td>
      <td><div align="center" class="Estilo4"><?php echo $e; ?></div></td>
      <td><div align="center" class="Estilo4"><?php echo $r; ?></div></td>
      <td><div align="center" class="Estilo4"><?php echo $c; ?></div></td>
      <td><div align="center" class="Estilo4"><?php echo $a; ?></div></td>
      <td><span class="Estilo4"><?php echo "<a href='Principal.php?link=link24&cod=$row_usuarios[id_seg]'>Modificar</a>"; ?></span></td>
      <td><span class="Estilo4"><?php echo "<a onClick='return validar()' href='Principal.php?link=link25&id=$row_usuarios[id_seg]'>Eliminar</a>"; ?></span></td>
      <?php $cont++;} while ($row_usuarios = mysql_fetch_assoc($usuarios)); ?>
      </tr>
</table>
<table border="0" width="50%" align="center">
        <tr>
          <td width="23%" align="center"><?php if ($pageNum_usuarios > 0) { // Show if not first page ?>
                <a href="<?php printf("%s?pageNum_usuarios=%d%s", $currentPage, 0, $queryString_usuarios); ?>">Primero</a>
                <?php } // Show if not first page ?>
          </td>
          <td width="31%" align="center"><?php if ($pageNum_usuarios > 0) { // Show if not first page ?>
                <a href="<?php printf("%s?pageNum_usuarios=%d%s", $currentPage, max(0, $pageNum_usuarios - 1), $queryString_usuarios); ?>">Anterior</a>
                <?php } // Show if not first page ?>
          </td>
          <td width="23%" align="center"><?php if ($pageNum_usuarios < $totalPages_usuarios) { // Show if not last page ?>
                <a href="<?php printf("%s?pageNum_usuarios=%d%s", $currentPage, min($totalPages_usuarios, $pageNum_usuarios + 1), $queryString_usuarios); ?>">Siguiente</a>
                <?php } // Show if not last page ?>
          </td>
          <td width="23%" align="center"><?php if ($pageNum_usuarios < $totalPages_usuarios) { // Show if not last page ?>
                <a href="<?php printf("%s?pageNum_usuarios=%d%s", $currentPage, $totalPages_usuarios, $queryString_usuarios); ?>">&Uacute;ltimo</a>
                <?php } // Show if not last page ?>
          </td>
        </tr>
</table>

</body>
</html>
<?php
mysql_free_result($usuarios);
?>
