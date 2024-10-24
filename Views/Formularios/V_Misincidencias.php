<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Incidencias</title>

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Body -->
    <style>
        *{
            font-family: 'Poppins', 'sans-serif';
        }
    </style>

    <style>
        #datatablesSimple thead th {
            background-color: #007bff;
            color: white;

            text-align: center; /* Centra el texto horizontalmente */

        }
    </style>

    <style>
        .btn-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
        }
        .btn-eliminar, .btn-editar {
            width: 100%; /* Para que todos los inputs ocupen el ancho completo */
            padding: 5px; /* Espacio interno en los inputs */
            border: 1px solid #ccc; /* Color del borde */
            border-radius: 5px; /* Bordes redondeados */
            margin-bottom: 5px;
        }

        .btn-eliminar {
            background-color: #FF0000; /* Color de fondo del botón */
            color: white; /* Color del texto del botón */
            cursor: pointer; /* Cambiar el cursor al pasar el mouse sobre el botón */
        }

        .btn-eliminar:hover {
            background-color: #cc0000; /* Color de fondo al pasar el mouse */
        }

        .btn-editar {
            background-color: #ffbf00; /* Color de fondo del botón */
            color: white; /* Color del texto del botón */
            cursor: pointer; /* Cambiar el cursor al pasar el mouse sobre el botón */
        }

        .btn-editar:hover {
            background-color: #E6AC00; /* Color de fondo al pasar el mouse */
        }
    </style>
