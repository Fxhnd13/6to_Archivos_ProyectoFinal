<?php 

if($_POST['accion'] === "editar"){

}else{
    session_start();
    $consultaIdNuevo = "SELECT (MAX(id_persona)+1) as id_persona FROM persona";
    $conexion = new mysqli("localhost","root","josecarlos","creatica");
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
        header("location: Login.php");
    }else{
        $_SESSION['mensajeError'] = "Las contraseñas ingresadas no coinciden, inténtelo de nuevo";
        header("location: error.php");
    }
}

?>