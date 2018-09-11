<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT'].'/Educatorium/Funcionamiento/PHPs/Conn_Ses/conexion.php';
    
    if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
    {
        header("location: ../../Acceso/FAcces.php");
    }
    
    $Regreso='';
    $user = $_SESSION['Username'];
    $Tipo_Usuario = $_SESSION['Tip_User'];
    $BtnMatsPri=['style="display: none;"','style="display: none;"','style="display: none;"',
    'style="display: none;"','style="display: none;"','style="display: none;"','style="display: none;"'];
    $BtnID=[];
    
    if($Tipo_Usuario=='Profe')
    {
        $BtnID=CondBtns($user,$conexion,$BtnID);
        $BtnMatsPri=ShowMats($BtnID, $BtnMatsPri);
        $Regreso='../Usuarios/Profesor/Principal_Prof.php';
    }
    else
    {
        $BtnMatsPri=['','','','','','',''];
        $Regreso='../Usuarios/Estudiante/Principal_Est.php';
    }

    //Funcion para determinar que botones se van a mostrar al profesor
    function CondBtns($user,$conexion,$ArrBtn)
    {
        $sql="select ID_Materia from mat_profe inner join profesor on (Profe_ID=ID_Profesor)".
        "inner join materia on (Materia_ID=ID_Materia)where Username='".$user."' and Grado_ID=1;";

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

    function ShowMats($ArrBtn, $BtnMatsPri)
    {
        foreach($ArrBtn as $Materia)
        {
            switch($Materia)
            {
                case 1:
                $BtnMatsPri[0]="";
                break;

                case 2:
                $BtnMatsPri[1]="";
                break;

                case 3:
                $BtnMatsPri[2]="";
                break;

                case 4:
                $BtnMatsPri[3]="";
                break;

                case 5:
                $BtnMatsPri[4]="";
                break;

                case 6:
                $BtnMatsPri[5]="";
                break;

                case 7:
                $BtnMatsPri[6]="";
            }
        }

        return $BtnMatsPri;
    }
?>