<?php

require("Models/M_Inicio.php");

class C_Inicio {
    private $model;

    // Constructor
    public function __construct() {
        $this->model = new M_Inicio(); // Instancia de la clase del modelo
    }

    // Metodo por defecto
    public function mostrarInicio($mensaje = '') {
        if (isset($_SESSION['login_message'])) {
            $mensaje = $_SESSION['login_message'];
            unset($_SESSION['login_message']); // Limpiar el mensaje después de mostrarlo
        }
        
        require("Views/Formularios/V_Inicio.php");
    }

    public function getUsuario($id) {
        // Llamar al método del modelo para obtener los datos del usuario
        $usuario = $this->model->getUsuarioById($id);
        
        // Verificar si se obtuvieron los datos del usuario
        if ($usuario) {
            // Almacenar los datos en la sesión
            $_SESSION['user_id'] = $usuario['id']; // Asegúrate de que el nombre de la columna sea correcto
            $_SESSION['user_name'] = $usuario['nombres'];
            $_SESSION['user_lastname'] = $usuario['apellidos'];
            $_SESSION['user_email'] = $usuario['correo'];
            $_SESSION['user_password'] = $usuario['contrasena'];
            $_SESSION['user_photo'] = $usuario['foto_url'];

            return true; // Retornar algún valor que indique éxito
        } else {
            // Si no se encuentra el usuario, manejar el error
            return null; // O podrías redirigir a la página de login
        }
    }

    // Metodo para Cerar la sesión
    public function cerrarSesion() {
        session_start(); // Inicia la sesión
        session_destroy(); // Destruye la sesión
        header("Location: index.php"); // Redirecciona al index 
    }
}

?>