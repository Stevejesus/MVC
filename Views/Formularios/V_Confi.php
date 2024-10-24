<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confi</title>

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Body -->
    <style>
        *{
            font-family: 'Poppins', 'sans-serif';
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
                            <h1>Configuración</h1>
                        </div>

                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php?controller=Inicio&method=mostrarInicio">Inicio</a></li> <!-- Enlace a la página de inicio -->
                            <li class="breadcrumb-item"><a href="index.php?controller=Misincidencias&method=mostrarMisincidencias">Mis incidencias</a></li> <!-- Enlace a la página de inicio -->
                            <li class="breadcrumb-item active">Configuración</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-user me-1"></i>
                                Datos de usuario
                            </div>
                            
                            <div class="container p-4">
                                <div class="mt-4"> 

                                    <!-- Centrar la imagen y el nombre horizontalmente -->
                                    <div class="d-flex align-items-center justify-content-center" style="min-height: auto;">
                                        <div> 
                                            <img src="<?php echo $_SESSION['user_photo'] ?? 'imagenes/avatar.png'; ?>" alt="user" class="img-fluid"
                                            style="max-width: 200px; border-radius: 50%;">
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-center mt-1" style="height: auto;">
                                        <div> 
                                            <h1><?php echo $_SESSION['user_name'] ?? 'User Name';?></h1>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <form action="index.php?controller=Confi&method=actualizarDatos" method="POST">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Nombre de Usuario: </label>
                                                <input type="text" class="form-control" id="name" name="name" value="<?php echo  $usuario['nombres'];?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="lastname" class="form-label">Apellidos: </label>
                                                <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $usuario['apellidos'];?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Correo:</label>
                                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $usuario['correo'];?>" required>
                                            </div>

                                            <!-- Campo para contraseña actual 
                                            <div class="mb-3">
                                                <label for="contrasena" class="form-label">Contraseña:</label>
                                                <input type="text" class="form-control" id="contrasena" name="contrasena" value="<?php echo $_SESSION['user_password'];?>" readonly>
                                            </div>-->

                                            <?php if (!empty($mensaje)): ?>
                                                <div style="color: <?php echo (strpos($mensaje, 'Success') !== false) ? 'green' : 'red'; ?>;">
                                                    <?php echo $mensaje; ?>
                                                </div>
                                            <?php endif; ?>
                                            
                                            <div class="d-flex align-items-center justify-content-center mt-1" style="height: auto;">
                                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                            </div>
                                        </form>

                                    </div>

                                </div> 
                            </div>                            
                        </div>
                    </div>
                        <!--
                    <div class="container-fluid px-4">
                        <p class="card-body">
                            id: <?php echo $_SESSION['user_id'];?><br>
                            Nombre:<?php echo $_SESSION['user_name'];?><br>
                            Apellidos: <?php echo $_SESSION['user_lastname'];?><br>
                            Correo: <?php echo $_SESSION['user_email'];?><br>
                            Nombre de usuario: <?php echo $_SESSION['user_username'];?><br>
                            Foto: <?php echo $_SESSION['user_photo'];?><br>
                        </p>
                    </div> -->
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
</body>
</html>