<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT'].'/Educatorium/Funcionamiento/PHPs/Conn_Ses/conexion.php';

    if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
    {
        header("location: ../../Acceso/FAcces.php");
    }

    $user=$_SESSION['Username'];
    $ID_Preg_Edit="";
    $Pregunta=$Tipo="";
    $Alterns=array();

    /*if(isset($_POST['enviar']))
    {
        $ID_Preg_Edit=$_POST['SelEditPreg'];
        $_SESSION['ID_Preg']=$ID_Preg_Edit;
    }*/

    $sql="select Contenido, Tipo from Pregunta where ID_Pregunta=".$ID_Preg_Edit.";";
    $consulta=$conexion->query($sql);
    while($res=$consulta->fetch_assoc())
    {
        $Pregunta=$res['Contenido'];
        $Tipo=$res['Tipo'];

        if($Pregunta=='')
        {
            $Pregunta='Vacia';
        }
    }

    if($Tipo==1)
    {
        echo "document.getElementById('RespTip1').style.display='block';";
    }
    elseif ($Tipo==2)
    {
        echo "document.getElementById('RespTip2').style.display='block';";
    }
    elseif ($Tipo==3)
    {
        echo "document.getElementById('RespTip3').style.display='block';";
    }
    elseif ($Tipo==4)
    {
        echo "document.getElementById('RespTip4').style.display='block';";
    }
    elseif ($Tipo==5)
    {
        echo "document.getElementById('RespTip5').style.display='block';";
    }
    elseif ($Tipo==6)
    {
        echo "document.getElementById('RespTip6').style.display='block';";
    }
    else
    {
        echo "document.getElementById('RespTip7').style.display='block';";
    }
?>