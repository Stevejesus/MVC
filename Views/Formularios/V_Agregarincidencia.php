<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Incidencia</title>

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Body -->
    <style>
        *{
            font-family: 'Poppins', 'sans-serif';
        }
    </style>

    <!-- Estilo de inputs -->
    <style> 
        input[type="texto"], input[type="date"], input[type="file"], input[type="datetime-local"] {
            padding: 10px; /* Espacio interno en los inputs */
            margin-bottom: 15px; /* Espacio entre inputs */
            border: 1px solid #ccc; /* Color del borde */
            border-radius: 5px; /* Bordes redondeados */
            transition: border-color 0.3s, box-shadow 0.3s; /* Transiciones suaves */
            width: 100%; /* Asegurar que los inputs ocupen todo el ancho */
        }

        textarea {
            padding: 10px; /* Espacio interno en los inputs */
            margin-bottom: 15px; /* Espacio entre inputs */
            border: 1px solid #ccc; /* Color del borde */
            border-radius: 5px; /* Bordes redondeados */
            transition: border-color 0.3s, box-shadow 0.3s; /* Transiciones suaves */
            width: 100%; /* Asegurar que los inputs ocupen todo el ancho */
            resize: vertical; /* Permitir redimensionar solo verticalmente */
            overflow: auto; /* Mostrar barras de desplazamiento si es necesario */
        }

        /* Opcional: Cambiar el estilo al enfocarse */
        textarea:focus {
            border-color: #007bff; /* Color del borde al enfocar */
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Sombra al enfocar */
        }
        
        .file-upload {
            display: flex; /* Usar flexbox para alinear */
            align-items: center; /* Alinear verticalmente */
            border: 1px solid #ccc; /* Borde del contenedor */
            border-radius: 5px; /* Bordes redondeados */
            margin-bottom: 15px; /* Espacio entre inputs */
        }

        .file-input {
            display: none; /* Ocultar el input de archivo original */
        }

        .file-label {
            flex: 0 0 25%; /* El botón ocupa el 20% del espacio */
            padding: 10px; /* Espacio interno */
            background-color: #007bff; /* Color de fondo del botón */
            color: white; /* Color del texto */
            border-radius: 5px; /* Bordes redondeados */
            cursor: pointer; /* Cambiar el cursor al pasar el ratón */
            text-align: center; /* Centrar el texto */
            transition: background-color 0.3s; /* Transición suave */
        }

        .file-label:hover {
            background-color: #0056b3; /* Color en hover */
        }

        .file-status {
            margin-left: 10px; /* Espacio entre el botón y el texto */
        }
    </style>
    <!-- Botones -->
    <style> 
        input[type="submit"] { /* , .button-style */
            padding: 10px; /* Espacio interno en los inputs */
            margin: 10px 0; /* Espacio vertical entre inputs y botón */
            border: 1px solid #ccc; /* Color del borde */
            border-radius: 5px; /* Bordes redondeados */
            background-color: #007bff; /* Color de fondo del botón */
            color: white; /* Color del texto del botón */
            cursor: pointer; /* Cambiar el cursor al pasar el mouse sobre el botón */
            transition: background-color 0.3s, box-shadow 0.3s; /* Transiciones suaves */
        }

        input[type="submit"]:hover { /*, .button-style:hover */
            background-color: #0056b3; /* Color de fondo al pasar el mouse */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Sombra al pasar el mouse */
            color: white; /* Color del texto del botón */
        }

        input[type="submit"]:focus { /*, .button-style:focus */
            outline: none; /* Eliminar el contorno predeterminado del navegador */
            border-color: #003f7f; /* Color del borde al enfocar */
            box-shadow: 0 0 5px rgba(0, 86, 179, 0.5); /* Sombra al enfocar */
        }
        
        input[type="submit"] {
            margin-top: 10px;
            margin-bottom: 30px;
            width: 100%; /* Para que todos los inputs ocupen el ancho completo */
        }        
    </style>
    <!-- Radio buttons -->
    <style>
        .btn-outline-open {
            background-color: #28a745; /* Verde */
            color: white;
        }

        .btn-outline-progress {
            background-color: #ffc107; /* Amarillo */
            color: white;
        }

        .btn-outline-closed {
            background-color: #dc3545; /* Rojo */
            color: white;
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
                                <i class="fas fa-plus" style="font-size: 30px; margin-right: 10px;"></i>
                                <h1>Agregar una Incidencia</h1>
                            </div>
                        </div>

                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php?controller=Inicio&method=mostrarInicio">Inicio</a></li> <!-- Enlace a la página de inicio -->
                            <li class="breadcrumb-item active">Agregar</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">

                                <h5 class="card-title" style="text-decoration: underline; font-size: 25px;">
                                    <strong>Descripción</strong>
                                </h5>
                                <p class="card-text">
                                    En esta sección puedes crear nuevas incidencias. Para registrar una incidencia, proporciona la siguiente información:<br>
                                </p>
                                <p class="card-text">   
                                    <strong>Título de la Incidencia:</strong> <br>
                                    Un breve resumen de la incidencia que estás reportando.
                                </p>
                                <p class="card-text">   
                                    <strong>Estado:</strong> <br>
                                    Establece el estado actual de la incidencia:<br>
                                    <ul>
                                        <li> <strong style="color: #28a745;">Abiertas</strong></li>
                                        <li> <strong style="color: #ffc107;">En Progreso</strong></li>
                                        <li> <strong style="color: #dc3545;">Cerrado</strong></li>
                                    </ul>
                                </p>
                                <p class="card-text">   
                                    <strong>Prioridad:</strong> <br>
                                    Clasifica la incidencia según su nivel de urgencia:
                                    <ul>
                                        <li><strong style="color: #dc3545;">Alta</strong></li>
                                        <li><strong style="color: #ffc107;">Media</strong></li>
                                        <li><strong style="color: #28a745;">Baja</strong></li>
                                    </ul> 
                                </p>
                                <p class="card-text">   
                                    <strong>Descripción:</strong> <br>
                                    Detalla la incidencia, proporcionando información relevante que ayude a entender el problema.
                                </p>
                                <p class="card-text">   
                                    <strong>Fecha:</strong><br>
                                    Indica la fecha en que ocurre la incidencia. Asegúrate de usar el formato correcto (DD/MM/AAAA).
                                </p>
                                <p class="card-text">   
                                    <strong>Evidencia:</strong><br>
                                    Adjunta una foto o archivo relacionado con la incidencia para respaldar tu reporte. Esto puede incluir imágenes del problema.
                                </p>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-plus me-1"></i>
                                Agregar Incidencia
                            </div>

                            <?php if (!empty($mensaje)): ?>
                                <div style="color: red;"><?php echo $mensaje; ?></div> <!-- Mostrar mensaje de error -->
                            <?php endif; ?>

                            <div>
                            <div class="card-body">
                                <form action="index.php?controller=Agregarincidencia&method=agregarIncidencia" method="POST" enctype="multipart/form-data">
                                    <label for="nombre">Titulo:</label>
                                    <input type="texto" name="nombre" id="nombre" required>
                                    <br>

                                    <label for="estado">Estado:</label>
                                    <div class="btn-group w-100 mb-3" role="group" aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="estado" id="estadoAbierto" value="Abierto" autocomplete="off" required>
                                        <label class="btn btn-outline-success w-100" for="estadoAbierto">Abierto</label>

                                        <input type="radio" class="btn-check" name="estado" id="estadoEnProgreso" value="En progreso" autocomplete="off" required>
                                        <label class="btn btn-outline-warning w-100" for="estadoEnProgreso">En progreso</label>

                                        <input type="radio" class="btn-check" name="estado" id="estadoCerrado" value="Cerrado" autocomplete="off" required>
                                        <label class="btn btn-outline-danger w-100" for="estadoCerrado">Cerrado</label>
                                    </div>
                                    <br>

                                    <label for="prioridad">Prioridad:</label>
                                    <div class="btn-group w-100 mb-3" role="group" aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="prioridad" id="prioridadBaja" value="Baja" autocomplete="off" required>
                                        <label class="btn btn-outline-success w-100" for="prioridadBaja">Baja</label>

                                        <input type="radio" class="btn-check" name="prioridad" id="prioridadMedia" value="Media" autocomplete="off" required>
                                        <label class="btn btn-outline-warning w-100" for="prioridadMedia">Media</label>

                                        <input type="radio" class="btn-check" name="prioridad" id="prioridadAlta" value="Alta" autocomplete="off" required>
                                        <label class="btn btn-outline-danger w-100" for="prioridadAlta">Alta</label>
                                    </div>
                                    <br>

                                    <?php
                                    // Obtener la fecha y hora actual
                                    $fechaHoraActual = date('Y-m-d\TH:i'); // Formato requerido para datetime-local
                                    ?>
                                    <label for="fechaHora">Fecha y Hora:</label>
                                    <input type="datetime-local" name="fechaHora" id="fechaHora" value="<?php echo $fechaHoraActual; ?>" required>
                                    <br>

                                    <label for="descripcion">Descripcion:</label>
                                    <textarea type="descripcion" name="descripcion" id="descripcion" rows="1" required oninput="autoResize(this)"></textarea>
                                    <br>
                                    
                                    
                                    <label for="foto">Evidencia:</label>
                                    <div class="file-upload">
                                        <input type="file" name="foto" id="foto" accept="image/*" class="file-input" multiple>
                                        <label for="foto" class="file-label">Seleccionar archivo</label>
                                        <span class="file-status">Sin archivos seleccionados</span>
                                    </div> 

                                    <input type="submit" value="Agregar">
                                </form>                                
                            </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Incidencia Controller 2024</div>
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
        
        <script>
            document.getElementById('foto').addEventListener('change', function() {
                const files = this.files; // Obtiene todos los archivos seleccionados
                const fileNames = files.length > 0 
                    ? Array.from(files).map(file => file.name).join(', ') // Mapea los nombres de los archivos
                    : 'Sin archivos seleccionados'; // Mensaje si no hay archivos

                document.querySelector('.file-status').textContent = fileNames; // Muestra los nombres
            });
        </script>

        <script>
            function autoResize(textarea) {
                textarea.style.height = 'auto'; // Restablecer la altura
                textarea.style.height = textarea.scrollHeight + 'px'; // Ajustar la altura al contenido
            }
        </script>
</body>
<!--
<body>
    <h1>AgregarIncidencia</h1>

    <?php if (!empty($mensaje)): ?>
        <div style="color: red;"><?php echo $mensaje; ?></div> -- Mostrar mensaje de error --
    <?php endif; ?>

    <form  method="post" action="index.php?controller=Agregarincidencia&method=agregarIncidencia">
        <label for="nombre">Titulo:</label>
        <input type="text" name="nombre" id="nombre" required>
        <br>

        <label for="prioridad">Prioridad:</label>
        <select type="prioridad" id="prioridad" name="prioridad" required>
            <option value="Baja">Baja</option>    
            <option value="Media">Media</option>
            <option value="Alta">Alta</option>
        </select>
        <br>
        
        <label for="descripcion">Descripcion:</label>
        <input type="description" name="descripcion" id="descripcion" required>
        <br>

        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" id="fecha" required>
        <br>

        <label for="estado">Estado:</label>
        <select type="estado" id="estado" name="estado" required>
            <option value="Abierto">Abierto</option>    
            <option value="En progreso">En progreso</option>
            <option value="Cerrado">Cerrado</option>
        </select>
        <br>

        <input type="submit" value="Agregar">
    </form>

    -- Enlace para volver al inicio --
    <a href="index.php?controller=Inicio&method=mostrarInicio">Volver</a>


    -- jQuery --
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    -- Bootstrap 5 JS Bundle (incluye Popper.js) --
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    -- DataTables CSS --
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.bootstrap5.js"></script>
</body> -->
</html>