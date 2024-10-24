<?php

require("Models/M_Incidencias.php");

class C_Incidencias {
    private $model;

    // Constructor
    public function __construct() {
        $this->model = new M_Incidencias(); // Instancia de la clase del modelo
    }

    // Metodo por defecto
    public function mostrarIncidencias() {
        $incidencias = $this->model->getIncidencias(); // Obtiene las incidencias

        // Obtener el total de incidencias
        $total = $this->model->getTotalIncidencias(); 
        // Obtener el total de incidencias abiertas
        $totalAbiertas = $this->model->getTotalIncidenciasAbiertas(); 
        // Obtener el total de incidencias en progreso
        $totalEnProceso = $this->model->getTotalIncidenciasEnProceso(); 
        // Obtener el total de incidencias cerradas
        $totalCerradas = $this->model->getTotalIncidenciasCerradas(); 
        // Obtener el total de incidencias altas
        $totalAltas = $this->model->getTotalIncidenciasAltas(); 
        // Obtener el total de incidencias medias
        $totalMedias = $this->model->getTotalIncidenciasMedias(); 
        // Obtener el total de incidencias bajas
        $totalBajas = $this->model->getTotalIncidenciasBajas(); 

        require("Views/Formularios/V_Incidencias.php");
    }
}

?>