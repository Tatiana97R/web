<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de Cita</title>

    <style>
        /* Estilos CSS para hacerlo más agradable a la vista */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        /* Estilos para el menú de navegación */
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            background-color: #333;
            overflow: hidden;
        }
        li {
            float: left;
        }
        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        li a:hover {
            background-color: #111;
        }
        /* Contenedor para el contenido de la página */
        .content {
            padding: 20px;
            overflow: hidden;
            display: flex; /* Utilizamos flexbox para alinear los elementos horizontalmente */
            justify-content: space-between; /* Distribuye los elementos a lo largo del contenedor */
            align-items: flex-start; /* Alinea los elementos en la parte superior del contenedor */
        }
        /* Estilos para el formulario */
        .form-container {
            width: 45%; /* Anchura del formulario */
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            margin-top: 0;
            text-align: center;
        }
        .form-container label {
            display: block;
            margin-bottom: 10px;
        }
        .form-container input[type="text"],
        .form-container input[type="date"],
        .form-container input[type="time"],
        .form-container input[type="tel"],
        .form-container input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .form-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }
        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }
        .image-container {
            width: 45%; /* Anchura de la imagen */
            text-align: center;
        }
        .image-container img {
            max-width: 100%;
            height: auto;
            display: block;
            margin-bottom: 20px; /* Espacio entre las imágenes */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .copyright {
            clear: both;
            text-align: center;
            padding: 10px 0;
            background-color: #333;
            color: white;
        }

        /* Estilos para dispositivos pequeños */
        @media (max-width: 768px) {
            .content {
                flex-direction: column; /* Cambia la dirección de los elementos en dispositivos pequeños */
                align-items: center; /* Alinea los elementos en el centro del contenedor */
            }
            .form-container, .image-container {
                width: 100%; /* Los elementos ocupan el 100% del ancho en dispositivos pequeños */
                margin-bottom: 20px; /* Espacio entre los elementos en dispositivos pequeños */
            }
        }
    </style>

</head>
<body>

<ul>
    <li><a href="index.php">Inicio</a></li>
    <li><a href="citas.php">Citas</a></li>
    <li><a href="pacientes.php">Datos de Pacientes</a></li>
    <li><a href="medicos.php">Datos de Médicos</a></li>
    <li><a href="procedimientos.php">Procesos y Procedimientos</a></li>
</ul>

<h1>Solicitud de Cita</h1>

<div class="content">
    <div class="form-container">
    <?php
    // Si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Datos de conexión a la base de datos
        $host = "localhost";
        $usuario = "root";
        $contraseña = "";
        $base_datos = "consultorio";

        // Datos del formulario
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];

        // Conexión a la base de datos
        $conexion = new mysqli($host, $usuario, $contraseña, $base_datos);

        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Error al conectar a la base de datos: " . $conexion->connect_error);
        }

        // Preparar la consulta SQL para insertar una nueva cita
        $consulta = "INSERT INTO citas (fecha, hora, nombres_y_apellidos, telefono, correo) VALUES (?, ?, ?, ?, ?)";

        // Preparar la sentencia
        if ($sentencia = $conexion->prepare($consulta)) {
            // Vincular los parámetros de la consulta
            $sentencia->bind_param("sssss", $fecha, $hora, $nombre, $telefono, $correo);

            // Ejecutar la consulta
            if ($sentencia->execute()) {
                echo "<p>¡Su cita para el $fecha a las $hora ha sido solicitada con éxito!</p>";
            } else {
                echo "<p>Error al guardar la cita: " . $conexion->error . "</p>";
            }

            // Cerrar la sentencia
            $sentencia->close();
        } else {
            echo "<p>Error al preparar la consulta: " . $conexion->error . "</p>";
        }

        // Cerrar la conexión
        $conexion->close();
    }
    ?>
        <h2>Complete el formulario para registrar su cita</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" required><br>
            
            <label for="hora">Hora:</label>
            <input type="time" id="hora" name="hora" required><br>
            
            <label for="nombre">Nombre completo:</label>
            <input type="text" id="nombre" name="nombre" required><br>
            
            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" required><br>
            
            <label for="correo">Correo electrónico:</label>
            <input type="email" id="correo" name="correo" required><br>
            
            <input type="submit" value="Enviar Cita">   
        </form>
        
    </div>
    <div class="image-container">
        <img src="https://gacetadental.com/wp-content/uploads/2022/07/decalogo-comunicacion-paciente-odontologia.jpg" alt="Imagen 1">
    </div>
</div>


<div class="copyright">
    <p>&copy; <?php echo date("Y"); ?> ORTONOVA. Todos los derechos reservados.</p>
</div>

</body>
</html>