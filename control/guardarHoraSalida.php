<?php

session_start();

$cedula = $_SESSION['cedula'];
$desc = $_POST['parametro'];
$horaE = 0;
$minutosE = 0;
$horaS = 0;
$minutosS = 0;
$totalHoras = 0;
$totalMinutos = 0;
$salidaFinal = '';
 

$time = time() - (60 * 60 * 7);

$fechaactual = getdate($time);


$salida = $_POST['hora'];

require_once "../clases/horas.php";

$hora = new horas();

$horaE = new horas();
$he = $horaE->recupeHoraEn($cedula);


foreach ($he as $dato) {
	list($horaE,$minutosE) = explode(":",$dato->entrada);
}

list($horaS,$minutosS) = explode(":",$salida);

if ($horaE > $horaS) {
	$totalHoras = (24 - $horaE) + $horaS;
}else if ($horaE < $horaS) {
	$totalHoras = $horaS - $horaE; //flujo normal
}else if($horaE == $horaS){
	$totalHoras = 0;
}

if ($minutosE > $minutosS) {
	$totalMinutos = (60 - $minutosE) + $minutosS;
	if ($totalHoras != 0) {
		$totalHoras = $totalHoras - 1;
	}
}else if($minutosE < $minutosS){
	$totalMinutos = $minutosS - $minutosE;//flujo normal
}else if($minutosE == $minutosS){
	$totalMinutos = 0;
}

$aux = $totalHoras.':'.$totalMinutos;
$formato = strtotime($aux);

$totalFinal  = date("H:i",$formato);

$_SESSION['estado'] = 0;


$resultado = $hora->guardarHoraSalida($salida,$desc,$cedula,$totalFinal);


?>