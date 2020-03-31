<?php session_start(); ?>
<?php require_once('shared/urls.php') ?>
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
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.css" />
  <link rel="stylesheet" type="text/css" href="style.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</head>

<body>
  <?php require_once('shared/urls.php');
  include('shared/ctx.php');
  ?>
  <?php include 'shared/menu.php'; ?>
  <!-- hero section -->
  <header class="header" style="background-image: url('./dist/images/foto.jpg');">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-sm-9">
          <h1 class="title">Lorem ipsum dolor sit amet consectetur.</h1>
          <p class="subtitle">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            Necessitatibus set diam nomuny eirmod tempor invidunt ut labore
            et.
          </p>
          <form id="reserva-rapida" class="needs-validation form-style" method="POST" action="single.php">
            <div class="container">
              <div class="row">
                <div class="form-group">
                  <label>Llegada</label>
                  <div class="input-group date">
                    <input id="fecha-llegada" name="fechallegada" type="text" class="form-control fecha" />
                  </div>
                </div>
                <div class="form-group ml-2">
                  <label for="validationCustom02">Salida</label>
                  <input id="fecha-salida" name="fechasalida" type="text" class="form-control fecha" />
                </div>
                <div class="form-group ml-5">
                  <div class="row">
                    <div class="form-group text-center">
                      <label class="text-center d-block" for="adultos">Adultos</label>
                      <div class="btn-reserva-express minhuesped" data-min="#adultos">
                        <i class="fas fa-minus"></i>
                      </div>
                      <input value="0" type="number" class="reserva-express form-control" name="adultos" min="1" max="6" pattern="[0-6.]+" id="adultos">
                      <div class="btn-reserva-express maxhuesped" data-max="#adultos">
                        <i class="fas fa-plus"></i>
                      </div>
                    </div>
                    <div class="form-group text-center">
                      <label class="text-center d-block" for="ninos">Niños</label>
                      <div class="btn-reserva-express minhuesped" data-min="#ninos">
                        <i class="fas fa-minus"></i>
                      </div>
                      <input value="0" type="number" class="reserva-express form-control" name="ninos" min="0" max="6" pattern="[0-6.]+" id="ninos">
                      <div class="btn-reserva-express maxhuesped" data-max="#ninos">
                        <i class="fas fa-plus"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-warning style-button">
              Reservar
            </button>
          </form>
        </div>
      </div>
    </div>
  </header>
  <!--end hero section -->
  <section id="roms">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-sm-12">
          <h1>¿Qué cuarto necesitas?</h1>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-header">
              <img class="img-fluid" src="./dist/images/airbnb-apartment-appartment-1.png" />
              <p class="rating-star"><i class="fas fa-star"></i>4.7</p>
            </div>
            <div class="card-body container">
              <div class="row">
                <div class="col-8">
                  <h3>Nombre de Cuarto 1</h3>
                  <p class="p-class">$000.00</p>
                  <button type="button" class="btn btn-warning style-button-detalle">
                    Ver Detalle
                  </button>
                </div>
                <div class="col-4">
                  <p class="guest">
                    <i class="fas fa-user-circle"> </i>1-2 huespedes
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-header">
              <img class="img-fluid" src="./dist/images/airbnb-apartment-appartment-1.png" />
              <p class="rating-star"><i class="fas fa-star">4.7</i></p>
            </div>
            <div class="card-body container">
              <div class="row">
                <div class="col-8">
                  <h3>Nombre de Cuarto 1</h3>
                  <p class="p-class">$000.00</p>
                  <button type="button" class="btn btn-warning style-button-detalle">
                    Ver Detalle
                  </button>
                </div>
                <div class="col-4">
                  <p class="guest">
                    <i class="fas fa-user-circle"> </i>1-2 huespedes
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--section experiencia-->
  <section id="exp">
    <div class="container">
      <div class="row align-items-center text-center">
        <div class="col-sm-12">
          <h1 class="title">Sobre la <span>experiencia.</span></h1>
        </div>
      </div>
      <div class="row align-items-center">
        <div class="col-sm-6">
          <div class="style-carousel">
            <div class="img-gllry" style="background-image: url('./dist/images/backpacks-bags-denim-981781.png');">
            </div>
            <div class="img-gllry" style="background-image: url('./dist/images/adult-adventure-beauty-1.png');"></div>
            <div class="img-gllry" style="background-image: url('./dist/images/adult-adventure-beauty-1.png');"></div>
          </div>
        </div>
        <div class="col-sm-6">
          <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Debitis
            eveniet iste voluptate asperiores delectus quia rem, quasi quam
            sequi facere illum officia magnam nostrum autem placeat sit
            doloremque qui aliquid.
          </p>
        </div>
      </div>
    </div>
  </section>
  <!--section book now-->
  <section id="cta">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-sm-6">
          <h1 class="title">Book now</h1>
          <p class="prrfo">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis,
            dolor saepe corporis ut, laudantium fugiat enim animi, amet porro
            similique doloremque nam veritatis repudiandae! Nesciunt optio
            asperiores tempore necessitatibus ut.
          </p>
          <button type="button" class="btn btn-warning style-button">
            Reservar
          </button>
        </div>
        <div class="col-sm-6 class-circle-image parallax p-0">
          <!-- <img class="img-fluid" src="./dist/images/circle.png" /> -->
        </div>
      </div>
    </div>
  </section>
  <!--footer-->
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <script src="dist/js/bundle.js"></script>
</body>

</html>