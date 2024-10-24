<?php

require("Models/M_Datos.php");

class C_Datos {
    private $model;

    // Constructor para el controlador
    public function __construct() {
        $this->model = new M_Datos(); // Instancia de la clase del modelo
    }

    // Método por defecto
    public function mostrarDatos() {
        $mensaje = ''; // Inicializar mensaje vacío
        if (isset($_SESSION['register_message'])) {
            $mensaje = $_SESSION['register_message'];
            unset($_SESSION['register_message']); // Limpiar el mensaje después de mostrarlo
        }

        require("Views/Formularios/V_Datos.php");
    }
}

?>