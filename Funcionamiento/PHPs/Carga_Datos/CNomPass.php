<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT'].'/Educatorium/Funcionamiento/PHPs/Conn_Ses/conexion.php';
    
    if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
    {
        header("location: ../../Acceso/FAcces.php");
    }

    $user = $_SESSION['Username'];
    //Curso a buscar
    $curso=$_SESSION['NomCurBus'];

    //Nombre del curso y Contraseña
    $CurNam=$Contra="";

    $sql="select Curso.Nombre as NomCurso, Curso.Password as ContraCur from Curso inner join profesor on ".
    "(Profesor_ID=ID_Profesor) where Curso.Nombre='".$curso."' and Username='".$user."';";
    if($consulta=$conexion->query($sql))
    {
        while($res=$consulta->fetch_assoc())
        {
            $CurNam=$res['NomCurso'];
            $Contra=$res['ContraCur'];
        }
    }

    if(is_null($Contra))
    {
        $Contra="No tiene contraseña";
    }
?>