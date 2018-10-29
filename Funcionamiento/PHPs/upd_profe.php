<?php
    if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
    {
        header("location: ../../Acceso/FAcces.php");
    }
    $user = $_SESSION['Username'];

    //Variables que almacenaran los datos recibidos por el formulario
    $NTel = $NEmail = $NUser = $NPass = $NKeyT = $CNPass = $NKeyW = "";
    $NImgNam = $NImgTip = $NImgTam = $EscReg = $SelEsc = $NTipEsc = $NNomEsc = $NNumEsc = "";
    //Variables de avisos
    $TelAd = $EmailAd = $UserAd = $PassAd = $CPassAd = $TipKeyAd = $KeyAd = $ImgAd = $SelEscAd = $TipEscAd = $NomEscAd = $NumEscAd = "";
    //Variables de ID´s usadas posteriormente
    $Tip_Archi=$ID_Img=0;// ID del tipo de archivo a subir\ID de la imagen una vez que se subio

    //Variables para impresiones de avisos
    $AdSuc='<span class="label label-success">';
    $AdWar='<span class="label label-warning">';
    $AdDan='<span class="label label-danger">';
    $AdClo='</span>';

    /*$NomEsc=$res['Nombre'];
    $NoEsc=$res['Num_Esc'];*/
    
    /*Cualquier campo que no sea llenado (o seleccionado en el caso de la imagen) 
    conservara su valor y solo se hara la observacion de que no fue modificado, ademas se comprobará que no
    se esten introduciendo valores iguales a los ya registrados.*/

    //Detectamos si se ha dado clic en el botón de actualizar datos
    if(isset($_POST['actualizar']))
    {
        $NTel = validar($_POST['tel']);//Comienzo de validacion del telefono
        if(empty($NTel))
            $TelAd=$AdWar."El telefono no fue actualizado".$AdClo;
        else
        {
            if($NTel==$NumTele)//Verificacion de telefono duplicado
                $TelAd=$AdDan."Favor de introducir un numero de telefono diferente".$AdClo;
            else
            {
                if(!preg_match("/^\d{8}$/", $NTel) && !preg_match("/^\d{10}$/", $NTel))//Verificar que el numero telefonico contiene entre 8 y 10 digitos
                    $TelAd=$AdDan."El numero de telefono debe constar de 8 o 10 digitos.".$AdClo;
                else //Si no hubo problema con las validaciones anteriores, se procede con la actualizacion de numero en la BD
                {
                    $sql="Update profesor SET Tel='".$NTel."' where Username='".$user."';";
                    if($conexion->query($sql)==true)
                    {
                        echo "<script>alert('El numero telefonico ha sido actualizado');</script>";
                        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../../Usuarios/Profesor/Principal_Prof.php">';
                    }
                    else
                        echo "<script>alert('No se pudo modificar el numero telefonico');</script>";
                }
            }
        }

        $NEmail = validar($_POST['correo']);//Comienzo de validacion del correo
        if(empty($NEmail))
            $EmailAd=$AdWar."El correo no fue actualizado".$AdClo;
        else
        {
            if(strcmp($NEmail,$DirCorr)==0)//Verificacion de direccion de correo duplicado
                $EmailAd=$AdDan."Favor de introducir una direccion de correo diferente".$AdClo;
            else
            {
                /* Verificar que la direccion de correo electronico cumpla con la sintaxis de RFC 822 que 
                tiene la forma usuario@anfitrión.dominiopara */
                if(!filter_var($NEmail, FILTER_VALIDATE_EMAIL))
                    $EmailAd=$AdDan."El formato de correo es inválido".$AdClo;
                else//Si no hubo problema con las validaciones anteriores, se procede con la actualizacion del correo en la BD
                {
                    $sql="Update profesor SET Correo='".$NEmail."' where Username='".$user."';";
                    if($conexion->query($sql)==true)
                    {
                        echo "<script>alert('El correo fue actualizado');</script>";
                        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../../Usuarios/Profesor/Principal_Prof.php">';
                    }
                    else
                        echo "<script>alert('No se pudo modificar el correo');</script>";
                }
            }
        }
                
       $NUser = validar($_POST['usuario']);//Comienzo de validacion del username
        if(empty($NUser))
            $UserAd=$AdWar."El nombre de usuario no fue actualizado".$AdClo;
        else 
        {
            if(strcmp($NUser,$user)==0)//Verificacion de username duplicado
                $UserAd=$AdDan."Favor de introducir un nombre de usuario diferente".$AdClo;
            else
            {
                //Verificar que el nombre de usuario no contenga caracteres especiales, espacios o caracteres no imprimibles
                if(!preg_match("/^[a-z-A-Z-0-9]*$/", $NUser))
                    $UserAd=$AdDan."El nombre de usuario debe constar de números y letras.".$AdClo;
                else
                {
                    if(strlen($NUser)>10)//Verificar que el nombre de usuario no sea demasiado largo >10 caracteres
                        $UserAd=$AdDan."El nombre de usuario no puede tener mas de 10 caracteres".$AdClo;
                    else//Si no hubo problema con las validaciones anteriores, se procede con la actualizacion de username en la BD y se cierra la sesion
                    {
                        $sql="Update profesor SET Username='".$NUser."' where Username='".$user."';";
                        if($conexion->query($actualizar)==true)
                        {
                            echo "<script>alert('Nombre de usuario actualizado');</script>";
                            require 'Cer_Ses.php';
                            echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../../Usuarios/Profesor/Principal_Prof.php">';
                        }
                        else
                            echo "<script>alert('No se pudo modificar el nombre de usuario');</script>";
                    }
                }
            }
        }

        $NPass = validar($_POST['pass']);
        $CNPass = validar($_POST['cpass']);
        if(empty($NPass))//Comienzo de la verificacion de la nueva contraseña
            $PassAd=$AdWar."La contraseña no fue actualizada".$AdClo;
        else
        {
            if(strlen($pass)<8)//Verificar que la contraseña no contenga menos de 8 caracteres
                $PassAd=$AdDan."La contraseña es muy corta".$AdClo;
            else
            {
                //Verificar que la contraseña contenga un numero de al menos un digito
                if(!preg_match('/(?=\d)/', $pass))
                    $PassAd=$AdDan."La contraseña debe contener al menos un numero".$AdClo;
                else
                {
                    //Verificar que la contraseña contenga por lo menos una letra minuscula
                    if(!preg_match('/(?=[a-z])/', $pass))
                        $PassAd=$AdDan."La contraseña debe contener al menos una letra minúscula".$AdClo;
                    else
                    {
                        //Verificar que la contraseña contenga por lo menos una letra mayuscula
                        if(!preg_match('/(?=[A-Z])/', $pass))
                            $PassAd=$AdDan."La contraseña debe contener al menos una letra mayuscula".$AdClo;
                        else
                        {
                            /*Antes de registrar la nueva contraseña, se verifica que se modificará,
                            confirmandola en un segundo campo de texto*/
                            if(empty($CNPass))
                                $CPassAd=$AdDan."Favor de introducir otra vez su contraseña".$AdClo;
                            else
                            {// Se verifica que la confirmacion coincida
                                if($NPass!=$CNPass)
                                    $CPassAd=$AdDan."Las contraseñas no coinciden".$AdClo;
                                else
                                {//Si todo coincide, se procede a encriptar la contraseña y actualizarla en la BD
                                    $cifrado = password_hash($NPass, PASSWORD_DEFAULT);
                                    $sql="Update profesor SET Password='".$cifrado."' where Username='".$user."';";
                                    if($conexion->query($sql)==true)
                                    {
                                        echo "<script>alert('Contraseña actualizada');</script>";
                                        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../../Usuarios/Profesor/Principal_Prof.php">';
                                    }
                                    else
                                        echo "<script>alert('No se pudo modificar la contraseña');</script>";
                                }
                            }
                        }
                    }
                }
            }
        }
        
        $NKeyT=$_POST['Tipo_Keyword'];
        $NKeyW = validar($_POST['keyword']);
        if(empty($NKeyT) || empty($NKeyW))
        {
            /*Si no fue seleccionada alguna pregunta de recuperacion y tampoco se lleno el campo de la palabra
            no se procedera a verificar los datos*/
            if(empty($NKeyT) && empty($NKeyW))
            {
                $TipKeyAd=$AdWar."Pregunta de recuperacion no modificada".$AdClo;
                $KeyAd=$AdWar."Palabra de recuperacion no modificada".$AdClo;
            }

            if(!empty($NKeyT) && empty($NKeyW))
                $KeyAd=$AdDan."Favor de insertar su nueva palabra de recuperacion".$AdClo;

            if(empty($NKeyT) && !empty($NKeyW))
                $TipKeyAd=$AdDan."Favor de seleccionar su pregunta de recuperacion".$AdClo;
        }
        else 
        {
            if(strcmp($KeyPal,$NKeyW)==0)
                $KeyAd=$AdDan."Favor de introducir una palabra de recuperacion diferente".$AdClo;
            else
            {
                if(strlen($NKeyW)<8 && strlen($NKeyW)>15)
                    $KeyAd=$AdDan."Favor de poner una palabra de entre 8 y 15 caracteres".$AdClo;
                else
                {
                    if(!preg_match('/(?=[a-z])/', $NKeyW))
                        $KeyAd=$AdDan."Favor de poner al menos una letra minúscula".$AdClo;
                    else
                    {
                        if(!preg_match('/(?=[A-Z])/', $NKeyW))
                            $KeyAd=$AdDan."Favor de poner al menos una letra mayúscula".$AdClo;
                        else
                        {
                            $sql="Update profesor SET Keyword='".$NKeyW."' where Username='".$user."';";
                            if($conexion->query($sql)==true)
                            {
                                echo "<script>alert('Palabra de recuperacion actualizada');</script>";
                                echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../../Usuarios/Profesor/Principal_Prof.php">';
                            }
                            else
                                echo "<script>alert('No se pudo modificar la palabra de recuperacion');</script>";
                        }
                    }
                }
            }
        
        }

        //En la interfaz de actualizacion de datos se mostrara la imagen de perfil actual, sin enviar algun dato para comenzar a procesarlo
        if(empty($_FILES['imagen']['name']))
            $ImgAd=$AdWar."La imagen de perfil no fue actualizada".$AdClo;
        else
        {
            $NImgNam=$_FILES['imagen']['name'];
            $NImgTip=$_FILES['imagen']['type'];
            $NImgTam=$_FILES['imagen']['size'];
            if($NImgTip="image/jpeg" || $NImgTip="image/jpg" || $NImgTip="image/png" || $NImgTip="image/gif")
            {
                if($NImgTam<=5000000)
                {
                    $nom_img_ser=explode('.', $NImgNam);//Separar el nombre de la extension del archivo buscando un punto en la cadena del nombre
                    $nombre_imagen='Img_'.$user.'.'.$nom_img_ser[1];//Renombrar la imagen para subirla al servidor añadiendo su extension
                    $nom_img_bus='Img_'.$user;//Nombre de la imagen que se almacenara en la BD
                    $destino = $_SERVER['DOCUMENT_ROOT'].'/Educatorium/imagenes/';
                    $dir_ruta=$destino.$nombre_imagen;
                    //Subida de imagen (Parte de la base de datos)
                    $ID_Tip_Img=TipArchi($conexion);//Especificar que tipo de archivo se va a subir en la BD
                    $Cond_Img=SvImg($nom_img_bus,$ID_Tip_Img,$dir_ruta,$conexion);//Obtener el ID de la informacion de la imagen en la BD
                    //Subida de la imagen (Parte del servidor)
                    if(is_uploaded_file($_FILES['imagen']['tmp_name']) && $Cond_Img)
                    {
                        move_uploaded_file($_FILES['imagen']['tmp_name'], $dir_ruta);
                        echo "<script>alert('Imagen de perfil actualizada');</script>";
                        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../../Usuarios/Profesor/Principal_Prof.php">';
                    }
                    else
                        echo "<script>alert('No se pudo modificar la imagen de perfil');</script>";
                }
                else
                    $ImgAd=$AdDan."La imagen a subir es muy grande".$AdClo;
            }
            else
                $ImgAd=$AdDan."Solo se pueden subir imágenes".$AdClo;
        }

        //Buscar si la escuela ya esta registrada
        $EscReg = validar($_POST['escuelas']);
        $SelEsc = validar($_POST['RespSelEsc']);
        if($EscReg=="N/A")
        {
            if($SelEsc=="No")
            {
                //No fue seleccionado nada de la lista y se opto por registrar una nueva secundaria
                //Validacion de tipo de escuela
                $NTipEsc = validar($_POST['tipo']);
                if(empty($NTipEsc))
                    $TipEscAd=$AdDan."Favor de seleccionar un tipo de secundaria".$AdClo;
                else
                    $TipEscAd=$AdSuc."Ha seleccionado un tipo de secundaria".$AdClo;

                //VALIDACION DEL NUMERO DE SECUNDARIA
                $NNumEsc= validar($_POST['num']);
                if(empty($NNumEsc))
                    $NumEscAd=$AdDan."Favor de introducir un numero de escuela".$AdClo;
                else
                {
                    if(!preg_match("/^d{1,3}$/", $NNumEsc))
                        $NumEscAd=$AdDan."* El número de escuela debe estar conformado por 3 números máximo.".$AdClo;
                    else
                        $NumEscAd=$AdSuc."Ha introducido un numero adecuado de secundaria".$AdClo;
                }
                
                //VALIDACION DEL NOMBRE DE LA ESCUELA
                $NNomEsc=validar($_POST['esc']);
                if(empty($NNomEsc))
                    $NomEscAd=$AdDan."El nombre de escuela no puede estar vacío".$AdClo;
                else
                {
                    if(!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*$/", $NNomEsc))
                        $NomEscAd=$AdDan."El nombre de la escuela solo puede llevar letras y espacios en blanco.".$AdClo;
                    else
                    {
                        if(strlen($NNomEsc)>30) 
                            $NomEscAd=$AdDan."El nombre de la escuela solo puede tener 30 caracteres como maximo".$AdClo;
                        else
                            $NomEscAd=$AdDan."Ha introducido un nombre de secundaria adecuado".$AdClo;
                    }
                }
                //Se procede a registrar la nueva secundaria y posteriormente crear la relacion
                $reg_esc=VerEsc($NNomEsc,$NTipEsc,$NNumEsc,$conexion);
                //Se obtiene el ID del profesor para crear la relacion
                $sql="select ID_Profesor from profesor where Username='".$user."';";
                if($ver=$conexion->query($sql))
                {
                    while($cont=$ver->fetch_assoc())
                    {
                        $ID_profe=$cont['ID_Profesor'];
                    }
                }
                //$sql="Update profesor SET Keyword='".$NKeyW."' where Username='".$user."';";
                $sql="Update profe_escu SET Profesor_ID=".$ID_profe.", Escuela_ID=".$reg_esc.";";
                if($ver=$conexion->query($sql))
                {
                    echo "<script>alert('Escuela donde labora actualizada');</script>";
                    echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../../Usuarios/Profesor/Principal_Prof.php">';
                }
                else
                    echo "<script>alert('No se pudo modificar la escuela donde labora');</script>";
            }

            if ($SelEsc=="Si") 
                //Si no se dio clic en alguna secundaria registrada y no se va a registrar una, no se mueve nada
                $SelEscAd=$AdWar."La secundaria no fue actualizada".$AdClo;
        }
        else //$EscReg!="N/A"
        {
            if($SelEsc=="No")
            {
                /*Si fue seleccionada una secundaria de la lista pero tambien se opto por registrar una nueva, se procede a conservar
                la secundaria seleccionada y cancelar el registro de una nueva*/
                echo "document.getElementById('RESi').checked = true;";
                $SelEscAd=$AdDan."Si fue seleccionada una secundaria de la lista, favor de mantener la opcion Si".$AdClo;
            }

            if ($SelEsc=="Si") 
            {
                //Al estar la escuela ya registrada, solo es cuestion de crear la relacion con el profesor
                //Se busca otra vez si la escuela esta registrada, por si acaso
                $sql="Select * from escuela where ID_Escuela=".$EscReg.";";
                $ver=$conexion->query($sql);
                $result=$ver->num_rows;
                if ($result==0)
                    $SelEscAd=$AdDan."No se pudo encontrar la secundaria seleccionada".$AdClo;
                else
                {
                    while($cont=$ver->fetch_assoc())
                    {
                        $reg_esc=$cont['ID_Escuela'];
                    }
                }

                //Se obtiene el ID del profesor para crear la relacion
                $sql="select ID_Profesor from profesor where Username='".$user."';";
                if($ver=$conexion->query($sql))
                {
                    while($cont=$ver->fetch_assoc())
                    {
                        $ID_profe=$cont['ID_Profesor'];
                    }
                }
                //$sql="Update profesor SET Keyword='".$NKeyW."' where Username='".$user."';";
                $sql="Update profe_escu SET Profesor_ID=".$ID_profe.", Escuela_ID=".$reg_esc.";";
                if($ver=$conexion->query($sql))
                {
                    echo "<script>alert('Escuela donde labora actualizada');</script>";
                    echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../../Usuarios/Profesor/Principal_Prof.php">';
                }
                else
                    echo "<script>alert('No se pudo modificar la escuela donde labora');</script>";
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

    //Funcion de registro de una escuela
    function VerEsc($nom,$tipo,$num,$link)
    {
        $sql="select ID_Tipo_Esc from tipo_esc where TipoEscuela='".$tipo."';";
        $ver = $link->query($sql);
        while ($cont=$ver->fetch_assoc())
        {
            $tipo=$cont['ID_Tipo_Esc'];          
        }

        //Investigar si la escuela ya esta registrada
        $sql = "SELECT * FROM escuela WHERE Nombre='".$nom."' and Tipo=".$tipo." and Num_Esc=".$num.";";
        $ver = $link->query($sql);
        $result = $ver->num_rows;
        if ($result==0)//Se da de alta la escuela ingresada por el profesor
        {
            $sql = "Insert into escuela (Nombre,Tipo,Num_Esc) values('".$nom."',".$tipo.",".$num.");";
            $ver = $link->query($sql);
        }
        
        //Se procede a obtener el ID de la escuela para poderlo relacionar con el profesor
        $sql = "SELECT ID_Escuela FROM escuela WHERE Nombre='".$nom."' and Tipo=".$tipo." and Num_Esc=".$num.";";
        if($ver = $link->query($sql))
        {
            while ($cont=$ver->fetch_assoc())
            {
                return $cont['ID_Escuela'];//Retornar el id de la escuela registrada                
            }
        }
    }

    //Funcion de busqueda de tipo de archivo subido
    function TipArchi($link)
    {
        //Investigar si hay algun registro guardado sobre el tipo de apoyo imagen
        $sql = "SELECT * FROM tipo_apoyo WHERE Nombre='Imagen';";
        $ver = $link->query($sql);
        $result = $ver->num_rows;
        if($result==0)//En caso de que no, lo agregamos a la base de datos
        {
            $sql = "Insert into tipo_apoyo (Nombre) values ('Imagen');";
            $ver = $link->query($sql);
        }

        //(Creo yo que para este punto ya existe) Buscamos el ID del tipo imagen
        $sql="SELECT ID_Tipo FROM tipo_apoyo WHERE Nombre='Imagen';";
        if($ver=$link->query($sql))
        {
            while ($cont=$ver->fetch_assoc())
            {
                return $cont['ID_Tipo'];//Retornar el id del tipo de apoyo imagen para guardarlo junto con los datos
            }
        }
    }
    
    //Funcion de busqueda de imagen de perfil guardada
    function SvImg($nombre,$TipoRecurso,$ruta,$link)
    {
        //Investigar si ya hay alguna imagen guardada con el mismo nombre en la BD
        $sql="SELECT * FROM apoyo WHERE Nombre = '".$nombre."' and Tipo_Apoyo_ID =".$TipoRecurso.";";
        $ver = $link->query($sql);
        $result =$ver->num_rows;
        if($result==0)//En caso de que aun no haya registro de la imagen en la BD se almacena la imagen, con el tipo de recurso imagen
        {
            $sql = "Insert into apoyo (Nombre,Ruta,Tipo_Apoyo_ID) values ('".$nombre."','".$ruta."',".$TipoRecurso.");";
            $ver = $link->query($sql);
        }
        else
        {
            while ($cont=$ver->fetch_assoc())
            {
                $OldRuta=$cont['Ruta'];//Retornar el id del tipo de apoyo imagen para guardarlo junto con los datos
            }
            unlink($OldRuta);//Es necesario borrar el archivo guardado en el servidor para no generar problemas
            $sql="update apoyo SET Ruta='".$ruta."' where Nombre='".$nombre."';";
            $ver = $link->query($sql);
        }
        
        //(Creo yo que para este punto ya existe) Buscamos la imagen subida
        $sql="SELECT ID_Apoyo FROM apoyo WHERE Nombre = '".$nombre."' and Tipo_Apoyo_ID =".$TipoRecurso.";";
        $ver = $link->query($sql);
        $result =$ver->num_rows;
        if($result>0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
?>