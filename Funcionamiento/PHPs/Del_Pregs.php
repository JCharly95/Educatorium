<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT'].'/Educatorium/Funcionamiento/PHPs/Conn_Ses/conexion.php';

    if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
    {
        header("location: ../../Acceso/FAcces.php");
    }

    $ID_Preg_Edit=$Tipo_Preg=$ID_Bloq="";
    $NomCuest=$_SESSION['CuestEdit'];
    $Cant_Pregs=0;
    $ActPregs=array();

    if(isset($_POST['enviar']))
    {
        $ID_Preg_Edit=$_POST['SelDelPreg'];

        //Borrado de las respuestas originales
        $sql="select Tipo from Pregunta where ID_Pregunta=".$ID_Preg_Edit.";";
        $consulta=$conexion->query($sql);
        while($res=$consulta->fetch_assoc())
        {
            $Tipo_Preg=$res['Tipo'];
        }
        
        //Se busca que tipo de pregunta es para saber en que tabla de alternativas borrar
        if($Tipo_Preg==1 || $Tipo_Preg==2 || $Tipo_Preg==3 || $Tipo_Preg==7)
        {
            $sql="delete from Alternativa where Pregunta_ID=".$ID_Preg_Edit.";";
            $consulta=$conexion->query($sql);
        }
        elseif($Tipo_Preg==4)
        {
            //Primero se busca el bloque, posteriormente se borra y despues se borran las alternativas
            $sql="select distinct Bloque from Altern_Rel_Cols where Pregunta_ID=".$ID_Preg_Edit.";";
            $consulta=$conexion->query($sql);

            while($res=$consulta->fetch_assoc())
            {
                $ID_Bloq=$res['Bloque'];
            }

            $sql="delete from Desc_Bloques where ID_Bloque=".$ID_Bloq.";";
            $consulta=$conexion->query($sql);

            $sql="delete from Altern_Rel_Cols where Pregunta_ID=".$ID_Preg_Edit.";";
            $consulta=$conexion->query($sql);
        }
        elseif($Tipo_Preg==5)
        {
            //Primero se busca el bloque, posteriormente se borra y despues se borran las alternativas
            $sql="select distinct Bloque from Altern_Ord_Sel where Pregunta_ID=".$ID_Preg_Edit.";";
            $consulta=$conexion->query($sql);

            while($res=$consulta->fetch_assoc())
            {
                $ID_Bloq=$res['Bloque'];
            }

            $sql="delete from Desc_Bloques where ID_Bloque=".$ID_Bloq.";";
            $consulta=$conexion->query($sql);

            $sql="delete from Altern_Ord_Sel where Pregunta_ID=".$ID_Preg_Edit.";";
            $consulta=$conexion->query($sql);
        }
        else
        {
            $sql="delete from Altern_Compl where Pregunta_ID=".$ID_Preg_Edit.";";
            $consulta=$conexion->query($sql);
        }

        //Borrado de la pregunta
        $sql="delete from Pregunta where ID_Pregunta=".$ID_Preg_Edit.";";
        $consulta=$conexion->query($sql);

        $sql1="select ID_Pregunta, Num_Preg_Cues from Pregunta inner join Cuestionario on";
        $sql2=" (Cuestionario_ID=ID_Cuestionario) where Cuestionario.Nombre='".$NomCuest."';";
        $sql=$sql1.$sql2;
        $consulta=$conexion->query($sql);
        while($res=$consulta->fetch_assoc())
        {
            $ActPregs[]=$res['ID_Pregunta'];
        }

        for($cont=0;$cont<count($ActPregs);$cont++)
        {
            $sql="update Pregunta set Num_Preg_Cues=".($cont+1)." where ID_Pregunta=".$ActPregs[$cont].";";
            $consulta=$conexion->query($sql);
        }

        echo "<script>alert('La pregunta ha sido eliminada');</script>";
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=../../Usuarios/Profesor/Principal_Prof.php">';
    }
?>