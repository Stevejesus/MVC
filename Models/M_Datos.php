<?php

require_once("Models/Conexion.php");

class M_Datos {
    private $conn;

    // Constructor
    public function __construct() {
        $bd = new Conexion(); // Crear una nueva conexión
        $this->conn = $bd->getConnection(); // Obtener la conexión
    }
}

?>