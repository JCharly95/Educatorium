<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT'].'/Educatorium/Funcionamiento/PHPs/Conn_Ses/conexion.php';

    if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
        header("location: ../../Acceso/FAcces.php");
    
    $user = $_SESSION['Username'];
    //Datos que van a ir en la plantilla de credencial
    $RutaImg="";
    $NomPad="";
    $Ape_Pat="";
    $Ape_Mat="";
    $tel="";
    $DirCorr="";    
    $keyPal="";    
    //Obtencion de la ruta de la imagen
    $sql="select Username,Ruta from Padre inner join Apoyo on (padre.Apoyo_ID=apoyo.ID_Apoyo)"
            ." where Username='".$user."';";
    $consulta=$conexion->query($sql);    
    if($consulta->num_rows>0)
    {
        while($res=$consulta->fetch_assoc())
        {
            $rutaSav=$res['Ruta'];
            $RutaImg=substr($rutaSav,36);
        }
    }
    //Obtencion del resto de datos
    $sql= "select * from Padre where Username='".$user."';";
    $consulta=$conexion->query($sql);
    if($consulta->num_rows>0)
    {
        while($res=$consulta->fetch_assoc())
        {
            $NomPad=$res['Nombre'];
            $DirCorr=$res['Correo'];
            $Ape_Pat=$res['Ape_Pat'];
            $Ape_Mat=$res['Ape_Mat'];
            $tel=$res['Tel'];
            $keyPal=$res['Keyword'];
        }
    }
?>
