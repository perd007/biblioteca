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
        <script language="javascript">
<!--

function validar(){

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
		
			
				
}

</script>
<body>
<body>
<form id="form1" name="form1" onsubmit="return validar()" method="get" action="principal.php">
  <table width="200" class="bordes" border="1" align="center">
    <tr>
      <th colspan="2" bgcolor="#990033" class="blancas" scope="col">Consulta de Prestamos</th>
    </tr>
    <tr>
      <td width="61" class="negrita">Cedula</td>
      <td width="123"><label>
        <input name="cedula" type="text" id="cedula" size="15" maxlength="9" />
      </label></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#990033"><label>
        <input type="submit" name="button" id="button" value="Buscar" />
        <input type="hidden" name="link"  value="link8" />
      </label></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>