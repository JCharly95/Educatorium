<?php
    require $_SERVER['DOCUMENT_ROOT'].'/Educatorium/Funcionamiento/PHPs/Conn_Ses/conexion.php';

    if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
    {
        header("location: ../../Acceso/FAcces.php");
    }

    $user=$_SESSION['Username'];
    $Cuestion=$_SESSION['CuestEdit'];
    $ID_Cuest="";
    $cont=0;
    $Pregs=array();

    /*Se busca el cuestionario en la BD y se comprueba que esta relacionado con el
    profesor logueado para poderlo editar*/
    $sql1="select ID_Cuestionario from Cuestionario inner join Curso on (Curso_ID=ID_Curso)";
    $sql2=" inner join Profesor on (Profesor_ID=ID_Profesor) where Username='".$user."'";
    $sql3=" and Cuestionario.Nombre='".$Cuestion."';";
    $sql=$sql1.$sql2.$sql3;
    $consulta=$conexion->query($sql);
    while($res=$consulta->fetch_assoc())
    {
        $ID_Cuest=$res['ID_Cuestionario'];
    }

    $sql="select ID_Pregunta, Num_Preg_Cues, Contenido from Pregunta where Cuestionario_ID=".$ID_Cuest." order by Num_Preg_Cues;";
    $consulta=$conexion->query($sql);
    while($res=$consulta->fetch_assoc())
    {
        $Pregs[]=array('ID_Preg'=>$res['ID_Pregunta'],'Num_Preg'=>$res['Num_Preg_Cues'],'Preg'=>$res['Contenido']);
        $cont++;
    }
    /*
    $sql="select Num_Preg_Cues, Contenido from Pregunta where Cuestionario_ID=1 order by Num_Preg_Cues;";
    */
?>