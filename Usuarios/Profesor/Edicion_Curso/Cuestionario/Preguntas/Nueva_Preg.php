<?php
    //require '../../../../Funcionamiento/PHPs/Cuestionario/NCuesti.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../../../CmpVis/bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../../../CmpVis/fontawesome-free-5.0.10/web-fonts-with-css/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="../../../../../Funcionamiento/Estilos_Extras/Registro.css">
    <title>Nueva Pregunta</title>
</head>
<body class="bg-primary">
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-10">
                        <h3 align="center">Seleccione e introduzca los campos solicitados</h3>
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
                    <p><span class="glyphicon glyphicon-info-sign"></span> Complete los campos solicitados. Una vez realizado el cambio, de clic en el botón que dice <strong>Crear Pregunta</strong></p>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <span class="lead text-primary">Creacion de Pregunta</span>
                    </div>
                    <div class="panel-body">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="form-group">
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Tipo de pregunta: </span></h3>
                                        <select class="btn btn-default" name="" id="Tip_Esc" onclick="SelResp(this.value);">
                                            <option hidden value="" selected>Tipos de preguntas para crear:</option>
                                            <option value="1">Opcion multiple, 4 alternativas y una respuesta correcta</option>
                                            <option value="2">Opcion multiple, 7 alternativas y varias respuestas correctas</option>
                                            <option value="3">Cierto y Falso</option>
                                            <option value="4">Relacion de columnas</option>
                                            <option value="5">Orden de seleccionado</option>
                                            <option value="6">Completa la oracion</option>
                                            <option value="7">Escala de Linkert</option>
                                        </select>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><span class="label label-default">Oracion de la pregunta: </span></h3>
                                        <div class="input-group">
                                            <span class="input-group-addon">¿</span>
                                            <input type="text" class="form-control">
                                            <span class="input-group-addon">?</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="RespTip1" style="display:none;"><!---->
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Respuesta 1: </span></h3>
                                        <input type="text" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-6">
                                                <span>Condicion de la pregunta:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="radio-inline"><input type="radio" name="Opc1">Correcta</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><span class="label label-default">Respuesta 2: </span></h3>
                                        <input type="text" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-6">
                                                <span>Condicion de la pregunta:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="radio-inline"><input type="radio" name="Opc1">Correcta</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Respuesta 3: </span></h3>
                                        <input type="text" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-6">
                                                <span>Condicion de la pregunta:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="radio-inline"><input type="radio" name="Opc1" checked>Correcta</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><span class="label label-default">Respuesta 4: </span></h3>
                                        <input type="text" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-6">
                                                <span>Condicion de la pregunta:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="radio-inline"><input type="radio" name="Opc1">Correcta</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="RespTip2" style="display:none;"><!---->
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Respuesta 1: </span></h3>
                                        <input type="text" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-6">
                                                <span>Condicion de la pregunta:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="radio-inline"><input type="checkbox" name="Opc2"> Correcta</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><span class="label label-default">Respuesta 2: </span></h3>
                                        <input type="text" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-6">
                                                <span>Condicion de la pregunta:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="radio-inline"><input type="checkbox" name="Opc2"> Correcta</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Respuesta 3: </span></h3>
                                        <input type="text" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-6">
                                                <span>Condicion de la pregunta:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="radio-inline"><input type="checkbox" name="Opc2"> Correcta</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><span class="label label-default">Respuesta 4: </span></h3>
                                        <input type="text" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-6">
                                                <span>Condicion de la pregunta:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="radio-inline"><input type="checkbox" name="Opc2"> Correcta</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Respuesta 5: </span></h3>
                                        <input type="text" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-6">
                                                <span>Condicion de la pregunta:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="radio-inline"><input type="checkbox" name="Opc2" checked> Correcta</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><span class="label label-default">Respuesta 6: </span></h3>
                                        <input type="text" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-6">
                                                <span>Condicion de la pregunta:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="radio-inline"><input type="checkbox" name="Opc2"> Correcta</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Respuesta 7: </span></h3>
                                        <input type="text" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-6">
                                                <span>Condicion de la pregunta:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="radio-inline"><input type="checkbox" name="Opc2"> Correcta</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="RespTip3" style="display:none;"><!---->
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Respuesta 1: </span></h3>
                                        <input type="text" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-6">
                                                <span>Condicion de la pregunta:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="radio-inline"><input type="radio" name="Opc3">Correcta</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><span class="label label-default">Respuesta 2: </span></h3>
                                        <input type="text" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-6">
                                                <span>Condicion de la pregunta:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="radio-inline"><input type="radio" name="Opc3" checked>Correcta</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="RespTip4" style="display:none;"><!---->
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Alternativa 1: </span></h3>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><span class="label label-default">Respuesta A: </span></h3>
                                        <input type="text" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-6">
                                                <span>Alternativa de relacion:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="radio-inline"><input type="radio" name="Opc41" checked>Alternativa 1</label>
                                                <label class="radio-inline"><input type="radio" name="Opc41">Alternativa 2</label>
                                                <label class="radio-inline"><input type="radio" name="Opc41">Alternativa 3</label>
                                                <label class="radio-inline"><input type="radio" name="Opc41">Alternativa 4</label>
                                                <label class="radio-inline"><input type="radio" name="Opc41">Alternativa 5</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Alternativa 2: </span></h3>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><span class="label label-default">Respuesta B: </span></h3>
                                        <input type="text" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-6">
                                                <span>Alternativa de relacion:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="radio-inline"><input type="radio" name="Opc42" checked>Alternativa 1</label>
                                                <label class="radio-inline"><input type="radio" name="Opc42">Alternativa 2</label>
                                                <label class="radio-inline"><input type="radio" name="Opc42">Alternativa 3</label>
                                                <label class="radio-inline"><input type="radio" name="Opc42">Alternativa 4</label>
                                                <label class="radio-inline"><input type="radio" name="Opc42">Alternativa 5</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Alternativa 3: </span></h3>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><span class="label label-default">Respuesta C: </span></h3>
                                        <input type="text" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-6">
                                                <span>Alternativa de relacion:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="radio-inline"><input type="radio" name="Opc43" checked>Alternativa 1</label>
                                                <label class="radio-inline"><input type="radio" name="Opc43">Alternativa 2</label>
                                                <label class="radio-inline"><input type="radio" name="Opc43">Alternativa 3</label>
                                                <label class="radio-inline"><input type="radio" name="Opc43">Alternativa 4</label>
                                                <label class="radio-inline"><input type="radio" name="Opc43">Alternativa 5</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Alternativa 4: </span></h3>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><span class="label label-default">Respuesta D: </span></h3>
                                        <input type="text" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-6">
                                                <span>Alternativa de relacion:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="radio-inline"><input type="radio" name="Opc44" checked>Alternativa 1</label>
                                                <label class="radio-inline"><input type="radio" name="Opc44">Alternativa 2</label>
                                                <label class="radio-inline"><input type="radio" name="Opc44">Alternativa 3</label>
                                                <label class="radio-inline"><input type="radio" name="Opc44">Alternativa 4</label>
                                                <label class="radio-inline"><input type="radio" name="Opc44">Alternativa 5</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Alternativa 5: </span></h3>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><span class="label label-default">Respuesta E: </span></h3>
                                        <input type="text" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-6">
                                                <span>Alternativa de relacion:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="radio-inline"><input type="radio" name="Opc45" checked>Alternativa 1</label>
                                                <label class="radio-inline"><input type="radio" name="Opc45">Alternativa 2</label>
                                                <label class="radio-inline"><input type="radio" name="Opc45">Alternativa 3</label>
                                                <label class="radio-inline"><input type="radio" name="Opc45">Alternativa 4</label>
                                                <label class="radio-inline"><input type="radio" name="Opc45">Alternativa 5</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="RespTip5" style="display:none;"><!---->
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Respuesta 1: </span></h3>
                                        <input type="text" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-12">
                                                <span>¿En que posicion, esta respuesta es correcta?:</span>
                                            </div>
                                        </div>
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-12">
                                                <label class="radio-inline"><input type="radio" name="Opc51" checked>1</label>
                                                <label class="radio-inline"><input type="radio" name="Opc51">2</label>
                                                <label class="radio-inline"><input type="radio" name="Opc51">3</label>
                                                <label class="radio-inline"><input type="radio" name="Opc51">4</label>
                                                <label class="radio-inline"><input type="radio" name="Opc51">5</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><span class="label label-default">Respuesta 2: </span></h3>
                                        <input type="text" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-12">
                                                <span>¿En que posicion, esta respuesta es correcta?:</span>
                                            </div>
                                        </div>
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-12">
                                                <label class="radio-inline"><input type="radio" name="Opc52" checked>1</label>
                                                <label class="radio-inline"><input type="radio" name="Opc52">2</label>
                                                <label class="radio-inline"><input type="radio" name="Opc52">3</label>
                                                <label class="radio-inline"><input type="radio" name="Opc52">4</label>
                                                <label class="radio-inline"><input type="radio" name="Opc52">5</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Respuesta 3: </span></h3>
                                        <input type="text" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-12">
                                                <span>¿En que posicion, esta respuesta es correcta?:</span>
                                            </div>
                                        </div>
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-12">
                                                <label class="radio-inline"><input type="radio" name="Opc53" checked>1</label>
                                                <label class="radio-inline"><input type="radio" name="Opc53">2</label>
                                                <label class="radio-inline"><input type="radio" name="Opc53">3</label>
                                                <label class="radio-inline"><input type="radio" name="Opc53">4</label>
                                                <label class="radio-inline"><input type="radio" name="Opc53">5</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><span class="label label-default">Respuesta 4: </span></h3>
                                        <input type="text" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-12">
                                                <span>¿En que posicion, esta respuesta es correcta?:</span>
                                            </div>
                                        </div>
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-12">
                                                <label class="radio-inline"><input type="radio" name="Opc54" checked>1</label>
                                                <label class="radio-inline"><input type="radio" name="Opc54">2</label>
                                                <label class="radio-inline"><input type="radio" name="Opc54">3</label>
                                                <label class="radio-inline"><input type="radio" name="Opc54">4</label>
                                                <label class="radio-inline"><input type="radio" name="Opc54">5</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Respuesta 5: </span></h3>
                                        <input type="text" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-12">
                                                <span>¿En que posicion, esta respuesta es correcta?:</span>
                                            </div>
                                        </div>
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-12">
                                                <label class="radio-inline"><input type="radio" name="Opc55" checked>1</label>
                                                <label class="radio-inline"><input type="radio" name="Opc55">2</label>
                                                <label class="radio-inline"><input type="radio" name="Opc55">3</label>
                                                <label class="radio-inline"><input type="radio" name="Opc55">4</label>
                                                <label class="radio-inline"><input type="radio" name="Opc55">5</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="RespTip6" style="display:none;"><!---->
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Oracion Parte 1: </span></h3>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><span class="label label-default">Opciones de completado 1: </span></h3>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Oracion Parte 2: </span></h3>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><span class="label label-default">Opciones de completado 2: </span></h3>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Oracion Parte 3: </span></h3>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><span class="label label-default">Opciones de completado 3: </span></h3>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Oracion Parte 4: </span></h3>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><span class="label label-default">Opciones de completado 4: </span></h3>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="RespTip7" style="display:none;"><!---->
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Respuesta 1: </span></h3>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><span class="label label-default">Respuesta 2: </span></h3>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Respuesta 3: </span></h3>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><span class="label label-default">Respuesta 4: </span></h3>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Respuesta 5: </span></h3>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
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
    <script type="text/javascript" src="../../../../../CmpVis/jquery/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../../../../../Funcionamiento/Javascripts/New_Preg.js"></script>
    <script type="text/javascript" src="../../../../../CmpVis/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
</body>
</html>