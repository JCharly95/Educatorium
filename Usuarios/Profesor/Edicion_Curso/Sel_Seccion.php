<?php
    require '../../../Funcionamiento/PHPs/Carga_Datos/CSel_Seccion.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Editar Curso</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../../../CmpVis/bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../../../CmpVis/fontawesome-free-5.0.10/web-fonts-with-css/css/fontawesome-all.css">
        <link rel="stylesheet" type="text/css" href="../../../Funcionamiento/Estilos_Extras/Registro.css">
    </head>
    <body>
        <div class="container">
            <div class="row title">
                <div class="col-md-10">
                    <h3 align="center">Seleccione la opcion que desea crear o modificar</h3>
                </div>
                <div class="col-md-2">
                    <a data-toggle="modal" href="#ayuda"><i class="fas fa-question-circle fa-4x"></i></a>
                </div>
                <div id="ayuda" class="modal fade" role="dialog">
                    <div class="modal-dialog" style="padding-top: 50px;">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title text-danger text-center">Módulo de Ayuda</h3>
                          </div>
                            <div class="modal-body bg-info">
                                <p class="text-primary lead">Complete todos los campos del formulario con la información requerida. De lo contrario, se te mostrará un mensaje de error y <strong style="text-decoration: underline;">NO</strong> podrás registrarte. Haz caso a las indicaciones que se te piden.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Entendido</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Estructura General</h4>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <form action="Edit_Curso.php" method="post">
                                        <input type="hidden" name="OpcSel" value="Elem Bienve">
                                        <label class="btn btn-warning" style="width: 100%;">
                                            <input type="submit" name="enviar" style="display: none;">
                                            <i class="fas fa-pencil-alt fa-4x"></i>
                                            <span style="vertical-align: 60%;">&nbsp; <b>Editar elementos de bienvenida</b></span>
                                        </label>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <h4>Cuestionarios</h4>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <form action="Edit_Curso.php" method="post">
                                        <input type="hidden" name="OpcSel" value="New Cuestion">
                                        <label class="btn btn-success" style="width: 100%;">
                                            <input type="submit" name="enviar" style="display: none;">
                                            <i class="fas fa-plus-circle fa-4x"></i>
                                            <span style="vertical-align: 75%;">&nbsp; <b>Agregar cuestionario</b></span>
                                        </label>
                                    </form>
                                </div>
                                <div class="form-group">
                                    <form action="Edit_Curso.php" method="post">
                                        <input type="hidden" name="OpcSel" value="Edit Cuestions">
                                        <label class="btn btn-warning" style="width: 100%;">
                                            <input type="submit" name="enviar" style="display: none;">
                                            <i class="fas fa-pencil-alt fa-4x"></i>
                                            <span style="vertical-align: 60%;">&nbsp; <b>Editar cuestionarios existentes</b></span>
                                        </label>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h4>Recursos</h4>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <form action="Edit_Curso.php" method="post">
                                        <input type="hidden" name="OpcSel" value="New Recurso">
                                        <label class="btn btn-success" style="width: 100%;">
                                            <input type="submit" name="enviar" style="display: none;">
                                            <i class="fas fa-plus-circle fa-4x"></i>
                                            <span style="vertical-align: 75%;">&nbsp; <b>Agregar recurso</b></span>
                                        </label>
                                    </form>
                                </div>
                                <div class="form-group">
                                    <form action="Edit_Curso.php" method="post">
                                        <input type="hidden" name="OpcSel" value="Edit Recursos">
                                        <label class="btn btn-warning" style="width: 100%;">
                                            <input type="submit" name="enviar" style="display: none;">
                                            <i class="fas fa-pencil-alt fa-4x"></i>
                                            <span style="vertical-align: 60%;">&nbsp; <b>Editar recursos existentes</b></span>
                                        </label>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3 col-md-offset-5 regreso">
                    <a href="#" class="btn btn-danger" onclick="javascript:window.history.back();"><i class="fas fa-arrow-left"></i> Regresar</a>
                </div>
            </div>
        </div>
        <footer>
            @Copyright Educatorium 2018. Todos los derechos reservados
        </footer>
        <script type="text/javascript" src="../../../CmpVis/jquery/jquery-3.3.1.js"></script>
	    <script type="text/javascript" src="../../../CmpVis/bootstrap-3.3.7-dist/js/bootstrap.js"></script>        
    </body>
</html>