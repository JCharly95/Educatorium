<?php
	require '../../Funcionamiento/PHPs/buscar.php';
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
        <title>Padre - busqueda</title>
    </head>
    <body>
        <div class="container"> 
            <div class="row title">                
                <div class="col-md-12">
                    <div class="panel panel-default">   
                        <div class="panel-heading" style="line-height: 2;">
                            <span class="text-danger" ><b>Ingrese el usuario del estudiante a buscar:</b></span>
                        </div>
                        <div class="panel-body">
                            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                            <div class="input-group">
                                <input type="text" name="buscar" id="buscar" class="form-control" placeholder="Buscar">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit" name="enviar">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>   
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span>Datos del alumno:</span>
                    </div>
                    <div class="panel-body">
                        <strong class="text-success"><?php echo $registros;?></strong>
                        <form action="../../Funcionamiento/PHPs/enviar_notificacion.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $texto2; ?>">
                        <?php
                            echo $texto1;
                         ?>
                        <button type="submit" name="enviar" class="btn btn-success">Enviar Solicitud de parentesco</button>
                        </form>
                    <a href="../../Usuarios/Padre/Principal_Pad.php" class="btn btn-danger">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            @Copyright Educatorium 2018. Todos los derechos reservados
        </footer>
        <script type="text/javascript" src="../../CmpVis/jquery/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../../CmpVis/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    </body>
</html>