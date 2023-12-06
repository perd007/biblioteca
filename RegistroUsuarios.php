<?php require_once('Connections/conexion.php'); ?>
<?php 
//validar usuario

if($validacion==true){
	if($reg==0){
	echo "<script type=\"text/javascript\">alert ('Usted no posee permisos para realizar Registros');location.href='principal.php' </script>";
    exit;
	}
}
else{
echo "<script type=\"text/javascript\">alert ('Error usuario invalido'); location.href='principal.php' </script>";
 exit;
}
?>
<?php
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO usuario (id_usuario, nombre, cedula, depencia, tipo, fecha) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id_usuario'], "int"),
                       GetSQLValueString($_POST['nombre'], "text"),
                       GetSQLValueString($_POST['cedula'], "text"),
                       GetSQLValueString($_POST['depencia'], "text"),
                       GetSQLValueString($_POST['tipo'], "text"),
                       GetSQLValueString($_POST['fecha'], "date"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());
   if($Result1){
  echo "<script type=\"text/javascript\">alert ('Datos Guardados');  location.href='Principal.php?link=link1' </script>";
  }else{
  echo "<script type=\"text/javascript\">alert ('Ocurrio un Error');  location.href='Principal.php?link=link1' </script>";
  exit;
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link href="estilos.css" rel="stylesheet" type="text/css" />
</head>
<script type="text/javascript" src="jscalendar-1.0/calendar.js"></script>
    <script type="text/javascript" src="jscalendar-1.0/calendar-setup.js"></script>
    <script type="text/javascript" src="jscalendar-1.0/lang/calendar-es.js"></script>
    <style type="text/css"> 
    @import url("jscalendar-1.0/calendar-win2k-cold-1.css"); .Estilo7 {font-weight: bold}
    .Estilo10 {color: #FFFFFF}
   
    </style>
		<script type="text/JavaScript" language="javascript" src="calendario/calendar-setup.js"></script>
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
<form action="<?php echo $editFormAction; ?>" method="post" onsubmit="return validar()" name="form1" enctype="multipart/form-data" id="form1">
  <table width="447" border="0" align="center" cellpadding="0" cellspacing="0" class="bordes">
    <tr valign="baseline">
      <td colspan="2" align="CENTER" nowrap="nowrap" bgcolor="#990033" ><div class="blancas">REGISTRO DE USUARIOS POR DIA</div></td>
    </tr>
    <tr valign="baseline">
      <td width="135" align="right" nowrap="nowrap">Nombre:</td>
      <td width="300"><input name="nombre" type="text" value="" size="50" maxlength="100" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Cedula:</td>
      <td><input name="cedula" id="cedula" type="text" value="" size="15" maxlength="9" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Dependencia:</td>
      <td><input name="depencia" type="text" value="" size="50" maxlength="100" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Tipo:</td>
      <td><label>
        <select name="tipo" id="tipo">
          <option value="SALA">SALA</option>
          <option value="CIRCULANTE">CIRCULANTE</option>
          <option value="AULA">AULA</option>
        </select>
      </label></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Fecha:</td>
      <td><div align="left" class="Estilo7">
          <input name="fecha" type="text" id="fecha" value="" size="20" maxlength="10" readonly//>
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
      <td colspan="2" align="center" nowrap="nowrap" bgcolor="#990033"><input type="submit" value="Guardar Datos" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
</body>
</html>