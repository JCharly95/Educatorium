<!DOCTYPE html>
<html>
    <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="CmpVis/bootstrap-3.3.7-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="CmpVis/fontawesome-free-5.0.10/web-fonts-with-css/css/fontawesome-all.css">
        <link rel="stylesheet" type="text/css" href="Funcionamiento/Estilos_Extras/Pag_Info.css">
        <title>Plan de Estudios</title>
    </head>
    <body>
        <div class="container">
            <div class="form-group">
                <div class="panel panel-default" style="border: none;">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-10">
                                <h3 align="center">A continuaci&oacute;n veras la estructura que conforma el 
                                    plan de estudios de Educatorium</h3>
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
                                            <div class="panel panel-default" style="border: none;">
                                                <div class="panel-heading text-center">
                                                    Para ver la lista de materias que conforma a cada grado puedes dar un clic en el grado <br>
                                                    <b>&oacute;</b> <br> presionar el icono: <i class="far fa-caret-square-down fa-2x"></i> ubicado a la derecha del grado
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success" data-dismiss="modal">Entendido</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
            <div class="form-group">
                <div class="panel panel-default" style="border: none;">
                    <div class="panel-body">
                        <div class="row" style="margin-left: 7%;">
                            <div class="col-md-3 text-center">
                                <div class="form-group">
                                    <select class="selectpicker btn btn-default">
                                        <optgroup label="Primer Grado">
                                            <option hidden>Primer Grado</option>
                                            <option disabled>Español I</option>
                                            <option disabled>Matematicas I</option>
                                            <option disabled>Ciencias I: Biologia</option>
                                            <option disabled>Geografia</option>
                                            <option disabled>Ingles I</option>
                                            <option disabled>Civica y Etica I: Parte I</option>
                                            <option disabled>Historia I: Parte I</option>
                                        </optgroup>
                                    </select>                               
                                </div>
                                <i class="far fa-hand-pointer fa-2x"></i><br><p class="label label-default">Clic arriba para ver las materias</p>
                            </div>
                            <div class="col-md-3 col-md-offset-1 text-center">
                                <div class="form-group">
                                    <select class="selectpicker btn btn-default">
                                        <optgroup label="Segundo Grado">
                                            <option hidden>Segundo Grado</option>
                                            <option disabled>Español II</option>
                                            <option disabled>Matematicas II</option>
                                            <option disabled>Ciencias II: Fisica</option>
                                            <option disabled>Ingles II</option>
                                            <option disabled>Civica y Etica I: Parte II</option>
                                            <option disabled>Historia I: Parte II</option>
                                        </optgroup>
                                    </select>
                                </div>                                
                                <i class="far fa-hand-pointer fa-2x"></i><br><p class="label label-default">Clic arriba para ver las materias</p>
                            </div>
                            <div class="col-md-3 col-md-offset-1 text-center">
                                <div class="form-group">
                                    <select class="selectpicker btn btn-default">
                                        <optgroup label="Tercer Grado">
                                            <option hidden>Tercer Grado</option>
                                            <option disabled>Español III</option>
                                            <option disabled>Matematicas III</option>
                                            <option disabled>Ciencias III: Quimica</option>
                                            <option disabled>Ingles III</option>
                                            <option disabled>Civica y Etica II</option>
                                            <option disabled>Historia II</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <i class="far fa-hand-pointer fa-2x"></i><br><p class="label label-default">Clic arriba para ver las materias</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="panel panel-default" style="border: none;">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-5">
                                    <a href="#" class="btn btn-success" onclick="window.location.replace('index.php')"><i class="fas fa-arrow-circle-left fa-2x"></i>&nbsp; Regresar a la informacion</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
	</div>
        <script type="text/javascript" src="CmpVis/jquery/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="CmpVis/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    </body>
</html>