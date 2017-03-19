<?php
require_once("./db/db.php");
class cita_model{
    private $db;
    private $cita;

    public function __construct(){
        $this->db=Conectar::conexion();
        $this->cita=array();
    }
    public function set_cita(){
      $this->db=Conectar::conexion();
      $id = mysqli_real_escape_string($this->db, $id_tramite);
      $consulta=$this->db->query("select * from tramites where id=".$id.";");
      while($filas=$consulta->fetch_assoc()){
        $this->tramite[]=$filas;
      }
      mysqli_free_result($consulta);
      mysqli_close($this->db);
      return $this->tramite;
    }
    public function update_cita($id_cita){

    }
    public function get_cita($id_cita){
        $id = mysqli_real_escape_string($this->db, $id_tramite);
        $consulta=$this->db->query("select Descripcion from Req_tramite where id_tramite=".$id.";");
        while($filas=$consulta->fetch_assoc()){
          $this->requisitos[]=$filas;
        }
        mysqli_free_result($consulta);
        mysqli_close($this->db);
        return $this->requisitos;
    }
}
?>
