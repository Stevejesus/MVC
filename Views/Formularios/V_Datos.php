<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Body -->
    <style>
        *{
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
            font-family: 'Poppins', 'sans-serif';
        }

        body{
            height: 100vh;

            flex-direction: column; /* Para apilar elementos verticalmente */
            justify-content: center; /* Centrar el contenido verticalmente */
            align-items: center; /* Centrar el contenido horizontalmente */
            display: flex;
            background-color: #7FA1C3;/*<?php echo $_SESSION['backgroundcolor']; ?>;*/
        }
    </style>

    <!-- Contenedores -->
    <style>
        .custom-container1 {
            background-color: white;
            border-radius: 100px; /* Esquinas redondeadas */
            margin: 0px; /* Margen externo */
            display: flex; /* Flexbox para que las columnas llenen el alto */

            overflow: hidden; /* Para que las esquinas redondeadas se apliquen correctamente */

            padding: 80px;

            flex-direction: column; /* Alinear en columna */
            align-items: center; /* Centrar horizontalmente */
            justify-content: center; /* Centrar verticalmente */

            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.6); /* Sombra para el contenedor */
        }
    </style>

    <!-- Imagen -->
    <style>
        .img1 {
            width: 200px;
            height: 185px;
            margin-bottom: 30px;
        }
    </style>

    <!-- Textos -->
    <style>
        .titulo {
            font-size: 2em;
            margin-bottom: 30px;
        }

        /* Estilo de los textos */
        .datos-titulo {
            font-size: 1.5em;
            text-align: left;
            width: 100%;
            margin-bottom: 6px;
        }

        .datos {
            text-align: left;
            width: 100%;
        }

        .datos p {
            margin: 5px;
            font-size: 1.2em;
        }

        /* Línea separadora antes de las acciones */
        .linea-separadora {
            width: 100%;
            border-bottom: 2px solid #000;
        }

        /* Estilo de los enlaces */
        .acciones {
            text-align: center;
            margin-top: 25px;
        }

        .acciones a {
            text-align: center;
            font-size: 1.2em;
        }

        .sub_titulo {
            font-size: 1.8em;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="row custom-container1">

        <?php if (!empty($mensaje)): ?>
            <div style="color: green;"><?php echo $mensaje; ?></div> <!-- Mostrar mensaje de error -->
        <?php endif; ?>

        <div>
            <h2 class="titulo">¡Registro completado, <?php echo $_SESSION['user_name']; ?>!</h2>
        </div>

        <img src="Imagenes/fiesta.png" alt="user" class="img1">

        <div class="datos-titulo">
            <h1>Datos</h1>
        </div>

        <div class="linea-separadora"></div>

        <div class="datos"> 
            <p><i class="fas fa-user"></i> Nombre: <?php echo $_SESSION['user_name']; ?>
            <p><i class="fas fa-user"></i> Apellidos: <?php echo $_SESSION['user_lastname']; ?>
            <p><i class="fas fa-envelope"></i> Correo: <?php echo $_SESSION['user_email']; ?>
        </div>

        <div class="linea-separadora"></div>

        <div class="acciones">
            <h2 class="sub_titulo">¿Qué deseas hacer?</h2>
            <a href="index.php?controller=Inicio&method=cerrarSesion">Volver al Login</a> o <a href="index.php?controller=Inicio&method=mostrarInicio">Ir al Inicio</a>
        </div>
    </div>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <!-- Bootstrap 5 JS Bundle (incluye Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables CSS -->
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.bootstrap5.js"></script>
</body>
</html>