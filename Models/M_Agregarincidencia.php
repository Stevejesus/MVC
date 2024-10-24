<?php

require_once("Models/Conexion.php");

class M_Agregarincidencia {
    private $conn; 

    // Constructor
    public function __construct() {
        $bd = new Conexion(); // Crear una nueva conexión
        $this->conn = $bd->getConnection(); // Obtener la conexión
    }

    public function agregarIncidencia($usuarioId, $nombre, $prioridad, $descripcion, $fecha, $estado, $destino) {
        // Preparar la consulta para la inyección SQL
        $query = "INSERT INTO Incidencias ( usuario, nombre, prioridad, descripcion, fecha, estado, foto) VALUES (?, ?, ?, ?, ?, ?, ?)";

        // Prepara la sentencia 
        $stmt = $this->conn->prepare($query);

        // Vincula los parámetros
        $stmt->bind_param('issssss', $usuarioId, $nombre, $prioridad, $descripcion, $fecha, $estado, $destino);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            return "incidencia_agregada"; // Inserción exitosa
        } else {
            return "error"; // Error en la inserción
        }
    }

}

?>