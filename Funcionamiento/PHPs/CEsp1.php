<?php
    session_start();
    require 'conexion.php';

    if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
    {
        header("location: ../../Acceso/FAcces.php");
    }

    $Opc_Profe='style="display: none;"';
    $user = $_SESSION['Username'];
    $_SESSION['Mat']='Espa 1';

    if($_SESSION['Tip_User']=='Profe')
    {
        $Opc_Profe='';
    }
?>