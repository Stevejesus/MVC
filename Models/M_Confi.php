<?php

require_once("Models/Conexion.php");

class M_Confi {
    private $conn;

    // Constructor
    public function __construct() {
        $bd = new Conexion(); // Crear una nueva conexión
        $this->conn = $bd->getConnection(); // Obtener la conexión
    }

    // Método para obtener los datos del usuario
    public function getUsuario($id) {
        $query = "SELECT * FROM Usuarios WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id); // Vincula el parámetro ID
        $stmt->execute();
        $result = $stmt->get_result();
        
        return $result->fetch_assoc(); // Retorna los datos del usuario como un array asociativo
    }

    // Metodo para actualizar los datos del usuario
    public function actualizarDatos($id, $nombre, $apellido, $correo) {
        $query = "UPDATE Usuarios SET nombres = ?, apellidos = ?, correo = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssi", $nombre, $apellido, $correo, $id);
        
        if ($stmt->execute()) {
            return "actualizado";
        } else {
            return "no_actualizado";
        }
    }
}

?>