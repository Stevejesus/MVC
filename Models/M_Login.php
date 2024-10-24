<?php

require_once("Models/Conexion.php");

class M_Login {
    private $conn;

    // Constructor para la conexión a la base de datos
    public function __construct() {
        $bd = new Conexion(); // Crear una nueva conexión
        $this->conn = $bd->getConnection(); // Obtener la conexión
    }

    // Verifica si el usuario y la contraseña son correctos
    public function VerifLogin($correo, $contrasena) {
        // Prepara la consulta
        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE correo = ?");
        // Vinculación del parámetro '?' 's'
        $stmt->bind_param('s', $correo);
        // Ejecución
        $stmt->execute();

        // Obtiene los resultados
        $result = $stmt->get_result(); // Resultados
        $correo = $result->fetch_assoc(); // Asociacion de resultados

        // Verifica si el correo esta registrado = usuario existe
        if (!$correo) {
            // Usuario no encontrado
            return "usuario_no_encontrado";
        }

        // Verifica si la contraseña es correcta
        if (password_verify($contrasena, $correo['contrasena'])) {
            return $correo; // Usuario y Contraseña correctos
        }
        else {
            return "contraseña_incorrecta"; // Usuario encontrado, pero contraseña incorrecta
        }
    }    
}

?>