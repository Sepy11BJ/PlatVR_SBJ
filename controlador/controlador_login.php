<?php
session_start();

if (!empty($_POST["btningresar"])) {
    if (!empty($_POST["usuario"]) && !empty($_POST["password"])) {
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];
        
        // Consulta para obtener datos del usuario, incluido el rol
        $sql = $conexion->prepare("SELECT id, nombres, apellidos, clave, rol_id FROM usuario WHERE usuario = ?");
        $sql->bind_param("s", $usuario);
        $sql->execute();
        $result = $sql->get_result();
        
        if ($result->num_rows === 1) {
            $datos = $result->fetch_assoc();
            $clave_almacenada = $datos["clave"];
            
            // Verificar la contraseña utilizando password_verify
            if (password_verify($password, $clave_almacenada)) {
                $_SESSION["id"] = $datos["id"];
                $_SESSION["nombre"] = $datos["nombres"];
                $_SESSION["apellido"] = $datos["apellidos"];
                
                // Verifica el rol del usuario
                $rol = $datos["rol_id"];
                
                switch ($rol) {
                    case 1:
                        header("location: ../dashboard.php");
                        break;
                        
                    case 2:
                        header("location: ../Pagina/Inicio2.php");
                        break;
                        
                    default:
                        break;
                }
            } else {
                echo "<div class='alert alert-danger'> Contraseña incorrecta </div>";
            }
        } else {
            echo "<div class='alert alert-danger'> Usuario no encontrado </div>";
        }
    } else {
        echo "<div class='alert alert-danger'> Campos vacíos </div>";
    }
}
?>