<?php

require("Models/M_Register.php");

class C_Register {
    private $model;

    // Constructor para el controlador
    public function __construct() {
        $this->model = new M_Register(); // Instancia de la clase del modelo
    }

    // Método por defecto
    public function mostrarRegister($mensaje = '') {
        require("Views/Formularios/V_Register.php");
    }

    public function mostrarDatos() {
        require("Views/Formularios/V_Login.php");
    }

    // Método para registrar un usuario
    public function Registrar() {

        // Verifica si el formulario fue enviado
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // Recibir los datos del formulario
            $nombres = $_POST['nombres'];
            $apellidos = $_POST['apellidos'];
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];

            // Llama al modelo para registrar el usuario
            $resultado = $this->model->Registrar($nombres, $apellidos, $correo, $contrasena);

            // Mostrar mensaje según el resultado
            if (is_array($resultado)) {
                // Si se devuelve un array, el registro fue exitoso
                $_SESSION['user_id'] = $resultado['id'];
                $_SESSION['user_name'] = $resultado['nombres'];
                $_SESSION['user_lastname'] = $resultado['apellidos'];
                $_SESSION['user_email'] = $resultado['correo'];
                header("Location: index.php?controller=Datos&method=mostrarDatos");
                exit();
            } else if ($resultado == "correo_existente") {
                $mensaje = "Error: El correo ya está en uso.";
            } else if ($resultado == "error_interno") {
                $mensaje = "Error: Ocurrió un problema al registrar.";
            } else {
                $mensaje = "Error desconocido.";
            }
            

            // Mostrar la vista con el mensaje
            $this->mostrarRegister($mensaje);
        } else {
            // Si no se ha enviado el formulario, muestra la vista de registro sin mensaje
            $this->mostrarRegister();
        }
    } 
}

?>