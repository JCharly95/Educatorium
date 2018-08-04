<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Registro</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../CmpVis/bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../CmpVis/fontawesome-free-5.0.10/web-fonts-with-css/css/fontawesome-all.css">
        <link rel="stylesheet" type="text/css" href="../Funcionamiento/Estilos_Extras/Registro.css">
    </head>
    <body>
        <div class="container">
            <div class="row title">
                <div class="col-md-10">
                    <h3 align="center">Es un gran honor para nosotros que te unas a nuestra comunidad virtual.</h3>
                </div>
               <!-- <div class="col-md-2">
                    <abbr title="Ayuda"><a href="#" id="help"><i class="fas fa-question-circle fa-4x"></i></a></abbr>
                </div>
            </div>-->
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
                                <h3 style="color: #fff;" class="text-center">Escoge qué tipo de usuario serás:</h3>
                                <ul class="nav nav-pills">
                                    <li class="active"><a data-toggle="pill" href="#est" style="color: #75a3a3;font-weight: 800;">Estudiante</a></li>
                                    <li><a data-toggle="pill" href="#prof" style="color: #75a3a3;font-weight: 800;">Profesor</a></li>
                                    <li><a data-toggle="pill" href="#pad" style="color: #75a3a3;font-weight: 800;">Padre/tutor</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="est" class="tab-pane fade in active">
                                        <h4 style="color: silver;">Estudiante</h4>
                                        <p style="color: lightblue;">Podrás acceder a cursos, realizar quiz por materia y consultar de manera gráfica tu progreso. Selecciona esta opción para responder el formulario correspondiente a los estudiantes.</p>
                                    </div>
                                    <div id="prof" class="tab-pane fade">
                                        <h4 style="color: silver;">Profesor</h4>
                                        <p style="color: lightblue;">Podrás crear cursos para tus alumnos, realizar distintos quiz por materia, subir material de apoyo, etc. Selecciona esta opción para responder el formulario correspondiente a los profesores.</p>
                                    </div>
                                    <div id="pad" class="tab-pane fade">
                                        <h4 style="color: silver;">Padre/Tutor</h4>
                                        <p style="color: lightblue;">Podrás ver de manera gráfica el progreso de tu hijo en cualquier materia que esté trabajando. Selecciona esta opción para responder el formulario correspondiente a los padres/tutores de familia.</p>
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
            <div class="panel panel-default">
                <div class="panel-body" style="background-color: lightseagreen;">
                    <form name="Select_User" action="" method="POST">
                        <div class="form-group">
                            <div class="panel panel-default">
                                <div class="panel-heading text-center">
                                    <span><i><u>¿Que tipo de usuario seras?</u></i></span>
                                </div>  
                                <div class="panel-body" style="background-color: aquamarine;">
                                    <div class="form-group">
                                        <br>
                                        <div class="row text-center">
                                            <div class="col-md-2 col-md-offset-1">
                                                <div class="radio" style="border: solid 3px red; background-color: crimson; color: gold;">
                                                    <label><input type="radio" name="Sel" value="Estudiante" onclick="Ver_User('Select_User','Sel');"/><b>Estudiante</b></label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-md-offset-2">
                                                <div class="radio" style="border: solid 3px black; background-color: #245580; color: white;">
                                                    <label><input type="radio" name="Sel" value="Profesor" onclick="Ver_User('Select_User','Sel');"/><b>Profesor</b></label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-md-offset-2">
                                                <div class="radio" style="border: solid 3px goldenrod; background-color: gold; color: darkblue;">
                                                    <label><input type="radio" name="Sel" value="Padre" onclick="Ver_User('Select_User','Sel');"/><b>Padre/Tutor</b></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div><br>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3 col-md-offset-5">
                                                <a href="#" class="btn btn-danger" onclick="window.location.replace('../index.php')"><i class="fas fa-times"></i><b>&nbsp;&nbsp; Cancelar registro</b></a>
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </form>
                </div>                
            </div>
        </div>
        <footer>
            @Copyright Educatorium 2018. Todos los derechos reservados
        </footer>
        <script type="text/javascript" src="../CmpVis/jquery/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="../CmpVis/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
        <script type="text/javascript" src="../Funcionamiento/Javascripts/User_Sel.js"></script>
    </body>
</html>