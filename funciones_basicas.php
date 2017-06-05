<?php 
include_once('conexion.php');
conectarse();

## funcion para prevenir ataques XSS
function limpiar($tags){
$tags = strip_tags($tags);
$tags = stripslashes($tags);
$tags = htmlentities($tags);
return $tags;
}

function limpiarEntrada($texto) {
 
 	//creamos un arreglo que sirva de patrones para eliminar partes no deseadas en las cadenas
	$busqueda = array(
	'@<script[^>]*?>.*?</script>@si',   // quitar javascript
	'@<[\/\!]*?[^<>]*?>@si',            // quitar tags de HTML
	'@<style[^>]*?>.*?</style>@siU',    // quitar estilos
	'@<![\s\S]*?--[ \t\n\r]*>@'         // quitar comentarios multilínea
	);
 
 	//utilizamos la función preg_replace que busca en una cadena patrones para sustituir
    $salida = preg_replace($busqueda, '', $texto);
    //devolvemos la cadena sin los patrones encontrados
    return $salida;
}

function formatear($valor)
{
    $a = explode(".",$valor);
    $b = substr($a[1],0,2);
    $numero = $a[0].".".$b;
    
    return $numero;
}

function formatear2($number, $digitos)
{
    $raiz = 10;
    $multiplicador = pow ($raiz,$digitos);
    $resultado = ((int)($number * $multiplicador)) / $multiplicador;
    return number_format($resultado, $digitos, '.', '.');

}


function edad($fecha_nac){
//Esta funcion toma una fecha de nacimiento 
//desde una base de datos mysql
//en formato aaaa/mm/dd y calcula la edad en numeros enteros

$dia=date("j");
$mes=date("n");
$anno=date("Y");

//descomponer fecha de nacimiento
$dia_nac=substr($fecha_nac, 8, 2);
$mes_nac=substr($fecha_nac, 5, 2);
$anno_nac=substr($fecha_nac, 0, 4);


if($mes_nac>$mes){
$calc_edad= $anno-$anno_nac-1;
}else{
if($mes==$mes_nac AND $dia_nac>$dia){
$calc_edad= $anno-$anno_nac-1; 
}else{
$calc_edad= $anno-$anno_nac;
}
}
return $calc_edad;
} 
	function estado($muestra) {

	if($muestra == "admin") {
	echo "ADMINISTRADOR";
	} elseif ($muestra == "asist") {
	echo "ASISTENTE";	
	} 
	}

function convertir($string)
{

       $string = str_replace(
       array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'),
       array('ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', ' DICIEMBRE'),
       $string
   );        
   return $string;
}

function codigo($cod=''){
		if($cod == '')
		{
			return 'F000001';
		}else
		{
			$dig     = ((int)$cod + 1);
			$ceros   = (6 - strlen($dig));
			$new_cod = str_repeat("0",$ceros).$dig;
			
			return 'F'.$new_cod;
		}
	}	

?>

