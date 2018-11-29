<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT'].'/Educatorium/Funcionamiento/PHPs/Conn_Ses/conexion.php';

    if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
        header("location: ../../Acceso/FAcces.php");

    //Variables del sistema
    $SelGrado=$CurNam=$ID_Cur=$ID_Apoyo="";
    $User=$_SESSION['Username'];

    if(isset($_POST['enviar']))
    {
        //Grado seleccionado para borrar
        $SelGrado=$_POST['BtnDel'];
        /*Para los estilos fue necesario añadirles un numero al grupo de radios enviado.
        El siguiente switch es para determinar cual es el grupo de radios que se analizará*/
        switch ($SelGrado) 
        {
            case 1:
                $CurNam=$_POST['CurSelDel1'];
                break;

            case 2:
                $CurNam=$_POST['CurSelDel2'];
                break;
            
            case 3:
                $CurNam=$_POST['CurSelDel3'];
                break;
        }

        //Se procede a obtener el ID del curso deseado
        $sql="select ID_Curso from Curso where Nombre='".$CurNam."';";
        $consulta=$conexion->query($sql);
        while($res=$consulta->fetch_assoc())
        {
            $ID_Cur=$res['ID_Curso'];
        }

        //Se procede a revisar si no existe una imagen relacionada al curso que impida borrarlo
        $sql="select ID_Apoyo_Curso from Apoyo_Curso where Curso_ID=".$ID_Cur.";";
        $consulta=$conexion->query($sql);
        if($consulta->num_rows>0)
        {
            //Si existe, se busca el id de la relacion imagen_curso y posteriormente se borra
            while($res=$consulta->fetch_assoc())
            {
                $ID_Apoyo=$res['ID_Apoyo_Curso'];
            }

            $sql="delete from Apoyo_Curso where ID_Apoyo_Curso=".$ID_Apoyo.";";
            $consulta=$conexion->query($sql);
        }

        //Se procede con el borrado del curso
        $sql="delete from Curso where ID_Curso=".$ID_Cur.";";
        $consulta=$conexion->query($sql);
        if($consulta->num_rows==0)
        {
            echo '<script>alert("El curso'.$CurNam.' ha sido borrado exitosamente");</script>';
            echo '<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=Principal_Prof.php">';
        }
        else
        {
            echo '<script>alert("error: Ocurrio algun problema con la eliminacion del curso'.$CurNam.'");</script>';
            echo '<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=Principal_Prof.php">';
        }
    }
    
    /*switch($GradoDel)
    {
        case 'primero':
        $sql="delete from mat_profe inner join profesor on (Profe_ID=ID_Profesor) inner join materia on (Materia_ID=ID_Materia) where Username='".$User."' and Grado_ID=1;';";
        $consulta=$conexion->query($sql);
        if($consulta->num_rows>0)
        {
            echo '<script>alert("Se han borrado todas las materias de primero");</script>';
            echo '<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=../Usuarios/Profesor/Principal_Prof.php">';
        }
        break;

        case 'segundo':
        $sql="delete from mat_profe inner join profesor on (Profe_ID=ID_Profesor) inner join materia on (Materia_ID=ID_Materia) where Username='".$User."' and Grado_ID=2;";
        //$consulta=;
        if($conexion->query($sql))
        {
            echo '<script>alert("Se han borrado todas las materias de segundo");</script>';
            echo '<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=../Usuarios/Profesor/Principal_Prof.php">';
        }
        break;

        case 'tercero':
        $sql="delete from mat_profe inner join profesor on (Profe_ID=ID_Profesor) inner join materia on (Materia_ID=ID_Materia) where Username='".$User."' and Grado_ID=3;";
        $consulta=$conexion->query($sql);
        if($consulta->num_rows>0)
        {
            echo '<script>alert("Se han borrado todas las materias de tercero");</script>';
            echo '<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=../Usuarios/Profesor/Principal_Prof.php">';
        }        
        break;
    }*/

    function CambNomMat($NomMat,$Grado)
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

        if($Grado==1)
            $Grado='Primero';

        if($Grado==2)
            $Grado='Segundo';

        if($Grado==3)
            $Grado='Tercero';

        return $NomMat.','.$Grado;
    }
?>