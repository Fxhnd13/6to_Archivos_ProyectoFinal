<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel=StyleSheet HREF="Css/login.css" TYPE="text/css" MEDIA=screen>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <title>Iniciar Sesion</title>
</head>
<body>
    <div class="sidenav">
         <div class="login-main-text">
            <h2>Base de datos <br> Pagina inicio sesion</h2>
            <p>Inicie sesion o registre su usuario desde aquí.</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
               <form action="verificarLogueo.php" method="POST">
                  <div class="form-group">
                     <label>Correo: </label>
                     <input type="text" name="correo" class="form-control" placeholder="Correo" required>
                  </div>
                  <div class="form-group">
                     <label>Contraseña: </label>
                     <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                  </div>
                  <button type="submit" class="btn btn-black">Ingresar</button>
                  <button class="btn btn-secondary" onclick="location.href='CRUD Usuario/registroUsuario.php'">Registrarse</button>
               </form>
            </div>
         </div>
      </div>
</body>
</html>