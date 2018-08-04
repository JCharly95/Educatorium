<?php
    if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
    {
        header("location: ../../Acceso/FAcces.php");
    }
    $user = $_SESSION['Username'];

    $nombre = $ap_pat = $ap_mat = $tel = $correo = $user2 = $pass = $cpass = $clave = $esc = $grado = "";
    $nom_err = $app_err = $apm_err = $tel_err = $cor_err = $us_err = $pass_err = $cpa_err = $key_err = $esc_err = $grado_err = "";
    $nom_right = $pat_right = $mat_right = $tel_right = $cor_right = $us_right = $pas_right = $cpa_right = $key_right = $esc_right = $grado_right = "";

     //Detectamos si se ha dado clic en el botón de actualizar datos
    if(isset($_POST['actualizar']))
    {
        //var_dump($nombre,$ap_pat,$ap_mat,$tel,$correo,$user2,$pass,$cpass,$clave,$esc,$grado);
        //Almacenamos el valor del campo de texto
        $nombre = validar($_POST['nombre']);
        //Si el campo de texto está vacío mandamos mensaje de error
        if(empty($nombre))
        {
            $nom_err = "* El nombre no puede estar vacío";
        }
        //Expresión regular para que el usuario solo introduzca letras y espacios en blanco en el nombre
        elseif(!preg_match("/^[a-z-A-ZñÑáéíóúÁÉÍÓÚ\s]*$/", $nombre))
        {
            $nom_err = "* Solo se permiten letras y espacios";
        }
        //Condicion que determina que el text no debe pasar los 30 caracteres
        elseif(strlen($nombre) > 30)
        {
            $nom_err = "* El nombre es muy largo";
        }
        else
        { 
            /*Comparamos lo que tiene el campo de texto con el valor recogido de la base de datos,
            si es diferente, procedemos a actualizar la información, en caso contrario no se actualiza nada*/
            if(strcmp($nombre,$NomProf) !== 0)
            {
                //Query para actualizar la información en la BDD
                $actualizar="Update profesor SET Nombre='".$nombre."' where Username='".$user."';";
                if(!$conexion->query($actualizar) === TRUE)
                {                    
                    echo "<script>alert('No se pudo modificar el nombre');</script>";
                }
                else
                {
                    echo "<script>alert('Entro el nombre');</script>";
                }
            }
        }

        

       //Almacenamos el valor del campo de texto
        $ap_pat = validar($_POST['ap_pat']);
//Si el campo de texto está vacío mandamos mensaje de error
        if(empty($ap_pat))
        {
            $app_err = "*El apellido no puede estar vacío";
        }
//Expresión regular para que el usuario solo introduzca letras y espacios en blanco en el nombre
        elseif(!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*$/", $ap_pat))
        {
            $app_err = "* Solo se permiten letras y números";
        }
        //Condicion que determina que el text no debe pasar los 30 caracteres
        elseif(strlen($ap_pat) > 15)
        {
            $app_err = "* El apellido paterno es muy largo";
        }
        else
        {
/*Comparamos lo que tiene el campo de texto con el valor recogido de la base de datos,
  si es diferente, procedemos a actualizar la información, en caso contrario no se actualiza nada*/
            if(strcmp($ap_pat,$Ape_Pat) !==0)
            {
                $actualizar="Update profesor SET Ape_Pat='".$ap_pat."' where Username='".$user."';";
                if(!$conexion->query($actualizar) === TRUE)
                {
                    echo "<script>alert('No se pudo modificar el apellido paterno');</script>";
                }
                else
                {
                    echo "<script>alert('Entro el Ap_Pat');</script>";
                }
            } 
        }

       $ap_mat = validar($_POST['ap_mat']);
        if(empty($ap_mat))
        {
            $apm_err = "* El apellido no puede estar vacío";
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
            if(strcmp($ap_mat,$Ape_Mat) !==0 )
            {
                $actualizar="Update profesor SET Ape_Mat='".$ap_mat."' where Username='".$user."';";
                if(!$conexion->query($actualizar) === TRUE)
                {
                    echo "<script>alert('No se pudo modificar el apellido materno');</script>";
                }
                else
                {
                    echo "<script>alert('Entro el Ap_Mat');</script>";
                }
            }
        }

       $tel = validar($_POST['tel']);
        if(empty($tel))
        {
            $tel_err = "* El teléfono no puede estar vacío";
        }
        elseif(!preg_match("/^\d{8,10}$/", $tel))
        {
            $tel_err = "* El teléfono debe estar conformado por 8 o 10 números.";
        }
        else
        {
            $actualizar="Update profesor SET Tel='".$NumTele."' where Username='".$user."';";
            if(!$conexion->query($actualizar) === TRUE)
            {
                echo "<script>alert('No se pudo modificar el teléfono');</script>";   
            }
            else
            {
                echo "<script>alert('Entro el telefono');</script>";
            }
        }

        $correo = validar($_POST['correo']);
        if(empty($correo))
        {
            $cor_err = "* El correo no puede estar vacío";
        }
        elseif(!filter_var($correo, FILTER_VALIDATE_EMAIL))
        {
            $cor_err = "* El formato de correo es inválido.";
        }
        else
        {
            if(strcmp($correo,$DirCorr) !==0 )
            {
                $actualizar="Update profesor SET Correo='".$correo."' where Username='".$user."';";
                if(!$conexion->query($actualizar) === TRUE)
                {
                    echo "<script>alert('No se pudo modificar el correo');</script>";
                }
                else
                {
                    echo "<script>alert('Entro el correo');</script>";
                }
            }
        }
        

       $user2 = validar($_POST['usuario']);
        if(empty($user2))
        {
            $us_err = "* El usuario no puede estar vacío";
        }
        elseif(!preg_match("/^[a-z-A-Z-0-9]*$/", $user2))
        {
            $us_err = "* El usuario debe constar de números y letras.";
        }
        elseif(strlen($user2) > 10)
            {
                $us_err = "* El usuario es muy largo";
            }
        else
        {
            if(strcmp($user2, $user) !== 0)
            {
                $actualizar="Update profesor SET Username='".$user2."' where Username='".$user."';";
                if(!$conexion->query($actualizar) === TRUE)
                {
                    echo "<script>alert('No se pudo modificar el usuario');</script>";
                }
                else
                {
                    echo "<script>alert('Entro el username');</script>";
                    require 'Cer_Ses.php';
                }
            }
        }

        $pass = validar($_POST['pass']);
        if(empty($pass))
        {
            $pass_err = "";
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
            $pas_right = TRUE;
            $cifrado = password_hash($pass, PASSWORD_DEFAULT);
            if($pas_right)
            {
                $actualizar="Update profesor SET Password='".$pass."' where Username='".$user."';";
                if(!$conexion->query($actualizar) === TRUE)
                {
                     echo "<script>alert('No se pudo modificar la contraseña');</script>";
                }
                else
                {
                    echo "<script>alert('Entro el password');</script>";
                }
            }  
        }

        $clave = $_POST['key'];
        $fecha2 = explode('/', $clave);        
        if(empty($clave))
        {
            $key_err = "* La fecha de nacimiento no puede ir vacía";
        }
        elseif(count($fecha2) == 3 && checkdate($fecha2[1], $fecha2[0], $fecha2[2]))
        {
            $fecha = $fecha2[2]."/".$fecha2[1]."/".$fecha2[0];

            $actualizar="Update profesor SET Keyword='".$fecha."' where Username='".$user."';";
            if(!$conexion->query($actualizar) === TRUE)
            {
                 echo "<script>alert('No se pudo modificar la fecha');</script>";
            }
            else
            {
                echo "<script>alert('Entro la fecha');</script>";
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
