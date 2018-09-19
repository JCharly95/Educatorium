<?php
    if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
    {
        header("location: ../../Acceso/FAcces.php");
    }
    $user = $_SESSION['Username'];

    //Variables que almacenaran los datos recibidos por el formulario
    $NTel = $NEmail = $NUser = $NPass = $NKeyW = $CNPass = $NImgNam = $NImgTip = $NImgTam = $EscReg = $SelEsc = $NTip = $NEsc = "";
    $Nnum = 0;
    //Variables de avisos
    $TelAd = $EmailAd = $UserAd = $PassAd = $KeyAd = $CPassAd = $ImgAd = $EscAd = $TipAd = $NEscAd = $NumAd = "";
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
        $NTel = validar($_POST['tel']);
        if(empty($NTel))
        {
            $TelAd=$AdWar."El telefono no fue actualizado".$AdClo;
        }
        else
        {
            if($NTel==$NumTele)//Verificacion de telefono duplicado
            {
                $TelAd=$AdDan."Favor de introducir un numero de telefono diferente".$AdClo;
            }
            else
            {
                if(!preg_match("/^\d{8,10}$/", $NTel))//Verificar que el numero telefonico contiene entre 8 y 10 digitos
                {
                    $TelAd=$AdDan."El numero de telefono debe constar de entre 8 y 10 digitos.".$AdClo;
                }
                else //Si no hubo problema con las validaciones anteriores, se procede con la actualizacion de numero en la BD
                {
                    $sql="Update profesor SET Tel='".$NTel."' where Username='".$user."';";
                    if($conexion->query($sql)==true)
                    {
                        echo "<script>alert('El numero telefonico ha sido actualizado');</script>";
                    }
                    else
                    {
                        echo "<script>alert('No se pudo modificar el numero telefonico');</script>";
                    }
                }
            }
        }

        $NEmail = validar($_POST['correo']);
        if(empty($NEmail))
        {
            $EmailAd=$AdWar."El correo no fue actualizado".$AdClo;
        }
        else
        {
            if(strcmp($NEmail,$DirCorr)==0)//Verificacion de direccion de correo duplicado
            {
                $EmailAd=$AdDan."Favor de introducir una direccion de correo diferente".$AdClo;
            }
            else
            {
                /* Verificar que la direccion de correo electronico cumpla con la sintaxis de RFC 822 que 
                tiene la forma usuario@anfitrión.dominiopara */
                if(!filter_var($NEmail, FILTER_VALIDATE_EMAIL))
                {
                    $EmailAd=$AdDan."El formato de correo es inválido".$AdClo;
                }
                else//Si no hubo problema con las validaciones anteriores, se procede con la actualizacion del correo en la BD
                {
                    $sql="Update profesor SET Correo='".$NEmail."' where Username='".$user."';";
                    if($conexion->query($sql)==true)
                    {
                        echo "<script>alert('El correo fue actualizado');</script>";
                    }
                    else
                    {
                        echo "<script>alert('No se pudo modificar el correo');</script>";
                    }
                }
            }
        }
                
       $NUser = validar($_POST['usuario']);
        if(empty($NUser))
        {
            $UserAd=$AdWar."El nombre de usuario no fue actualizado".$AdClo;
        }
        else 
        {
            if(strcmp($NUser,$user)==0)//Verificacion de username duplicado
            {
                $UserAd=$AdDan."Favor de introducir un nombre de usuario diferente".$AdClo;
            }
            else
            {
                //Verificar que el nombre de usuario no contenga caracteres especiales, espacios o caracteres no imprimibles
                if(!preg_match("/^[a-z-A-Z-0-9]*$/", $NUser))
                {
                    $UserAd=$AdDan."El nombre de usuario debe constar de números y letras.".$AdClo;
                }
                else
                {
                    if(strlen($NUser)>10)//Verificar que el nombre de usuario no sea demasiado largo >10 caracteres
                    {
                        $UserAd=$AdDan."El nombre de usuario no puede tener mas de 10 caracteres".$AdClo;
                    }
                    else//Si no hubo problema con las validaciones anteriores, se procede con la actualizacion de username en la BD y se cierra la sesion
                    {
                        $sql="Update profesor SET Username='".$NUser."' where Username='".$user."';";
                        if($conexion->query($actualizar)==true)
                        {
                            echo "<script>alert('Nombre de usuario actualizado');</script>";
                            require 'Cer_Ses.php';
                        }
                        else
                        {
                            echo "<script>alert('No se pudo modificar el nombre de usuario');</script>";
                        }
                    }
                }
            }
        }

        $NPass = validar($_POST['pass']);
        $CNPass = validar($_POST['cpass']);
        if(empty($NPass))
        {
            $PassAd=$AdWar."La contraseña no fue actualizada".$AdClo;
        }
        else
        {
            if(strlen($pass)<8)//Verificar que la contraseña no contenga menos de 8 caracteres
            {
                $PassAd=$AdDan."La contraseña es muy corta".$AdClo;
            }
            else
            {
                //Verificar que la contraseña contenga un numero de al menos un digito
                if(!preg_match('/(?=\d)/', $pass))
                {
                    $PassAd=$AdDan."La contraseña debe contener al menos un numero".$AdClo;
                }
                else
                {
                    //Verificar que la contraseña contenga por lo menos una letra minuscula
                    if(!preg_match('/(?=[a-z])/', $pass))
                    {
                        $PassAd=$AdDan."La contraseña debe contener al menos una letra minúscula".$AdClo;
                    }
                    else
                    {
                        //Verificar que la contraseña contenga por lo menos una letra mayuscula
                        if(!preg_match('/(?=[A-Z])/', $pass))
                        {
                            $PassAd=$AdDan."La contraseña debe contener al menos una letra mayuscula".$AdClo;
                        }
                        else
                        {
                            /*Antes de registrar la nueva contraseña, se verifica que se modificará,
                            confirmandola en un segundo campo de texto*/
                            if(empty($CNPass))
                            {
                                $CPassAd=$AdDan."Favor de introducir otra vez su contraseña".$AdClo;
                            }
                            else
                            {
                                if($NPass!=$CNPass)
                                {
                                    $CPassAd=$AdDan."Las contraseñas no coinciden".$AdClo;
                                }
                                else
                                {
                                    $cifrado = password_hash($NPass, PASSWORD_DEFAULT);
                                    $sql="Update profesor SET Password='".$cifrado."' where Username='".$user."';";
                                    if($conexion->query($sql)==true)
                                    {
                                        echo "<script>alert('Contraseña actualizada');</script>";
                                    }
                                    else
                                    {
                                        echo "<script>alert('No se pudo modificar la contraseña');</script>";
                                    }
                                }
                            }
                        }
                    }
                }
            }
        } 
        
        $NKeyW = $_POST['keyword'];
        $KeyW = explode('/', $NKeyW);        
        if(empty($NKeyW))
        {
            $KeyAd=$AdWar."La palabra clave no fue actualizada".$AdClo;
        }
        else
        {
            /*Si se introdujo adecuadamente la fecha, con sus respectivos separadores se procede a verificar 
            si no esta registrada en el sistema aun*/
            if(count($KeyW)==3 && checkdate($KeyW[1], $KeyW[0], $KeyW[2]))
            {
                $Key = $KeyW[2]."-".$KeyW[1]."-".$KeyW[0];

                if(strcmp($KeyPal,$Key)==0)
                {
                    $KeyAd=$AdDan."Favor de introducir una palabra clave diferente".$AdClo;
                }
                else
                {
                    $sql="Update profesor SET Keyword='".$Key."' where Username='".$user."';";
                    if($conexion->query($sql)==true)
                    {
                        echo "<script>alert('Palabra clave actualizada (Fecha de nacimiento)');</script>";
                    }
                    else
                    {
                        echo "<script>alert('No se pudo modificar la fecha');</script>";
                    }
                }
            }
        }

        //$NImg = $EscReg = $SelEsc = $NTip = $NEsc = "";

        //$NImgNam = $NImgTip = $NImgTam =

        if(empty($_FILES['imagen']['name']))
        {
            $ImgAd=$AdWar."La imagen de perfil no fue actualizada".$AdClo;
        }
        else
        {
            $NImgNam=$_FILES['imagen']['name'];
            $NImgTip=$_FILES['imagen']['type'];
            $NImgTam=$_FILES['imagen']['size'];

            $nombre_imagen = $_FILES['imagen']['name'];
            $tipo_imagen = $_FILES['imagen']['type'];
            $tam_imagen = $_FILES['imagen']['size'];

            if($tipo_imagen="image/jpeg" || $tipo_imagen="image/jpg" || $tipo_imagen="image/png" || $tipo_imagen="image/gif")
            {
                if($tam_imagen <= 5000000)
                {
                    //Cambiar el nombre de la imagen para saber de quien es
                    $nom_img_ser=explode('.', $nombre_imagen);
                    $nombre_imagen='Img_'.$user.'.'.$nom_img_ser[1];
                    $nom_img_bus='Img_'.$user;
                    //Solo si todas las validaciones anteriores son positivas, se almacena la imagen en el servidor                    
                    $destino = $_SERVER['DOCUMENT_ROOT'].'/Educatorium/imagenes/';
                    $dir_ruta=$destino.$nombre_imagen;
                    if(move_uploaded_file($_FILES['imagen']['tmp_name'], $dir_ruta))
                    {
                        echo "<script>alert('Se subio correctamente la imagen');</script>";
                    }
                }
                else
                {
                    $Img_err="La imagen es muy grande";
                }
            }
            else
            {
                $Img_err="Solo se pueden subir imágenes";
            }
            /*else
            {
                $nom_img_bus='Sin_Img';
                $dir_ruta=$_SERVER['DOCUMENT_ROOT'].'/Educatorium/imagenes/Sin_Img.png';
            }*/
        }
    }
    
    function validar($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
