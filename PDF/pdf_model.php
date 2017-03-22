<?php
require_once("./db.php");
class cita_model{
    private $db;
    private $cita;
    private $id_tramite;
    private $id_cita;
    private $requisitos;
    private $mensaje = array(
    "estado" => 0,
    "id_cita" => 0
    );
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->cita=array();
        $this->requisitos=array();
    }
    public function get_cita($id_cita){
        $id = mysqli_real_escape_string($this->db, $id_cita);
        $query ="select fecha,hora,tramite,nombres,apellidos,telefono, id_tramites from cita INNER join tramites ON tramites.id=cita.id_tramites where cita.id_cita={$id};";
        $consulta=$this->db->query($query);
        while($filas=$consulta->fetch_assoc()){
          $this->cita[]=$filas;
          $this->id_tramite = $filas['id_tramites'];
        }
        return $this->cita;
    }
    public function get_requisitos($id_tramite){
      $id = mysqli_real_escape_string($this->db, $id_tramite);
      $consulta=$this->db->query("select Descripcion from Req_tramite where id_tramite=".$id.";");
      while($filas=$consulta->fetch_assoc()){
          $this->requisitos[]=$filas;
      }
      mysqli_free_result($consulta);
      mysqli_close($this->db);
      return $this->requisitos;
    }
    public function get_id_tramite(){
      return $this->id_tramite;
    }
}
?>
