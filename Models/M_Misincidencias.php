<?php

require_once("Models/Conexion.php");

class M_Misincidencias {
    private $conn;

    // Constructor para la conexión a la base de datos
    public function __construct() {
        $bd = new Conexion(); // Crear una nueva conexión
        $this->conn = $bd->getConnection(); // Obtener la conexión
    }

    // Consulta para obtener mis incidencias con el mismo id
    public function getMisIncidencias($idUsuario) {

        // Mostrar las incidencias con el mismo id
        $stmt  = $this->conn->prepare("SELECT * FROM Incidencias WHERE usuario = ?");
        // Vincula el parametro
        $stmt->bind_param('s', $idUsuario);
        // Ejecucion
        $stmt->execute();

        // Resultado
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $retorno = [];

            $i = 0;
            while ($fila = $result->fetch_assoc()) {
                $retorno[$i] = $fila;
                $i++;
            }

            return $retorno;
        }
        else {
            return "misincidencias_no";
        }
    }

    // Metodo genérico para contar incidencias
    private function getTotalByCondition($idUsuario, $column, $value) {
        $query = $this->conn->prepare("SELECT COUNT(*) AS total FROM Incidencias WHERE usuario = ? AND $column = ?;");
        $query->bind_param("ss", $idUsuario, $value);
        $query->execute();
        $result = $query->get_result();
        $retorno = $result->fetch_assoc();

        return $retorno['total'];
    }

    // Consulta para obtener el total de incidencias
    public function getTotalMisIncidencias($idUsuario) {
        return $this->getTotalByCondition($idUsuario, '1', '1'); // Simplemente para obtener el total
    }

    // Consulta para obtener el total de incidencias Abiertas
    public function getTotalMisIncidenciasAbiertas($idUsuario) {
        return $this->getTotalByCondition($idUsuario, 'estado', 'Abierto');
    }

    // Consulta para obtener el total de incidencias En proceso
    public function getTotalMisIncidenciasEnProceso($idUsuario) {
        return $this->getTotalByCondition($idUsuario, 'estado', 'En progreso');
    }

    // Consulta para obtener el total de incidencias Cerradas
    public function getTotalMisIncidenciasCerradas($idUsuario) {
        return $this->getTotalByCondition($idUsuario, 'estado', 'Cerrado');
    }

    // Consulta para obtener el total de incidencias Altas
    public function getTotalMisIncidenciasAltas($idUsuario) {
        return $this->getTotalByCondition($idUsuario, 'prioridad', 'Alta');
    }

    // Consulta para obtener el total de incidencias Medias
    public function getTotalMisIncidenciasMedias($idUsuario) {
        return $this->getTotalByCondition($idUsuario, 'prioridad', 'Media');
    }

    // Consulta para obtener el total de incidencias Bajas
    public function getTotalMisIncidenciasBajas($idUsuario) {
        return $this->getTotalByCondition($idUsuario, 'prioridad', 'Baja');
    }

    public function getIncidenciaById($id) {
        $query = "SELECT * FROM Incidencias WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        // Retorna la incidencia si existe, de lo contrario retorna null
        return $result->fetch_assoc();
    }

    public function ActualizarIncidencia($id, $nombre, $estado, $prioridad, $fechaHora, $descripcion, $rutaFoto) {
        // Preparar la consulta SQL para actualizar la incidencia
        $query = "UPDATE Incidencias SET nombre = ?, estado = ?, prioridad = ?, fecha = ?, descripcion = ?, foto = ? WHERE id = ?";
    
        // Prepara la sentencia
        $stmt = $this->conn->prepare($query);
    
        // Vincula los parámetros
        $stmt->bind_param('ssssssi', $nombre, $estado, $prioridad, $fechaHora, $descripcion, $rutaFoto, $id);
    
        // Ejecutar la consulta
        if ($stmt->execute()) {
            return true; // Actualización exitosa
        } else {
            return false; // Error en la actualización
        }
    }

    public function eliminarIncidenciaPorId($id) {
        $sql = "DELETE FROM Incidencias WHERE id = ?";
        $stmt = $this->conn->prepare($sql); // Cambiado de $this->db a $this->conn
        $stmt->bind_param('i', $id); // Vinculamos el parámetro id como entero
        return $stmt->execute(); // Ejecuta la consulta
    }
}
?>