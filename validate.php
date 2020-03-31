<?php
include 'shared/urls.php';
if (
    !isset($_POST['correo']) &&
    !isset($_POST['contrasena'])
) {

    echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
    echo "Por favor, vuelva atrás y verifique la información ingresada<br />";
    die();
};

include('shared/ctx.php');
$mysqli = conectar();
$salt = "M%fWxM#aQ8$3Gj";
$usuario = htmlentities(addslashes($_POST['correo']));
$contrasena = htmlentities($_POST['contrasena']);
$salt = "e13!SJFP!JM%fWxM#90Nqf%nb9YFCaQ8$3GNxJt7gakAGxiEPj";
$contrasena = hash('sha256', $salt . $contrasena);

$consultaUsuario = "SELECT * FROM cttozen_clientes WHERE correo='{$usuario}' and contrasena='{$contrasena}'";
$resultadoValid = $mysqli->prepare($consultaUsuario);
$resultadoValid->execute();
$resultadoValid = $resultadoValid->get_result();
$fila = mysqli_num_rows($resultadoValid);

if ($fila == 1) {
    session_start();
    $_SESSION['usuariocliente'] = $usuario;
    while ($res =  $resultadoValid->fetch_assoc()) {
        $_SESSION['nombrecliente'] = $res['nombre'];
        $_SESSION['apellidoscliente'] = $res['apellidos'];
        $_SESSION['telefonocliente'] = $res['telefono'];
        $_SESSION['correocliente'] = $res['correo'];
        $_SESSION['estatuscliente'] = $res['estatus'];
        $_SESSION['tokencliente'] = $res['token_id'];
        //CAMBIAR TOKEN!!!!
    }
    $jsondata['bol'] = 0;
    $jsondata['tipo'] = '';
    $jsondata['titulo'] = '';
    $jsondata['msg'] = '';
    $res = json_encode($jsondata);
    echo $res;
} else {
    $jsondata['bol'] = 1;
    $jsondata['tipo'] = 'error';
    $jsondata['titulo'] = 'Oopss..!';
    $jsondata['msg'] = 'Verifique los datos.';
    $res = json_encode($jsondata);
    echo $res;
}
