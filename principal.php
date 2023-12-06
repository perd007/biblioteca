<?php require_once('Connections/conexion.php');

session_start();

if (isset($_SESSION["usuario"])){

}else{
echo "<script type=\"text/javascript\">alert ('Debe iniciar Sesion');  location.href='index.php' </script>";
exit;
}


function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

include("login.php");



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0155)http://webcache.googleusercontent.com/search?q=cache:OSe-XuxLYKoJ:www.me.gob.ve/+ministerio+de+educacion+venezuela&cd=1&hl=es&ct=clnk&source=www.google.com -->
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link type="text/css" rel="stylesheet" href="calendario/calendario/dhtmlgoodies_calendar.css?random=20051112" media="screen" />
<SCRIPT type="text/javascript" src="calendario/calendario/dhtmlgoodies_calendar.js?random=20060118"></script>
<!--<base href="http://www.me.gob.ve/index.php">-->
<base href="." />

<script language="JavaScript" src="mm_menu.js"></script>
<style type="text/css">
<!--
.Estilo1 {color: #FFFFFF}
-->
</style>
</head>
<body marginwidth="0" marginheight="0" leftmargin="0" topmargin="0" >

<script language="JavaScript1.2">mmLoadMenus();
ventana=windows.open("principal.php");
</script>
<div style="margin:-1px -1px 0;padding:0;border:1px solid #999;background:#fff"></div>
<div style="position:relative">
  <!--?xml version="1.0" encoding="utf-8"?-->
  <title> Sistema de Control Automatizado para Bibliotecas</title>
  <meta name="description" content="Ministerio del Poder Popular para la Educación" />
  <script type="text/javascript" src="imagenes/stylechanger.js"></script>
  <link href="imagenes/estilos.css" rel="stylesheet" type="text/css" />
  <table width="776" align="center" border="0" cellpadding="0" cellspacing="0">
    <tbody>
      <tr>
        <td height="5" colspan="3"></td>
      </tr>
      
      <tr>
        <td height="7" colspan="3"></td>
      </tr>
      <tr>
        <td colspan="3"><img src="imagenes/top.jpg" width="780" /></td>
      </tr>
      <tr>
        <td width="4" height="441" class="fondo" background="imagenes/border_left.jpg"></td>
        <td class="fondo" width="769"><!--  Contenido  -->
            <table border="0" cellpadding="0" cellspacing="0" width="98%">
              <tbody>
                <tr>
                  <td width="746"><table border="0" cellpadding="0" cellspacing="0" width="100%">
                      <tbody>
                        <tr>
                          <td><table border="0" cellpadding="0" cellspacing="0" width="102%">
                              <tbody>
                                <tr>
                                  <td colspan="3"><map name="Map">
                                      <area shape="rect" coords="0,0,110,58" href="http://www.me.gob.ve/index.php" alt="Inicio" title="Inicio" border="0" />
                                    </map>
                                      <table border="0" cellpadding="0" cellspacing="0" width="97%">
                                        <tbody>
                                          <tr valign="top">
                                            <td valign="top" ><img src="imagenes/gobierno.jpg" width="760" /></td>
                                          </tr>
                                        </tbody>
                                    </table></td>
                                </tr>
                                <tr>
                                  <td colspan="3"><!-- Columna de Contenido Izquierda -->
                                      <script type="text/javascript" src="imagenes/functions.js"></script>
                                      <script type="text/javascript" src="imagenes/menu.js"></script>
                                   
                                      <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                        <tbody>
                                          <tr>
                                            <!--	<td class="barra" width="205">
								   	<a href="http://www.portaleducativo.edu.ve" class="bar" target="blank">Portal Educativo</a>
								  	<a href="http://renadit.me.gob.ve" class="bar" target="blank">Renadit</a>
								 		<a href="http://www.ind.gov.ve" class="bar" target="blank">IND</a>
								 		<a href="contenido.php?id_seccion=29" class="bar">Más enlaces...</a>
								  </td>	-->
                                            <td width="141" bgcolor="#FFFFFF" >
                                              <br>                                            </td>
                                            <td width="49" bgcolor="#FFFFFF" ></td>
                                            <td width="564"  align="right" bgcolor="#FFFFFF" >&nbsp;</td>
                                          </tr>
                                        </tbody>
                                    </table>
                                    <!-- Columna de Contenido Izquierda -->                                  </td>
                                </tr>
                                <tr>
                                  <td width="174" valign="top"><!-- Columna de Contenido Izquierda -->
                                      <table border="0" bgcolor="#FFFFFF" width="100" cellpadding="0" cellspacing="0">
                                        <tbody>
                                          <tr>
                                            <td height="5"></td>
                                          </tr>
                                          <tr>
                                            <td><img src="imagenes/fondo_box_top_l.jpg" /></td>
                                          </tr>
                                          <tr>
                                            <td><table border="0" width="100%" cellpadding="0" cellspacing="0" class="boxcolor">
                                                <tbody>
                                                  <tr>
                                                    <td><!-- Busqueda en el ME -->
                                                        <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                                          <tbody>
                                                            <tr>
                                                              <td bgcolor="#990033">&nbsp;</td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                      <!-- Fin Busqueda en el ME -->                                                    </td>
                                                  </tr>
                                                </tbody>
                                            </table></td>
                                          </tr>
                                          <tr>
                                            <td><table border="0" bgcolor="#990033" width="98%" cellpadding="0" cellspacing="0">
                                                <tbody>
                                                  <tr>
                                                    <td height="5"></td>
                                                  </tr>
                                                  <tr>
                                                    <td><!-- Menu Izquierda -->
                                                        <table border="0" width="99%" cellpadding="0" cellspacing="0">
                                                          <tbody>
                                                            <tr>
                                                              <td class="menu_main"><a href="Principal.php?link=link1" name="link1"  class="menu_main_link_l Estilo1" > Registro de Usuarios</a></td>
                                                            </tr>
                                                            <tr>
                                                              <td class="menu_main"><a href="Principal.php?link=link2" name="link2" class="menu_main_link_l Estilo1"  >Consulta de Usuarios</a></td>
                                                            </tr>
                                                            
                                                            <tr>
                                                              <td class="menu_main"><a href="Principal.php?link=link3" name="link3" class="menu_main_link_l Estilo1" id="link"  >Usuarios por Dia</a></td>
                                                            </tr>
                                                            <tr>
                                                              <td class="menu_main"><a href="Principal.php?link=link26" name="link3" class="menu_main_link_l Estilo1" id="link5"  >Estadistica por Dia</a></td>
                                                            </tr>
                                                            <tr>
                                                              <td class="menu_main"><a href="Principal.php?link=link28" name="link3" class="menu_main_link_l Estilo1" id="link6"  >Estadistica por Fecha</a></td>
                                                            </tr>
                                                            <tr>
                                                              <td class="menu_main"><a href="Principal.php?link=link6" name="link6" class="menu_main_link_l Estilo1" id="link4"  >Registro de Prestamos</a></td>
                                                            </tr>
                                                            <tr>
                                                              <td class="menu_main"><a href="Principal.php?link=link7" name="link7" class="menu_main_link_l Estilo1" id="link4"  >Consulta de Prestamos</a></td>
                                                            </tr>
                                                            <tr>
                                                              <td class="menu_main"><a href="Principal.php?link=link31" name="link7" class="menu_main_link_l Estilo1" id="link8"  >Prestamos Generales</a></td>
                                                            </tr>
                                                            
                                                            <tr>
                                                              <td class="menu_main"><a href="Principal.php?link=link12" name="link12" class="menu_main_link_l Estilo1" id="link4"  >Registro de Inventarios </a></td>
                                                            </tr>
                                                            <tr>
                                                              <td class="menu_main"><a href="Principal.php?link=link13" name="link13" class="menu_main_link_l Estilo1" id="link4"  >Consulta de Inventarios </a></td>
                                                            </tr>
                                                            <tr>
                                                              <td class="menu_main"><a href="Principal.php?link=link30" name="link13" class="menu_main_link_l Estilo1" id="link7"  > Inventarios Generales </a></td>
                                                            </tr>
                                                            <tr>
                                                              <td class="menu_main"><a href="Principal.php?link=link18" name="link18" class="menu_main_link_l Estilo1" id="link4"  >Registro Clasificacion</a></td>
                                                            </tr>
                                                            <tr>
                                                              <td class="menu_main"><a href="Principal.php?link=link19"  name="link19" class="menu_main_link_l Estilo1" id="link4"  >Consulta de Clasificacion </a></td>
                                                            </tr>
                                                            <tr>
                                                              <td class="menu_main"><a href="Principal.php?link=link22" name="link22" class="menu_main_link_l Estilo1" id="link3"  >Registro Seguridad</a></td>
                                                            </tr>
                                                            <tr>
                                                              <td class="menu_main"><a href="Principal.php?link=link23"  name="link23" class="menu_main_link_l Estilo1" id="link2"  >Consulta de Seguridad</a></td>
                                                            </tr>
                                                            <tr>
                                                              <td class="menu_main"><a href="cerrarSesion.php" name="link4" class="menu_main_link_l Estilo1" id="link4"  >Salir del Sistema</a></td>
                                                            </tr>
                                                            <tr>
                                                              <td height="5"></td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                      <!-- Fin Menu Izquierda -->                                                    </td>
                                                  </tr>
                                                </tbody>
                                            </table></td>
                                          </tr>
                                          <tr>
                                            <td><img src="imagenes/fondo_box_bottom_l.jpg" /></td>
                                          </tr>
                                          <tr>
                                            <td height="5"></td>
                                          </tr>
                                          <tr>
                                            <td>&nbsp;</td>
                                          </tr>
                                          <tr>
                                            <td>&nbsp;</td>
                                          </tr>
                                          <tr>
                                            <td>&nbsp;</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    <!-- Fin de Columna de Contenido Izquierda -->                                  </td>
                                  <td width="3"></td>
                                  <td width="593" bgcolor="#FFFFFF" style="padding-top:5px;"><?php 

											 $menu=$_GET["link"];

												switch ($menu){
												case "link1":
												include("registroUsuarios.php");
												break;
												case "link2":
												include("consultaUsu.php");
												break;
												case "link3":
												include("consultaUsu2.php");
												break;
												case "link4":
												include("modificarUsu.php");
												break;
												case "link5":
												include("eliminarUsu.php");
												break;
												case "link6":
												include("RegistroPrestamo.php");
												break;
												case "link7":
												include("consultaPrestamo.php");
												break;
												case "link8":
												include("consultaPrestamo2.php");
												break;
												case "link9":
												include("modificarPrestamo.php");
												break;
												case "link10":
												include("detallePrestamo.php");
												break;
												case "link11":
												include("eliminarPrestamo.php");
												break;
												
												
												case "link12":
												include("RegistroInventario.php");
												break;
												case "link13":
												include("consulatInventario1.php");
												break;
												case "link14":
												include("consultaInventario2.php");
												break;
												case "link15":
												include("modificarInventario.php");
												break;
												case "link16":
												include("detallesInventario.php");
												break;
												case "link17":
												include("eliminarInventario.php");
												break;
												
												case "link18":
												include("registroClasificiacion.php");
												break;
												case "link19":
												include("consultarClasificacion.php");
												break;
												case "link20":
												include("modificarClasificacion.php");
												break;
												case "link21":
												include("eliminarClasificacion.php");
												break;
												
												case "link22":
												include("RegistroUsuario.php");
												break;
												case "link23":
												include("consultaUsuarios.php");
												break;
												case "link24":
												include("modificarUsuarios.php");
												break;
												case "link25":
												include("eliminarUsuarios.php");
												break;
												case "link26":
												include("consultaUsu3.1.php");
												break;
												case "link27":
												include("consultaUsu3.php");
												break;
												case "link28":
												include("estadisticaFecha1.php");
												break;
												case "link29":
												include("estadisticaFecha2.php");
												break;
												case "link30":
												include("consultalGeneralInv.php");
												break;
												case "link31":
												include("consultaGeneralPres.php");
												break;
												default:
												include("fondo.php");
												
												}


  											?>
                                      <!-- Columna de Contenido Central -->
                                      <!-- Fin de Columna de Contenido Central --></td>
                                </tr>
                                <tr>
                                  <td colspan="3" valign="top"><div align="left"></div></td>
                                </tr>
                              </tbody>
                          </table></td>
                        </tr>
                      </tbody>
                  </table></td>
                </tr>
              </tbody>
          </table>
          <!--  Fin del Contenido  -->        </td>
	
        <td width="7" height="441" class="fondo" background="imagenes/border_right.jpg">      </td>
      </tr>
      <tr>
        <td colspan="3"><div align="center"><img src="imagenes/down.jpg" width="780" /></div></td>
      </tr>
      <tr>
        <td colspan="3"><!--  Footer  -->
            <table border="0" width="100%" cellpadding="0" cellspacing="0">
              <tbody>
                <tr>
                  <td align="center" class="footer"><!-- <a href="mailto://webmaster@me.gob.ve" class="foot">webmaster@me.gob.ve</a> -->                  </td>
                </tr>
              </tbody>
            </table>
          <!-- Fin Footer-->        </td>
      </tr>
    </tbody>
  </table>
</div>
</body></html>