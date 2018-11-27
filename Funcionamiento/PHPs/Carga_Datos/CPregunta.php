<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT'].'/Educatorium/Funcionamiento/PHPs/Conn_Ses/conexion.php';
    
    if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
    {
        header("location: ../../Acceso/FAcces.php");
    }

    $user=$_SESSION['Username'];
    $Curso=$_SESSION['SelCur'];//Nombre del curso a buscar en la BD
    $NomCuest=$_POST['CuestResp'];//Nombre del cuestionario a responder
    $Preguntas=$Alterns=$AlternsIzq=$AlternsDer=$PertLis=array();
    $Cant_Pos=$cont=7;
    $Tipo_Preg="";
    $View_Pregs=array(' display:none;',' display:none;',' display:none;',' display:none;',' display:none;',' display:none;',' display:none;');
    $Text_Preg=array('Nada','Nada','Nada','Nada','Nada','Nada','Nada');

    //Obtener el ID del cuestionario
    $sql1="select ID_Cuestionario from Cuestionario inner join Curso on (Curso_ID=ID_Curso)";
    $sql2=" where Curso.Nombre='".$Curso."' and Cuestionario.Nombre='".$NomCuest."';";
    $sql=$sql1.$sql2;
    $consulta=$conexion->query($sql);
    
    while($res=$consulta->fetch_assoc())
    {
        $ID_Cuest=$res['ID_Cuestionario'];
    }

    //Buscar los datos de las preguntas
    $sql="select * from Pregunta where Cuestionario_ID=".$ID_Cuest.";";
    $consulta=$conexion->query($sql);
    
    while($res=$consulta->fetch_assoc())
    {
        $Preguntas[]=array($res['ID_Pregunta'],$res['Contenido'],$res['Tipo'],$res['Num_Preg_Cues'],$res['Apoyo_ID']);
    }

    //Datos de la pregunta
    $ID_Preg=$Preguntas[$cont][0];
    $Preg=$Preguntas[$cont][1];//La pregunta textual
    $Tip_Preg=$Preguntas[$cont][2];//El tipo de la pregunta para determinar que seccion se va a mostrar
    $Num_Preg=$Preguntas[$cont][3];//El numero de pregunta para poner en el encabezado
    $ID_Img=$Preguntas[$cont][4];//Apoyo_ID:El identificador de la imagen si es que tiene, para mostrarla

    //Determinar en que tabla se van a buscar las preguntas
    switch ($Tip_Preg) 
    {
        case 1:
            $View_Pregs[0]='';
            $Text_Preg[0]=$Preg;
            echo "<script>document.getElementById('PregTip1').style.display='block';</script>";
            //Extraer las alternativas e irlas almacenando en un arreglo para posteriormente mostrarlas en pantalla
            $sql="select Contenido from Alternativa where Pregunta_ID=".$ID_Preg.";";
            $consulta=$conexion->query($sql);
            while($res=$consulta->fetch_assoc())
            {
                $Alterns[]=$res['Contenido'];
            }
            break;

        case 2:
            $View_Pregs[1]='';
            $Text_Preg[1]=$Preg;
            //Extraer las alternativas e irlas almacenando en un arreglo para posteriormente mostrarlas en pantalla
            $sql="select Contenido from Alternativa where Pregunta_ID=".$ID_Preg.";";
            $consulta=$conexion->query($sql);
            while($res=$consulta->fetch_assoc())
            {
                $Alterns[]=$res['Contenido'];
            }
            break;
        
        case 3:
            $View_Pregs[2]='';
            $Text_Preg[2]=$Preg;
            //Extraer las alternativas e irlas almacenando en un arreglo para posteriormente mostrarlas en pantalla
            $sql="select Contenido from Alternativa where Pregunta_ID=".$ID_Preg.";";
            $consulta=$conexion->query($sql);
            while($res=$consulta->fetch_assoc())
            {
                $Alterns[]=$res['Contenido'];
            }
            break;

        case 4:
            $View_Pregs[3]='';
            $Text_Preg[3]=$Preg;
            //Extraer las columnas y alternativas e irlas almacenando en arreglos para 
            //posteriormente mostrarlas en pantalla
            $sql="select Alter_a_Rel, Inciso_Right from Altern_Rel_Cols where Pregunta_ID=".$ID_Preg.";";
            $consulta=$conexion->query($sql);
            while($res=$consulta->fetch_assoc())
            {
                $AlternsIzq[]=$res['Alter_a_Rel'];
                $AlternsDer[]=$res['Inciso_Right'];
            }
            break;

        case 5:
            $View_Pregs[4]='';
            $Text_Preg[4]=$Preg;
            //Extraer las columnas y las posiciones e irlas almacenando en arreglos para 
            //posteriormente mostrarlas en pantalla
            $sql="select Contenido from Altern_Ord_Sel where Pregunta_ID=".$ID_Preg.";";
            $consulta=$conexion->query($sql);
            $Cant_Pos=$consulta->num_rows;//Cantidad de posiciones almacenadas para esa pregunta
            while($res=$consulta->fetch_assoc())
            {
                $Alterns[]=$res['Contenido'];
            }
            break;

        case 6:
            $View_Pregs[5]='';
            $Text_Preg[5]=$Preg;
            //Extraer las columnas y las posiciones e irlas almacenando en arreglos para 
            //posteriormente mostrarlas en pantalla
            $sql="select Contenido, Pert_Lista from Altern_Compl where Pregunta_ID=".$ID_Preg.";";
            $consulta=$conexion->query($sql);
            $Cant_Pos=$consulta->num_rows;//Cantidad de posiciones almacenadas para esa pregunta
            while($res=$consulta->fetch_assoc())
            {
                $Alterns[]=$res['Contenido'];
                $PertLis[]=$res['Pert_Lista'];
            }
            break;

        case 7:
            $View_Pregs[6]='';
            $Text_Preg[6]=$Preg;
            //Extraer las alternativas e irlas almacenando en un arreglo para posteriormente mostrarlas en pantalla
            $sql="select Contenido from Alternativa where Pregunta_ID=".$ID_Preg.";";
            $consulta=$conexion->query($sql);
            while($res=$consulta->fetch_assoc())
            {
                $Alterns[]=$res['Contenido'];
            }
            break;
    }
?>