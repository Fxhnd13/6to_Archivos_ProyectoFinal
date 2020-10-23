<?php 

session_start();
$mensaje = $_SESSION['mensajeError'];

?>

<html lang="es" dir="ltr">
  <head>
    <title>Error de inicio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel=StyleSheet HREF="Css/error.css" TYPE="text/css" MEDIA=screen>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="error-content">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ">
            <div class="error-text">
              <h1 class="error">Error</h1>
              <div class="im-sheep">
                <div class="top">
                  <div class="body"></div>
                  <div class="head">
                    <div class="im-eye one"></div>
                    <div class="im-eye two"></div>
                    <div class="im-ear one"></div>
                    <div class="im-ear two"></div>
                  </div>
                </div>
                <div class="im-legs">
                 <div class="im-leg"></div>
                 <div class="im-leg"></div>
                 <div class="im-leg"></div>
                  <div class="im-leg"></div>
                </div>
              </div>
              <h4>¡Oops!</h4>
              <p>Causa: <?php echo $mensaje ?></p>
              <a href="<?=base_url()?>" class="btn btn-primary btn-round">Ir a la pagina</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
