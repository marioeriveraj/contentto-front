<?php session_start();

if (
    !isset($_SESSION['correocliente']) &&
    !isset($_SESSION['estatuscliente']) &&
    !isset($_SESSION['nombrecliente']) &&
    !isset($_SESSION['apellidoscliente']) &&
    !isset($_SESSION['tokencliente']) 
) {

    // echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
    // echo "Por favor, verifique la información ingresada<br />";
    header('Location:'.$homef.'login.php');
};
if(
    !isset($_POST['entrada']) &&
    !isset($_POST['salida']) &&
    !isset($_POST['prec']) &&
    !isset($_POST['huespedes'])
){
    header('Location:'.$homef.'login.php');
};

$entrada = $_POST['entrada'];
$salida = $_POST['salida'];
$huespedes = $_POST['huespedes'];
$precio = $_POST['prec'];
$nombreCompleto = $_SESSION['nombrecliente'] .' '. $_SESSION['apellidoscliente'];
$correo = $_SESSION['correocliente'];

include('shared/ctx.php');
$mysqli = conectar();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Conttento</title>
    <link rel="shortcut icon" type="image/png" href="dist/images/fav-icon.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous" />
    <link href="node_modules/@fullcalendar/core/main.css" rel="stylesheet" />
    <link href="node_modules/@fullcalendar/daygrid/main.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../style.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.conekta.io/js/latest/conekta.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</head>

<body>
    <!-- Navigation -->
    <?php include 'shared/menu.php'; ?>
    <section class="mt-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <form id="card-form">

                        <input type="hidden" name="conektaTokenId" id="conektaTokenId" value="">

                        <div class="card">
                            <div class="card-header">
                                <div class="row display-tr">
                                    <h3>Pago en línea</h3>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>
                                            Nombre del tarjetahabiente
                                        </label>
                                        <input value="<?php echo $nombreCompleto ;?>" data-conekta="card[name]" class="form-control" name="name" id="name" type="text">
                                    </div>
                                    <div class="col-md-6">
                                        <label>
                                            Número de tarjeta
                                        </label>
                                        <input value="" name="card" id="card" data-conekta="card[number]" class="form-control" type="text" maxlength="16">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>
                                            CVC
                                        </label>
                                        <input value="399" data-conekta="card[cvc]" class="form-control" type="text" maxlength="4">
                                    </div>
                                    <div class="col-md-6">
                                        <label>
                                            Fecha de expiración (MM/AA)
                                        </label>
                                        <div>
                                            <input style="width:50px; display:inline-block" value="11" data-conekta="card[exp_month]" class="form-control" type="text" maxlength="2">
                                            <input style="width:50px; display:inline-block" value="20" data-conekta="card[exp_year]" class="form-control" type="text" maxlength="2">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label><span>Email</span></label>
                                        <input class="form-control" type="text" name="email" id="email" maxlength="200" value="<?php echo $correo; ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Concepto</label>
                                        <input class="form-control" type="text" name="description" id="description" maxlength="100" value="Habitacion para <?php echo $huespedes; ?> personas">
                                    </div>
                                    <div class="col-md-4">
                                        <label><span>Fecha Entrada</span></label>
                                        <input class="form-control" type="text" name="fechaentrada" id="fechaentrada" maxlength="200" value="<?php echo $entrada; ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <label><span>Fecha Salida</span></label>
                                        <input class="form-control" type="text" name="fechasalida" id="fechasalida" maxlength="200" value="<?php echo $salida; ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Monto</label>
                                        <input class="form-control"  type="number" name="total" id="total" value="<?php echo $precio; ?>">
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12" style="text-align:center;">
                                        <button class="btn btn-success btn-lg">
                                            <i class="fa fa-check-square"></i> PAGAR
                                        </button>
                                    </div>

                                </div>

                            </div>
                        </div>


                    </form>

                </div>
            </div>
        </div>
    </section>

    <!-- ya aqui se termina alv la pagina bye -->
    <footer>
        <div class="container">
            <div class="row align-items-center text-center">
                <div class="col-sm-2">
                    <img class="img-fluid" src="./dist/images/Logotipo.png" alt="" />
                </div>
                <div class="col-sm-8">
                    <p>Términos y condiciones</p>
                    <p>Avisos de privacidad</p>
                </div>
                <div class="col-sm-2">
                    <div class="row">
                        <div class="col-4"><i class="fab fa-facebook-f"></i></div>
                        <div class="col-4"><i class="fab fa-instagram"></i></div>
                        <div class="col-4"><i class="fab fa-twitter"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script>
        Conekta.setPublicKey("key_FhMeJcih42q8qHxsRw5uTLg");



        $(document).ready(function() {

            $("#card-form").submit(function(e) {
                e.preventDefault();

                var $form = $("#card-form");

                Conekta.Token.create($form, conektaSuccessResponseHandler, conektaErrorResponseHandler);
            });

            function jsPay() {
                console.log('en el jspay');
                let params = $("#card-form").serialize();
                let url = "pay.php";
                $.ajax({
                    type: 'post',
                    url: url,
                    data: params,
                    success: function(data) {
                        if (data == 1) {
                            Swal.fire(
                                'Pago exitoso!',
                                'Conttento Zen',
                                'success'
                            );
                            jsClean();
                        } else {
                            Swal.fire(
                                'Oops...',
                                data,
                                'error'
                            );
                        }
                    },
                    error: function(data) {
                        Swal.fire(
                            'Oops...',
                            data,
                            'error'
                        );
                        alert(data);
                    }
                });
                console.log('despues de ajax');
            }

            function jsClean() {
                $(".form-control").prop("value", "");
                $("#conektaTokenId").prop("value", "");
            }

            var conektaSuccessResponseHandler = function(token) {

                $("#conektaTokenId").val(token.id);
                console.log('Antes jspay');
                jsPay();
            };

            var conektaErrorResponseHandler = function(response) {
                var $form = $("#card-form");

                alert(response.message_to_purchaser);
            }

        })
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <?php include_once 'shared/tkn.php'; ?>
    <!-- <script src="node_modules/@fullcalendar/core/main.js"></script>
    <script src="node_modules/@fullcalendar/daygrid/main.js"></script> -->
    <script src="dist/js/bundle.js"></script>
</body>

</html>