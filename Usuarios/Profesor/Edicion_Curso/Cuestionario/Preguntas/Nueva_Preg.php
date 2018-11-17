<?php
    require '../../../../../Funcionamiento/PHPs/Cuestionario/NPreg.php';
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
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Tipo de pregunta: </span></h3>
                                        <select class="btn btn-default" name="Tip_Preg" onclick="SelResp(this.value);">
                                            <option hidden value="" selected>Tipos de preguntas para crear:</option>
                                            <option value="1">Opcion multiple, 4 alternativas y una respuesta correcta</option>
                                            <option value="2">Opcion multiple, 7 alternativas y varias respuestas correctas</option>
                                            <option value="3">Cierto y Falso</option>
                                            <option value="4">Relacion de columnas</option>
                                            <option value="5">Orden de seleccionado</option>
                                            <option value="6" onclick="CantList_Opc('TextPreg');">Completa la oracion</option>
                                            <option value="7">Escala de Linkert</option>
                                        </select>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><span class="label label-default">Oracion de la pregunta: </span></h3>
                                        <div class="input-group">
                                            <span class="input-group-addon">¿</span>
                                            <input type="text" name="Pregunta" id="TextPreg" class="form-control">
                                            <span class="input-group-addon">?</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row" id="PregImg" style="padding-left: 8%;">
                                    <div class="col-md-offset-3">
                                        <h3><span class="label label-default">¿Deseas incluir una imagen con la pregunta?</span></h3>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <h3><label class="label label-default"><input type="radio" name="ImgPreg" value="Si" id="RMSi" onclick="ViewSec('RMSi','SelImg','PregImg');">&nbsp; Si</label></h3>
                                            </div>
                                            <div class="col-md-5">
                                                <h3><label class="label label-default"><input type="radio" name="ImgPreg" value="No" id="RMNo" onclick="ViewSec('RMSi','SelImg','PregImg');">&nbsp; No</label></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                </div>
                                <div class="row" id="SelImg" style="padding-left: 8%; display:none;">
                                    <br><br>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 col-md-offset-2">
                                                <label for="files">Imagen del mensaje de bienvenida:</label>
                                            </div>
                                            <div class="col-md-4">
                                                <output id="list">
                                                    
                                                </output>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="btn btn-primary">
                                                    <input type="file" id="files" name="imagen" style="display: none;" />
                                                    <i class="fas fa-plus-circle fa-2x"></i> &nbsp;Seleccionar imagen...
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="RespTip1" style="display:none;"><!---->
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Respuesta 1: </span></h3>
                                        <input type="text" name="OpcRes1[]" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-6">
                                                <span>Condicion de la respuesta:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="radio-inline"><input type="radio" name="CondRes1[]" value="1">Correcta</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><span class="label label-default">Respuesta 2: </span></h3>
                                        <input type="text" name="OpcRes1[]" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-6">
                                                <span>Condicion de la respuesta:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="radio-inline"><input type="radio" name="CondRes1[]" value="2">Correcta</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Respuesta 3: </span></h3>
                                        <input type="text" name="OpcRes1[]" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-6">
                                                <span>Condicion de la respuesta:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="radio-inline"><input type="radio" name="CondRes1[]" value="3" checked>Correcta</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><span class="label label-default">Respuesta 4: </span></h3>
                                        <input type="text" name="OpcRes1[]" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-6">
                                                <span>Condicion de la respuesta:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="radio-inline"><input type="radio" name="CondRes1[]" value="4">Correcta</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="RespTip2" style="display:none;"><!---->
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Respuesta 1: </span></h3>
                                        <input type="text" name="OpcRes2[]" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-6">
                                                <span>Condicion de la respuesta:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="radio-inline"><input type="checkbox" name="CondRes2[]" value="1"> Correcta</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><span class="label label-default">Respuesta 2: </span></h3>
                                        <input type="text" name="OpcRes2[]" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-6">
                                                <span>Condicion de la respuesta:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="radio-inline"><input type="checkbox" name="CondRes2[]" value="2"> Correcta</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Respuesta 3: </span></h3>
                                        <input type="text" name="OpcRes2[]" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-6">
                                                <span>Condicion de la respuesta:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="radio-inline"><input type="checkbox" name="CondRes2[]" value="3"> Correcta</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><span class="label label-default">Respuesta 4: </span></h3>
                                        <input type="text" name="OpcRes2[]" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-6">
                                                <span>Condicion de la respuesta:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="radio-inline"><input type="checkbox" name="CondRes2[]" value="4"> Correcta</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Respuesta 5: </span></h3>
                                        <input type="text" name="OpcRes2[]" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-6">
                                                <span>Condicion de la respuesta:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="radio-inline"><input type="checkbox" name="CondRes2[]" value="5" checked> Correcta</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><span class="label label-default">Respuesta 6: </span></h3>
                                        <input type="text" name="OpcRes2[]" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-6">
                                                <span>Condicion de la respuesta:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="radio-inline"><input type="checkbox" name="CondRes2[]" value="6"> Correcta</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Respuesta 7: </span></h3>
                                        <input type="text" name="OpcRes2[]" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-6">
                                                <span>Condicion de la respuesta:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="radio-inline"><input type="checkbox" name="CondRes2[]" value="7"> Correcta</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="RespTip3" style="display:none;"><!---->
                                <div class="alert alert-danger alert-dismissible fade in text-center">
                                    <!--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
                                    <p><span class="glyphicon glyphicon-info-sign"></span> 
                                    Favor de seleccionar la respuesta que sera correcta</p>
                                </div>
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><label class="label label-default"><input type="radio" name="OpcRes3[]" value="1">&nbsp; Cierto</label></h3>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><label class="label label-default"><input type="radio" name="OpcRes3[]" value="2" checked>&nbsp; Falso</label></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="RespTip4" style="display:none;"><!---->
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Alternativa 1: </span></h3>
                                        <input type="text" name="OpcRes4[]" class="form-control">
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><span class="label label-default">Relacion Alternativa 1: </span></h3>
                                        <input type="text" name="OpcRes41[]" class="form-control">
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Alternativa 2: </span></h3>
                                        <input type="text" name="OpcRes4[]" class="form-control">
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><span class="label label-default">Relacion Alternativa 2: </span></h3>
                                        <input type="text" name="OpcRes41[]" class="form-control">
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Alternativa 3: </span></h3>
                                        <input type="text" name="OpcRes4[]" class="form-control">
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><span class="label label-default">Relacion Alternativa 3: </span></h3>
                                        <input type="text" name="OpcRes41[]" class="form-control">
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Alternativa 4: </span></h3>
                                        <input type="text" name="OpcRes4[]" class="form-control">
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><span class="label label-default">Relacion Alternativa 4: </span></h3>
                                        <input type="text" name="OpcRes41[]" class="form-control">
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Alternativa 5: </span></h3>
                                        <input type="text" name="OpcRes4[]" class="form-control">
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><span class="label label-default">Relacion Alternativa 5: </span></h3>
                                        <input type="text" name="OpcRes41[]" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="RespTip5" style="display:none;"><!---->
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Respuesta 1: </span></h3>
                                        <input type="text" name="OpcRes5[]" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-12">
                                                <span>¿En que posicion, esta respuesta es correcta?:</span>
                                            </div>
                                        </div>
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-12">
                                                <select class="btn btn-default" name="CondRes51" id="Res51" onclick="BloqOrdSel(this.value,'Res51');">
                                                    <option hidden value="" selected>Posiciones</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><span class="label label-default">Respuesta 2: </span></h3>
                                        <input type="text" name="OpcRes5[]" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-12">
                                                <span>¿En que posicion, esta respuesta es correcta?:</span>
                                            </div>
                                        </div>
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-12">
                                                <select class="btn btn-default" name="CondRes52" id="Res52" onclick="BloqOrdSel(this.value,'Res52');">
                                                    <option hidden value="" selected>Posiciones</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Respuesta 3: </span></h3>
                                        <input type="text" name="OpcRes5[]" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-12">
                                                <span>¿En que posicion, esta respuesta es correcta?:</span>
                                            </div>
                                        </div>
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-12">
                                                <select class="btn btn-default" name="CondRes53" id="Res53" onclick="BloqOrdSel(this.value,'Res53');">
                                                    <option hidden value="" selected>Posiciones</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><span class="label label-default">Respuesta 4: </span></h3>
                                        <input type="text" name="OpcRes5[]" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-12">
                                                <span>¿En que posicion, esta respuesta es correcta?:</span>
                                            </div>
                                        </div>
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-12">
                                                <select class="btn btn-default" name="CondRes54" id="Res54" onclick="BloqOrdSel(this.value,'Res54');">
                                                    <option hidden value="" selected>Posiciones</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Respuesta 5: </span></h3>
                                        <input type="text" name="OpcRes5[]" class="form-control">
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-12">
                                                <span>¿En que posicion, esta respuesta es correcta?:</span>
                                            </div>
                                        </div>
                                        <div class="form-group text-center" style="color:black;">
                                            <div class="col-md-12">
                                                <select class="btn btn-default" name="CondRes55" id="Res55" onclick="BloqOrdSel(this.value,'Res55');">
                                                    <option hidden value="" selected>Posiciones</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="RespTip6" style="display:none;"><!---->
                                <div class="alert alert-warning alert-dismissible fade in">
                                    <!--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
                                    <p><span class="glyphicon glyphicon-info-sign"></span> 
                                    En el campo oracion de la pregunta introduzca un guion bajo "_" donde la opcion seleccionada en la lista 
                                    sea la palabra a completar</p>
                                </div>
                                <div id="Lista1" style="display:none;">
                                    <div class="text-center">
                                        <h3><span class="label label-warning">Lista 1</span></h3>
                                    </div>
                                    <div class="row" style="padding-left: 8%;">
                                        <div class="col-md-5">
                                            <h3><span class="label label-default">Alternativa 1</span></h3>
                                            <input type="text" name="OpcRes61[]" class="form-control">
                                            <div class="form-group text-center" style="color:black;">
                                                <div class="col-md-6">
                                                    <span>Condicion de la respuesta:</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="radio-inline"><input type="radio" name="CondRes61[]" value="1" checked>Correcta</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-md-offset-1">
                                            <h3><span class="label label-default">Alternativa 2</span></h3>
                                            <input type="text" name="OpcRes61[]" class="form-control">
                                            <div class="form-group text-center" style="color:black;">
                                                <div class="col-md-6">
                                                    <span>Condicion de la respuesta:</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="radio-inline"><input type="radio" name="CondRes61[]" value="2">Correcta</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="padding-left: 8%;">
                                        <div class="col-md-5">
                                            <h3><span class="label label-default">Alternativa 3</span></h3>
                                            <input type="text" name="OpcRes61[]" class="form-control">
                                            <div class="form-group text-center" style="color:black;">
                                                <div class="col-md-6">
                                                    <span>Condicion de la respuesta:</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="radio-inline"><input type="radio" name="CondRes61[]" value="3">Correcta</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="Lista2" style="display:none;">
                                    <div class="text-center">
                                        <h3><span class="label label-warning">Lista 2</span></h3>
                                    </div>
                                    <div class="row" style="padding-left: 8%;">
                                        <div class="col-md-5">
                                            <h3><span class="label label-default">Alternativa 1</span></h3>
                                            <input type="text" name="OpcRes62[]" class="form-control">
                                            <div class="form-group text-center" style="color:black;">
                                                <div class="col-md-6">
                                                    <span>Condicion de la respuesta:</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="radio-inline"><input type="radio" name="CondRes62[]" value="1" checked>Correcta</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-md-offset-1">
                                            <h3><span class="label label-default">Alternativa 2</span></h3>
                                            <input type="text" name="OpcRes62[]" class="form-control">
                                            <div class="form-group text-center" style="color:black;">
                                                <div class="col-md-6">
                                                    <span>Condicion de la respuesta:</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="radio-inline"><input type="radio" name="CondRes62[]" value="2">Correcta</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="padding-left: 8%;">
                                        <div class="col-md-5">
                                            <h3><span class="label label-default">Alternativa 3</span></h3>
                                            <input type="text" name="OpcRes62[]" class="form-control">
                                            <div class="form-group text-center" style="color:black;">
                                                <div class="col-md-6">
                                                    <span>Condicion de la respuesta:</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="radio-inline"><input type="radio" name="CondRes62[]" value="3">Correcta</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="Lista3" style="display:none;">
                                    <div class="text-center">
                                        <h3><span class="label label-warning">Lista 3</span></h3>
                                    </div>
                                    <div class="row" style="padding-left: 8%;">
                                        <div class="col-md-5">
                                            <h3><span class="label label-default">Alternativa 1</span></h3>
                                            <input type="text" name="OpcRes63[]" class="form-control">
                                            <div class="form-group text-center" style="color:black;">
                                                <div class="col-md-6">
                                                    <span>Condicion de la respuesta:</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="radio-inline"><input type="radio" name="CondRes63[]" value="1" checked>Correcta</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-md-offset-1">
                                            <h3><span class="label label-default">Alternativa 2</span></h3>
                                            <input type="text" name="OpcRes63[]" class="form-control">
                                            <div class="form-group text-center" style="color:black;">
                                                <div class="col-md-6">
                                                    <span>Condicion de la respuesta:</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="radio-inline"><input type="radio" name="CondRes63[]" value="2">Correcta</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="padding-left: 8%;">
                                        <div class="col-md-5">
                                            <h3><span class="label label-default">Alternativa 3</span></h3>
                                            <input type="text" name="OpcRes63[]" class="form-control">
                                            <div class="form-group text-center" style="color:black;">
                                                <div class="col-md-6">
                                                    <span>Condicion de la respuesta:</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="radio-inline"><input type="radio" name="CondRes63[]" value="3">Correcta</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="Lista4" style="display:none;">
                                    <div class="text-center">
                                        <h3><span class="label label-warning">Lista 4</span></h3>
                                    </div>
                                    <div class="row" style="padding-left: 8%;">
                                        <div class="col-md-5">
                                            <h3><span class="label label-default">Alternativa 1</span></h3>
                                            <input type="text" name="OpcRes64[]" class="form-control">
                                            <div class="form-group text-center" style="color:black;">
                                                <div class="col-md-6">
                                                    <span>Condicion de la respuesta:</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="radio-inline"><input type="radio" name="CondRes64[]" value="1" checked>Correcta</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-md-offset-1">
                                            <h3><span class="label label-default">Alternativa 2</span></h3>
                                            <input type="text" name="OpcRes64[]" class="form-control">
                                            <div class="form-group text-center" style="color:black;">
                                                <div class="col-md-6">
                                                    <span>Condicion de la respuesta:</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="radio-inline"><input type="radio" name="CondRes64[]" value="2">Correcta</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="padding-left: 8%;">
                                        <div class="col-md-5">
                                            <h3><span class="label label-default">Alternativa 3</span></h3>
                                            <input type="text" name="OpcRes64[]" class="form-control">
                                            <div class="form-group text-center" style="color:black;">
                                                <div class="col-md-6">
                                                    <span>Condicion de la respuesta:</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="radio-inline"><input type="radio" name="CondRes64[]" value="3">Correcta</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="Lista5" style="display:none;">
                                    <div class="text-center">
                                        <h3><span class="label label-warning">Lista 5</span></h3>
                                    </div>
                                    <div class="row" style="padding-left: 8%;">
                                        <div class="col-md-5">
                                            <h3><span class="label label-default">Alternativa 1</span></h3>
                                            <input type="text" name="OpcRes65[]" class="form-control">
                                            <div class="form-group text-center" style="color:black;">
                                                <div class="col-md-6">
                                                    <span>Condicion de la respuesta:</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="radio-inline"><input type="radio" name="CondRes65[]" value="1" checked>Correcta</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-md-offset-1">
                                            <h3><span class="label label-default">Alternativa 2</span></h3>
                                            <input type="text" name="OpcRes65[]" class="form-control">
                                            <div class="form-group text-center" style="color:black;">
                                                <div class="col-md-6">
                                                    <span>Condicion de la respuesta:</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="radio-inline"><input type="radio" name="CondRes65[]" value="2">Correcta</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="padding-left: 8%;">
                                        <div class="col-md-5">
                                            <h3><span class="label label-default">Alternativa 3</span></h3>
                                            <input type="text" name="OpcRes65[]" class="form-control">
                                            <div class="form-group text-center" style="color:black;">
                                                <div class="col-md-6">
                                                    <span>Condicion de la respuesta:</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="radio-inline"><input type="radio" name="CondRes65[]" value="3">Correcta</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="RespTip7" style="display:none;"><!---->
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Respuesta 1: </span></h3>
                                        <input type="text" name="OpcRes7[]" class="form-control">
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><span class="label label-default">Respuesta 2: </span></h3>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Respuesta 3: </span></h3>
                                        <input type="text" name="OpcRes7[]" class="form-control">
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <h3><span class="label label-default">Respuesta 4: </span></h3>
                                        <input type="text" name="OpcRes7[]" class="form-control">
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 8%;">
                                    <div class="col-md-5">
                                        <h3><span class="label label-default">Respuesta 5: </span></h3>
                                        <input type="text" name="OpcRes7[]" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3 col-md-offset-2">
                                        <button type="submit" class="form-control btn btn-success active" name="enviar">Agregar Pregunta</button>
                                    </div>
                                    <div class="col-md-3 col-md-offset-2">
                                        <a href="../Edit_Cuest.php" class="form-control btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span> Cancelar</a>
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
    <script type="text/javascript" src="../../../../../Funcionamiento/Javascripts/ver-foto.js"></script>
    <script type="text/javascript" src="../../../../../Funcionamiento/Javascripts/New_Preg.js"></script>
    <script type="text/javascript" src="../../../../../Funcionamiento/Javascripts/Crear_Curso.js"></script>
    <script type="text/javascript" src="../../../../../CmpVis/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script>
        $(function () 
        {
            document.getElementById('RMNo').checked=true;
        });
    </script>
</body>
</html>