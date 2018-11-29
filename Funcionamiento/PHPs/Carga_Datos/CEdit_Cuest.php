<?php
    require $_SERVER['DOCUMENT_ROOT'].'/Educatorium/Funcionamiento/PHPs/Conn_Ses/conexion.php';

    if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
        header("location: ../../Acceso/FAcces.php");

    $user=$_SESSION['Username'];

    if(isset($_POST['enviar']))
        $NomCuest=$_POST['SelEditCuest'];
    else
        $NomCuest=$_SESSION['CuestEdit'];
    
    $_SESSION['CuestEdit']=$NomCuest;
    /*echo $NomCuest;
    $ID_Mat=0;
    
    $sql="select ID_Curso from curso where Nombre='".$NamCur."';";    
    if($consulta=$conexion->query($sql))
    {
        while($res=$consulta->fetch_assoc())
        {
            $ID_Cur=$res['ID_Curso'];
        }
    }

    //Obtencion de los nombres de los cuestionarios
    $ArrConsul=array();
    $ArrCant=array();
    $sql="select cuestionario.Nombre as NomCuest from cuestionario inner join curso on (Curso_ID=ID_Curso) where curso.Nombre='".$NamCur."';";
    $consulta=$conexion->query($sql);
    if($consulta->num_rows>0)
    {
        $cont=0;
        while($res=$consulta->fetch_assoc())
        {
            $ArrConsul[$cont]=$res;
            $cont++;
        }
    }*/
?>