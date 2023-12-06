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
  $updateSQL = sprintf("UPDATE inventario SET clasificacion=%s, tipo=%s, exiTitulo=%s, perdTitulo=%s, exiVolumen=%s, perdVolume=%s, biog=%s, fecha=%s, genero=%s WHERE id_inventario=%s",
                       GetSQLValueString($_POST['clasificacion'], "int"),
                       GetSQLValueString($_POST['tipo'], "text"),
                       GetSQLValueString($_POST['exiTitulo'], "int"),
                       GetSQLValueString($_POST['perdTitulo'], "int"),
                       GetSQLValueString($_POST['exiVolumen'], "int"),
                       GetSQLValueString($_POST['perdVolume'], "int"),
                       GetSQLValueString($_POST['biog'], "text"),
                       GetSQLValueString($_POST['fecha'], "date"),
                       GetSQLValueString($_POST['genero'], "text"),
                       GetSQLValueString($_POST['id_inventario'], "int"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());
   if($Result1){
  echo "<script type=\"text/javascript\">alert ('Datos Modificados');  location.href='Principal.php?link=link14&id=$_GET[id]' </script>";
  }else{
  echo "<script type=\"text/javascript\">alert ('Ocurrio un Error');  location.href='Principal.php?link=link14&id=$_GET[id]' </script>";
  exit;
  }
}

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
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table class="bordes" width="358" align="center">
    <tr valign="baseline">
      <td colspan="4" align="center" nowrap="nowrap" bgcolor="#990033" class="blancas"> MODIFICAR INVENTARIO DEL MATERIAL BIBLIOGRAFICO</td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap">Clasificacion:</td>
      <td colspan="2"><label>
      <select name='clasificacion' id='clasificacion'>
    <?php switch ($row_inventario['clasificacion']){
				case "000":
				echo "<option value='000'>000</option>
          <option value='100'>100</option>
          <option value='200'>200</option>
          <option value='300'>300</option>
          <option value='400'>400</option>
          <option value='500'>500</option>
          <option value='600'>600</option>
          <option value='700'>700</option>
          <option value='800'>800</option>
          <option value='900'>900</option>";
				break;
			case "100":
				echo "
          <option value='100'>100</option>
		  <option value='000'>000</option>
          <option value='200'>200</option>
          <option value='300'>300</option>
          <option value='400'>400</option>
          <option value='500'>500</option>
          <option value='600'>600</option>
          <option value='700'>700</option>
          <option value='800'>800</option>
          <option value='900'>900</option>";
				break;
				case "200":
				echo "
          <option value='200'>200</option>
		  <option value='000'>000</option>
		  <option value='100'>100</option>
          <option value='300'>300</option>
          <option value='400'>400</option>
          <option value='500'>500</option>
          <option value='600'>600</option>
          <option value='700'>700</option>
          <option value='800'>800</option>
          <option value='900'>900</option>";
				break;
				case "300":
				echo "
		  <option value='300'>300</option>
		  <option value='000'>000</option>
          <option value='100'>100</option>
          <option value='200'>200</option>
          <option value='400'>400</option>
          <option value='500'>500</option>
          <option value='600'>600</option>
          <option value='700'>700</option>
          <option value='800'>800</option>
          <option value='900'>900</option>";
				break;
				case "400":
				echo "
		  <option value='400'>400</option>
		  <option value='000'>000</option>
          <option value='100'>100</option>
          <option value='200'>200</option>
          <option value='300'>300</option>
          <option value='500'>500</option>
          <option value='600'>600</option>
          <option value='700'>700</option>
          <option value='800'>800</option>
          <option value='900'>900</option>";
				break;
				case "500":
				echo "
			<option value='500'>500</option>	
		  <option value='000'>000</option>
          <option value='100'>100</option>
          <option value='200'>200</option>
          <option value='300'>300</option>
          <option value='400'>400</option>
          <option value='600'>600</option>
          <option value='700'>700</option>
          <option value='800'>800</option>
          <option value='900'>900</option>";
				break;
			case "600":
				echo "
		  <option value='600'>600</option>
		  <option value='000'>000</option>
          <option value='100'>100</option>
          <option value='200'>200</option>
          <option value='300'>300</option>
          <option value='400'>400</option>
          <option value='500'>500</option>
          <option value='700'>700</option>
          <option value='800'>800</option>
          option value='900'>900</option>";
				break;	
				case "700":
				echo "
		  <option value='700'>700</option>
		  <option value='000'>000</option>
          <option value='100'>100</option>
          <option value='200'>200</option>
          <option value='300'>300</option>
          <option value='400'>400</option>
          <option value='500'>500</option>
          <option value='600'>600</option>
          <option value='800'>800</option>
          <option value='900'>900</option>";
				break;
				case "800":
				echo "
			<option value='800'>800</option>
		<option value='000'>000</option>
          <option value='100'>100</option>
          <option value='200'>200</option>
          <option value='300'>300</option>
          <option value='400'>400</option>
          <option value='500'>500</option>
          <option value='600'>600</option>
          <option value='700'>700</option>
          <option value='900'>900</option>";
				break;
				case "000":
				echo "
				<option value='900'>900</option>
				<option value='000'>000</option>
          <option value='100'>100</option>
          <option value='200'>200</option>
          <option value='300'>300</option>
          <option value='400'>400</option>
          <option value='500'>500</option>
          <option value='600'>600</option>
          <option value='700'>700</option>
          <option value='800'>800</option>
          ";
				break;
				
			}
