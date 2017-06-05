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
     <script src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>	
 <script type="text/javascript" src="js/validaciones.js"></script>
				
<script type="text/javascript">
            $(function(){
                $('#ciudadprov').autocomplete({
                   source : 'clases/ciudadprov.php',
                   select : function(event, ui){
					   document.getElementById('ciudadprov').value = ui.item.ciudadprov;
					   			                 }
                });
            });
</script>
<script type="text/javascript">
            $(function(){
                $('#regionprov').autocomplete({
                   source : 'clases/regionprov.php',
                   select : function(event, ui){
					   document.getElementById('regionprov').value = ui.item.regionprov;
					   			                 }
                });
            });
</script>
<script type="text/javascript">
            $(function(){
                $('#giroprov').autocomplete({
                   source : 'clases/giroprov.php',
                   select : function(event, ui){
					   document.getElementById('giroprov').value = ui.item.giroprov;
					   			                 }
                });
            });
</script>
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
			<i class="icon-home"></i><a href="admin.php"> Principal</a> <span class="divider">/</span>					</li>
					<li>
				<i class="icon-user"></i><a href="proveedores.php"> Proveedores</a><span class="divider">/</span></li>
					<li>
					<li>
				<i class="icon-user"></i><a href="for_proveedores.php"> Nuevos Proveedores</a><span class="divider">/</span></li>
					<li>
					<li>
	<i class="icon-shopping-cart"></i><a href="pedidos.php"> Pedidos</a><span class="divider">/</span></li>
					<li>
					<li>
				<i class="icon-shopping-cart"></i><a href="for_pedidos.php"> Nuevos Pedidos</a><span class="divider">/</span></li>
					<li>
					<li>
				<i class="icon-print"></i><a href="reporte_pedidos.php"> Reportes Pedidos</a></li>
				</ul>
			</div>

			<div class="row-fluid sortable">
				<div class="box span12">
                <div class="box-header well" data-original-title>
                  <h2><i class="icon-edit"></i> Formulario de Actualización de Proveedores </h2>
                  <div class="box-icon">  
<a href="#" class="btn btn-minimize btn-round" title="Desplegar" data-rel="tooltip"><i class="icon-chevron-up"></i></a> 
				</div>
                </div>
			    <div class="box-content">
				<?php
			 
if(isset($_POST['txtRut']) && isset($_POST['nombreprov']) ) {
	
	$cod_proveedor= limpiar($_POST['cod_proveedor']);
	$rutprov= limpiar($_POST['txtRut']);
	$nombreprov= limpiar($_POST['nombreprov']);
	$telefprov= limpiar($_POST['telefprov']);
	$direcprov= limpiar($_POST['direcprov']);
	$ciudadprov= limpiar($_POST['ciudadprov']);
	$regionprov= limpiar($_POST['regionprov']);
	$giroprov= limpiar($_POST['giroprov']);
	$emailprov = limpiar($_POST['emailprov']);
	$nomcontacto= limpiar($_POST['nomcontacto']);

	mysql_query("update proveedores set rutprov = '".mysql_real_escape_string($rutprov)."',nombreprov = '".mysql_real_escape_string($nombreprov)."',telefprov = '".mysql_real_escape_string($telefprov)."',direcprov = '".mysql_real_escape_string($direcprov)."',ciudadprov = '".mysql_real_escape_string($ciudadprov)."',regionprov = '".mysql_real_escape_string($regionprov)."',giroprov = '".mysql_real_escape_string($giroprov)."',emailprov = '".mysql_real_escape_string($emailprov)."',nomcontacto = '".mysql_real_escape_string($nomcontacto)."' where cod_proveedor = '".$cod_proveedor."'") or die(mysql_error());
	
		
	echo"<div class='alert alert-block'>";
	echo"<button type='button' class='close' data-dismiss='alert'>×</button>";
	echo"<center>EL PROVEEDOR $nombreprov FUE ACTUALIZADO SATISFACTORIAMENTE</div>";
	echo "<meta http-equiv='Refresh' content='3;url=proveedores.php'>"; 
		echo '<br>';

 }
 ?>
 <?php 
