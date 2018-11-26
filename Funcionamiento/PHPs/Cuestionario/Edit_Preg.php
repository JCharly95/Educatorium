<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT'].'/Educatorium/Funcionamiento/PHPs/Conn_Ses/conexion.php';

    if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
    {
        header("location: ../../Acceso/FAcces.php");
    }

    $ID_Preg_Edit=$_SESSION['ID_Preg'];
    $Tipo_Preg="";
    $Pregunta="";
    $Imagen="";
    $cant_preg=$Posicion=$ID_Bloq=$Cant_Izq=$Cant_Der=0;
    $HImg=false;
    //Alternativas a recibir
    $Alterns=array();
    $NonAlter=array();
    //Condicion de las alternativas a recibir
    $Cond_Alterns=array();
    //Relacion de columnas
    $Altern_Izq=array();
    $Altern_Der=array();
    //Orden de seleccion
    $Pos_Right=array();

    //Numero de pregunta para la imagen
    $sql="select Num_Preg_Cues from Pregunta where ID_Pregunta=".$ID_Preg_Edit.";";
    $consulta=$conexion->query($sql);
    while($res=$consulta->fetch_assoc())
    {
        $cant_preg=$res['Num_Preg_Cues'];
    }

    if(isset($_POST['enviar']))
    {
        $Tipo_Preg=$_POST['Tip_Preg'];
        $Pregunta=$_POST['Pregunta'];
        $Imagen=$_POST['ImgPreg'];

        //Verificacion de imagen relacionada con la pregunta
        if($Imagen=="Si")
        {
            if(!empty($_FILES['imagen']['name']))
            {
                $nombre_imagen=$_FILES['imagen']['name'];
                $tipo_imagen=$_FILES['imagen']['type'];
                $tam_imagen=$_FILES['imagen']['size'];
        
                if($tipo_imagen="image/jpeg" || $tipo_imagen="image/jpg" || $tipo_imagen="image/png" || $tipo_imagen="image/gif")
                {
                    if($tam_imagen<=5000000)
                    {                
                        //Separar el nombre de la imagen para saber su extension
                        $Img_Cur_Ser=explode('.', $nombre_imagen);
                        //Ruta de la imagen para almacenar en el servidor y en la BD
                        $Nom_Img_Ser='Preg'.$cant_preg.'.'.$Img_Cur_Ser[1];
                        //Nombre para identificar la imagen en la BD
                        $Nom_Img_BD=$Cuestion.'_Preg'.$cant_preg.'_'.$user;
                        //Ruta donde se almacena la imagen en el servidor
                        $RutaSav=$_SERVER['DOCUMENT_ROOT'].'/Educatorium/imagenes/';
                        $Dir_Sav=$RutaSav.$Nom_Img_Ser;
                        $HImg=true;
                    }
                    else
                        echo "<script>alert('La imagen es muy grande');</script>";
                }
                else
                    echo "<script>alert('Solo se pueden subir imágenes');</script>";
            }
            else
                echo "<script>alert('No se ha seleccionado una imagen');</script>";

            if($HImg==true)
            {
                if(move_uploaded_file($_FILES['imagen']['tmp_name'], $Dir_Sav))//Subir la imagen al servidor, solo si se introdujo una
                {
                    echo "<script>alert('Imagen subida correctamente');</script>";
                }
                $Tip_Archi=TipArchi($conexion);//ID del tipo de archivo a subir, en este caso imagen
                $ID_Img=SavImg($Nom_Img_BD,$Tip_Archi,$Dir_Sav,$conexion);//ID de la imagen ya almacenada
            }
            else
            echo "<script>alert('Favor de seleccionar una imagen');</script>";
        }
        else
        {
            $ID_Img=1;
        }

        //Borrado de las respuestas originales
        $sql="select Tipo from Pregunta where ID_Pregunta=".$ID_Preg_Edit.";";
        $consulta=$conexion->query($sql);
        while($res=$consulta->fetch_assoc())
        {
            $Tipo_Preg=$res['Tipo'];
        }
        
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
            //Primero se busca el bloque, posteriormente se borra y despues se borran las alternativas
            $sql="select distinct Bloque from Altern_Compl where Pregunta_ID=".$ID_Preg_Edit.";";
            $consulta=$conexion->query($sql);

            while($res=$consulta->fetch_assoc())
            {
                $ID_Bloq=$res['Bloque'];
            }

            $sql="delete from Desc_Bloques where ID_Bloque=".$ID_Bloq.";";
            $consulta=$conexion->query($sql);

            $sql="delete from Altern_Compl where Pregunta_ID=".$ID_Preg_Edit.";";
            $consulta=$conexion->query($sql);
        }

        //Actualizacion de la pregunta
        $sql="update Pregunta set Contenido='".$Pregunta."', Tipo=".$Tipo_Preg." where ID_Pregunta=".$ID_Preg_Edit.";";
        $consulta=$conexion->query($sql);

        //Se verifica que tipo de pregunta fue seleccionada para proceder con su respectivo procesamiento
        switch ($Tipo_Preg) 
        {
            case 1:
            //4 alternativas, 1 correcta
                $Alterns=$_POST['OpcRes1'];
                $Cond_Alterns=$_POST['CondRes1'];

                foreach($Cond_Alterns as $Pos_Corr) 
                {
                    //Primero se averigua cual es la alternativa correcta, segun el profesor
                    if(!isset($Pos_Corr))
                        $Posicion=$Pos_Corr;
                }

                for($cont=0;$cont<count($Alterns);$cont++)
                {
                    if($cont-1==$Posicion)
                    {
                        //Cuando se encuentre la posicion, dicha alternativa sera registrada con ese estatus
                        $sql="insert into Alternativa (Contenido,Pregunta_ID,Estatus_Prof) values "
                        ."('".$Alterns[$cont]."',".$ID_Preg_Edit.",1);";
                        $consulta=$conexion->query($sql);
                    }
                    else
                    {
                        //El resto seran alternativas incorrectas
                        $sql="insert into Alternativa (Contenido,Pregunta_ID,Estatus_Prof) values "
                        ."('".$Alterns[$cont]."',".$ID_Preg_Edit.",2);";
                        $consulta=$conexion->query($sql);
                    }
                }

                echo "<script>alert('Pregunta 4 alternativas y una respuesta ha sido creada');</script>";
                echo '<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=../../../Usuarios/Profesor/Principal_Prof.php">';
                break;
                
            case 2:
            //7 alternativas varias respuestas correctas
                $Alterns=array_filter($_POST['OpcRes2']);
                $Cond_Alterns=$_POST['CondRes2'];

                if(count($Cond_Alterns)>count($Alterns))
                {
                    echo "<script>alert('Error: No puede haber mas respuestas correctas de las que fueron ingresadas.');</script>";
                }
                else
                {
                    /*Primero se averigua cuales son las alternativas correctas, segun el profesor.
                    Se recorre el arreglo donde se registraron cuales seran las respuestas correctas*/
                    for($cont=0;$cont<count($Cond_Alterns);$cont++)
                    {
                        /*Se determina que una respuesta es correcta si el valor del arreglo de alternativas en la posicion
                        del valor de la casilla seleccionada existe y no es nulo*/
                        if(isset($Alterns[$Cond_Alterns[$cont]-1]))
                        {
                            //Cuando se encuentre la posicion, dicha alternativa sera registrada con ese estatus
                            $sql="insert into Alternativa (Contenido,Pregunta_ID,Estatus_Prof) values "
                            ."('".$Alterns[$Cond_Alterns[$cont]-1]."',".$ID_Preg_Edit.",1);";
                            $consulta=$conexion->query($sql);
                            //Una vez encontradas las respuestas correctas se eliminan del arreglo
                            unset($Alterns[$Cond_Alterns[$cont]-1]);
                        }
                    }
                    //Si el arreglo no quedo vacio, se procede a registrar el resto de alternativas como incorrectas
                    if(!empty($Alterns))
                    {
                        foreach ($Alterns as $RespIn) 
                        {
                            $sql="insert into Alternativa (Contenido,Pregunta_ID,Estatus_Prof) values "
                            ."('".$RespIn."',".$ID_Preg_Edit.",2);";
                            $consulta=$conexion->query($sql);
                        }
                    }
                }

                echo "<script>alert('Pregunta 7 alternativas y varias respuestas ha sido creada');</script>";
                echo '<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=../../../Usuarios/Profesor/Principal_Prof.php">';
                break;

            case 3:
            //Cierto y falso
                $Alterns=$_POST['OpcRes3'];

                if($Alterns[0]==1)//Si la respuesta correcta es Cierto
                {
                    $sql="insert into Alternativa (Contenido,Pregunta_ID,Estatus_Prof) values "
                    ."('Cierto',".$ID_Preg_Edit.",1);";
                    $consulta=$conexion->query($sql);
                    $sql="insert into Alternativa (Contenido,Pregunta_ID,Estatus_Prof) values "
                    ."('Falso',".$ID_Preg_Edit.",2);";
                    $consulta=$conexion->query($sql);
                }
                else//Si la respuesta correcta es Falso
                {
                    $sql="insert into Alternativa (Contenido,Pregunta_ID,Estatus_Prof) values "
                    ."('Falso',".$ID_Preg_Edit.",1);";
                    $consulta=$conexion->query($sql);
                    $sql="insert into Alternativa (Contenido,Pregunta_ID,Estatus_Prof) values "
                    ."('Cierto',".$ID_Preg_Edit.",2);";
                    $consulta=$conexion->query($sql);
                }

                echo "<script>alert('Pregunta cierto o falso ha sido creada');</script>";
                break;

            case 4:
            //Relacion de columnas
                $Altern_Izq=$_POST['OpcRes4'];
                $Altern_Der=$_POST['OpcRes41'];
                if(count($Altern_Izq)==count($Altern_Der))
                {
                    $Cant_Izq=count(array_filter($Altern_Izq));
                    $Cant_Der=count(array_filter($Altern_Der));

                    //Se crea el bloque que "agrupara" las alternativas con las columnas
                    $sql="insert into Desc_Bloques (Desc_Bloque) values ('".$Cuestion.", Preg".$NumPreg.", ".$User."');";
                    $consulta=$conexion->query($sql);
                    $ID_Bloq=$conexion->insert_id;//Obtener el id del bloque creado

                    for($cont=0;$cont<$Cant_Izq;$cont++)
                    {
                        $sql="insert into Altern_Rel_Cols (Alter_a_Rel,Inciso_Right,Pregunta_ID,Bloque) values"
                        ."('".$Altern_Izq[$cont]."','".$Altern_Der[$cont]."',".$ID_Preg_Edit.",".$ID_Bloq.")";
                        $consulta=$conexion->query($sql);
                    }
                    echo "<script>alert('Pregunta de relacion de columnas ha sido creada');</script>";
                    echo '<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=../../../Usuarios/Profesor/Principal_Prof.php">';
                }
                else
                {
                    echo "<script>alert('Favor de introducir la misma cantidad de columnas de relacion y alternativas');</script>";
                }
                break;

            case 5:
            //Orden historico
                $Alterns=$_POST['OpcRes5'];
                $Salida=false;
                //Se crea el bloque que "agrupara" el orden de seleccionado
                $sql="insert into Desc_Bloques (Desc_Bloque) values ('".$Cuestion.", Preg".$NumPreg.", ".$User."');";
                $consulta=$conexion->query($sql);
                $ID_Bloq=$conexion->insert_id;//Obtener el id del bloque creado

                //Ya que las posiciones llegaran en una select diferente, se agrupa todo de una para analizarlo
                array_push($Pos_Right,$_POST['CondRes51'],$_POST['CondRes52'],$_POST['CondRes53'],$_POST['CondRes54'],$_POST['CondRes55']);

                foreach ($Pos_Right as $Opcs)
                {
                    if(is_nan($Opcs))
                    {
                        $Salida=true;
                        break;
                    }
                }

                if($Salida)
                {
                    echo "<script>alert('Error: alguna alternativa no cuenta con una posicion');</script>";
                }
                else
                {
                    for($cont=0;$cont<count($Alterns);$cont++)
                    {
                        $sql="insert into Altern_Ord_Sel (Contenido,Pos_Corre,Pregunta_ID,Bloque) values"
                        ."('".$Alterns[$cont]."',".$Pos_Right[$cont].",".$ID_Preg_Edit.",".$ID_Bloq.");";
                        $consulta=$conexion->query($sql);
                    }
                    echo "<script>alert('Pregunta de alternativa de orden de seleccion ha sido creada');</script>";
                    echo '<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=../../../Usuarios/Profesor/Principal_Prof.php">';
                }
                break;

            case 6:
            //Completa la oracion
                //Se filtran los arreglos vacios para no analizarlos
                array_push($Alterns,array_filter($_POST['OpcRes61']),array_filter($_POST['OpcRes62']),array_filter($_POST['OpcRes63']),array_filter($_POST['OpcRes64']),array_filter($_POST['OpcRes65']));

                if(!isset($_POST['CondRes61'],$_POST['CondRes62'],$_POST['CondRes63'],$_POST['CondRes64'],$_POST['CondRes65']))
                {
                    if(isset($_POST['CondRes61']))
                        array_push($Cond_Alterns,$_POST['CondRes61']);

                    if(isset($_POST['CondRes62']))
                        array_push($Cond_Alterns,$_POST['CondRes62']);

                    if(isset($_POST['CondRes63']))
                        array_push($Cond_Alterns,$_POST['CondRes63']);

                    if(isset($_POST['CondRes64']))
                        array_push($Cond_Alterns,$_POST['CondRes64']);

                    if(isset($_POST['CondRes65']))
                        array_push($Cond_Alterns,$_POST['CondRes65']);
                }
                else
                    array_push($Cond_Alterns,$_POST['CondRes61'],$_POST['CondRes62'],$_POST['CondRes63'],$_POST['CondRes64'],$_POST['CondRes65']);
                
                for($rows=0;$rows<count($Cond_Alterns);$rows++)
                {
                    for($cols=0;$cols<count($Cond_Alterns[$rows]);$cols++)
                    {
                        /*Se busca si existe un valor en el arreglo de alternativas cuando la fila de la alternativa
                        y la condicion sean la misma, pero la columna sea el valor del arreglo de condiciones en una fila y una columna menos 1*/
                        if(isset($Alterns[$rows][$Cond_Alterns[$rows][$cols]-1]))
                        {
                            $sql="insert into Altern_Compl (Contenido,Pert_lista,Pregunta_ID,Estatus_Prof) values"
                            ."('".$Alterns[$rows][$Cond_Alterns[$rows][$cols]-1]."',".($rows+1).",".$ID_Preg_Edit.",1);";
                            $consulta=$conexion->query($sql);
                            //Una vez encontradas las respuestas correctas se eliminan del arreglo
                            unset($Alterns[$rows][$Cond_Alterns[$rows][$cols]-1]);
                        }    
                    }
                }

                //Si el arreglo no quedo vacio, se procede a registrar el resto de alternativas como incorrectas
                if(!empty($Alterns))
                {
                    for($RowRespIn=0;$RowRespIn<count($Alterns);$RowRespIn++)
                    {
                        foreach ($Alterns[$RowRespIn] as $ColRespIn) 
                        {
                            $sql="insert into Altern_Compl (Contenido,Pert_lista,Pregunta_ID,Estatus_Prof) values"
                            ."('".$ColRespIn."',".($RowRespIn+1).",".$ID_Preg_Edit.",2);";
                            $consulta=$conexion->query($sql);
                        }
                    }
                }

                echo "<script>alert('Pregunta de completar la oracion ha sido creada');</script>";
                echo '<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=../../../Usuarios/Profesor/Principal_Prof.php">';
                break;

            case 7:
            //Linkert
                $Alterns=$_POST['OpcRes7'];
                foreach($Alterns as $Resp)
                {
                    $sql="insert into Alternativa (Contenido,Pregunta_ID,Estatus_Prof) values "
                    ."('".$Resp."',".$ID_Preg_Edit.",3);";
                    $consulta=$conexion->query($sql);
                }
                echo "<script>alert('Pregunta de Linkert ha sido creada');</script>";
                echo '<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=../../../Usuarios/Profesor/Principal_Prof.php">';
                break;
                
            default:
                echo "<script>alert('Favor de seleccionar un tipo de pregunta');</script>";
                break;
        }
    }

    //Funcion de busqueda de tipo de archivo subido
    function TipArchi($link)
    {
        //Investigar si hay algun registro guardado sobre el tipo de apoyo imagen
        $sql="Select * FROM Tipo_Apoyo WHERE Nombre='Imagen';";
        $ver=$link->query($sql);
        $result=$ver->num_rows;
        
        if($result==0)//En caso de que no, lo agregamos a la base de datos
        {
            $sql="Insert into Tipo_Apoyo (Nombre) values ('Imagen');";
            $ver=$link->query($sql);
        }
        //Considerando que ya existe, buscamos el ID del tipo imagen
        $sql="Select ID_Tipo FROM Tipo_Apoyo WHERE Nombre='Imagen';";
        
        if($ver=$link->query($sql))
        {
            while($cont=$ver->fetch_row())
            {
                return $cont[0];//Retornar el id del tipo de apoyo imagen para guardarlo junto con los datos
            }
        }
    }

    //Funcion de busqueda de imagen guardada
    function SavImg($nombre,$TipoRecurso,$ruta,$link)
    {
        //Investigar si ya hay alguna imagen guardada con el mismo nombre en la BD
        $sql="Select * from Apoyo where Nombre='".$nombre."' and Tipo_Apoyo_ID =".$TipoRecurso.";";
        $ver=$link->query($sql);
        $result=$ver->num_rows;
        
        if($result==0)
        {
            //Se almacena la imagen, con el tipo de recurso imagen
            $sql="Insert into Apoyo (Nombre,Ruta,Tipo_Apoyo_ID) values ('".$nombre."','".$ruta."',".$TipoRecurso.");";
            $ver=$link->query($sql);
        }
        
        //Considerando que ya existe buscamos la imagen subida
        $sql="Select ID_Apoyo from Apoyo where Nombre='".$nombre."' and Tipo_Apoyo_ID=".$TipoRecurso.";";
        
        if($ver=$link->query($sql))
        {
            while($cont=$ver->fetch_row())
            {
                return $cont[0];//Retornar el id del tipo de apoyo imagen para guardarlo junto con los datos
            }
        }        
    }
?>