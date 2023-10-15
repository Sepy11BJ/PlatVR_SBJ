

<?php  

$nombre = filter_var($_POST['nombre'],FILTER_SANITIZE_STRING);
$correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
$telefono = filter_var($_POST['telefono'],FILTER_SANITIZE_STRING);
$mensaje = filter_var($_POST['mensaje'],FILTER_SANITIZE_STRING);
 

//echo $correo . " " . $nombre . " " . $mensaje;

if(!empty($correo) && !empty($nombre) && !empty($telefono) && !empty($mensaje)){
    $destino = 'colegiosjbhuarmey@gmail.com';
    $asunto = 'Atencion al estudiante 👨🏻‍🏫'; 
    $cuerpo = '
        <html> 
            <head> 
                <title>Atencion al estudiante</title> 
            </head>

            <body> 
                <h2> De: '.$nombre.'</h2>
                <h2> Email: '.$correo.'</h2>
                <h2> Celular: '.$telefono.'</h2>

                <h2>'.$mensaje.'</h2> 
            </body>
        </html>
    ';

    //para el envío en formato HTML 
    $headers = "MIME-Version: 1.0\r\n"; 
    $headers .= "Content-type: text/html; charset=UTF8\r\n"; 

    //dirección del remitente

    $headers .= "FROM: $nombre <$correo>\r\n";
    mail($destino,$asunto,$cuerpo,$headers);
    header('Location:mensaje-de-envio.html'); 
    // echo "email enviado exitosamente"; 
    
   
} else{
    echo " Error al enviar el correo";
}

?>


<!-- ->
