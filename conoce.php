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
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
    <!-- Navigation -->
    <?php include 'shared/menu.php'; ?>

    <!-- Este es el Hero -->
    <section id="hero-about" style="background-image: url('./dist/images/conoce.jpg');">
        <div class="container">
            <div class="row ">
                <div class="col-sm-12">
                    <h2 class="title">¿Qué aventuras esperas?</h2>
                    <p class="subtitle">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Termina Hero -->
    <section id="roms">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <h2>¿Qué cuarto necesitas?</h2>
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

    <section id="conoce">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 p-0">
                    <div class="grid">
                        <div class="box-1" style="background-image: url('./dist/images/Galería_1.jpg');"></div>
                        <div class="box-2" style="background-image: url('./dist/images/airbnb-apartment-appartment-1.png');"></div>
                        <div class="box-3" style="background-image: url('./dist/images/adventure-backpack-backpacker-1.png');"></div>
                    </div>
                </div>
                <div class="col-6 p-0">
                    <div class="txt">
                        <h3 class="title"> <span>Conoce</span> páramo.</h3>
                        <p class="paragraph">Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                            sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero
                            eos et accusam et justo duo dolores et ea rebum.</p>
                        <p class="paragraph">Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                    </div>
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.conekta.io/js/latest/conekta.js"></script>
    <?php include_once 'shared/tkn.php'; ?>
    <script src="dist/js/bundle.js"></script>
</body>

</html>