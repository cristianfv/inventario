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
					<i class="icon-folder-close"></i><a href="backup.php"> Respaldar Base de Datos</a><span class="divider">/</span></li>
				<li>
					<i class="icon-folder-open"></i><a href="basedatos.php"> Restaurar Base de Datos</a></li></ul>
			</div>

			<div class="row-fluid sortable">
			  <div class="box span12">
                <div class="box-header well" data-original-title>
                  <h2><i class="icon-edit"></i> Formulario de Restauración de Base de Datos </h2>
                  <div class="box-icon">  
<a href="#" class="btn btn-minimize btn-round" title="Desplegar" data-rel="tooltip"><i class="icon-chevron-up"></i></a> </div>
                </div>
			    <div class="box-content">
<?php
error_reporting(E_ALL - E_NOTICE);
ini_set('upload_max_filesize', '80M');
ini_set('post_max_size', '80M');
ini_set('memory_limit', '-1'); //evita el error Fatal error: Allowed memory size of X bytes exhausted (tried to allocate Y bytes)...
ini_set('max_execution_time', 300); // es lo mismo que set_time_limit(300) ;
ini_set('mysql.connect_timeout', 300);
ini_set('default_socket_timeout', 300);
//En MYSQL archivo "my.ini" ==> max_allowed_packet = 22M
//"SET GLOBAL max_allowed_packet = 22M;"
//"SET GLOBAL connect_timeout = 20;"
//"SET GLOBAL net_read_timeout=50;"
//esto no se si solo es modificable en php.ini
ini_set('file_uploads','On'); 
ini_set('upload_tmp_dir','upload');

function run_split_sql($uploadfile, $host, $usuario,$passwd){
    $strSQLs = file_get_contents($uploadfile);
    unlink($uploadfile);
    //  Elimina lineas vacias o que empiezan por -- #   //   o entre /* y */
    // Elimna los espacios en blanco entre ; y \r\n
    // handle DOS and Mac encoded linebreaks
                    $strSQLs=preg_replace("/\r\n$/","\n",$strSQLs);
                    $strSQLs=preg_replace("/\r$/","\n",$strSQLs);
    $strSQLs = trim(preg_replace('/ {2,}/', ' ', $strSQLs));    // ----- remove multiple spaces ----- 
    $strSQLs = str_replace("\r","",$strSQLs);                     //los \r\n los dejamos solo en \n
    $lines=explode("\n",$strSQLs);
    $strSQLs = array();
    $in_comment = false;
    foreach ($lines as $key => $line){
        $line=trim($line); //preg_replace("#.*/#","",$line)
        $ignoralinea=(( "#" == $line[0] ) || ("--" == substr($line,0,2)) || (!$line) || ($line==""));
        if (!$ignoralinea){
            //Eliminar comentarios que empiezan por /* y terminan por */    
            if( preg_match("/^\/\*/", ($line)) )       $in_comment = true;
            if( !$in_comment )     $strSQLs[] = $line ;
            if( preg_match("/\*\//", ($line)) )      $in_comment = false;
        }
    }
    unset($lines);
    // Particionar en sentencias
    $IncludeDelimiter=false;
    $delimiter=";";
    $delimiterLen= 1;
    $sql="";
    // CONEXION 
    $conexion = new mysqli('localhost','root','','inventario',3306) or die ("No se puede conectar con el servidor MySQL: %s\n". $conexion->connect_error);
	
	//$mysqli = new mysqli('localhost','root','18633174','mysqli',3306);
    $NumLin=0;
    foreach ($strSQLs as $key => $line){
        
        if ("DELIMITER" == substr($line,0,9)){  //empieza por DELIMITER
            $D=explode(" ",$line);
            $delimiter= $D[1];
            $delimiterLen= strlen($delimiter);
            $sql=($IncludeDelimiter)? $line ."\n" : "";
        }elseif (substr($line,-1*$delimiterLen) == $delimiter) { //hemos alcanzado el  Delimiter
                if (($NumLinea++ % 100)==0) {// ver con que base de datos estamos para poder reconectar caso de error
                        $respuesta = $conexion->query("select database() as db");
                        $row = $respuesta->fetch_array(MYSQLI_NUM);
                        $db=$row[0];
                }
                $sql .= ($IncludeDelimiter)? $line : substr($line,0,-1*$delimiterLen);
                $respuesta = $conexion->query($sql);
                if ($respuesta) echo "";
				                //echo "<br>$NumLinea Ejecutado:  ". str_replace("\n"," ",substr($sql,0,130))."...";
                    else {
     echo "";
	 //echo "<br><b><u>$NumLinea E R R O R: ".$conexion->errno." :</u></b>". $conexion->error ." ====> ". substr($sql,0,1022)."...";
                        if (!$conexion->ping() ){ 
                            //$conexion = new mysqli($host, $usuario, $passwd) or die ("No se puede RECONECTAR con el servidor MySQL: %s\n". $conexion->connect_error);
							
							$conexion = new mysqli('localhost','root','','inventario',3306) or die ("No se puede conectar con el servidor MySQL: %s\n". $conexion->connect_error);
                            //$conexion->select_db($db);
                            $respuesta = $conexion->query($sql);
                            if ($respuesta) echo "<br>$NumLinea REEJECUTADO:  ". str_replace("\n"," ",substr($sql,0,130))."...";
                                else echo "<br><b><u>$NumLinea REPITE-E R R O R: ".$conexion->errno." :</u></b>". $conexion->error ." ====> ". substr($sql,0,1022)."...";
                        }
                    }    
                        
                $sql="";
        } else { //no hemos alcanzado el delimitador el delimitador siempre debe estar al final de linea
                $sql .= $line ."\n";
        }
    }
    $conexion->close();    
}

