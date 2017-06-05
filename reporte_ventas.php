<?php 
ob_start();
session_start(); 
if(isset($_SESSION['acceso'])) { 
if ($_SESSION['acceso'] == "admin" || $_SESSION["acceso"]=="asist") {
	
include('conexion.php');
conectarse();
include_once('funciones_basicas.php');

$sql1 = mysql_query("select * from configuracion") or die(mysql_error());
$array1 = mysql_fetch_array($sql1);

$se1 =$_POST['dia'];
$se2 =$_POST['mes'];
$se3 =$_POST['ano'];
$se4 =$_POST['dia1'];
$se5 =$_POST['mes1'];
$se6 =$_POST['ano1'];

$fecha_desde = ($se3."-".$se2."-".$se1);
$fecha_hasta = ($se6."-".$se5."-".$se4);

$sql2 = mysql_query("select DISTINCT fecha_venta from ventas where fecha_venta >= '".$fecha_desde."' and fecha_venta <= '".$fecha_hasta."'") or die(mysql_error());

if (mysql_affected_rows()<=0) {

?>
<script type='text/javascript' language='javascript'>
            alert('ERROR! NO EXISTEN VENTAS REGISTRADAS EN LAS FECHAS CONSULTADAS')
            var ventana = window.self;
            ventana.opener = window.self;
            ventana.close();  
            </script>
<?php
exit;
}
else
{
$se1 =$_POST['dia'];
$se2 =$_POST['mes'];
$se3 =$_POST['ano'];
$se4 =$_POST['dia1'];
$se5 =$_POST['mes1'];
$se6 =$_POST['ano1'];

$fecha_desde = ($se3."-".$se2."-".$se1);
$fecha_hasta = ($se6."-".$se5."-".$se4);
$sql = mysql_query("select DISTINCT iva,fecha_venta from ventas where fecha_venta >= '".$fecha_desde."' and fecha_venta <= '".$fecha_hasta."'") or die(mysql_error());
$i=1;
?>
<title>Sitema de Inventario CFV Familiar</title>	
<html>
<style type="text/css">
<!--
.Estilo113 {font-size: 9pt}
-->
</style>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
<meta name="author" content="Muhammad Usman">
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
.Estilo112 {
	font-size: 10pt;
	font-weight: bold;
}
.Estilo117 {color: #FFFFFF; font-size: 10px; }
-->
</style>
</head>
<table style="width: 100%;" class="header">
<tr>
<td width="54%" height="111"><h1 style="text-align: left"><img src="img/logo_vertical.jpg" width="340" height="109" /></h1></td>
<td width="46%"><table style="width: 100%; font-size: 8pt;">
  <tr>
    <td><strong>RFC EMPRESA: </strong> <?php echo $array1['rut_empresa']; ?></td>
  </tr>
  <tr>
    <td><strong>EMPRESA: </strong> <?php echo $array1['nom_empresa']; ?></td>
  </tr>
  <tr>
    <td width="43%"><strong>VENDEDOR</strong></td>
  </tr>
  <tr>
    <td><strong>RFC VENDEDOR: </strong><?php echo $_SESSION["cedula"]; ?></td>
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
  <div align="center" class="Estilo112">REPORTES DE VENTAS POR FECHAS</div>
<table width="102%" class="change_order_items">
  <tr>
    <td colspan="6"><div align="center"><strong>LISTADO DE VENTAS POR FECHAS </strong></div></td>
  </tr>
  <tbody>
    <tr>
      <th width="10%" bgcolor="#317eac"><span class="Estilo117">CÓDIGO </span></th>
      <th width="17%" bgcolor="#317eac"><span class="Estilo58 Estilo111 Estilo109">MONTO SUBTOTAL </span></th>
      <th width="16%" bgcolor="#317eac"><span class="Estilo58 Estilo111 Estilo109">IVA%</span></th>
      <th width="18%" bgcolor="#317eac"><span class="Estilo117">MONTO TOTAL IVA </span></th>
      <th width="18%" bgcolor="#317eac"><span class="Estilo117">MONTO TOTAL PAGO </span></th>
      <th width="21%" bgcolor="#317eac"><span class="Estilo117">FECHA VENTA   </span></th>
      </tr>
    <?php
$pagosubTotal=0;
$pagoTotaliva=0;
$pagoTotal=0;	
while($array2 = mysql_fetch_array($sql)) {

$sql3 = mysql_query("select sum(subtotal) as subtotal, sum(total_iva) as total_iva, sum(total_pago) as total_pago from ventas where fecha_venta='".$array2['fecha_venta']."'") or die(mysql_error());	  
$array3=mysql_fetch_array($sql3);

$pagosubTotal+=$array3['subtotal'];
$pagoTotaliva+=$array3['total_iva'];
$pagoTotal+=$array3['total_pago'];

  ?>
    <tr class="even_row">
      <td style="text-align: center"><span class="Estilo3 Estilo113"><?php echo $i++; ?></span></td>
      <td style="text-align: center"><span class="Estilo3 Estilo113"><strong><span class="add-on">$</span></strong><?php echo $array3['subtotal']; ?></span></td>
      <td style="text-align: center"><span class="Estilo3 Estilo113"><?php echo $array2['iva']; ?> % </span></td>
      <td style="text-align: center"><span class="Estilo3 Estilo113"><strong><span class="add-on">$</span></strong><?php echo $array3['total_iva']; ?></span></td>
      <td style="text-align: center"><span class="Estilo3 Estilo113"><strong><span class="add-on">$</span></strong><?php echo $array3['total_pago']; ?></span></td>
      <td style="text-align: center"><span class="Estilo3 Estilo113"><?php echo $fecha=date("d-m-Y",strtotime($array2['fecha_venta'])); ?></span></td>
      <?php } ?>
      </tr>
    <tr class="even_row">
      <td colspan="6" style="text-align: center"><table style="width: 100%; font-size: 8pt;">
  <tr>
    <td class="even_row" style="text-align: center"><div align="right"><strong><span style="text-align: right;">MONTO GENERAL SUBTOTAL:</span></strong></div></td>
    <td class="odd_row" style="text-align: right; border-right-style: none;"><div align="center"><strong><span class="add-on">$</span><?php echo formatear2($pagosubTotal, 2); ?></strong></div></td>
  </tr>
  <tr>
    <td width="84%" class="even_row" style="text-align: center"><div align="right"><strong><span style="text-align: right;">MONTO GENERAL IVA:</span></strong></div></td>
    <td width="16%" class="odd_row" style="text-align: right; border-right-style: none;"><div align="center"><strong> <span class="add-on">$</span><?php echo formatear2($pagoTotaliva, 2); ?></strong></div></td>
  </tr>
  <tr>
    <td class="even_row" style="text-align: center"><div align="right"><strong><span style="text-align: right;">MONTO GENERAL VENTAS:</span></strong></div></td>
    <td class="odd_row" style="text-align: right; border-right-style: none;"><div align="center"><strong><span class="add-on">$</span><?php echo formatear2($pagoTotal, 2); ?></strong></div></td>
  </tr>
</table></td>
      </tr>
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

  <p class="Estilo50 Estilo107"> <?php
	
	$salida_html = ob_get_contents();
	ob_end_clean(); 

    require_once("dompdf/dompdf_config.inc.php");       
    $dompdf = new DOMPDF();
    $dompdf->load_html($salida_html);
    $dompdf->render();
    $dompdf->stream("Reporte Ventas por fechas.pdf", array('Attachment'=>'0'));
	  
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



