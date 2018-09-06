<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT'].'/Educatorium/Funcionamiento/PHPs/Conn_Ses/conexion.php';

    if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
    {
        header("location: ../../Acceso/FAcces.php");
    }

    $user=$_SESSION['Username'];
    $MatGen=$_SESSION['Mat'];

    //Variables que almacenaran los datos recibidos por el formulario
    $NomCur = $OpcMsg = $MsgBienvenida = $OpcContra = $Contra = $CfnContra = "";
    //Variables de avisos
    $NomCurAd = $ImgBienAd = $MsgBienAd = $PassAd = $CfnPassAd= "";
    //Variables de ID´s usadas posteriormente
    $Tip_Archi=$ID_Img=0;// ID del tipo de archivo a subir\ID de la imagen una vez que se subio
    $ID_Mat=$ID_Prof=0;// ID de la materia\ID del profesor
    //Variables de confirmacion de validacion
    $HNom=$HMsg=$HImg=$HContra=false;

    //Variables para impresiones de avisos
    $AdSuc='<span class="label label-success">';
    $AdWar='<span class="label label-warning">';
    $AdDan='<span class="label label-danger">';
    $AdClo='</span>';

    //Confirmacion de existencia de las variables del formulario y su asignacion
    if(isset($_POST['nombre']) && isset($_POST['RespMsg']) && isset($_POST['MsgBi']) && isset($_POST['Resp']) && isset($_POST['pass']) && isset($_POST['cpass']))
    {
        $NomCur=$_POST['nombre'];
        $OpcMsg=$_POST['RespMsg'];
        $MsgBienvenida=$_POST['MsgBi'];
        $OpcContra=$_POST['Resp'];
        $Contra=$_POST['pass'];
        $CfnContra=$_POST['cpass'];
    }
    
    //Inicio de peticion de datos
    if(isset($_POST['enviar']))
    {
        //Nombre del curso
        $NomCur=validar($NomCur); //Se "limpia" el nombre de curso, adaptando los caracteres especiales.
        
        if(empty($NomCur))//Comprobar si se introdujo un nombre
            $NomCurAd=$AdDan.'El campo nombre está vacío'.$AdClo;
        else if(!preg_match("/^[a-z-A-Z0-9\s]*$/", $NomCur))//Comprobar si no se tienen caracteres extraños
            $NomCurAd=$AdDan.'Solo se permiten numeros, letras y espacios'.$AdClo;
        else if(strlen($NomCur) > 30)//Comprobar si el nombre cumple con una determinada longitud
            $NomCurAd=$AdDan.'El nombre es muy largo, solo se permiten 30 caracteres como maximo (incluidos los espacios)'.$AdClo;
        else
        {
            //Si se cumplio con todo lo anterior, sale el aviso de excelente
            $NomCurAd=$AdSuc.'Nombre adecuado'.$AdClo;
            $HNom=true;
        }

        //Verificar si se opto por ingresar un mensaje de bienvenida y una imagen de bienvenida
        if($OpcMsg=="Si")
        {
            //Mensaje de bienvenida
            $MsgBienvenida=validar($MsgBienvenida);//Se "limpia" el mensaje de bienvenida, adaptando los caracteres especiales.

            if(empty($MsgBienvenida))
                $MsgBienAd=$AdDan.'Favor de colocar un mensaje de bienvenida para el curso, no mayor a 100 caracteres'.$AdClo;
            elseif(strlen($MsgBienvenida)>99)
                $MsgBienAd=$AdDan.'Mensaje demasiado largo, solo se permiten 100 caracteres'.$AdClo;
            else
            {
                $MsgBienAd=$AdSuc.'Mensaje adecuado'.$AdClo;
                $HMsg=true;
            }

            //Imagen de bienvenida
            if(!empty($_FILES['imagen']['name']))
            {
                $nombre_imagen = $_FILES['imagen']['name'];
                $tipo_imagen = $_FILES['imagen']['type'];
                $tam_imagen = $_FILES['imagen']['size'];

                if($tipo_imagen="image/jpeg" || $tipo_imagen="image/jpg" || $tipo_imagen="image/png" || $tipo_imagen="image/gif")
                {
                    if($tam_imagen <= 5000000)
                    {                
                        //Cambiar el nombre de la imagen para saber de quien es y el curso que corresponde
                        $Img_Cur_Ser=explode('.', $nombre_imagen);
                        $Img_Cur_Ser1=explode('.', $NomCur);
                        //Nombre de la imagen para almacenar en el servidor
                        $Nom_Img_Ser='Img_Cur_'.$Img_Cur_Ser1[0].'_'.$MatGen.'_'.$user.'.'.$Img_Cur_Ser[1];
                        $Nom_Img_BD='Cur_'.$Img_Cur_Ser1[0].'_'.$MatGen.'_'.$user;
                        //Ruta donde se almacena la imagen en el servidor
                        $RutaSav = $_SERVER['DOCUMENT_ROOT'].'/Educatorium/imagenes/';
                        $Dir_Sav=$RutaSav.$Nom_Img_Ser;
                        $HImg=true;
                    }
                    else
                        $ImgBienAd=$AdDan.'La imagen es muy grande'.$AdClo;
                }
                else
                    $ImgBienAd=$AdDan.'Solo se pueden subir imágenes'.$AdClo;
            }
            else
                $ImgBienAd=$AdDan.'No se ha seleccionado una imagen de bienvenida'.$AdClo;
        }
                       
        //Contraseña
        //Revisar si se introdujo contraseña
        if($OpcContra=="Si")
        {
            $Contra=validar($Contra);
            $CfnContra=validar($CfnContra);
            //Revisar si se confirmo la contraseña ingresada
            $Check_Pass=RevContra($Contra,$CfnContra,$AdSuc,$AdWar,$AdDan,$AdClo,$HContra);
            //$Arr_Res = array($AdPass,$AdCfnPass,$cifrado,$HContra);
            $PassAd=$Check_Pass[0];
            $CfnPassAd=$Check_Pass[1];
            $Contra=$Check_Pass[2];
            $HContra=$Check_Pass[3];
        }

        //Antes de crear el curso, revisar si se subio una imagen de bienvenida en el servidor y obtener si ID si fuera asi
        if($HImg==true)
        {
            if(move_uploaded_file($_FILES['imagen']['tmp_name'], $Dir_Sav))//Subir la imagen al servidor, solo si se introdujo una
            {
                $ImgBienAd=$AdSuc.'Imagen subida adecuadamente'.$AdClo;
            }
            $Tip_Archi=TipArchi($conexion);//ID del tipo de archivo a subir, en este caso imagen
            $ID_Img=SavImg($Nom_Img_BD,$Tip_Archi,$Dir_Sav,$conexion);//ID de la imagen ya almacenada
        }
        else
            $ImgBienAd=$AdDan.'Favor de seleccionar una imagen'.$AdClo;
        
        //Creacion del curso
        //Obteniendo el id de la materia
        $sql="select ID_Materia from materia where Nombre='".$MatGen."';";
        $consulta=$conexion->query($sql);    
        if($consulta->num_rows>0)
        {
            while($res=$consulta->fetch_assoc())
            {
                $ID_Mat=$res['ID_Materia'];
            }
        }

        //Obteniendo el id del profesor
        $sql="select ID_Profesor from profesor where Username='".$user."';";
        $consulta=$conexion->query($sql);
        if($consulta->num_rows>0)
        {
            while($res=$consulta->fetch_assoc())
            {
                $ID_Prof=$res['ID_Profesor'];
            }
        }
        
        /*echo "Opcion del Msg Bienvenida: ".$OpcMsg."<br>".
        "Opcion de la contraseña: ".$OpcMsg."<br>".
        "Nombre del curso: ".$NomCur."<br>".
        "Msg del curso: ".$MsgBienvenida."<br>".
        "Contraseña del curso: ".$Contra."<br>".
        "ID Materia del curso: ".$ID_Mat."<br>".
        "ID de profesor que hizo el curso: ".$ID_Prof."<br>";*/
        if($OpcMsg=="Si" && $OpcContra=="Si")//Si el curso tuvo contraseña y mensaje de bienvenida
        {
            if($HNom && $HMsg && $HImg && $HContra)
            {
                //echo "Si hubo contenido de bienvenida y contraseña";
                $sql="Insert into curso (Nombre,Msg_Bien,Password,Materia_ID,Profesor_ID) values"
                    ."('".$NomCur."','".$MsgBienvenida."','".$Contra."',".$ID_Mat.",".$ID_Prof.")";
                $consulta=$conexion->query($sql);
                $ID_Curso=$conexion->insert_id;//Obtener el id del curso, para poder crear la relacion con la imagen que se subio
                //Crear relacion de curso con la imagen del mensaje de bienvenida
                $sql="Insert into apoyo_curso (Apoyo_ID,Curso_ID) values (".$ID_Img.",".$ID_Curso.")";
                $consulta=$conexion->query($sql);
                echo "<script>alert('Curso creado satisfactoriamente');</script>";
                echo '<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=../../Usuarios/Profesor/Principal_Prof.php">';
            }
        }
        else if($OpcMsg=="Si")//Si solo se introdujo mensaje de bienvenida
        {
            if($HNom && $HMsg && $HImg)
            {
                //echo "Solo hubo contenido de bienvenida";
                $sql="Insert into curso (Nombre,Msg_Bien,Materia_ID,Profesor_ID) values"
                    ."('".$NomCur."','".$MsgBienvenida."',".$ID_Mat.",".$ID_Prof.")";
                $consulta=$conexion->query($sql);
                $ID_Curso=$conexion->insert_id;//Obtener el id del curso, para poder crear la relacion con la imagen que se subio
                //Crear relacion de curso con la imagen del mensaje de bienvenida
                $sql="Insert into apoyo_curso (Apoyo_ID,Curso_ID) values (".$ID_Img.",".$ID_Curso.")";
                $consulta=$conexion->query($sql);
                echo "<script>alert('Curso creado satisfactoriamente');</script>";
                echo '<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=../../Usuarios/Profesor/Principal_Prof.php">';
            }
        }
        else if($OpcContra=="Si")//Si solo se introdujo contraseña
        {
            if($HNom && $HContra)
            {
                //echo "Solo hubo contraseña";
                $sql="Insert into curso (Nombre,Password,Materia_ID,Profesor_ID) values"
                    ."('".$NomCur."','".$Contra."',".$ID_Mat.",".$ID_Prof.")";
                $consulta=$conexion->query($sql);
                echo "<script>alert('Curso creado satisfactoriamente');</script>";
                echo '<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=../../Usuarios/Profesor/Principal_Prof.php">';
            }
        }
        else //Si solo se introdujo el nombre
        {
            if($HNom)
            {
                //echo "Solo hubo nombre";
                $sql="Insert into curso (Nombre,Materia_ID,Profesor_ID) values"
                    ."('".$NomCur."',".$ID_Mat.",".$ID_Prof.")";
                $consulta=$conexion->query($sql);
                echo "<script>alert('Curso creado satisfactoriamente');</script>";
                echo '<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=../../Usuarios/Profesor/Principal_Prof.php">';
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

    function RevContra($pass,$cpass,$AdSuc,$AdWar,$AdDan,$AdClo,$HContra)
    {
        //Avisos de retorno para muestra de condicion de contraseña y su confirmacion
        $AdPass=$AdCfnPass=$cifrado="";

        //Revision de contraseña        
        if(empty($pass))
            $AdPass=$AdDan.'El campo contraseña no puede estar vacío'.$AdClo;
        else if(strlen($pass) < 8)
            $AdPass=$AdDan.'La contraseña es muy corta, se solicita como minimo 8 caracteres'.$AdClo;
        else if(!preg_match('/(?=\d)/', $pass))
            $AdPass=$AdDan.'La contraseña debe contener al menos un dígito'.$AdClo;
        else if(!preg_match('/(?=[a-z])/', $pass))
            $AdPass=$AdDan.'La contraseña debe contener al menos una minúscula'.$AdClo;
        else if(!preg_match('/(?=[A-Z])/', $pass))
            $AdPass=$AdDan.'La contraseña debe contener al menos una mayúscula'.$AdClo;
        else
        {
            $AdPass=$AdSuc.'Contraseña adecuada'.$AdClo;
            $HContra=true;
            $cifrado = password_hash($pass, PASSWORD_DEFAULT);
        }

        //Confirmacion de contraseña
        if(empty($cpass))
            $AdCfnPass=$AdDan.'Favor de introducir otra vez su contraseña'.$AdClo;
        else if($cpass!=$pass)
            $AdCfnPass=$AdDan.'Las contraseñas ingresadas no coinciden'.$AdClo;
        else
            $AdCfnPass=$AdSuc.'Las contraseñas coinciden'.$AdClo;

        $Arr_Res = array($AdPass,$AdCfnPass,$cifrado,$HContra);
        return $Arr_Res;
    }

    //Funcion de busqueda de tipo de archivo subido
    function TipArchi($link)
    {
        //Investigar si hay algun registro guardado sobre el tipo de apoyo imagen
        $sql="Select * FROM tipo_apoyo WHERE Nombre='Imagen';";
        $ver=$link->query($sql);
        $result=$ver->num_rows;
        
        if($result==0)//En caso de que no, lo agregamos a la base de datos
        {
            $sql="Insert into tipo_apoyo (Nombre) values ('Imagen');";
            $ver=$link->query($sql);
        }
        //Considerando que ya existe, buscamos el ID del tipo imagen
        $sql="Select ID_Tipo FROM tipo_apoyo WHERE Nombre='Imagen';";
        
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
        $sql="Select * from apoyo where Nombre='".$nombre."' and Tipo_Apoyo_ID =".$TipoRecurso.";";
        $ver=$link->query($sql);
        $result=$ver->num_rows;
        
        if($result==0)
        {
            //Se almacena la imagen, con el tipo de recurso imagen
            $sql="Insert into apoyo (Nombre,Ruta,Tipo_Apoyo_ID) values ('".$nombre."','".$ruta."',".$TipoRecurso.");";
            $ver=$link->query($sql);
        }
        
        //Considerando que ya existe buscamos la imagen subida
        $sql="Select ID_Apoyo from apoyo where Nombre='".$nombre."' and Tipo_Apoyo_ID=".$TipoRecurso.";";
        
        if($ver=$link->query($sql))
        {
            while($cont=$ver->fetch_row())
            {
                return $cont[0];//Retornar el id del tipo de apoyo imagen para guardarlo junto con los datos
            }
        }        
    }
?>