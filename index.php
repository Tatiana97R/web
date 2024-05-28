<!DOCTYPE html>
<html>
<head>
    <title>Ortonova</title>
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
            max-width: 100%;
            height: auto;
            display: block;
            margin-bottom: 20px; /* Espacio entre las imágenes */
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
</ul>

<div class="content">
    <div class="intro-container">
        <center > <h1>ORTONOVA</h1> </center>
        <h2>Quienes somos</h2>
        <p>El objetivo principal de Clínica Ortonova es ofrecerte la mayor calidad en los tratamientos de ortodoncia y
        nos apoyamos en la innovación y las nuevas tecnologías para hacerlo de forma más precisa y con mayor rapidez.
        Por eso hemos sido la primera clínica de Cartagena en incorporar a nuestros equipos un escáner intraoral iTero de alta
        precisión que nos permite obtener una imagen instantánea y exacta de la boca en 3D sin someterte a ningún tipo de radiación.
        </p>
        <p>Hemos diseñado los espacios de nuestra clínica para que estimulen tus sentidos, con espacios abiertos, coloridos
        y luminosos usando materiales nobles como la madera y el cristal, que dan sensación de calidez y amplitud.
        Nuestro objetivo es que te sientas como en casa desde el momento que cruces la puerta.</p>

        <h2>Nuestros servicios</h2>
        <p>En Clínica Dental Ortonova estaremos encantados de atenderte. Porque no todas las bocas son iguales,
        cada una requiere de la técnica adecuada. Acércate a nuestra Clínica Dental en Cartagena y asesórate de
        cuál es el tratamiento que mejor y más rápido te hará brillar.</p>
        <h4>Ortodoncia Invisible</h4>
        <p>Descubre las ventajas del sistema por el que llevamos apostando más de 7 años y que ha corregido más de 500 sonrisas
        en tiempo record, sin los incómodos brackets y con la que podrás sonreír desde el primer día sin que se note que la
        llevas puesta. La solución perfecta para mantener tu ritmo de vida sin contratiempos.</p>
        <h4>Ortodoncia Demon</h4>
        <p>El Sistema Damon ha revolucionado por completo la ortodoncia actual, tanto en adultos como en niños.
        El reducido tamaño de estos brackets y su sistema de autoligado hacen que la Ortodoncia sea más estética,
        más rápida y menos incómoda para el paciente entre otras muchas más ventajas</p>
        <h4>Ortondocia Dentomaxilar</h4>
        <p>La Ortodoncia Dentomaxilar se utiliza en niños, entre los 7 y los 10 años de edad para corregir anomalías
        funcionales. Los problemas ortodóncicos no siempre van unidos a la estética, la única que es detectada
        por los padres. Pueden acusar problemas derivados de la mala colocación de sus dientes que pueden condicionar
        la salud de nuestros hijos. Ven y cuida ya de su futura sonrisa.</p>
    
    </div>

    <div class="image-container">
        <img src="https://img.freepik.com/foto-gratis/dentista-realizando-tratamiento-e-intervencion-dental-mujer-mayor-paciente-anciano-examen-medico-dentista-consultorio-dental-equipo-naranja_482257-12560.jpg" alt="Imagen 1">
        <img src="https://img.freepik.com/foto-gratis/vacie-oficina-hospital-estomatologia-dental-moderna-nadie-equipado-instrumentos-dentales-listos-tratamiento-medico-ortodoncista-imagenes-radiografia-dental-exhibicion_482257-9418.jpg" alt="Imagen 2">
    </div>
</div>

<div class="copyright">
    <p>&copy; <?php echo date("Y"); ?> ORTONOVA. Todos los derechos reservados.</p>
</div>

</body>
</html>