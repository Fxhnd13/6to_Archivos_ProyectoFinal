<?php 

session_start();
$conexion; include_once("conexionSql.php");

if($_POST['accion'] === "docente"){

    $correo = $_SESSION['correo'];
    $idPersona = $_SESSION['id']; //obtenemos el id de la persona
    $idCurso = $_POST['idCurso']; //obtenemos el id del curso
    if($idCurso === "-1"){
        $_SESSION['mensajeError'] = "No seleccionó un curso para poder dar.";
        header("location: error.php");
    }else{
        $consultaIdNuevo = "SELECT (MAX(id_persona)+1) as id_persona FROM persona";
        $resultado = $conexion->query($consultaIdNuevo);
        foreach($resultado as $fila) $idCatedratico=$fila['id_persona']; //obtenemos el id del catedratico a agregar
        if(!isset($idCatedratico)) $idCatedratico=1;
        $sql = "INSERT INTO catedratico (id_persona,id_curso,id_catedratico) VALUES (".$idPersona.",".$idCurso.",".$idCatedratico.")";
        if(!$conexion->query($sql)){
            $_SESSION['mensajeError'] = "No se pudo asignar el curso error en la base de datos (accionUsuario)";
            header("location: error.php");
        }else{
            header("location: perfil.php?correo=".$_SESSION);
        }
    }

}else if($_POST['accion'] === "crear"){
    //aquí creamos un nuevo usuario Finalizado
    $consultaIdNuevo = "SELECT (MAX(id_persona)+1) as id_persona FROM persona";
    $resultado = $conexion->query($consultaIdNuevo);
    foreach($resultado as $fila) $valor=$fila['id_persona'];
    if(!isset($valor)) $valor = 1;

    $sql = "INSERT INTO persona (nombre,apellido,correo_electronico,password,telefono,cui,id_persona) VALUES 
    ('".$_POST['nombre']."','".$_POST['apellido']."','".$_POST['correo']."'
    ,'".$_POST['password1']."','".$_POST['telefono']."','".$_POST['cui']."',".$valor.")";
    
    if($_POST['password1'] === $_POST['password2']){
        if(!$conexion->query($sql)){
            $_SESSION['mensajeError'] = "No se pudo guardar el usuario en la base de datos (accionUsuario).";
            header("location: error.php");
        }
        header("location: index.php");
    }else{
        $_SESSION['mensajeError'] = "Las contraseñas ingresadas no coinciden, inténtelo de nuevo";
        header("location: error.php");
    }
}else if($_POST['accion'] === "editar"){
    //editamos los datos de un usuario finalizado
    $sql = "UPDATE persona set nombre='".$_POST['nombre']."', apellido='".$_POST['apellido']."', correo_electronico='"
    .$_POST['correo']."', password='".$_POST['password1']."', telefono=".$_POST['telefono']." WHERE correo_electronico='"
    .$_POST['correoViejo']."';";
    if($_POST['password1'] === $_POST['password2']){
        if(!$conexion->query($sql)){
            $_SESSION['mensajeError'] = "No se pudo guardar los cambios del usuario en la base de datos (accionUsuario).";
            header("location: error.php");
        }
        header("location: index.php");
    }else{
        $_SESSION['mensajeError'] = "Las contraseñas ingresadas no coinciden, inténtelo de nuevo";
        header("location: error.php");
    }
}else{
    //aqui es donde eliminamos pero hay que eliminar todos los registros que le involucren ¿viable?
}

?>