<?php 
$ip = $_SERVER['REMOTE_ADDR']; //Aqui capturamos la IP del Host utilizado
$paginas = $_SERVER['PHP_SELF'];
$detalles = $_SERVER['HTTP_USER_AGENT'];
$password = md5($_POST["password"]); // ESTA ES EL CAMPO UNA VEZ PASADO LA VARIABLE DE SESION CONTRASEÑA O PASSWORD
$usuario = $_POST["usuario"];   // ESTA ES EL CAMPO UNA VEZ PASADO LA VARIABLE DE SESION USUARIO                                 
?>
<?php
date_default_timezone_set('Chile/Continental');
$tiempo=date("Y-m-d h:i:s");
?>
 <?php	
 if ($password ==Null )
			{
			return;
			}
elseif ($usuario ==Null ){
			 return;
			}	

   
 mysql_query("INSERT INTO log (ip, tiempo, detalles, paginas, usuario) VALUES ('" . $ip . "','" . $tiempo . "','" . $detalles . "','" . $paginas . "','" . $usuario . "')") or die(mysql_error());
	          


?>
