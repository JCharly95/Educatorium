<?php
    session_start();
    require 'conexion.php';

    if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
    {
        header("location: ../../Acceso/FAcces.php");
    }

    //Variables que almacenaran los datos recibidos por el formulario
    $NomCur = $MsgBienvenida = $StatusContra = $Contra = $CfnContra = "";

    //Variables de errores
    $NomC_err = $Msg_err = $StaPass_err = $Pass_err = $CfnPass_err = "";
    //Variables de aciertos
    $NomC_right = $Msg_right = $StaPass_right = $Pass_right = $CfnPass_right = "";

    //Confirmacion de existencia de las variables
    if(isset($_POST['nombre']) && isset($_POST['MsgBi']) && isset($_POST['Resp']) && isset($_POST['pass']) && isset($_POST['cpass']))
    {
        $NomCur=$_POST['nombre'];
        $MsgBienvenida=$_POST['MsgBi'];
        $StatusContra=$_POST['Resp'];
        $Contra=$_POST['pass'];
        $CfnContra=$_POST['cpass'];
    }

    $user=$_SESSION['Username'];
    $MatGen=$_SESSION['Mat'];

    /*
    $sql="select ID_Curso,curso.Nombre,Materia_ID,Profesor_ID from curso inner join profesor on"
     ."(ID_Profesor=Profesor_ID) inner join materia on (Materia_ID=ID_Materia) where Username='".$user."'"
     ."and materia.Nombre='".$MatGen."';";
    $consulta=$conexion->query($sql);    
    if($consulta->num_rows>0)    
    {
        while($res=$consulta->fetch_assoc())
        {
            $rutaSav=$res['Ruta'];
            $RutaImg=substr($rutaSav,36);
        }
    }*/

    //Inicio de peticion de datos
    if(isset($_POST['enviar']))
    {
        //Nombre del curso
        $NomCur=validar($NomCur); //Se "limpia" el nombre de curso, adaptando los caracteres especiales.
        
        if(empty($NomCur))//Comprobar si se introdujo un nombre
            $NomC_err = "* El campo nombre está vacío\n";
        elseif(!preg_match("/^[0-9a-zA-Z]+$/", $NomCur))//Comprobar si no se tienen caracteres extraños
            $NomC_err = "* Solo se permiten numeros, letras y espacios";
        elseif(strlen($nombre) > 30)//Comprobar si el nombre cumple con una determinada longitud
            $NomC_err = "* El nombre es muy largo, se permiten 30 caracteres como maximo (incluidos los espacios)";
        else //Si se cumplio con todo lo anterior, sale el aviso de excelente
            $NomC_right = " Nombre adecuado";

        //Mensaje de bienvenida
        $MsgBienvenida=validar($MsgBienvenida);//Se "limpia" el mensaje de bienvenida, adaptando los caracteres especiales.

        if(empty($MsgBienvenida))
            $Msg_err="* Favor de colocar un mensaje de bienvenida para el curso, no mayor a 100 caracteres";
        elseif(strlen($Msg_err) > 99)
            $Msg_err="* Mensaje demasiado largo, favor de ingresar uno mas corto";
        else
            $Msg_right=" Mensaje adecuado";

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
                    //$nom_img_ser=explode('.', $nombre_imagen);
                    $Img_Cur_Ser=explode('.', $nombre_imagen);
                    $Img_Cur_Ser1=explode('.', $NomCur);
                    //Img_Cur_Comencemos_Espa 1_Molina250.jpg
                    //Nombre de la imagen para almacenar en el servidor
                    $Nom_Img_Ser='Img_Cur_'.$Img_Cur_Ser1[0].'_'.$MatGen.'_'.$user.'.'.$Img_Cur_Ser[1];
                    //$nombre_imagen='Img_'.$user.'.'.$nom_img_ser[1];
                    $nom_img_bus='Img_'.$user;
                    //Solo si todas las validaciones anteriores son positivas, se almacena la imagen en el servidor                    
                    $destino = $_SERVER['DOCUMENT_ROOT'].'/Educatorium/imagenes/';
                    $dir_ruta=$destino.$nombre_imagen;
                    move_uploaded_file($_FILES['imagen']['tmp_name'], $dir_ruta);
                    //$id_img = mysqli_insert_id();
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
        
        /*Contraseña
        Revisar si se introdujo contraseña*/
        if($StatusContra=="Si")
        {
            $Contra=validar($Contra);
            $CfnContra=validar($CfnContra);
            //Si se introdujo contraseña, revisar su contenido
            $Check_Pass=RevContra($Contra,$CfnContra);
            //$Arr_Res = array($ErrPass,$NErrPass,$ErrCfnPass,$NErrCfnPass,$cifrado);
            $Pass_err=$Check_Pass[0];
            $Pass_right=$Check_Pass[1];
            $CfnPass_err=$Check_Pass[2];
            $CfnPass_right=$Check_Pass[3];
            $Contra=$Check_Pass[4];
        }
        else
        {
            $Contra="";
        }        

        /**/

        /*$user=$_SESSION['Username'];
        $MatGen=$_SESSION['Mat'];*/

         /*
    $sql="select ID_Curso,curso.Nombre,Materia_ID,Profesor_ID from curso inner join profesor on"
     ."(ID_Profesor=Profesor_ID) inner join materia on (Materia_ID=ID_Materia) where Username='".$user."'"
     ."and materia.Nombre='".$MatGen."';";
    $consulta=$conexion->query($sql);    
    if($consulta->num_rows>0)    
    {
        while($res=$consulta->fetch_assoc())
        {
            $rutaSav=$res['Ruta'];
            $RutaImg=substr($rutaSav,36);
        }
    }*/
    }

    function validar($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function RevContra($pass,$cpass)
    {
        //Avisos de contraseña
        $ErrPass=$NErrPass="";
        //Avisos de confirmacion de contraseña
        $ErrCfnPass=$NErrCfnPass="";

        //Revision de contraseña        
        if(empty($pass))
            $ErrPass = "* El campo contraseña está vacío";
        else if(strlen($pass) < 8)
            $ErrPass = "* La contraseña es muy corta, se solicita como minimo 8 caracteres";
        else if(!preg_match('/(?=\d)/', $pass))
            $ErrPass = "* Debe contener al menos un dígito";
        else if(!preg_match('/(?=[a-z])/', $pass))
            $ErrPass = "* Debe contener al menos una minúscula";
        else if(!preg_match('/(?=[A-Z])/', $pass))
            $ErrPass = "*Debe contener al menos una mayúscula";
        else
        {
            $NErrPass = "¡Correcto!";
            $cifrado = password_hash($pass, PASSWORD_DEFAULT);
        }

        //Confirmacion de contraseña
        $cpass = validar($_POST['cpass']);
        if(empty($cpass))
            $ErrCfnPass = "* Favor de introducir otra vez su contraseña";
        elseif($cpass!=$pass)
            $ErrCfnPass = "* Las contraseñas no coinciden";
        else
            $NErrCfnPass = "¡Correcto!";

        $Arr_Res = array($ErrPass,$NErrPass,$ErrCfnPass,$NErrCfnPass,$cifrado);
        return $Arr_Res;
    }

?>