<?php
//INICIAMOS LA SESION
    session_start();

//MANDAMOS A LLAMAR EL ARCHIVO DE LA CONEXION
    require $_SERVER['DOCUMENT_ROOT'].'/Educatorium/Funcionamiento/PHPs/Conn_Ses/conexion.php';

//DECLARAMOS LAS VARIABLES DEL FORM Y LAS VARIABLES DE ERROR COMO VACIAS
    $nombre=$ap_pat=$ap_mat=$tel=$correo=$Esc_Reg=$reg_esc=$Resp=$tipo=$num=$esc=$user=$pass=$cpass=$Img=$clave=$ID_Tip_Rec=$ID_Tip_Key="";
    $nom_err=$app_err=$apm_err=$tel_err=$cor_err=$tip_err=$num_err=$esc_err=$us_err=$pass_err=$cpa_err=$Img_err=$key_err="";
    $nom_right=$pat_right=$mat_right=$tel_right=$cor_right=$tip_right=$num_right=$esc_right=$us_right=$pas_right=$cpa_right=$Img_right=$key_right="";

    //COMENZAMONS VALIDACION DE FORMULARIO
    if(isset($_POST['enviar']))
    {
//VALIDACION DEL NOMBRE
        $nombre=validar($_POST['nombre']);
        if(empty($nombre))
            $nom_err="* El campo nombre está vacío\n";
        elseif(!preg_match("/^[a-z-A-ZñÑáéíóúÁÉÍÓÚ\s]*$/", $nombre))
            $nom_err="* Solo se permiten letras y espacios";
        elseif(strlen($nombre) > 30)
            $nom_err="* El nombre es muy largo";
        else
            $nom_right=" ¡Correcto!";

//VALIDACION DEL APELLIDO PATERNO
        $ap_pat=validar($_POST['ap_pat']);
        if(empty($ap_pat))
            $app_err="* El campo apellido paterno está vacío\n";
        elseif(!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*$/", $ap_pat))
            $app_err="* Solo se permiten letras y números";
        elseif(strlen($ap_pat) > 15)
            $app_err="* El apellido paterno es muy largo";
        else
            $pat_right="¡Correcto!";

//VALIDACION DEL APELLIDO MATERNO
        $ap_mat=validar($_POST['ap_mat']);
        if(empty($ap_mat))
            $apm_err="* El campo apellido materno está vacío";
        elseif(!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*$/", $ap_mat))
            $apm_err="* Solo se permiten letras y números";
        elseif(strlen($ap_mat) > 15)
            $apm_err="* El apellido materno es muy largo";
        else
            $mat_right="¡Correcto!";

//VALIDACION DEL NUMERO DE TELEFONO
        $tel=validar($_POST['tel']);
        if(empty($tel))
            $tel_err="* El campo teléfono está vacío";
        elseif(!is_numeric($tel))
            $tel_err="* El campo solo permite valores numericos";
        elseif(!preg_match("/^\d{8,10}$/", $tel)) 
            $tel_err="* El teléfono debe estar conformado por números (maximo 10 digitos).";
        else
            $tel_right="¡Correcto!";

//VALIDACION DEL CORREO
        $correo=validar($_POST['correo']);
        if(empty($correo))
            $cor_err="* El campo correo está vacío";
        elseif(!filter_var($correo, FILTER_VALIDATE_EMAIL))
            $cor_err="* El formato de correo es inválido.";
        else
            $cor_right="¡Correcto!";
        
//Buscar si la escuela ya esta registrada
        $Esc_Reg=validar($_POST['escuelas']);
        $Resp=validar($_POST['Resp']);
        if($Esc_Reg=="N/A")
        {
            if($Resp=="No")
            {
                //Validacion de tipo de escuela
                $tipo=validar($_POST['tipo']);
                if(empty($tipo))
                    $tip_err="* Seleccione una opción";
                else
                    $tip_right="Correcto";

                //VALIDACION DEL NUMERO DE SECUNDARIA
                $num=validar($_POST['num']);
                if(empty($num))
                    $num_err="* El campo del numero de escuela está vacío";
                elseif(!preg_match("/^d{1,3}$/", $num))
                   $num_err="* El número de escuela debe estar conformado por 3 números máximo.";
                else
                    $num_right="* ¡Correcto!";

                //VALIDACION DEL NOMBRE DE LA ESCUELA
                $esc=validar($_POST['esc']);
                if(empty($esc))
                    $esc_err="* El campo nombre de escuela está vacío";
                elseif(!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*$/", $esc))
                    $esc_err="* Solo se permiten letras y espacios en blanco.";
                elseif(strlen($esc) > 30)
                    $esc_err="* El nombre es muy largo";
                else
                    $esc_right="* ¡Correcto!";
            }
            else
                $esc_err="* Secundaria no seleccionada";//Imprimir error de secundaria no seleccionada
        }
        else
        {
            if($Resp=="Si")
            {
                $reg_esc=$Esc_Reg;
                $esc_right="* Has seleccionado una secundaria ya registrada";
            }
            else
                $esc_err="* Es necesario marcar la opcion 'Si' para continuar";//Favor de seleccionar la opcion Si para continuar
        }

//VALIDACION DEL NOMBRE DE USUARIO
        $user=validar($_POST['user']);
        if(empty($user))
            $us_err="* El campo usuario está vacío";
        elseif(!preg_match("/^[a-z-A-Z-0-9]*$/", $user))
            $us_err="* El usuario debe constar de números y letras.";
        elseif(strlen($user) > 10)
            $us_err="* El usuario es muy largo";
        else
            $us_right="¡Correcto!";

//VALIDACION DE LA CONTRASEÑA
        $pass=validar($_POST['pass']);
        if(empty($pass))
            $pass_err="* El campo contraseña está vacío";
        else if(strlen($pass) < 8)
            $pass_err="* La contraseña es muy corta";
        else if(!preg_match('/(?=\d)/', $pass))
            $pass_err="* Debe contener al menos un dígito";
        else if(!preg_match('/(?=[a-z])/', $pass))
            $pass_err="* Debe contener al menos una minúscula";
        else if(!preg_match('/(?=[A-Z])/', $pass))
            $pass_err="*Debe contener al menos una mayúscula";
        else
        {
            $pas_right="¡Correcto!";
            $cifrado=password_hash($pass, PASSWORD_DEFAULT);
        }

//CONFIRMAMOS SI LAS CONTRASEÑAS SON IGUALES
        $cpass=validar($_POST['cpass']);
        if(empty($cpass))
            $cpa_err="* Favor de introducir otra vez su contraseña";
        elseif($cpass!=$pass)
            $cpa_err="* Las contraseñas no coinciden";
        else
            $cpa_right="¡Correcto!";

//Validamos la palabra de recuperacion, primero el tipo y luego la palabra como tal
        $Tip_Keyword=validar($_POST['Tipo_Keyword']);
        $Keyword=validar($_POST['clave']);
        if(empty($Tip_Keyword))
            $key_err="* Por favor selecciona una alternativa de palabra de recuperacion";
        else
        {
            if(empty($Keyword))
                $key_err="* Por favor introduce una palabra de recuperacion";
            elseif(!preg_match('/(?=[A-Z])/', $Keyword))
                $key_err="* Por favor introduce al menos una letra mayúscula en tu palabra de recuperacion";
            else
            {
                switch ($Tip_Keyword) 
                {
                    case 1:
                        $sql="Select ID_Tip_Key from Tipo_Pal_Rec where Tipo_Keyword='Cual es el nombre de tu mascota';";
                        $consulta=$conexion->query($sql);
                        if($consulta->num_rows>0)    
                        {
                            while($res=$consulta->fetch_assoc())
                            {
                                $ID_Tip_Rec=$res['ID_Tip_Key'];
                            }
                        }
                        else
                        {
                            $sql="Insert into Tipo_Pal_Rec (Tipo_Keyword) values('Cual es el nombre de tu mascota');";
                            $consulta=$conexion->query($sql);
                            $ID_Tip_Rec=$conexion->insert_id;
                        }
                        break;
                    
                    case 2:
                        $sql="Select ID_Tip_Key from Tipo_Pal_Rec where Tipo_Keyword='Cual es tu comida favorita';";
                        $consulta=$conexion->query($sql);
                        if($consulta->num_rows>0)    
                        {
                            while($res=$consulta->fetch_assoc())
                            {
                                $ID_Tip_Rec=$res['ID_Tip_Key'];
                            }
                        }
                        else
                        {
                            $sql="Insert into Tipo_Pal_Rec (Tipo_Keyword) values('Cual es tu comida favorita');";
                            $consulta=$conexion->query($sql);
                            $ID_Tip_Rec=$conexion->insert_id;
                        }
                        break;

                    case 3:
                        $sql="Select ID_Tip_Key from Tipo_Pal_Rec where Tipo_Keyword='Cual es el estado o pais al que te gustaria ir';";
                        $consulta=$conexion->query($sql);
                        if($consulta->num_rows>0)    
                        {
                            while($res=$consulta->fetch_assoc())
                            {
                                $ID_Tip_Rec=$res['ID_Tip_Key'];
                            }
                        }
                        else
                        {
                            $sql="Insert into Tipo_Pal_Rec (Tipo_Keyword) values('Cual es el estado o pais al que te gustaria ir');";
                            $consulta=$conexion->query($sql);
                            $ID_Tip_Rec=$conexion->insert_id;
                        }
                        break;
                }
                $key_right="* Contraseña adecuada";
            }
        }

//CODIGO PARA LA IMAGEN DE PERFIL
        if (!empty($_FILES['imagen']['name']))
        {
            $nombre_imagen=$_FILES['imagen']['name'];
            $tipo_imagen=$_FILES['imagen']['type'];
            $tam_imagen=$_FILES['imagen']['size'];

            if($tipo_imagen="image/jpeg" || $tipo_imagen="image/jpg" || $tipo_imagen="image/png" || $tipo_imagen="image/gif")
            {
                if($tam_imagen <= 5000000)
                {
                    //Cambiar el nombre de la imagen para saber de quien es
                    $nom_img_ser=explode('.', $nombre_imagen);
                    $nombre_imagen='Img_'.$user.'.'.$nom_img_ser[1];
                    $nom_img_bus='Img_'.$user;
                    //Solo si todas las validaciones anteriores son positivas, se almacena la imagen en el servidor                    
                    $destino=$_SERVER['DOCUMENT_ROOT'].'/Educatorium/imagenes/';
                    $dir_ruta=$destino.$nombre_imagen;
                    if(move_uploaded_file($_FILES['imagen']['tmp_name'], $dir_ruta))
                        echo "<script>alert('Se subio correctamente la imagen');</script>";
                }
                else
                    $Img_err="La imagen es muy grande";
            }
            else
                $Img_err="Solo se pueden subir imágenes";
        }
        else
        {
            $nom_img_bus='Sin_Img';
            $dir_ruta=$_SERVER['DOCUMENT_ROOT'].'/Educatorium/imagenes/Sin_Img.png';
        }
        
//SI TODO ESTA CORRECTO PROCEDEMOS A REGISTRAR AL USUARIO
        if(!empty($nom_right) && !empty($pat_right) && !empty($mat_right) && !empty($tel_right) && !empty($cor_right) && !empty($esc_right) && !empty($us_right) && !empty($pas_right) && !empty($cpa_right) && !empty($key_right))
        {
            $sql="select * from Profesor where Username='".$user."';";
            $consulta=$conexion->query($sql);
            $result=$consulta->num_rows;
            if($result == 0)
            {
                if(empty($reg_esc))//Registrar una escuela si el usuario no selecciono una de la lista mostrada
                    $reg_esc=VerEsc($esc, $tipo, $num, $conexion);
                
                $ID_Tip_Img= TipArchi($conexion);//Especificar que tipo de archivo se va a subir
                $ID_Img=SvImg($nom_img_bus,$ID_Tip_Img,$dir_ruta,$conexion);//Obtener el ID de la imagen del usuario
            //Guardar los datos del profesor
                $ins1="insert into Profesor (Nombre, Ape_Pat, Ape_Mat, Correo, Tel, Username, Password, Keyword, Tip_Key_ID, Apoyo_ID) values ('";
                $ins2=$nombre."','".$ap_pat."','".$ap_mat."','".$correo."',".$tel.",'".$user."','".$cifrado."','".$Keyword."',".$ID_Tip_Rec.",".$ID_Img.");";
                $ins=$ins1.$ins2;
                $consulta=$conexion->query($ins);
            //Guardar los datos de la relacion escuela_profesor
                $ID_profe=$conexion->insert_id;//Ultimo id autogenerado de una consulta
                //Insertar datos en la tabla profesor_escuela
                $sql="Insert into Profe_Escu (Profesor_ID,Escuela_ID) values (".$ID_profe.",".$reg_esc.");";
                $consulta=$conexion->query($sql);
                $_SESSION['Username']=$user;
                //$id_img=$conexion->insert_id;
                echo "<script>alert('Felicitaciones, todos sus datos son correctos, sera redirigido en 1 segundo');</script>";
                echo '<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=../Usuarios/Profesor/Principal_Prof.php">';
            }
            else
                echo "<script>alert('el usuario ya existe')</script>";
        }        
    }
    
//FUNCION PARA ELIMINAR TABULADOR, ESPACIOS MULTIPLES, SLASHES Y CARACTERES ESPECIALES
    function validar($data)
    {
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
    
//Funcion de registro de una escuela
    function VerEsc($nom,$tipo,$num,$link)
    {
        $sql="select ID_Tipo_Esc from Tipo_Esc where TipoEscuela='".$tipo."';";
        $ver=$link->query($sql);
        while ($cont=$ver->fetch_assoc())
        {
            $tipo=$cont['ID_Tipo_Esc'];          
        }

        //Investigar si la escuela ya esta registrada
        $sql="select * from Escuela where Nombre='".$nom."' and Tipo=".$tipo." and Num_Esc=".$num.";";
        $ver=$link->query($sql);
        $result=$ver->num_rows;
        
        if ($result==0)//Se da de alta la escuela ingresada por el profesor
        {
            $sql="Insert into Escuela (Nombre,Tipo,Num_Esc) values('".$nom."',".$tipo.",".$num.");";
            $ver=$link->query($sql);
        }
        //Se procede a obtener el ID de la escuela para poderlo relacionar con el profesor
        $sql="select ID_Escuela from Escuela where Nombre='".$nom."' and Tipo=".$tipo." and Num_Esc=".$num.";";
        
        if($ver=$link->query($sql))
        {
            while ($cont=$ver->fetch_row())
            {
                return $cont[0];//Retornar el id de la escuela registrada                
            }
        }
    }

//Funcion de busqueda de tipo de archivo subido
    function TipArchi($link)
    {
        //Investigar si hay algun registro guardado sobre el tipo de apoyo imagen
        $sql="select * from Tipo_Apoyo WHERE Nombre='Imagen';";
        $ver=$link->query($sql);
        $result=$ver->num_rows;
        
        if($result == 0)//En caso de que no, lo agregamos a la base de datos
        {
            $sql="Insert into Tipo_Apoyo (Nombre) values ('Imagen');";
            $ver=$link->query($sql);
        }
        //(Creo yo que para este punto ya existe) Buscamos el ID del tipo imagen
        $sql="select ID_Tipo from Tipo_Apoyo WHERE Nombre='Imagen';";
        
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
        
        if($result == 0)
        {
            //Se almacena la imagen, con el tipo de recurso imagen
            $sql="Insert into Apoyo (Nombre,Ruta,Tipo_Apoyo_ID) values ('".$nombre."','".$ruta."',".$TipoRecurso.");";
            $ver=$link->query($sql);
        }
        
        //(Creo yo que para este punto ya existe) Buscamos la imagen subida
        $sql="select ID_Apoyo from Apoyo where Nombre='".$nombre."' and Tipo_Apoyo_ID =".$TipoRecurso.";";
        
        if($ver=$link->query($sql))
        {
            while ($cont=$ver->fetch_row())
            {
                return $cont[0];//Retornar el id del tipo de apoyo imagen para guardarlo junto con los datos
            }
        }        
    }
?>