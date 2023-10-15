<?php
session_start();
if (empty($_SESSION["id"])) {
    header("location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "login";

    $conexion = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    $nombre = mysqli_real_escape_string($conexion, $_POST["nombre"]);
    $apellido = mysqli_real_escape_string($conexion, $_POST["apellido"]);
    $grado = mysqli_real_escape_string($conexion, $_POST["grado"]);
    $rol_id = intval($_POST["rol_id"]);

    // Consulta para obtener el último número de usuario registrado
    $consulta = "SELECT MAX(CAST(SUBSTRING(usuario, 2) AS SIGNED)) AS max_usuario FROM usuario";
    $resultado = mysqli_query($conexion, $consulta);
    $fila = mysqli_fetch_assoc($resultado);

    // Obtiene el último número de usuario y calcula el siguiente
    $ultimoNumeroUsuario = $fila["max_usuario"];
    $siguienteNumeroUsuario = intval($ultimoNumeroUsuario) + 1;

    // Formatea el nuevo usuario como "E00x"
    $nuevoUsuario = "E" . str_pad($siguienteNumeroUsuario, 3, '0', STR_PAD_LEFT);

    // Encripta la contraseña antes de almacenarla en la base de datos
    $clave = mysqli_real_escape_string($conexion, $_POST["clave"]);
    $clave_encriptada = password_hash($clave, PASSWORD_BCRYPT);

    $sql = "INSERT INTO usuario (nombres, apellidos, usuario, clave, GradoAca, rol_id)
            VALUES ('$nombre', '$apellido', '$nuevoUsuario', '$clave_encriptada', '$grado', $rol_id)";

    if (mysqli_query($conexion, $sql)) {
        $_SESSION["mensaje"] = "Estudiante agregado exitosamente.";
    } else {
        $_SESSION["mensaje"] = "Error al agregar estudiante: " . mysqli_error($conexion);
    }

    mysqli_close($conexion);

    header("Location: estudiantes.php");
    exit;
}
?>