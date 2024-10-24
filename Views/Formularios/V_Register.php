<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

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
        .container {
            display: flex;
            justify-content: center; /* Centra el contenido horizontalmente */
            align-items: center; /* Centra el contenido verticalmente */
            min-height: 100vh; /* Altura mínima para que ocupe toda la ventana */
        }
        .custom-container {
            max-width: 1200px;
            height: auto;

            background-color: white;
            border-radius: 100px; /* Esquinas redondeadas */
            display: flex; /* Flexbox para que las columnas llenen el alto */

            overflow: hidden; /* Para que las esquinas redondeadas se apliquen correctamente */
        }
        .columna1 {
            display: flex; /* Usar flex para centrar contenido */
            align-items: center; /* Centrar horizontalmente */
            justify-content: center; /* Centrar verticalmente */

            background-color: #F4F6FF; /* Columna 2 gris claro */
            padding: 5px; /* Padding interno en columna 2 */
            border-top-left-radius: 100px; /* Esquina redondeada superior derecha */
            border-bottom-left-radius: 100px; /* Esquina redondeada inferior derecha */

            max-width: 50%; /* Ancho máximo de la columna */
        }
        .columna2 {
            background-color: transparent; /* Columna 1 transparente */
            padding: 50px;
            padding-left: 90px;
            padding-right: 90px;

            display: flex; /* Usar flex para centrar contenido */
            flex-direction: column; /* Alinear en columna */
            align-items: center; /* Centrar horizontalmente */
            justify-content: center; /* Centrar verticalmente */

            max-width: 50%; /* Ancho máximo de la columna */
        }
    </style>

    <!-- Estilo de inputs -->
    <style> 
        input[type="email"], input[type="password"], input[type="text"] {
            padding: 10px; /* Espacio interno en los inputs */
            border: 1px solid #ccc; /* Color del borde */
            border-radius: 5px; /* Bordes redondeados */
            background-color: #F4F6FF; /* Color de fondo del botón */
            transition: border-color 0.3s, box-shadow 0.3s; /* Transiciones suaves */
            width: 100%; /* Asegurar que los inputs ocupen todo el ancho */

            margin-bottom: 5px; /* Espacio entre inputs */
        }
    </style>

    <!-- Botones -->
    <style> 
        input[type="submit"] { /* , .button-style */
            padding: 10px; /* Espacio interno en los inputs */
            margin: 10px 0; /* Espacio vertical entre inputs y botón */
            /*margin-bottom: 15px; /* Espacio entre inputs */
            border: 1px solid #ccc; /* Color del borde */
            border-radius: 5px; /* Bordes redondeados */
            background-color: #7FA1C3; /* Color de fondo del botón */
            color: white; /* Color del texto del botón */
            cursor: pointer; /* Cambiar el cursor al pasar el mouse sobre el botón */
            transition: background-color 0.3s, box-shadow 0.3s; /* Transiciones suaves */
        }

        input[type="submit"]:hover { /*, .button-style:hover */
            background-color: #6482AD; /* Color de fondo al pasar el mouse */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Sombra al pasar el mouse */
            color: white; /* Color del texto del botón */
        }

        input[type="submit"]:focus { /*, .button-style:focus */
            outline: none; /* Eliminar el contorno predeterminado del navegador */
            border-color: #0056b3; /* Color del borde al enfocar */
            box-shadow: 0 0 5px rgba(0, 86, 179, 0.5); /* Sombra al enfocar */
        }
        
        input[type="submit"] {
            margin-top: 20px;
            width: 100%; /* Para que todos los inputs ocupen el ancho completo */
        }        
    </style>

    <!-- h1 -->
    <style>
        h1 {
           margin-bottom: 15px; 
        }
    </style>

    <!-- Phone -->
    <style>
        .img2{
            width: 100%;
            height: auto;
        }
    </style>
    <!-- Usuario -->
    <style> 
        .img1{
            max-width: 150px;
            height: auto;
        }
    </style>

    <style>
        .left-align {
            align-self: flex-start; /* Alinea solo este elemento a la izquierda */
            position: relative; /* Añade posición relativa si quieres usar left */

            font-size: 24px; /* Cambia el tamaño de la flecha */
        }
    </style>

    <style>
        form {
            width: 100%; /* O un ancho máximo */
            margin: 0 auto; /* Centra el formulario si tiene un ancho fijo */
        }

        .input-container {
            position: relative; /* Posiciona el contenedor de manera relativa */
            width: 100%; /* Asegura que el input ocupe el ancho completo */
        }

        .input-container i {
            position: absolute; /* Posiciona el icono de manera absoluta */
            left: 10px; /* Ajusta el espacio desde la izquierda */
            top: 45%; /* Centra el icono verticalmente */
            transform: translateY(-50%); /* Alinea verticalmente el icono */
            color: #888; /* Color del icono */
        }

        .input-container input {
            padding-left: 30px; /* Espacio para el icono */
            width: 100%; /* Asegura que el input ocupe el ancho completo */
            height: 40px; /* Altura del input */
            border: 1px solid #ccc; /* Estilo del borde */
            border-radius: 5px; /* Esquinas redondeadas */
            background-color: #F4F6FF; /* Color de fondo del input */
            transition: border-color 0.3s, box-shadow 0.3s; /* Transiciones suaves */
        }
    </style>

    <style>
        .textos-label {
            margin-top: 10px; /* Aplica solo al label de nombre */
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row custom-container">
        <!-- Contenido de la columna 1 -->
        <div class="col columna1">
            <img src="imagenes/phone.png" alt="user" class="img2"> 
        </div>

        <!-- Contenido de la columna 2 -->
        <div class="col columna2">
            <a class="left-align" href="index.php?controller=Login&method=mostrarLogin">↩</a> <!-- Enlace para volver al login -->

            <img src="imagenes/agregar-usuario.png" alt="user" class="img1"> 
            <h1>Crea tu Cuenta</h1>

            <form method="post" action="index.php?controller=Register&method=Registrar">

                <label for="nombres" class="textos-label">Nombre de Usuario:</label>
                <div class="input-container">
                    <i class="fas fa-user"></i>
                    <input type="text" name="nombres" id="nombres" required>
                </div>

                <label for="apellidos" class="textos-label">Apellido:</label>
                <div class="input-container">
                    <i class="fas fa-user"></i>
                    <input type="text" name="apellidos" id="apellidos" required>
                </div>

                <label for="correo" class="textos-label">Correo:</label>
                <div class="input-container">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="correo" id="correo" required>
                </div>

                <?php if (!empty($mensaje)): ?>
                    <div style="color: red;"><?php echo $mensaje; ?></div> <!-- Mostrar mensaje de error -->
                <?php endif; ?>

                <label for="contrasena" class="textos-label">Contraseña:</label>
                <div class="input-container">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="contrasena" id="contrasena" required>
                </div>

                <!--
                <label for="nombres">Nombre:</label>
                <input type="text" name="nombres" id="nombres" required> 
                
                <label for="apellidos">Apellido:</label>
                <input type="text" name="apellidos" id="apellidos" required>
                
                <label for="correo">Correo:</label>
                <input type="email" name="correo" id="correo" required>
                
                <?php if (!empty($mensaje)): ?>
                    <div style="color: red;"><?php echo $mensaje; ?></div> -- Mostrar mensaje de error --
                <?php endif; ?>
                
                <label for="contrasena">Contraseña:</label>
                <input type="password" name="contrasena" id="contrasena" required> -->

                <input type="submit" value="Resgistarse">
            </form>
        </div>
    <div>
</div>
</body>
</html>