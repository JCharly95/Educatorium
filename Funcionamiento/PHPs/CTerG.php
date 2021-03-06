<?php
    session_start();
    require 'conexion.php';
    
    if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
    {
        header("location: ../../Acceso/FAcces.php");
    }

    $user = $_SESSION['Username'];
    $Tipo_Usuario = $_SESSION['Tip_User'];
    $BtnMatsTer=['style="display: none;"','style="display: none;"','style="display: none;"',
    'style="display: none;"','style="display: none;"','style="display: none;"'];
    $BtnID=[];
    
    if($Tipo_Usuario=='Profe')
    {
        $BtnID=CondBtns($user,$conexion,$BtnID);
        $BtnMatsTer=ShowMats($BtnID, $BtnMatsTer);
    }
    else
    {
        $BtnMatsTer=['','','','','','',''];
    }

    //Funcion para determinar que botones se van a mostrar al profesor
    function CondBtns($user,$conexion,$ArrBtn)
    {
        $sql="select ID_Materia from mat_profe inner join profesor on (Profe_ID=ID_Profesor)".
        "inner join materia on (Materia_ID=ID_Materia)where Username='".$user."' and Grado_ID=3;";

        if($consulta=$conexion->query($sql))
        {
            $cont=0;
            while($res=$consulta->fetch_assoc())
            {
                $ArrBtn[$cont]=$res['ID_Materia'];
                $cont++;
            }
        }
        else
        {
            printf("Connect failed: %s\n", $conexion->error);
        }
        return $ArrBtn;
    }

    function ShowMats($ArrBtn, $BtnMatsTer)
    {
        foreach($ArrBtn as $Materia)
        {
            switch($Materia)
            {
                case 14:
                $BtnMatsTer[0]="";
                break;

                case 15:
                $BtnMatsTer[1]="";
                break;

                case 16:
                $BtnMatsTer[2]="";
                break;

                case 17:
                $BtnMatsTer[3]="";
                break;

                case 18:
                $BtnMatsTer[4]="";
                break;

                case 19:
                $BtnMatsTer[5]="";
                break;
            }
        }

        return $BtnMatsTer;
    }
?>