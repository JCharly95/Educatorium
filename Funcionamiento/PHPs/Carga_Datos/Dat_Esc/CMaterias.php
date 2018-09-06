<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT'].'/Educatorium/Funcionamiento/PHPs/Conn_Ses/conexion.php';

    if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
    {
        header("location: ../../Acceso/FAcces.php");
    }

    $Opc_Profe='style="display: none;"';
    $user = $_SESSION['Username'];

    if($_SESSION['Tip_User']=='Profe')
    {
        $Opc_Profe='';
    }    
?>