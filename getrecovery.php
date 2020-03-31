<?php
if (!isset($_POST['correo'])) {

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

require_once('shared/urls.php');
require_once('shared/ctx.php');
$mysqli = conectar();
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
$correo = htmlentities(addslashes($_POST['correo']));
$valid = "SELECT * FROM cttozen_clientes WHERE correo = '$correo' ";
$resultadoValid = $mysqli->prepare($valid);
$resultadoValid->execute();
$resultadoValid = $resultadoValid->get_result();
$fila = mysqli_num_rows($resultadoValid);
if ($fila > 0 && $fila < 2) {
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
    $uptok = "UPDATE cttozen_clientes SET token_id = '{$token_}' WHERE correo = '{$correo}'";
    $ejecutarUpdate = $mysqli->prepare($uptok);
    $ejecutarUpdate->execute();

    $mail->From = $smtpUsuario; // Email desde donde env�o el correo.
    $mail->FromName = 'Zen';
    $mail->AddAddress($correo); // Esta es la direcci�n a donde enviamos los datos del formulario
    $mail->Subject = "Restablece tu contraseña | Conttento Zen"; // Este es el titulo del email.

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
            <h1 style='width:50%; text-align:left; color:#fff; margin: 0 auto; padding-bottom:10px;'>Recupera tu contraseña</h1>
            <h2 style='width:50%;text-align:left;color:#fff;font-size:25px;margin: 0 auto;'>Lamentamos que hayas extraviado tu contraseña pero, no te preocupes con el siguiente enlace podas actualizar a una nueva.</h2>
            <p  style='width:50%;text-align:left;color:#fff;font-size:25px;margin: 0 auto;'>Copia el enlace o haz clic en el botón de restablecer.</p>
            </td>
            </tr>
            <tr>
            <td>
            <p style='width:100%;text-align:center;background-color:#ffc428;color:#fff;font-weight:bold;margin:0 auto;border-radius:50px;max-width: 200px;padding: 10px;'><a href='" . $homef . "restablecer-contrasena/?r=" . $token_ . "' target='_blank' style='text-align:center;/*! background-color:#1d647e; */color:#fff;font-size:20px;font-weight:bold;text-decoration: none;'>Restablecer</a></p>
            </td>
            </tr>
            <tr>
            <td>
            <p style='width:50%;background-color:#cccccc;color:#fff;font-weight:bold;margin:0 auto;padding: 10px;'><a href='" . $homef . "restablecer-contrasena/?r=" . $token_ . "' target='_blank' style='color:#000;font-size:14px;font-weight:bold;text-decoration:none;'>" . $homef . "restablecer-contrasena/?r=" . $token_ . "</a></p>
            </td>
            </tr>
            <br><br>
            </body>
            </html>";
    // Texto del email en formato HTML
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    $estadoEnvio = $mail->Send();
    if (!$estadoEnvio) {
        $jsondata['bol'] = 0;
        $jsondata['tipo'] = 'error';
        $jsondata['titulo'] = 'Oopss...!';
        $jsondata['msg'] = $oMail->ErrorInfo;
        $res = json_encode($jsondata);
        echo $res;
    } else {
        $jsondata['bol'] = 1;
        $jsondata['tipo'] = 'success';
        $jsondata['titulo'] = 'Enhorabuena!';
        $jsondata['msg'] = 'Hemos enviado un correo para que puedas actualizar tu contraseña. Si no localizas el correo revisa la carpeta de SPAM.';
        $res = json_encode($jsondata);
        echo $res;
    }
} else {
    $jsondata['bol'] = 0;
    $jsondata['tipo'] = 'error';
    $jsondata['titulo'] = 'Oopss..!';
    $jsondata['msg'] = 'Este usuario no existe.';
    $res = json_encode($jsondata);
    echo $res;
}
