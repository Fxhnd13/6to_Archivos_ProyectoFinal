<?php
    session_start();
    $conexion; include_once('conexionSql.php');
    //if($_SESSION['id']!=null && isset($_SESSION['id'])){
        $sql1 = "SELECT curso.nombre nombre_curso , curso.fecha_creacion, curso.fecha_finalizacion, curso.costo_minimo, curso.id_curso, curso.id_area,
        COUNT(registro.id_curso) inscritos,persona.* FROM curso left join registro  ON (registro.id_curso=".
                "".$_POST['id_curso']." ) join catedratico on catedratico.id_curso=curso.id_curso join persona on".
                " (persona.id_persona=catedratico.id_persona) WHERE curso.id_curso= ".$_POST['id_curso'].";";
        $resultado = $conexion->query($sql1);
        $numero_persona = $_SESSION['id'];
        $resultadoInscripocion;
        $rows;
        // $nombre_persona = $_SESSION['id'];
        //$cont = 0;
    /*}else{
        header("location: ../index.php");
    }*/
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link rel=StyleSheet HREF="Css/perfilCurso.css" TYPE="text/css" MEDIA=screen>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    <title>Curso</title>
</head>
<body>    
    </br></br></br></br></br></br>
    <?php foreach ($resultado as $fila): ?>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
            <div class="well profile">
                <div class="col-sm-12">
                    <div class="col-xs-12 col-sm-8">
                    
                        <h2><?php echo $fila['nombre_curso'] ?></h2>
                        <p><strong>Catedratico: </strong> <a href="perfil.php?correo=<?php echo $fila['correo_electronico'] ?> "><?php echo $fila['nombre'] ?> <?php echo $fila['apellido'] ?> </a></p>
                        <p><strong>Correo: </strong> <?php echo $fila['correo_electronico'] ?></p>
                        <p><strong>Telefono: </strong> <?php echo $fila['telefono'] ?></p>
                        </br></br>
                        <p><strong>Fecha de Inicio: </strong> <?php echo $fila['fecha_creacion'] ?> </p>
                        <p><strong>Fecha de Finalizacion: </strong> <?php echo $fila['fecha_finalizacion'] ?> </p>
                        <p><strong>Costo: </strong>Q <?php echo $fila['costo_minimo'] ?> </p>
                    </div>             
                    <div class="col-xs-12 col-sm-4 text-center">

                    </div>
                </div>            
                <div class="col-xs-12 divider text-center">
                    <?php   
                            // $sql3 = "SELECT * FROM registro WHERE registro.id_curso= ".$_POST['id_curso']." AND registro.finalizado = 0;";
                            // $resultadoInscripocion1 = $conexion->query($sql3);
                            // $rows2 = $resultadoInscripocion1-> num_rows;
                            $sqlFuncionFilas = "SELECT calcularInscritos(".$_POST['id_curso'].") AS inscritos";
                            $rows2 = $conexion->query($sqlFuncionFilas);
                            foreach ($rows2 as $fila2):
                    ?>
                    <div class="col-xs-12 col-sm-4 emphasis">
                        <h2><strong> <?php echo $fila2['inscritos'] ?> </strong></h2>                    
                        <p><small>Inscritos</small></p>
                        <!-- <button class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span> Follow </button> -->
                    </div>
                    <?php   
                            endforeach;
                            $sql2 = "SELECT * FROM registro WHERE registro.id_curso= ".$_POST['id_curso']." and registro.id_persona=".$numero_persona." AND registro.finalizado = 0;";
                            $resultadoInscripocion = $conexion->query($sql2);
                            $rows = $resultadoInscripocion-> num_rows;
                    ?>
                    <?php if ($rows > 0){ ?>
                        <div class="col-xs-12 col-sm-4 emphasis">
                            <form action="cancelar-inscripcion.php" method="POST">
                            </br>
                                <span class="fa fa-user"></span>
                                <input type="hidden" name="id_curso" value="<?php echo $fila['id_curso'] ?>">
                                <input type="submit" value = "Cancelar Inscripcion" class="btn btn-info btn-block">
                            </form>
                        </div>
                    <?php }else{ ?>  
                        <div class="col-xs-12 col-sm-4 emphasis">
                            <form action="inscribir.php" method="post">
                                </br>
                                <span class="fa fa-user"></span>
                                <input type="hidden" name="id_curso" value="<?php echo $fila['id_curso'] ?>">
                                <input type="submit" value = " Inscribirse " class="btn btn-info btn-block">
                            </form>
                        </div>
                    
                    <?php } ?>   
                </div>
            </div>                 
            </div>
        </div>
    </div>
    <?php endforeach; ?>  
</body>
</html>