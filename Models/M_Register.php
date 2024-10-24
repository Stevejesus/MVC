<?php

require_once("Models/Conexion.php");

class M_Register {
    private $conn;

    // Constructor para la conexión a la base de datos
    public function __construct() {
        $bd = new Conexion(); // Crear una nueva conexión
        $this->conn = $bd->getConnection(); // Obtener la conexión
    }

    // Inserta un nuevo usuario si el correo no está registrado
    public function Registrar($nombres, $apellidos, $correo, $contrasena) {
        // Prepara la consulta
        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE correo = ?");
        // Vinculación del parámetro '?' 's'
        $stmt->bind_param('s', $correo);
        // Ejecución
        $stmt->execute();

        // Resultados
        $result = $stmt->get_result();

        // Verifica si el correo esta registrado = usuario existente
        if ($result->num_rows > 0) {
            return "correo_existente"; // El correo ya está en uso
        }

        // Hashear la contraseña antes de insertar
        $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);

        // Inserta el nuevo usuario
        $stmt = $this->conn->prepare("INSERT INTO usuarios (nombres, apellidos, correo, contrasena) VALUES (?, ?, ?, ?)");
        // Vincluación de los parametros
        $stmt->bind_param('ssss', $nombres, $apellidos, $correo, $hashed_password);
    
        // Ejecución
        if ($stmt->execute()) {
            // Obtén el ID del nuevo usuario
            $userId = $this->conn->insert_id; // Obtiene el ID de la última inserción

            // Retorna un array con los datos del nuevo usuario
            return [
                'id' => $userId,
                'nombres' => $nombres,
                'apellidos' => $apellidos,
                'correo' => $correo,
                'registro_exitoso' => true // Puedes añadir un indicador de éxito si lo deseas
            ];
            //return "registro_exitoso"; // Registro exitoso
        } else { 
            return "error_interno"; // Error interno con detalles
        }
    }    
}

?>