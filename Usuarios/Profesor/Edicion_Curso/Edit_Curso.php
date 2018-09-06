<?php
  require '../../../Funcionamiento/PHPs/Carga_Datos/CEdicion_Cur.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../CmpVis/bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../CmpVis/fontawesome-free-5.0.10/web-fonts-with-css/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="../../../Funcionamiento/Estilos_Extras/Registro.css">
    <title>Editando...</title>
</head>
<body class="bg-primary">
    <div class="container">
        <!--Vista para edicion de elementos de bienvenida-->
        <div id="Elem_Bienve">
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
                            <span class="lead text-primary">Información de los elementos de bienvenida</span>
                        </div>
                        <div class="panel-body">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-5 col-md-offset-1">
                                            <h3><span class="label label-default">Mensaje: </span></h3>
                                            <textarea name="NewMsgBien" id="" cols="60" rows="7" class="form-control" onfocus="this.value='' " placeholder="" style="resize:none;"></textarea>
                                            <span class="help-block">Introducir solo letras y espacios en blanco.</span>
                                            <!--Variable de error-->
                                        </div>
                                        <div class="col-md-5 col-md-offset-1">
                                            <h3><span class="label label-default">Imagen: </span></h3>
                                            <div class="form-group">
                                                <output id="list">
                                                    
                                                </output>
                                            </div>
                                            <label class="btn btn-primary">
                                                <input type="file" id="files" name="imagen" style="display: none;" />
                                                <i class="fas fa-plus-circle fa-2x"></i> &nbsp;Seleccionar imagen...
                                            </label>
                                            <span class="help-block">Seleccionar solo imagenes.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3 col-md-offset-2">
                                            <button type="submit" class="form-control btn btn-default active" name="actualizar">Actualizar</button>
                                        </div>
                                        <div class="col-md-3 col-md-offset-2">
                                            <a href="Sel_Seccion.php" class="form-control btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span> Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Vista para crear un cuestionario-->
        <div id="Add_Cuestion">
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
                            <span class="lead text-primary">Información de los elementos de bienvenida</span>
                        </div>
                        <div class="panel-body">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="form-group">
                                    <div class="row">
                                        <!--Contenido de la pagina-->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3 col-md-offset-2">
                                            <button type="submit" class="form-control btn btn-default active" name="actualizar">Actualizar</button>
                                        </div>
                                        <div class="col-md-3 col-md-offset-2">
                                            <a href="Sel_Seccion.php" class="form-control btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span> Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Vista para editar los cuestionarios existentes-->
        <div id="Add_Cuestion">
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
                            <span class="lead text-primary">Información de los elementos de bienvenida</span>
                        </div>
                        <div class="panel-body">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="form-group">
                                    <div class="row">
                                        <!--Contenido de la pagina-->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3 col-md-offset-2">
                                            <button type="submit" class="form-control btn btn-default active" name="actualizar">Actualizar</button>
                                        </div>
                                        <div class="col-md-3 col-md-offset-2">
                                            <a href="Sel_Seccion.php" class="form-control btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span> Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Vista para agregar recursos-->
        <div id="Add_Cuestion">
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
                            <span class="lead text-primary">Información de los elementos de bienvenida</span>
                        </div>
                        <div class="panel-body">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="form-group">
                                    <div class="row">
                                        <!--Contenido de la pagina-->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3 col-md-offset-2">
                                            <button type="submit" class="form-control btn btn-default active" name="actualizar">Actualizar</button>
                                        </div>
                                        <div class="col-md-3 col-md-offset-2">
                                            <a href="Sel_Seccion.php" class="form-control btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span> Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Vista para editar los recursos existentes-->
        <div id="Add_Cuestion">
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
                            <span class="lead text-primary">Información de los elementos de bienvenida</span>
                        </div>
                        <div class="panel-body">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="form-group">
                                    <div class="row">
                                        <!--Contenido de la pagina-->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3 col-md-offset-2">
                                            <button type="submit" class="form-control btn btn-default active" name="actualizar">Actualizar</button>
                                        </div>
                                        <div class="col-md-3 col-md-offset-2">
                                            <a href="Sel_Seccion.php" class="form-control btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span> Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../../../CmpVis/jquery/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../../../CmpVis/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
</body>
</html>