<?php
    if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
    {
        header("location: ../../Acceso/FAcces.php");
    }
    $user = $_SESSION['Username'];
    //Datos que van a ir en la plantilla de credencial
    $RutaImg="";
    $NomEsc="";
    $NomProf="";
    $Ape_Pat="";
    $Ape_Mat="";
    $tel="";
    $DirCorr="";    
    $fecha=""; 
    //Obtencion de la ruta de la imagen
    $sql="select Username,Ruta from profesor inner join apoyo on (profesor.Apoyo_ID=apoyo.ID_Apoyo) where Username='".$user."';";
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
    $sql= "SELECT * FROM profesor WHERE Username = '".$user."';";
    $consulta=$conexion->query($sql);
    if($consulta->num_rows>0)
    {
        while($res=$consulta->fetch_assoc())
        {
            $NomProf=$res['Nombre'];
            $DirCorr=$res['Correo'];
            $Ape_Pat=$res['Ape_Pat'];
            $Ape_Mat=$res['Ape_Mat'];
            $tel=$res['Tel'];
            $fecha=$res['Keyword'];
        }
    }
?>
