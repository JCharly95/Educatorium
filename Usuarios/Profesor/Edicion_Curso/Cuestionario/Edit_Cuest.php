<?php
    session_start();
    require '../../../../Funcionamiento/PHPs/Carga_Datos/CEdit_Cuest.php';
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
        <title>Editar cuestionario</title>
    </head>
    <body>
        <div class="container">
            <div class="form-group">
                <div class="row title">
                    <div class="col-md-10">
                        <h2 align="center">Seleccione una opcion para iniciar con la edicion</h2>
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
            <div class="form-group">
                <div class="panel panel-success">
                    <div class="panel-heading" style="padding-top: 2.5%;">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <a href="Preguntas/Nueva_Preg.php" class="btn btn-success" style="width: 100%;" onclick="window.location.replace();">
                                        <i class="fas fa-plus-circle fa-4x"></i>
                                        <span style="vertical-align: 75%;">&nbsp; <b>Agregar pregunta</b></span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <a href="Preguntas/Sel_Edit_Preg.php" class="btn btn-warning" style="width: 100%;" onclick="window.location.replace();">
                                        <i class="fas fa-pencil-alt fa-4x"></i>
                                        <span style="vertical-align: 60%;">&nbsp; <b>Editar preguntas</b></span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <a href="Preguntas/Sel_Del_Preg.php" class="btn btn-danger" style="width: 100%;" onclick="window.location.replace();">
                                        <i class="fas fa-times fa-4x"></i>
                                        <span style="vertical-align: 75%;">&nbsp; <b>Eliminar pregunta</b></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3 col-md-offset-5 regreso">
                    <a href="Sel_Edit_Cuesti.php" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Regresar</a>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="../../../../CmpVis/jquery/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="../../../../Funcionamiento/Javascripts/Sel_Curso.js"></script>
        <script type="text/javascript" src="../../../../CmpVis/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    </body>
</html>