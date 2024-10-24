<?php

require("Models/M_Misincidencias.php");

class C_Misincidencias {
    private $model;

    // Constructor
    public function __construct() {
        $this->model = new M_Misincidencias(); // Instancia de la clase del modelo
    }

    public function mostrarMisincidencias() {
        $usuarioId = $_SESSION['user_id']; // Obtener el ID del usuario de la sesión

        $datosIncidencias = $this->model->getMisIncidencias($usuarioId);

        // Obtener el total de incidencias
        $total = $this->model->getTotalMisIncidencias($usuarioId); 
        // Obtener el total de incidencias abiertas
        $totalAbiertas = $this->model->getTotalMisIncidenciasAbiertas($usuarioId); 
        // Obtener el total de incidencias en progreso
        $totalEnProceso = $this->model->getTotalMisIncidenciasEnProceso($usuarioId);
        // Obtener el total de incidencias cerradas
        $totalCerradas = $this->model->getTotalMisIncidenciasCerradas($usuarioId);
        // Obtener el total de incidencias altas
        $totalAltas = $this->model->getTotalMisIncidenciasAltas($usuarioId);
        // Obtener el total de incidencias medias
        $totalMedias = $this->model->getTotalMisIncidenciasMedias($usuarioId);
        // Obtener el total de incidencias bajas
        $totalBajas = $this->model->getTotalMisIncidenciasBajas($usuarioId);

        // Pasa las incidencias a la vista
        require('Views/Formularios/V_Misincidencias.php');
    }

    // Metodo para mostrar editar las incidencias
    public function mostrarEditar() {
        // Verifica si se ha enviado el ID
        if (isset($_POST['id'])) { // Cambia a $_GET si cambias el método a GET
            $id = $_POST['id']; // Usa $_GET si usas el método GET

            // Llama al modelo para obtener la incidencia por ID
            $incidencia = $this->model->getIncidenciaById($id); 

            // Verifica si se encontró la incidencia
            if ($incidencia) {
                // Pasa los datos a la vista
                require('Views/Formularios/V_Editar.php'); 
            } else {
                echo "Incidencia no encontrada.";
            }
        } else {
            echo "No se proporcionó un ID.";
        }
    }

    public function guardarCambios() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Recuperar el ID y otros datos del formulario
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $estado = $_POST['estado'];
            $prioridad = $_POST['prioridad'];
            $fechaHora = $_POST['fechaHora'];
            $descripcion = $_POST['descripcion'];
    
            // Manejo del archivo
            $rutaExistente = $_POST['foto_existente']; // Ruta del archivo existente
            $rutaNueva = ''; // Inicializa la ruta del nuevo archivo
    
            // Verifica si se subió un nuevo archivo
            if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
                $rutaNueva = 'Uploads/' . $_FILES['foto']['name']; // Asegúrate de que la ruta incluya "Uploads/"

                // Mover el archivo a la nueva ubicación
                if (move_uploaded_file($_FILES['foto']['tmp_name'], $rutaNueva)) {
                    // Archivo movido correctamente
                } else {
                    // Manejar el error de movimiento
                    echo "Error al mover el archivo.";
                    return; // Detener el proceso si hay un error
                }
            } else {
                // Si no se subió un nuevo archivo, mantén la ruta existente
                $rutaNueva = $rutaExistente;
            }
    
            // Llama al método para actualizar la incidencia en la base de datos
            $resultado = $this->model->ActualizarIncidencia($id, $nombre, $estado, $prioridad, $fechaHora, $descripcion, $rutaNueva);
    
            if ($resultado) {
                // Redirigir o mostrar mensaje de éxito
                header("Location: index.php?controller=Misincidencias&method=mostrarMisincidencias");
                exit();
            } else {
                // Manejar el error
                echo "Error al actualizar la incidencia.";
            }

            header("Location: index.php?controller=Misincidencias&method=mostrarMisincidencias");
        }
    }

    public function eliminarIncidencia() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
    
            // Llamar al modelo para eliminar la incidencia
            $resultado = $this->model->eliminarIncidenciaPorId($id);
    
            if ($resultado) {
                // Redirigir a la página principal con un mensaje de éxito
                header("Location: index.php?controller=Misincidencias&method=mostrarMisincidencias&status=deleted");
                exit();
            } else {
                // Manejar el error, por ejemplo redirigir con un mensaje de error
                echo "Error al eliminar la incidencia.";
            }
        }
    }
}
?>