</head>
<body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php?controller=Inicio&method=mostrarInicio">Incidencias Controller</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 ms-3" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <!--
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
    -->
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="index.php?controller=Confi&method=mostrarConfi">Settings</a></li>
                        <!-- <li><a class="dropdown-item" href="#!">Activity Log</a></li> -->
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="index.php?controller=Inicio&method=cerrarSesion">Logout</a></li> <!-- Enlace para cerrar sesión -->
                    </ul> 
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php?controller=Inicio&method=mostrarInicio">
                                <div class="sb-nav-link-icon"><i class="fas fa-home-alt"></i></div>
                                Inicio
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link" href="index.php?controller=Incidencias&method=mostrarIncidencias">
                                <div class="sb-nav-link-icon"><i class="fas fa-table-list"></i></div>
                                Incidencias
                            </a>
                            <a class="nav-link" href="index.php?controller=Misincidencias&method=mostrarMisincidencias">
                                <div class="sb-nav-link-icon"><i class="fas fa-folder"></i></div>
                                Mis Incidencias
                            </a>
                            <a class="nav-link" href="index.php?controller=Agregarincidencia&method=mostrarAgregarincidencia">
                                <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                                Agregar
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged e-mail:</div>
                        <?php echo $_SESSION['user_email'];?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">    

                        <div class="mt-4"> 
                            <div class="d-flex align-items-center" style="height: 100px;"> 
                                <i class="fas fa-folder" style="font-size: 35px; margin-right: 15px;"></i>
                                <h1>Mis Incidencias</h1>
                            </div>
                        </div>

                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php?controller=Inicio&method=mostrarInicio">Inicio</a></li> <!-- Enlace a la página de inicio -->
                            <li class="breadcrumb-item active">Mis Incidencias</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title" style="text-decoration: underline; font-size: 25px;">
                                    <strong>Descripción</strong>
                                </h5>

                                <p class="card-text">
                                    En esta sección se muestran todas las incidencias registradas por ti. 
                                    Actualmente tienes un total de <strong><?php echo isset($total) ? $total : 0; ?> incidencias</strong>, de las cuales:
                                </p>
                                <ul>
                                <li><strong><?php echo isset($totalAbiertas) ? $totalAbiertas : 0; ?></strong> están <strong style="color: #28a745;">Abiertas</strong></li>
                                    <li><strong><?php echo isset($totalEnProceso) ? $totalEnProceso : 0; ?></strong> están <strong style="color: #ffc107;">En progreso</strong></li>
                                    <li><strong><?php echo isset($totalCerradas) ? $totalCerradas : 0; ?></strong> han sido <strong style="color: #dc3545;">Cerradas</strong></li>
                                </ul>
                                <p class="card-text">
                                    Las incidencias están clasificadas por prioridad y estado, 
                                    lo que te permite identificar rápidamente la gravedad de cada una:
                                </p> 
                                <ul>
                                    <li> <strong><?php echo isset($totalAltas) ? $totalAltas : 0; ?></strong> son de prioridad <strong style="color: #dc3545;">Alta</strong></li>
                                    <li> <strong><?php echo isset($totalMedias) ? $totalMedias : 0; ?></strong> son de prioridad <strong style="color: #ffc107;">Media</strong></li>
                                    <li> <strong><?php echo isset($totalBajas) ? $totalBajas : 0; ?></strong> son de prioridad <strong style="color: #28a745;">Baja</strong></li>
                                </ul>
                                <p class="card-text">
                                    A continuación, puedes consultar los detalles de cada incidencia en la lista completa.
                                </p>  
                                <!--
                                <p class="card-text">
                                    Total de incidencias: <?php echo isset($total) ? $total : 0; ?><br>
                                    Incidencias abiertas: <?php echo isset($totalAbiertas) ? $totalAbiertas : 0; ?><br>
                                    Incidencias en proceso: <?php echo isset($totalEnProceso) ? $totalEnProceso : 0; ?><br>
                                    Incidencias cerradas: <?php echo isset($totalCerradas) ? $totalCerradas : 0; ?><br>
                                    Incidencias altas: <?php echo isset($totalAltas) ? $totalAltas : 0; ?><br>
                                    Incidencias medias: <?php echo isset($totalMedias) ? $totalMedias : 0; ?><br>
                                    Incidencias bajas: <?php echo isset($totalBajas) ? $totalBajas : 0; ?><br>
                                </p> -->  
                                    
                            </div>
                        </div>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tabla Mis Incidencias
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <!-- <th>id</th>-->
                                             <!--<th>Usuario</th> -->
                                            <th>Título</th>
                                            <th>Estado</th>
                                            <th>Prioridad</th>
                                            <th>Fecha</th>
                                            <th>Descripcion</th>
                                            <th>Evidencia</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        if (is_array($datosIncidencias) && count($datosIncidencias) > 0){
                                            foreach ($datosIncidencias as $inc) {
                                                echo "<tr>";
                                                // echo "<td>".$inc['id']."</td>";
                                                //echo "<td>".$inc['usuario']."</td>";
                                                echo "<td>".$inc['nombre']."</td>";
                                                echo "<td>".$inc['estado']."</td>";
                                                echo "<td>".$inc['prioridad']."</td>";

                                                if (!empty($inc['fecha'])) {
                                                    try {
                                                        // Crear un objeto DateTime solo si la fecha no está vacía
                                                        $fecha = new DateTime($inc['fecha']);
                                                        
                                                        $meses = [
                                                            "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
                                                            "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
                                                        ];
                                                
                                                        // Formatear la fecha
                                                        $dia = $fecha->format('d');
                                                        $mes = $meses[$fecha->format('n') - 1]; // Los meses en format() son 1 a 12
                                                        $año = $fecha->format('Y');
                                                        $hora = $fecha->format('H:i');
                                                
                                                        echo "<td>
                                                            • Día: {$dia} de {$mes} de {$año}<br>
                                                            • Hora: {$hora}
                                                        </td>";
                                                    } catch (Exception $e) {
                                                        // Si la fecha no es válida, mostrar un mensaje o manejar el error
                                                        echo "<td>Fecha no válida</td>";
                                                    }
                                                } else {
                                                    // En caso de que no haya fecha disponible
                                                    echo "<td>Fecha no disponible</td>";
                                                }

                                                echo "<td>".htmlspecialchars($inc['descripcion'])."</td>";

                                                // Verificar si la foto es null
                                                if (is_null($inc['foto']) || $inc['foto'] === '') {
                                                    echo "<td>No hay Foto</td>";
                                                } else {
                                                    echo "<td><img src='" . htmlspecialchars($inc['foto']) . "' width='100' height='100' alt='Foto de incidencia'></td>"; // Muestra la imagen
                                                }
                                                
                                                echo "<td>"; // style='display: flex; flex-direction: column; align-items: center;'
                                                    // Formulario para editar incidencia //<button type="submit">Editar</button>
                                                    echo '<form action="index.php?controller=Misincidencias&method=mostrarEditar" method="POST" style="display:inline;">
                                                            <input type="hidden" name="id" value="'.$inc['id'].'">
                                                            <button type="submit" class="btn btn-outline-primary">
                                                                <i class="bi bi-pencil"></i> <!-- Ícono de Bootstrap para editar -->
                                                            </button>
                                                            
                                                        </form><br>';
                                                    // Formulario para eliminar incidencia //<button type="submit">Eliminar</button>
                                                    echo '<form action="index.php?controller=Misincidencias&method=eliminarIncidencia" method="POST" style="display:inline;">
                                                            <input type="hidden" name="id" value="'.$inc['id'].'">
                                                            <button type="submit" class="btn btn-outline-danger">
                                                                <i class="bi bi-trash"></i> <!-- Ícono de Bootstrap para eliminar -->
                                                            </button>
                                                        </form>';
                                                    
                                                echo "</td>";

                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<p style='text-align: center;'>No hay incidencias</p>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>
</html>

<!--
<body>
    <h1>Mis Incidencias</h1>

    <div class="container mt-5">
        <table class="table" id="taula">
            <thead>
                <tr class="table-dark">
                <th>id</th>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Prioridad</th>
                <th>Descripcion</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Editar</th>
                <th>Eliminar</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    if (is_array($datosIncidencias)){
                        foreach ($datosIncidencias as $inc) {
                            echo "<tr>";
                            echo "<td>".$inc['id']."</td>";
                            echo "<td>".$inc['usuario']."</td>";
                            echo "<td>".$inc['nombre']."</td>";
                            echo "<td>".$inc['prioridad']."</td>";
                            echo "<td>".$inc['descripcion']."</td>";
                            echo "<td>".$inc['fecha']."</td>";
                            echo "<td>".$inc['estado']."</td>";
                            echo "<td><a href='index.php?action=editarIncidencia&id=".$inc['id']."'>Editar</a></td>";
                            echo "<td><a href='index.php?action=eliminarIncidencia&id=".$inc['id']."'>Eliminar</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No hay incidencias</tr>";
                    }
                ?>
            </tbody>
        </table>

        <!-- Enlace para volver al inicio --
        <a href="index.php?controller=Inicio&method=mostrarInicio">Volver</a>
    </div>

    
    <-- jQuery --
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <-- Bootstrap 5 JS Bundle (incluye Popper.js) --
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <-- DataTables CSS --
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.bootstrap5.js"></script>
</body>
</html> -->