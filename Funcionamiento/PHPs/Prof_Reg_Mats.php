<?php
    session_start();
    if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
    {
        header("location: ../../Acceso/FAcces.php");
    }
    $user = $_SESSION['Username'];
    require 'conexion.php';
    $GradSel=[$_POST['PriGrad'],$_POST['SegGrad'],$_POST['TerGrad']];
    $PriMats=[$_POST['Pri1'],$_POST['Pri2'],$_POST['Pri3'],$_POST['Pri4'],$_POST['Pri5'],$_POST['Pri6'],$_POST['Pri7']];
    $SegMats=[$_POST['Seg1'],$_POST['Seg2'],$_POST['Seg3'],$_POST['Seg4'],$_POST['Seg5'],$_POST['Seg6']];
    $TerMats=[$_POST['Ter1'],$_POST['Ter2'],$_POST['Ter3'],$_POST['Ter4'],$_POST['Ter5'],$_POST['Ter6']];
    $Gr_right = $Mat_right = "";
    $Gr_err = $Mat_err = "";

    if(isset($_POST['enviar']))
    {
        if(empty($GradSel))//Si no se selecciono ningun grado, significa que no hay datos para validar
        {
            $Gr_err="* Favor de seleccionar un grado";
        }
        else
        {
            
        }
    }
?>