if (isset($_POST['upload'])) {
    $uploadfile = "./" . basename($_FILES['userfile']['name']);
    print '<pre>';
    switch ($_FILES['userfile']['error']){
        case 0:// UPLOAD_ERR_OK
            if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
                    echo "<font color='red'> La copia de seguridad <b> $uploadfile </b> se ha restaurado correctamente.<br></font>";
                    run_split_sql($uploadfile, $host, $usuario,$passwd );
            } else     echo "<br>¡Posible error en carga de archivos!";
            break;
        case 1: // UPLOAD_ERR_INI_SIZE
            echo "<br>El archivo sobrepasa el limite autorizado por el servidor(archivo php.ini) !";
            break;
        case 2: // UPLOAD_ERR_FORM_SIZE
            echo "<br>El archivo sobrepasa el limite autorizado en el formulario HTML !";
            break;
        case 3: // UPLOAD_ERR_PARTIAL
            echo "<br>El envio del archivo ha sido suspendido durante la transferencia!";
            break;
        case 4: // UPLOAD_ERR_NO_FILE
			echo "<br><font color='red'> Por Favor seleccione el backup de la base de datos para restaurar !</font>";
            break;
        default: 
            echo "<br>ERROR DESCONOCIDO !"; 
            break;
    }
    print "</pre>";
    unset($_POST['upload']);
    $_POST[]=array();
}
?>	
<FORM action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
    <INPUT type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAXFILESIZE; ?>">
                    <fieldset><br>
                    <div class="control-group">
                      <label class="control-label" for="inputWarning">Buscar Respaldos: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Seleccione el archivo a restaurar" data-rel="tooltip">
                        <input type="file" name="userfile" class="input-file uniform_on" required="required">
                      </div>
                    </div>
					</div>
                      <div class="form-actions">
             <button name="upload" type="submit" class="btn btn-large btn-primary">Restaurar Copia de Seguridad</button>
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
			<p class="pull-left">&copy; <a href="http://usman.it" target="_blank">Derechos Reservados</a></p>
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

