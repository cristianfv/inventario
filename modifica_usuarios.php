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
<script type="text/javascript" src="css/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="css/jconfirmaction.jquery.js"></script>
<script type="text/javascript" src="css/confirmacion.js"></script>
<script type="text/javascript" src="js/validaciones.js"></script>
		<script type="text/javascript">
			function onRutBlur(obj) {
				if (VerificaRut(obj.value))
					return true;
				else 
					alert("EL RUT INGRESADO ES INCORRECTO");
					document.getElementById('txtRut').value = '';
			}
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
						<span class="caret"></span>
					</a>
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
				<i class="icon-user"></i><a href="usuarios.php"> Usuarios</a><span class="divider">/</span></li>
					<li>
					<li>
				<i class="icon-user"></i><a href="for_usuarios.php"> Nuevos Usuarios</a><span class="divider">/</span></li>
					<li>
					<li>
				<i class="icon-eye-open"></i><a href="log.php"> Logs de Usuarios</a><span class="divider">/</span></li>
					<li>
				<i class="icon-print"></i><a href="reporte_log.php" target="_blank"> Listado Logs de Usuarios</a>
					</li>
				</ul>
			</div>

			<div class="row-fluid sortable">
			  <div class="box span12">
                <div class="box-header well" data-original-title>
                  <h2><i class="icon-edit"></i> Formulario de Actualización de Usuarios </h2>
                  <div class="box-icon">  
<a href="#" class="btn btn-minimize btn-round" title="Desplegar" data-rel="tooltip"><i class="icon-chevron-up"></i></a> 
				</div>
                </div>
			    <div class="box-content">
				<?php
			 
if(isset($_POST['usuario']) && isset($_POST['clave']) ) {
	
	$id= limpiar($_POST['id']);
	$cedula= limpiar($_POST['txtRut']);
	$nombre= limpiar($_POST['nombre']);
	$cargo= limpiar($_POST['cargo']);
	$usuario = limpiar($_POST['usuario']);
	$clave= limpiar(sha1($_POST['clave']));
	$clave1= limpiar(sha1($_POST['clave1']));
	$pregunta= limpiar($_POST['pregunta']);
	$respuesta = limpiar($_POST['respuesta']);
	$nivel= limpiar($_POST['nivel']);
		
		if ($clave == $clave1) {
	$sql2 = mysql_query("select * from usuarios where cedula = '".$cedula."'") or die(mysql_error());
	$array2 = mysql_fetch_array($sql2); 

	mysql_query("update usuarios set cedula = '".mysql_real_escape_string($cedula)."',nombre = '".mysql_real_escape_string($nombre)."',cargo = '".mysql_real_escape_string($cargo)."',usuario = '".mysql_real_escape_string($usuario)."',password = '".mysql_real_escape_string($clave)."',pregunta = '".mysql_real_escape_string($pregunta)."',respuesta = '".mysql_real_escape_string($respuesta)."',nivel = '".mysql_real_escape_string($nivel)."' where id = '".$id."'") or die(mysql_error());
	
		
	echo"<div class='alert alert-block'>";
	echo"<button type='button' class='close' data-dismiss='alert'>×</button>";
	echo"<center>EL USUARIO $nombre FUE ACTUALIZADO SATISFACTORIAMENTE</div>";
	echo "<meta http-equiv='Refresh' content='3;url=usuarios.php'>"; 
		echo '<br>';
		
		} else {
		
	echo"<div class='alert alert-error'>";
	echo"<button type='button' class='close' data-dismiss='alert'>×</button>";
	echo"<center>LAS CLAVES DE ACCESO NO COINCIDEN, VERIFIQUE DE NUEVO POR FAVOR</div>";
	echo '<br>';
			
		}
 }
 ?>
 <?php 
