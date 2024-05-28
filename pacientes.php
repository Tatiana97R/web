<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Pacientes</title>
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
            display: flex;
            justify-content: space-between;
        }
        /* Estilos para el formulario */
        .form-container {
            width: 45%;
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
        /* Estilos para las imágenes */
        .image-container {
            width: 45%;
            text-align: center;
        }
        .image-container img {
            max-width: 100%;
            height: auto;
            display: block;
            margin-bottom: 20px;
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
                flex-direction: column;
                align-items: center;
            }
            .form-container, .image-container {
                width: 100%;
                margin-bottom: 20px;
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

<h1>Registro de Pacientes</h1>

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
        $identificacion = $_POST['identificacion'];
        $nombres_apellidos = $_POST['nombres'];
        $f_nacimiento = $_POST['f_nacimiento'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $ciudad = $_POST['ciudad'];
        $email = $_POST['email'];

        // Conexión a la base de datos
        $conexion = new mysqli($host, $usuario, $contraseña, $base_datos);

        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Error al conectar a la base de datos: " . $conexion->connect_error);
        }

        // Preparar la consulta SQL para insertar un nuevo paciente
        $consulta = "INSERT INTO paciente (identificacion, nombres_y_apellidos, f_nacimiento, telefono, direccion, ciudad, email) VALUES (?, ?, ?, ?, ?, ?, ?)";

        // Preparar la sentencia
        if ($sentencia = $conexion->prepare($consulta)) {
            // Vincular los parámetros de la consulta
            $sentencia->bind_param("sssssss", $identificacion, $nombres_apellidos, $f_nacimiento, $telefono, $direccion, $ciudad, $email);

            // Ejecutar la consulta
            if ($sentencia->execute()) {
                echo "<p>Paciente guardado correctamente.</p>";
            } else {
                echo "<p>Error al guardar el paciente: " . $conexion->error . "</p>";
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
        <h2>Complete el siguiente formulario</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="identificacion">Identificación:</label>
            <input type="text" id="identificacion" name="identificacion" required><br>
            
            <label for="nombres">Nombre y Apellido:</label>
            <input type="text" id="nombres" name="nombres" required><br>
            
            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" id="fecha_nacimiento" name="f_nacimiento" required><br>
            
            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" required><br>
            
            <label for="direccion">Dirección de Residencia:</label>
            <input type="text" id="direccion" name="direccion" required><br>
            
            <label for="ciudad">Ciudad de Residencia:</label>
            <input type="text" id="ciudad" name="ciudad" required><br>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            
            <input type="submit" value="Registrar Paciente">
        </form>
        <?php ?>
    </div>
    <div class="image-container">
        <img src="https://whaticket.com/wp-content/uploads/2022/10/publicidad-para-consultorio-dental-4-1024x577.png" alt="Imagen 1">
    </div>
</div>
<div class="copyright">
    <p>&copy; <?php echo date("Y"); ?> ORTONOVA. Todos los derechos reservados.</p>
</div>

</body>
</html>
