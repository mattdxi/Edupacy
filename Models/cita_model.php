<?php
require_once("./db/db.php");
class cita_model{
    private $db;
    private $cita;
    private $horario
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->cita=array();
        $this->requisitos=array();
    }
    public function set_cita($id_tramite){
        
        /*if (!empty($id_tramite)) {
            return $this->mensaje;
        }else{*/
            $id = mysqli_real_escape_string($this->db, $id_tramite);
            $consulta=$this->db->query("select * from tramites where id=".$id.";");
            while($filas=$consulta->fetch_assoc()){
                $this->tramite[]=$filas;
            }
            return $this->tramite;
        //}
        
    }
    public function get_cita($id_tramite){
        $id = mysqli_real_escape_string($this->db, $id_tramite);
            $consulta=$this->db->query("select Descripcion from Req_tramite where id_tramite=".$id.";");
            while($filas=$consulta->fetch_assoc()){
                $this->requisitos[]=$filas;
            }
            return $this->requisitos;
    }
}
?>