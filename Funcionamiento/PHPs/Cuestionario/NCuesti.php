<?php
    session_start();
	require $_SERVER['DOCUMENT_ROOT'].'/Educatorium/Funcionamiento/PHPs/Conn_Ses/conexion.php';

	if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
	{
		header("location: ../../../../Acceso/FAcces.php");
	}
    $user = $_SESSION['Username'];
    $NomCur=$_SESSION['NomCurBus'];

    $NomCuest=$CantPreg="";
    $NomAd=$CantAd="";
    $NomVal=$CantVal=false;

    //Variables para impresiones de avisos
    $AdSuc='<span class="label label-success">';
    $AdWar='<span class="label label-warning">';
    $AdDan='<span class="label label-danger">';
    $AdClo='</span>';

    //Busqueda del ID del curso
    $sql="Select ID_Curso from Curso where Nombre ='".$NomCur."';";
    $consulta=$conexion->query($sql);
    if($consulta->num_rows>0)
    {
        while($res=$consulta->fetch_assoc())
        {
            $ID_Cur=$res['ID_Curso'];
        }
    }
    else
        echo "<script>alert('Curso no encontrado');</script>";
    
    if(isset($_POST['actualizar']))
    {
        //Validacion del nombre del cuestionario
        $NomCuest=validar($_POST['nombre']);
        //Buscar si no existe ya este cuestionario
        $sql="Select * from Cuestionario where Nombre='".$NomCuest."' and Curso_ID=".$ID_Cur.";";
        $consulta=$conexion->query($sql);
        if($consulta->num_rows>0)
            $NomAd=$AdDan."Este cuestionario ya existe.&nbsp;<br>&nbsp; Favor de poner otro nombre".$AdClo;
        else
        {
            if(empty($NomCuest))
                $NomAd=$AdDan."Favor de introducir un nombre para su cuestionario".$AdClo;
            elseif(!preg_match("/^[a-z-A-ZñÑáéíóúÁÉÍÓÚ\s\d]*$/", $NomCuest))
                $NomAd=$AdDan."Error: Solo se pueden introducir numeros y letras sin acentos ni ñ.".$AdClo;
            elseif(strlen($NomCuest)>15)
                $NomAd=$AdDan."Error: El nombre debe ser de 15 caracteres maximo de largo.";
            else
            {
                $NomAd=$AdSuc."Se ha introducido un nombre adecuado".$AdClo;
                $NomVal=true;
            }
        }
        
        //Validacion de la cantidad de preguntas de este cuestionario
        $CantPreg=$_POST['CantPreg'];
        if(empty($CantPreg))
            $CantAd=$AdDan."Un cuestionario no puede tener cero preguntas.&nbsp;<br>&nbsp; Favor de seleccionar una cantidad";
        elseif($CantPreg>20)
            $CantAd=$AdDan."Ha ocurrido un error, no se pueden incorporar mas de 20 preguntas";
        else
        {
            $CantAd=$AdSuc."Ha seleccionado ".$CantPreg." preguntas para su cuestionario".$AdClo;
            $CantVal=true;
        }

        if($NomVal && $CantVal)
        {//Si las validaciones correspondieron, se procede a buscar el curso para poder crear el cuestionario
            if(isset($ID_Cur))
            {
                $sql="Insert into Cuestionario (Nombre,Curso_ID) values ('".$NomCuest."',".$ID_Cur.");";
                $consulta=$conexion->query($sql);
                //Una vez creado el cuestionario se obtiene el id de su registro para saber cuantas preguntas crear
                $ID_Cuestion=$conexion->insert_id;
                    //Por la configuracion de la BD es necesario asignarle una imagen por defecto a las preguntas
                    //Primero buscamos el tipo de recurso imagen
                    $sql="Select ID_Tipo from Tipo_Apoyo where Nombre='Imagen';";
                    $consulta=$conexion->query($sql);
                    while($res=$consulta->fetch_assoc())
                    {
                        $ID_Tip_Rec=$res['ID_Tipo'];
                    }
                    //Posteriormente se busca el ID de la imagen defecto en el sistema
                    $sql="Select ID_Apoyo from Apoyo where Nombre='Sin_Img' and Tipo_Apoyo_ID =".$ID_Tip_Rec.";";
                    $consulta=$conexion->query($sql);
                    while($res=$consulta->fetch_assoc())
                    {
                        $ID_Img=$res['ID_Apoyo'];
                    }
                //Por seguridad se comprueba que no se hayan registrado mas de 20 relacionadas con este cuestionario
                $sql="Select * from Pregunta where Cuestionario_ID=".$ID_Cuestion.";";
                $consulta=$conexion->query($sql);
                if($consulta->num_rows<20)
                {
                    for ($cont=1;$cont<=$CantPreg;$cont++) 
                    {
                        $sql="Insert into Pregunta (Tipo,Num_Preg_Cues,Cuestionario_ID,Apoyo_ID) values (1,".$cont.",".$ID_Cuestion.",".$ID_Img.");";
                        $consulta=$conexion->query($sql);
                    }
                    echo "<script>alert('Su cuestionario ha sido creado satisfactoriamente');</script>";
                    echo '<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=../../../Profesor/Principal_Prof.php">';
                }
                else
                    echo "<script>alert('No se pueden tener mas de 20 preguntas por cuestionario');</script>";
            }
        }
    }

    function validar($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>