<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT'].'/Educatorium/Funcionamiento/PHPs/Conn_Ses/conexion.php';

    $usuario = $contraseña = "";
    $us_err = $pas_err = "";
    $us_right = $pas_right = "";
    $busUser=$busContra=false;
    $NumRes=0;

    if(isset($_POST['entrar']))//Hacer el proceso de validacion si se presiono el boton de acceder
    {
        $usuario = $_POST['Username'];
        $contraseña = $_POST['Pass'];
            
        //Si lo campos de username y contraseña no estan vacios, analizar los datos recibidos
        if(!empty($usuario) && !empty($contraseña))
        {
            //Buscar si el usuario a entrar es un estudiante
            $sele="select * from Estudiante where Username='".$usuario."';";
            $verificar = $conexion->query($sele);
            $NumRes=$verificar->num_rows;
            if($NumRes > 0)//Si el usuario existe, se comienza con la validacion de la contraseña
            {
                $busUser=true;
                while($resultados = $verificar->fetch_assoc())
                {
                    if(password_verify($contraseña, $resultados['Password']))
                    {
                        $busContra=true;
                        $_SESSION['Username'] = $usuario;
                        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../Usuarios/Estudiante/Principal_Est.php">';
                    }
                }
                if($busUser==true&&$busContra==false)
                    $pas_err = "* Contraseña incorrecta";
            }
            
            //Buscar si el usuario a entrar es un profesor
            $sele="select * from Profesor where Username='".$usuario."';";
            $verificar = $conexion->query($sele);
            $NumRes=$verificar->num_rows;
            if($NumRes > 0)//Si el usuario existe, se comienza con la validacion de la contraseña
            {
                $busUser=true;
                while($resultados = $verificar->fetch_assoc())
                {
                    if(password_verify($contraseña, $resultados['Password']))
                    {
                        $busContra=true;
                        $_SESSION['Username'] = $usuario;
                        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../Usuarios/Profesor/Principal_Prof.php">';
                    }
                }
                if($busUser==true&&$busContra==false)
                    $pas_err = "* Contraseña incorrecta";
            }
            
            //Buscar si el usuario a entrar es un padre
            $sele="select * from Padre where Username='".$usuario."';";
            $verificar = $conexion->query($sele);
            $NumRes=$verificar->num_rows;
            if($NumRes > 0)//Si el usuario existe, se comienza con la validacion de la contraseña
            {
                $busUser=true;
                while($resultados = $verificar->fetch_assoc())
                {
                    if(password_verify($contraseña, $resultados['Password']))
                    {
                        $busContra=true;
                        $_SESSION['Username'] = $usuario;
                        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../Usuarios/Padre/Principal_Pad.php">';
                    }
                }
                if($busUser==true&&$busContra==false)
                    $pas_err = "* Contraseña incorrecta";
            }
            else
            {
                if($busUser==false&&$busContra==false)
                {
                    $us_err = "* Dato no encontrado";
                    $pas_err = "* Dato no encontrado";
                }
            }
        }
        else
        {
            if(empty($usuario))
                $us_err = "* Complete el campo usuario";

            if(empty($contraseña))
                $pas_err = "* Complete el campo contraseña";
        }
    }
    //require '../interfaces/acceder.php';
?>