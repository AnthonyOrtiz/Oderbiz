<?php

session_start();

    
$cedula = $_SESSION['cedula'];


$fechaFinal = $_POST['fecha'];

$horaFinal  = $_POST['hora'];

require_once "../clases/horas.php";

$hora = new horas();
$_SESSION['estado'] = 1;
$resultado = $hora->guardarHoraEntrada($horaFinal,$fechaFinal,$cedula);


echo $resultado;

?>