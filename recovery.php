<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Conttento | Login</title>
    <link rel="shortcut icon" type="image/png" href="dist/images/fav-icon.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</head>

<body>
    <section id="login" style="background-image:url('dist/images/foto.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-6 mx-auto">
                    <form id="recovery-form">
                        <figure>
                            <img src="dist/images/logotipo.png" class="img-fluid" alt="Inicio Conttento">
                        </figure>
                        <div class="form-group col-12 float-left mt-4" >
                            <p>Te enviaremos un enlace para restablecer tu contraseña. Solo ingresa tu correo en el siguiente campo.</p>
                        </div>
                        <div class="form-group col-12 float-left">
                            <label for="correo">Correo</label>
                            <input type="email" class="form-control" id="correo" name="correo" data-contentto="correo" placeholder="Ingresa tu correo" required>
                        </div>
                        <div class="form-group text-center" >
                            <button type="submit" class="btn btn-warning style-button">Recuperar</button>
                        </div>
                        <div class="form-group text-center" >
                            <small><a href="index.php">Cancelar</a></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="dist/js/bundle.js"></script>
</body>

</html>