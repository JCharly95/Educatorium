<?php
    session_start();
    require 'conexion.php';

    $GradoDel=$_POST['BtnDel'];
    $User=$_SESSION['Username'];
    
    switch($GradoDel)
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
    }
?>