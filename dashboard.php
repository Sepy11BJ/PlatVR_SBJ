<?php
session_start();
if (empty($_SESSION["id"])) {
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/styleDas.css">
    <link rel="stylesheet" href="css/tabla.css">
    <title>Dashboard</title>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="logo">
            <i class='logocole'>
                <img src="img/LogoCole.png">
            </i>
            <div class="logo-container">
                <br>
                <div class="logo-name"><span>Plataforma</span></div>
                <div class="logo-subname">Virtual</div>
            </div>
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

            <!-- Agregar un formulario de búsqueda -->
            <form action="#" method="GET" class="search-form">
                <label for="grado">Buscar por Grado:</label>
                <select id="grado" name="grado">
                    <option value="">Mostrar Todos</option> <!-- Opción para mostrar todos -->
                    <option value="1ro de Primaria">1ro de Primaria</option>
                    <option value="2do de Primaria">2do de Primaria</option>
                    <option value="3ro de Primaria">3ro de Primaria</option>
                    <option value="4to de Primaria">4to de Primaria</option>
                    <option value="5to de Primaria">5to de Primaria</option>
                    <option value="6to de Primaria">6to de Primaria</option>
                </select>
                <button type="submit">Buscar</button>
            </form>

            <!-- Mostrar una tabla con la lista de estudiantes -->
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Grado Academico</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "modelo/conexion.php";

                        $query = "SELECT * FROM usuario WHERE rol_id = 2";

                        if (isset($_GET['grado']) && !empty($_GET['grado'])) {
                            $grado = $_GET['grado'];
                            $query .= " AND GradoAca = '$grado'";
                        }

                        $result = mysqli_query($conexion, $query);

                        if ($result) {
                            $contador = 1; // Inicializa un contador
                            while ($estudiante = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $contador . "</td>"; // Muestra el contador como número entero
                                echo "<td>{$estudiante['nombres']}</td>";
                                echo "<td>{$estudiante['apellidos']}</td>";
                                echo "<td>{$estudiante['GradoAca']}</td>";
                                echo "<td>";
                                echo "<a href='editar_estudiante.php?id={$estudiante['id']}' class='btn-editar'onclick='return confirmarEdicion({$estudiante['id']})'>Editar</a>";
                                echo "<a href='borrar_estudiante.php?id={$estudiante['id']}' class='btn-borrar' onclick='return confirmarBorrado({$estudiante['id']})'>Borrar</a>";
                                echo "</td>";
                                echo "</tr>";
                                $contador++; // Incrementa el contador
                            }
                        } else {
                            echo "No se encontraron estudiantes.";
                        }

                        // Cierra la conexión a la base de datos (si es necesario)
                        ?>
                    </tbody>
                </table>
            </div>
        </main>

    </div>

    <script src="js/dashboard.js"></script>
    <script>
        // Función para mostrar el mensaje de confirmación
        function confirmarBorrado(id) {
            const confirmacion = confirm("¿Estás seguro de borrar este estudiante?");
            return confirmacion;
        }
    </script>
    <script>
        function confirmarEdicion() {
            return confirm("¿Estás seguro de que deseas editar este estudiante?");
        }
    </script>

</body>

</html>