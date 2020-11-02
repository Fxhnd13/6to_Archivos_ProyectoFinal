<?php
    session_start();
    $conexion; include_once('conexionSql.php');
    //if($_SESSION['id']!=null && isset($_SESSION['id'])){
        //$nombre_persona = 2;
        $idpersona = $_SESSION['id'];
        $sql1 = "UPDATE registro SET finalizado=1 WHERE id_persona =".$idpersona." and id_curso = ".$_POST['id_curso'].";";
        $rows;
       if($conexion->query($sql1)){
            $_SESSION['activ_modal_cancelar'] = "inscrito";
            header("location: principalCursos.php");
        }else{
            $_SESSION['mensajeError'] = "No se pudo cancelar la inscripcion.";
            header("location: error.php");
        }
        //$cont = 0;
    /*}else{
        header("location: ../index.php");
    }*/
    
?>