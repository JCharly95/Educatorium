<?php
    session_start();
    require 'conexion.php';
    
    if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
    {
        header("location: ../../Acceso/FAcces.php");
    }

    $user = $_SESSION['Username'];
    $Tipo_Usuario = $_SESSION['Tip_User'];
    $BtnMatsSeg=['style="display: none;"','style="display: none;"','style="display: none;"',
    'style="display: none;"','style="display: none;"','style="display: none;"'];
    $BtnID=[];
    
    if($Tipo_Usuario=='Profe')
    {
        $BtnID=CondBtns($user,$conexion,$BtnID);
        $BtnMatsSeg=ShowMats($BtnID, $BtnMatsSeg);
    }
    else
    {
        $BtnMatsSeg=['','','','','','',''];
    }

    //Funcion para determinar que botones se van a mostrar al profesor
    function CondBtns($user,$conexion,$ArrBtn)
    {
        $sql="select ID_Materia from mat_profe inner join profesor on (Profe_ID=ID_Profesor)".
        "inner join materia on (Materia_ID=ID_Materia)where Username='".$user."' and Grado_ID=2;";

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

    function ShowMats($ArrBtn, $BtnMatsSeg)
    {
        foreach($ArrBtn as $Materia)
        {
            switch($Materia)
            {
                case 8:
                $BtnMatsSeg[0]="";
                break;

                case 9:
                $BtnMatsSeg[1]="";
                break;

                case 10:
                $BtnMatsSeg[2]="";
                break;

                case 11:
                $BtnMatsSeg[3]="";
                break;

                case 12:
                $BtnMatsSeg[4]="";
                break;

                case 13:
                $BtnMatsSeg[5]="";
                break;
            }
        }

        return $BtnMatsSeg;
    }
?>