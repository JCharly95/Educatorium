<?php    
    session_start();
    require 'conexion.php';

    if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
    {
        header("location: ../../Acceso/FAcces.php");
    }

    $user = $_SESSION['Username'];
?>