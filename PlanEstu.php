<!DOCTYPE html>
<html>
    <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="CmpVis/bootstrap-3.3.7-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="CmpVis/fontawesome-free-5.0.10/web-fonts-with-css/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="Funcionamiento/Estilos_Extras/Plan_Estudios.css">
    <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Open+Sans|Raleway|Roboto|Slabo+27px" rel="stylesheet">
       <title>Plan de Estudios</title>
    </head>
    <body>
        <div class="jumbotron">
            <div class="row">
                <div class="col-lg-10 col-md-10">
                  <h2 class="text-center">Esta es la estructura que conforma el plan de estudios de Educatorium</h2>  
                </div>
                <div class="col-lg-2 col-md-2">
                    <a data-toggle="modal" href="#ayuda" class="ayuda" title="Ayuda"><i class="fas fa-question-circle fa-4x"></i></a>
                </div>
            </div>
        </div>
                <div id="ayuda" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title text-danger text-center"><b>¿Necesitas ayuda?</b></h2>
                            </div>
                            <div class="modal-body">
                                <div class="panel-heading">
                                    <p class="text-center mod">Para visualizar la jerarquía de cada grado, es necesario pasar el cursor sobre cada uno de los cuadros. </p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Entendido</button>
                            </div>
                        </div>
                    </div>
                </div>
<br>
    <div class="container">
        <div class="carta">
            <div class="lado frente" id="uno-frente">
                <h1>1</h1>
            </div>
            <div class="lado atras" id="uno-atras">
                <h3>PRIMER GRADO</h3>
                <p>Español I</p>
                <p>Matemáticas I</p>
                <p>Ciencias I: Biología</p>
                <p>Geografía</p>
                <p>Inglés I</p>
                <p>Cívica y Ética I: Parte I</p>
                <p>Historia I: Parte I</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="carta">
            <div class="lado frente" id="dos-frente">
                <h1>2</h1>
            </div>
            <div class="lado atras" id="dos-atras">
                <h3>SEGUNDO GRADO</h3>
                <p>Español II</p>
                <p>Matemáticas II</p>
                <p>Ciencias II: Física</p>
                <p>Inglés II</p>
                <p>Cívica y Ética I: Parte II</p>
                <p>Historia I: Parte II</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="carta">
            <div class="lado frente" id="tres-frente">
                <h1>3</h1>
            </div>
            <div class="lado atras" id="tres-atras">
                <h3>TERCER GRADO</h3>
                <p>Español III</p>
                <p>Matemáticas III</p>
                <p>Ciencias III: Química</p>
                <p>Inglés III</p>
                <p>Cívica y Ética II</p>
                <p>Historia II</p>
            </div>
        </div>
    </div>
        <div class="boton col-lg-offset-5">
            <a href="#" class="btn btn-primary" onclick="window.location.replace('index.php')"><i class="fas fa-arrow-circle-left fa-1x"></i> Haz clic para retroceder</a>
        </div>
    <script type="text/javascript" src="CmpVis/jquery/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="CmpVis/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    </body>
</html>