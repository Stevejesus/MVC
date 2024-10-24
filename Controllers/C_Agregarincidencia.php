<?php

require("Models/M_Agregarincidencia.php");

class C_Agregarincidencia {
    private $model;

    // Constructor
    public function __construct() {
        $this->model = new M_Agregarincidencia(); // Instancia de la clase del modelo
    }

    // Metodo por defecto
    public function mostrarAgregarincidencia($mensaje = "") {
        require("Views/Formularios/V_Agregarincidencia.php");
    }

    // Metodo para agregar la incidencia
    public function agregarIncidencia() {

        // Verifica si el formulario fue enviado
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Recibir los datos del formulario
            $usuarioId = $_SESSION['user_id']; // Obtener el ID del usuario de la sesión
            $nombre = $_POST['nombre'];
            $prioridad = $_POST['prioridad'];
            $descripcion = $_POST['descripcion'];
            $estado = $_POST['estado'];

            // Verifica y obtiene la fecha
            $fecha = $_POST['fechaHora'] ?? null; 
            $fechaHora = null; // Inicializa la variable de fecha

            if ($fecha) {
                try {
                    $fechaHora = DateTime::createFromFormat('Y-m-d\TH:i', $fecha);
                    if ($fechaHora === false) {
                        throw new Exception("Fecha no válida");
                    }
                } catch (Exception $e) {
                    echo "Error: " . $e->getMessage();
                    // Manejar la situación de error
                }
            }
            
            if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
                $foto = $_FILES['foto']['name'];
                $ruta = $_FILES['foto']['tmp_name'];
                $destino = "Uploads/" . $foto; // Ruta relativa al directorio actual
                
                // Verifica el contenido antes de mover
                var_dump($foto, $ruta);

                // Mover el archivo solo si no ocurre error en la subida
                if (move_uploaded_file($ruta, $destino)) {
                    // Archivo movido correctamente
                    echo "Archivo subido correctamente.";
                } else {
                    echo "Error: No se pudo mover el archivo a su ubicación final.";
                    return;
                }
            } else {
                echo "Error: No se subió ningún archivo o hubo un error en la subida.";

                $foto = null; // Si no se subió la foto o hay error, lo dejamos como null o gestionarlo de alguna forma
            }

            /*
            $foto = $_FILES['foto']['name']; 
            $ruta = $_FILES['foto']['tmp_name']; 
            $destino = "/Applications/XAMPP/xamppfiles/htdocs/php/MVC/Uploads/".$foto;
            move_uploaded_file($ruta, $destino);     */       

            // Llama al metodo
            $resultado = $this->model->agregarIncidencia($usuarioId, $nombre, $prioridad, $descripcion, $fecha, $estado, $destino);

            switch ($resultado) {
                case "incidencia_agregada":
                    $mensaje = "Incidencia agregada exitosamente";
                    break;
                case "error":
                    $mensaje = "Error: Al agregar la incidencia";
                    break;
                default:
                    $mensaje = "Error desconocido.";
                    break;
            }

            // Mostrar la vista de registro con el mensaje de error
            $this->mostrarAgregarIncidencia($mensaje);
        } else {
            // Si no se ha enviado el formulario, muestra la vista de registro sin mensaje
            $this->mostrarAgregarIncidencia();
        }
    }
}

?>