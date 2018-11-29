<?php
    if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
        header("location: ../../Acceso/FAcces.php");

    $user=$_SESSION['Username'];

    //Variables que almacenaran los datos recibidos por el formulario
    $NTel=$NEmail=$NUser=$NPass=$NKeyT=$CNPass=$NKeyW="";
    $NImgNam=$NImgTip=$NImgTam="";
    //Variables de avisos
    $TelAd=$EmailAd=$UserAd=$PassAd=$CPassAd=$TipKeyAd=$KeyAd=$ImgAd=$SelEscAd=$TipEscAd=$NomEscAd=$NumEscAd="";
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
        $NTel=validar($_POST['tel']);//Comienzo de validacion del telefono
        if(empty($NTel))
            $TelAd=$AdWar."El telefono no fue actualizado".$AdClo;
        else
        {
            if($NTel==$tel)//Verificacion de telefono duplicado
                $TelAd=$AdDan."Favor de introducir un numero de telefono diferente".$AdClo;
            else
            {
                if(!preg_match("/^\d{8,10}$/", $NTel))//Verificar que el numero telefonico contiene entre 8 y 10 digitos
                    $TelAd=$AdDan."El numero de telefono debe constar de entre 8 y 10 digitos.".$AdClo;
                else //Si no hubo problema con las validaciones anteriores, se procede con la actualizacion de numero en la BD
                {
                    $sql="Update Padre SET Tel='".$NTel."' where Username='".$user."';";
                    if($conexion->query($sql)==true)
                        echo "<script>alert('El numero telefonico ha sido actualizado');</script>";
                    else
                        echo "<script>alert('No se pudo modificar el numero telefonico');</script>";
                }
            }
        }

        $NEmail=validar($_POST['correo']);//Comienzo de validacion del correo
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
                    $sql="Update Padre SET Correo='".$NEmail."' where Username='".$user."';";
                    if($conexion->query($sql)==true)
                        echo "<script>alert('El correo fue actualizado');</script>";
                    else
                        echo "<script>alert('No se pudo modificar el correo');</script>";
                }
            }
        }
                
       $NUser=validar($_POST['usuario']);//Comienzo de validacion del username
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
                        $sql="Update Padre SET Username='".$NUser."' where Username='".$user."';";
                        if($conexion->query($sql)==true)
                        {
                            echo "<script>alert('Nombre de usuario actualizado');</script>";
                            require 'Cer_Ses.php';
                        }
                        else
                            echo "<script>alert('No se pudo modificar el nombre de usuario');</script>";
                    }
                }
            }
        }

        $NPass=validar($_POST['pass']);
        $CNPass=validar($_POST['cpass']);
        if(empty($NPass))//Comienzo de la verificacion de la nueva contraseña
            $PassAd=$AdWar."La contraseña no fue actualizada".$AdClo;
        else
        {
            if(strlen($NPass)<8)//Verificar que la contraseña no contenga menos de 8 caracteres
                $PassAd=$AdDan."La contraseña es muy corta".$AdClo;
            else
            {
                //Verificar que la contraseña contenga un numero de al menos un digito
                if(!preg_match('/(?=\d)/', $NPass))
                    $PassAd=$AdDan."La contraseña debe contener al menos un numero".$AdClo;
                else
                {
                    //Verificar que la contraseña contenga por lo menos una letra minuscula
                    if(!preg_match('/(?=[a-z])/', $NPass))
                        $PassAd=$AdDan."La contraseña debe contener al menos una letra minúscula".$AdClo;
                    else
                    {
                        //Verificar que la contraseña contenga por lo menos una letra mayuscula
                        if(!preg_match('/(?=[A-Z])/', $NPass))
                            $PassAd=$AdDan."La contraseña debe contener al menos una letra mayuscula".$AdClo;
                        else
                        {
                            /*Antes de registrar la nueva contraseña, se verifica que se modificará,
                            confirmandola en un segundo campo de texto*/
                            if(empty($CNPass))
                                $CPassAd=$AdDan."Favor de introducir otra vez su contraseña".$AdClo;
                            else
                            {
                                if($NPass!=$CNPass)
                                    $CPassAd=$AdDan."Las contraseñas no coinciden".$AdClo;
                                else
                                {
                                    $cifrado=password_hash($NPass, PASSWORD_DEFAULT);
                                    $sql="Update Padre SET Password='".$cifrado."' where Username='".$user."';";
                                    if($conexion->query($sql)==true)
                                        echo "<script>alert('Contraseña actualizada');</script>";
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
        $NKeyW=validar($_POST['keyword']);
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
                            $sql="Update Padre SET Keyword='".$NKeyW."' where Username='".$user."';";
                            if($conexion->query($sql)==true)
                                echo "<script>alert('Palabra de recuperacion actualizada');</script>";
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
                    $destino=$_SERVER['DOCUMENT_ROOT'].'/Educatorium/imagenes/';
                    $dir_ruta=$destino.$nombre_imagen;
                    //Subida de imagen (Parte de la base de datos)
                    $ID_Tip_Img=TipArchi($conexion);//Especificar que tipo de archivo se va a subir en la BD
                    $Cond_Img=SvImg($nom_img_bus,$ID_Tip_Img,$dir_ruta,$conexion);//Obtener el ID de la informacion de la imagen en la BD
                    //Subida de la imagen (Parte del servidor)
                    if(is_uploaded_file($_FILES['imagen']['tmp_name']) && $Cond_Img)
                    {
                        move_uploaded_file($_FILES['imagen']['tmp_name'], $dir_ruta);
                        echo "<script>alert('Imagen de perfil actualizada');</script>";
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
    }
    
    function validar($data)
    {
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }

    //Funcion de busqueda de tipo de archivo subido
    function TipArchi($link)
    {
        //Investigar si hay algun registro guardado sobre el tipo de apoyo imagen
        $sql="select * from Tipo_Apoyo where Nombre='Imagen';";
        $ver=$link->query($sql);
        $result=$ver->num_rows;
        if($result==0)//En caso de que no, lo agregamos a la base de datos
        {
            $sql="Insert into Tipo_Apoyo (Nombre) values ('Imagen');";
            $ver=$link->query($sql);
        }

        //(Creo yo que para este punto ya existe) Buscamos el ID del tipo imagen
        $sql="select ID_Tipo from Tipo_Apoyo where Nombre='Imagen';";
        if($ver=$link->query($sql))
        {
            while ($cont=$ver->fetch_row())
            {
                return $cont[0];//Retornar el id del tipo de apoyo imagen para guardarlo junto con los datos
            }
        }
    }
    
    //Funcion de busqueda de imagen de perfil guardada
    function SvImg($nombre,$TipoRecurso,$ruta,$link)
    {
        //Investigar si ya hay alguna imagen guardada con el mismo nombre en la BD
        $sql="select * from Apoyo where Nombre='".$nombre."' and Tipo_Apoyo_ID =".$TipoRecurso.";";
        $ver=$link->query($sql);
        $result =$ver->num_rows;
        if($result==0)//En caso de que aun no haya registro de la imagen en la BD se almacena la imagen, con el tipo de recurso imagen
        {
            $sql="Insert into apoyo (Nombre,Ruta,Tipo_Apoyo_ID) values ('".$nombre."','".$ruta."',".$TipoRecurso.");";
            $ver=$link->query($sql);
        }
        
        //(Creo yo que para este punto ya existe) Buscamos la imagen subida
        $sql="select ID_Apoyo from Apoyo where Nombre='".$nombre."' and Tipo_Apoyo_ID =".$TipoRecurso.";";
        $ver=$link->query($sql);
        $result =$ver->num_rows;
        if($result>0)
            return true;
        else
            return false;
    }
?>