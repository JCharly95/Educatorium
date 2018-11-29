<?php
    require $_SERVER['DOCUMENT_ROOT'].'/Educatorium/Funcionamiento/PHPs/Conn_Ses/conexion.php';

    if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
        header("location: ../../Acceso/FAcces.php");

    $user = $_SESSION['Username'];
    $Iden_Mat=$_SESSION['Mat'];
    $NamCur=$_SESSION['NomCurBus'];
    $ID_Mat=$cont=0;
    
    $sql="select ID_Curso from Curso where Nombre='".$NamCur."';";    
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
    $sql="select Cuestionario.Nombre as NomCuest from Cuestionario inner join Curso on (Curso_ID=ID_Curso) where Curso.Nombre='".$NamCur."';";
    $consulta=$conexion->query($sql);
    if($consulta->num_rows>0)
    {
        while($res=$consulta->fetch_assoc())
        {
            $ArrConsul[$cont]=$res;
            $cont++;
        }
    }
?>