<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT'].'/Educatorium/Funcionamiento/PHPs/Conn_Ses/conexion.php';
    
    if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
    {
        header("location: ../../Acceso/FAcces.php");
    }
    
    //Nombre del curso a buscar en la BD
    $VerCur=$_POST['CurSel'];
    //Variables de la imagen de bienvenida
    $rutaSav=$RutaImg=$RutImgCur="";
    //Variables del mensaje de bienvenida
    $MsgBien=$Msg="";

    //Buscar la imagen en la base de datos y guardar su ruta en una variable para despues mostrarla
    $sql="select apoyo.Ruta as RutaImg from apoyo inner join apoyo_curso on (Apoyo_ID=ID_Apoyo) inner join curso on (Curso_ID=ID_Curso) where curso.Nombre='".$VerCur."';";
    $consulta=$conexion->query($sql);
    if($consulta->num_rows>0)
    {
        while($res=$consulta->fetch_assoc())
        {
            $rutaSav=$res['RutaImg'];
            $RutaImg=substr($rutaSav,28);
            $RutImgCur='<img src="../../'.$RutaImg.'" alt="Imagen del curso" style="border: silver; border-style: solid; border-radius: 10px;">';
        }
    }
    else
    {
        $sql="select Ruta from apoyo where Nombre='Sin_Img';";
        $consulta=$conexion->query($sql);
        while($res=$consulta->fetch_assoc())
        {
            $rutaSav=$res['Ruta'];
            $RutaImg=substr($rutaSav,28);
            $RutImgCur='<img src="../../'.$RutaImg.'" alt="Imagen del curso" style="border: silver; border-style: solid; border-radius: 10px;">';
        }
    }

    //Buscar el mensaje de bienvenida del curso
    $sql="select Msg_Bien from curso where Nombre='".$VerCur."';";
    $consulta=$conexion->query($sql);    
    if($consulta->num_rows>0)
    {
        while($res=$consulta->fetch_assoc())
        {
            $MsgBien=$res['Msg_Bien'];
        }
    }

    if(!is_null($MsgBien))
    {
        $Msg='<label>'.$MsgBien.'</label>';
    }
    else
    {
        $Msg='<label>Bienvenidos al curso, espero que lo disfruten y tengan un gran aprendizaje.</label>';
    }

    //Obtencion de los nombres de los cuestionarios
    $ArrConsul=array();
    $ArrCant=array();
    $sql="select cuestionario.Nombre as NomCuest from cuestionario inner join curso on (Curso_ID=ID_Curso) where curso.Nombre='".$VerCur."';";
    $consulta=$conexion->query($sql);
    if($consulta->num_rows>0)
    {
        $cont=0;
        while($res=$consulta->fetch_assoc())
        {
            $ArrConsul[$cont]=$res;
            $cont++;
        }
    }
?>