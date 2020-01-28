<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);


//error_reporting(0);
date_default_timezone_set("America/Mexico_City");

if (!isset($link)) {$link = false;}

// getMyConection()
function getMyConection($conexion) {
	global $link;
	
	$db_host = "localhost";
	$db_name = "segurose_containerallrisk_app";
	$db_user = "segurose_admin";
	$db_pass = "Esquivel.12345.10$";

	$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die("No se pudo conectar a la base de datos!!...");
	
    return $link;
	

}

// closeConection()
function closeConection(){
	global $link;
	if($link != false)
	{
		mysqli_close($link);
	}
	else
	{
		$link = false;
	}
}

// Muestra la cantidad de registros($result)
function CantidadRegistros($result)
{
	return mysqli_num_rows($result);
}

// query($query)
function query($query, $conexion=0)
{
	return mysqli_query(getMyConection($conexion), $query);
}

function sql_special_chars($string)
{
	$string = str_replace("\'", "'", $string);
	$string = str_replace("'", "''", $string);
	$string = htmlspecialchars($string);
	return $string;
}

//obtiene la fecha de formato largo por ejemplo: Jueves, 17 de Mayo de 2012
function longDateFormat()
{
	setlocale(LC_TIME, 'es_MX');
	
	$day = strftime('%e', mktime(0,0,0,date("m"),date("d"),date("Y")));
	$weekday = strftime('%A', mktime(0,0,0,date("m"),date("d"),date("Y")));
	$monthname = strftime('%B', mktime(0,0,0,date("m"),date("d"),date("Y")));
	$year = strftime('%Y', mktime(0,0,0,date("m"),date("d"),date("Y")));
  
	$fecha = "<p>" . ucfirst($weekday) . ", " . $day . " de " . ucfirst($monthname) . " de " . $year . "</p>";
	
	return $fecha;
}

//Genera aleatoriamente una cadena de 12 caracteres (por default) con letras minusculas, mayusculas y numeros
//Esta funcion es usada para renovar la contraseña una vez que el usuario perdió la suya
function randomPassword($numberOfCharacters=12) {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < $numberOfCharacters; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
?>
