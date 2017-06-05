<?php
session_start(); 
if(isset($_SESSION['acceso'])) { 
if ($_SESSION['acceso'] == "admin") {

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
<link type="text/css" rel="stylesheet" href="css/jquery-ui-1.8.4.custom.css" />
	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<script type="text/javascript">
function actualizar_importe()
			{
				var precio=document.getElementById("precio_venta").value;
				var cantidad=document.getElementById("cantidad").value;
				var descuento1=document.getElementById("descuento").value;
				var importe=document.getElementById("importe").value;
				
				//REALIZO EL PRIMER CALCULO
				descuento=descuento1/100;
				tot=precio*cantidad;
				desc=tot*descuento;
				total=tot-desc;
				var original=parseFloat(total);
				var importe1=Math.round(original*100)/100 ;
				document.getElementById("importe").value=importe1;
 	}	
</script>
<script>
function validar(formulario){
var existencia=parseInt(document.getElementById('existencia').value);
var cantidad=parseInt(document.getElementById("cantidad").value);
    console.log(cantidad+ "  "+ existencia)
if (cantidad > existencia){
   alert('ERROR! LA CANTIDAD ' + cantidad + ' NO PUEDE SER MAYOR QUE LA EXISTENCIA '+ existencia);
  return(false);
}
}
var formulario = document.getElementById('formulario')

console.log(formulario)

validar(formulario)
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
                  <h2><i class="icon-edit"></i> Formulario de Actualización de Detalles de Ventas </h2>
                  <div class="box-icon">  
<a href="#" class="btn btn-minimize btn-round" title="Desplegar" data-rel="tooltip"><i class="icon-chevron-up"></i></a>
				</div>
                </div>
			    <div class="box-content">
				<?php
			 
if(isset($_POST['cod_detalle']) && isset($_POST['cod_venta']) ) {
	
	$cod_detalle= limpiar($_POST['cod_detalle']);
	$cod_venta= limpiar($_POST['cod_venta']);
	$cod_material= limpiar($_POST['cod_material']);
	$rutcliente= limpiar($_POST['rutcliente']);
	$cantidad= limpiar($_POST['cantidad']);
	$descuento= limpiar($_POST['descuento']);
	$importe= limpiar($_POST['importe']);
	$fecha_detalle= limpiar($_POST['fecha_detalle']);
	
	//CONSULTO LA EXISTENCIA DE PRODUCTOS
$s=mysql_query("select existencia from material_almacen where cod_material = '".$cod_material."'") or die("Problemas en el select:".mysql_error());
$re=mysql_fetch_array($s);
	
//CONSULTO LA EXISTENCIA DE PRODUCTOS
$sql2=mysql_query("select * from detalle_ventas where cod_detalle = '".$cod_detalle."' and cod_venta = '".$cod_venta."'") or die("Problemas en el select:".mysql_error());
$reg2=mysql_fetch_array($sql2);
 
$cantidad1=$reg2['cant_venta'];

// ACTUALIZO LOS CANTIDAD, DESCUENTO E IMPORTE EN DETALLES FACTURAS
mysql_query("update detalle_ventas set cant_venta = '".mysql_real_escape_string($cantidad)."',descuento = '".mysql_real_escape_string($descuento)."',importe = '".mysql_real_escape_string($importe)."' where cod_detalle = '".$cod_detalle."' and cod_venta = '".$cod_venta."'") or die(mysql_error());

$can=$cantidad-$cantidad1;
$cant=$re['existencia']-$can;

//CONSULTO LA EXISTENCIA DEL PRODUCTO Y LA ACTUALIZO
mysql_query("update material_almacen set existencia = '".mysql_real_escape_string($cant)."' where cod_material = '".$cod_material."'") or die(mysql_error());	
	
//SUMO EL TOTAL DE IMPORTE SEGUN EL CODIGO DE DETALLES DE FACTURA
$sql=mysql_query("select sum(importe) as total from detalle_ventas where cod_venta = '".$cod_venta."'") or die("Problemas en el select:".mysql_error());
$reg=mysql_fetch_array($sql); 
$subtotal= $reg['total'];

//CONSULTO EL IVA REISTRADO EN LA TABLA FACTURAS
$sq=mysql_query("select iva from ventas where cod_venta = '".$cod_venta."'")or die("Problemas en el select:".mysql_error());
$r=mysql_fetch_array($sq);

//REALIZO EL CALCULO A REGISTRAR
$iva= $r['iva']/100;
$total_iv=$subtotal*$iva;
$total_iva=round($total_iv);
$tot=$subtotal+$total_iva;
$total=round($tot);
//POR ULTIMO ACTUALIZO LOS DATOS DE LA TABLA FACTURAS SEGUN EL CODIGO DE FACTURA
mysql_query("update ventas set subtotal = '".mysql_real_escape_string($subtotal)."',total_iva = '".mysql_real_escape_string($total_iva)."',total_pago = '".mysql_real_escape_string($total)."' where cod_venta = '".$cod_venta."'") or die(mysql_error());

	echo"<div class='alert alert-block'>";
	echo"<button type='button' class='close' data-dismiss='alert'>×</button>";
	echo"<center>EL DETALLE DE VENTA Nº $cod_venta FUE ACTUALIZADO SATISFACTORIAMENTE</div>";
	echo "<meta http-equiv='Refresh' content='3;url=detalles_ventas.php'>"; 
	echo '<br>';

 }
 ?>
 <?php 
$cod_detalle = limpiar(base64_decode($_GET['cod_detalle']));
$cod_venta = limpiar(base64_decode($_GET['cod_venta']));
$cod_material = limpiar(base64_decode($_GET['cod_material']));
$sql1 = mysql_query("select * from detalle_ventas,material_almacen,orden_compras WHERE detalle_ventas.cod_detalle = '".$cod_detalle."' and material_almacen.cod_material = orden_compras.cod_material and detalle_ventas.cod_material = material_almacen.cod_material") or die(mysql_error());
$array1 = mysql_fetch_array($sql1);
 ?>
<form id="form1" name="form1" class="form-horizontal" method="post" action="">  
				  <table width="659" height="424" border="0">
                    <tr>
                      <td height="30" colspan="3"><div class='alert alert-error'><button type='button' class='close' data-dismiss='alert'>×</button>Recuerde que solo podrá modificar la cantidad de venta y descuento del detalle </div></td>
                    </tr>
                    <tr>
                      <td width="475" height="30"><div class="control-group">
                      <label class="control-label" for="inputWarning">Código Venta: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Codigo de Venta" data-rel="tooltip">
                      <input name="cod_venta" type="text" class="input-xlarge disabled" id="cod_venta" size="10" value="<?php echo $array1['cod_venta']; ?>" readonly="readonly" />
                      </div>
                    </div>
					</div> </td>
                      <td width="32">&nbsp;</td>
                      <td width="138" rowspan="6"><?php
	if (isset($array1['cod_material'])) {
	if (file_exists("fotos/".$array1['cod_material'].".jpg")){
    echo "<img src='fotos/".$array1['cod_material'].".jpg?".date('h:i:s')."' border='0' width='120' height='150' title='".$array1['material']."' data-rel='tooltip'>"; 
}else{
    echo "<img src='fotos/sinfoto.jpg' border='1' width='100' height='110' title='SIN FOTO' data-rel='tooltip'>"; 
} } else {
	echo "<img src='fotos/sinfoto.jpg' border='1' width='100' height='110' title='SIN FOTO' data-rel='tooltip'>"; 
}
?></td>
                    </tr>
                    <tr>
                      <td height="30"><div class="control-group">
                        <label class="control-label" for="inputWarning">RFC Cliente: </label>
                        <div class="controls">
                          <div class="input-prepend" title="RFC del Cliente" data-rel="tooltip">
                            <input name="rutcliente" type="text" class="input-xlarge disabled" id="rutcliente" onKeyUp="this.value=this.value.toUpperCase();" size="30" value="<?php echo $array1['rutcliente']; ?>" readonly="readonly">
                          </div>
                        </div>
                      </div></td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="30"><div class="control-group">
                      <label class="control-label" for="inputWarning">Código Producto: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Codigo del Producto" data-rel="tooltip">
                    <input name="cod_material" type="text" class="input-xlarge disabled" id="cod_material" onKeyUp="this.value=this.value.toUpperCase();" size="30" value="<?php echo $array1['cod_material']; ?>" readonly="readonly">
                      </div>
                      </div>
					  </div></td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="30"><div class="control-group">
                      <label class="control-label" for="focusedInput">Descripción Producto: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Descripcion del Producto" data-rel="tooltip">
               <input name="material" type="text" class="input-xlarge focused" id="material" value="<?php echo $array1['material']; ?>" readonly="readonly" />
                      </div>
                      </div>
					  </div></td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="38"><div class="control-group">
                      <label class="control-label" for="inputWarning">Precio Venta Prod.: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Precio del Producto" data-rel="tooltip">
                     <span class="add-on">$</span><input name="precio_venta" type="text" id="precio_venta" class="input-xlarge focused" value="<?php echo $array1['precio_venta']; ?>" readonly="readonly" />
                      </div>
                    </div>
					</div></td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="30"><div class="control-group">
                      <label class="control-label" for="inputWarning">Cantidad Producto: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese solo numeros para Cantidad" data-rel="tooltip">
                         <input name="cantidad" type="text" class="input-xlarge focused" id="cantidad" autocomplete="off"  pattern="[0-9]{1,5}" value="<?php echo $array1['cant_venta']; ?>" onKeyUp="this.value=this.value.toUpperCase(); actualizar_importe();" placeholder="Ingrese Cantidad" required="required"/>
                      </div>
                    </div>
					</div></td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="38"><div class="control-group">
                        <label class="control-label" for="inputWarning">Existencia Producto: </label>
                        <div class="controls">
                          <div class="input-prepend" title="Existencia del Producto" data-rel="tooltip">
                            <input name="existencia" type="text" class="input-xlarge focused" id="existencia" value="<?php echo $array1['existencia']; ?>" readonly="readonly"/>
                          </div>
                        </div>
                      </div></td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="48"><div class="control-group">
                        <label class="control-label" for="inputWarning">Descuento Producto: </label>
                        <div class="controls">
                          <div class="input-prepend" title="Ingrese solo numeros para Descuento" data-rel="tooltip">
                            <input name="descuento" type="text" class="input-xlarge focused" id="descuento" autocomplete="off"  pattern="[0-9]{1,5}" value="<?php echo $array1['descuento']; ?>" onKeyUp="this.value=this.value.toUpperCase(); actualizar_importe();" placeholder="Ingrese Descuento" required="required"/>
                          </div>
                        </div>
                      </div></td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="48"><div class="control-group">
                        <label class="control-label" for="inputWarning">Importe Producto: </label>
                        <div class="controls">
                          <div class="input-prepend" title="Importe Detalle" data-rel="tooltip">
                            <input name="importe" type="text" class="input-xlarge focused" id="importe" value="<?php echo $array1['importe']; ?>" readonly="readonly"/>
                          </div>
                        </div>
                      </div></td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="48"><div class="control-group">
                        <label class="control-label" for="inputWarning">Fecha Hora Venta: </label>
                        <div class="controls">
                          <div class="input-prepend" title="Fecha Detalle" data-rel="tooltip">
                            <input name="fecha_detalle" type="text" class="input-xlarge focused" id="fecha_detalle" value="<?php echo $array1['fecha_detalle']; ?>" readonly="readonly"/>
                          </div>
                        </div>
                      </div></td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                  </table>
			      <p><div class="form-actions">
                      <button type="submit" class="btn btn-large btn-primary">Actualizar</button>
                        <button type="reset" class="btn btn-large btn-primary">Restablecer</button>
						<input name="cod_detalle" type="hidden" cod_orden="cod_detalle" value="<?php echo $array1['cod_detalle']; ?>" />
			      </div></form>
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
			<p class="pull-right">Empresa:  <a href="mailto:cfv.familia@hotmail.com">CFV FAMILIAR </a></p>
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
