<?php
    session_start();
    require '../../../Funcionamiento/PHPs/Carga_Datos/Dat_Esc/CMaterias.php';
    $_SESSION['Mat']='Fisica';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../../../CmpVis/bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../../../CmpVis/fontawesome-free-5.0.10/web-fonts-with-css/css/fontawesome-all.css">
        <link rel="stylesheet" type="text/css" href="../../../Funcionamiento/Estilos_Extras/Pag_Pri_Est.css">
        <title>Ciencias 2: Fisica</title>
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
                <!--Cuerpo de la pagina-->
            <div class="form-group">
                <div class="col-md-3 col-md-offset-5 regreso">
                    <a href="../../SegundoGra.php" class="btn btn-danger" ><i class="fas fa-arrow-left"></i> Regresar</a>
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