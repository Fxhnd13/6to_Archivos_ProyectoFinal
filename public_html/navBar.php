<?php

    $conexion; include_once("conexionSql.php");
    $consultaTipo = $conexion->query("SELECT * FROM catedratico WHERE id_persona=".$_SESSION['id'].";");
    $tipos = $consultaTipo->num_rows;

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown Active">
            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Cursos
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <!-- tecnicamente estos tres enlaces dirigen a la misma página pero hay que hacer
            que reciban un parametro get, tal que podamos determinar que consulta realizar -->
            <a class="dropdown-item" href="principalCursos.php?consulta=todosLosCursos">Cursos Disponibles</a> <!-- aqui enlace a la pagina principal-->
            <a class="dropdown-item" href="principalCursos.php?consulta=cursosAsignados">Cursos Asignados</a> <!-- aquí enlace a la pagina de cursos que el usuario tiene asignados-->
            <a class="dropdown-item" href="crear_curso.php">Crear Curso</a> <!-- aquí enlace a la pagina de cursos que el usuario tiene asignados-->
            <?php if($tipos > 0 ){ ?>
                <a class="dropdown-item" href="principalCursos.php?consulta=cursosImpartidos">Cursos Impartidos</a> <!-- aquí enlace a la pagina de cursos que el usuario imparte -->
            <?php } ?>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Sesion
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="index.php?accion=cerrarSesion" name="salir">Cerrar Sesion</a>
            <a class="dropdown-item" href="perfil.php?correo=<?php echo $_SESSION['correo'] ?>" >Ver Perfil</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="">Sesion Activa: <?php echo $_SESSION['nombre'] ?></a>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="" data-toggle="modal" data-target="#Contacto">Contacto</a>
        </li>

        </ul>
        <form class="form-inline my-2 my-lg-0" action="principalCursos.php" method="GET"> <!-- igual que las consultas anteriores, con la diferencia que se busca por nombre-->
          <input type="hidden" name="consulta" value="cursoEspecifico">
          <input name="nombreCurso" class="form-control mr-sm-2" type="search" placeholder="Nombre de curso" aria-label="Search" >
          <button name="consulta" value="cursoEspecifico" class="btn btn-outline-success my-2 my-sm-0" type="submit" >Buscar</button>
        </form>
    </div>
</nav>

<div class="modal fade" id="Contacto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Contacto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            Desarrollado Por:
            <ul>
            <li>José Carlos Soberanis Ramirez</li>
            <li>Mario Moisés Ramírez Tobar</li>
            <li>Yefer Rodrigo Alvarado</li>
            </ul>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
    </div>
</div>