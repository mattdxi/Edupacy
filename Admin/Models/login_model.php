<?php
require_once("../db/db.php");
class login_model{
    private $db;
    private $usuario;
    private $mensaje = array(
    "success" => "0",
    "mensaje" => "Error al conectar con el servidor"
    );
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->usuario=array();
    }
    public function get_usuario($rfc_, $pass_){
        if (empty($rfc_) || empty($pass_)) {
          $this->mensaje['mensaje']='Error Ningun dato recibido';
            return $this->mensaje;
        }else{
            $rfc = mysqli_real_escape_string($this->db, $rfc_);
            $pass = mysqli_real_escape_string($this->db, $pass_);
            $consulta=$this->db->query("select *,(1) as success from usuario where rfc='{$rfc}' and password='{$pass}';");
            if($filas=$consulta->fetch_assoc()){
                $this->usuario[]=$filas;
            }
            if (!empty($this->usuario)) {
              return $this->usuario;
            }
            $this->mensaje['mensaje']='Ningun usuario coincide con los datos proporcionados';
            return $this->mensaje;
        }

    }
}
?>
