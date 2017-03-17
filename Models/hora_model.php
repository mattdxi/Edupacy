<?php
require_once("../db/db.php");
class hora_model{
    private $db;
    private $horarios;
    private $numero_result=0;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->horarios=array();
    }
    public function get_horarios($fechaconsulta){
        $fecha = mysqli_real_escape_string($this->db, $fechaconsulta);
        $consulta=$this->db->query("select * from cita WHERE fecha='".$fecha."';");
        while($filas=$consulta->fetch_assoc()){
        	$reservas = $filas["hora"]; //OBTENGO LA HORAS HORAS RESERVADAS EN LA BASE DE DATOS
			$horaocupada = $reservas;
			list($Xhoras, $Xminutos, $Xsegundos) = explode(":", $horaocupada);
            $this->horarios[]=mktime($Xhoras, $Xminutos, $Xsegundos, 0, 0, 0);
        }
        $this->numero_result = $consulta->num_rows;
        return $this->horarios;
    }
    public function get_num_result(){
    	return $this->numero_result;
    }
}
?>