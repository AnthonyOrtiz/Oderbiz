<?php

session_start();

?>



<?php

$cedula = $_SESSION['cedula'];

$time = time() - (60 * 60 * 7);

$fechaactual = getdate($time);

$entrada = $fechaactual['hours'].":".$fechaactual['minutes'];
$fecha = $fechaactual['mday']."/".$fechaactual['mon']."/".$fechaactual['year'];

$formato = strtotime($fecha);
$fechaFinal  = date("m/d/Y",$formato);

$formato = strtotime($entrada);
$horaFinal  = date("H:i",$formato);

require_once "../clases/horas.php";

$hora = new horas();
$_SESSION['estado'] = 1;
$resultado = $hora->guardarHoraEntrada($horaFinal,$fechaFinal,$cedula);

echo $resultado;
?>