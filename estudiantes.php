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
    <link rel="stylesheet" href="css/styleEstu.css">
    <link rel="stylesheet" href="css/styleEstu_agregar.css">
    <title>Estudiantes</title>
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
            <li><a href="dashboard.php"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li class="active"><a href="estudiantes.php"><i class='bx bx-analyse'></i>Estudiantes</a></li>
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
    </div>
    <!-- End of Sidebar -->

    <!-- Main Content -->
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

            <div class="add-student-section">
                <div class="header">
                    <div class="left">
                        <h1>Agregar Estudiante</h1>
                    </div>
                </div>

                <?php
                if (isset($_SESSION["mensaje"])) {
                    echo '<script type="text/javascript">alert("' . $_SESSION["mensaje"] . '");</script>';
                    unset($_SESSION["mensaje"]);
                }
                ?>

                <form action="procesar_creacion_estudiante.php" method="POST">
                    <label for="nombre">Nombres:</label>
                    <input type="text" id="nombre" name="nombre" required>
                    <label for="apellido">Apellidos:</label>
                    <input type="text" id="apellido" name="apellido" required>
                    <label for="usuario">Usuario:</label>

                    <?php
                    $servername = "localhost:3307";
                    $username = "root";
                    $password = "";
                    $dbname = "login";

                    $conexion = mysqli_connect($servername, $username, $password, $dbname);

                    if (!$conexion) {
                        die("Error de conexión: " . mysqli_connect_error());
                    }

                    // Consulta para obtener el último número de usuario registrado
                    $sql = "SELECT MAX(usuario) AS max_usuario FROM usuario";
                    $result = mysqli_query($conexion, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $ultimo_usuario = $row['max_usuario'];

                    // Extrae el número actual (sin la 'E') y lo incrementa en uno
                    $numero_actual = intval(substr($ultimo_usuario, 1)) + 1;

                    // Formatea el nuevo número de usuario como "E001"
                    $nuevo_usuario = "E" . str_pad($numero_actual, 3, "0", STR_PAD_LEFT);

                    mysqli_close($conexion);
                    ?>

                    <input type="text" id="usuario" name="usuario" value="<?php echo $nuevo_usuario; ?>" readonly>

                    <label for="clave">Contraseña:</label>
                    <input type="password" id="clave" name="clave" required>

                    <label for="grado">Grado Académico:</label>
                    <select id="grado" name="grado" required>
                        <option value="1ro de Primaria">1ro de primaria</option>
                        <option value="2do de Primaria">2do de primaria</option>
                        <option value="3ro de Primaria">3ro de primaria</option>
                        <option value="4to de Primaria">4to de primaria</option>
                        <option value="5to de Primaria">5to de primaria</option>
                        <option value="6to de Primaria">6to de primaria</option>
                    </select>
                    <br><br>
                    <input type="hidden" name="rol_id" value="2"> <!-- Valor fijo para rol_id = 2 (estudiante) -->
                    <button type="submit" class="btn btn-primary">Guardar Estudiante</button>
                    <button type="button" id="showPassword">Mostrar Contraseña</button>
                </form>

            </div>
        </main>

    </div>

    <script src="js/dashboard.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('clave');
            const showPasswordButton = document.getElementById('showPassword');

            showPasswordButton.addEventListener('click', function() {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    showPasswordButton.textContent = 'Ocultar Contraseña';
                } else {
                    passwordInput.type = 'password';
                    showPasswordButton.textContent = 'Mostrar Contraseña';
                }
            });
        });
    </script>
</body>

</html>