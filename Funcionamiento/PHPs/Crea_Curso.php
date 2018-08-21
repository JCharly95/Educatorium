<?php
    session_start();
    require 'conexion.php';

    if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
    {
        header("location: ../../Acceso/FAcces.php");
    }

    $NomC_err = $Msg_err="";
    $NomC_right = $Msg_right="";

    $NomCur=$_POST['nombre'];
    $MsgBienvenida=$_POST['MsgBi'];
    $StatusContra=$_POST['Resp'];
    $Contra=$_POST['pass'];
    $CfnContra=$_POST['cpass'];

    if(isset($_POST['enviar']))
    {

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
    }

    function validar($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>