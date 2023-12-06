<?php require_once('Connections/conexion.php'); ?>
<?php 
if($validacion==true){
	if($modi==0){
	echo "<script type=\"text/javascript\">alert ('Usted no posee permisos para realizar Modificaciones'); location.href='principal.php' </script>";
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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE prestamo SET tipo_prestamo=%s, tipo_material=%s, cota=%s, autor=%s, cedula=%s, dependencia=%s, usuario=%s, fecha_prestamo=%s, fecha_entrega=%s, fecha_devolucion=%s, responsable=%s, titulo=%s WHERE id_prestamo=%s",
                       GetSQLValueString($_POST['tipo_prestamo'], "text"),
                       GetSQLValueString($_POST['tipo_material'], "text"),
                       GetSQLValueString($_POST['cota'], "int"),
                       GetSQLValueString($_POST['autor'], "text"),
					   GetSQLValueString($_POST['cedula'], "int"),
                       GetSQLValueString($_POST['dependencia'], "text"),
                       GetSQLValueString($_POST['usuario'], "text"),
                       GetSQLValueString($_POST['fecha_prestamo'], "date"),
                       GetSQLValueString($_POST['fecha_entrega'], "date"),
                       GetSQLValueString($_POST['fecha_devolucion'], "date"),
                       GetSQLValueString($_POST['responsable'], "text"),
                       GetSQLValueString($_POST['titulo'], "text"),
                       GetSQLValueString($_POST['id_prestamo'], "int"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());
   if($Result1){
  echo "<script type=\"text/javascript\">alert ('Datos Actualizados');  location.href='Principal.php?link=link8&cedula=$_POST[cedula]' </script>";
  }else{
  echo "<script type=\"text/javascript\">alert ('Ocurrio un Error');  location.href='Principal.php?link=link8&cedula=$_POST[cedula]' </script>";
  exit;
  }
}
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
<title>Documento sin título</title>
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

		if(document.form1.cota.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('cota').value)){
				alert('Solo puede ingresar numeros en la cota!!!');
				return false;
		   		}
				}
		if(document.form1.cedula.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('cedula').value)){
				alert('Solo puede ingresar numeros en la cedula del usuario!!!');
				return false;
		   		}
				}
		
				if(document.form1.cedula.value==""){
						alert("Debe Ingresar la Cedula del Usuario");
						return false;
				}
				if(document.form1.tipo_material.value==""){
						alert("Debe Ingresar el Tipo de Material");
						return false;
				}
				if(document.form1.cota.value==""){
						alert("Debe Ingresar la Cota");
						return false;
				}
				if(document.form1.Titulo.value==""){
						alert("Debe Ingresar el Titulo del Libro");
						return false;
				}
				if(document.form1.autor.value==""){
						alert("Debe Ingresar el Autor del Libro");
						return false;
				}
				if(document.form1.dependencia.value==""){
						alert("Debe Ingresar la Dependencia");
						return false;
				}
				if(document.form1.usuario.value==""){
						alert("Debe Ingresar el Nombre del Usuario");
						return false;
				}
				
				
				if(document.form1.fecha_prestamo.value==""){
						alert("Debe Ingresar la Fecha del Prestamo");
						return false;
				}
				if(document.form1.fecha_entrega.value==""){
						alert("Debe Ingresar la Fecha de Entrega");
						return false;
				}
				
				
}

</script>
<body>
<form action="<?php echo $editFormAction; ?>" onsubmit="return validar()" method="post" name="form1" id="form1">
  <table align="center" class="bordes">
    <tr valign="baseline">
      <td colspan="2" align="center" nowrap="nowrap" bgcolor="#990033" class="blancas">FICHA DE PRESTAMO: MATERIAL BILBIOGRÁFICO</td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Prestamo:</td>
      <td><label> Interno
        <input type="radio" name="tipo_prestamo" id="radio" value="Interno"  <? if($row_prestamo['tipo_prestamo']=="Interno") echo "checked=checked"; ?>/>
        Circulante
        <input type="radio" name="tipo_prestamo" id="radio2" value=" Circulante" <? if($row_prestamo['tipo_prestamo']=="Circulante") echo "checked=checked"; ?> />
      </label></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Tipo de Material:</td>
      <td><input name="tipo_material" type="text" value="<?php echo $row_prestamo['tipo_material']; ?>" size="50" maxlength="50" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Cota:</td>
      <td><input name="cota" id="cota" type="text" value="<?php echo $row_prestamo['cota']; ?>" size="7" maxlength="4" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Autor:</td>
      <td><input name="autor" type="text" value="<?php echo $row_prestamo['autor']; ?>" size="50" maxlength="100" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Cedula:</td>
      <td><label>
        <input name="cedula" type="text" id="cedula" value="<?php echo $row_prestamo['cedula']; ?>" size="15" maxlength="8" />
      </label></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Titulo:</td>
      <td><input name="titulo" type="text" id="titulo" value="<?php echo $row_prestamo['titulo']; ?>" size="50" maxlength="100" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Dependencia:</td>
      <td><input name="dependencia" type="text" value="<?php echo $row_prestamo['dependencia']; ?>" size="50" maxlength="100" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nombre del Usuario:</td>
      <td><input name="usuario" type="text" value="<?php echo $row_prestamo['usuario']; ?>" size="50" maxlength="100" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Fecha de Prestamo:</td>
      <td><input name="fecha_prestamo" type="text" id="fecha_prestamo" value="<?php echo $row_prestamo['fecha_prestamo']; ?>" size="20" maxlength="10" readonly="readonly"//>
        <button type="button" id="cal-button-1" title="Clic Para Escoger la fecha">Fecha</button>
        <script type="text/javascript">
							Calendar.setup({
							  inputField    : "fecha_prestamo",
							  ifFormat   : "%Y-%m-%d",
							  button        : "cal-button-1",
							  align         : "Tr"
							});
						  </script></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Fecha de Entrega:</td>
      <td><input name="fecha_entrega" type="text" id="fecha_entrega" value="<?php echo $row_prestamo['fecha_entrega']; ?>" size="20" maxlength="10" readonly="readonly"//>
        <button type="button" id="cal-button-2" title="Clic Para Escoger la fecha">Fecha</button>
        <script type="text/javascript">
							Calendar.setup({
							  inputField    : "fecha_entrega",
							  ifFormat   : "%Y-%m-%d",
							  button        : "cal-button-2",
							  align         : "Tr"
							});
						  </script></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Fecha de Devolucion:</td>
      <td><input name="fecha_devolucion" type="text" id="fecha_devolucion" value="<?php echo $row_prestamo['fecha_devolucion']; ?>" size="20" maxlength="10" readonly="readonly"//>
        <button type="button" id="cal-button-3" title="Clic Para Escoger la fecha">Fecha</button>
        <script type="text/javascript">
							Calendar.setup({
							  inputField    : "fecha_devolucion",
							  ifFormat   : "%Y-%m-%d",
							  button        : "cal-button-3",
							  align         : "Tr"
							});
						  </script></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Responsable:</td>
      <td><input name="responsable" type="text" value="<?php echo $row_prestamo['responsable']; ?>" size="50" maxlength="100" /></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="center" nowrap="nowrap" bgcolor="#990033"><a href="principal.php?link=link8&cedula=<? echo $cedula; ?>">
        <input type="submit" value="Regresar" />
      </a>        <input type="submit" value="Actualizar Datos" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id_prestamo" value="<?php echo $row_prestamo['id_prestamo']; ?>" />

</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($prestamo);
?>
