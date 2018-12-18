<?php
session_start();
    if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
    {
        header("location: ../../Acceso/FAcces.php");
    }
    $user = $_SESSION['Username'];

    require '../../Funcionamiento/PHPs/Conn_Ses/conexion.php';
    //require '../../Funcionamiento/PHPs/enviar_notificacion.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../../CmpVis/bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../../CmpVis/fontawesome-free-5.0.10/web-fonts-with-css/css/fontawesome-all.css">
        <link rel="stylesheet" type="text/css" href="../../Funcionamiento/Estilos_Extras/Pag_Pri_Est.css">
        <title>Estudiante</title>
    </head>
    <body>
    	<div class="container">
            <div class="row title">
                <div class="col-md-10">
                    <h1 align="center">Hola, ¿cómo estás?</h1>
                </div>
                <div class="col-md-2">
                    <a href="Principal_Est.php" class="btn btn-danger">Volver a página principal</a>
                </div>
            </div>
            <div class="media col-md-6 bg-primary">
                <div class="media-left media-top">
                    <img src="">
                </div>
                <div class="media-body">
                    <h2 class="media-heading text-center"> Estos son los tutores que han solicitado vincularse contigo: </h2><br>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <?php
                        $info = "";
                        $info2="";
                        $s="SELECT ID_Estudiante FROM estudiante WHERE Username = '$user' ";
                        $q=$conexion->query($s);
                        if($q->num_rows > 0)
                        {
                            while($rows = $q->fetch_assoc())
                            {
                                $id=$rows['ID_Estudiante'];
                            }

                            $sel = "SELECT Nombre, Ape_Pat, Ape_Mat FROM padre
                            INNER JOIN padre_estudiante ON padre.ID_Padre = padre_estudiante.Padre_ID";
                            $query=$conexion->query($sel);
                            $sel2 = "SELECT * FROM padre_estudiante WHERE Status = 0";
                            $query2=$conexion->query($sel2);
                            if($query->num_rows > 0 )
                            {
                                while($filas= $query->fetch_assoc())
                                {
                                    $info=$filas['Nombre']." ".$filas['Ape_Pat']." ".$filas['Ape_Mat'];
                                    //$info2=$filas['Nombre']." ".$filas['Ape_Pat']." ".$filas['Ape_Mat'];
                                }
                                if($query2->num_rows > 0)
                                {
                                echo "<ul><li>".$info." "."<button type='submit' name='aceptar' class='btn btn-success'>Aceptar</button>"." "."<button type='submit' name='denegar' class='btn btn-danger'>Rechazar</button></li></ul></form>";
                                }
                                if(isset($_POST['denegar']))
                                {
                                    $query = "DELETE FROM padre_estudiante WHERE Estudiante_ID = $id";
                                    $go = $conexion->query($query);
                                    if($go === TRUE )
                                    {
                                        echo "<script>alert('listo');</script>";
                                    }
                                    else
                                    {
                                        echo "<script>alert('error');</script>" . $conexion->error;
                                    }
                                }
                                elseif(isset($_POST['aceptar'])) 
                                {
                                    $valor = 1;
                                    $ins = "UPDATE padre_estudiante SET Status = 1";
                                    $query3 = $conexion->query($ins);
                                    if($query3 === true)
                                    {
                                    // echo "<script>window.location.href='parentesco.php';</<script>";
                                        echo "<script>alert('listo');</script>";
                                    }
                                    else
                                        {echo "<script>alert('hubo un error');</script>". $conexion->error;}
                                }
                            }
                            else
                            {
                                echo "No se encontraron registros del usuario";
                            }
                        }
                        else
                        {
                            echo "No se han tratado de vincular contigo";
                        }
                    ?>
                    
                </div>
            </div>
            <div class="media col-md-6" style="background-color: yellow;">
                <div class="media-left media-top">
                    <img src="">
                </div>
                <div class="media-body">
                    <h2 class="media-heading text-center"> Estos son los tutores con los que tienes relación: </h2><br>
                    <?php 
                        $selnew = "SELECT Nombre, Ape_Pat, Ape_Mat FROM padre
                        INNER JOIN padre_estudiante ON padre.ID_Padre = padre_estudiante.Padre_ID (SELECT * From padre_estudiante INNER JOIN estudiante ON padre_estudiante.Estudiante_ID = estudiante.ID_Estudiante WHERE Status = 1) AS datos";
                        $query4=$conexion->query($selnew);
                        // $seleccion = "SELECT * From padre_estudiante INNER JOIN estudiante ON padre_estudiante.Estudiante_ID = estudiante.ID_Estudiante WHERE Status = 1";
                        // $query5 = $conexion->query($seleccion);
                        if($query4->num_rows > 0)
                        {
                            while($filas= $query->fetch_assoc())
                            {
                                $info2=$filas['Nombre']." ".$filas['Ape_Pat']." ".$filas['Ape_Mat'];
                                //$info2=$filas['Nombre']." ".$filas['Ape_Pat']." ".$filas['Ape_Mat'];
                            }
                            // if($query5->num_rows > 0)
                            // {
                                echo "<ul><li>".$info2."</ul></li>";
                            // }
                            // else
                            // {
                                // echo $conexion->error;
                            // }
                        }
                    ?>
                </div>
            </div>
    		</form>
    <script type="text/javascript" src="../../CmpVis/jquery/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../../CmpVis/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="../../Funcionamiento/Javascripts/User_Sel.js"></script>
    </body>
</html>