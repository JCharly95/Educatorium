<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT'].'/Educatorium/Funcionamiento/PHPs/Conn_Ses/conexion.php';
    
    $Username=$_SESSION['Username'];

    //Saber que materias estan relacionadas con el profesor para deshabilitar su respectiva checkbox
    $ID_Mat="";
    $CheckMul=["","",""];
    $StatusBox=["","","","","","","","","","","","","","","","","","",""];
    $ID_Prof=BusProfe($Username,$conexion);
    $resultado=0;

    //Deshabilitar/Habilitar las casillas de seleccion multiple
    $sql="select Username, ID_Materia from profesor inner join mat_profe on (ID_Profesor=Profe_ID)"
        ."inner join materia on (Materia_ID=ID_Materia) where Username='".$Username."' and Grado_ID=1;";
    if($consulta=$conexion->query($sql))
    {
        if($consulta->num_rows==7)
        {
            $CheckMul[0]="disabled";
        }
    }

    $sql="select Username, ID_Materia from profesor inner join mat_profe on (ID_Profesor=Profe_ID)"
        ."inner join materia on (Materia_ID=ID_Materia) where Username='".$Username."' and Grado_ID=2;";
    if($consulta=$conexion->query($sql))
    {
        if($consulta->num_rows==6)
        {
            $CheckMul[1]="disabled";
        }
    }

    $sql="select Username, ID_Materia from profesor inner join mat_profe on (ID_Profesor=Profe_ID)"
        ."inner join materia on (Materia_ID=ID_Materia) where Username='".$Username."' and Grado_ID=3;";
    if($consulta=$conexion->query($sql))
    {
        if($consulta->num_rows==6)
        {
            $CheckMul[2]="disabled";
        }
    }

    //Buscar las materias relacionadas con el profe
    $sql="select Username, ID_Materia from profesor inner join mat_profe on (ID_Profesor=Profe_ID)"
        ."inner join materia on (Materia_ID=ID_Materia) where Username='".$Username."';";
    if($consulta=$conexion->query($sql))
    {
        while($res=$consulta->fetch_assoc())
        {
            $ID_Mat=$res['ID_Materia'];
            $StatusBox[$ID_Mat-1]="disabled";
        }
    }

    function BusProfe($Username,$conexion)
    {
        $sql="Select ID_Profesor from profesor where Username='".$Username."';";//Se busca el id del profesor
        if($consulta=$conexion->query($sql))
        {
            while($res=$consulta->fetch_assoc())
            {
                return $res['ID_Profesor'];
            }
        }
        else
        {
            echo '<script>alert("No sabemos como paso esto pero, profesor no encontrado");</script>';
        }
    }
?>