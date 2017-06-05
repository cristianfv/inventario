<?php
session_start();
 			 
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sitema de Inventario CFV Familiar</title>  
</head>
<body>

    <?php
	//muestro un mensaje de exito
	//$resultado = "Valido!!";
	//aqui se declaran las variables que vienen del formulario
    $user=$_POST['usuario'];
    $pass=sha1($_POST["password"]);
    /* Asignamos a las variables $user y $pass los valores �usuario� y �clave� recogidos de nuestro formulario de ingreso de la p�gina HTML. */
    if(empty($user))
    {
	
	   ?>
<script type='text/javascript' language='javascript'>
	    alert('ERROR! NO HA INGRESADO UN NOMBRE DE USUARIO')
		document.location.href='index.php?falla=1'	 
        </script> 
		<?php
		
	unset($_SESSION["falla"]);

    session_destroy();	
		
    }
    /* Utilizaremos la funci�n empty de PHP mediante la cual preguntaremos si nuestra variable $user (la que contiene el valor de usuario del formulario) se encuentra vacia, lo que significar�a que el usuario no ingreso nada en el campo. Si este fuera el caso, desplegar�amos un mensaje en la p�gina con �echo� y luego cambiariamos el valor de nuestra variable �falla� (la bandera definida en el vector de sesi�n) a 1. En caso de que el usuario no este vac�o, pasamos al else y revisamos lo dem�s */
    else
    {
    if(empty($pass))
    {
	?>
<script type='text/javascript' language='javascript'>
	    alert('ERROR! NO HA INGRESADO UNA CLAVE DE ACCESO')
		document.location.href='index.php?falla=1'	 
        </script> 
		<?php
		
	unset($_SESSION["falla"]);

    session_destroy();	
		
    }
    /* Haremos la misma comprobaci�n anterior pero en este caso con la variable $pass (que almacena el valor de clave del formulario). En caso de que no este vac�a, pasamos al else */
    else
    {	
	include("conexion.php");
	Conectarse();
	
	require_once("logs.php");
    
    $sql="SELECT * FROM usuarios where usuario = '".mysql_real_escape_string($user)."'";
    /* Definimos una variable $sql , la cual guardar� la consulta que haremos en la base de datos. En este caso, pediremos seleccionar el usuario, la clave y el nombre correspondientes al registro del usuario que se ingres� mediante el formulario */
    $resultado=mysql_query($sql);
    /* Definimos una variable llamada $resultado en la cual almacenaremos, valga la redundancia, el resultado de la ejecuci�n de nuestra consulta mediante la funci�n mysql_query, la cual requiere de 2 parametros: la consulta recien definida, y el identificador de conexi�n que definimos anteriormente. */
    if(!$resultado)
    {
    $error=mysql_error();
    print error_reporting(0);
	
    $_SESSION["falla"]=1;
	
			?>
			<script type='text/javascript' language='javascript'>
            document.location.href='index.php?falla=1'	 
            </script> 	  
            <?php
	
	unset($_SESSION["falla"]);

    session_destroy();		
		
    exit();
    }
    /* Luego preguntamos mediante un if si no hubo resultado a la ejecuci�n de la consulta y almacenamos en la variable $error la falla otorgada por la base de datos para presentarla en la p�gina mediante la sentencia print (que es similar a �echo�) y cambiamos el valor de la variable �falla� de nuestro vector de sesi�n. Finalmente hacemos uso de la funci�n exit(); para que nuestro c�digo termine de ejecutarse aqu� y no sigan corriendo las lineas siguientes. Este paso puede obviarse ya que a los usuarios no es necesario enseñarles el error que nos da la base de datos, yo decido incluirlo para que uds. puedan probar e informarse de las distintas razones por las que puede haber una falla en este proceso. */
    if(mysql_affected_rows()==0)
    {
   ?>
<script type='text/javascript' language='javascript'>
	    alert('ERROR! ESTE USUARIO NO SE ENCUENTRA REGISTRADO')
		document.location.href='index.php?falla=1'	 
        </script> 
		<?php
	unset($_SESSION["falla"]);

    session_destroy();
		
    exit();
    }
    /* Luego mediante otro if , hacemos un llamado a la funcion mysql_affected_rows() la cual se encarga de notificar si es que la consulta no afecto a ninguna fila de nuestra tabla (o sea, no hubo coincidencias), esta funcion retorna un entero, que es 0 en caso de no haber filas afectadas. En caso de que asi sea desplegamos un mensaje informando que el usuario no fue encontrado mediante la sentencia �echo�, cambiamos el valor de la variable falla del vector de sesion y finalmente salimos del codigo mediante la funcion exit();. Si el resultado de la funci�n no es cero, significa que hubo coincidencias y pasamos al else */
    else
    {
    $row=mysql_fetch_array($resultado);
    /* Definimos una variable $row y a esta le asignamos el resultado de la funcion mysql_fetch_array, la que utiliza como parametro $resultado (el resultado de la consulta ejecutada). Este paso es necesario, ya que cuando hacemos una consulta sobre una tabla de una base de datos, en caso de haber coincidencia, estos datos no estan disponibles para que nosotros los podamos manipular, si no que se seleccionan de forma �virtual�. Normalmente las bases de datos definen cursores, los cuales al hacer un fetch, extraen los datos y nos permiten manipularlos de una forma mas �fisica� por decirlo de alguna forma. En este caso, la variable $row se transformar� en un vector, con posiciones de nombre igual a cada uno de los campos de la fila, los cuales podremos comparar. */

    /* Definimos una variable $nombre y a este le asignamos el valor de la posici�n �nombre� del vector $row, o sea, el campo nombre extraido de la coincidencia de la tabla usuario */
    if($user==$row['usuario'])
    {
    if($pass==$row['password'])
    {
		
	$_SESSION["usuario"]=$user;
	$_SESSION["cedula"]=$row['cedula'];
	$_SESSION["nombre"]=$row['nombre'];
	$_SESSION["nivel"]=$row['nivel'];

	
	if ($_SESSION['nivel']=='ADMINISTRADOR') {
    
	$_SESSION["acceso"]="admin";
	
	?>
			<script type='text/javascript' language='javascript'>
            document.location.href='admin.php'	 
            </script> 	  
            <?php 
			
	} elseif ($_SESSION['nivel']=='ASISTENTE') {
		
		$_SESSION["acceso"]="asist";
	
	?>
			<script type='text/javascript' language='javascript'>
            document.location.href='admin.php'	 
            </script> 	  
            <?php 
				
	}
		
    }
    else
    {
	?>
<script type='text/javascript' language='javascript'>
	    alert('HAY UN ERROR EN EL USUARIO O CLAVE, VERIFIQUE NUEVAMENTE')
		document.location.href='index.php?falla=1'	 
        </script> 
		<?php
	unset($_SESSION["falla"]);

    session_destroy();
    }
    }
    else
    {
	?>
<script type='text/javascript' language='javascript'>
	    alert('HAY UN ERROR EN EL USUARIO O CLAVE, VERIFIQUE NUEVAMENTE')
		document.location.href='index.php?falla=1'	 
        </script> 
		<?php
	unset($_SESSION["falla"]);

    session_destroy();	
    }
    /* Y Finalmente mediante una serie de if y else, comparamos los valores recibidos por el formulario (almacenados en las variables $user y $pass) con los extraidos de la fila de la tabla de la base de datos (almacenados en el vector $row). En caso de coincidir el nombre de usuario y la contraseña, desplegamos un mensaje dandole la bienvenida al usuario con una sentencia echo (al usar el mensaje con la variable $nombre, dejamos definido un mensaje que cambiar� dependiendo del nombre de cada usuario que entre) y le informaremos que ser� redirigido, para finalmente registrar en el vector de sesion el nombre del usuario, en caso de que necesitemos usarlo mas adelante. De lo contrario mostraremos los correspondientes mensajes de error y marcaremos la variable falla para mas adelante. */
    }
    } 
	} ?>	 
</body>
</html>

