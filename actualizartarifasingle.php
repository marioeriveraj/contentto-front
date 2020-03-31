<?php
if (
    !isset($_POST['tar'])
) {

    // echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
    // echo "Por favor, verifique la información ingresada<br />";
    echo "<script> Swal.fire({type: 'error',title: 'Oops...',text: 'Algo salio mal, revisa los datos y vuelve a intentarlo!'});</script>";
    die();
};
include('shared/ctx.php');
$mysqli = conectar();
$cant = htmlentities(addslashes($_POST['tar']));

$consultaHabitaciones = "SELECT 
                    cttozen_habitaciones.id AS idhabitacion,
                    cttozen_habitaciones.numero AS numhabitacion,
                    cttozen_habitaciones.fk_hotel AS hotel,
                    cttozen_habitaciones.descripcion AS descripcionhabitacion,
                    cttozen_habitaciones.estatus AS estatushabitacion,
                    cttozen_habitaciones.fk_llave AS llavehabitacion,
                    cttozen_habitaciones.fk_tarifa AS tarifahabitacion,
                    cttozen_tipo_habitaciones.capacidad AS capacidad,
                    cttozen_tarifas.id AS id,
                    cttozen_tarifas.inicio_dia AS hdid,
                    cttozen_tarifas.fin_dia AS hdfd,
                    cttozen_tarifas.tarifa_dia AS tdd,
                    cttozen_tarifas.inicio_tarde AS hdit,
                    cttozen_tarifas.fin_tarde AS hdft,
                    cttozen_tarifas.tarifa_tarde AS tdt,
                    cttozen_tarifas.inicio_noche AS hdin,
                    cttozen_tarifas.fin_noche AS hdfn,
                    cttozen_tarifas.tarifa_noche AS tdn
                    FROM cttozen_habitaciones
                    INNER JOIN cttozen_tipo_habitaciones
                    ON cttozen_habitaciones.fk_tipo_habitacion = cttozen_tipo_habitaciones.id
                    INNER JOIN cttozen_tarifas
                    ON cttozen_tarifas.id =cttozen_habitaciones.fk_tarifa
                    GROUP BY cttozen_habitaciones.fk_tipo_habitacion";
$resultado = $mysqli->prepare($consultaHabitaciones);
$resultado->execute();
$resultado = $resultado->get_result();
$fila = mysqli_num_rows($resultado);
date_default_timezone_set('UTC');
date_default_timezone_set("America/Monterrey");
$horaActual = date('h:i:s');
if ($fila > 0) {

    while ($res =  $resultado->fetch_assoc()) {
        ?>
                      <?php if ($cant == $res['capacidad']) { ?>
                        <?php

                                    if ($res['hdid'] <= $horaActual && $horaActual <= $res['hdfd']) {
                                        echo '$' . $res['tdd'];
                                    } elseif ($res['hdit'] <= $horaActual && $horaActual <= $res['hdft']) {
                                        echo '$' . $res['tdt'];
                                    } else {
                                        echo '$' . $res['tdn'];
                                    }

                                    ?>
                      <?php } else { ?>

                      <?php
                                } ?>
                    <?php
                        }
                    } else {
                        ?>
                  <?php
                    }
                    mysqli_close($mysqli);
                    ?>
