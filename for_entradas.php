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
<link type="text/css" rel="stylesheet" href="css/jquery-ui-1.8.4.custom.css" />
	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="img/favicon.ico">
<script src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript">
            $(function(){
                $('#cod_material').autocomplete({
                   source : 'clases/material.php',
                   select : function(event, ui){
					   document.getElementById('material').value = ui.item.mat ;
					   document.getElementById('precio_compra').value = ui.item.pre1 ;
					   document.getElementById('precio_venta').value = ui.item.pre2 ;
					   document.getElementById('rutprov').value = ui.item.rut ;
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
				<i class="icon-shopping-cart"></i><a href="entradas.php"> Entradas</a><span class="divider">/</span></li>
					<li>
					<li>
			<i class="icon-shopping-cart"></i><a href="for_entradas.php"> Nuevas Entradas</a><span class="divider">/</span></li>
					<li>
					<li>
				<i class="icon-print"></i><a href="orden_entradas.php"> Orden de Entradas</a></li>
				</ul>
			</div>

			<div class="row-fluid sortable">
				<div class="box span12">
                <div class="box-header well" data-original-title>
                  <h2><i class="icon-edit"></i> Formulario de Registros de Entradas de Productos </h2>
                  <div class="box-icon">  
<a href="#" class="btn btn-minimize btn-round" title="Desplegar" data-rel="tooltip"><i class="icon-chevron-up"></i></a>
				</div>
                </div>
			    <div class="box-content">
				<?php
			 
 if(isset($_POST['cod_orden']) && isset($_POST['cod_material']) ) {
	
	$cod_orden= limpiar($_POST['cod_orden']);
	$cod_material= limpiar($_POST['cod_material']);
	$material= limpiar($_POST['material']);
	$precio_compra= limpiar($_POST['precio_compra']);
	$precio_venta= limpiar($_POST['precio_venta']);
	$cantidad= limpiar($_POST['cantidad']);
	$codigo_barra= limpiar($_POST['codigo_barra']);
	$status_material = 'ACTIVO';
	$rutprov= limpiar($_POST['rutprov']);
	$fecha_ingreso= date('Y-m-d');
	
##################  SUBIR FOTO DE PRODUCTO ######################################

         //datos del arhivo  
         $nombre_archivo = $_FILES['imagen']['name'];  
         $tipo_archivo = $_FILES['imagen']['type'];  
         $tamano_archivo = $_FILES['imagen']['size'];  
         //compruebo si las características del archivo son las que deseo  
if ((strpos($tipo_archivo,'image/jpeg')!==false)&&$tamano_archivo<200000) 
{  
if (move_uploaded_file($_FILES['imagen']['tmp_name'], "fotos/".$nombre_archivo) && rename("fotos/".$nombre_archivo,"fotos/".$cod_material.".jpg"))
{ 
## se puede dar un aviso
} 
## se puede dar otro aviso 
}

##################  FINALIZA SUBIR FOTO DE PRODUCTO ######################################


###### AQUI CONSULTO QUE EL MISMO CODIGO DEL PRODUCTO NO SE ASIGNADO A OTRO PROVEEDOR ########
mysql_query("select * from orden_compras where cod_material = '".$cod_material."' and rutprov != '".$rutprov."'") or die(mysql_error());
			if (mysql_affected_rows() > 0) {
			
		echo"<div align='center' class='alert alert-error alert-dismissable'>";
		echo "<center>ERROR! EL CODIGO $cod_material DEL PRODUCTO YA SE ENCUENTRA ASIGNADO A UN PROVEEDOR";
		echo"</div>";
			
		}	else {
	
	
###### AQUI CONSULTO QUE LA MISMA ORDEN Y MATERIAL NO ESTE REGISTRADO YA ########
mysql_query("select * from orden_compras where cod_orden = '".$cod_orden."' and cod_material = '".$cod_material."' and rutprov = '".$rutprov."'") or die(mysql_error());
			if (mysql_affected_rows() == 0) {
			
mysql_query("insert into orden_compras (cod_orden,cod_material,material,precio_compra,precio_venta,cant,codigo_barra,rutprov,fecha_ingreso) values ('".mysql_real_escape_string($cod_orden)."','".mysql_real_escape_string($cod_material)."','".mysql_real_escape_string($material)."','".mysql_real_escape_string($precio_compra)."','".mysql_real_escape_string($precio_venta)."','".mysql_real_escape_string($cantidad)."','".mysql_real_escape_string($codigo_barra)."','".mysql_real_escape_string($rutprov)."','".mysql_real_escape_string($fecha_ingreso)."')") or die(mysql_error());


###### AQUI CONSULTO SI EL MATERIAL NO ESTA REGISTRADO HAGA EL NUEVO REGISTRO DEL MATERIAL EN LA TABLA ALMACEN MATERIAL ########
mysql_query("select * from material_almacen where cod_material = '".$cod_material."'") or die(mysql_error());
			if (mysql_affected_rows() == 0) {

mysql_query("insert into material_almacen (cod_orden,cod_material,precio_venta,existencia,minimo_stock,ubicacion_deposito,status_material) values ('".mysql_real_escape_string($cod_orden)."','".mysql_real_escape_string($cod_material)."','".mysql_real_escape_string($precio_venta)."','".mysql_real_escape_string($cantidad)."','".mysql_real_escape_string('0')."','".mysql_real_escape_string('0')."','".mysql_real_escape_string($status_material)."')") or die(mysql_error());	

    echo"<div class='alert alert-success'>";
	echo"<button type='button' class='close' data-dismiss='alert'>×</button>";
	echo"<center>EL PRODUCTO $material FUE REGISTRADO SATISFACTORIAMENTE</div>";
	echo '<br>';

   } else {
   
###### DE LO CONTRARIO SI EL CODIGO DEL MATERIAL EXISTE ENTONCES ME ACTUALIZARA LA EXISTENCIA EN ALMACEN  DE ESE MATERIAL########
     
$sql1 = mysql_query("select * from material_almacen where cod_material = '".mysql_real_escape_string($cod_material)."'") or die(mysql_error());
$array1 = mysql_fetch_array($sql1); 
$existencia=$array1['existencia']+$cantidad;

mysql_query("update material_almacen set precio_venta = '".mysql_real_escape_string($precio_venta)."',existencia = '".mysql_real_escape_string($existencia)."' where cod_material = '".$cod_material."'") or die(mysql_error());
	
		
	echo"<div class='alert alert-success'>";
	echo"<button type='button' class='close' data-dismiss='alert'>×</button>";
	echo"<center>EL PRODUCTO $material FUE REGISTRADO SATISFACTORIAMENTE</div>";
	echo '<br>';
		}
			} else {
				
		echo"<div align='center' class='alert alert-error alert-dismissable'>";
		echo "<center>ERROR! ESTA ORDEN YA SE ENCUENTRA REGISTRADA PARA ESTE PRODUCTO";
		echo"</div>";
			}
		}
		}
 ?>
          <?php 
			$sql1 = mysql_query("select cod_orden from orden_compras order by cod_orden desc") or die(mysql_error());
			$array1 = mysql_fetch_array($sql1);
			$n = $array1['cod_orden'] + 1;
            $num = str_pad($n, 2, "0", STR_PAD_LEFT);
			
			?>
                  <form id="form1" name="form1" class="form-horizontal" enctype="multipart/form-data" method="post" action="">
                    <fieldset>
                    <div class="control-group">
                      <label class="control-label" for="inputWarning">Código Entrada: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Codigo Orden de Entrada" data-rel="tooltip">
                      <input name="cod_orden" type="text" class="input-xlarge disabled" id="cod_orden" size="10" value="<?php echo $num; ?>" readonly="readonly" />
                      </div>
                    </div>
					</div> 
                      <div class="control-group">
                      <label class="control-label" for="inputWarning">Código Producto: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese solo numeros para Codigo" data-rel="tooltip">
                    <input name="cod_material" type="text" class="input-xlarge focused" id="cod_material"  onKeyUp="this.value=this.value.toUpperCase();" size="30" placeholder="Ingrese Codigo de Producto" required="required"/>
                      </div>
                      </div>
					  </div>
                      <div class="control-group">
                      <label class="control-label" for="focusedInput">Descripción Producto: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese Descripcion del Producto" data-rel="tooltip">
               <input name="material" type="text" class="input-xlarge focused" id="material"  onKeyUp="this.value=this.value.toUpperCase();" size="30" autocomplete="off" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ().\s]+{3,100}" placeholder="Ingrese Descripcion Producto" required="required"/>
                      </div>
                      </div>
					  </div>
                     <div class="control-group">
                      <label class="control-label" for="inputWarning">Precio Compra Produc.: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese Precio Compra del Producto" data-rel="tooltip">
                     <span class="add-on">$</span><input name="precio_compra" type="text" id="precio_compra" class="input-xlarge focused" pattern="[0-9.]{2,10}" placeholder="Ingrese Precio Compra C/U" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();" required="required" />
                      </div>
                    </div>
					</div>
					<div class="control-group">
                      <label class="control-label" for="inputWarning">Precio Venta Produc.: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese Precio Venta del Producto" data-rel="tooltip">
                     <span class="add-on">$</span><input name="precio_venta" type="text" id="precio_venta" class="input-xlarge focused" pattern="[0-9.]{2,10}" placeholder="Ingrese Precio Venta C/U" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();" required="required" />
                      </div>
                    </div>
					</div>
                      <div class="control-group">
                      <label class="control-label" for="inputWarning">Cantidad Producto: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese solo numeros para Cantidad" data-rel="tooltip">
                         <input name="cantidad" type="text" class="input-xlarge focused" id="cantidad" autocomplete="off"  pattern="[0-9]{1,5}" placeholder="Ingrese Cantidad" required="required"/>
                      </div>
                    </div>
					</div>
					<div class="control-group">
                      <label class="control-label" for="inputWarning">Codigo de Barra: </label>
                      <div class="controls">
					  <div class="input-prepend" title="Ingrese Codigo de Barra" data-rel="tooltip">
                         <input name="codigo_barra" type="text" class="input-xlarge focused" id="codigo_barra" autocomplete="off"  pattern="[A-Z0-9- ]{7,50}"  placeholder="Ingrese Codigo de Barra" required="required"/>
                      </div>
                    </div>
					</div>
                      <div class="control-group">
                      <label class="control-label" for="inputWarning">Proveedor Producto: </label>
                      <div class="controls">
					  <div class="input-prepend" data-rel="tooltip">
                      <select name="rutprov" data-rel="chosen" id="rutprov" required="required">
                      <?php $sql=mysql_query("select * from proveedores") or die (mysql_error()); ?>
                      <option value="">SELECCIONE</option>
                      <?php
	while ($array=mysql_fetch_array($sql)) {
		?>
		
<option value="<?php echo $array['rutprov']; ?>" ><?php echo $array['nombreprov']; ?></option>			  
                      <?php 
	}
############################# FIN DE BUSQUEDA DE PROVEEDORES ######################################
?>
                </select>
                      </div>
                    </div>
					</div>
					<div class="control-group">
                      <label class="control-label" for="inputWarning">Foto Producto: </label>
                      <div class="controls">
					  <div class="input-prepend" data-rel="tooltip">
			<input type="file" class="input-file uniform_on" name="imagen" id="imagen"/>
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
