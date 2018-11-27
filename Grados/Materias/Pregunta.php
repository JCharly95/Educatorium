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
                            <h3>¿<?php echo $Text_Preg[0];?>?</h3>
                        </div>
                        <div class="panel-body">
                            <?php
                                for($fils=0;$fils<count($Alterns)/2;$fils++)
                                {
                                    echo '<div class="form-group">'.
                                            '<div class="row">';
                                        for($cols=$fils*2,$cont=0;$cont<=1;$cols++,$cont++)
                                        {
                                            if($cols==count($Alterns))
                                            {
                                                break;
                                            }
                                            echo '<div class="col-md-3 col-md-offset-2" style="border: 2px solid black; border-radius: 15px; background-color: lime;">'.
                                                    '<input type="radio" name="ResPregTip1[]" id="Res'.($cols+1).'Preg'.($fils+1).'" style="display: none;" value="'.$Alterns[$cols].'">'.
                                                    '<label for="Res'.($cols+1).'Preg'.($fils+1).'">'.$Alterns[$cols].'</label>'.
                                                '</div>';
                                        }
                                    echo    '</div>'.
                                        '</div>';
                                }
                            ?>
                            <br>
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
                            <h3>¿<?php echo $Text_Preg[1];?>?</h3>
                        </div>
                        <div class="panel-body">
                            <?php
                                for($fils=0;$fils<count($Alterns)/2;$fils++)
                                {
                                    echo '<div class="form-group">'.
                                            '<div class="row">';
                                        for($cols=$fils*2,$cont=0;$cont<=1;$cols++,$cont++)
                                        {
                                            if($cols==count($Alterns))
                                            {
                                                break;
                                            }
                                            echo '<div class="col-md-3 col-md-offset-2" style="border: 2px solid black; border-radius: 15px; background-color: lime;">'.
                                                    '<input type="radio" name="ResPregTip2[]" id="Res'.($cols+1).'Preg'.($fils+1).'" style="display: none;" value="'.$Alterns[$cols].'">'.
                                                    '<label for="Res'.($cols+1).'Preg'.($fils+1).'">'.$Alterns[$cols].'</label>'.
                                                '</div>';
                                        }
                                    echo    '</div>'.
                                        '</div>';
                                }
                            ?>
                            <br>
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
            <div class="form-group" id="PregTip3" style="margin-left: 8%; margin-right: 8%; <?php echo $View_Pregs[2]; ?>">
                <div class="text-center">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3>¿<?php echo $Text_Preg[2];?>?</h3>
                        </div>
                        <div class="panel-body">
                            <?php
                                for($fils=0;$fils<count($Alterns)/2;$fils++)
                                {
                                    echo '<div class="form-group">'.
                                            '<div class="row">';
                                        for($cols=$fils*2,$cont=0;$cont<=1;$cols++,$cont++)
                                        {
                                            if($cols==count($Alterns))
                                            {
                                                break;
                                            }
                                            echo '<div class="col-md-3 col-md-offset-2" style="border: 2px solid black; border-radius: 15px; background-color: lime;">'.
                                                    '<input type="radio" name="ResPregTip3[]" id="Res'.($cols+1).'Preg'.($fils+1).'" style="display: none;" value="'.$Alterns[$cols].'">'.
                                                    '<label for="Res'.($cols+1).'Preg'.($fils+1).'">'.$Alterns[$cols].'</label>'.
                                                '</div>';
                                        }
                                    echo    '</div>'.
                                        '</div>';
                                }
                            ?>
                            <br>
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
            <div class="form-group" id="PregTip4" style="margin-left: 8%; margin-right: 8%; <?php echo $View_Pregs[3]; ?>"><!---->
                <div class="text-center">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3>¿<?php echo $Text_Preg[3];?>?</h3>
                        </div>
                        <div class="panel-body">
                            <?php
                                for($fils=0;$fils<count($AlternsIzq)/2;$fils++)
                                {
                                    echo '<div class="form-group">'.
                                            '<div class="row">';
                                        for($cols=$fils*2,$cont=0;$cont<=1;$cols++,$cont++)
                                        {
                                            if($cols==count($AlternsIzq))
                                            {
                                                break;
                                            }
                                            echo '<div class="col-md-2 col-md-offset-2" style="border: 2px solid black; border-radius: 15px; background-color: lime;">'.
                                                    '<label>'.$AlternsIzq[$cols].'</label>'.
                                                '</div>';
                                            echo '<div class="col-md-3 col-md-offset-3" style="border: 2px solid black; border-radius: 15px; background-color: lime;">'.
                                                    '<select class="btn btn-danger" name="Res'.$cols.'PregTip4[]" id="Opc'.$cols.'Preg'.$fils.'">';
                                                for($ColDer=0;$ColDer<count($AlternsDer);$ColDer++)
                                                {
                                                    echo '<option value="">'.$AlternsDer[$ColDer].'</option>';
                                                }
                                                echo'<select/>'.
                                                '</div>';
                                        }
                                    echo    '</div>'.
                                        '</div>';
                                }
                            ?>
                            <br>
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
                            <h3>¿<?php echo $Text_Preg[4];?>?</h3>
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
                            <h3>¿<?php echo $Text_Preg[5];?>?</h3>
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
                            <h3>¿<?php echo $Text_Preg[6];?>?</h3>
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