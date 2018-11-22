<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT'].'/Educatorium/Funcionamiento/PHPs/Conn_Ses/conexion.php';
    
    if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
    {
        header("location: ../../Acceso/FAcces.php");
    }

    $user=$_SESSION['Username'];
    $Iden_Mat=$_SESSION['Mat'];
    $ID_Mat=0;
    $Name_Cur=$ContraCmp=$PassBD="";
    //Nombre del curso a buscar en la BD
    if(isset($_POST['NameCurSel']))
    {
        $_SESSION['SelCur']=$_POST['NameCurSel'];
        $Name_Cur=$_SESSION['SelCur'];
    }
    else
    {
        $Name_Cur=$_SESSION['SelCur'];
    }

    $sql="select ID_Materia from Materia where Nombre='".$Iden_Mat."';";    
    if($consulta=$conexion->query($sql))
    {
        while($res=$consulta->fetch_assoc())
        {
            $ID_Mat=$res['ID_Materia'];
        }
    }

    $sql1="select Curso.Password as ContraBD from Curso inner join Profesor";
    $sql2=" on (Profesor_ID=ID_Profesor) where Curso.Nombre='".$Name_Cur."' and";
    $sql3=" Materia_ID=".$ID_Mat." and Username='".$user."';";
    $sql=$sql1.$sql2.$sql3;
    $consulta=$conexion->query($sql);
    
    while($res=$consulta->fetch_assoc())
    {
        $PassBD=$res['ContraBD'];//Si tiene contraseña, esta se extrae de la base de datos para su comparacion
    }

    if(!empty($PassBD))//Se busca en la base de datos si el curso seleccionado para entrar tiene contraseña
    {
        if(isset($_POST['entrar']))//Es necesario presionar el boton de acceso para comenzar a comparar
        {
            $ContraCmp=$_POST['Pass'];
            if(empty($ContraCmp))//Se verifica que no se haya querido entrar con un campo vacio
            {
                echo "<script>alert('Error: No se ingreso una contraseña');</script>";
            }
            else
            {
                if($ContraCmp==$PassBD)//Se procede con la comparacion de cadenas
                {
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