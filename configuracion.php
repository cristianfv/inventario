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
					<i class="icon-wrench"></i><a href="configuracion.php"> Configuración</a></li>
				</ul>
			</div>

			<div class="row-fluid sortable">
			  <div class="box span12">
                <div class="box-header well" data-original-title>
                  <h2><i class="icon-edit"></i> Formulario de Configuración</h2>
                  <div class="box-icon">  
<a href="#" class="btn btn-minimize btn-round" title="Desplegar" data-rel="tooltip"><i class="icon-chevron-up"></i></a> </div>
                </div>
			    <div class="box-content">
				<?php
			 
if(isset($_POST['txtRut']) && isset($_POST['nom_empresa']) ) {
	
	$rut_empresa = limpiar($_POST['txtRut']);
	$nom_empresa = limpiar($_POST['nom_empresa']);
	$direc_empresa = limpiar($_POST['direc_empresa']);
	$tlf_empresa = limpiar($_POST['tlf_empresa']);
	$ced_gerente = limpiar($_POST['ced_gerente']);
	$nom_gerente = limpiar($_POST['nom_gerente']);
	$ape_gerente = limpiar($_POST['ape_gerente']);
	$correo_gerente = limpiar($_POST['correo_gerente']);
	$tlf_gerente = limpiar($_POST['tlf_gerente']);
	$iva = limpiar($_POST['iva']);
	
	mysql_query("select * from configuracion") or die(mysql_error());
			if (mysql_affected_rows() == 0) {
			
			
mysql_query("insert into configuracion (codigo,rut_empresa,nom_empresa,direc_empresa,tlf_empresa,ced_gerente,nom_gerente,ape_gerente,correo_gerente,tlf_gerente,iva) values ('".mysql_real_escape_string('01')."','".mysql_real_escape_string($rut_empresa)."','".mysql_real_escape_string($nom_empresa)."','".mysql_real_escape_string($direc_empresa)."','".mysql_real_escape_string($tlf_empresa)."','".mysql_real_escape_string($ced_gerente)."','".mysql_real_escape_string($nom_gerente)."','".mysql_real_escape_string($ape_gerente)."','".mysql_real_escape_string($correo_gerente)."','".mysql_real_escape_string($tlf_gerente)."','".mysql_real_escape_string($iva)."')") or die(mysql_error());

     echo"<div class='alert alert-success'>";
	echo"<button type='button' class='close' data-dismiss='alert'>×</button>";
	echo"<center>LOS DATOS DE LA INSTITUCIÓN FUERON REGISTRADOS SATISFACTORIAMENTE</div>";
		echo '<br>';
		
		} else {
		
		
		mysql_query("update configuracion set rut_empresa = '".mysql_real_escape_string($rut_empresa)."',nom_empresa = '".mysql_real_escape_string($nom_empresa)."',direc_empresa = '".mysql_real_escape_string($direc_empresa)."',tlf_empresa = '".mysql_real_escape_string($tlf_empresa)."',ced_gerente = '".mysql_real_escape_string($ced_gerente)."',nom_gerente = '".mysql_real_escape_string($nom_gerente)."',ape_gerente = '".mysql_real_escape_string($ape_gerente)."',correo_gerente = '".mysql_real_escape_string($correo_gerente)."',tlf_gerente = '".mysql_real_escape_string($tlf_gerente)."',iva = '".mysql_real_escape_string($iva)."'") or die(mysql_error());		
			
		
	echo"<div class='alert alert-block'>";
	echo"<button type='button' class='close' data-dismiss='alert'>×</button>";
	echo"<center>LOS DATOS DE LA INSTITUCIÓN FUERON ACTUALIZADOS SATISFACTORIAMENTE</div>";
	echo '<br>';
 }
 }
 ?>
  <?php 
			$sql1 = mysql_query("select * from configuracion") or die(mysql_error());
			$array1 = mysql_fetch_array($sql1);
			?>
                  <form id="form1" name="form1" class="form-horizontal" method="post" action="">
                    <fieldset>
                    <div class="control-group">
                      <label class="control-label" for="inputWarning">RFC de Empresa: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese un RFC valido" data-rel="tooltip">
                        <input name="txtRut" type="text" class="input-xlarge focused" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" value="<?php echo $array1['rut_empresa']; ?>" placeholder="Ingrese RFC de Empresa" id="txtRut"  required="required">
                      </div>
                    </div>
					</div>
                      <div class="control-group">
                      <label class="control-label" for="inputWarning">Nombre de Empresa: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese Nombre de Empresa" data-rel="tooltip">
                        <input name="nom_empresa" type="text" class="input-xlarge focused" onKeyUp="this.value=this.value.toUpperCase();" pattern="[A-Z0-9""-,. ]{5,60}" autocomplete="off" value="<?php echo $array1['nom_empresa']; ?>" placeholder="Ingrese Nombre de Empresa" id="nom_empresa" required="required">
                      </div>
                      </div>
					  </div>
                      <div class="control-group">
                      <label class="control-label" for="focusedInput">Direcci&oacute;n de Empresa: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese Direccion de Empresa" data-rel="tooltip">
                        <input name="direc_empresa" type="text" autocomplete="off" class="input-xlarge focused" onKeyUp="this.value=this.value.toUpperCase();" value="<?php echo $array1['direc_empresa']; ?>" placeholder="Ingrese Direccion de Empresa" id="direc_empresa" required="required">
                      </div>
                      </div>
					  </div>
                     <div class="control-group">
                      <label class="control-label" for="inputWarning">Telefono de Empresa: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese solo numeros para Telefono" data-rel="tooltip">
                        <input name="tlf_empresa" type="text" class="input-xlarge focused" onKeyUp="this.value=this.value.toUpperCase();" pattern="[0-9]{10,11}" autocomplete="off" value="<?php echo $array1['tlf_empresa']; ?>" placeholder="Ingrese Telefono de Empresa" id="tlf_empresa" required="required">
                      </div>
                    </div>
					</div>
                      <div class="control-group">
                      <label class="control-label" for="inputWarning">RFC Gerente: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese solo numeros para Cedula" data-rel="tooltip">
                        <input name="ced_gerente" type="text" class="input-xlarge focused" onKeyUp="this.value=this.value.toUpperCase();" pattern="[0-9]{7,15}" autocomplete="off" value="<?php echo $array1['ced_gerente']; ?>" placeholder="Ingrese RFC de Gerente" id="ced_gerente" required="required">
                      </div>
                    </div>
					</div>
                      <div class="control-group">
                      <label class="control-label" for="inputWarning">Nombres Gerente: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese solo letras para Nombres" data-rel="tooltip">
                        <input name="nom_gerente" type="text" class="input-xlarge focused" onKeyUp="this.value=this.value.toUpperCase();" pattern="[A-Z ]{5,60}" autocomplete="off" value="<?php echo $array1['nom_gerente']; ?>" placeholder="Ingrese Nombres del Gerente" id="nom_gerente" required="required">
                      </div>
                    </div>
					</div>
                      <div class="control-group">
                      <label class="control-label" for="inputWarning">Apellidos Gerente: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese solo letras para Apellidos" data-rel="tooltip">
                        <input name="ape_gerente" type="text" class="input-xlarge focused" placeholder="Ingrese Apellidos del Gerente" id="ape_gerente" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" value="<?php echo $array1['ape_gerente']; ?>" pattern="[A-Z ]{5,60}" required="required">
                      </div>
                    </div>
					</div>
                      <div class="control-group">
                      <label class="control-label" for="inputWarning">Correo Gerente: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese un Correo Electronico valido" data-rel="tooltip">
                        <span class="add-on"><i class="icon-envelope"></i></span><input name="correo_gerente" type="email" class="input-xlarge focused" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" value="<?php echo $array1['correo_gerente']; ?>" placeholder="Ingrese Correo del Gerente" id="correo_gerente" required="required">
                      </div>
                    </div>
					</div>
                      <div class="control-group">
                      <label class="control-label" for="inputWarning">Telefono Gerente: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese solo numeros para Telefono" data-rel="tooltip">
                        <input name="tlf_gerente" type="text" class="input-xlarge focused" onKeyUp="this.value=this.value.toUpperCase();" pattern="[0-9]{10,11}" autocomplete="off" value="<?php echo $array1['tlf_gerente']; ?>" placeholder="Ingrese Telefono de Empresa" id="tlf_gerente" required="required">
                      </div>
                    </div>
					</div>
					 <div class="control-group">
                      <label class="control-label" for="inputWarning">Iva Productos: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese solo numeros para Telefono" data-rel="tooltip">
                        <input name="iva" type="text" class="input-xlarge focused" onKeyUp="this.value=this.value.toUpperCase();" pattern="[0-9.]{2,6}" title="Escriba solo numeros enteros o con decimales, como maximo tres enteros, y dos decimales y punto para separar los decimales" autocomplete="off" value="<?php echo $array1['iva']; ?>" id="iva" required="required">
                      </div>
                    </div>
					</div>
                      <div class="form-actions">
                      <button type="submit" class="btn btn-large btn-primary">Registrar / Actualizar</button>
                        <button type="reset" class="btn btn-large btn-primary">Restablecer</button>
                      </div>
                    </fieldset>
                  </form>
		        </div>
		      </div>
			  <!--/span-->
			
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
			<p class="pull-left">&copy; <a href="http://usman.it" target="_blank">Derechos Reservados</a> 2014</p>
			<p class="pull-right">Desarrollado por : <a href="mailto:elsaiya@gmail.com">Ing. Ruben D. Chirinos R.</a></p>
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

