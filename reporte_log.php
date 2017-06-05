<?php
ob_start(); 
session_start(); 
if(isset($_SESSION['acceso'])) { 
if ($_SESSION['acceso'] == "admin") {
	
include('conexion.php');
conectarse();
include_once('funciones_basicas.php');

$sql1 = mysql_query("select * from configuracion") or die(mysql_error());
$array1 = mysql_fetch_array($sql1);

$sql = mysql_query("Select * from log") or die(mysql_error());

if (mysql_affected_rows()<=0) {

?>
<script type='text/javascript' language='javascript'>
            alert('ERROR! NO EXISTEN LOGS DE ACCESO REGISTRADOS')
            var ventana = window.self;
            ventana.opener = window.self;
            ventana.close();  
            </script>
<?php
exit;
}
else
{
$sql = mysql_query("Select * from log") or die(mysql_error());
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="img/favicon.ico">
<link rel="STYLESHEET" href="dompdf/css/print_static.css" type="text/css" />
<style type="text/css">
<!--
.Estilo107 {font-size: 12px}
.Estilo108 {
	font-size: 10px;
	font-weight: bold;
}
.Estilo109 {font-size: 10px}
.Estilo110 {font-size: 9px; font-weight: bold; }
.Estilo111 {color: #FFFFFF}
-->
</style>
</head>
<table width="96%" class="header" style="width: 100%;">
<tr>
<td width="42%" height="111"><h1 style="text-align: left"><img src="img/logo_vertical.jpg" width="340" height="109" /></h1></td>
<td width="58%"><table style="width: 100%; font-size: 8pt;">
  <tr>
    <td><strong>RUT EMPRESA: </strong> <?php echo $array1['rut_empresa']; ?></td>
  </tr>
  <tr>
    <td><strong>EMPRESA: </strong> <?php echo $array1['nom_empresa']; ?></td>
  </tr>
  <tr>
    <td width="43%"><strong>VENDEDOR</strong></td>
  </tr>
  <tr>
    <td><strong>RUT VENDEDOR: </strong><?php echo $_SESSION["cedula"]; ?></td>
  </tr>
  <tr>
    <td><strong>NOMBRE: </strong><?php echo $_SESSION["nombre"]; ?></td>
  </tr>
  <tr>
    <td><strong>FECHA-HORA IMPRESO: </strong>
      <?php echo $fecha=date("d-m-Y h:i:s A"); ?></td>
  </tr>
  <tr></tr>
</table></td>
</tr>
</table>
<div id="footer">
  <div class="page-number"></div>
</div>
<div class="page" style="font-size: 7pt">
<table width="101%" class="change_order_items">
<tbody>
<tr>
  <th colspan="6">LISTADO GENERAL DE LOGS DE ACCESO</th>
  </tr>
<tr>
<th width="5%" bgcolor="#317eac"><span class="Estilo111">N&ordm;</span></th>
<th width="15%" bgcolor="#317eac"><span class="Estilo58 Estilo111">IP</span></th>
<th width="16%" bgcolor="#317eac"><span class="Estilo58 Estilo111">TIEMPO DE ENTRADA </span></th>
<th width="40%" bgcolor="#317eac"><span class="Estilo58 Estilo111">DETALLES</span></th>
<th width="13%" bgcolor="#317eac"><span class="Estilo58 Estilo111">PÀGINAS</span></th>
<th width="11%" bgcolor="#317eac"><span class="Estilo58 Estilo111">USUARIO</span></th>
</tr>
<?php
while($array = mysql_fetch_array($sql)) {
  ?>
<tr class="even_row">
<td style="text-align: center"><div align="center"><span class="Estilo3"><?php echo $array['id']; ?></span></div></td>
<td><div align="center"><span class="Estilo3"><?php echo $array['ip']; ?></span></div></td>
<td style="text-align: center"><div align="center"><span class="Estilo3"><?php echo $array['tiempo']; ?></span></div></td>
<td style="text-align: center"><div align="center"><span class="Estilo3"><?php echo $array['detalles']; ?></span></div></td>
<td style="text-align: center"><div align="center"><span class="Estilo3"><?php echo $array['paginas']; ?></span></div></td>
<td style="text-align: right; border-right-style: none;"><div align="center"><span class="Estilo3"><?php echo $array['usuario']; ?></span></div></td>
</tr><?php } ?>
</tbody>
 <?php } ?>
</table>
<table class="sa_signature_box" style="border-top: 1px solid black; padding-top: 2em; margin-top: 2em;">
  <tr>
    <td style="padding-top: 0em"><span class="Estilo109"><strong>REVISADO POR :</strong></span></td>
    <td style="text-align: center; padding-top: 0em;">&nbsp;</td>
  </tr>
  <tr>
    <td style="padding-top: 0em"><span class="Estilo110"><span id="result_box" lang="es" xml:lang="es">ESTE REPORTE  NO TENDRÁ FUERZA O EFECTO HASTA QUE SEA REVISADO Y FIRMADO POR UN FUNCIONARIO DE LA EMPRESA </span></span></td>
    <td style="text-align: center; padding-top: 0em;">&nbsp;</td>
  </tr>
  <tr>
    <td style="padding-top: 0em">&nbsp;</td>
    <td style="text-align: center; padding-top: 0em;">&nbsp;</td>
  </tr>
  <tr>
    <td style="padding-top: 0em"><span class="Estilo108">REALIZADO EL DIA <?php echo date("d")?> DE <?php echo convertir(date('m'))?> DEL <?php echo date("Y")?></span></td>
    <td style="text-align: center; padding-top: 0em;">&nbsp;</td>
  </tr>
</table>
</div>

</div>
</div>
<p class="Estilo50 Estilo107"> <?php
	
	$salida_html = ob_get_contents();
	ob_end_clean(); 

    require_once("dompdf/dompdf_config.inc.php");       
    $dompdf = new DOMPDF();
	$dompdf->set_paper("letter", $orientation = "landscape");
    $dompdf->load_html($salida_html);
    $dompdf->render();
    $dompdf->stream("Listado Logs de Acceso.pdf", array('Attachment'=>'0'));
	  
?>

<?php } else { ?>	
		<script type='text/javascript' language='javascript'>
	    alert('USTED NO TIENE ACCESO A ESTA PARTE DE LA PAGINA')  
		document.location.href='admin.php'	 
        </script> 
<?php } } else { ?>
		<script type='text/javascript' language='javascript'>
	    alert('USTED NO TIENE ACCESO A ESTA PAGINA')  
		document.location.href='logout.php'	 
        </script> 
<?php } ?>


