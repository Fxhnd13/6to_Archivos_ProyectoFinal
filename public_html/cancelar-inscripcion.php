<?php
    session_start();
    $conexion; include_once('conexionSql.php');
    //if($_SESSION['id']!=null && isset($_SESSION['id'])){
        $nombre_persona = 2;
        // $nombre_persona = $_SESSION['id'];
        //$sql1 = "INSERT INTO registro (id_persona, id_curso, finalizado) VALUES (".$nombre_persona.",".$_POST['id_curso'].",0);";
        $rows;
       //if($conexion->query($sql1) === TRUE){
            $_GET['activ_modal_inscrito'] = "inscrito";
            header("location: principalCursos.php");
        //}else{
            //header("location: index.php");
        //}
        //$cont = 0;
    /*}else{
        header("location: ../index.php");
    }*/
    
?>