$id = limpiar(base64_decode($_GET['id']));
$sql1 = mysql_query("select * from usuarios WHERE id = $id") or die(mysql_error());
$array1 = mysql_fetch_array($sql1);
 ?>
 
                  <form id="form1" name="form1" class="form-horizontal" method="post" action="">
                    <fieldset>
					<div class="control-group">
                      <label class="control-label" for="inputWarning">Rut Usuario: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese Rut valido" data-rel="tooltip">
                        <input name="txtRut" type="text" class="input-xlarge focused" onKeyUp="this.value=this.value.toUpperCase();" onBlur="onRutBlur(this);" autocomplete="off" value="<?php echo $array1['cedula']; ?>" placeholder="Ingrese Rut" id="txtRut" required="required">
                      </div>
                    </div>
					</div>
                      <div class="control-group">
                      <label class="control-label" for="inputWarning">Nombres: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese solo letras para Nombres" data-rel="tooltip">
                        <input name="nombre" type="text" class="input-xlarge focused" onKeyUp="this.value=this.value.toUpperCase();" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ.\s]+{3,80}" autocomplete="off" value="<?php echo $array1['nombre']; ?>" placeholder="Ingrese su Nombre" id="nombre" required="required">
                      </div>
                      </div>
					  </div>
                      <div class="control-group">
                      <label class="control-label" for="focusedInput">Cargo: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese solo letras para Cargo" data-rel="tooltip">
                        <input name="cargo" type="text" class="input-xlarge focused" onKeyUp="this.value=this.value.toUpperCase();" pattern="[A-Za-z ]{1,35}" placeholder="Ingrese su Cargo" autocomplete="off" value="<?php echo $array1['cargo']; ?>" id="cargo" required="required">
                      </div>
                      </div>
					  </div>
                     <div class="control-group">
                      <label class="control-label" for="inputWarning">Usuarios: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese su Usuario" data-rel="tooltip">
                        <input name="usuario" type="text" class="input-xlarge focused" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" value="<?php echo $array1['usuario']; ?>" placeholder="Ingrese su Usuario" id="usuario" required="required">
                      </div>
                    </div>
					</div>
                      <div class="control-group">
                      <label class="control-label" for="inputWarning">Clave: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese su Clave" data-rel="tooltip">
                        <span class="add-on"><i class="icon-lock"></i></span><input name="clave" type="password" class="input-xlarge focused" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese su Clave" id="clave" required="required">
                      </div>
                    </div>
					</div>
					 <div class="control-group">
                      <label class="control-label" for="inputWarning">Repite Clave: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Repita su Clave" data-rel="tooltip">
                        <span class="add-on"><i class="icon-lock"></i></span><input name="clave1" type="password" class="input-xlarge focused" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Repita su Clave" id="clave1" required="required">
                      </div>
                    </div>
					</div>
                      <div class="control-group">
                      <label class="control-label" for="inputWarning">Pregunta Secreta: </label>
                      <div class="controls">
					  <div class="input-prepend" data-rel="tooltip">
                        <select name="pregunta" id="pregunta" data-rel="chosen" required="required">
<option value="NOMBRE DE TU PRIMER MASCOTA" <?php if (!(strcmp('NOMBRE DE TU PRIMER MASCOTA', $array1['pregunta']))) {echo "selected=\"selected\"";} ?>>NOMBRE DE TU PRIMER MASCOTA</option>
                <option value="NOMBRE DE LA MADRE" <?php if (!(strcmp('NOMBRE DE LA MADRE', $array1['pregunta']))) {echo "selected=\"selected\"";} ?>>NOMBRE DE LA MADRE</option>
                <option value="MEJOR AMIGO DE LA INFANCIA" <?php if (!(strcmp('MEJOR AMIGO DE LA INFANCIA', $array1['pregunta']))) {echo "selected=\"selected\"";} ?>>MEJOR AMIGO DE LA INFANCIA</option>
                <option value="EQUIPO DE FUTBOL FAVORITO" <?php if (!(strcmp('EQUIPO DE FUTBOL FAVORITO', $array1['pregunta']))) {echo "selected=\"selected\"";} ?>>EQUIPO DE FUTBOL FAVORITO</option>
                <option value="NOMBRE DE TU PRIMER PROFESOR" <?php if (!(strcmp('NOMBRE DE TU PRIMER PROFESOR', $array1['pregunta']))) {echo "selected=\"selected\"";} ?>>NOMBRE DE TU PRIMER PROFESOR</option>
								  </select>
                      </div>
                    </div>
					</div>
                      <div class="control-group">
                      <label class="control-label" for="inputWarning">Respuesta Secreta: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese Respuesta Secreta" data-rel="tooltip">
                      <input name="respuesta" type="text" class="input-xlarge focused" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Respuesta Secreta" value="<?php echo $array1['respuesta']; ?>" id="respuesta" required="required">
                      </div>
                    </div>
					</div>
                      <div class="control-group">
                      <label class="control-label" for="inputWarning">Nivel Acceso: </label>
                      <div class="controls">
					  <div class="input-prepend" data-rel="tooltip">
                   <select name="nivel" id="nivel" data-rel="chosen" required="required">
<option value="ADMINISTRADOR" <?php if (!(strcmp('ADMINISTRADOR', $array1['nivel']))) {echo "selected=\"selected\"";} ?>>ADMINISTRADOR</option>
<option value="ASISTENTE" <?php if (!(strcmp('ASISTENTE', $array1['nivel']))) {echo "selected=\"selected\"";} ?>>ASISTENTE</option>
								  </select>
                      </div>
                    </div>
					</div>
                      <div class="form-actions">
                      <button type="submit" class="btn btn-large btn-primary">Actualizar</button>
                      <button type="reset" class="btn btn-large btn-primary">Restablecer</button>
					  <input name="id" type="hidden" id="id" value="<?php echo $array1['id']; ?>" />
                      </div>
                    </fieldset>
                  </form>
		        </div>
		      </div>
			  <!--/span-->
			
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