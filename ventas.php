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
						<h2><i class="icon-briefcase"></i> Consulta General de Ventas </h2>
						<div class="box-icon"> 
<a href="#" class="btn btn-minimize btn-round" title="Desplegar" data-rel="tooltip"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
	<?php 
	   
	   if (isset($_GET['eliminar'])) {
		   
		$elimina = base64_decode($_GET['eliminar']);   
		$cod_venta = base64_decode($_GET['cod_venta']); 
		
		if ($elimina == 'eliminar_venta' && $_SESSION['acceso'] == "admin") {
	
	$sql = mysql_query("Select * from detalle_ventas where cod_venta = '".mysql_real_escape_string($cod_venta)."'") or die(mysql_error());
	
	while($array = mysql_fetch_array($sql)) {
	
	
	$sq=mysql_query("select * from material_almacen where cod_material = '".$array['cod_material']."'") or die("Problemas en el select:".mysql_error());
			
    while($reg = mysql_fetch_array($sq)) {

$cant=$reg['existencia'] + $array['cant_venta'];

mysql_query("update material_almacen set existencia = '".mysql_real_escape_string($cant)."' where cod_material = '".$array['cod_material']."'") or die(mysql_error());

    mysql_query("delete from ventas where cod_venta = '".mysql_real_escape_string($cod_venta)."'") or die(mysql_error());
	mysql_query("delete from detalle_ventas where cod_venta = '".mysql_real_escape_string($cod_venta)."'") or die(mysql_error());
		
		}
		}
		
		echo '<br>';
		echo"<div class='alert alert-block'>";
	    echo"<button type='button' class='close' data-dismiss='alert'>×</button>";
	    echo"<strong>LA VENTA Y DETALLES DE VENTA N° $cod_venta HA SIDO ELIMINADO SATISFACTORIAMENTE</strong></div>";
		
		} else {
		
	   echo '<br>';
	   echo"<div class='alert alert-error'>";
	   echo"<button type='button' class='close' data-dismiss='alert'>×</button>";
	   echo"<strong>TU NO ERES ADMINISTRADOR, NO TIENES PERMISOS PARA ELIMINAR VENTAS</strong></div>";
			
		}
		
	   }
	   
	   ?>				
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
							    <th width="10%"><div align="center">Código</div></th>
							    <th width="10%"><div align="center"><span data-reactid=".zg.$mid=11434258871829=2796879f53f0f46fb68.2:0.0.0.0.0"><span data-reactid=".zg.$mid=11434258871829=2796879f53f0f46fb68.2:0.0.0.0.0.0">RFC</span></span> Cliente</div></th>
							    <th width="12%"><div align="center">Vendedor</div></th>
							    <th width="10%"><div align="center">Subtotal</div></th>
							    <th width="7%"><div align="center">Iva%</div></th>
							    <th width="12%"><div align="center">Total Iva</div></th>
							    <th width="12%"><div align="center">Total Bs</div></th>
							    <th width="27%"><div align="center">Acciones</div></th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?php 
$sql = mysql_query("SELECT * FROM ventas ") or die(mysql_error());
while($array=mysql_fetch_array($sql)) {  
?>
							<tr>
							  <td><div align="center"><?php echo '<a href="#" title="PAGO '.$array['tipo_pago'].'" data-rel="tooltip">'.$array["cod_venta"].'</a>'; ?></div></td>
								<td><div align="center"><?php 
$sql1 = mysql_query("select * from clientes where rutcliente = '".$array['rutcliente']."'") or die("Problemas en el select:".mysql_error());
$regi=mysql_fetch_array($sql1);

echo '<a href="#" title="'.$regi['nombrecliente'].'" data-rel="tooltip">'.$array["rutcliente"].'</a>';?></div></td>
								<td class="center"><div align="center"><?php 
$sql1 = mysql_query("select * from usuarios where cedula = '".$array['vendedor']."'") or die("Problemas en el select:".mysql_error());
$regi=mysql_fetch_array($sql1);

echo '<a href="#" title="'.$regi['nombre'].'" data-rel="tooltip">'.$array["vendedor"].'</a>';?></div></td>
								<td class="center"><div align="center"><?php echo $array["subtotal"]; ?></div></td>
								<td class="center"><div align="center"><?php echo $array["iva"]; ?></div></td>
								<td class="center"><div align="center"><?php echo $array["total_iva"]; ?></div></td>
								<td class="center"><div align="center"><?php echo $array["total_pago"]; ?></div></td>
								<td class="center">
<a class="btn btn-danger" href="ventas.php?eliminar=<?php echo base64_encode('eliminar_venta'); ?>&cod_venta=<?php echo base64_encode($array['cod_venta']); ?>" title="Eliminar Venta" data-rel="tooltip" onClick="return confirm('&iquest;Esta seguro que desea Eliminar esta Venta, Recuerde que se eliminaran todos los detalles de Ventas de productos?')"><i class="icon-trash icon-white"></i>Elim</a>
<?php if($array["tipo_venta"]=='FACTURA') { ?>
<a class="btn btn-success ask" href="facturas.php?cod_venta=<?php echo base64_encode($array['cod_venta']); ?>&rutcliente=<?php echo base64_encode($array['rutcliente']); ?>" title="Imprimir Factura" data-rel="tooltip" target="_black"><i class="icon-print icon-white"></i>Impr</a>
<?php } else { ?>
<a class="btn btn-success ask" href="notas.php?cod_venta=<?php echo base64_encode($array['cod_venta']); ?>&rutcliente=<?php echo base64_encode($array['rutcliente']); ?>" title="Imprimir Boleta" data-rel="tooltip" target="_black"><i class="icon-print icon-white"></i>Impr</a>
<?php } ?>
									</td>
							</tr><?php } ?>
						  </tbody>
					  </table>            
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
