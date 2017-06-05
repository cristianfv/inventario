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
.Estilo109 {font-size: 10px}
.Estilo111 {color: #FFFFFF}
-->
</style>
</head>
<table style="width: 100%;" class="header">
<tr>
<td width="54%" height="94"><h1 style="text-align: left"><img src="img/logo_vertical.jpg" width="340" height="70" /></h1></td>
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
    <td width="43%"><strong>CODIGO NOTA DE VENTA:</strong> <?php echo $array['cod_venta']; ?></td>
  </tr>
  
  <tr>
    <td height="20"><strong>FECHA-HORA VENTA:</strong> <?php echo $fecha=date("d-m-Y h:i:s A",strtotime($array['fecha_venta'])); ?></td>
  </tr>
</table>
</td>
</tr>
</table>
  <table width="89%" class="change_order_items">
  <tr>
    <td colspan="5"> <span class="Estilo109"><strong>CLIENTE:</strong>  <em><u><?php echo $array['nombrecliente']; ?></u></em><strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DIRECCIÓN:</strong>  <em><u><?php echo $array['direccliente']; ?></u> <br /><strong>DOCUMENTO IDENTIDAD: </strong>  <em><u><?php echo "RUT ".$array['rutcliente']; ?></u></em></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>TELEFONO: </strong>  <em><u><?php echo $array['telefcliente']; ?></u></em></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>FECHA-HORA VENTA:</strong> <em><u><?php echo $fecha=date("d-m-Y h:i:s A",strtotime($array['fecha_venta'])); ?></u></em></td>
  </tr>
  <tbody>
    <tr>
      <th width="8%" bgcolor="#317eac"><span class="Estilo111">Nº</span></th>
      <th width="14%" bgcolor="#317eac"><span class="Estilo111">CANTIDAD</span></th>
      <th width="39%" bgcolor="#317eac"><span class="Estilo58 Estilo111">DESCRIPCIÓN PRODUCTO </span></th>
      <th width="20%" bgcolor="#317eac"><span class="Estilo111">PRECIO UNIT. </span></th>
      <th width="19%" bgcolor="#317eac"><span class="Estilo58 Estilo111">IMPORTE</span></th>
    </tr>
    <?php
$sql2 = mysql_query("select DISTINCT detalle_ventas.cod_material,detalle_ventas.cant_venta,detalle_ventas.descuento,detalle_ventas.importe,detalle_ventas.fecha_detalle,material_almacen.cod_material,material_almacen.precio_venta,orden_compras.cod_material,orden_compras.material from detalle_ventas, material_almacen, orden_compras where detalle_ventas.cod_venta = '".$cod_venta."' and detalle_ventas.status_detalle = 'VENDIDO' and detalle_ventas.cod_material = material_almacen.cod_material and orden_compras.cod_material = material_almacen.cod_material") or die(mysql_error());
 	
while($array2 = mysql_fetch_array($sql2)) {	
	
  ?>
    <tr class="even_row">
      <td style="text-align: center"><span class="Estilo3"><?php echo $i++; ?></span></td>
      <td style="text-align: center"><span class="Estilo3"><?php echo $array2['cant_venta']; ?></span></td>
      <td style="text-align: center"><span class="Estilo3"><?php echo $array2['material']; ?></span></td>
      <td style="text-align: center"><span class="Estilo3"><strong><span class="add-on">$</span></strong><?php echo formatear2($array2['precio_venta'], 2); ?></span></td>
      <td style="text-align: center"><span class="Estilo3"><strong><span class="add-on">$</span></strong><?php echo $array2['importe']; ?></span></td>
      <?php } ?>
    </tr>
    <tr class="even_row">
      <td colspan="5" style="text-align: center"><table style="width: 100%; font-size: 8pt;">
        <tr>
          <td width="82%" class="even_row" style="text-align: center"><div align="right"><strong><span style="text-align: right;">SUB-TOTAL:</span></strong></div></td>
          <td width="18%" class="odd_row" style="text-align: right; border-right-style: none;"><div align="center"><strong><span class="add-on">$</span><?php echo $array['subtotal']; ?></strong></div></td>
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
    <td width="218" style="padding-top: 0em"><span class="Estilo109"><strong>RECIBIDO POR :</strong></span></td>
    <td width="141" style="text-align: center; padding-top: 0em;">&nbsp;</td>
  </tr>
  <tr>
    <td style="padding-top: 0em">&nbsp;</td>
    <td style="text-align: center; padding-top: 0em;">&nbsp;</td>
  </tr>
  <tr>
    <td style="padding-top: 0em">&nbsp;</td>
    <td style="text-align: center; padding-top: 0em;">&nbsp;</td>
  </tr>
</table>
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


