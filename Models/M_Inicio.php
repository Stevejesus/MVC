<?php

require_once("Models/Conexion.php");

class M_Inicio {
    private $conn;

    // Constructor
    public function __construct() {
        $bd = new Conexion(); // Crear una nueva conexión
        $this->conn = $bd->getConnection(); // Obtener la conexión
    }

    // Método para obtener los datos del usuario por ID
    public function getUsuarioById($id) {
        // Prepara la consulta para obtener los datos del usuario por su ID
        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->bind_param('i', $id); // Vincula el parámetro del id
        $stmt->execute(); // Ejecuta la consulta

        // Obtener el resultado y verificar si hay datos
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $usuario = $result->fetch_assoc(); // Asocia los datos en un array
            return $usuario;
        } else {
            return null; // Si no hay resultados, retorna null
        }
    }
}

?>