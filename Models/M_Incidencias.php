<?php

require_once("Models/Conexion.php");

class M_Incidencias {
    private $conn;

    // Constructor
    public function __construct() {
        $bd = new Conexion(); // Crear una nueva conexión
        $this->conn = $bd->getConnection(); // Obtener la conexión
    }

    // Consulta para ontener TODAS las incidencias
    public function getIncidencias() {
        $query  = $this->conn->query("
            SELECT 
                Incidencias.*, 
                Usuarios.nombres AS nombre_usuario  -- Obteniendo el nombre del usuario
            FROM 
                Incidencias 
            JOIN 
                Usuarios ON Incidencias.usuario = Usuarios.id  -- Asegúrate de que este campo se llama 'usuario'
        "); // Consulta

        $retorno = []; // Respuesta

        $i = 0;
        while ($fila = $query->fetch_assoc()) {
            $retorno[$i] = $fila;
            $i++;
        }

        return $retorno;
    }

    // Método genérico para contar incidencias
    private function getTotalByCondition($column, $value) {
        $query = $this->conn->prepare("SELECT COUNT(*) AS total FROM Incidencias WHERE $column = ?");
        $query->bind_param("s", $value); 
        $query->execute();
        $result = $query->get_result();
        $retorno = $result->fetch_assoc();

        return $retorno['total'];
    }

    // Consulta para obtener el total de incidencias
    public function getTotalIncidencias() {
        return $this->getTotalByCondition('1', '1'); // Simplemente para obtener el total
    }

    // Consulta para obtener el total de incidencias Abiertas
    public function getTotalIncidenciasAbiertas() {
        return $this->getTotalByCondition('estado', 'Abierto');
    }

    // Consulta para obtener el total de incidencias En proceso
    public function getTotalIncidenciasEnProceso() {
        return $this->getTotalByCondition('estado', 'En progreso');
    }

    // Consulta para obtener el total de incidencias Cerradas
    public function getTotalIncidenciasCerradas() {
        return $this->getTotalByCondition('estado', 'Cerrado');
    }

    // Consulta para obtener el total de incidencias Altas
    public function getTotalIncidenciasAltas() {
        return $this->getTotalByCondition('prioridad', 'Alta');
    }

    // Consulta para obtener el total de incidencias Medias
    public function getTotalIncidenciasMedias() {
        return $this->getTotalByCondition('prioridad', 'Media');
    }

    // Consulta para obtener el total de incidencias Bajas
    public function getTotalIncidenciasBajas() {
        return $this->getTotalByCondition('prioridad', 'Baja');
    }
}

?>