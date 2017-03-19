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
    public function get_horarios($fechaconsulta, $id_tramite){
        $fecha = mysqli_real_escape_string($this->db, $fechaconsulta);
        $id = mysqli_real_escape_string($this->db, $id_tramite);
        $query = "select id_cita, hora, nombre from cita inner join tramites
        on cita.id_tramites = tramites.id INNER JOIN departamento on departamento.id_depa=tramites.id_departamento
        where departamento.id_depa=(SELECT tramites.id_departamento from tramites WHERE tramites.id={$id}) and fecha='{$fecha}';";
        $consulta=$this->db->query($query);
        //$consulta=$this->db->query("select * from cita WHERE fecha='".$fecha."';");
        while($filas=$consulta->fetch_assoc()){
        	$reservas = $filas["hora"]; //OBTENGO LA HORAS HORAS RESERVADAS EN LA BASE DE DATOS
  			$horaocupada = $reservas;
  			list($Xhoras, $Xminutos, $Xsegundos) = explode(":", $horaocupada);
            $this->horarios[]=mktime($Xhoras, $Xminutos, $Xsegundos, 0, 0, 0);
        }
        $this->numero_result = $consulta->num_rows;
        mysqli_free_result($consulta);
        mysqli_close($this->db);
        return $this->horarios;
    }
    public function get_num_result(){
    	return $this->numero_result;
    }
}
?>
