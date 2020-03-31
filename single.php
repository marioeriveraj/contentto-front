<?php session_start(); ?>
<?php require_once('shared/urls.php') ?>
<?php
if (
  isset($_POST['fechallegada']) &&
  isset($_POST['fechasalida']) &&
  isset($_POST['canthuespedes'])
) {

  $fechallegada = $_POST['fechallegada'];
  $fechasalida = $_POST['fechasalida'];
  $canthuespedes = $_POST['canthuespedes'];
} elseif (isset($_POST['capacidad'])) {
  $canthuespedes = $_POST['capacidad'];
} else {
  header('Location:' . $homef);
  die();
}

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
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.css" />
  <link rel="stylesheet" type="text/css" href="style.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</head>

<body>
  <!-- Navigation -->
  <?php include 'shared/menu.php';
  include('shared/ctx.php'); ?>
  <!-- Side bar fixed -->
  <section id="left-sidebar">
    <div class="container">
      <div class="row">
        <div class="col-5 ml-auto">
          <div id="rsrv-data">
            <div class="rsv-hd">
              <div class="row">
                <div class="col-10">
                <p id="precio-cant" class="price">
                  <?php
                  $mysqli = conectar();
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
                      <?php if ($canthuespedes == $res['capacidad']) { ?>
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

                  <p class="txt">por noche</p>
                </div>
                <div class="col-2">
                  <i class="fas fa-star"></i>
                  <span>4.7</span>
                </div>
              </div>
            </div>
            <form action="pago.php" method="POST">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="basic-url">Llegada</label>
                  <div class="input-group mb-3">
                    <?php if ($fechallegada != "") {
                      ?>
                      <input name="entrada" id="fechaEntrada" type="text" class="form-control fecha" value="<?php echo $fechallegada; ?>" />
                    <?php
                    } else { ?>
                      <input name="entrada" id="fechaEntrada" type="text" class="form-control fecha" />
                    <?php  } ?>

                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="basic-url">Salida</label>
                  <div class="input-group mb-3">
                    <?php if ($fechasalida != "") {
                      ?>
                      <input name="salida" id="fechaSalida" type="text" class="form-control fecha" value="<?php echo $fechasalida; ?>" />
                    <?php
                    } else { ?>
                      <input name="salida" id="fechaSalida" type="text" class="form-control fecha" />
                    <?php  } ?>
                  </div>
                </div>
                
                <div class="form-group col-md-6">
                  <label for="basic-url">Huéspedes</label>
                  <div class="input-group mb-3">
                    <select class="custom-select" name="huespedes" id="cantHuespedes">
                      <?php
                      $mysqli = conectar();
                      $consultaTipoHabitaciones = "SELECT * FROM cttozen_tipo_habitaciones";
                      $resultado = $mysqli->prepare($consultaTipoHabitaciones);
                      $resultado->execute();
                      $resultado = $resultado->get_result();
                      // echo '<pre>';
                      // echo '</pre>';
                      $fila = mysqli_num_rows($resultado);
                      //var_dump($resultado);
                      if ($fila > 0) {
                        $i = 1;
                        while ($res =  $resultado->fetch_assoc()) {
                          ?><?php if ($canthuespedes == $res['capacidad']) { ?>
                      <option value="<?php echo $res['capacidad'] ?>" selected><?php echo $res['capacidad']; ?> Huespedes</option>
                    <?php } else { ?>
                      <option value="<?php echo $res['capacidad'] ?>"><?php echo $res['capacidad']; ?> Huespedes</option>
                    <?php
                        } ?>

                    <? php ?>

                  <?php
                      $i++;
                    }
                  } else {
                    ?>
                <?php
                }
                mysqli_close($mysqli);
                ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="optns">
              <button class="save">Save this post</button>
              <button class="share">Share this post</button>
            </div>
            <input name="prec" type="text" hidden value="1500">
            <button class="btn-reserva" type="submit">
              <div class="rsv-ftr">
                <div class="row align-items-center">
                  <div class="col-10">
                    <p>Reservar</p>
                  </div>
                  <div class="col-2">
                    <i class="fas fa-chevron-right"></i>
                  </div>
                </div>
              </div>
            </button>
            </form>
            
          </div>
          <p>
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
            nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
            erat, sed diam voluptua.
          </p>
          <a class="link-pltcs" href="#">
            <p>Conoce más detalles sobre la política</p>
          </a>
          <br />
          <a class="link-pltcs" href="#">
            <p>Conoce el proceso</p>
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- Side bar fixed -->
  <!-- Este es el Hero -->
  <section id="single-room">
    <div class="container">
      <!-- Galeria -->
      <div class="row align-items-center">
        <div class="col-6">
          <div class="slider-for">
            <div class="img-gllry" style="background-image: url('dist/images/d1.jpg');"></div>
            <div class="img-gllry" style="background-image: url('dist/images/d2.jpg');"></div>
            <div class="img-gllry" style="background-image: url('dist/images/d3.jpg');"></div>
            <div class="img-gllry" style="background-image: url('dist/images/Galería 1.jpg');"></div>
          </div>
          <div class="slider-nav">
            <div class="img-gllry" style="background-image: url('dist/images/d1.jpg');"></div>
            <div class="img-gllry" style="background-image: url('dist/images/d2.jpg');"></div>
            <div class="img-gllry" style="background-image: url('dist/images/d3.jpg');"></div>
            <div class="img-gllry" style="background-image: url('dist/images/Galería 1.jpg');"></div>
          </div>
        </div>
      </div>
      <!--Termina galeria -->
      <div class="row">
        <div class="col-6">
          <h1>Nombre de habitación</h1>
          <h3>tipo de cuarto</h3>
        </div>
      </div>
    </div>
  </section>
  <!-- Termina Hero -->

  <section id="details">
    <div class="container">
      <!-- Iconos servicios -->
      <div class="row">
        <div class="col-6">
          <div class="row icons">
            <div class="col-4 icon">
              <i class="fas fa-user-friends"></i>
              <span>Capacidad</span>
            </div>
            <div class="col-4 icon">
              <i class="fas fa-bed"></i>
              <span>No. camas</span>
            </div>
            <div class="col-4 icon">
              <i class="fas fa-toilet"></i>
              <span>No. baños</span>
            </div>
          </div>
        </div>
      </div>
      <!-- Termina Iconos servicios -->
      <!-- Detalle servicion -->
      <div class="row">
        <div class="col-6 p-0">
          <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header" id="headingOne">
                <div class="row">
                  <div class="col-8">
                    <h2 class="mb-0">
                      Detalles
                    </h2>
                  </div>
                  <div class="col-4 text-right">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      <i class="fas fa-chevron-down"></i>
                    </button>
                  </div>
                </div>
              </div>

              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                  <p>
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                    sed diam nonumy eirmod tempor invidunt ut labore et dolore
                    magna aliquyam erat, sed diam voluptua. At vero eos et
                    accusam et justo duo dolores et ea rebum. Stet clita kasd
                    gubergren, no sea takimata sanctus est Lorem ipsum dolor
                    sit amet. Lorem ipsum dolor sit amet, consetetur
                    sadipscing elitr, sed diam nonumy eirmod tempor invidunt
                    ut labore et dolore magna aliquyam erat, sed diam
                    voluptua. At vero eos et accusam et justo duo dolores et
                    ea rebum. Stet clita kasd gubergren, no sea takimata
                    sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor
                    sit amet, consetetur sadipscing elitr, sed diam nonumy
                    eirmod tempor invidunt ut labore et dolore magna aliquyam
                    erat, sed diam voluptua. At vero eos et accusam et justo
                    duo dolores et ea rebum. Stet clita kasd gubergren, no sea
                    takimata sanctus est Lorem ipsum dolor sit amet. Lorem
                    ipsum dolor sit amet, consetetur sadipscing elitr, sed
                    diam nonumy eirmod tempor invidunt ut labore et dolore
                    magna aliquyam erat.
                  </p>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingTwo">
                <div class="row">
                  <div class="col-8">
                    <h2 class="mb-0">
                      Servicios
                    </h2>
                  </div>
                  <div class="col-4 text-right">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      <i class="fas fa-chevron-down"></i>
                    </button>
                  </div>
                </div>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                  <div class="row">
                    <div class="col-6"></div>
                    <div class="col-6"></div>
                  </div>
                  <ul>
                    <li>
                      <i class="fas fa-asterisk"></i>
                      <p>
                        Lorem ipsum dolor sit amet, consetetur sadipscing
                        elitr, sed diam nonumy eirmod tempor invidunt ut
                        labore et dolore magna aliquyam erat, sed diam
                        voluptua.
                      </p>
                    </li>
                    <li>
                      <i class="fas fa-asterisk"></i>
                      <p>
                        Lorem ipsum dolor sit amet, consetetur sadipscing
                        elitr, sed diam nonumy eirmod tempor invidunt ut
                        labore et dolore magna aliquyam erat, sed diam
                        voluptua.
                      </p>
                    </li>
                    <li>
                      <i class="fas fa-asterisk"></i>
                      <p>
                        Lorem ipsum dolor sit amet, consetetur sadipscing
                        elitr, sed diam nonumy eirmod tempor invidunt ut
                        labore et dolore magna aliquyam erat, sed diam
                        voluptua.
                      </p>
                    </li>
                    <li>
                      <i class="fas fa-asterisk"></i>
                      <p>
                        Lorem ipsum dolor sit amet, consetetur sadipscing
                        elitr, sed diam nonumy eirmod tempor invidunt ut
                        labore et dolore magna aliquyam erat, sed diam
                        voluptua.
                      </p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingThree">
                <div class="row">
                  <div class="col-8">
                    <h2 class="mb-0">
                      Disponibilidad
                    </h2>
                  </div>
                  <div class="col-4 text-right">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      <i class="fas fa-chevron-down"></i>
                    </button>
                  </div>
                </div>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                  <div id="calendar"></div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingFour">
                <div class="row">
                  <div class="col-8">
                    <h2 class="mb-0">
                      Reseñas
                    </h2>
                  </div>
                  <div class="col-4 text-right">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                      <i class="fas fa-chevron-down"></i>
                    </button>
                  </div>
                </div>
              </div>
              <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                <div class="card-body">
                  <!-- estrellas reviews -->
                  <div class="row stars">
                    <div class="col-12">
                      <i class="fas fa-star"></i>
                      <span class="strs-cnt">4.7</span>
                      <span class="rvw-cnt">39 reseñas</span>
                    </div>
                  </div>
                  <!--termina estrellas reviews -->
                  <!-- Display review -->
                  <div class="row rvw">
                    <div class="col-8 mb-3">
                      <!-- Imagen perfil -->
                      <div class="prfl-img" style="background-image: url('./dist/images/casual-fashion-fine-looking-1681010-744x1116.jpg');"></div>
                      <!-- Nombre usuario -->
                      <h5 class="name">Nombre de usuario</h5>
                      <!-- Fecha review -->
                      <p class="date">07 de octubre de 2019</p>
                    </div>
                    <!-- star reviews -->
                    <div class="col-4 rvw-star-cnt">
                      <span class="str active"><i class="fas fa-star"></i></span>
                      <span class="str active"><i class="fas fa-star"></i></span>
                      <span class="str active"><i class="fas fa-star"></i></span>
                      <span class="str active"><i class="fas fa-star"></i></span>
                      <span class="str "><i class="fas fa-star"></i></span>
                    </div>
                    <!-- termina star reviews -->
                    <!-- texto review -->
                    <div class="col-12">
                      <p class="rvw-txt">
                        Lorem ipsum dolor sit amet, consetetur sadipscing
                        elitr, sed diam nonumy eirmod tempor invidunt ut
                        labore et dolore magna aliquyam erat, sed diam
                        voluptua. At vero eos et accusam et justo duo dolores
                        et ea rebum. Stet clita kasd gubergren, no sea
                        takimata sanctus est Lorem ipsum dolor sit amet. Lorem
                        ipsum dolor sit amet.
                      </p>
                    </div>
                    <!-- termina texto review -->
                  </div>
                  <!--Termina Display review -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--Termina Detalle servicion -->
    </div>
  </section>

  <section id="comments">
    <div class="container">
      <!-- deja tu comentario   -->
      <div class="row">
        <div class="col-6 p-0">
          <h3>Comparte tu opinión</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-6 p-0">
          <h5>Comentarios</h5>
          <p>Calificación:</p>
          <div class="strs">
            <span class="str"><i class="fas fa-star"></i></span>
            <span class="str"><i class="fas fa-star"></i></span>
            <span class="str"><i class="fas fa-star"></i></span>
            <span class="str"><i class="fas fa-star"></i></span>
            <span class="str"><i class="fas fa-star"></i></span>
          </div>
          <form action="">
            <div class="form-group">
              <textarea name="" id="" rows="4" placeholder="Escribe aquí tu mensaje"></textarea>
            </div>
            <div class="form-group">
              <button class="send">Publicar</button>
            </div>
          </form>
        </div>
      </div>
      <!-- termina deja tu comentario   -->
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script type="text/javascript" src="https://cdn.conekta.io/js/latest/conekta.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <script src="dist/js/bundle.js"></script>
  <script>
    // console.log(sessionStorage.getItem('entrada'));
    // $('#fechaEntrada').val(sessionStorage.getItem('entrada'));
    // $('#fechaSalida').val(sessionStorage.getItem('salida'));
    // $('#cantHuespedes').val(sessionStorage.getItem('cantidad'));
  </script>
</body>

</html>