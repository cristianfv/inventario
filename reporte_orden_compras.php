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

$rutprov=limpiar($_POST['rutprov']);

$sql = mysql_query("select * from orden_compras where rutprov = '".$rutprov."'") or die(mysql_error());

if (mysql_affected_rows()<=0) {

?>
<script type='text/javascript' language='javascript'>
            alert('ERROR! NO EXISTEN PRODUCTOS RELACIONADOS AL PROVEEDOR CON RFC <?php echo $rutprov; ?>')
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
$rutprov=limpiar($_POST['rutprov']);

$sql = mysql_query("Select * from proveedores where rutprov = '".$rutprov."'") or die(mysql_error());
$array = mysql_fetch_array($sql);
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
.Estilo112 {
	font-size: 10pt;
	font-weight: bold;
}
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
  <div align="center" class="Estilo112">REPORTE DE ORDEN DE COMPRAS DE PRODUCTOS   </div>
<table width="101%" class="change_order_items">
<tbody>
<tr>
  <th colspan="5">DATOS PERSONALES DEL PROVEEDOR  </th>
  </tr>
<tr>
<th width="13%" bgcolor="#317eac"><span class="Estilo58 Estilo111">RFC</span></th>
<th width="25%" bgcolor="#317eac"><span class="Estilo58 Estilo111">NOMBRES</span></th>
<th width="7%" bgcolor="#317eac"><span class="Estilo58 Estilo111">TELEFONO</span></th>
<th width="29%" bgcolor="#317eac"><span class="Estilo58 Estilo111">DIRECCIÓN</span></th>
<th width="26%" bgcolor="#317eac"><span class="Estilo58 Estilo111">CONTACTO</span></th>
</tr>
<tr class="even_row">
  <td style="text-align: center"><div align="center"><span class="Estilo3"><?php echo $array['rutprov']; ?></span></div></td>
  <td style="text-align: center"><div align="center"><span class="Estilo3"><?php echo $array['nombreprov']; ?></span></div></td>
<td style="text-align: center"><div align="center"><span class="Estilo3"><?php echo $array['telefprov']; ?></span></div></td>
<td style="text-align: center"><div align="center"><span class="Estilo3"><?php echo $array['direcprov']; ?></span></div></td>
<td style="text-align: right; border-right-style: none;"><div align="center"><span class="Estilo3"><?php echo $array['nomcontacto']; ?></span></div></td>
</tr>
</tbody>
</table>
<table width="102%" class="change_order_items">
  <tr>
    <td colspan="6"><div align="center"><strong>LISTA DE PRODUCTOS DE ORDEN DE COMPRAS </strong></div></td>
  </tr>
  <tbody>
    <tr>
      <th width="8%" bgcolor="#317eac"><span class="Estilo111">CÓDIGO</span></th>
      <th width="32%" bgcolor="#317eac"><span class="Estilo58 Estilo111">DESCRIPCIÓN MATERIAL </span></th>
      <th width="14%" bgcolor="#317eac"><span class="Estilo111">PREC. COMP.</span></th>
      <th width="11%" bgcolor="#317eac"><span class="Estilo111">CANTIDAD</span></th>
      <th width="20%" bgcolor="#317eac"><span class="Estilo111">MONTO * PRODUCTOS  </span></th>
      <th width="15%" bgcolor="#317eac"><span class="Estilo58 Estilo111">FECHA</span></th>
      </tr>
    <?php
$sql2 = mysql_query("select * from orden_compras where rutprov = '".$rutprov."' and fecha_ingreso >= '".$fecha_desde."' and fecha_ingreso <= '".$fecha_hasta."'") or die(mysql_error());
$pagoTotal=0;	
while($array2 = mysql_fetch_array($sql2)) {
$decision=$array2['precio_compra'] * $array2['cant'];
$pagoTotal+=$decision;
  ?>
    <tr class="even_row">
      <td style="text-align: center"><span class="Estilo3"><?php echo $array2['cod_material']; ?></span></td>
      <td style="text-align: center"><span class="Estilo3"><?php echo $array2['material']; ?></span></td>
      <td style="text-align: center"><span class="Estilo3"><strong><span class="add-on">$</span></strong><?php echo formatear2($array2['precio_compra'], 2); ?></span></td>
      <td style="text-align: center"><span class="Estilo3"><?php echo $array2['cant']; ?></span></td>
      <td style="text-align: center"><span class="Estilo3"><?php echo formatear2($array2['precio_compra'] * $array2['cant'], 2); ?></span></td>
      <td style="text-align: center"><span class="Estilo3"><?php echo $fecha=date("d-m-Y",strtotime($array2['fecha_ingreso'])); ?></span></td>
	   <?php } ?>
      </tr>
    <tr class="even_row">
      <td colspan="6" style="text-align: center"><table style="width: 100%; font-size: 8pt;">
  <tr>
    <td class="even_row" style="text-align: center">&nbsp;</td>
    <td class="odd_row" style="text-align: right; border-right-style: none;">&nbsp;</td>
  </tr>
  <tr>
    <td width="84%" class="even_row" style="text-align: center"><div align="right"><strong><span style="text-align: right;">TOTAL COMPRA:</span></strong></div></td>
    <td width="16%" class="odd_row" style="text-align: right; border-right-style: none;"><div align="center"><strong>
      <span class="add-on">$</span><?php echo formatear2($pagoTotal, 2); ?></strong></div></td>
  </tr>
  <tr>
    <td class="even_row" style="text-align: center"><div align="right"><strong><span style="text-align: right;">TOTAL EXISTENCIA PRODUCTOS:</span></strong></div></td>
    <td class="odd_row" style="text-align: right; border-right-style: none;"><div align="center"><strong>
      <?php 
$sq = mysql_query("select sum(cant) as total from orden_compras where rutprov = '".$rutprov."' and fecha_ingreso >= '".$fecha_desde."' and fecha_ingreso <= '".$fecha_hasta."'") or die(mysql_error());
$re=mysql_fetch_array($sq);	
if($re['total']==""){
		echo "0";
		}else{
		echo $re['total'];
		}
 ?>
    </strong></div></td>
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
    $dompdf->stream("Reporte Orden de Compras.pdf", array('Attachment'=>'0'));
	  
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


