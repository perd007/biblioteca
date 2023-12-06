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
  $insertSQL = sprintf("INSERT INTO inventario ( clasificacion, tipo, exiTitulo, perdTitulo, exiVolumen, perdVolume, biog, fecha, genero) VALUES ( %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       
                       GetSQLValueString($_POST['clasificacion'], "text"),
					   GetSQLValueString($_POST['tipo'], "text"),
                       GetSQLValueString($_POST['exiTitulo'], "int"),
                       GetSQLValueString($_POST['perdTitulo'], "int"),
                       GetSQLValueString($_POST['exiVolumen'], "int"),
                       GetSQLValueString($_POST['perdVolume'], "int"),
                       GetSQLValueString($_POST['biog'], "text"),
                       GetSQLValueString($_POST['fecha'], "date"),
                       GetSQLValueString($_POST['genero'], "text"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());
   if($Result1){
  echo "<script type=\"text/javascript\">alert ('Datos Guardados');  location.href='Principal.php?link=link12' </script>";
  }else{
  echo "<script type=\"text/javascript\">alert ('Ocurrio un Error');  location.href='Principal.php?link=link12' </script>";
  exit;
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="estilos.css" rel="stylesheet" type="text/css" />
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

		if(document.form1.biog.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('biog').value)){
				alert('Solo puede ingresar numeros en biog!!!');
				return false;
		   		}
				}
				if(document.form1.exiTitulo.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('exiTitulo').value)){
				alert('Solo puede ingresar numeros en EXIST!!!');
				return false;
		   		}
				}
				if(document.form1.perdTitulo.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('perdTitulo').value)){
				alert('Solo puede ingresar numeros en PERD!!!');
				return false;
		   		}
				}
				if(document.form1.exiVolumen.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('exiVolumen').value)){
				alert('Solo puede ingresar numeros en EXIST!!!');
				return false;
		   		}
				}
				if(document.form1.perdVolume.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('perdVolume').value)){
				alert('Solo puede ingresar numeros en PERD!!!');
				return false;
		   		}
				}
				
		
				
		
				if(document.form1.biog.value==""){
						alert("Debe Ingresar en biog");
						return false;
				}
				if(document.form1.exiTitulo.value==""){
						alert("Debe Ingresar el EXIST");
						return false;
				}
				if(document.form1.perdTitulo.value==""){
						alert("Debe Ingresar en PERD");
						return false;	
				}
				if(document.form1.exiVolumen.value==""){
						alert("Debe Ingresar el EXIST");
						return false;
				}
				if(document.form1.perdVolume.value==""){
						alert("Debe Ingresar en PERD");
						return false;
				}
				
				if(document.form1.fecha.value==""){
						alert("Debe Ingresar la Fecha");
						return false;
				}
				
				
}

function cambio(){
	if(document.form1.tipo.value=="RECREATIVO"){
		document.form1.genero.disabled=false;
		return true;
		}
		if(document.form1.tipo.value!="RECREATIVO"){
		document.form1.genero.disabled=true;
		return true;
		}
}

</script>   
<body>
<form action="<?php echo $editFormAction; ?>" method="post" onsubmit="return validar()" name="form1" id="form1">
  <table class="bordes" width="358" align="center">
    <tr valign="baseline">
      <td colspan="4" align="center" nowrap="nowrap" bgcolor="#990033" class="blancas">INVENTARIO DEL MATERIAL BIBLIOGRAFICO</td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap">Clasificacion:</td>
      <td colspan="2"><label>
        <select name="clasificacion" id="clasificacion">
          <option value="000">000</option>
          <option value="100">100</option>
          <option value="200">200</option>
          <option value="300">300</option>
          <option value="400">400</option>
          <option value="500">500</option>
          <option value="600">600</option>
          <option value="700">700</option>
          <option value="800">800</option>
          <option value="900">900</option>
          </select>
      </label></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap">Tipo de Material</td>
      <td colspan="2"><label>
        <select name="tipo" id="tipo" onchange="return cambio()">
          <option value="REFERENCIA">REFERENCIA</option>
          <option value="COMPLEMENTARIO">COMPLEMENTARIO</option>
          <option value="TEXTO">TEXTO</option>
          <option value="APOY. AL DOCENTE">APOY. AL DOCENTE</option>
          <option value="RECREATIVO">RECREATIVO</option>
        </select>
      </label></td>
    </tr >
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap">BIOG.:</td>
      <td colspan="2"><input name="biog" type="text" id="biog" value="" size="5" maxlength="3" /></td>
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
      <td nowrap="nowrap" ><input name="exiTitulo" type="text" value="" size="5" maxlength="3" /></td>
      <td nowrap="nowrap" ><input name="perdTitulo" type="text" value="" size="5" maxlength="3" /></td>
      <td  nowrap="nowrap"><input name="exiVolumen" type="text" value="" size="5" maxlength="3" /></td>
      <td nowrap="nowrap"><input name="perdVolume" type="text" value="" size="5" maxlength="3" /></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap">Genero Literario:</td>
      <td colspan="2"><input name="genero" type="text" value="" size="30" maxlength="100" disabled="disabled" /></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap">Fecha:</td>
      <td colspan="2"><input name="fecha" type="text" id="fecha" value="" size="15" maxlength="10" readonly="readonly"//>
        <button type="button" id="cal-button-1" title="Clic Para Escoger la fecha">Fecha</button>
      <script type="text/javascript">
							Calendar.setup({
							  inputField    : "fecha",
							  ifFormat   : "%Y-%m-%d",
							  button        : "cal-button-1",
							  align         : "Tr"
							});
						  </script></td>
    </tr>
    <tr valign="baseline">
      <td colspan="4" align="CENTER" nowrap="nowrap" bgcolor="#990033"><input type="submit" value="Guardar Datos" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
</body>
</html>