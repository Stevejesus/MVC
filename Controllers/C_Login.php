<?php

require("Models/M_Login.php"); // Incluye el Model

class C_Login {
    private $model;

    // Constructor para el controlador
    public function __construct() {
        $this->model = new M_Login(); // Instancia de la clase del modelo
    }

    // Método por defecto
    public function mostrarLogin($mensaje = '') {
        require("Views/Formularios/V_Login.php");
    }

    // Método para verificar las credenciales
    public function VerifLogin() {

        // Verifica si el formulario fue enviado
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // Recibir los datos del formulario
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];

            // Verificar las credenciales
            $loginResult = $this->model->VerifLogin($correo, $contrasena);

            // Inicializar el mensaje de error como vacío
            $mensaje = '';

            // Verificar el resultado y mostrar mensajes apropiados
            if ($loginResult == "usuario_no_encontrado") {
                $mensaje = "Error: Usuario no encontrado";
            } else if ($loginResult == "contraseña_incorrecta") {
                $mensaje = "Error: Contraseña incorrecta";
            } else if (is_array($loginResult)) {
                // Credenciales correctas, iniciar sesión
                $_SESSION['user_id'] = $loginResult['id'];
                $_SESSION['login_message'] = "Sesión iniciada exitosamente"; // Guardar mensaje en sesión

                // Obtener todos los datos del usuario y almacenarlos en la sesión
                $C_Inicio = new C_Inicio();
                if ($C_Inicio->getUsuario($_SESSION['user_id'])) {
                    // Si se obtuvieron y almacenaron los datos correctamente
                    header("Location: index.php?controller=Inicio&method=mostrarInicio"); // Cambia esto a tu página principal
                    exit();
                } else {
                    // Manejar el error si no se pudo obtener el usuario
                    $mensaje = "Error: No se pudo obtener los datos del usuario.";
                }
            } else {
                // Error inesperado
                $mensaje = "Error: Ocurrió un problema inesperado";
            }

            // Mostar la vista del login con el mensaje de error
            $this->mostrarLogin($mensaje);
        } else {
            // Si no se ha enviado el formulario, muestra la vista de login sin mensaje
            $this->mostrarLogin();
        }
    }
}

?>