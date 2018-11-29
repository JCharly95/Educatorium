<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT'].'/Educatorium/Funcionamiento/PHPs/Conn_Ses/conexion.php';
    
    if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
        header("location: ../../Acceso/FAcces.php");

    $user=$_SESSION['Username'];
    $Iden_Mat=$_SESSION['Mat'];
    $ID_Mat=$ID_Cur=$ID_Est=0;
    $Name_Cur=$ContraCmp=$PassBD="";
    $Reg_Est=false;
    //Nombre del curso a buscar en la BD
    if(isset($_POST['NameCurSel']))
    {
        $_SESSION['SelCur']=$_POST['NameCurSel'];
        $Name_Cur=$_SESSION['SelCur'];
    }
    else
        $Name_Cur=$_SESSION['SelCur'];

    //Buscar el ID del curso
    $sql="select ID_Curso from Curso where Nombre='".$Name_Cur."';";
    if($consulta=$conexion->query($sql))
    {
        while($res=$consulta->fetch_assoc())
        {
            $ID_Cur=$res['ID_Curso'];
        }
    }

    //Buscar el ID del usuario
    $sql="select ID_Estudiante from Estudiante where Username='".$user."';";
    $consulta=$conexion->query($sql);
    if(mysqli_num_rows($consulta)>0)
    {
        while($res=$consulta->fetch_assoc())
        {
            $ID_Est=$res['ID_Estudiante'];
        }
        $Reg_Est=true;
    }

    $sql="select ID_Materia from Materia where Nombre='".$Iden_Mat."';";    
    if($consulta=$conexion->query($sql))
    {
        while($res=$consulta->fetch_assoc())
        {
            $ID_Mat=$res['ID_Materia'];
        }
    }

    $sql="select Curso.Password as ContraBD from Curso where Curso.Nombre='".$Name_Cur."' and Materia_ID=".$ID_Mat.";";
    if($consulta=$conexion->query($sql))
    {
        while($res=$consulta->fetch_assoc())
        {
            $PassBD=$res['ContraBD'];//Si tiene contraseña, esta se extrae de la base de datos para su comparacion
        }
    }

    //Buscar si el estudiante ya esta registrado en el curso
    $sql="select * from Curso_Estudiante where Curso_ID=".$ID_Cur." and Estudiante_ID=".$ID_Est.";";
    $consulta=$conexion->query($sql);
    if(mysqli_num_rows($consulta)>0)
    {
        $Reg_Est=false;
        $PassBD='';
    }

    if(!empty($PassBD))//Se busca en la base de datos si el curso seleccionado para entrar tiene contraseña
    {
        if(isset($_POST['entrar']))//Es necesario presionar el boton de acceso para comenzar a comparar
        {
            $ContraCmp=$_POST['Pass'];
            if(empty($ContraCmp))//Se verifica que no se haya querido entrar con un campo vacio
                echo "<script>alert('Error: No se ingreso una contraseña');</script>";
            else
            {
                if($ContraCmp==$PassBD)//Se procede con la comparacion de cadenas
                {
                    if($Reg_Est)
                    {
                        $sql="insert into Curso_Estudiante (Curso_ID,Estudiante_ID) values (".$ID_Cur.",".$ID_Est.");";
                        $consulta=$conexion->query($sql);
                    }
                    echo "<script>alert('Bienvenido a ".$Name_Cur."');</script>";
                    echo '<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=Curso.php">';
                }
                else
                {
                    echo "<script>alert('Contraseña incorrecta');</script>";
                    echo '<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=../../'.substr($_SESSION['ArchiMat'],10).'">';
                }
            }
        }
    }
    else
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=Curso.php">';

    function ChangNomMat($NomMat)
    {
        if($NomMat=='Espa 1')
            $NomMat='Español I';

        if($NomMat=='Mate 1')
            $NomMat='Matematicas I';

        if($NomMat=='Biolo')
            $NomMat='Ciencias I: Biologia';

        if($NomMat=='Geogra')
            $NomMat='Geografia';

        if($NomMat=='Ingl 1')
            $NomMat='Ingles I';

        if($NomMat=='CyE 11')
            $NomMat='Civica y Etica I: Parte I';

        if($NomMat=='Hist 11')
            $NomMat='Historia I: Parte I';

        if($NomMat=='Espa 2')
            $NomMat='Español II';

        if($NomMat=='Mate 2')
            $NomMat='Matematicas II';

        if($NomMat=='Fisica')
            $NomMat='Ciencias II: Fisica';

        if($NomMat=='Ingl 2')
            $NomMat='Ingles II';

        if($NomMat=='CyE 12')
            $NomMat='Civica y Etica I: Parte II';

        if($NomMat=='Hist 12')
            $NomMat='Historia I: Parte II';

        if($NomMat=='Espa 3')
            $NomMat='Español III';

        if($NomMat=='Mate 3')
            $NomMat='Matematicas III';

        if($NomMat=='Quimic')
            $NomMat='Ciencias III: Quimica';

        if($NomMat=='Ingl 3')
            $NomMat='Ingles III';

        if($NomMat=='CyE 2')
            $NomMat='Civica y Etica II';

        if($NomMat=='Hist 2')
            $NomMat='Historia II';

        return $NomMat;
    }
?>