<?php
require_once("./db/db.php");
class tramite_model{
    private $db;
    private $tramite;
    private $requisitos;
    private $mensaje = array(
    "tramite" => "Ningun Tramite Seleccionado",
    "especificacion" => "Porfavor seleccione un tramite en la seccion de tramites",
    "estado" => "0"
    );
    private $mensaje2 = array("Descripcion" => "Ningun Tramite Seleccionado",
    );

    public function __construct(){
        $this->db=Conectar::conexion();
        $this->tramite=array();
        $this->requisitos=array();
    }
    public function get_tramite($id_tramite){
        if (empty($id_tramite)) {
            return $this->mensaje;
        }else{
            $id = mysqli_real_escape_string($this->db, $id_tramite);
            $consulta=$this->db->query("select * from tramites where id=".$id.";");
            while($filas=$consulta->fetch_assoc()){
                $this->tramite[]=$filas;
            }
            mysqli_free_result($consulta);
            mysqli_close($this->db);
            return $this->tramite;
        }

    }
    public function get_requisitos($id_tramite){
        $this->db=Conectar::conexion();
        if (empty($id_tramite)) {
            return $this->mensaje2;
        }else{
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
}
?>
