<?php
    require '../../../../Funcionamiento/PHPs/Cuestionario/NCuesti.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../../CmpVis/bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../../CmpVis/fontawesome-free-5.0.10/web-fonts-with-css/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="../../../../Funcionamiento/Estilos_Extras/Registro.css">
    <title>Editando...</title>
</head>
<body class="bg-primary">
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-10">
                        <h3 align="center">Seleccione la opcion que desea crear o modificar</h3>
                    </div>
                    <div class="col-md-2">
                        <a data-toggle="modal" href="#ayuda"><i class="fas fa-question-circle fa-4x"></i></a>
                    </div>
                    <div id="ayuda" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title text-danger text-center">Módulo de Ayuda</h4>
                                </div>
                                <div class="modal-body" style="background-color: teal;">
                                    <p><span class="glyphicon glyphicon-info-sign"></span> Seleccione el campo que desee modificar. Una vez realizado el cambio, de clic en el botón que dice <strong>Actualizar.</strong> Tenga en cuenta las indicaciones que se le indiquen debajo de cada campo para evitar un mensaje de error.</p><br>
                                    <p><span class="glyphicon glyphicon-warning-sign"></span> La contraseña no se muestra para proporcionarle una mejor privacidad a los usuarios.</p><br>
                                    <p><span class="glyphicon glyphicon-warning-sign"></span> Si cambia el usuario se le redigirá al inicio, donde deberá iniciar sesión nuevamente.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-dismiss="modal">Entendido</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="alert alert-warning alert-dismissible fade in">
                    <!--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
                    <p><span class="glyphicon glyphicon-info-sign"></span> Seleccione el campo que desee modificar. Una vez realizado el cambio, de clic en el botón que dice <strong>Actualizar.</strong></p>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <span class="lead text-primary">Creacion de cuestionario</span>
                    </div>
                    <div class="panel-body">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><span class="label label-default">Nombre del cuestionario: </span></h3>
                                        <input type="text" name="nombre" class="form-control" onfocus="this.value='' " placeholder="">
                                        <span class="help-block">Introducir solo letras y espacios en blanco.</span>
                                        <?php echo $NomAd; ?>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><span class="label label-default">Cantidad de preguntas: </span></h3>
                                        <select name="CantPreg" class="selectpicker btn btn-default">
                                            <option hidden value="" selected>0</option>
                                            <?php
                                                for ($i=1;$i<21;$i++) 
                                                {
                                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                                }
                                            ?>
                                        </select>
                                        <span class="help-block">Seleccione la cantidad de preguntas que tendra el cuestionario.</span>
                                        <?php echo $CantAd; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form group text-center">
                                <label class="label-warning">
                                    &nbsp;Cabe destacar que al crear una pregunta, est&aacute; sera por defecto de 4 alternativas y una respuesta&nbsp;
                                </label>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3 col-md-offset-2">
                                        <button type="submit" class="form-control btn btn-success active" name="actualizar">Crear cuestionario</button>
                                    </div>
                                    <div class="col-md-3 col-md-offset-2">
                                        <a href="../Curso/Sel_Seccion.php" class="form-control btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span> Cancelar</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../../../../CmpVis/jquery/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../../../../CmpVis/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
</body>
</html>