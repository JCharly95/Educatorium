<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT'].'/Educatorium/Funcionamiento/PHPs/Conn_Ses/conexion.php';

    if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
    {
        header("location: ../../Acceso/FAcces.php");
    }
    
    $user = $_SESSION['Username'];
    $_SESSION['Tip_User']='Profe';
    //Datos que van a ir en la plantilla de credencial
    $RutaImg="";
    $NomEsc="";
    $NomProf="";
    $Ape_Pat="";
    $Ape_Mat="";
    $NumTele="";
    $DirCorr="";    
    $fecha="";    
    $NomMat=$NomMatShow="";
    $BtnGrads = ['style="display: none;"','style="display: none;"','style="display: none;"'];
    $ConsGrados=[];
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
    $sql="select Username,escuela.Nombre,Num_Esc from profe_escu inner join escuela on (profe_escu.Escuela_ID=escuela.ID_Escuela)"
            ."inner join profesor on (profe_escu.Profesor_ID=profesor.ID_Profesor) where Username='".$user."';";
    if($consulta=$conexion->query($sql))
    {
        while($res=$consulta->fetch_assoc())
        {
            $NomEsc=$res['Nombre'];
            $NoEsc=$res['Num_Esc'];
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
            $NumTele=$res['Tel'];
            $KeyPal=$res['Keyword'];
        }
    }

    //Obtencion del nombre de las materias que imparte y los grados de las materias
    $sql="select Username, materia.Nombre, Grado_ID from profesor inner join mat_profe on (ID_Profesor=Profe_ID)".
        "inner join materia on (Materia_ID=ID_Materia) where Username='".$user."';";
    if($consulta=$conexion->query($sql))
    {
        $cont=0;
        while($res=$consulta->fetch_assoc())
        {
            $NomMat=$res['Nombre'];
            $NomMatShow.=ChangNomMat($NomMat).", ";
            $ConsGrados[$cont]=$res['Grado_ID'];
            $cont++;
        }
        $BtnGrads=GDisponible($ConsGrados,$BtnGrads);
    }

    function ChangNomMat($NomMat)
    {
        if($NomMat=='Espa 1')
        {
            $NomMat='Español I';
        }

        if($NomMat=='Mate 1')
        {
            $NomMat='Matematicas I';
        }

        if($NomMat=='Biolo')
        {
            $NomMat='Ciencias I: Biologia';
        }

        if($NomMat=='Geogra')
        {
            $NomMat='Geografia';
        }

        if($NomMat=='Ingl 1')
        {
            $NomMat='Ingles I';
        }

        if($NomMat=='CyE 11')
        {
            $NomMat='Civica y Etica I: Parte I';
        }

        if($NomMat=='Hist 11')
        {
            $NomMat='Historia I: Parte I';
        }

        if($NomMat=='Espa 2')
        {
            $NomMat='Español II';
        }

        if($NomMat=='Mate 2')
        {
            $NomMat='Matematicas II';
        }

        if($NomMat=='Fisica')
        {
            $NomMat='Ciencias II: Fisica';
        }

        if($NomMat=='Ingl 2')
        {
            $NomMat='Ingles II';
        }

        if($NomMat=='CyE 12')
        {
            $NomMat='Civica y Etica I: Parte II';
        }

        if($NomMat=='Hist 12')
        {
            $NomMat='Historia I: Parte II';
        }

        if($NomMat=='Espa 3')
        {
            $NomMat='Español III';
        }

        if($NomMat=='Mate 3')
        {
            $NomMat='Matematicas III';
        }

        if($NomMat=='Quimic')
        {
            $NomMat='Ciencias III: Quimica';
        }

        if($NomMat=='Ingl 3')
        {
            $NomMat='Ingles III';
        }

        if($NomMat=='CyE 2')
        {
            $NomMat='Civica y Etica II';
        }

        if($NomMat=='Hist 2')
        {
            $NomMat='Historia II';
        }
        return $NomMat;
    }

    function GDisponible($ConsGrados,$BtnGrads)
    {
        foreach($ConsGrados as $Grado)
        {
            if($Grado==1)
            {
                $BtnGrads[0]="";
            }
                
            if($Grado==2)
            {
                $BtnGrads[1]="";
            }
                
            if($Grado==3)
            {
                $BtnGrads[2]="";
            }
        }
        return $BtnGrads;
    }
?>