<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incidencias</title>

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

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
</head>
<body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php?controller=Inicio&method=mostrarInicio">Incidencias Controller</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 ms-3" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <!--<div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>-->
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="index.php?controller=Confi&method=mostrarConfi">Settings</a></li> <!-- Enlace a la página de configuración -->
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
                                <i class="fas fa-table-list"style="font-size: 35px; margin-right: 15px;"></i>
                                <h1>Tabla de Incidencias</h1>
                            </div>
                        </div>  
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php?controller=Inicio&method=mostrarInicio">Inicio</a></li> <!-- Enlace a la página de inicio -->
                            <li class="breadcrumb-item active">Incidencias</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title" style="text-decoration: underline; font-size: 25px;">
                                    <strong>Descripción</strong>
                                </h5>

                                <p class="card-text">
                                    En esta sección se muestran todas las incidencias registradas por los usuarios. 
                                    Actualmente hay un total de <strong><?php echo $total; ?> incidencias</strong>, clasificadas de la siguiente manera:
                                </p>
                                <ul>
                                    <li><strong><?php echo $totalAbiertas; ?></strong> están <strong style="color: #28a745;">Abiertas</strong></li>
                                    <li><strong><?php echo $totalEnProceso; ?></strong> están <strong style="color: #ffc107;">En progreso</strong></li>
                                    <li><strong><?php echo $totalCerradas; ?></strong> han sido <strong style="color: #dc3545;">Cerradas</strong></li>
                                </ul>
                                <p class="card-text">
                                    Cada incidencia está organizada por <strong>prioridad</strong> y <strong>estado</strong>, 
                                    lo que te permite identificar rápidamente su gravedad. 
                                    Las prioridades se clasifican como <strong>Alta</strong>, <strong>Media</strong> y <strong>Baja</strong>, 
                                    y puedes ver el estado de cada incidencia:
                                </p>  
                                <ul>
                                    <li><strong><?php echo $totalAltas; ?></strong> son de prioridad <strong style="color: #dc3545;">Alta</strong></li>
                                    <li><strong><?php echo $totalMedias; ?></strong> son de prioridad <strong style="color: #ffc107;">Media</strong></li>
                                    <li><strong><?php echo $totalBajas; ?></strong> son de prioridad <strong style="color: #28a745;">Baja</strong></li>
                                </ul>
                                <p class="card-text">
                                    Cada registro incluye información adicional, como el <strong>usuario</strong> que reportó la incidencia, 
                                    una <strong>descripción</strong> detallada, 
                                    la <strong>fecha</strong> de registro y una <strong>imagen</strong> que ilustra el problema.
                                </p> 
                                <p class="card-text">
                                    A continuación, encontrarás la lista completa con los detalles de cada incidencia. 
                                    Puedes consultar cada uno para obtener más información.
                                </p> 
                            </div>
                        </div>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tabla Incidencias
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <!--<th>id</th>-->
                                            <th>Usuario</th>
                                            <th>Título</th>
                                            <th>Estado</th>
                                            <th>Prioridad</th>
                                            <th>Fecha</th>
                                            <th>Descripcion</th>                                            
                                            <th>Foto</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (is_array($incidencias) && count($incidencias) > 0) {
                                        foreach ($incidencias as $inc) {
                                            echo "<tr>";
                                            /* echo "<td>".$inc['id']."</td>"; */
                                            echo "<td>".htmlspecialchars($inc['nombre_usuario'])."</td>";
                                            echo "<td>".htmlspecialchars($inc['nombre'])."</td>";
                                            echo "<td>".htmlspecialchars($inc['estado'])."</td>";
                                            echo "<td>".htmlspecialchars($inc['prioridad'])."</td>";

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

                                            //echo "<td>Ruta de la imagen: " . htmlspecialchars(isset($inc['foto']) ? $inc['foto'] : 'No disponible') . "</td>";
                                            // Verificar si la foto es null
                                            if (is_null($inc['foto']) || $inc['foto'] === '') {
                                                echo "<td>No hay Foto</td>";
                                            } else {
                                                echo "<td><img src='" . htmlspecialchars($inc['foto']) . "' width='100' height='100' alt='Foto de incidencia'></td>"; // Muestra la imagen
                                            }
                                            echo "</tr>";                                        
                                        } 
                                        }else {
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
                            <div class="text-muted">Copyright &copy; Your Website 2024</div>
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