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

$cod_venta = limpiar(base64_decode($_GET['cod_venta']));
$rutcliente = limpiar(base64_decode($_GET['rutcliente']));

$sql = mysql_query("select * from ventas,clientes where ventas.cod_venta = '".$cod_venta."' and ventas.rutcliente = clientes.rutcliente") or die(mysql_error());
while($array = mysql_fetch_array($sql)) {		
$i=1;		
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
<table style="width: 100%;" class="header">
<tr>
<td width="54%" height="111"><h1 style="text-align: left"><img src="img/logo_vertical.jpg" width="340" height="109" /></h1></td>
<td width="46%"><table style="width: 100%; font-size: 8pt;">
  <tr>
    <td><strong>RFC EMPRESA: </strong> <?php echo $array1['rut_empresa']; ?></td>
  </tr>
  <tr>
    <td><strong>EMPRESA: 
      </strong>
      <?php echo $array1['nom_empresa']; ?></td>
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
    <td><strong>CODIGO FACTURA DE VENTA:</strong> <?php echo $array['cod_venta']; ?></td>
  </tr>
  <tr>
    <td><strong>FECHA-HORA VENTA:</strong> <?php echo $fecha=date("d-m-Y h:i:s A",strtotime($array['fecha_venta'])); ?></td>
  </tr>
  <tr></tr>
</table>
</td>
</tr>
</table>
<div id="footer">
  <div class="page-number"></div>
</div>
  <div class="page" style="font-size: 7pt">
<table width="101%" class="change_order_items">
<tbody>
<tr>
  <th colspan="4">DATOS PERSONALES DEL CLIENTE  </th>
  </tr>
<tr>
<th width="13%" bgcolor="#317eac"><span class="Estilo58 Estilo111">RFC CLIENTE</span></th>
<th width="45%" bgcolor="#317eac"><span class="Estilo58 Estilo111">NOMBRES Y APELLIDOS </span></th>
<th width="13%" bgcolor="#317eac"><span class="Estilo58 Estilo111">TELEFONO</span></th>
<th width="29%" bgcolor="#317eac"><span class="Estilo58 Estilo111">DIRECCIÓN</span></th>
</tr>
<tr class="even_row">
  <td style="text-align: center"><div align="center"><span class="Estilo3"><?php echo $array['rutcliente']; ?></span></div></td>
  <td style="text-align: center"><div align="center"><span class="Estilo3"><?php echo $array['nombrecliente']; ?></span></div></td>
<td style="text-align: center"><div align="center"><span class="Estilo3"><?php echo $array['telefcliente']; ?></span></div></td>
<td style="text-align: center"><div align="center"><span class="Estilo3"><?php echo $array['direccliente']; ?></span></div></td>
</tr>
</tbody>
</table>
<table width="102%" class="change_order_items">
  <tr>
    <td colspan="7"><div align="center"><strong>DETALLES DE VENTAS DE PRODUCTOS  </strong></div></td>
  </tr>
  <tbody>
    <tr>
      <th width="7%" bgcolor="#317eac"><span class="Estilo111">Nº</span></th>
      <th width="7%" bgcolor="#317eac"><span class="Estilo111">CÓDIGO</span></th>
      <th width="36%" bgcolor="#317eac"><span class="Estilo58 Estilo111">DESCRIPCIÓN PRODUCTO </span></th>
      <th width="12%" bgcolor="#317eac"><span class="Estilo111">PRECIO</span></th>
      <th width="10%" bgcolor="#317eac"><span class="Estilo111">CANTIDAD</span></th>
      <th width="11%" bgcolor="#317eac"><span class="Estilo111">DESCUENTO </span></th>
      <th width="17%" bgcolor="#317eac"><span class="Estilo58 Estilo111">IMPORTE</span></th>
      </tr>
    <?php
$sql2 = mysql_query("select DISTINCT detalle_ventas.cod_material,detalle_ventas.cant_venta,detalle_ventas.descuento,detalle_ventas.importe,detalle_ventas.fecha_detalle,material_almacen.cod_material,material_almacen.precio_venta,orden_compras.cod_material,orden_compras.material from detalle_ventas, material_almacen, orden_compras where detalle_ventas.cod_venta = '".$cod_venta."' and detalle_ventas.status_detalle = 'VENDIDO' and detalle_ventas.cod_material = material_almacen.cod_material and orden_compras.cod_material = material_almacen.cod_material") or die(mysql_error());
 	
while($array2 = mysql_fetch_array($sql2)) {	
	
  ?>
    <tr class="even_row">
      <td style="text-align: center"><span class="Estilo3"><?php echo $i++; ?></span></td>
      <td style="text-align: center"><span class="Estilo3"><?php echo $array2['cod_material']; ?></span></td>
      <td style="text-align: center"><span class="Estilo3"><?php echo $array2['material']; ?></span></td>
      <td style="text-align: center"><span class="Estilo3"><strong><span class="add-on">$</span></strong><?php echo formatear2($array2['precio_venta'], 2); ?></span></td>
      <td style="text-align: center"><span class="Estilo3"><?php echo $array2['cant_venta']; ?></span></td>
      <td style="text-align: center"><span class="Estilo3"><?php echo $array2['descuento']; ?></span></td>
      <td style="text-align: center"><span class="Estilo3"><strong><span class="add-on">$</span></strong><?php echo $array2['importe']; ?></span></td>
	   <?php } ?>
      </tr>
    <tr class="even_row">
      <td colspan="7" style="text-align: center"><table style="width: 100%; font-size: 8pt;">
        <tr>
          <td width="84%" class="even_row" style="text-align: center"><div align="right"><strong><span style="text-align: right;">SUB-TOTAL:</span></strong></div></td>
          <td width="16%" class="odd_row" style="text-align: right; border-right-style: none;"><div align="center"><strong><span class="add-on">$</span><?php echo $array['subtotal']; ?></strong></div></td>
        </tr>
        <tr>
          <td class="even_row" style="text-align: center"><div align="right"><strong><span style="text-align: right;">IVA:</span></strong></div></td>
          <td class="odd_row" style="text-align: center; border-right-style: none;"><div align="left"><strong><span style="text-align: right;"><?php echo $array['iva']; ?></span> %</strong></div></td>
        </tr>
        <tr>
          <td class="even_row" style="text-align: center"><div align="right"><strong><span style="text-align: right;">TOTAL-IVA:</span></strong></div></td>
          <td class="odd_row" style="text-align: right; border-right-style: none;"><div align="center"><strong><span class="add-on">$</span><?php echo $array['total_iva']; ?></strong></div></td>
        </tr>
        <tr>
          <td class="even_row" style="text-align: center"><div align="right"><strong><span style="text-align: right;">TOTAL A PAGAR :</span></strong></div></td>
          <td class="odd_row" style="text-align: right; border-right-style: none;"><div align="center"><strong><span class="add-on">$</span><?php echo $array['total_pago']; ?></strong></div></td>
        </tr>
        <?php } ?>
      </table></td>
      </tr>
  </tbody>
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
    $dompdf->stream("Facturas Ventas.pdf", array('Attachment'=>'0'));
	  
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


