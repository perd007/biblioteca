<?php require_once('Connections/conexion.php'); ?>
<?php

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE usuario SET nombre=%s, cedula=%s, depencia=%s, tipo=%s, fecha=%s WHERE id_usuario=%s",
                       GetSQLValueString($_POST['nombre'], "text"),
                       GetSQLValueString($_POST['cedula'], "text"),
                       GetSQLValueString($_POST['depencia'], "text"),
                       GetSQLValueString($_POST['tipo'], "text"),
                       GetSQLValueString($_POST['fecha'], "date"),
                       GetSQLValueString($_POST['id_usuario'], "int"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());
   if($Result1){
  echo "<script type=\"text/javascript\">alert ('Datos Modificados');  location.href='Principal.php?link=link2' </script>";
  }else{
  echo "<script type=\"text/javascript\">alert ('Ocurrio un Error');  location.href='Principal.php?link=link2' </script>";
  exit;
  }
}
$id=$_GET["id"];
mysql_select_db($database_conexion, $conexion);
$query_usuarios = "SELECT * FROM usuario where id_usuario=$id";
$usuarios = mysql_query($query_usuarios, $conexion) or die(mysql_error());
$row_usuarios = mysql_fetch_assoc($usuarios);
$totalRows_usuarios = mysql_num_rows($usuarios);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="estilos.css" rel="stylesheet" type="text/css" />
<title>Documento sin título</title>
<script type="text/javascript" src="jscalendar-1.0/calendar.js"></script>
    <script type="text/javascript" src="jscalendar-1.0/calendar-setup.js"></script>
    <script type="text/javascript" src="jscalendar-1.0/lang/calendar-es.js"></script>
    <style type="text/css"> 
    @import url("jscalendar-1.0/calendar-win2k-cold-1.css"); .Estilo7 {font-weight: bold}
    .Estilo10 {color: #FFFFFF}
   
    </style>
		<script type="text/JavaScript" language="javascript" src="calendario/calendar-setup.js"></script>
<style type="text/css">
<!--
.Estilo7 {font-weight: bold}
-->
</style>
</head>
<script language="javascript">
<!--

function validar(){

		if(document.form1.cedula.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('cedula').value)){
				alert('Solo puede ingresar numeros en la cedula del Usuario!!!');
				return false;
		   		}
				}
		
				if(document.form1.nombre.value==""){
						alert("Debe Ingresar el Nombre del Usuario");
						return false;
				}
				if(document.form1.cedula.value==""){
						alert("Debe Ingresar la Cedula del Usuario");
						return false;
				}
				if(document.form1.depencia.value==""){
						alert("Debe Ingresar la Dependencia");
						return false;
				}
				if(document.form1.fecha.value==""){
						alert("Debe Ingresar la Fecha");
						return false;
				}
				
				
}

</script>
<body>
<form action="<?php echo $editFormAction; ?>" method="post"  onsubmit="return validar()" name="form1" id="form1">
  <table width="447" border="0" align="center" cellpadding="0" cellspacing="0" class="bordes">
    <tr valign="baseline">
      <td colspan="2" align="center" nowrap="nowrap" bgcolor="#990033" ><div class="blancas">MODIFICACION DE USUARIOS POR DIA</div></td>
    </tr>
    <tr valign="baseline">
      <td width="135" align="right" nowrap="nowrap">Nombre:</td>
      <td width="300"><input name="nombre" type="text" value="<?php echo $row_usuarios['nombre']; ?>" size="50" maxlength="100" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Cedula:</td>
      <td><input name="cedula" type="text" value="<?php echo $row_usuarios['cedula']; ?>" size="15" maxlength="9" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Dependencia:</td>
      <td><input name="depencia" type="text" value="<?php echo $row_usuarios['depencia']; ?>" size="50" maxlength="100" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Tipo:</td>
      <td><label>
        <select name="tipo" id="tipo">
        <?php if($row_usuarios['tipo']=="SALA"){
			echo "
          <option value='SALA'>SALA</option>
          <option value='CIRCULANTE'>CIRCULANTE</option>
          <option value='AULA'>AULA</option>";
		}
		if($row_usuarios['tipo']=="CIRCULANTE"){
			echo "
		  <option value='CIRCULANTE'>CIRCULANTE</option>
          <option value='SALA'>SALA</option>
          <option value='AULA'>AULA</option>";
		}
		if($row_usuarios['tipo']=="AULA"){
			echo "
		<option value='AULA'>AULA</option>
          <option value='SALA'>SALA</option>
          <option value='CIRCULANTE'>CIRCULANTE</option>"
          ;
		}
		  
		  ?>
        </select>
      </label></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Fecha:</td>
      <td><div align="left" class="Estilo7">
        <input name="fecha" type="text" id="fecha" value="<?php echo $row_usuarios['fecha']; ?>" size="20" maxlength="10" readonly="readonly"//>
        <button type="button" id="cal-button-1" title="Clic Para Escoger la fecha">Fecha</button>
        <script type="text/javascript">
							Calendar.setup({
							  inputField    : "fecha",
							  ifFormat   : "%Y-%m-%d",
							  button        : "cal-button-1",
							  align         : "Tr"
							});
						  </script>
      </div></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="center" nowrap="nowrap" bgcolor="#990033"><a href="principal.php?link=link2">
        <input type="submit" value="Regresar" />
      </a>       <input type="submit" value="Actualizar Datos" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id_usuario" value="<?php echo $row_usuarios['id_usuario']; ?>" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($usuarios);
?>
