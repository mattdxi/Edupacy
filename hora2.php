<?php
header("Content-Type: application/json");
$fechaconsulta = $_POST['fecha'];
//$fechaconsulta = '2017-03-08';

$entrada = '07:00:00';
$salida = '14:00:00';

/*$recesoSalida = '14:00:00';
$recesoEntrada = '16:00:00';*/

$intervalo = 30;
$hostname="localhost";
$username="root";
$password="";
$dbname="Municipio";

mysql_connect($hostname,$username, $password) or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.')</script></html>");
mysql_select_db($dbname);
$sql = 'SELECT * FROM cita WHERE fecha = "'.$fechaconsulta.'" ;';
$consulta=mysql_query($sql);
$Ocupado = array();
$num = mysql_num_rows($consulta);
while ($row = mysql_fetch_assoc($consulta)){
	$reservas = $row["hora"]; //OBTENGO LA HORAS HORAS RESERVADAS EN LA BASE DE DATOS
	$horaocupada = $reservas;
	list($Xhoras, $Xminutos, $Xsegundos) = explode(":", $horaocupada);
	
	$Ocupado[] = mktime($Xhoras, $Xminutos, $Xsegundos, 0, 0, 0);
}
$convierte = $intervalo * 60; // SE MULTIPLICA X 60 SEGUNDOS
list($EntradaHR, $EntradaMIN, $EntradaSEG) = explode(":", $entrada);
$horaEntrada = mktime($EntradaHR, $EntradaMIN, $EntradaSEG, 0, 0, 0);

list($SalidaHR, $SalidaMIN, $SalidaSEG) = explode(":", $salida);
$horaSalida = mktime($SalidaHR, $SalidaMIN, $SalidaSEG, 0, 0, 0);

//echo '<select name="select" id="select">';
$Horario = array();
$returnH = array();
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
		//echo '<option value="VALOR">'.date('H:i', $hora).'</option>';
	}

}
echo json_encode($returnH);
//echo '</select>';
?>