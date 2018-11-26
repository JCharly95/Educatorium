<?php
    require '../../Funcionamiento/PHPs/Carga_Datos/CPregunta.php';
    require '../../Funcionamiento/PHPs/Sav_Preg.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../CmpVis/bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../CmpVis/fontawesome-free-5.0.10/web-fonts-with-css/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="../../Funcionamiento/Estilos_Extras/Registro.css">
    <title>Primero</title>
</head>
<body>
    <div class="container">
        <div class="row title">
            <div class="col-md-10">
                <h1 align="center" style="padding-left: 5.5em;">Pregunta <?php echo $Num_Preg; ?></h1>
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
                        <div class="modal-body" style="background-color: teal;">
                            <h3 style="color: #fff;" class="text-center">¿Cómo puedo registrarme?</h3>
                            <p style="color: gold;" class="lead">Para poder registrarte, da clic en el botón que dice: Nuevo.</p>
                            <h3 style="color: #fff;" class="text-center">¿Cómo puedo iniciar sesión?</h3>
                            <p style="color: gold;" class="lead">Para iniciar sesión, da clic en el botón que dice: Registrado.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Entendido</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <div class="form-group" id="PregTip1" style="margin-left: 8%; margin-right: 8%; <?php echo $View_Pregs[0]; ?>"><!---->
                <div class="text-center">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3>¿<?php echo $Preg;?>?</h3>
                        </div>
                        <div class="panel-body">
                            <?php
                                for($fils=0;$fils<count($Cursos);$fils++)
                                {
                                    echo '<div class="form-group">'.
                                            '<div class="row">';
                                            echo '<div class="col-md-8 col-md-offset-2" style="border: 2px solid black; border-radius: 15px; background-color: lime;">'.
                                                    '<input type="radio" name="CurSelDel" id="CurSel'.$fils.'" style="display: none;" value="'.$Cursos[$fils][0].'">'.
                                                    '<label for="CurSel'.$fils.'">'.$Cursos[$fils][1].'</label>'.
                                                '</div>';
                                    echo    '</div>'.
                                    '</div>';
                                }
                            ?>
                            <div class="form-group row">
                                <?php
                                    for()
                                    for($fils=0;$fils<count($Preguntas)/7;$fils++)
                                    {
                                        for($cols=0;$cols<=1;$cols++)
                                        {
                                            echo '<div class="col-md-6">';
                                                echo '<div class="col-md-8 col-md-offset-2" style="border: 2px solid black; border-radius: 15px; background-color: lime;">';
                                                echo '<input type="radio" name="ResPregTip1[]" id="Res1Preg'.$Alterns[$cols].'" style="display:none;" value="'.$Alterns[$cols].'">';
                                                echo '<label for="Res1Preg'.$Alterns[$cols].'">&nbsp;&nbsp; '.$Alterns[$cols].'&nbsp;&nbsp;</label>';
                                            echo '</div>
                                            </div>';
                                        }
                                    }
                                ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="col-md-8 col-md-offset-2" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <input type="radio" name="ResPregTip1[]" id="Res3Preg1" style="display:none;" value="<?php echo $Alterns[2]; ?>">
                                        <label for="Res3Preg1">&nbsp;&nbsp;C) <?php echo $Alterns[2]; ?>&nbsp;&nbsp;</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-8 col-md-offset-2" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <input type="radio" name="ResPregTip1[]" id="Res4Preg1" style="display:none;" value="<?php echo $Alterns[3]; ?>">
                                        <label for="Res4Preg1">&nbsp;&nbsp;D) <?php echo $Alterns[3]; ?>&nbsp;&nbsp;</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="col-md-8 col-md-offset-2">
                                        <label class="btn btn-success">
                                            <input type="submit" name="enviar" id="send" style="display: none;">
                                            <i class="fas fa-check"></i> Enviar respuesta y continuar
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-8 col-md-offset-2">
                                        <button type="button" class="btn btn-danger" onclick="CleanResp('ResPregTip1[]');">
                                            <i class="fas fa-times"></i> Limpiar respuestas
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group" id="PregTip2" style="margin-left: 8%; margin-right: 8%; <?php echo $View_Pregs[1]; ?>"><!---->
                <div class="text-center">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3>¿Selecciona las especialidades del Ceti Colomos?</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="col-md-8 col-md-offset-2" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <input type="checkbox" name="ResPregTip2[]" id="Res1Preg2" style="display:none;" value="">
                                        <label for="Res1Preg2">&nbsp;&nbsp;A) Respuesta 1&nbsp;&nbsp;</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-8 col-md-offset-2" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <input type="checkbox" name="ResPregTip2[]" id="Res2Preg2" style="display:none;" value="">
                                        <label for="Res2Preg2">&nbsp;&nbsp;B) Respuesta 2&nbsp;&nbsp;</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="col-md-8 col-md-offset-2" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <input type="checkbox" name="ResPregTip2[]" id="Res3Preg2" style="display:none;" value="">
                                        <label for="Res3Preg2">&nbsp;&nbsp;C) Respuesta 3&nbsp;&nbsp;</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-8 col-md-offset-2" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <input type="checkbox" name="ResPregTip2[]" id="Res4Preg2" style="display:none;" value="">
                                        <label for="Res4Preg2">&nbsp;&nbsp;D) Respuesta 4&nbsp;&nbsp;</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="col-md-8 col-md-offset-2" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <input type="checkbox" name="ResPregTip2[]" id="Res5Preg2" style="display:none;" value="">
                                        <label for="Res5Preg2">&nbsp;&nbsp;E) Respuesta 5&nbsp;&nbsp;</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-8 col-md-offset-2" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <input type="checkbox" name="ResPregTip2[]" id="Res6Preg2" style="display:none;" value="">
                                        <label for="Res6Preg2">&nbsp;&nbsp;F) Respuesta 6&nbsp;&nbsp;</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="col-md-8 col-md-offset-2" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <input type="checkbox" name="ResPregTip2[]" id="Res7Preg2" style="display:none;" value="">
                                        <label for="Res7Preg2">&nbsp;&nbsp;G) Respuesta 7&nbsp;&nbsp;</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="col-md-8 col-md-offset-2">
                                        <label class="btn btn-success">
                                            <input type="submit" name="enviar" id="send" style="display: none;">
                                            <i class="fas fa-check"></i> Enviar respuesta y continuar
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-8 col-md-offset-2">
                                        <button type="button" class="btn btn-danger" onclick="CleanResp('ResPregTip2[]');">
                                            <i class="fas fa-times"></i> Limpiar respuestas
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group" id="PregTip3" style="margin-left: 8%; margin-right: 8%; <?php echo $View_Pregs[2]; ?>">
                <div class="text-center">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3>¿Es cierto que este proyecto funcionara?</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="col-md-8 col-md-offset-2" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <input type="radio" name="ResPregTip3[]" id="Res1Preg3" style="display:none;" value="Cierto">
                                        <label for="Res1Preg3">&nbsp;&nbsp;A) &nbsp;&nbsp;</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-8 col-md-offset-2" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <input type="radio" name="ResPregTip3[]" id="Res2Preg3" style="display:none;"  value="Falso">
                                        <label for="Res2Preg3">&nbsp;&nbsp;B) &nbsp;&nbsp;</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="col-md-8 col-md-offset-2">
                                        <label class="btn btn-success">
                                            <input type="submit" name="enviar" id="send" style="display: none;">
                                            <i class="fas fa-check"></i> Enviar respuesta y continuar
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-8 col-md-offset-2">
                                        <button type="button" class="btn btn-danger" onclick="CleanResp('ResPregTip3[]');">
                                            <i class="fas fa-times"></i> Limpiar respuestas
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group" id="PregTip4" style="margin-left: 8%; margin-right: 8%; <?php echo $View_Pregs[3]; ?>"><!---->
                <div class="text-center">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3>Relacione especialidad con actividad</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="col-md-4 col-md-offset-4" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <label>&nbsp;&nbsp;A) Columna 1&nbsp;&nbsp;</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-5 col-md-offset-3" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <select class="btn btn-danger" name="ResPregTip4[]" id="Opc1Preg4">
                                            <option value="">Alternativa 1</option>
                                            <option value="">Alternativa 2</option>
                                            <option value="">Alternativa 3</option>
                                            <option value="">Alternativa 4</option>
                                            <option value="">Alternativa 5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="col-md-4 col-md-offset-4" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <label>&nbsp;&nbsp;B) Columna 2&nbsp;&nbsp;</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-5 col-md-offset-3" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <select class="btn btn-danger" name="ResPregTip4[]" id="Opc2Preg4">
                                            <option value="">Alternativa 1</option>
                                            <option value="">Alternativa 2</option>
                                            <option value="">Alternativa 3</option>
                                            <option value="">Alternativa 4</option>
                                            <option value="">Alternativa 5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="col-md-4 col-md-offset-4" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <label>&nbsp;&nbsp;C) Columna 3&nbsp;&nbsp;</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-5 col-md-offset-3" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <select class="btn btn-danger" name="ResPregTip4[]" id="Opc3Preg4">
                                            <option value="">Alternativa 1</option>
                                            <option value="">Alternativa 2</option>
                                            <option value="">Alternativa 3</option>
                                            <option value="">Alternativa 4</option>
                                            <option value="">Alternativa 5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="col-md-4 col-md-offset-4" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <label>&nbsp;&nbsp;D) Columna 4&nbsp;&nbsp;</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-5 col-md-offset-3" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <select class="btn btn-danger" name="ResPregTip4[]" id="Opc4Preg4">
                                            <option value="">Alternativa 1</option>
                                            <option value="">Alternativa 2</option>
                                            <option value="">Alternativa 3</option>
                                            <option value="">Alternativa 4</option>
                                            <option value="">Alternativa 5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="col-md-4 col-md-offset-4" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <label>&nbsp;&nbsp;E) Columna 5&nbsp;&nbsp;</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-5 col-md-offset-3" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <select class="btn btn-danger" name="ResPregTip4[]" id="Opc5Preg4">
                                            <option value="">Alternativa 1</option>
                                            <option value="">Alternativa 2</option>
                                            <option value="">Alternativa 3</option>
                                            <option value="">Alternativa 4</option>
                                            <option value="">Alternativa 5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="col-md-8 col-md-offset-2">
                                        <label class="btn btn-success">
                                            <input type="submit" name="enviar" id="send" style="display: none;">
                                            <i class="fas fa-check"></i> Enviar respuestas y continuar
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group" id="PregTip5" style="margin-left: 8%; margin-right: 8%; <?php echo $View_Pregs[4]; ?>"><!---->
                <div class="text-center">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3>Ordena de mas antiguo a mas nuevo los eventos</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="col-md-4 col-md-offset-4" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <label>&nbsp;&nbsp;A) Suceso 1&nbsp;&nbsp;</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-5 col-md-offset-3" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <select class="btn btn-danger" name="ResPregTip5[]" id="Opc1Preg5">
                                            <option value="">Posicion 1</option>
                                            <option value="">Posicion 2</option>
                                            <option value="">Posicion 3</option>
                                            <option value="">Posicion 4</option>
                                            <option value="">Posicion 5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="col-md-4 col-md-offset-4" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <label>&nbsp;&nbsp;B) Suceso 2&nbsp;&nbsp;</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-5 col-md-offset-3" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <select class="btn btn-danger" name="ResPregTip5[]" id="Opc2Preg5">
                                            <option value="">Posicion 1</option>
                                            <option value="">Posicion 2</option>
                                            <option value="">Posicion 3</option>
                                            <option value="">Posicion 4</option>
                                            <option value="">Posicion 5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="col-md-4 col-md-offset-4" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <label>&nbsp;&nbsp;C) Suceso 3&nbsp;&nbsp;</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-5 col-md-offset-3" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <select class="btn btn-danger" name="ResPregTip5[]" id="Opc3Preg5">
                                            <option value="">Posicion 1</option>
                                            <option value="">Posicion 2</option>
                                            <option value="">Posicion 3</option>
                                            <option value="">Posicion 4</option>
                                            <option value="">Posicion 5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="col-md-4 col-md-offset-4" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <label>&nbsp;&nbsp;D) Suceso 4&nbsp;&nbsp;</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-5 col-md-offset-3" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <select class="btn btn-danger" name="ResPregTip5[]" id="Opc4Preg5">
                                            <option value="">Posicion 1</option>
                                            <option value="">Posicion 2</option>
                                            <option value="">Posicion 3</option>
                                            <option value="">Posicion 4</option>
                                            <option value="">Posicion 5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="col-md-4 col-md-offset-4" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <label>&nbsp;&nbsp;E) Suceso 5&nbsp;&nbsp;</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-5 col-md-offset-3" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <select class="btn btn-danger" name="ResPregTip5[]" id="Opc5Preg5">
                                            <option value="">Posicion 1</option>
                                            <option value="">Posicion 2</option>
                                            <option value="">Posicion 3</option>
                                            <option value="">Posicion 4</option>
                                            <option value="">Posicion 5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="col-md-8 col-md-offset-2">
                                        <label class="btn btn-success">
                                            <input type="submit" name="enviar" id="send" style="display: none;">
                                            <i class="fas fa-check"></i> Enviar respuestas y continuar
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group" id="PregTip6" style="margin-left: 8%; margin-right: 8%; <?php echo $View_Pregs[5]; ?>"><!---->
                <div class="text-center">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3>Camaron que se _ se lo lleva la _</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="col-md-4 col-md-offset-4" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <div class="form-group row" style="padding-top:5%;">
                                            <label>&nbsp;&nbsp;Completar 1&nbsp;&nbsp;</label>
                                        </div>
                                        <div class="form-group row">
                                            <select class="btn btn-danger" name="ResPregTip6L1" id="Lista1Preg6">
                                                <option value="">Alternativa 1</option>
                                                <option value="">Alternativa 2</option>
                                                <option value="">Alternativa 3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-4 col-md-offset-4" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <div class="form-group row" style="padding-top:5%;">
                                            <label>&nbsp;&nbsp;Completar 2&nbsp;&nbsp;</label>
                                        </div>
                                        <div class="form-group row">
                                            <select class="btn btn-danger" name="ResPregTip6L2" id="Lista2Preg6">
                                                <option value="">Alternativa 1</option>
                                                <option value="">Alternativa 2</option>
                                                <option value="">Alternativa 3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="col-md-4 col-md-offset-4" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <div class="form-group row" style="padding-top:5%;">
                                            <label>&nbsp;&nbsp;Completar 3&nbsp;&nbsp;</label>
                                        </div>
                                        <div class="form-group row">
                                            <select class="btn btn-danger" name="ResPregTip6L3" id="Lista3Preg6">
                                                <option value="">Alternativa 1</option>
                                                <option value="">Alternativa 2</option>
                                                <option value="">Alternativa 3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-4 col-md-offset-4" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <div class="form-group row" style="padding-top:5%;">
                                            <label>&nbsp;&nbsp;Completar 4&nbsp;&nbsp;</label>
                                        </div>
                                        <div class="form-group row">
                                            <select class="btn btn-danger" name="ResPregTip6L4" id="Lista4Preg6">
                                                <option value="">Alternativa 1</option>
                                                <option value="">Alternativa 2</option>
                                                <option value="">Alternativa 3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="col-md-4 col-md-offset-4" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <div class="form-group row" style="padding-top:5%;">
                                            <label>&nbsp;&nbsp;Completar 5&nbsp;&nbsp;</label>
                                        </div>
                                        <div class="form-group row">
                                            <select class="btn btn-danger" name="ResPregTip6L5" id="Lista5Preg6">
                                                <option value="">Alternativa 1</option>
                                                <option value="">Alternativa 2</option>
                                                <option value="">Alternativa 3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="col-md-8 col-md-offset-2">
                                        <label class="btn btn-success">
                                            <input type="submit" name="enviar" id="send" style="display: none;">
                                            <i class="fas fa-check"></i> Enviar respuesta y continuar
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group" id="PregTip7" style="margin-left: 8%; margin-right: 8%; <?php echo $View_Pregs[6]; ?>"><!---->
                <div class="text-center">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3>Que tanto te gusta este curso</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="col-md-8 col-md-offset-2" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <input type="checkbox" name="ResPregTip7[]" id="Res1Preg7" style="display:none;" value="">
                                        <label for="Res1Preg7">&nbsp;&nbsp;Respuesta 1&nbsp;&nbsp;</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-8 col-md-offset-2" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <input type="checkbox" name="ResPregTip7[]" id="Res2Preg7" style="display:none;" value="">
                                        <label for="Res2Preg7">&nbsp;&nbsp;Respuesta 2&nbsp;&nbsp;</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="col-md-8 col-md-offset-2" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <input type="checkbox" name="ResPregTip7[]" id="Res3Preg7" style="display:none;" value="">
                                        <label for="Res3Preg7">&nbsp;&nbsp;Respuesta 3&nbsp;&nbsp;</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-8 col-md-offset-2" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <input type="checkbox" name="ResPregTip7[]" id="Res4Preg7" style="display:none;" value="">
                                        <label for="Res4Preg7">&nbsp;&nbsp;Respuesta 4&nbsp;&nbsp;</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="col-md-8 col-md-offset-2" style="border: 2px solid black; border-radius: 15px; background-color: lime;">
                                        <input type="checkbox" name="ResPregTip7[]" id="Res5Preg7" style="display:none;" value="">
                                        <label for="Res5Preg7">&nbsp;&nbsp;Respuesta 5&nbsp;&nbsp;</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="col-md-8 col-md-offset-2">
                                        <label class="btn btn-success">
                                            <input type="submit" name="enviar" id="send" style="display: none;">
                                            <i class="fas fa-check"></i> Enviar respuesta y continuar
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-8 col-md-offset-2">
                                        <button type="button" class="btn btn-danger" onclick="CleanResp('ResPregTip7[]');">
                                            <i class="fas fa-times"></i> Limpiar respuestas
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script type="text/javascript" src="../../CmpVis/jquery/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../../Funcionamiento/Javascripts/View_Preg.js"></script>
    <script type="text/javascript" src="../../CmpVis/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
</body>
</html>