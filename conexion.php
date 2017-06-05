<?php
function Conectarse()
{
date_default_timezone_set("Chile/Continental");
$Hora = date('h:i:s');  
setlocale(LC_ALL,"es_ES@euro","es_ES","esp"); 
	   
	   $link=mysql_connect("localhost","root","");
  
        mysql_select_db("inventario",$link);
        return $link;
}
?>
