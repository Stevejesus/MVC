<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>

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
                        <li><a class="dropdown-item" href="index.php?controller=Inicio&method=cerrarSesion">Logout</a></li>
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
                        <div class="d-flex align-items-center mt-3">
                            <h1>Editar</h1>
                        </div>

                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php?controller=Inicio&method=mostrarInicio">Inicio</a></li> <!-- Enlace a la página de inicio -->
                            <li class="breadcrumb-item active">Editar</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-user me-1"></i>
                                Editar Incidencia
                            </div>
                            
                                <div class="mt-4"> 
                                    <div class="card-body">
                                        <form action="index.php?controller=Misincidencias&method=guardarCambios" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($incidencia['id']); ?>"> <!-- Campo oculto para el ID -->

                                            <div class="mb-3">
                                                <label for="nombre">Titulo:</label>
                                                <input type="texto" class="form-control" id="nombre" name="nombre" value="<?php echo $incidencia['nombre']; ?>" required>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="estado">Estado:</label>
                                                <div class="btn-group w-100 mb-3" role="group" aria-label="Basic radio toggle button group">
                                                    <input type="radio" class="btn-check" name="estado" id="estadoAbierto" value="Abierto" autocomplete="off" <?php echo ($incidencia['estado'] == 'Abierto') ? 'checked' : ''; ?> required>
                                                    <label class="btn btn-outline-success w-100" for="estadoAbierto">Abierto</label>

                                                    <input type="radio" class="btn-check" name="estado" id="estadoEnProgreso" value="En progreso" autocomplete="off" <?php echo ($incidencia['estado'] == 'En progreso') ? 'checked' : ''; ?> required>
                                                    <label class="btn btn-outline-warning w-100" for="estadoEnProgreso">En progreso</label>

                                                    <input type="radio" class="btn-check" name="estado" id="estadoCerrado" value="Cerrado" autocomplete="off" <?php echo ($incidencia['estado'] == 'Cerrado') ? 'checked' : ''; ?> required>
                                                    <label class="btn btn-outline-danger w-100" for="estadoCerrado">Cerrado</label>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="prioridad">Prioridad:</label>
                                                <div class="btn-group w-100 mb-3" role="group" aria-label="Basic radio toggle button group">
                                                    <input type="radio" class="btn-check" name="prioridad" id="prioridadBaja" value="Baja" autocomplete="off" <?php echo ($incidencia['prioridad'] == 'Baja') ? 'checked' : ''; ?> required>
                                                    <label class="btn btn-outline-success w-100" for="prioridadBaja">Baja</label>

                                                    <input type="radio" class="btn-check" name="prioridad" id="prioridadMedia" value="Media" autocomplete="off" <?php echo ($incidencia['prioridad'] == 'Media') ? 'checked' : ''; ?> required>
                                                    <label class="btn btn-outline-warning w-100" for="prioridadMedia">Media</label>

                                                    <input type="radio" class="btn-check" name="prioridad" id="prioridadAlta" value="Alta" autocomplete="off" <?php echo ($incidencia['prioridad'] == 'Alta') ? 'checked' : ''; ?> required>
                                                    <label class="btn btn-outline-danger w-100" for="prioridadAlta">Alta</label>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="fechaHora">Fecha y Hora:</label>
                                                <input type="datetime-local" name="fechaHora" id="fechaHora" value="<?php echo htmlspecialchars(date('Y-m-d\TH:i', strtotime($incidencia['fecha']))); ?>" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="descripcion">Descripcion:</label>
                                                <textarea type="descripcion" name="descripcion" id="descripcion" rows="1" required oninput="autoResize(this)"><?php echo htmlspecialchars($incidencia['descripcion']); ?></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="foto">Evidencia:</label>
                                                <div class="file-upload">
                                                    <input type="file" name="foto" id="foto" accept="image/*" class="file-input">
                                                    <label for="foto" class="file-label">Seleccionar archivo</label>
                                                    <span class="file-status">
                                                        <?php 
                                                        // Verifica si ya hay un archivo almacenado y muestra solo el nombre
                                                        if (!empty($incidencia['foto'])) {
                                                            $fileName = basename($incidencia['foto']); // Obtiene solo el nombre del archivo
                                                            echo htmlspecialchars($fileName);
                                                        } else {
                                                            echo 'Sin archivos seleccionados';
                                                        }
                                                        ?>
                                                    </span>

                                                    <input type="hidden" name="foto_existente" value="<?php echo htmlspecialchars($incidencia['foto']); ?>">
                                                </div> 
                                            </div>
                                            
                                            <div class="d-flex align-items-center justify-content-center mt-1" style="height: auto;">
                                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                            </div>
                                        </form>
                                    </div>

                            </div>                            
                        </div>
                    </div>

                    <div class="container-fluid px-4">
                        <p class="card-body">
                            id: <?php echo $_SESSION['user_id'];?><br>
                            Nombre:<?php echo $_SESSION['user_name'];?><br>
                            Apellidos: <?php echo $_SESSION['user_lastname'];?><br>
                            Correo: <?php echo $_SESSION['user_email'];?><br>
                            Nombre de usuario: <?php echo $_SESSION['user_username'];?><br>
                            Foto: <?php echo $_SESSION['user_photo'];?><br>
                        </p>
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
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('foto').addEventListener('change', function() {
                    const files = this.files; // Obtiene todos los archivos seleccionados
                    const fileNames = files.length > 0 
                        ? Array.from(files).map(file => file.name).join(', ') // Mapea los nombres de los archivos
                        : 'Sin archivos seleccionados'; // Mensaje si no hay archivos

                    document.querySelector('.file-status').textContent = fileNames; // Muestra los nombres
                });
            });
        </script>

        <script>
            function autoResize(textarea) {
                textarea.style.height = 'auto'; // Restablecer la altura
                textarea.style.height = (textarea.scrollHeight) + 'px'; // Ajustar la altura al contenido
            }

            // Llama a autoResize al cargar la página para ajustar el tamaño inicial
            document.addEventListener('DOMContentLoaded', function() {
                const descriptionTextarea = document.getElementById('descripcion');
                autoResize(descriptionTextarea); // Ajusta el tamaño al cargar
            });
        </script>
</body>
</html>