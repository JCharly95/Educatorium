<?php
    require $_SERVER['DOCUMENT_ROOT'].'/Educatorium/Funcionamiento/PHPs/Conn_Ses/conexion.php';
    require 'PHPMailer/PHPMailerAutoload.php';
    
    //Variables de busqueda de usuario
    $nom_user = $pal_clave = "";
    $User_Res;
    
    if(isset($_POST['usuario']))
    {
        $nom_user=$_POST['usuario'];
        if(isset($_POST['confirma']))
        {
            $pal_clave=$_POST['confirma'];
            //Seteo de formato para la fecha
            $fecha = explode('/', $pal_clave);    
            if(count($fecha) == 3 && checkdate($fecha[1], $fecha[0], $fecha[2]))
                $fecha2 = $fecha[2]."-".$fecha[1]."-".$fecha[0];
            else
                $key_err = "* La fecha no cumple con el formato";
            
            //Consulta de busqueda para el nombre de usuario junto con su palabra clave
            $consulta="SELECT correo FROM estudiante WHERE usuario = '$nom_user' and fecha= '$fecha2';";
            if($User_Res=$conexion->query($consulta))  
            {
                while($result=$User_Res->fetch_assoc()) /* obtener array asociativo con la fila de resultados*/
                {
                    $email_obt=$result["correo"];
                    $correo->isSMTP();
                    $correo->SMTPAuth=true;
                    $correo->SMTPSecure='tls';
                    $correo->Host='smtp.gmail.com';
                    $correo->Port='587';
                    $correo->Username='soporte.educatorium@gmail.com';
                    $correo->Password='Quesadilla123';

                    /*Configuracion para probar si el envio de correo simple funciona
                    $correo->setFrom('soporte.educatorium@gmail.com','Educatorium');
                    $correo->addAddress('isaaclez19@gmail.com','Isaac Lezama');
                    $correo->Subject='Prueba Correo';
                    $correo->Body='Hola compa, esto es una prueba de envio de correos';
                    $correo->Body=password();
                    $correo->send();
                    
                    echo "<script>alert('El super correo de prueba fue enviado')</script>";*/
                }
                echo "<script>alert('Tus datos han sido enviados');</script>";                
                echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../../Acceso/FAcces.php">';
                    /*function VerifiCorreo(".$email_obt.",".$nom_user.")
                    {
                        alert('Este es el correo al que seran enviados los datos de la cuenta: '+user+'\n'+emailUser);
                        var correo=confirm('¿Deseas proceder?');

                        if(correo)
                        {
                            alert('Tus datos han sido enviados, fue un gusto ayudarte');
                        }
                        else
                        {
                            alert('Bien, ahora regresaras a la pantalla de recuperacion');
                            function redireccionar()
                            {
                                window.locationf='Rec_Pass.php';
                            } 
                            setTimeout ('redireccionar()', 5000);   //tiempo expresado en milisegundos
                        }
                    }
                    </script>";*/
            }           
        }
        else
        {
            
        }
    }
    else
    {
        
    }

    function password($length = 8)
    {
        $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz013456789";
        $pass = "";
        for($i = 0; $i < $length; $i++)
        {
            $rand = rand() % strlen($cadena);
            $password .= substr($cadena, $rand,1);
        }
        return $pass;
        echo "su contraseña temporal es: ".$pass;
    }
    
    /*$correo=new PHPMailer();
    try
    {
        $correo->isSMTP();
        $correo->SMTPAuth=true;
        $correo->SMTPSecure='tls';
        $correo->Host='smtp.gmail.com';
        $correo->Port='587';
        $correo->Username='soporte.educatorium@gmail.com';
        $correo->Password='Quesadilla123';

        Configuracion para probar si el envio de correo simple funciona
        $correo->setFrom('soporte.educatorium@gmail.com','Educatorium');
        $correo->addAddress('juancarloscharly@live.com.mx','Juan Lopez');
        $correo->Subject='Prueba Correo';
        $correo->Body='Hola compa, esto es una prueba de envio de correos';
        
        $correo->send();
        
        echo "<script>alert('El super correo de prueba fue enviado')</script>";
    } 
    catch (Exception $e) 
    {
        echo "<script>alert('Esta wea no funco en el envio')</script>";
    }*/
?>