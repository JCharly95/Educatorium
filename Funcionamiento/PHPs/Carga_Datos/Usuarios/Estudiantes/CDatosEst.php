<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT'].'/Educatorium/Funcionamiento/PHPs/Conn_Ses/conexion.php';
    
    if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
        header("location: ../../Acceso/FAcces.php");
    
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
    $keyPal="";
    //Obtencion de la ruta de la imagen
    $sql="select Username,Ruta from Estudiante inner join Apoyo on (Estudiante.Apoyo_ID=Apoyo.ID_Apoyo)"
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
    $sql="select Username,Escuela.Nombre from Estudiante inner join Escuela on (Estudiante.Escuela_ID=Escuela.ID_Escuela) where Username='".$user."';";
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
    $sql= "select * from Estudiante where Username='".$user."';";
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
            $keyPal=$res['Keyword'];
        }
    }
?>
