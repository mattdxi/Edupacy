<?php
require_once("./db/db.php");
class tramites_model{
    private $db;
    private $tramites;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->tramites=array();
    }
    public function get_tramites(){
        $consulta=$this->db->query("select * from tramites;");
        while($filas=$consulta->fetch_assoc()){
            $this->tramites[]=$filas;
        }
        return $this->tramites;
    }
}
?>