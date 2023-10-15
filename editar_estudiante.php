<?php
session_start();
if (empty($_SESSION["id"])) {
    header("location: login.php");
}

// Verificar si se proporciona un ID de estudiante en la URL
if (!isset($_GET["id"])) {
    header("location: dashboard.php"); // Redirige si no se proporciona un ID
}

// Incluir el archivo de conexión a la base de datos
include "modelo/conexion.php";

$idEstudiante = $_GET["id"];
$cambioRealizado = false; // Inicializar la variable

// Verificar si se ha enviado el formulario de edición
if (isset($_POST["editarEstudiante"])) {
    // Obtener los datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $usuario = $_POST["usuario"];
    $clave = $_POST["clave"];
    $grado = $_POST["grado"];

    // Validar y procesar los datos (asegúrate de validarlos y evitar SQL injection)
    // ...

    // Actualizar los datos del estudiante en la base de datos
    $query = "UPDATE usuario SET nombres='$nombre', apellidos='$apellido', usuario='$usuario', clave='$clave', GradoAca='$grado' WHERE id=$idEstudiante";

    $result = mysqli_query($conexion, $query);

    if ($result) {
        // Marcar el cambio como realizado
        $cambioRealizado = true;
    } else {
        echo "Error al editar el estudiante: " . mysqli_error($conexion);
    }
}

// Obtener los datos actuales del estudiante con el ID proporcionado
$query = "SELECT * FROM usuario WHERE id=$idEstudiante";

$result = mysqli_query($conexion, $query);

if (!$result) {
    echo "Error al obtener los datos del estudiante: " . mysqli_error($conexion);
    exit();
}

if (mysqli_num_rows($result) === 0) {
    echo "No se encontró ningún estudiante con este ID.";
    exit();
}

$estudiante = mysqli_fetch_assoc($result);

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/styleEstu.css">
    <link rel="stylesheet" href="css/styleEstu_editar.css">
    <title>Editar Estudiante</title>
</head>

<body>
    <!-- Tu código HTML para el formulario de edición -->
    <div class="add-student-section">
        <div class="header">
            <div class="left">
                <h1>Editar Estudiante</h1>
            </div>
        </div>

        <!-- Agrega un div para mostrar el mensaje -->
        <div id="mensaje" class="mensaje"></div>

        <form action="" method="POST">
            <label for="nombre">Nombres:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $estudiante['nombres']; ?>" required>
            <label for="apellido">Apellidos:</label>
            <input type="text" id="apellido" name="apellido" value="<?php echo $estudiante['apellidos']; ?>" required>
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" value="<?php echo $estudiante['usuario']; ?>" required>

            <!-- Campo de contraseña -->
            <label for="clave">Contraseña:</label>
            <input type="password" id="clave" name="clave" value="<?php echo $estudiante['clave']; ?>" required>

            <label for="grado">Grado Académico:</label>
            <select id="grado" name="grado" required>
                <option value="1ro de Primaria" <?php if ($estudiante['GradoAca'] === '1ro de Primaria') echo 'selected'; ?>>1ro de primaria</option>
                <option value="2do de Primaria" <?php if ($estudiante['GradoAca'] === '2do de Primaria') echo 'selected'; ?>>2do de primaria</option>
                <option value="3ro de Primaria" <?php if ($estudiante['GradoAca'] === '3ro de Primaria') echo 'selected'; ?>>3ro de Primaria</option>
                <option value="4to de Primaria" <?php if ($estudiante['GradoAca'] === '4to de Primaria') echo 'selected'; ?>>4to de Primaria</option>
                <option value="5to de Primaria" <?php if ($estudiante['GradoAca'] === '5to de Primaria') echo 'selected'; ?>>5to de Primaria</option>
                <option value="6to de Primaria" <?php if ($estudiante['GradoAca'] === '6to de Primaria') echo 'selected'; ?>>6to de Primaria</option>
            </select>
            <br><br>
            <input type="hidden" name="rol_id" value="2">
            <button type="submit" name="editarEstudiante" class="btn btn-primary">Guardar Cambios</button>
            <button type="button" id="showPassword">Mostrar Contraseña</button>
            <a href="dashboard.php" class="btn btn-secondary">Cancelar Edición</a>
        </form>
    </div>

    <!-- Tu código JavaScript, estilos y otros elementos -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('clave');
            const showPasswordButton = document.getElementById('showPassword');
            const mensaje = document.getElementById('mensaje'); // Elemento para mostrar el mensaje

            showPasswordButton.addEventListener('click', function() {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    showPasswordButton.textContent = 'Ocultar Contraseña';
                } else {
                    passwordInput.type = 'password';
                    showPasswordButton.textContent = 'Mostrar Contraseña';
                }
            });

            // Función para mostrar el mensaje
            function mostrarMensaje(texto, tipo) {
                mensaje.textContent = texto;
                mensaje.classList.add(tipo); // Agrega una clase de estilo (por ejemplo, "success" o "error")
                mensaje.style.display = 'block'; // Muestra el mensaje
            }

            // Verificar si se ha realizado un cambio y mostrar un mensaje si es así
            <?php if ($cambioRealizado) { ?>
                mostrarMensaje('Cambio realizado', 'success');
                // Redirigir a dashboard.php después de 2 segundos
                setTimeout(function() {
                    window.location.href = 'dashboard.php';
                }, 1000);
            <?php } ?>
        });
    </script>
</body>

</html>