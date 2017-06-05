<?php
session_start(); 
if(isset($_SESSION['acceso'])) { 
if ($_SESSION['acceso'] == "admin" || $_SESSION["acceso"]=="asist") {

include_once('conexion.php');
conectarse();

include_once('funciones_basicas.php');
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!--
		Charisma v1.0.0

		Copyright 2012 Muhammad Usman
		Licensed under the Apache License v2.0
		http://www.apache.org/licenses/LICENSE-2.0

		http://usman.it
		http://twitter.com/halalit_usman
	-->
	<meta charset="utf-8">
	<title>Sitema de Inventario CFV Familiar</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
	<meta name="author" content="Muhammad Usman">

	<!-- The styles -->
	<link id="bs-css" href="css/bootstrap-cerulean.css" rel="stylesheet">
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/charisma-app.css" rel="stylesheet">
	<link href="css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	<link href='css/fullcalendar.css' rel='stylesheet'>
	<link href='css/fullcalendar.print.css' rel='stylesheet'  media='print'>
	<link href='css/chosen.css' rel='stylesheet'>
	<link href='css/uniform.default.css' rel='stylesheet'>
	<link href='css/colorbox.css' rel='stylesheet'>
	<link href='css/jquery.cleditor.css' rel='stylesheet'>
	<link href='css/jquery.noty.css' rel='stylesheet'>
	<link href='css/noty_theme_default.css' rel='stylesheet'>
	<link href='css/elfinder.min.css' rel='stylesheet'>
	<link href='css/elfinder.theme.css' rel='stylesheet'>
	<link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
	<link href='css/opa-icons.css' rel='stylesheet'>
	<link href='css/uploadify.css' rel='stylesheet'>

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<script language="javascript" src="ajax.js"></script>
    <script language="javascript" src="ajaxx.js"></script>
    <script src="js/jquery.js"></script>
	<script language="javascript">
function validarcampos(indice) {       
var i = 1;
    var existencia=parseInt(document.getElementById('existencia'+i).value);
    var cantidad=parseInt(document.getElementById('cantidad'+i).value);
   
    if(cantidad > existencia)

  {
     alert('ERROR! LA CANTIDAD ' + cantidad + ' NO PUEDE SER MAYOR QUE LA EXISTENCIA '+ existencia);
      return false;
   } else{
    return true;    
   }
   i++;
}

</script>
<script type="text/javascript">
function actualizar_importe()
			{
				
				var precio1=document.getElementById("precio1").value;
				var cantidad1=document.getElementById("cantidad1").value;
				var descuento1=document.getElementById("descuento1").value;
				
				var precio2=document.getElementById("precio2").value;
				var cantidad2=document.getElementById("cantidad2").value;
				var descuento2=document.getElementById("descuento2").value;
				
				var precio3=document.getElementById("precio3").value;
				var cantidad3=document.getElementById("cantidad3").value;
				var descuento3=document.getElementById("descuento3").value;
				
				var precio4=document.getElementById("precio4").value;
				var cantidad4=document.getElementById("cantidad4").value;
				var descuento4=document.getElementById("descuento4").value;
				
				var precio5=document.getElementById("precio5").value;
				var cantidad5=document.getElementById("cantidad5").value;
				var descuento5=document.getElementById("descuento5").value;
				
				var precio6=document.getElementById("precio6").value;
				var cantidad6=document.getElementById("cantidad6").value;
				var descuento6=document.getElementById("descuento6").value;
				
				var precio7=document.getElementById("precio7").value;
				var cantidad7=document.getElementById("cantidad7").value;
				var descuento7=document.getElementById("descuento7").value;
				
				var precio8=document.getElementById("precio8").value;
				var cantidad8=document.getElementById("cantidad8").value;
				var descuento8=document.getElementById("descuento8").value;
				
				var precio9=document.getElementById("precio9").value;
				var cantidad9=document.getElementById("cantidad9").value;
				var descuento9=document.getElementById("descuento9").value;
				
				var precio10=document.getElementById("precio10").value;
				var cantidad10=document.getElementById("cantidad10").value;
				var descuento10=document.getElementById("descuento10").value;
				
				var iva=document.getElementById("iva").value;
				var subtotal=document.getElementById("subtotal").value;
				
				//REALIZO EL PRIMER CALCULO
				descuento=descuento1/100;
				tot=precio1*cantidad1;
				desc=tot*descuento;
				total=tot-desc;
				var original=parseFloat(total);
				var importe1=Math.round(original*100)/100 ;
				document.getElementById("importe1").value=importe1;
				
				
				//REALIZO EL SEGUNDO CALCULO
				descuento=descuento2/100;
				tot=precio2*cantidad2;
				desc=tot*descuento;
				tot2=tot-desc;
				var orig=parseFloat(tot2);
				var importe2=Math.round(orig*100)/100 ;
				document.getElementById("importe2").value=importe2;
				
				//REALIZO EL TERCER CALCULO
				descuento=descuento3/100;
				tot=precio3*cantidad3;
				desc=tot*descuento;
				tot3=tot-desc;
				var orig=parseFloat(tot3);
				var importe3=Math.round(orig*100)/100 ;
				document.getElementById("importe3").value=importe3;
				
				//REALIZO EL CUARTO CALCULO
				descuento=descuento4/100;
				tot=precio4*cantidad4;
				desc=tot*descuento;
				tot4=tot-desc;
				var orig=parseFloat(tot4);
				var importe4=Math.round(orig*100)/100 ;
				document.getElementById("importe4").value=importe4;
				
				//REALIZO EL QUINTO CALCULO
				descuento=descuento5/100;
				tot=precio5*cantidad5;
				desc=tot*descuento;
				tot5=tot-desc;
				var orig=parseFloat(tot5);
				var importe5=Math.round(orig*100)/100 ;
				document.getElementById("importe5").value=importe5;
				
				//REALIZO EL SEXTO CALCULO
				descuento=descuento6/100;
				tot=precio6*cantidad6;
				desc=tot*descuento;
				tot6=tot-desc;
				var orig=parseFloat(tot6);
				var importe6=Math.round(orig*100)/100 ;
				document.getElementById("importe6").value=importe6;
				
				//REALIZO EL SEXTIMO CALCULO
				descuento=descuento7/100;
				tot=precio7*cantidad7;
				desc=tot*descuento;
				tot7=tot-desc;
				var orig=parseFloat(tot7);
				var importe7=Math.round(orig*100)/100 ;
				document.getElementById("importe7").value=importe7;
				
				//REALIZO EL OCTAVO CALCULO
				descuento=descuento8/100;
				tot=precio8*cantidad8;
				desc=tot*descuento;
				tot8=tot-desc;
				var orig=parseFloat(tot8);
				var importe8=Math.round(orig*100)/100 ;
				document.getElementById("importe8").value=importe8;
				
				//REALIZO EL NOVENO CALCULO
				descuento=descuento9/100;
				tot=precio9*cantidad9;
				desc=tot*descuento;
				tot9=tot-desc;
				var orig=parseFloat(tot9);
				var importe9=Math.round(orig*100)/100 ;
				document.getElementById("importe9").value=importe9;
				
				//REALIZO EL DECIMO CALCULO
				descuento=descuento10/100;
				tot=precio10*cantidad10;
				desc=tot*descuento;
				tot10=tot-desc;
				var orig=parseFloat(tot10);
				var importe10=Math.round(orig*100)/100 ;
				document.getElementById("importe10").value=importe10;

				//REALIZO EL CALCULO DEL SUBTOTAL
				var subt=Math.round(importe1+importe2+importe3+importe4+importe5+importe6+importe7+importe8+importe9+importe10);
			    document.getElementById("subtotal").value=subt;
				
				
				//REALIZO EL CALCULO DEL IVA Y SUBTOTAL Y TOTAL
				var igv=(iva/100);
				var su=Math.round(subt*igv);
				var or=parseFloat(su);
				var ori=Math.round(or+subt);
				document.getElementById("subtotal2").value=or;
				document.getElementById("total").value=ori;
 	}	
</script>
<script type="text/javascript">
            $(function(){
                $('#txtRut').autocomplete({
                   source : 'clases/clientes.php',
                   select : function(event, ui){
					   document.getElementById('nombrecliente').value = ui.item.nom ;
					   document.getElementById('telefcliente').value = ui.item.tlf ;
					   document.getElementById('direccliente').value = ui.item.dir ;
					   			                 }
                });
            });
</script>
<script type="text/javascript">
//SELECCIONA PRODUCTO Nº 1
            $(function(){
                $('#producto1').autocomplete({
                   source : 'clases/ventas1.php',
                   select : function(event, ui){
				   document.getElementById('cod_material1').value = ui.item.c;
				   document.getElementById('precio1').value = ui.item.p;
				   document.getElementById('existencia1').value = ui.item.e;
					   			                 }
                });
            });	
			
			//SELECCIONA PRODUCTO Nº 2
            $(function(){
                $('#producto2').autocomplete({
                   source : 'clases/ventas2.php',
                   select : function(event, ui){
                   document.getElementById('cod_material2').value = ui.item.co;
				    document.getElementById('precio2').value = ui.item.pr;
				   document.getElementById('existencia2').value = ui.item.ex;
					   			                 }
                });
            });

//SELECCIONA PRODUCTO Nº 3
            $(function(){
                $('#producto3').autocomplete({
                   source : 'clases/ventas3.php',
                   select : function(event, ui){
				   document.getElementById('cod_material3').value = ui.item.cod;
					   document.getElementById('precio3').value = ui.item.pre;
				   document.getElementById('existencia3').value = ui.item.exi;
					   			                 }
                });
            });
			
//SELECCIONA PRODUCTO Nº 4
            $(function(){
                $('#producto4').autocomplete({
                   source : 'clases/ventas4.php',
                   select : function(event, ui){
				   document.getElementById('cod_material4').value = ui.item.codi;
					   document.getElementById('precio4').value = ui.item.prec;
				   document.getElementById('existencia4').value = ui.item.exis;
					   			                 }
                });
            });
			
//SELECCIONA PRODUCTO Nº 5
            $(function(){
                $('#producto5').autocomplete({
                   source : 'clases/ventas5.php',
                   select : function(event, ui){
				   document.getElementById('cod_material5').value = ui.item.codig;
					   document.getElementById('precio5').value = ui.item.preci;
				   document.getElementById('existencia5').value = ui.item.exist;
					   			                 }
                });
            });
			
			//SELECCIONA PRODUCTO Nº 6
            $(function(){
                $('#producto6').autocomplete({
                   source : 'clases/ventas6.php',
                   select : function(event, ui){
				   document.getElementById('cod_material6').value = ui.item.codigo;
					   document.getElementById('precio6').value = ui.item.precio;
				   document.getElementById('existencia6').value = ui.item.existe;
					   			                 }
                });
            });

//SELECCIONA PRODUCTO Nº 7
            $(function(){
                $('#producto7').autocomplete({
                   source : 'clases/ventas7.php',
                   select : function(event, ui){
				   document.getElementById('cod_material7').value = ui.item.codigop;
					   document.getElementById('precio7').value = ui.item.preciop;
				   document.getElementById('existencia7').value = ui.item.existen;
					   			                 }
                });
            });
			
//SELECCIONA PRODUCTO Nº 8
            $(function(){
                $('#producto8').autocomplete({
                   source : 'clases/ventas8.php',
                   select : function(event, ui){
				   document.getElementById('cod_material8').value = ui.item.codigopr;
					   document.getElementById('precio8').value = ui.item.preciopr;
				   document.getElementById('existencia8').value = ui.item.existenc;
					   			                 }
                });
            });	
			
//SELECCIONA PRODUCTO Nº 9
            $(function(){
                $('#producto9').autocomplete({
                   source : 'clases/ventas9.php',
                   select : function(event, ui){
				   document.getElementById('cod_material9').value = ui.item.codigoprec;
					   document.getElementById('precio9').value = ui.item.precioprec;
				   document.getElementById('existencia9').value = ui.item.existenciap;
					   			                 }
                });
            });	
			
//SELECCIONA PRODUCTO Nº 10
            $(function(){
                $('#producto10').autocomplete({
                   source : 'clases/ventas10.php',
                   select : function(event, ui){
				   document.getElementById('cod_material10').value = ui.item.codigoprecio;
					   document.getElementById('precio10').value = ui.item.precioprecio;
				   document.getElementById('existencia10').value = ui.item.existenciaprecio;
					   			                 }
                });
            });							
</script>
</head>

<body>
		<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="admin.php"> <img alt="Charisma Logo" src="img/logo20.png" /> <span>Inventarios CFV Familiar</span></a>
				
				<!-- user dropdown starts -->
				<div class="btn-group pull-right" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i><span class="hidden-phone"> Bienvenido <?php echo estado($_SESSION['acceso']); ?></span>
						<span class="caret"></span>					</a>
					<ul class="dropdown-menu">
<li><a class="ajax-link btn-setting" href="perfil.php"><i class="icon-user"></i><span class="hidden-tablet"> Mi Perfil</span></a></li>
						<li class="divider"></li>
<li><a class="ajax-link" href="logout.php"><i class="icon-off"></i><span class="hidden-tablet"> Cerrar Sesion</span></a></li>
					</ul>
				</div>
				<!-- user dropdown ends -->
				
				<div class="top-nav nav-collapse">
					<ul class="nav">
						<li><a href="#">B&uacute;squeda</a></li>
						<li>
							<form class="navbar-search pull-left">
								<input placeholder="Busqueda" class="search-query span2" name="query" type="text">
							</form>
						</li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>
	<!-- topbar ends -->
		<div class="container-fluid">
		<div class="row-fluid">
				
			<!-- left menu starts -->
			<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="nav-header hidden-tablet">Menu</li>
<li><a class="ajax-link" href="admin.php"><i class="icon-home"></i><span class="hidden-tablet"> Inicio</span></a></li>
<li><a class="ajax-link" href="clientes.php"><i class="icon-user"></i><span class="hidden-tablet"> Clientes</span></a></li>
<li><a class="ajax-link" href="proveedores.php"><i class="icon-user"></i><span class="hidden-tablet"> Proveedores</span></a></li>
<li><a class="ajax-link" href="entradas.php"><i class="icon-shopping-cart"></i><span class="hidden-tablet"> Entradas</span></a></li>
<li><a class="ajax-link" href="almacen.php"><i class="icon-tasks"></i><span class="hidden-tablet"> Almacen</span></a></li>
<li><a class="ajax-link" href="ventas.php"><i class="icon-briefcase"></i><span class="hidden-tablet"> Ventas</span></a></li>
<li><a class="ajax-link" href="usuarios.php"><i class="icon-user"></i><span class="hidden-tablet"> Usuarios</span></a></li>
<li><a class="ajax-link" href="basedatos.php"><i class="icon-file"></i><span class="hidden-tablet"> Base de Datos</span></a></li>
<li><a class="ajax-link" href="configuracion.php"><i class="icon-wrench"></i><span class="hidden-tablet"> Configuración</span></a></li>
<li><a class="ajax-link" href="logout.php"><i class="icon-off"></i><span class="hidden-tablet"> Cerrar Sesión</span></a></li>
</ul>
</div><!--/.well -->
			</div><!--/span-->
			<!-- left menu ends -->
			
			<div id="content" class="span10">
			<!-- content starts -->
			
			<div>
				<ul class="breadcrumb">
					<li>
			<i class="icon-home"></i><a href="admin.php"> Principal</a> <span class="divider">/</span>
					</li>
					<li>
				<i class="icon-briefcase"></i><a href="ventas.php"> Ventas </a><span class="divider">/</span></li>
					<li>
					<li>
			<i class="icon-briefcase"></i><a href="detalles_ventas.php"> Detalles Ventas </a><span class="divider">/</span></li>
					<li>
					<li>
				<i class="icon-briefcase"></i><a href="for_ventas.php"> Nuevas Ventas </a><span class="divider">/</span></li>
				<li>
					<li>
				<i class="icon-print"></i><a href="reportes_ventas.php"> Reportes Ventas</a></li>
				</ul>
			</div>

			<div class="row-fluid sortable">
				<div class="box span12">
                <div class="box-header well" data-original-title>
                  <h2><i class="icon-edit"></i> Formulario de Registro de Ventas a Clientes </h2>
                  <div class="box-icon">  
<a href="#" class="btn btn-minimize btn-round" title="Desplegar" data-rel="tooltip"><i class="icon-chevron-up"></i></a> 
				</div>
                </div>
			    <div class="box-content">
				<?php
			 
if(isset($_POST['txtRut']) && isset($_POST['nombrecliente']) && isset($_POST['tipo_venta'])) {
	
	//$cod_venta= $_POST['cod_venta'];
	$rutcliente= limpiar($_POST['txtRut']);
	$nombrecliente= limpiar($_POST['nombrecliente']);
	$telefcliente= limpiar($_POST['telefcliente']);
	$direccliente= limpiar($_POST['direccliente']);
	$vendedor= $_SESSION["cedula"];
	$cod_material= $_POST['cod_material'];
	$material= $_POST['producto'];
	$cantidad= $_POST['cantidad'];
	if (isset($_POST['descuento'])) { $descuento = $_POST['descuento']; } else { $descuento =''; }
	$importe= $_POST['importe'];
	$fecha_venta= $_POST['fecha_venta'];
	$fecha_detalle= $_POST['fecha_venta'];
	$subtotal = $_POST['subtotal'];
	$iva= $_POST['iva'];
	$total_iva = $_POST['subtotal2'];
	$total_pago= $_POST['total'];
	$tipo_pago= $_POST['tipo_pago'];
	$status_detalle= 'VENDIDO';
	$tipo_venta= $_POST['tipo_venta'];
	
	if($tipo_venta=="FACTURA") {
	
$sql = mysql_query("select cod_venta from ventas where tipo_venta = 'FACTURA' order by cod_venta desc") or die(mysql_error());
$array = mysql_fetch_array($sql);	
$codigo = $array['cod_venta'];
$num = substr($array['cod_venta'] , 8);
$dig  = $num + 1;
$cod = str_pad($dig, 5, "0", STR_PAD_LEFT);
$cod_venta = 'FACTURA-'.$cod;
	
	
	$sql3="INSERT INTO detalle_ventas (cod_venta,cod_material,rutcliente,cant_venta,descuento,importe,status_detalle,fecha_detalle) VALUES ";//primera parte de la cadena
for($i=0;$i<count($_POST['cod_material']);$i++){  //recorro el array
if (!empty($_POST['cod_material'][$i])) {
$sql3.='(\''.$cod_venta.'\',\''.$cod_material[$i].'\',\''.$rutcliente.'\',\''.$cantidad[$i].'\',\''.$descuento[$i].'\',\''.$importe[$i].'\',\''.$status_detalle.'\',\''.$fecha_detalle.'\'),';}

//CONSULTO LA EXISTENCIA DE PRODUCTOS
$sq=mysql_query("select existencia from material_almacen where cod_material = '".$cod_material[$i]."'") or die("Problemas en el select:".mysql_error());
$reg=mysql_fetch_array($sq); 
$cant=$reg['existencia']-$cantidad[$i];

 //CONSULTO LA EXISTENCIA DEL PRODUCTO Y LA ACTUALIZO
mysql_query("update material_almacen set existencia = '".mysql_real_escape_string($cant)."' where cod_material = '".$cod_material[$i]."'") or die(mysql_error());	

}
$sql3=rtrim($sql3,',');//elimino la última coma sobrante
$res=mysql_query($sql3);
 
//HAGO EL REGISTRO DE VENTAS DE PRODUCTOS
mysql_query("insert into ventas (cod_venta,rutcliente,vendedor,subtotal,iva,total_iva,total_pago,fecha_venta,tipo_pago,tipo_venta) values ('".mysql_real_escape_string($cod_venta)."','".mysql_real_escape_string($rutcliente)."','".mysql_real_escape_string($vendedor)."','".mysql_real_escape_string($subtotal)."','".mysql_real_escape_string($iva)."','".mysql_real_escape_string($total_iva)."','".mysql_real_escape_string($total_pago)."','".mysql_real_escape_string($fecha_venta)."','".mysql_real_escape_string($tipo_pago)."','".mysql_real_escape_string($tipo_venta)."')") or die(mysql_error());

?>
		
<script language="javascript"> 
alert('LA VENTA AL CLIENTE  <?php echo $nombrecliente; ?> FUE REALIZADA SATISFACTORIAMENTE') 
document.location.href='for_ventas.php'
window.open("http://<?php echo $_SERVER['HTTP_HOST']; ?>/inventario/facturas.php?cod_venta=<?php echo base64_encode($cod_venta); ?>&rutcliente=<?php echo base64_encode($rutcliente); ?>", "target=_blank"); </script> 

 <?php
 } elseif($tipo_venta=="NOTA") {
 
 
$sql = mysql_query("select cod_venta from ventas where tipo_venta = 'NOTA' order by cod_venta desc") or die(mysql_error());
$array = mysql_fetch_array($sql);	
$codigo = $array['cod_venta'];
$num = substr($array['cod_venta'] , 5);
$dig  = $num + 1;
$cod = str_pad($dig, 5, "0", STR_PAD_LEFT);
$cod_venta = 'NOTA-'.$cod;
	
	
	$sql3="INSERT INTO detalle_ventas (cod_venta,cod_material,rutcliente,cant_venta,descuento,importe,status_detalle,fecha_detalle) VALUES ";//primera parte de la cadena
for($i=0;$i<count($_POST['cod_material']);$i++){  //recorro el array
if (!empty($_POST['cod_material'][$i])) {
$sql3.='(\''.$cod_venta.'\',\''.$cod_material[$i].'\',\''.$rutcliente.'\',\''.$cantidad[$i].'\',\''.$descuento[$i].'\',\''.$importe[$i].'\',\''.$status_detalle.'\',\''.$fecha_detalle.'\'),';}

//CONSULTO LA EXISTENCIA DE PRODUCTOS
$sq=mysql_query("select existencia from material_almacen where cod_material = '".$cod_material[$i]."'") or die("Problemas en el select:".mysql_error());
$reg=mysql_fetch_array($sq); 
$cant=$reg['existencia']-$cantidad[$i];

 //CONSULTO LA EXISTENCIA DEL PRODUCTO Y LA ACTUALIZO
mysql_query("update material_almacen set existencia = '".mysql_real_escape_string($cant)."' where cod_material = '".$cod_material[$i]."'") or die(mysql_error());	

}
$sql3=rtrim($sql3,',');//elimino la última coma sobrante
$res=mysql_query($sql3);
 
//HAGO EL REGISTRO DE VENTAS DE PRODUCTOS
mysql_query("insert into ventas (cod_venta,rutcliente,vendedor,subtotal,iva,total_iva,total_pago,fecha_venta,tipo_pago,tipo_venta) values ('".mysql_real_escape_string($cod_venta)."','".mysql_real_escape_string($rutcliente)."','".mysql_real_escape_string($vendedor)."','".mysql_real_escape_string($subtotal)."','".mysql_real_escape_string($iva)."','".mysql_real_escape_string($total_iva)."','".mysql_real_escape_string($total_pago)."','".mysql_real_escape_string($fecha_venta)."','".mysql_real_escape_string($tipo_pago)."','".mysql_real_escape_string($tipo_venta)."')") or die(mysql_error());

?>

<script language="javascript"> 
alert('LA VENTA AL CLIENTE  <?php echo $nombrecliente; ?> FUE REALIZADA SATISFACTORIAMENTE') 
document.location.href='for_ventas.php'
window.open("http://<?php echo $_SERVER['HTTP_HOST']; ?>/inventario/notas.php?cod_venta=<?php echo base64_encode($cod_venta); ?>&rutcliente=<?php echo base64_encode($rutcliente); ?>", "target=_blank"); </script> 

 <?php
}elseif($tipo_venta=="GUIA") {
 
 
$sql = mysql_query("select cod_venta from ventas where tipo_venta = 'GUIA' order by cod_venta desc") or die(mysql_error());
$array = mysql_fetch_array($sql);	
$codigo = $array['cod_venta'];
$num = substr($array['cod_venta'] , 5);
$dig  = $num + 1;
$cod = str_pad($dig, 5, "0", STR_PAD_LEFT);
$cod_venta = 'GUIA-'.$cod;
	
	
	$sql3="INSERT INTO detalle_ventas (cod_venta,cod_material,rutcliente,cant_venta,descuento,importe,status_detalle,fecha_detalle) VALUES ";//primera parte de la cadena
for($i=0;$i<count($_POST['cod_material']);$i++){  //recorro el array
if (!empty($_POST['cod_material'][$i])) {
$sql3.='(\''.$cod_venta.'\',\''.$cod_material[$i].'\',\''.$rutcliente.'\',\''.$cantidad[$i].'\',\''.$descuento[$i].'\',\''.$importe[$i].'\',\''.$status_detalle.'\',\''.$fecha_detalle.'\'),';}

//CONSULTO LA EXISTENCIA DE PRODUCTOS
$sq=mysql_query("select existencia from material_almacen where cod_material = '".$cod_material[$i]."'") or die("Problemas en el select:".mysql_error());
$reg=mysql_fetch_array($sq); 
$cant=$reg['existencia']-$cantidad[$i];

 //CONSULTO LA EXISTENCIA DEL PRODUCTO Y LA ACTUALIZO
mysql_query("update material_almacen set existencia = '".mysql_real_escape_string($cant)."' where cod_material = '".$cod_material[$i]."'") or die(mysql_error());	

}
$sql3=rtrim($sql3,',');//elimino la última coma sobrante
$res=mysql_query($sql3);
 
//HAGO EL REGISTRO DE VENTAS DE PRODUCTOS
mysql_query("insert into ventas (cod_venta,rutcliente,vendedor,subtotal,iva,total_iva,total_pago,fecha_venta,tipo_pago,tipo_venta) values ('".mysql_real_escape_string($cod_venta)."','".mysql_real_escape_string($rutcliente)."','".mysql_real_escape_string($vendedor)."','".mysql_real_escape_string($subtotal)."','".mysql_real_escape_string($iva)."','".mysql_real_escape_string($total_iva)."','".mysql_real_escape_string($total_pago)."','".mysql_real_escape_string($fecha_venta)."','".mysql_real_escape_string($tipo_pago)."','".mysql_real_escape_string($tipo_venta)."')") or die(mysql_error());

    echo"<div class='alert alert-success'>";
	echo"<button type='button' class='close' data-dismiss='alert'>×</button>";
	echo"<center>LA VENTA COMO GUIA DESPACHO FUE REGISTRADA SATISFACTORIAMENTE</div>";
	echo '<br>';
}
 }
 ?><?php
date_default_timezone_set("America/Caracas");
$Hora = date('h:i:s');  
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
$fecha= date("Y-m-d"); 
$hora= date('h:i:s A');
?>
                   <form id="form1" name="form1" class="form-horizontal" method="post" action="" onSubmit="return validarcampos('cadena');">
                    <fieldset>
					<div class="control-group">
                      <label class="control-label" for="inputWarning">RFC Cliente: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese un RFC valido" data-rel="tooltip">
				<input name="txtRut" type="text" autocomplete="off" class="input-xlarge focused" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese RFC de Cliente" id="txtRut" required="required">
					  </div>
                    </div>
					</div> 
                      <div class="control-group">
                      <label class="control-label" for="inputWarning">Nombre Cliente: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese solo letras para Nombres" data-rel="tooltip">
                    <input name="nombrecliente" type="text" class="input-xlarge focused" onKeyUp="this.value=this.value.toUpperCase();" pattern="[A-Z ]{5,60}" autocomplete="off" placeholder="Ingrese Nombre de Cliente" id="nombrecliente" readonly="readonly">
                      </div>
                      </div>
					  </div>
                      <div class="control-group">
                      <label class="control-label" for="focusedInput">Telefono Cliente: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese solo numeros para telefono" data-rel="tooltip">
					    <input name="telefcliente" type="text" class="input-xlarge focused" onKeyUp="this.value=this.value.toUpperCase();" pattern="[0-9]{10,11}" placeholder="Ingrese Telefono de Cliente" autocomplete="off" id="telefcliente" readonly="readonly">
					  </div>
                      </div>
					  </div>
                     <div class="control-group">
                      <label class="control-label" for="inputWarning">Direcci&oacute;n Cliente: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese Direccion Proveedor" data-rel="tooltip">
                       <input name="direccliente" type="text" class="input-xlarge focused" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Direccion de Cliente" id="direccliente" readonly="readonly">
                      </div>
                    </div>
					</div>
                    </fieldset>
					
					<table width="758" height="73" id="tabla">
  <tr>
    <td colspan="7"><div class="box-header well" data-original-title>
                  <h2><i class="icon-edit"></i> Detalles de Ventas de Productos </h2>
                </div></td>
    </tr>
  <tr>
    <td colspan="7"><div class="alert alert-error">
							<strong>Por Favor !</strong> Verifique la existencia disponible del producto
						para las cantidades en Ventas a Clientes.</div></td>
    </tr>
  <tr>
    <td width="255"><div align="center"><strong>Productos</strong></div></td>
    <td width="84"><div align="center"><strong>Código</strong></div></td>
    <td width="79"><div align="center"><strong>Existencias</strong></div></td>
    <td width="73"><div align="center"><strong>Precio </strong></div></td>
    <td width="77"><div align="center"><strong>Cantidad </strong></div></td>
    <td width="80"><div align="center"><strong>Descuento% </strong></div></td>
    <td width="78"><div align="center"><strong>Importe </strong></div></td>
  </tr>
  <tr>
    <td><div align="center">
      <input name="producto[]" type="text" id="producto1" title="Ingrese un Producto" onKeyUp="this.value=this.value.toUpperCase();" pattern="[A-Za-z0-9 ]{1,100}" class="input span12" autocomplete="off" size="40" placeholder="Ingrese el Producto Nº 1" required="required"/>
    </div></td>
    <td><div align="center"><input name="cod_material[]" autocomplete="off" id="cod_material1" onKeyUp="this.value=this.value.toUpperCase();" title="Codigo del Producto" data-rel="tooltip" placeholder="Codigo1" type="text" class="input span12" size="6" maxlength="15" readonly="readonly"/>
    </div></td>
    <td><div id="principal"><input name="existencia[]" autocomplete="off" id="existencia1" onKeyUp="this.value=this.value.toUpperCase();" title="Existencia de Producto" data-rel="tooltip" placeholder="Existencia1" type="text" class="input span12" size="6" maxlength="15" readonly="readonly"/>
    </div></td>
    <td><div id="principal"><input name="precio[]" autocomplete="off" id="precio1" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Precio1" type="text" class="input span12" size="10" title="Precio de Producto" data-rel="tooltip" maxlength="15" readonly="readonly"/></div></td>
    <td><input name="cantidad[]" type="text" class="input span12" id="cantidad1" placeholder="Cantidad1" title="Escriba solo numeros para Cantidad" data-rel="tooltip" onKeyUp="actualizar_importe()" autocomplete="off" pattern="[0-9]{1,10}" size="10" maxlength="15" required="required"/></td>
    <td><input name="descuento[]" type="text" class="input span12" id="descuento1" placeholder="Descuento1" title="Escriba solo numeros para Descuento" data-rel="tooltip" onKeyUp="actualizar_importe()" autocomplete="off" pattern="[0-9.]{1,10}" size="10" maxlength="15"/></td>
    <td><input name="importe[]" type="text" class="input span12" id="importe1" placeholder="Importe1" title="Escriba solo numeros para Importe" data-rel="tooltip"onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" onChange="actualizar_importe()" pattern="[0-9.]{1,10}" size="10" maxlength="15" readonly="readonly"/></td>
  </tr>
  <tr>
    <td><div align="center">
        <input name="producto[]" type="text" id="producto2" title="Ingrese un Producto" onKeyUp="this.value=this.value.toUpperCase();" pattern="[A-Za-z0-9 ]{1,100}" class="input span12" size="40" placeholder="Ingrese el Producto Nº 2" />
    </div></td>
    <td><div align="center"><input name="cod_material[]" autocomplete="off" id="cod_material2" onKeyUp="this.value=this.value.toUpperCase();" title="Codigo del Producto" data-rel="tooltip" placeholder="Codigo2" type="text" class="input span12" size="6" maxlength="15" readonly="readonly"/>
    </div></td>
    <td><div id="principal">
      <input name="existencia[]" autocomplete="off" id="existencia2" onKeyUp="this.value=this.value.toUpperCase();" title="Existencia de Producto" data-rel="tooltip" placeholder="Existencia2" type="text" class="input span12" size="6" maxlength="15" readonly="readonly"/>
    </div></td>
    <td><div id="principal">
      <input name="precio[]" autocomplete="off" id="precio2" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Precio2" type="text" class="input span12" size="10" title="Precio de Producto" data-rel="tooltip" maxlength="15" readonly="readonly"/>
    </div></td>
    <td><input name="cantidad[]" type="text" class="input span12" id="cantidad2" autocomplete="off" placeholder="Cantidad2" title="Escriba solo numeros para Cantidad" data-rel="tooltip" onKeyUp="actualizar_importe()" pattern="[0-9]{1,10}" size="10" maxlength="15" /></td>
    <td><input name="descuento[]" type="text" class="input span12" id="descuento2" placeholder="Descuento2" title="Escriba solo numeros para Descuento" data-rel="tooltip" onKeyUp="actualizar_importe()" autocomplete="off" pattern="[0-9.]{1,10}" size="10" maxlength="15"/></td>
    <td><input name="importe[]" type="text" class="input span12" id="importe2" placeholder="Importe2" title="Escriba solo numeros para Importe" data-rel="tooltip"onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" onChange="actualizar_importe()" pattern="[0-9.]{1,10}" size="10" maxlength="15"  readonly="readonly"/></td>
  </tr>
  <tr>
    <td><div align="center">
        <input name="producto[]" type="text" id="producto3" title="Ingrese un Producto" onKeyUp="this.value=this.value.toUpperCase();" pattern="[A-Za-z0-9 ]{1,100}" class="input span12" size="40" placeholder="Ingrese el Producto Nº 3"  />
    </div></td>
    <td><div align="center"><input name="cod_material[]" autocomplete="off" id="cod_material3" onKeyUp="this.value=this.value.toUpperCase();" title="Codigo del Producto" data-rel="tooltip" placeholder="Codigo3" type="text" class="input span12" size="6" maxlength="15" readonly="readonly"/>
    </div></td>
    <td><div id="principal">
      <input name="existencia[]" autocomplete="off" id="existencia3" onKeyUp="this.value=this.value.toUpperCase();" title="Existencia de Producto" data-rel="tooltip" placeholder="Existencia3" type="text" class="input span12" size="6" maxlength="15" readonly="readonly"/>
    </div></td>
    <td><div id="principal">
      <input name="precio[]" autocomplete="off" id="precio3" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Precio3" type="text" class="input span12" size="10" title="Precio de Producto" data-rel="tooltip" maxlength="15" readonly="readonly"/>
    </div></td>
    <td><input name="cantidad[]" type="text" class="input span12" id="cantidad3" placeholder="Cantidad3" title="Escriba solo numeros para Cantidad" data-rel="tooltip" onKeyUp="actualizar_importe()" autocomplete="off" pattern="[0-9]{1,10}" size="10" maxlength="15"  /></td>
    <td><input name="descuento[]" type="text" class="input span12" id="descuento3" placeholder="Descuento3" title="Escriba solo numeros para Descuento" data-rel="tooltip" onKeyUp="actualizar_importe()" autocomplete="off" pattern="[0-9.]{1,10}" size="10" maxlength="15"/></td>
    <td><input name="importe[]" type="text" class="input span12" id="importe3" placeholder="Importe3" title="Escriba solo numeros para Importe" data-rel="tooltip"onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" onChange="actualizar_importe()" pattern="[0-9.]{1,10}" size="10" maxlength="15" readonly="readonly"/></td>
  </tr>
  <tr>
    <td><div align="center">
        <input name="producto[]" type="text" id="producto4" title="Ingrese un Producto" onKeyUp="this.value=this.value.toUpperCase();" pattern="[A-Za-z0-9 ]{1,100}" class="input span12" size="40" placeholder="Ingrese el Producto Nº 4" />
    </div></td>
    <td><div align="center"><input name="cod_material[]" autocomplete="off" id="cod_material4" onKeyUp="this.value=this.value.toUpperCase();" title="Codigo del Producto" data-rel="tooltip" placeholder="Codigo4" type="text" class="input span12" size="6" maxlength="15" readonly="readonly"/>
    </div></td>
    <td><div id="principal">
      <input name="existencia[]" autocomplete="off" id="existencia4" onKeyUp="this.value=this.value.toUpperCase();" title="Existencia de Producto" data-rel="tooltip" placeholder="Existencia4" type="text" class="input span12" size="6" maxlength="15" readonly="readonly"/>
    </div></td>
    <td><div id="principal">
      <input name="precio[]" autocomplete="off" id="precio4" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Precio4" type="text" class="input span12" size="10" title="Precio de Producto" data-rel="tooltip" maxlength="15" readonly="readonly"/>
    </div></td>
    <td><input name="cantidad[]" type="text" class="input span12" id="cantidad4" autocomplete="off" placeholder="Cantidad4" title="Escriba solo numeros para Cantidad" data-rel="tooltip" onKeyUp="actualizar_importe()" pattern="[0-9]{1,10}" size="10" maxlength="15" /></td>
    <td><input name="descuento[]" type="text" class="input span12" id="descuento4" placeholder="Descuento4" title="Escriba solo numeros para Descuento" data-rel="tooltip" onKeyUp="actualizar_importe()" autocomplete="off" pattern="[0-9.]{1,10}" size="10" maxlength="15"/></td>
    <td><input name="importe[]" type="text" class="input span12" id="importe4" placeholder="Importe4" title="Escriba solo numeros para Importe" data-rel="tooltip"onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" onChange="actualizar_importe()" pattern="[0-9.]{1,10}" size="10" maxlength="15" readonly="readonly"/></td>
  </tr>
  <tr>
    <td><div align="center">
        <input name="producto[]" type="text" id="producto5" title="Ingrese un Producto" onKeyUp="this.value=this.value.toUpperCase();" pattern="[A-Za-z0-9 ]{1,100}" class="input span12" size="40" placeholder="Ingrese el Producto Nº 5"/>
    </div></td>
    <td><div align="center"><input name="cod_material[]" autocomplete="off" id="cod_material5" onKeyUp="this.value=this.value.toUpperCase();" title="Codigo del Producto" data-rel="tooltip" placeholder="Codigo5" type="text" class="input span12" size="6" maxlength="15" readonly="readonly"/>
    </div></td>
    <td><div id="principal">
      <input name="existencia[]" autocomplete="off" id="existencia5" onKeyUp="this.value=this.value.toUpperCase();" title="Existencia de Producto" data-rel="tooltip" placeholder="Existencia5" type="text" class="input span12" size="6" maxlength="15" readonly="readonly"/>
    </div></td>
    <td><div id="principal">
      <input name="precio[]" autocomplete="off" id="precio5" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Precio5" type="text" class="input span12" size="10" title="Precio de Producto" data-rel="tooltip" maxlength="15" readonly="readonly"/>
    </div></td>
    <td><input name="cantidad[]" type="text" class="input span12" id="cantidad5" placeholder="Cantidad5" title="Escriba solo numeros para Cantidad" data-rel="tooltip" onKeyUp="actualizar_importe()" autocomplete="off" pattern="[0-9]{1,10}" size="10" maxlength="15" /></td>
    <td><input name="descuento[]" type="text" class="input span12" id="descuento5" placeholder="Descuento5" title="Escriba solo numeros para Descuento" data-rel="tooltip" onKeyUp="actualizar_importe()" autocomplete="off" pattern="[0-9.]{1,10}" size="10" maxlength="15"/></td>
    <td><input name="importe[]" type="text" class="input span12" id="importe5" placeholder="Importe5" title="Escriba solo numeros para Importe" data-rel="tooltip"onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" onChange="actualizar_importe()" pattern="[0-9.]{1,10}" size="10" maxlength="15" readonly="readonly"/></td>
  </tr>
  <tr>
    <td><div align="center">
        <input name="producto[]" type="text" id="producto6" title="Ingrese un Producto" onKeyUp="this.value=this.value.toUpperCase();" pattern="[A-Za-z0-9 ]{1,100}" class="input span12" size="40" placeholder="Ingrese el Producto Nº 6" />
    </div></td>
    <td><div align="center"><input name="cod_material[]" autocomplete="off" id="cod_material6" onKeyUp="this.value=this.value.toUpperCase();" title="Codigo del Producto" data-rel="tooltip" placeholder="Codigo6" type="text" class="input span12" size="6" maxlength="15" readonly="readonly"/>
    </div></td>
    <td><div id="principal">
      <input name="existencia[]" autocomplete="off" id="existencia6" onKeyUp="this.value=this.value.toUpperCase();" title="Existencia de Producto" data-rel="tooltip" placeholder="Existencia6" type="text" class="input span12" size="6" maxlength="15" readonly="readonly"/>
    </div></td>
    <td><div id="principal">
      <input name="precio[]" autocomplete="off" id="precio6" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Precio6" type="text" class="input span12" size="10" title="Precio de Producto" data-rel="tooltip" maxlength="15" readonly="readonly"/>
    </div></td>
    <td><input name="cantidad[]" type="text" class="input span12" id="cantidad6" placeholder="Cantidad6" title="Escriba solo numeros para Cantidad" data-rel="tooltip" onKeyUp="actualizar_importe()" autocomplete="off" pattern="[0-9]{1,10}" size="10" maxlength="15" /></td>
    <td><input name="descuento[]" type="text" class="input span12" id="descuento6" placeholder="Descuento6" title="Escriba solo numeros para Descuento" data-rel="tooltip" onKeyUp="actualizar_importe()" autocomplete="off" pattern="[0-9.]{1,10}" size="10" maxlength="15"/></td>
    <td><input name="importe[]" type="text" class="input span12" id="importe6" placeholder="Importe6" title="Escriba solo numeros para Importe" data-rel="tooltip"onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" onChange="actualizar_importe()" pattern="[0-9.]{1,10}" size="10" maxlength="15" readonly="readonly"/></td>
  </tr>
  <tr>
    <td><div align="center">
        <input name="producto[]" type="text" id="producto7" title="Ingrese un Producto" onKeyUp="this.value=this.value.toUpperCase();" pattern="[A-Za-z0-9 ]{1,100}" class="input span12" size="40" placeholder="Ingrese el Producto Nº 7" />
    </div></td>
    <td><div align="center"><input name="cod_material[]" autocomplete="off" id="cod_material7" onKeyUp="this.value=this.value.toUpperCase();" title="Codigo del Producto" data-rel="tooltip" placeholder="Codigo7" type="text" class="input span12" size="6" maxlength="15" readonly="readonly"/>
    </div></td>
    <td><div id="principal">
      <input name="existencia[]" autocomplete="off" id="existencia7" onKeyUp="this.value=this.value.toUpperCase();" title="Existencia de Producto" data-rel="tooltip" placeholder="Existencia7" type="text" class="input span12" size="6" maxlength="15" readonly="readonly"/>
    </div></td>
    <td><div id="principal">
      <input name="precio[]" autocomplete="off" id="precio7" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Precio7" type="text" class="input span12" size="10" title="Precio de Producto" data-rel="tooltip" maxlength="15" readonly="readonly"/>
    </div></td>
    <td><input name="cantidad[]" type="text" class="input span12" id="cantidad7" placeholder="Cantidad7" title="Escriba solo numeros para Cantidad" data-rel="tooltip" onKeyUp="actualizar_importe()" autocomplete="off" pattern="[0-9]{1,10}" size="10" maxlength="15" /></td>
    <td><input name="descuento[]" type="text" class="input span12" id="descuento7" placeholder="Descuento7" title="Escriba solo numeros para Descuento" data-rel="tooltip" onKeyUp="actualizar_importe()" autocomplete="off" pattern="[0-9.]{1,10}" size="10" maxlength="15"/></td>
    <td><input name="importe[]" type="text" class="input span12" id="importe7" placeholder="Importe7" title="Escriba solo numeros para Importe" data-rel="tooltip"onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" onChange="actualizar_importe()" pattern="[0-9.]{1,10}" size="10" maxlength="15" readonly="readonly"/></td>
  </tr>
  <tr>
    <td><div align="center">
        <input name="producto[]" type="text" id="producto8" title="Ingrese un Producto" onKeyUp="this.value=this.value.toUpperCase();" pattern="[A-Za-z0-9 ]{1,100}" class="input span12" size="40" placeholder="Ingrese el Producto Nº 8" />
    </div></td>
    <td><div align="center"><input name="cod_material[]" autocomplete="off" id="cod_material8" onKeyUp="this.value=this.value.toUpperCase();" title="Codigo del Producto" data-rel="tooltip" placeholder="Codigo8" type="text" class="input span12" size="6" maxlength="15" readonly="readonly"/>
    </div></td>
    <td><div id="principal">
      <input name="existencia[]" autocomplete="off" id="existencia8" onKeyUp="this.value=this.value.toUpperCase();" title="Existencia de Producto" data-rel="tooltip" placeholder="Existencia8" type="text" class="input span12" size="6" maxlength="15" readonly="readonly"/>
    </div></td>
    <td><div id="principal">
      <input name="precio[]" autocomplete="off" id="precio8" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Precio8" type="text" class="input span12" size="10" title="Precio de Producto" data-rel="tooltip" maxlength="15" readonly="readonly"/>
    </div></td>
    <td><input name="cantidad[]" type="text" class="input span12" id="cantidad8" placeholder="Cantidad8" title="Escriba solo numeros para Cantidad" data-rel="tooltip" onKeyUp="actualizar_importe()" autocomplete="off" pattern="[0-9]{1,10}" size="10" maxlength="15" /></td>
    <td><input name="descuento[]" type="text" class="input span12" id="descuento8" placeholder="Descuento8" title="Escriba solo numeros para Descuento" data-rel="tooltip" onKeyUp="actualizar_importe()" autocomplete="off" pattern="[0-9.]{1,10}" size="10" maxlength="15"/></td>
    <td><input name="importe[]" type="text" class="input span12" id="importe8" placeholder="Importe8" title="Escriba solo numeros para Importe" data-rel="tooltip"onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" onChange="actualizar_importe()" pattern="[0-9.]{1,10}" size="10" maxlength="15" readonly="readonly"/></td>
  </tr>
  <tr>
    <td><div align="center">
        <input name="producto[]" type="text" id="producto9" title="Ingrese un Producto" onKeyUp="this.value=this.value.toUpperCase();" pattern="[A-Za-z0-9 ]{1,100}" class="input span12" size="40" placeholder="Ingrese el Producto Nº 9" />
    </div></td>
    <td><div align="center"><input name="cod_material[]" autocomplete="off" id="cod_material9" onKeyUp="this.value=this.value.toUpperCase();" title="Codigo del Producto" data-rel="tooltip" placeholder="Codigo9" type="text" class="input span12" size="6" maxlength="15" readonly="readonly"/>
    </div></td>
    <td><div id="principal">
      <input name="existencia[]" autocomplete="off" id="existencia9" onKeyUp="this.value=this.value.toUpperCase();" title="Existencia de Producto" data-rel="tooltip" placeholder="Existencia9" type="text" class="input span12" size="6" maxlength="15" readonly="readonly"/>
    </div></td>
    <td><div id="principal">
      <input name="precio[]" autocomplete="off" id="precio9" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Precio9" type="text" class="input span12" size="10" title="Precio de Producto" data-rel="tooltip" maxlength="15" readonly="readonly"/>
    </div></td>
    <td><input name="cantidad[]" type="text" class="input span12" id="cantidad9" placeholder="Cantidad9" title="Escriba solo numeros para Cantidad" data-rel="tooltip" onKeyUp="actualizar_importe()" autocomplete="off" pattern="[0-9]{1,10}" size="10" maxlength="15" /></td>
    <td><input name="descuento[]" type="text" class="input span12" id="descuento9" placeholder="Descuento9" title="Escriba solo numeros para Descuento" data-rel="tooltip" onKeyUp="actualizar_importe()" autocomplete="off" pattern="[0-9.]{1,10}" size="10" maxlength="15"/></td>
    <td><input name="importe[]" type="text" class="input span12" id="importe9" placeholder="Importe9" title="Escriba solo numeros para Importe" data-rel="tooltip"onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" onChange="actualizar_importe()" pattern="[0-9.]{1,10}" size="10" maxlength="15" readonly="readonly"/></td>
  </tr>
  <tr>
    <td><div align="center">
        <input name="producto[]" type="text" id="producto10" title="Ingrese un Producto" onKeyUp="this.value=this.value.toUpperCase();" pattern="[A-Za-z0-9 ]{1,100}" class="input span12" size="40" placeholder="Ingrese el Producto Nº 10"/>
    </div></td>
    <td><div align="center"><input name="cod_material[]" autocomplete="off" id="cod_material10" onKeyUp="this.value=this.value.toUpperCase();" title="Codigo del Producto" data-rel="tooltip" placeholder="Codigo10" type="text" class="input span12" size="6" maxlength="15" readonly="readonly"/>
    </div></td>
    <td><div id="principal">
      <input name="existencia[]" autocomplete="off" id="existencia10" onKeyUp="this.value=this.value.toUpperCase();" title="Existencia de Producto" data-rel="tooltip" placeholder="Existencia10" type="text" class="input span12" size="6" maxlength="15" readonly="readonly"/>
    </div></td>
    <td><div id="principal">
      <input name="precio[]" autocomplete="off" id="precio10" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Precio10" type="text" class="input span12" size="10" title="Precio de Producto" data-rel="tooltip" maxlength="15" readonly="readonly"/>
    </div></td>
    <td><input name="cantidad[]" type="text" class="input span12" id="cantidad10" placeholder="Cantidad10" title="Escriba solo numeros para Cantidad" data-rel="tooltip" onKeyUp="actualizar_importe()" autocomplete="off" pattern="[0-9]{1,10}" size="10" maxlength="15" /></td>
    <td><input name="descuento[]" type="text" class="input span12" id="descuento10" placeholder="Descuento10" title="Escriba solo numeros para Descuento" data-rel="tooltip" onKeyUp="actualizar_importe()" autocomplete="off" pattern="[0-9.]{1,10}" size="10" maxlength="15"/></td>
    <td><input name="importe[]" type="text" class="input span12" id="importe10" placeholder="Importe10" title="Escriba solo numeros para Importe" data-rel="tooltip"onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" onChange="actualizar_importe()" pattern="[0-9.]{1,10}" size="10" maxlength="15" readonly="readonly"/></td>
  </tr>
</table>

                      <table width="760" height="73">
                        <tr>
                          <td width="131">&nbsp;</td>
                          <td width="290">&nbsp;</td>
                          <td width="34">&nbsp;</td>
                          <td width="47">&nbsp;</td>
                          <td width="102">&nbsp;</td>
                          <td width="128">&nbsp;</td>
                        </tr>
                        <tr>
                          <td width="131"><div align="right"><strong>Fecha/Hora Venta:</strong></div></td>
                          <td width="290">
                            <input name="fecha_venta" type="text" class="input-xlarge focused" id="fecha_venta" title="Fecha y Hora de Venta" data-rel="tooltip" size="10" maxlength="15" value="<?php echo $fecha; ?> <?php echo $hora; ?>" readonly="readonly"/>                          </td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td><div align="center"><strong>Subtotal: </strong></div></td>
                          <td><div class="input-append">
									<input name="subtotal" type="text" class="input span12" id="subtotal" title="Subtotal de Ventas" data-rel="tooltip" onChange="actualizar_importe()" value="0" readonly="readonly" size="16" ></div></td>
                        </tr>
                        <tr>
                          <td><div align="right"><strong>Vendedor: </strong></div></td>
                          <td><?php echo $_SESSION["nombre"]; ?></td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td><div align="center"><strong>Iva%: </strong></div></td>
                          <td><input name="iva" type="text" class="input span12" id="iva" title="Descuento Iva" data-rel="tooltip" size="10" maxlength="15" value="<?php $sql2 = mysql_query("select * from configuracion") or die(mysql_error());
		$array2 = mysql_fetch_array($sql2);
		echo $array2['iva']; ?>" readonly="readonly"/></td>
                        </tr>
                        <tr>
                          <td><div align="right">
                            <div align="right"><strong>Tipo de Pago: </strong></div>
                          </div></td>
                          <td><select name="tipo_pago" id="tipo_pago" data-rel="chosen" maxlength="10" required="required">
                            <option value="">SELECCIONE TIPO DE PAGO</option>
                            <option value="CHEQUE">PAGAR CON CHEQUE</option>
                            <option value="EFECTIVO">PAGAR CON EFECTIVO</option>
                            <option value="TRANSFERENCIA">PAGAR CON TRANSFERENCIA</option>
                          </select></td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td><div align="center"><strong>Total Iva:  </strong></div></td>
                          <td><input name="subtotal2" type="text" class="input span12" id="subtotal2" value="0" title="Total Iva" data-rel="tooltip" size="10" maxlength="15"  onChange="actualizar_importe()" readonly="readonly"/></td>
                        </tr>
                        <tr>
                          <td><div align="right">
                              <div align="right"><strong>Tipo Registro : </strong></div>
                          </div></td>
                          <td><select name="tipo_venta" id="tipo_venta" data-rel="chosen" maxlength="10" required="required">
                              <option value="">SELECCIONE</option>
                              <option value="FACTURA">FACTURA DE VENTA</option>
                              <option value="NOTA">NOTA DE VENTA</option>
							   <option value="GUIA">GUIA DESPACHO</option>
                          </select></td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td><div align="center"><strong>Total Monto:  </strong></div></td>
                          <td><input name="total" type="text" class="input span12" id="total" title="Total Cancelar" data-rel="tooltip" size="10" maxlength="15" value="0" onChange="actualizar_importe()" readonly="readonly"/></td>
                        </tr>
                     </table>
                      <div class="form-actions">
                      <button type="submit" class="btn btn-large btn-primary">Registrar Ventas </button>
                        <button type="reset" class="btn btn-large btn-primary">Restablecer</button>
                      </div>
                  </form>
		        </div>
		      </div><!--/span-->
			
			</div><!--/row-->
    
					<!-- content ends -->
			</div><!--/#content.span10-->
		  </div><!--/fluid-row-->
				
		<hr>

		<div class="modal hide fade" id="myModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Mi Perfil de Usuario</h3>
			</div>
			<div class="modal-body">
				<p><?php   
			$sql3 = mysql_query("select * from usuarios where cedula = '".$_SESSION['cedula']."'") or die(mysql_error());
			$array3 = mysql_fetch_array($sql3);
				?>
				<form id="form1" name="form1" class="form-horizontal" method="post" action="">
                    <fieldset>
                    <div class="control-group">
                      <label class="control-label" for="inputWarning">Cedula: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese solo numeros para cedula" data-rel="tooltip">
                      <input name="ced_cliente" type="text" class="input-xlarge focused" value="<?php echo $array3['cedula']; ?>" readonly="readonly">
                      </div>
                    </div>
					</div> 
                      <div class="control-group">
                      <label class="control-label" for="inputWarning">Nombres: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese solo letras para Nombres" data-rel="tooltip">
                    <input name="nom_cliente" type="text" class="input-xlarge focused" value="<?php echo $array3['nombre']; ?>" readonly="readonly">
                      </div>
                      </div>
					  </div>
					  <div class="control-group">
                      <label class="control-label" for="inputWarning">Cargo: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese solo letras para Apellidos" data-rel="tooltip">
                    <input name="nom_cliente" type="text" class="input-xlarge focused" value="<?php echo $array3['cargo']; ?>" readonly="readonly">
                      </div>
                      </div>
					  </div>
                      <div class="control-group">
                      <label class="control-label" for="focusedInput">Usuario: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese solo numeros para telefono" data-rel="tooltip">
               <input name="nom_cliente" type="text" class="input-xlarge focused" value="<?php echo $array3['usuario']; ?>" readonly="readonly">
                      </div>
                      </div>
					  </div>
                     <div class="control-group">
                      <label class="control-label" for="inputWarning">Nivel de Acceso: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese Direccion Cliente" data-rel="tooltip">
                <input name="nom_cliente" type="text" class="input-xlarge focused" value="<?php echo $array3['nivel']; ?>" readonly="readonly">
                      </div>
                    </div>
					</div>
                    </fieldset>
					</form></p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Cerrar</a>
			</div>
		</div>

		<footer>
			<p class="pull-left">&copy; <a href="http://usman.it" target="_blank">Derechos Reservados</a> </p>
			<p class="pull-right">Empresa:  <a href="mailto:cfv.familia@hotmail.com">C
		</footer>
		
	</div><!--/.fluid-container-->
	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<!-- jQuery -->
	<script src="js/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
	<script src="js/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- transition / effect library -->
	<script src="js/bootstrap-transition.js"></script>
	<!-- alert enhancer library -->
	<script src="js/bootstrap-alert.js"></script>
	<!-- modal / dialog library -->
	<script src="js/bootstrap-modal.js"></script>
	<!-- custom dropdown library -->
	<script src="js/bootstrap-dropdown.js"></script>
	<!-- scrolspy library -->
	<script src="js/bootstrap-scrollspy.js"></script>
	<!-- library for creating tabs -->
	<script src="js/bootstrap-tab.js"></script>
	<!-- library for advanced tooltip -->
	<script src="js/bootstrap-tooltip.js"></script>
	<!-- popover effect library -->
	<script src="js/bootstrap-popover.js"></script>
	<!-- button enhancer library -->
	<script src="js/bootstrap-button.js"></script>
	<!-- accordion library (optional, not used in demo) -->
	<script src="js/bootstrap-collapse.js"></script>
	<!-- carousel slideshow library (optional, not used in demo) -->
	<script src="js/bootstrap-carousel.js"></script>
	<!-- autocomplete library -->
	<script src="js/bootstrap-typeahead.js"></script>
	<!-- tour library -->
	<script src="js/bootstrap-tour.js"></script>
	<!-- library for cookie management -->
	<script src="js/jquery.cookie.js"></script>
	<!-- calander plugin -->
	<script src='js/fullcalendar.min.js'></script>
	<!-- data table plugin -->
	<script src='js/jquery.dataTables.min.js'></script>

	<!-- chart libraries start -->
	<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.min.js"></script>
	<script src="js/jquery.flot.pie.min.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	<script src="js/jquery.chosen.min.js"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="js/jquery.uniform.min.js"></script>
	<!-- plugin for gallery image view -->
	<script src="js/jquery.colorbox.min.js"></script>
	<!-- rich text editor library -->
	<script src="js/jquery.cleditor.min.js"></script>
	<!-- notification plugin -->
	<script src="js/jquery.noty.js"></script>
	<!-- file manager library -->
	<script src="js/jquery.elfinder.min.js"></script>
	<!-- star rating plugin -->
	<script src="js/jquery.raty.min.js"></script>
	<!-- for iOS style toggle switch -->
	<script src="js/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin -->
	<script src="js/jquery.autogrow-textarea.js"></script>
	<!-- multiple file upload plugin -->
	<script src="js/jquery.uploadify-3.1.min.js"></script>
	<!-- history.js for cross-browser state change on ajax -->
	<script src="js/jquery.history.js"></script>
	<!-- application script for Charisma demo -->
	<script src="js/charisma.js"></script>
	
		
</body>
</html>


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
