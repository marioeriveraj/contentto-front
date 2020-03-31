<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      rel="shortcut icon"
      type="image/png"
      href="dist/images/fav-icon.png"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
      integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.css"
    />
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
  <body>
    <?php include '../shared/menu.php'; ?>
    <section
      id="hero-cuenta"
      style="background-image: url('./dist/images/fondoguardados.png');"
    >
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h1 class="title">Mi cuenta</h1>
          </div>
        </div>
      </div>
    </section>
    <section id="profile">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <p>Nombre de usuario</p>
            <h1>Idalia Moreno</h1>
            <p>Fecha de Inicio</p>
            <hr />
            <div class="style-class-inicio">
              <p class="style-p">14 de octubre 2019</p>
            </div>
            <form class="needs-validation form-style" novalidate>
              <div class="container form1-class">
                <div class="row">
                  <div class="form-group">
                    <label>Correo Electronico</label>
                    <div class="input-group date">
                      <div class="input-group-prepend"></div>
                      <input
                        type="text"
                        class="form-control"
                        name="email"
                        value="correo@gmail.com"
                      />
                    </div>
                  </div>
                  <div class="col-sm">
                    <label for="validationCustom02">Telefono</label>
                    <input
                      type="text"
                      class="form-control"
                      id="validationCustom02"
                      placeholder="123456"
                      value="123456"
                      required
                    />
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputState">Ubicación</label>
                    <input
                      type="text"
                      class="form-control"
                      name="ubicacion"
                      value="Tamaulipas"
                    />
                  </div>
                </div>
              </div>
            </form>
            <button type="button" class="btn btn-warning style-button">
              Editar Perfil
            </button>
          </div>
          <div class="col-sm-6 text-center">
            <div class="style-user-profile">
              <img src="./dist/images/profile.png" style="width: 200px;" />
              <p class="style-foto-profile">Actualizar Foto</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer>
      <div class="container">
        <div class="row align-items-center text-center">
          <div class="col-sm-2">
            <img class="img-fluid" src="./dist/images/logotipo.png" alt="" />
          </div>
          <div class="col-sm-8 style-color-p">
            <p>Términos y condiciones</p>
            <p>Avisos de privacidad</p>
          </div>
          <div class="col-sm-2 style-icons">
            <div class="row">
              <div class="col-4"><i class="fab fa-facebook-f"></i></div>
              <div class="col-4"><i class="fab fa-instagram"></i></div>
              <div class="col-4"><i class="fab fa-twitter"></i></div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
    <script
      type="text/javascript"
      src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
    ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <script
      type="text/javascript"
      src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"
    ></script>
    <script src="dist/js/bundle.js"></script>
  </body>
</html>