$cod_proveedor = limpiar(base64_decode($_GET['cod_proveedor']));
$sql1 = mysql_query("select * from proveedores WHERE cod_proveedor = $cod_proveedor") or die(mysql_error());
$array1 = mysql_fetch_array($sql1);
 ?>
                  <form id="form1" name="form1" class="form-horizontal" method="post" action="">
                    <fieldset>
                    <div class="control-group">
                      <label class="control-label" for="inputWarning">RFC Proveedor: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese un RFC valido" data-rel="tooltip">
				<input name="txtRut" type="text" autocomplete="off" class="input-xlarge focused" onKeyUp="this.value=this.value.toUpperCase();" value="<?php echo $array1['rutprov']; ?>" placeholder="Ingrese RFC de Proveedor" id="txtRut" required="required">
					  </div>
                    </div>
					</div> 
                      <div class="control-group">
                      <label class="control-label" for="inputWarning">Nombre Proveedor: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese solo letras para Nombres" data-rel="tooltip">
                    <input name="nombreprov" type="text" class="input-xlarge focused" onKeyUp="this.value=this.value.toUpperCase();" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ.\s]+{3,80}" value="<?php echo $array1['nombreprov']; ?>" autocomplete="off" placeholder="Ingrese Nombre de Proveedor" id="nombreprov" required="required">
                      </div>
                      </div>
					  </div>
                      <div class="control-group">
                      <label class="control-label" for="focusedInput">Telefono Proveedor: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese solo numeros para telefono" data-rel="tooltip">
					    <input name="telefprov" type="text" class="input-xlarge focused" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Telefono de Proveedor" value="<?php echo $array1['telefprov']; ?>" autocomplete="off" id="telefprov" required="required">
					  </div>
                      </div>
					  </div>
                     <div class="control-group">
                      <label class="control-label" for="inputWarning">Dirección Proveedor: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese Direccion Proveedor" data-rel="tooltip">
                       <input name="direcprov" type="text" class="input-xlarge focused" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" value="<?php echo $array1['direcprov']; ?>" placeholder="Ingrese Direccion de Proveedor" id="direcprov" required="required">
                      </div>
                    </div>
					</div>
					<div class="control-group">
                      <label class="control-label" for="inputWarning">Ciudad Proveedor: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese Ciudad Proveedor" data-rel="tooltip">
                       <input name="ciudadprov" type="text" class="input-xlarge focused" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" value="<?php echo $array1['ciudadprov']; ?>" placeholder="Ingrese Ciudad de Proveedor" id="ciudadprov" required="required">
                      </div>
                    </div>
					</div>
					<div class="control-group">
                      <label class="control-label" for="inputWarning">Región Proveedor: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese Región Proveedor" data-rel="tooltip">
                       <input name="regionprov" type="text" class="input-xlarge focused" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" value="<?php echo $array1['regionprov']; ?>" placeholder="Ingrese Región de Proveedor" id="regionprov" required="required">
                      </div>
                    </div>
					</div>
					<div class="control-group">
                      <label class="control-label" for="inputWarning">Giro Proveedor: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese Giro Proveedor" data-rel="tooltip">
                       <input name="giroprov" type="text" class="input-xlarge focused" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" value="<?php echo $array1['giroprov']; ?>" placeholder="Ingrese Giro de Proveedor" id="giroprov" required="required">
                      </div>
                    </div>
					</div>
                      <div class="control-group">
                      <label class="control-label" for="inputWarning">Email Proveedor: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese un Correo Electronico valido" data-rel="tooltip">
                         <span class="add-on"><i class="icon-envelope"></i></span><input name="emailprov" type="email" class="input-xlarge focused" onKeyUp="this.value=this.value.toUpperCase();" value="<?php echo $array1['emailprov']; ?>" autocomplete="off" placeholder="Ingrese Correo de Proveedor" id="emailprov">
                      </div>
                    </div>
					</div>
                      <div class="control-group">
                      <label class="control-label" for="inputWarning">Nombre de Contacto: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese solo Letras para Nombres de Contacto" data-rel="tooltip">
                      <input name="nomcontacto" type="text" class="input-xlarge focused" onKeyUp="this.value=this.value.toUpperCase();" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ.\s]+{3,80}" value="<?php echo $array1['nomcontacto']; ?>" autocomplete="off" placeholder="Ingrese Nombre de Contacto" id="nomcontacto" required="required">
                      </div>
                    </div>
					</div>
                      <div class="form-actions">
                      <button type="submit" class="btn btn-large btn-primary">Actualizar</button>
                        <button type="reset" class="btn btn-large btn-primary">Restablecer</button>
			<input name="cod_proveedor" type="hidden" cod_proveedor="cod_proveedor" value="<?php echo $array1['cod_proveedor']; ?>" />
                      </div>
                    </fieldset>
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