<?php
require_once("./db/db.php");
class cita_model{
    private $db;
    private $cita;
    private $id_cita;
    private $mensaje = array(
    "estado" => 0,
    "id_cita" => 0
    );
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->cita=array();
    }
    public function get_cita($id_cita){
        $id = mysqli_real_escape_string($this->db, $id_cita);
        $query ="select *, tramite from cita INNER join tramites ON tramites.id=cita.id_tramites where cita.id_cita={$id};";
        $consulta=$this->db->query($query);
        while($filas=$consulta->fetch_assoc()){
          $this->cita[]=$filas;
        }
        mysqli_free_result($consulta);
        mysqli_close($this->db);
        return $this->cita;
    }
    public function delete_cita($id_cita){
        $id = mysqli_real_escape_string($this->db, $id_cita);
        $consulta=$this->db->query("delete from cita where id_cita={$id};");
        if ($consulta->affected_rows > 0) {
          $this->mensaje['id_cita'] = $id_cita;
          $this->mensaje['estado'] = 1;
          return $this->mensaje;                 //si la consulta fue correcta nos devuelve 1
        }
        $this->mensaje['id_cita'] = $id_cita;
        $this->mensaje['estado'] = 0;
        return $this->mensaje;                //Si no, nos devuelve el valor 0
    }
}
?>
