<?php
require_once("./db/db.php");
class cita_model{
    private $db;
    private $cita;
    private $id_cita;
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->cita=array();
    }
    public function set_cita($fecha_,$hora_, $id_){
      $this->db=Conectar::conexion();
      $fecha= mysqli_real_escape_string($this->db, $fecha_);
      $hora= mysqli_real_escape_string($this->db, $hora_);
      $id= mysqli_real_escape_string($this->db, $id_);
      $query ="insert into cita (fecha, hora, id_tramite)"+
              "select * from (select '{$fecha}', '{$hora}', '{$id}') AS tmp"+
              "WHERE NOT EXISTS (SELECT fecha FROM cita WHERE fecha='{$fecha}' and hora='{$hora}' ) LIMIT 1;";
      $consulta=$this->db->query("insert into cita (fecha, hora, id_tramite) values({$fecha},{$hora},{$id});");
      mysqli_free_result($consulta);
      mysqli_close($this->db);
      return $consulta->insert_id;
    }
    public function update_cita($id_cita){

    }
    public function get_cita($id_cita){
        $id = mysqli_real_escape_string($this->db, $id_tramite);
        $consulta=$this->db->query("select * from cita where id_cita=".$id.";");
        while($filas=$consulta->fetch_assoc()){
          $this->cita[]=$filas;
        }
        mysqli_free_result($consulta);
        mysqli_close($this->db);
        return $this->cita;
    }
}
?>