?>

        </select>
      </label></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap">Tipo de Material</td>
      <td colspan="2"><label>
        <select name="tipo" id="tipo" onchange="return cambio()">
          <?php switch ($row_inventario['tipo']){
				case "REFERENCIA":
				echo "
				 <option value='REFERENCIA'>REFERENCIA</option>
          <option value='COMPLEMENTARIO'>COMPLEMENTARIO</option>
          <option value='TEXTO'>TEXTO</option>
          <option value='APOY. AL DOCENTE'>APOY. AL DOCENTE</option>
          <option value='RECREATIVO'>RECREATIVO</option>
				";
				break;
				case "COMPLEMENTARIO":
				echo "
				<option value='COMPLEMENTARIO'>COMPLEMENTARIO</option>
				 <option value='REFERENCIA'>REFERENCIA</option>
                  <option value='TEXTO'>TEXTO</option>
          <option value='APOY. AL DOCENTE'>APOY. AL DOCENTE</option>
          <option value='RECREATIVO'>RECREATIVO</option>
				";
				break;
				case "TEXTO":
				echo "
				<option value='TEXTO'>TEXTO</option>
				 <option value='REFERENCIA'>REFERENCIA</option>
          <option value='COMPLEMENTARIO'>COMPLEMENTARIO</option>
          <option value='APOY. AL DOCENTE'>APOY. AL DOCENTE</option>
          <option value='RECREATIVO'>RECREATIVO</option>
				";
				break;
				case "APOY. AL DOCENTE":
				echo "
				<option value='APOY. AL DOCENTE'>APOY. AL DOCENTE</option>
				 <option value='REFERENCIA'>REFERENCIA</option>
          <option value='COMPLEMENTARIO'>COMPLEMENTARIO</option>
          <option value='TEXTO'>TEXTO</option>
          <option value='RECREATIVO'>RECREATIVO</option>
				";
				break;
				case "RECREATIVO":
				echo "
				<option value='RECREATIVO'>RECREATIVO</option>
				 <option value='REFERENCIA'>REFERENCIA</option>
          <option value='COMPLEMENTARIO'>COMPLEMENTARIO</option>
          <option value='TEXTO'>TEXTO</option>
          <option value='APOY. AL DOCENTE'>APOY. AL DOCENTE</option>
				";
				break;
			}
?>
        </select>
      </label></td>
    </tr >
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap">BIOG.:</td>
      <td colspan="2"><input name="biog" type="text" id="biog" value="<?php echo $row_inventario['biog']; ?>" size="5" maxlength="3" /></td>
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
      <td nowrap="nowrap" ><input name="exiTitulo" type="text" value="<?php echo $row_inventario['exiTitulo']; ?>" size="5" maxlength="3" /></td>
      <td nowrap="nowrap" ><input name="perdTitulo" type="text" value="<?php echo $row_inventario['perdTitulo']; ?>" size="5" maxlength="3" /></td>
      <td  nowrap="nowrap"><input name="exiVolumen" type="text" value="<?php echo $row_inventario['exiVolumen']; ?>" size="5" maxlength="3" /></td>
      <td nowrap="nowrap"><input name="perdVolume" type="text" value="<?php echo $row_inventario['perdVolume']; ?>" size="5" maxlength="3" /></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap">Genero Literario:</td>
      <td colspan="2"><input name="genero" type="text" value="<?php echo $row_inventario['genero']; ?>" size="30" maxlength="100" <?php if($row_inventario['tipo']!="RECREATIVO") echo "disabled='disabled'"; ?> /></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap">Fecha:</td>
      <td colspan="2"><input name="fecha" type="text" id="fecha" value="<?php echo $row_inventario['fecha']; ?>" size="15" maxlength="10" readonly="readonly"//>
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
      <td colspan="4" align="center" nowrap="nowrap" bgcolor="#990033"><a href="principal.php?link=link14&fecha=<?  echo $row_inventario['fecha']; ?>">
        <input type="submit" value="Regresar" />
      </a>        <input type="submit" value="Actualizar Datos" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id_inventario" value="<?php echo $row_inventario['id_inventario']; ?>" />
    <input type="hidden" name="id" value="<?php echo $id; ?>" />

</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($inventario);
?>
