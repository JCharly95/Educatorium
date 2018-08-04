<?php
    //session_start();
    require 'conexion.php';
    
    if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
    {
        header("location: ../../Acceso/FAcces.php");
    }
    $user = $_SESSION['Username'];
    $_SESSION['Tip_User']='Estu';
    //Datos que van a ir en la plantilla de credencial
    $RutaImg="";
    $NomAlu="";
    $Ape_Pat="";
    $Ape_Mat="";
    $tel="";
    $NomEsc="";
    $Grado="";
    $DirCorr="";    
    $fecha="";
    //Obtencion de la ruta de la imagen
    $sql="select Username,Ruta from estudiante inner join apoyo on (estudiante.Apoyo_ID=apoyo.ID_Apoyo)"
            ." where Username='".$user."';";
    $consulta=$conexion->query($sql);    
    if($consulta->num_rows>0)
    {
        while($res=$consulta->fetch_assoc())
        {
            $rutaSav=$res['Ruta'];
            $RutaImg=substr($rutaSav,37);
        }
    }
    //Obtencion del nombre de la escuela del usuario
    $sql="select Username,escuela.Nombre from estudiante inner join escuela on (estudiante.Escuela_ID=escuela.ID_Escuela) where Username='".$user."';";
    mysqli_set_charset($conexion, "utf-8");
    $consulta=$conexion->query($sql);

    if($consulta->num_rows>0)
    {
        while($res=$consulta->fetch_assoc())
        {
            $NomEsc=$res['Nombre'];
        }
    }
    //Obtencion del resto de datos
    $sql= "SELECT * FROM estudiante WHERE Username = '".$user."';";
    $consulta=$conexion->query($sql);
    if($consulta->num_rows>0)
    {
        while($res=$consulta->fetch_assoc())
        {
            $NomAlu=$res['Nombre'];
            $Grado=$res['Grado_ID'];
            $DirCorr=$res['Correo'];
            $Ape_Pat=$res['Ape_Pat'];
            $Ape_Mat=$res['Ape_Mat'];
            $tel=$res['Tel'];
            $fecha=$res['Keyword'];
        }
    }
?>
