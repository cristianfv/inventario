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
<script src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>	
 <script type="text/javascript" src="js/validaciones.js"></script>	
<script type="text/javascript">
            $(function(){
                $('#ciudadcliente').autocomplete({
                   source : 'clases/ciudadclient.php',
                   select : function(event, ui){
					   document.getElementById('ciudadcliente').value = ui.item.ciudadcliente;
					   			                 }
                });
            });
</script>
<script type="text/javascript">
            $(function(){
                $('#regioncliente').autocomplete({
                   source : 'clases/regionclient.php',
                   select : function(event, ui){
					   document.getElementById('regioncliente').value = ui.item.regioncliente;
					   			                 }
                });
            });
</script>
<script type="text/javascript">
            $(function(){
                $('#girocliente').autocomplete({
                   source : 'clases/giroclient.php',
                   select : function(event, ui){
					   document.getElementById('girocliente').value = ui.item.girocliente;
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
			<i class="icon-home"></i><a href="admin.php"> Principal</a> <span class="divider">/</span>
					</li>
					<li>
				<i class="icon-user"></i><a href="clientes.php"> Clientes </a><span class="divider">/</span>
				</li>
					<li>
				<i class="icon-user"></i><a href="for_clientes.php"> Nuevos Clientes </a><span class="divider">/</span>
				   </li>
					<li>
				<i class="icon-print"></i><a href="reporte_clientes.php" target="_blank"> Listado Clientes</a>
				</li>
				</ul>
			</div>

			<div class="row-fluid sortable">
				<div class="box span12">
                <div class="box-header well" data-original-title>
                  <h2><i class="icon-edit"></i> Formulario de Registros de Clientes </h2>
                  <div class="box-icon">  
<a href="#" class="btn btn-minimize btn-round" title="Desplegar" data-rel="tooltip"><i class="icon-chevron-up"></i></a> 
				</div>
                </div>
			    <div class="box-content">
				<?php
			 
if(isset($_POST['txtRut']) && isset($_POST['nombrecliente']) ) {
	
	$rutcliente= limpiar($_POST['txtRut']);
	$nombrecliente= limpiar($_POST['nombrecliente']);
	$telefcliente= limpiar($_POST['telefcliente']);
	$direccliente= limpiar($_POST['direccliente']);
	$ciudadcliente= limpiar($_POST['ciudadcliente']);
	$regioncliente= limpiar($_POST['regioncliente']);
	$girocliente= limpiar($_POST['girocliente']);
	$emailcliente = limpiar($_POST['emailcliente']);
	$contactocliente= limpiar($_POST['contactocliente']);
	
	mysql_query("select * from clientes where rutcliente = '".$rutcliente."'") or die(mysql_error());
			if (mysql_affected_rows() == 0) {
			
		mysql_query("insert into clientes (rutcliente,nombrecliente,telefcliente,direccliente,ciudadcliente,regioncliente,girocliente,emailcliente,contactocliente) values ('".mysql_real_escape_string($rutcliente)."','".mysql_real_escape_string($nombrecliente)."','".mysql_real_escape_string($telefcliente)."','".mysql_real_escape_string($direccliente)."','".mysql_real_escape_string($ciudadcliente)."','".mysql_real_escape_string($regioncliente)."','".mysql_real_escape_string($girocliente)."','".mysql_real_escape_string($emailcliente)."','".mysql_real_escape_string($contactocliente)."')") or die(mysql_error());
		
    echo"<div class='alert alert-success'>";
	echo"<button type='button' class='close' data-dismiss='alert'>×</button>";
	echo"<center>EL CLIENTE $nombrecliente FUE REGISTRADO SATISFACTORIAMENTE</div>";
	echo '<br>';

			} else {
		
	echo"<div class='alert alert-error'>";
	echo"<button type='button' class='close' data-dismiss='alert'>×</button>";
	echo"<center>ERROR! YA EXISTE UN CLIENTE CON EL NUMERO DE RUT $rutcliente</div>";
	echo '<br>';
			
		}
 }
 ?>
                  <form id="form1" name="form1" class="form-horizontal" method="post" action="">
                    <fieldset>
                    <div class="control-group">
                      <label class="control-label" for="inputWarning"><span data-reactid=".zg.$mid=11434258871829=2796879f53f0f46fb68.2:0.0.0.0.0"><span data-reactid=".zg.$mid=11434258871829=2796879f53f0f46fb68.2:0.0.0.0.0.0">RFC</span></span> Cliente: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese un Rut valido" data-rel="tooltip">
				<input name="txtRut" type="text" autocomplete="off" class="input-xlarge focused" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese RFC de Cliente" id="txtRut" required="required">
					  </div>
                    </div>
					</div> 
                      <div class="control-group">
                      <label class="control-label" for="inputWarning">Nombre Cliente: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese solo letras para Nombres" data-rel="tooltip">
                    <input name="nombrecliente" type="text" class="input-xlarge focused" onKeyUp="this.value=this.value.toUpperCase();" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ.\s]+{3,80}" autocomplete="off" placeholder="Ingrese Nombre de Cliente" id="nombrecliente" required="required">
                      </div>
                      </div>
					  </div>
                      <div class="control-group">
                      <label class="control-label" for="focusedInput">Telefono Cliente: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese solo numeros para telefono" data-rel="tooltip">
					    <input name="telefcliente" type="text" class="input-xlarge focused" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Telefono de Cliente" autocomplete="off" id="telefcliente" required="required">
					  </div>
                      </div>
					  </div>
                     <div class="control-group">
                      <label class="control-label" for="inputWarning">Direcci&oacute;n Cliente: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese Direccion Proveedor" data-rel="tooltip">
                       <input name="direccliente" type="text" class="input-xlarge focused" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Direccion de Cliente" id="direccliente" required="required">
                      </div>
                    </div>
					</div>
					<div class="control-group">
                      <label class="control-label" for="inputWarning">Ciudad Cliente: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese Ciudad Cliente" data-rel="tooltip">
                       <input name="ciudadcliente" type="text" class="input-xlarge focused" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Cliente de Cliente" id="ciudadcliente" required="required">
                      </div>
                    </div>
					</div>
					<div class="control-group">
                      <label class="control-label" for="inputWarning">Regi&oacute;n Cliente: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese Región Cliente" data-rel="tooltip">
                       <input name="regioncliente" type="text" class="input-xlarge focused" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Region de Cliente" id="regioncliente" required="required">
                      </div>
                    </div>
					</div>
					<div class="control-group">
                      <label class="control-label" for="inputWarning">Giro Cliente: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese Giro Cliente" data-rel="tooltip">
                       <input name="girocliente" type="text" class="input-xlarge focused" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Giro de Cliente" id="girocliente" required="required">
                      </div>
                    </div>
					</div>
                      <div class="control-group">
                      <label class="control-label" for="inputWarning">Email Cliente: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese un Correo Electronico valido" data-rel="tooltip">
                         <span class="add-on"><i class="icon-envelope"></i></span><input name="emailcliente" type="email" class="input-xlarge focused" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Correo de Cliente" id="emailcliente">
                      </div>
                    </div>
					</div>
                      <div class="control-group">
                      <label class="control-label" for="inputWarning">Nombre de Contacto: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese solo Letras para Nombres de Contacto" data-rel="tooltip">
                      <input name="contactocliente" type="text" class="input-xlarge focused" onKeyUp="this.value=this.value.toUpperCase();" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ.\s]+{3,80}" autocomplete="off" placeholder="Ingrese Nombre de Contacto" id="contactocliente" required="required">
                      </div>
                    </div>
					</div>
                      <div class="form-actions">
                      <button type="submit" class="btn btn-large btn-primary">Registrar</button>
                        <button type="reset" class="btn btn-large btn-primary">Restablecer</button>
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
