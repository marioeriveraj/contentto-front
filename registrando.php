<?php
if (
    !isset($_POST['nombre']) &&
    !isset($_POST['apellido']) &&
    !isset($_POST['telefono']) &&
    !isset($_POST['correo']) &&
    !isset($_POST['contrasena'])
) {

    // echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
    // echo "Por favor, verifique la información ingresada<br />";
    echo "<script> Swal.fire({type: 'error',title: 'Oops...',text: 'Algo salio mal, revisa los datos y vuelve a intentarlo!'});</script>";
    die();
};

function generateRandomString($length = 64)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

require_once ('shared/urls.php'); 
require_once 'mailer/PHPMailer.php';
require_once 'mailer/SMTP.php';
require_once 'mailer/class.phpmailer.php';
require_once 'mailer/class.smtp.php';
// Datos de la cuenta de correo utilizada para enviar v�a SMTP
$smtpHost = "mail.fawstudio-dev.site";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "marcomireles@fawstudio-dev.site";  // Mi cuenta de correo
$smtpClave = "marco123";  // Mi contraseña
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Port = 587;
$mail->IsHTML(true);
$mail->CharSet = "utf-8";
$mail->SMTPDebug  = false;                     // enables SMTP debug information (for testing)
$mail->SMTPAuth   = true;                  // enable SMTP authentication
//$mail->Port       = 26;                    // set the SMTP port for the GMAIL server

// VALORES A MODIFICAR //
$mail->Host = $smtpHost;
$mail->Username = $smtpUsuario;
$mail->Password = $smtpClave;


$jsondata = array();

$nombre = htmlentities(addslashes($_POST['nombre']));
$apellidos = htmlentities(addslashes($_POST['apellidos']));
$telefono = htmlentities(addslashes($_POST['telefono']));
$correo = htmlentities(addslashes($_POST['correo']));
$contrasena = htmlentities($_POST['contrasena']);
$contrasena = str_replace(' ', '', $contrasena);
$contrasenalong = strlen($contrasena);
if ($contrasenalong >= 8) {
    
    $contrasena = hash('sha256', $salt . $contrasena);
    include('shared/ctx.php');
    $mysqli = conectar();

    $valid = "SELECT * FROM cttozen_clientes WHERE correo = '$correo' ";
    $resultadoValid = $mysqli->prepare($valid);
    $resultadoValid->execute();
    $resultadoValid = $resultadoValid->get_result();
    $fila = mysqli_num_rows($resultadoValid);


    if ($fila == 0) {


        $token_ = generateRandomString();


        $consultaToken = "SELECT * FROM cttozen_clientes WHERE token_id='{$token_}'";
        $ejecutar = $mysqli->prepare($consultaToken);
        $ejecutar->execute();
        $ejecutar = $ejecutar->get_result();
        $filaconsultaToken = mysqli_num_rows($ejecutar);
        if ($filaconsultaToken > 0) {
            $i = 1;
            while ($i > 0) {
                $token_ = generateRandomString();
                $consultaToken = "SELECT * FROM cttozen_clientes WHERE token_id='{$token_}'";
                $ejecutar = $mysqli->prepare($consultaToken);
                $ejecutar->execute();
                $ejecutar = $ejecutar->get_result();
                $filaconsultaToken = mysqli_num_rows($ejecutar);
                if ($filaconsultaToken > 0) { } else {
                    $i--;
                }
            }
        }


        $insUser = "INSERT INTO cttozen_clientes ( nombre, apellidos, telefono, correo, contrasena, estatus, token_id) VALUE ('{$nombre}','{$apellidos}','{$telefono}','{$correo}','{$contrasena}','inactivo', '{$token_}')";
        $resultadoIns = $mysqli->prepare($insUser);
        $resultadoIns->execute();
        $numeridUser = mysqli_insert_id($mysqli);

        $mail->From = $smtpUsuario; // Email desde donde env�o el correo.
        $mail->FromName = 'Zen';
        $mail->AddAddress($correo); // Esta es la direcci�n a donde enviamos los datos del formulario
        $mail->Subject = "¡Comienza a sentir Conttento!"; // Este es el titulo del email.

        $mail->Body = "
            <html> 
            <body style='background-image:url({$correoBienvenida});background-size: cover;background-position: top left;background-repeat: no-repeat;'>
            <table style='width:100%;margin-left:auto;margin-right:auto; height: 800px;'>
            <tr>
            <td style='text-align: center;'>
            <img src='{$logoBienvenida}' max-width='256px'>
            </td>
            </tr>
            <tr>
            <td>
            <h1 style='width:100%; text-align:center; color:#fff;'>¡Comienza a sentir Conttento! </h1>
            <h2 style='width:50%;text-align:center;color:#fff;font-size:25px;margin: 0 auto;'>El escape que tanto necesitas está más cerca de lo que te imaginas.</h2>
            <p  style='width:50%;text-align:center;color:#fff;font-size:25px;margin: 0 auto;'>Te esperamos, <br>
            Zen.</p>
            </tr>
            </td>
            <tr>
            <td>
            <p style='width:30%;text-align:center;background-color:#ffc428;color:#fff;/*! font-size:14px; */font-weight:bold;margin: 0 auto;border-radius: 50px;'><a href='".$homef."activacion/?p=" . $token_ . "' target='_blank' style='text-align:center;/*! background-color:#1d647e; */color:#fff;font-size:20px;font-weight:bold;text-decoration: none;'>Haz clic aqui para activar tu cuenta!</a></p>
            </tr>
            </td>
            <br><br>
            </body>
            </html>"; // Texto del email en formato HTML
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        $estadoEnvio = $mail->Send();
        if (!$estadoEnvio) {
            $jsondata['tipo'] = 'error';
            $jsondata['titulo'] = 'Oopss...!';
            $jsondata['msg'] = $oMail->ErrorInfo;
            $res = json_encode($jsondata);
            echo $res;
        } else {
            $jsondata['tipo'] = 'success';
            $jsondata['titulo'] = 'Enhorabuena!';
            $jsondata['msg'] = 'Los datos fueron registrados. Hemos enviado un correo de confirmacion, solo haz clic en el enlace y listo!. Si no localizas el correo revisa la carpeta de SPAM.';
            $res = json_encode($jsondata);
            echo $res;
        }
    } else {
        $jsondata['tipo'] = 'error';
        $jsondata['titulo'] = 'Oopss..!';
        $jsondata['msg'] = 'Este correo ya esta registrado.';
        $res = json_encode($jsondata);
        echo $res;
    }
} else {
    $jsondata['tipo'] = 'error';
    $jsondata['titulo'] = 'Oopss..!';
    $jsondata['msg'] = 'Contrasena demasiado corta. Min 8 caracteres.';
    $res = json_encode($jsondata);
    echo $res;
}
