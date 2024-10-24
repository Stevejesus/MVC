<?php

require("Models/M_Confi.php");

class C_Confi {
    private $model;

    // Constructor
    public function __construct() {
        $this->model = new M_Confi(); // Instancia de la clase del modelo
    }

    // Metodo por defecto
    public function mostrarConfi($mensaje = "") {
        $id = $_SESSION['user_id']; // ID del usuario que debe estar en la sesión
        $usuario = $this->model->getUsuario($id); // Obtener los datos del usuario desde la base de datos
        
        require("Views/Formularios/V_Confi.php");
    }

    // Metodo para actualizar los datos del usuario
    public function actualizarDatos() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Recuperar el ID y otros datos del formulario
            $id = $_SESSION['user_id']; // Asegúrate de que el ID del usuario esté disponible en la sesión
            $nombre = $_POST['name'];
            $apellido = $_POST['lastname'];
            $correo = $_POST['email'];

            // Llama al modelo para actualizar los datos
            $resultado = $this->model->actualizarDatos($id, $nombre, $apellido, $correo);

            // Verifica el resultado y asigna el mensaje correspondiente
            if ($resultado == "actualizado") {
                $mensaje = "Success: Usuario actualizado correctamente.";
            } else if ($resultado == "no_actualizado") {
                $mensaje = "Error: No se pudo actualizar el usuario.";
            }

            // Llama al método para mostrar la vista con el mensaje
            $this->mostrarConfi($mensaje);
        }
    }
}

?>