<?php
session_start();
$correo =  $_SESSION['correo'];
$nombre = $_SESSION['nombre']." ".$_SESSION['apellido'];
?>
<html lang="es" dir="ltr">
  <head>
    <title>Perfil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel=StyleSheet HREF="Css/perfil.css" TYPE="text/css" MEDIA=screen>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="row">
      <div class="col-lg-5">
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object dp img-circle" src="user.png" style="width: 100px;height:100px;">
            </a>
            <div class="media-body">
                <h4 class="media-heading"><?php echo $nombre; ?><small>  Guatemala</small></h4>
                <h5>Software Developer at <a href=""><?php echo $correo; ?></a></h5>
                <hr style="margin:8px auto">

                <span class="label label-default">HTML5/CSS3</span>
                <span class="label label-default">jQuery</span>
                <span class="label label-info">CakePHP</span>
                <span class="label label-default">Android</span>
            </div>
        </div>
      </div>
    </div>
  </body>
</html>
