
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<title>Sitema de Inventario CFV Familiar</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- The styles -->
	<link id="bs-css" href="css/bootstrap-cerulean.css" rel="stylesheet">
	<style type="text/css">
	  body {
		padding-bottom: 140px;
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

	<link rel="shortcut icon" href="img/logo.ico">
		
    <style type="text/css">
<!--
.Estilo1 {
	color: #FF6347;
	font-size: 34px;
	font-weight: bold;
}
-->
    </style>
</head>

<body>
		<div class="container-fluid">
		<div class="row-fluid">
		
			<div class="row-fluid">
				<div class="span12 center login-header">
					<h2>SISTEMA DE CONTROL DE INVENTARIOS CFV </h2>
					<h2> <?php
			include_once('conexion.php');
            conectarse(); 
			$sql = mysql_query("select * from configuracion") or die(mysql_error());
			$array = mysql_fetch_array($sql);
			echo $array['nom_empresa'];
			?></h2>
			  </div><!--/span-->
			</div><!--/row-->
			
			<div class="row-fluid">
			  <div class="well span6 center login-box">
					<div class="alert alert-info Estilo1">
					  <h2>Formulario de Acceso </h2>
					</div>
					<form class="form-horizontal" action="ingreso.php" method="post">
						<fieldset>
							<table width="463">
                              <tr>
                                <td><div class="clearfix">
                                  <div align="center">Ingrese su Usuario:</div>
                                </div></td>
                              </tr>
                              <tr>
                                <td width="317"><div class="input-prepend" title="Ingrese su Usuario" data-rel="tooltip"> <span class="add-on"><i class="icon-user"></i></span>
                                      <input autofocus class="input-large span10" name="usuario" id="usuario" type="text" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Nombre de Usuario" autocomplete="off" required="required"/>
                                </div></td>
                              </tr>
                              <tr>
                                <td><div class="clearfix">
                                  <div align="center">Ingrese su Contraseña:</div>
                                </div></td>
                              </tr>
                              <tr>
                                <td><div class="input-prepend" title="Ingrese su Password" data-rel="tooltip"> <span class="add-on"><i class="icon-lock"></i></span>
                                      <input class="input-large span10" name="password" id="password" type="password" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Clave de Acceso" autocomplete="off" required="required"/>
                                </div></td>
                              </tr>

                              <tr>
                                <td colspan="2"><table width="200" align="center">
  <tr>
    <td height="45"><button type="submit" class="btn btn-large btn-primary">Acceder</button></td>
    <td><button type="reset" class="btn btn-large btn-primary">Limpiar</button></td>
  </tr>
</table></td>
                              </tr>
                            </table>
							<p>&nbsp;</p>
							
						</fieldset>
					</form>
			    <div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>
			      INFORMACIÓN, INGRESE SUS DATOS DE ACCESO </span></div>
				</div><!--/span-->
			</div><!--/row-->
				</div><!--/fluid-row-->
		
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

