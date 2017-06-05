<?php 
session_start(); 
if(isset($_SESSION['acceso'])) { 
if ($_SESSION['acceso'] == "admin" || $_SESSION["acceso"]=="asist") {
ob_start();	
include('conexion.php');
conectarse();
include_once('funciones_basicas.php');

$sql1 = mysql_query("select * from configuracion") or die(mysql_error());
$array1 = mysql_fetch_array($sql1);

$sql = mysql_query("Select * from material_almacen") or die(mysql_error());

if (mysql_affected_rows()<=0) {

?>
<script type='text/javascript' language='javascript'>
            alert('ERROR! NO EXISTEN PRODUCTOS EN ALMACEN REGISTRADOS')
            var ventana = window.self;
            ventana.opener = window.self;
            ventana.close();  
            </script>
<?php
exit;
}
else
{
$sql = mysql_query("Select DISTINCT orden_compras.cod_material,orden_compras.material,orden_compras.rutprov,material_almacen.precio_venta,material_almacen.existencia,material_almacen.minimo_stock,material_almacen.status_material,proveedores.rutprov,proveedores.nombreprov from material_almacen, orden_compras, proveedores where material_almacen.cod_material = orden_compras.cod_material and proveedores.rutprov = orden_compras.rutprov") or die(mysql_error());
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
<table width="101%" class="change_order_items">
<tbody>
<tr>
  <th colspan="8">LISTADO GENERAL DE PRODUCTOS EN ALMACEN </th>
  </tr>
<tr>
<th width="3%" bgcolor="#317eac"><span class="Estilo111">N&ordm;</span></th>
<th width="5%" bgcolor="#317eac"><span class="Estilo58 Estilo111">CÓDIGO</span></th>
<th width="23%" bgcolor="#317eac"><span class="Estilo58 Estilo111">PRODUCTO</span></th>
<th width="11%" bgcolor="#317eac"><span class="Estilo58 Estilo111">PRECIO VENTA</span></th>
<th width="10%" bgcolor="#317eac"><span class="Estilo58 Estilo111">EXISTENCIA</span></th>
<th width="11%" bgcolor="#317eac"><span class="Estilo58 Estilo111">MINIMO STOCK </span></th>
<th width="9%" bgcolor="#317eac"><span class="Estilo58 Estilo111">ESTADO</span></th>
<th width="28%" bgcolor="#317eac"><span class="Estilo58 Estilo111">PROVEEDOR</span></th>
</tr>
<?php
while($array = mysql_fetch_array($sql)) {
  ?>
<tr class="even_row">
<td style="text-align: center"><div align="center"><span class="Estilo3"><?php echo $i++; ?></span></div></td>
<td><div align="center"><span class="Estilo3"><?php echo $array['cod_material']; ?></span></div></td>
<td style="text-align: center"><div align="center"><span class="Estilo3"><?php echo $array['material']; ?></span></div></td>
<td style="text-align: center"><div align="center"><span class="Estilo3"><strong><span class="add-on">$</span></strong><?php echo $array['precio_venta']; ?></span></div></td>
<td style="text-align: center"><div align="center"><span class="Estilo3"><?php echo $array['existencia']; ?></span></div></td>
<td style="text-align: center"><div align="center"><span class="Estilo3"><?php echo $array['minimo_stock']; ?></span></div></td>
<td style="text-align: center"><div align="center"><span class="Estilo3"><?php echo $array['status_material']; ?></span></span></div></td>
<td style="text-align: right; border-right-style: none;"><div align="center"><span class="Estilo3"><?php echo $array['nombreprov']; ?></span></div></td>
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

  <p class="Estilo50 Estilo107"> <?php
	
	$salida_html = ob_get_contents();
	ob_end_clean(); 

   require_once("dompdf/dompdf_config.inc.php");       
    $dompdf = new DOMPDF();
	$dompdf->set_paper("letter", $orientation = "landscape");
    $dompdf->load_html($salida_html);
    $dompdf->render();
    $dompdf->stream("Productos en Almacen.pdf", array('Attachment'=>'0'));
	  
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


