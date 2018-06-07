<?php

session_start();
require_once "../clases/horas.php";

$descripcion = $_POST['descripcion'];
$cedula = $_POST['cedula'];
$entrada = $_POST['horaEntrada'];
$salida = $_POST['horaSalida'];
$fecha = $_POST['fecha'];
$fechaTotal = '';
$dia = '';
$mes = '';
$anio = '';
$horaE = 0;
$minutosE = 0;
$horaS = 0;
$minutosS = 0;
$totalHoras = 0;
$totalMinutos = 0;
$horaFinal = '';



$hora = new horas();

list($anio,$mes,$dia) = explode("-",$fecha);
$fechaTotal = $dia."/".$mes."/".$anio;

list($horaE,$minutosE) = explode(":",$entrada);
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

$resultado = $hora->guardarHorasExtras($entrada,$salida,$fechaTotal,$descripcion,$cedula,$totalFinal);


?>