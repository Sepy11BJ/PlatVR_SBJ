<?php
session_start();
if (empty($_SESSION["id"])) {
    header("location: login.php");
    exit(); // Asegúrate de que la ejecución del script se detenga después de redirigir
}

if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    // Incluye el archivo de conexión a la base de datos
    include "modelo/conexion.php";

    // Obtiene el ID del estudiante desde la URL
    $id_estudiante = $_GET["id"];

    // Prepara la consulta para eliminar al estudiante por su ID
    $query = "DELETE FROM usuario WHERE id = ?";

    // Preparar la declaración
    $stmt = mysqli_prepare($conexion, $query);

    if ($stmt) {
        // Vincular los parámetros
        mysqli_stmt_bind_param($stmt, "i", $id_estudiante);

        // Ejecuta la declaración
        if (mysqli_stmt_execute($stmt)) {
            // Estudiante eliminado con éxito, redirige a la página de estudiantes
            header("location: dashboard.php");
            exit();
        } else {
            // Error al ejecutar la declaración
            echo "Error al eliminar al estudiante.";
        }

        // Cierra la declaración
        mysqli_stmt_close($stmt);
    } else {
        // Error en la preparación de la declaración
        echo "Error en la preparación de la declaración.";
    }

    // Cierra la conexión a la base de datos
    mysqli_close($conexion);
} else {
    // Si no se proporciona un ID válido, redirige a la página de estudiantes
    header("location: dashboard.php");
    exit();
}
?>