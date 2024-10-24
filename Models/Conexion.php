<?php
    class Conexion {
        // Datos de la base de datos
        private $host = 'localhost';
        private $user = 'root';
        private $password = '';
        private $database = 'PHP-2';

        private $conn;

        // Constructor para establecer la conexión
        public function __construct() {
            $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database);

            // Manejo de posible error de conexion
            if ($this->conn->connect_error) {
                die("Error de conexión: " . $this->conn->connect_error);
            }
        }

        // Método para obtener la conexión
        public function getConnection() {
            return $this->conn;
        }
    }
?>