<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historia Clínica</title>
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
        }
        /* Estilos para la introducción de servicios */
        .intro-container {
            float: left;
            width: 50%;
        }
        /* Estilos para las imágenes */
        .image-container {
            float: right;
            width: 50%;
            text-align: center;
        }
        .image-container img {
            max-width: 60%;
            height: auto;
            display: block;
            margin-bottom: 20px; /* Espacio entre las imágenes */
        }
        .form-container {
            float: left;
            width: 45%; /* Reducir el ancho del formulario */
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            margin-top: 0;
        }
        .form-container label {
            display: block;
            margin-bottom: 10px;
        }
        .form-container input[type="text"],
        .form-container input[type="date"],
        .form-container textarea {
            width: calc(100% - 22px); /* Restar el ancho del borde */
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .form-container textarea {
            height: 100px;
        }
        .form-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }
        .clear {
            clear: both;
        }
        .copyright {
            clear: both;
            text-align: center;
            padding: 10px 0;
            background-color: #333;
            color: white;
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

<h1>Historia Clínica</h1>

<div class="content">
    <div class="form-container">


    <?php
    // Si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Datos de conexión a la base de datos
        $host = "localhost";
        $usuario = "root";
        $contraseña = "";
        $base_datos = "consultorio";;

        // Datos del formulario
        $id_paciente = $_POST['id_paciente'];
        $f_procedimiento = $_POST['f_procedimiento'];
        $proc_realizado = $_POST['proc_realizado'];
        $id_medico = $_POST['id_medico'];
        $medicamento = $_POST['medicamento'];

        // Conexión a la base de datos
        $conexion = new mysqli($host, $usuario, $contraseña, $base_datos);

        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Error al conectar a la base de datos: " . $conexion->connect_error);
        }

        // Preparar la consulta SQL para insertar un nuevo procedimiento y prescripción
        $consulta = "INSERT INTO p_y_p (id_paciente, f_procedimiento, proc_realizado, id_medico, medicamento) VALUES (?, ?, ?, ?, ?)";

        // Preparar la sentencia
        if ($sentencia = $conexion->prepare($consulta)) {
            // Vincular los parámetros de la consulta
            $sentencia->bind_param("issss", $id_paciente, $f_procedimiento, $proc_realizado, $id_medico, $medicamento);

            // Ejecutar la consulta
            if ($sentencia->execute()) {
                echo "<p>Procedimiento y Prescripción guardados correctamente.</p>";
            } else {
                echo "<p>Error al guardar el Procedimiento y Prescripción: " . $conexion->error . "</p>";
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




        <h2>Registrar Procedimiento</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="identificacion">Identificación del paciente:</label>
            <input type="text" id="identificacion" name="id_paciente" required><br>

            <label for="fecha_procedimiento">Fecha del Procedimiento:</label>
            <input type="date" id="fecha_procedimiento" name="f_procedimiento" required><br>

            <label for="procedimiento_realizado">Procedimiento Realizado:</label>
            <textarea id="procedimiento_realizado" name="proc_realizado" rows="4" cols="50" required></textarea><br>

            <label for="medico">Id Médico:</label>
            <input type="text" id="medico" name="id_medico" required><br>

            <label for="medicamento_suministrado">Medicamento Suministrado:</label>
            <input type="text" id="medicamento_suministrado" name="medicamento"><br>

            <input type="submit" value="Guardar Procedimiento">
        </form>
    </div>

    <div class="image-container">
        <img src="https://www.dentaltix.com/sites/default/files/Clinica-Vilagran-recepcion-3.jpg" alt="Imagen 1">
        <img src="https://www.shutterstock.com/image-photo/dental-office-visit-female-patient-260nw-2161688079.jpg" alt="Imagen 2">
    </div>
    <div class="clear"></div>
</div>

<div class="copyright">
    <p>&copy; <?php echo date("Y"); ?> ORTONOVA. Todos los derechos reservados.</p>
</div>

</body>
</html>

