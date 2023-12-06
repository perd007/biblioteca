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
  $updateSQL = sprintf("UPDATE clasificacion SET tipo=%s, titulo=%s, volumen=%s, fecha=%s WHERE id_clasificacion=%s",
                       GetSQLValueString($_POST['tipo'], "text"),
                       GetSQLValueString($_POST['titulo'], "int"),
                       GetSQLValueString($_POST['volumen'], "int"),
                       GetSQLValueString($_POST['fecha'], "date"),
                       GetSQLValueString($_POST['id_clasificacion'], "int"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());
  if($Result1){
  echo "<script type=\"text/javascript\">alert ('Datos Actualizados');  location.href='Principal.php?link=link19' </script>";
  }else{
  echo "<script type=\"text/javascript\">alert ('Ocurrio un Error');  location.href='Principal.php?link=link19' </script>";
  exit;
  }
}



$id=$_GET["id"];
mysql_select_db($database_conexion, $conexion);
$query_clasificacion = "SELECT * FROM clasificacion where id_clasificacion=$id";
$clasificacion = mysql_query($query_clasificacion, $conexion) or die(mysql_error());
$row_clasificacion = mysql_fetch_assoc($clasificacion);
$totalRows_clasificacion = mysql_num_rows($clasificacion);
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

		if(document.form1.titulo.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('titulo').value)){
				alert('Solo puede ingresar numeros en el titulo!!!');
				return false;
		   		}
				}
				if(document.form1.volumen.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('volumen').value)){
				alert('Solo puede ingresar numeros en el volumen!!!');
				return false;
		   		}
				}

				if(document.form1.titulo.value==""){
						alert("Debe Ingresar el Titulo");
						return false;
				}
				if(document.form1.volumen.value==""){
						alert("Debe Ingresar el Volumen ");
						return false;	
				}
				
}
</script>  
<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table class="bordes" width="345" align="center">
    <tr valign="baseline">
      <td colspan="2" align="center" nowrap="nowrap" bgcolor="#990033" class="blancas">MODIFICACION DE CLASIFICACION</td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Tipo:</td>
      <td><select name="tipo" id="tipo">
        <?php switch ($row_clasificacion['tipo']){
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
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Titulo:</td>
      <td><input name="titulo" type="text" value="<?php echo $row_clasificacion['titulo']; ?>" size="5" maxlength="3" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Volumen:</td>
      <td><input name="volumen" type="text" value="<?php echo $row_clasificacion['volumen']; ?>" size="5" maxlength="3" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Fecha:</td>
      <td><input name="fecha" type="text" id="fecha" value="<?php echo $row_clasificacion['fecha']; ?>" size="15" maxlength="10" readonly="readonly"//>
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
      <td height="26" colspan="2" align="center" nowrap="nowrap" bgcolor="#990033"><a href="principal.php?link=link19">
        <input type="submit" value="Regresar" />
      </a>  <input type="submit" value="Actualizar Datos" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id_clasificacion" value="<?php echo $row_clasificacion['id_clasificacion']; ?>" />
  <input type="hidden" name="id" value="<?php echo $id; ?>" />
</form>
<p>&nbsp;</p>
</body>
</html>

