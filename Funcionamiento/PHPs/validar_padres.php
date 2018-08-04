<?php
//INICIAMOS LA SESION
    session_start();

//MANDAMOS A LLAMAR EL ARCHIVO DE LA CONEXION
    require 'conexion.php';

//DECLARAMOS LAS VARIABLES DEL FORM Y LAS VARIABLES DE ERROR COMO VACIAS
    $nombre = $ap_pat = $ap_mat = $tel = $correo = $user = $pass = $cpass = $Img = $clave = "";
    $nom_err = $app_err = $apm_err = $tel_err = $cor_err = $us_err = $pass_err = $cpa_err = $Img_err = $key_err = "";
    $nom_right = $pat_right = $mat_right = $tel_right = $cor_right = $us_right = $pas_right = $cpa_right = $Img_right = $key_right = "";

//COMENZAMOS VALIDACION DE FORMULARIO
    if(isset($_POST['enviar']))
    {

//VALIDACION DEL NOMBRE
        $nombre = validar($_POST['nombre']);
        if(empty($nombre))
        {
            $nom_err = "* El campo nombre está vacío\n";
        }
        elseif(!preg_match("/^[a-z-A-ZñÑáéíóúÁÉÍÓÚ\s]*$/", $nombre))
        {
            $nom_err = "* Solo se permiten letras y espacios";
        }
        elseif(strlen($nombre) > 30)
        {
            $nom_err = "* El nombre es muy largo";
        }
        else
        {
            $nom_right = " ¡Correcto!";
        }

//VALIDACION DEL APELLIDO PATERNO
        $ap_pat = validar($_POST['ap_pat']);
        if(empty($ap_pat))
        {
            $app_err = "* El campo apellido paterno está vacío\n";
        }
        elseif(!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*$/", $ap_pat))
        {
            $app_err = "* Solo se permiten letras y números";
        }
        elseif(strlen($ap_pat) > 15)
        {
            $app_err = "* El apellido paterno es muy largo";
        }
        else
        {
            $pat_right = "¡Correcto!";
        }

//VALIDACION DEL APELLIDO MATERNO
        $ap_mat = validar($_POST['ap_mat']);
        if(empty($ap_mat))
        {
            $apm_err = "* El campo apellido materno está vacío";
        }
        elseif(!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*$/", $ap_mat))
        {
            $apm_err = "* Solo se permiten letras y números";
        }
        elseif(strlen($ap_mat) > 15)
        {
            $apm_err = "* El apellido materno es muy largo";
        }
        else
        {
            $mat_right = "¡Correcto!";
        }

//VALIDACION DEL NUMERO DE TELEFONO
        $tel = validar($_POST['tel']);
        if(empty($tel))
        {
            $tel_err = "* El campo teléfono está vacío";
        }
        elseif(!is_numeric($tel))
        {
            $tel_err = "* El campo solo permite valores numericos";
        }
        elseif(!preg_match("/^\d{8,10}$/", $tel)) 
        {
            $tel_err = "* El teléfono debe estar conformado por números (maximo 10 digitos).";
        }
        else
        {
            $tel_right = "¡Correcto!";
        }

//VALIDACION DEL CORREO
        $correo = validar($_POST['correo']);
        if(empty($correo))
        {
            $cor_err = "* El campo correo está vacío";
        }
        elseif(!filter_var($correo, FILTER_VALIDATE_EMAIL))
        {
            $cor_err = "* El formato de correo es inválido.";
        }
        else
        {
            $cor_right = "¡Correcto!";
        }

//VALIDACION DEL NOMBRE DE USUARIO
        $user = validar($_POST['user']);
        if(empty($user))
        {
            $us_err = "* El campo usuario está vacío";
        }
        elseif(!preg_match("/^[a-z-A-Z-0-9]*$/", $user))
        {
            $us_err = "* El usuario debe constar de números y letras.";
        }
        elseif(strlen($user) > 10)
            {
                $us_err = "* El usuario es muy largo";
            }
        else
        {
            $us_right = "¡Correcto!";
        }

//VALIDACION DE LA CONTRASEÑA
        $pass = validar($_POST['pass']);
        if(empty($pass))
        {
            $pass_err = "* El campo contraseña está vacío";
        }
        else if(strlen($pass) < 8)
        {
            $pass_err = "* La contraseña es muy corta";
        }
        else if(!preg_match('/(?=\d)/', $pass))
        {
            $pass_err = "* Debe contener al menos un dígito";
        }
        else if(!preg_match('/(?=[a-z])/', $pass))
        {
            $pass_err = "* Debe contener al menos una minúscula";
        }
        else if(!preg_match('/(?=[A-Z])/', $pass))
        {
            $pass_err = "*Debe contener al menos una mayúscula";
        }
        else
        {
            $pas_right = "¡Correcto!";
            $cifrado = password_hash($pass, PASSWORD_DEFAULT);
        }

//CONFIRMAMOS SI LAS CONTRASEÑAS SON IGUALES
        $cpass = validar($_POST['cpass']);
        if(empty($cpass))
        {
            $cpa_err = "* Favor de introducir otra vez su contraseña";
        }
        elseif($cpass!=$pass)
        {
            $cpa_err = "* Las contraseñas no coinciden";
        }
        else
        {
            $cpa_right = "¡Correcto!";
        }

//VALIDAMOS LA FECHA DE NACIMIENTO
        $clave = $_POST['clave'];
        $fecha = explode('/', $clave);        
        if(empty($clave))
        {
            $key_err = "* No has ingresado tu fecha de nacimiento";
        }
        elseif(count($fecha) == 3 && checkdate($fecha[1], $fecha[0], $fecha[2]))
        {
            $fecha2 = $fecha[2]."-".$fecha[1]."-".$fecha[0];
            $key_right =" ¡Correcto!";
        }
        else
        {
            $key_err = "* La fecha no cumple con el formato";
        }

//CODIGO PARA LA IMAGEN DE PERFIL
    if (!empty($_FILES['imagen']['name']))
    {
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
                move_uploaded_file($_FILES['imagen']['tmp_name'], $dir_ruta);
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
    }
    else
    {
        $nom_img_bus='Sin_Img';
        $dir_ruta=$_SERVER['DOCUMENT_ROOT'].'/Educatorium/imagenes/Sin_Img.png';
    }

//SI TODO ESTA CORRECTO PROCEDEMOS A REGISTRAR AL USUARIO
        if(!empty($nom_right) && !empty($pat_right) && !empty($mat_right) && !empty($tel_right) && !empty($cor_right) && !empty($us_right) && !empty($pas_right) && !empty($cpa_right) && !empty($key_right))
        {
            $sql = "SELECT * FROM padre WHERE Username = '$user';";
            $ver = $conexion->query($sql);
            $result = $ver->num_rows;
            if($result == 0)
            {
                $ID_Tip_Img= TipArchi($conexion);//Especificar que tipo de archivo se va a subir                
                $ID_Img=SvImg($nom_img_bus,$ID_Tip_Img,$dir_ruta,$conexion);//Obtener el ID de la imagen del usuario
                //Guardar los datos del padre
                $ins = "INSERT INTO padre (Nombre, Ape_Pat, Ape_Mat, Correo, Tel, Username, Password, Keyword, Apoyo_ID) VALUES ('"
                        .$nombre."','".$ap_pat."','".$ap_mat."','".$correo."',".$tel.",'".$user."','".$cifrado."','".$fecha2."',".$ID_Img.");";
                $insertar = $conexion->query($ins);
                $_SESSION['Username']=$user;
                echo "<script>alert('Felicitaciones, todos tus datos son correctos, seras redirigido en 1 segundo');</script>";
                echo '<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=../Usuarios/Padre/Principal_Pad.php">';
            }
            else
            {
                echo "<script>alert('el usuario ya existe')</script>";
            }
        }        
    }

//FUNCION PARA ELIMINAR TABULADOR, ESPACIOS MULTIPLES, SLASHES Y CARACTERES ESPECIALES
    function validar($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

//Funcion de busqueda de tipo de archivo subido
    function TipArchi($link)
    {
        //Investigar si hay algun registro guardado sobre el tipo de apoyo imagen
        $sql = "SELECT * FROM tipo_apoyo WHERE Nombre='Imagen';";
        $ver = $link->query($sql);
        $result = $ver->num_rows;
        
        if($result == 0)//En caso de que no, lo agregamos a la base de datos
        {
            $sql = "Insert into tipo_apoyo (Nombre) values ('Imagen');";
            $ver = $link->query($sql);
        }
        //(Creo yo que para este punto ya existe) Buscamos el ID del tipo imagen
        $sql = "SELECT ID_Tipo FROM tipo_apoyo WHERE Nombre='Imagen';";
        
        if($ver = $link->query($sql))
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
        $sql = "SELECT * FROM apoyo WHERE Nombre = '".$nombre."' and Tipo_Apoyo_ID =".$TipoRecurso.";";
        $ver = $link->query($sql);
        $result =$ver->num_rows;
        
        if($result == 0)
        {
            //Se almacena la imagen, con el tipo de recurso imagen
            $sql = "Insert into apoyo (Nombre,Ruta,Tipo_Apoyo_ID) values ('".$nombre."','".$ruta."',".$TipoRecurso.");";
            $ver = $link->query($sql);
        }
        
        //(Creo yo que para este punto ya existe) Buscamos la imagen subida
        $sql = "SELECT ID_Apoyo FROM apoyo WHERE Nombre = '".$nombre."' and Tipo_Apoyo_ID =".$TipoRecurso.";";
        if($ver = $link->query($sql))      
        {
            while ($cont=$ver->fetch_row())
            {
                return $cont[0];//Retornar el id del tipo de apoyo imagen para guardarlo junto con los datos
            }
        }       
    }
?>