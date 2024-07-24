<?php
class BaseDatos
{
    private $servidor = 'localhost';
    private $usuario = 'jhonyeclasespiti_root';
    private $contrasena = '}b4hG6GLy4KH';
    private $bd = 'jhonyeclasespiti_choki';
    private $conexion;
    
    public function getConectarBD()
    {
        
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        try {
            $this->conexion = new mysqli($this->servidor, $this->usuario, $this->contrasena, $this->bd);

            if ($this->conexion->connect_errno) {
                
                throw new Exception("Error al conectar a la base de datos MySQL/MariaDB: " . $this->conexion->connect_error);
            } else {
                return $this->conexion;
            }
        } catch (Exception $err) {
            
            echo json_encode(array("error" => "Error al conectar al servidor de BD: " . $err->getMessage()));
        }
    }

    public function cerrarConexion()
    {
        if ($this->conexion instanceof mysqli) {
            $this->conexion->close();
            $this->conexion = null;
        }
    }
}


?>
