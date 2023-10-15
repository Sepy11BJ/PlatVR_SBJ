<?php
session_start();
if (empty($_SESSION["id"])) {
    header("location: login.php");
    exit;
}

include "modelo/conexion.php";

// Consulta SQL para obtener la cantidad de estudiantes por grado
$query = "SELECT GradoAca, COUNT(*) as TotalEstudiantes FROM usuario WHERE rol_id = 2 GROUP BY GradoAca";
$result = mysqli_query($conexion, $query);

// Inicializa arrays para almacenar los datos de los grados y la cantidad de estudiantes
$grados = [];
$cantidadEstudiantes = [];

$colores = ['rgba(75, 192, 192, 0.6)', 'rgba(255, 99, 132, 0.6)', 'rgba(255, 206, 86, 0.6)', 'rgba(54, 162, 235, 0.6)', 'rgba(153, 102, 255, 0.6)'];

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $grados[] = $row['GradoAca'];
        $cantidadEstudiantes[] = $row['TotalEstudiantes'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/styleDas.css">
    <title>Gráfico de Estudiantes por Grado</title>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="logo">
            <i class='logocole'>
                <img src="img/LogoCole.png">
            </i>
            <div class="logo-name"><span>Plat</span>VR</div>
        </a>
        <ul class="side-menu">
            <li class="active"><a href="dashboard.php"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li><a href="estudiantes.php"><i class='bx bx-analyse'></i>Estudiantes</a></li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="controlador/controlador_cerrar_sesion.php" class="logout">
                    <p>
                        <i class='bx bx-log-out-circle'></i>
                        Cerrar Sesión
                </a>
            </li>
        </ul>
    </div>

    <div class="content">
        <!-- Navbar -->
        <nav>
            <i class='bx bx-menu'></i>
            <form action="#">
                <div class="form-input">

                    <button class="search-btn" type="submit"><i class=''></i></button>

                </div>
            </form>
            <input type="checkbox" id="theme-toggle" hidden>
            <label for="theme-toggle" class="theme-toggle"></label>
            <a href="#" class="profile">
                <img src="img/png.png">
            </a>
        </nav>

        <!-- End of Navbar -->

        <main>
            <div class="header">
                <div class="left">
                    <h1>Dashboard</h1>
                </div>
                <a href="descargar_excel.php" class="report">
                    <i class='bx bx-cloud-download'></i>
                    <span>Descargar Excel</span>
                </a>
            </div>

            <!-- Contenedor del gráfico -->
            <div style="max-width: 600px; margin: 0 auto;">
                <canvas id="estudiantesPorGrado"></canvas>
            </div>

            <!-- Script para generar el gráfico -->
            <script>
                var ctx = document.getElementById('estudiantesPorGrado').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: <?php echo json_encode($grados); ?>,
                        datasets: [{
                            label: 'Estudiantes por Grado',
                            data: <?php echo json_encode($cantidadEstudiantes); ?>,
                            backgroundColor: <?php echo json_encode($colores); ?>, // Asigna colores a las barras
                            borderColor: 'rgba(0, 0, 0, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            x: {
                                beginAtZero: true, // Comienza el eje X desde 0
                            },
                            y: {
                                beginAtZero: true, // Comienza el eje Y desde 0
                                precision: 0, // Establece la precisión del eje Y a 0 (enteros)
                                stepSize: 1, // Establece el tamaño del paso del eje Y a 1
                            }
                        }
                    }
                });
            </script>
            <script src="js/dashboard.js"></script>
</body>

</html>