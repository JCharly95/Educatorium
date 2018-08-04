<?php
    require '../Funcionamiento/PHPs/CPriG.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../CmpVis/bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../CmpVis/fontawesome-free-5.0.10/web-fonts-with-css/css/fontawesome-all.css">
        <link rel="stylesheet" type="text/css" href="../Funcionamiento/Estilos_Extras/Pag_Pri_Est.css">
        <title>Primero</title>
    </head>
    <body>
        <div class="container"> 
            <div class="row title">
                <div class="col-md-10">
                    <h1 align="center">Seleccione la materia a la que desea acceder</h1>
                </div>
                <div class="col-md-2">
                    <abbr title="Ayuda"><a href="#" id="help" onclick="MostrarAyuda();"><i class="fas fa-question-circle fa-4x"></i></a></abbr>
                </div>
            </div>
            <br><br><br><br>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3 col-md-offset-1">
                        <a href="" class="btn btn-lg btn-warning" <?php echo $BtnMatsPri[0];?>>Español I</a>
                    </div>
                    <div class="col-md-3 col-md-offset-1">
                        <a href="" class="btn btn-lg btn-warning" <?php echo $BtnMatsPri[1];?>>Matematicas I</a>
                    </div>
                    <div class="col-md-3 col-md-offset-1">
                        <a href="" class="btn btn-lg btn-warning" <?php echo $BtnMatsPri[2];?>>Ciencias I: Biologia</a>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3 col-md-offset-1">
                        <a href="" class="btn btn-lg btn-warning" <?php echo $BtnMatsPri[3];?>>Geografia</a>
                    </div>
                    <div class="col-md-3 col-md-offset-1">
                        <a href="" class="btn btn-lg btn-warning" <?php echo $BtnMatsPri[4];?>>Ingles I</a>
                    </div>
                    <div class="col-md-3 col-md-offset-1">
                        <a href="" class="btn btn-lg btn-warning" <?php echo $BtnMatsPri[5];?>>Civica y Etica I: Parte I</a>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3 col-md-offset-5">
                        <a href="" class="btn btn-lg btn-warning" <?php echo $BtnMatsPri[6];?>>Historia I: Parte I</a>
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
        <script type="text/javascript" src="../CmpVis/jquery/jquery-3.3.1.js"></script>
	    <script type="text/javascript" src="../CmpVis/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    </body>
</html>