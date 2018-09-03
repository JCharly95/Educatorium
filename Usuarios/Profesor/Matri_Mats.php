<?php
    require '../../Funcionamiento/PHPs/CMatri_Mats.php';
    require '../../Funcionamiento/PHPs/Prof_Reg_Mats.php';
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
        <title>Matriculacion</title>
    </head>
    <body>
        <div class="container">
            <div class="row title">
                <div class="col-md-8 col-md-offset-2">
                    <h3 align="center">Selecciona los campos solicitados</h3>
                </div>
                <div class="col-md-2">
                    <abbr title="Ayuda"><a href="#" id="help"><i class="fas fa-question-circle fa-4x"></i></a></abbr>
                </div>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="panel panel-primary">
                                <div class="panel-heading text-center">
                                    <h4>
                                        <span style="background-color: black; color: silver;">
                                            <i><u>&nbsp;¿En que grado se encuentra la o las materias a las que se va a registrar?:&nbsp;</u></i>
                                        </span>
                                    </h4>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 checkbox-inline col-md-offset-3">
                                                <label><input type="checkbox" id="Gra1" value="1" name="PriGrad" onclick="VerMaterias();"/><b>Primero</b></label>
                                            </div>
                                            <div class="col-md-2 checkbox-inline">
                                                <label><input type="checkbox" id="Gra2" value="2" name="SegGrad" onclick="VerMaterias();"/><b>Segundo</b></label>
                                            </div>
                                            <div class="col-md-2 checkbox-inline">
                                                <label><input type="checkbox" id="Gra3" value="2" name="TerGrad" onclick="VerMaterias();"/><b>Tercero</b></label>
                                            </div>
                                            <div class="col-md-3">
                                                <span class="error"><?php echo $Gr_err;?></span>
                                                <span class="bien"><?php echo $Gr_right;?></span>
                                            </div>
                                        </div>                                            
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-success">
                                <div class="panel-heading text-center">
                                    <h4>
                                        <span style="background-color: lightgreen; color: red;">
                                            <i><u>&nbsp;Seleccione las materias a las que planea inscribirse:&nbsp;</u></i>
                                        </span>
                                    </h4>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="row col-md-offset-1">
                                            <div class="col-md-3 checkbox-inline" id="PriGra" style="display: none;">
                                                <div class="panel panel-danger">
                                                    <div class="panel-heading text-center">
                                                        <span>Primero:</span>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <div class="checkbox-inline">
                                                                <label><input type="checkbox" id="SelPri" value="" onclick="SetPri();" <?php echo $CheckMul[0];?>/><b>Seleccionar todas</b></label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="checkbox-inline">
                                                                <label><input type="checkbox" name="Pri1" id="G11" value="Espa 1" <?php echo $StatusBox[0];?>/><b>Español I</b></label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="checkbox-inline">
                                                                <label><input type="checkbox" name="Pri2" id="G12" value="Mate 1" <?php echo $StatusBox[1];?>/><b>Matematicas I</b></label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="checkbox-inline">
                                                                <label><input type="checkbox" name="Pri3" id="G13" value="Biolo" <?php echo $StatusBox[2];?>/><b>Ciencias I: Biologia</b></label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="checkbox-inline">
                                                                <label><input type="checkbox" name="Pri4" id="G14" value="Geogra" <?php echo $StatusBox[3];?>/><b>Geografia</b></label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="checkbox-inline">
                                                                <label><input type="checkbox" name="Pri5" id="G15" value="Ingl 1" <?php echo $StatusBox[4];?>/><b>Ingles I</b></label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="checkbox-inline">
                                                                <label><input type="checkbox" name="Pri6" id="G16" value="CyE 11" <?php echo $StatusBox[5];?>/><b>Civica y Etica I: Parte I</b></label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="checkbox-inline">
                                                                <label><input type="checkbox" name="Pri7" id="G17" value="Hist 11" <?php echo $StatusBox[6];?>/><b>Historia I: Parte I</b></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 checkbox-inline" id="SecGra" style="display: none;">
                                                <div class="panel panel-danger">
                                                    <div class="panel-heading text-center">
                                                        <span>Segundo:</span>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <div class="checkbox-inline">
                                                                <label><input type="checkbox" id="SelSeg" value="" onclick="SetSeg();" <?php echo $CheckMul[1];?>/><b>Seleccionar todas</b></label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="checkbox-inline">
                                                                <label><input type="checkbox" name="Seg1" id="G21" value="Espa 2" <?php echo $StatusBox[7];?>/><b>Español II</b></label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="checkbox-inline">
                                                                <label><input type="checkbox" name="Seg2" id="G22" value="Mate 2" <?php echo $StatusBox[8];?>/><b>Matematicas II</b></label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="checkbox-inline">
                                                                <label><input type="checkbox" name="Seg3" id="G23" value="Fisica" <?php echo $StatusBox[9];?>/><b>Ciencias II: Fisica</b></label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="checkbox-inline">
                                                                <label><input type="checkbox" name="Seg4" id="G24" value="Ingl 2" <?php echo $StatusBox[10];?>/><b>Ingles II</b></label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="checkbox-inline">
                                                                <label><input type="checkbox" name="Seg5" id="G25" value="CyE 12" <?php echo $StatusBox[11];?>/><b>Civica y Etica I: Parte II</b></label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="checkbox-inline">
                                                                <label><input type="checkbox" name="Seg6" id="G26" value="Hist 12" <?php echo $StatusBox[12];?>/><b>Historia I: Parte II</b></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 checkbox-inline" id="TerGra" style="display: none;">
                                                <div class="panel panel-danger">
                                                    <div class="panel-heading text-center">
                                                        <span>Tercero:</span>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <div class="checkbox-inline">
                                                                <label><input type="checkbox" id="SelTer" value="" onclick="SetTer();" <?php echo $CheckMul[2];?>/><b>Seleccionar todas</b></label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="checkbox-inline">
                                                                <label><input type="checkbox" name="Ter1" id="G31" value="Espa 3" <?php echo $StatusBox[13];?>/><b>Español III</b></label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="checkbox-inline">
                                                                <label><input type="checkbox" name="Ter2" id="G32" value="Mate 3" <?php echo $StatusBox[14];?>/><b>Matematicas III</b></label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="checkbox-inline">
                                                                <label><input type="checkbox" name="Ter3" id="G33" value="Quimic" <?php echo $StatusBox[15];?>/><b>Ciencias III: Quimica</b></label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="checkbox-inline">
                                                                <label><input type="checkbox" name="Ter4" id="G34" value="Ingl 3" <?php echo $StatusBox[16];?>/><b>Ingles III</b></label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="checkbox-inline">
                                                                <label><input type="checkbox" name="Ter5" id="G35" value="CyE 2" <?php echo $StatusBox[17]?>/><b>Civica y Etica II</b></label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="checkbox-inline">
                                                                <label><input type="checkbox" name="Ter6" id="G36" value="Hist 2" <?php echo $StatusBox[18];?>/><b>Historia II</b></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <span class="error"><?php echo $Mat_err;?></span>
                                                <span class="bien"><?php echo $Mat_right;?></span>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="panel panel-body">
                                <div class="row">
                                    <div class="col-md-3 col-md-offset-3">
                                        <label class="btn btn-success">
                                            <input type="submit" name="enviar" style="display: none;">
                                            <i class="fas fa-check"></i> Confirmar seleccion y registrar
                                        </label>                                    
                                    </div>
                                    <div class="col-md-3 col-md-offset-2">
                                        <a href="#" class="btn btn-danger" onclick="window.location.replace('Principal_Prof.php')"><i class="fas fa-times"></i> Cancelar registro</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>            
        </div>
        <footer>
            @Copyright Educatorium 2018. Todos los derechos reservados
        </footer>
        <script type="text/javascript" src="../../CmpVis/jquery/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="../../Funcionamiento/Javascripts/Matri_Mats.js"></script>
        <script type="text/javascript" src="../../CmpVis/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    </body>
</html>