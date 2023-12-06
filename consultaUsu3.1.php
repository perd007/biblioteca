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
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

		
				
				if(document.form1.fecha.value==""){
						alert("Debe Ingresar la Fecha");
						return false;
				}
				
				
}


</script> 
<body>
<form id="form1" name="form1" onsubmit="return validar()" method="get" action="principal.php">
  <table width="331" class="bordes" border="1" align="center">
    <tr align="center">
      <th colspan="2" bgcolor="#990033" class="blancas" scope="col">Consulta de Usuario por Dia</th>
    </tr>
    <tr>
      <td width="98" class="negrita">Fecha</td>
      <td width="211"><input name="fecha" type="text" id="fecha" value="" size="15" maxlength="10" readonly="readonly"//>
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
    <tr>
      <td colspan="2" align="center" bgcolor="#990033"><label>
        <input type="submit" name="button" id="button" value="Buscar" />
        <input type="hidden" name="link" value="link27" />
      </label></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>