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
    public function set_cita($fecha_,$hora_, $id_tramite){
      $fecha= mysqli_real_escape_string($this->db, $fecha_);
      $hora= mysqli_real_escape_string($this->db, $hora_);
      $id= mysqli_real_escape_string($this->db, $id_);
      $query ="insert into cita (fecha, hora, id_tramitess)
              SELECT * FROM (SELECT '{$fecha}', '{$hora}', '{$id}') AS tmp
              WHERE NOT EXISTS (select id_cita,fecha, hora, nombre, especificacion from cita inner join tramites
          on cita.id_tramites = tramites.id INNER JOIN departamento on departamento.id_depa=tramites.id_departamento
          where departamento.id_depa=(SELECT tramites.id_departamento from tramites WHERE tramites.id={$id})
          and fecha='{$fecha}' and hora='{$hora}'
      ) LIMIT 1;";
      $consulta=$this->db->query($query);
      if ($consulta->affected_rows > 0) {
        $this->id_cita = $consulta->insert_id;
        mysqli_free_result($consulta);
        mysqli_close($this->db);
        return $this->id_cita;        //si la consulta fue correcta nos devuelve el id de la cita recien creada
      }
      mysqli_free_result($consulta);
      mysqli_close($this->db);
      return 0;                       //Si no, nos devuelve el valor 0
    }
    public function update_cita($id_cita, $nombres_, $apellidos_, $telefonos_){
      $id= mysqli_real_escape_string($this->db, $id_cita);
      $nombres= mysqli_real_escape_string($this->db, $nombres_);
      $apellidos= mysqli_real_escape_string($this->db, $apellidos_);
      $telefono= mysqli_real_escape_string($this->db, $telefonos_);
      $query = "update cita set nombres={$nombres}, apellidos={$apellidos}, telefono={$telefono}
      where id_cita={$id};";
      $consulta=$this->db->query($query);
      if ($consulta->affected_rows > 0) {
        mysqli_free_result($consulta);
        mysqli_close($this->db);
        return 1;        //si la consulta fue correcta nos devuelve 1
      }
      mysqli_free_result($consulta);
      mysqli_close($this->db);
      return 0;                       //Si no, nos devuelve el valor 0
    }
    public function update_cita2($id_cita, $nombres_, $apellidos_, $telefonos_, $fecha_,$hora_, $id_tramite){
      $fecha= mysqli_real_escape_string($this->db, $fecha_);
      $hora= mysqli_real_escape_string($this->db, $hora_);
      $id_tramite= mysqli_real_escape_string($this->db, $id_tramite);
      $id= mysqli_real_escape_string($this->db, $id_cita);
      $nombres= mysqli_real_escape_string($this->db, $nombres_);
      $apellidos= mysqli_real_escape_string($this->db, $apellidos_);
      $telefono= mysqli_real_escape_string($this->db, $telefonos_);
      $query = "update cita set nombres={$nombres}, apellidos={$apellidos}, telefono={$telefono}, fecha='{$fecha}',
      hora='{$hora}', id_tramite={$id_tramite} where id_cita={$id};";
      $consulta=$this->db->query($query);
      if ($consulta->affected_rows > 0) {
        mysqli_free_result($consulta);
        mysqli_close($this->db);
        return 1;                      //si la consulta fue correcta nos devuelve 1
      }
      mysqli_free_result($consulta);
      mysqli_close($this->db);
      return 0;                       //Si no, nos devuelve el valor 0
    }
    public function get_cita($id_cita){
        $id = mysqli_real_escape_string($this->db, $id_tramite);
        $consulta=$this->db->query("select * from cita where id_cita={$id};");
        while($filas=$consulta->fetch_assoc()){
          $this->cita[]=$filas;
        }
        mysqli_free_result($consulta);
        mysqli_close($this->db);
        return $this->cita;
    }
    public function delete_cita($id_cita){
        $id = mysqli_real_escape_string($this->db, $id_tramite);
        $consulta=$this->db->query("delete from cita where id_cita={$id};");
        if ($consulta->affected_rows > 0) {
          mysqli_free_result($consulta);
          mysqli_close($this->db);
          return 1;                 //si la consulta fue correcta nos devuelve 1
        }
        mysqli_free_result($consulta);
        mysqli_close($this->db);
        return 0;                 //Si no, nos devuelve el valor 0
    }
}
?>
