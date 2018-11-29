<?php    
    session_start();
    require $_SERVER['DOCUMENT_ROOT'].'/Educatorium/Funcionamiento/PHPs/Conn_Ses/conexion.php';

    if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
        header("location: ../../Acceso/FAcces.php");

    $user = $_SESSION['Username'];

    //Si, se envio correctamente el nombre del curso a editar, lo asignamos a una sesion
    if(isset($_POST['CurSelEdit']))
        $_SESSION['NomCurBus']=$_POST['CurSelEdit'];
?>