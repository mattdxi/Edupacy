<?php
//Obtenemos la fecha a evaluar
$fechaconsulta = $_POST['fecha'];
$id = $_POST['id'];
//Determinamos los horarios para poder sacar el intervalo de horarios
$entrada = '07:00:00';
$salida = '14:00:00';
$recesoSalida = '14:00:00';
$recesoEntrada = '16:00:00';
//Determinamos el intervalo de atencion para el tramite
$intervalo = 30;
require_once('../Models/hora_model.php');
//instancio la clase hora_model
$HORA = new hora_model();
//obtengo los horarios y el numero de estos
$Ocupado = $HORA->get_horarios($fechaconsulta, $id);
$num = $HORA->get_num_result();
//converto el intervalo a segundos
$convierte = $intervalo * 60;
//realizo la conversion de la hora de entrada y salida para poder compararlos
list($EntradaHR, $EntradaMIN, $EntradaSEG) = explode(":", $entrada);
$horaEntrada = mktime($EntradaHR, $EntradaMIN, $EntradaSEG, 0, 0, 0);

list($SalidaHR, $SalidaMIN, $SalidaSEG) = explode(":", $salida);
$horaSalida = mktime($SalidaHR, $SalidaMIN, $SalidaSEG, 0, 0, 0);
$Horario = array();
$returnH = array();
//realizamos la comparacion para poder descartar las horas ocupadas
for($i=$horaEntrada; $i<=$horaSalida ; $i+=$convierte ){
/*if ($i >= $horarioRecesoSalida and $i < $horarioRecesoEntrada){}
else */
	$Horario[]=$i;

}
foreach ($Horario as $hora) {
	$T=1;
	for ($a=0; $a < $num; $a++) {
		if ($hora == $Ocupado[$a]) {
			$T = 0;
		}
	}
	if ($T==1) {
		$returnH[] = date('H:i',$hora);
	}

}
require_once('../Views/hora_view.php');
?>
