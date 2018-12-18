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
        <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Open+Sans|Raleway|Roboto|Slabo+27px" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row title">
                <div class="col-md-10">
                    <h1 align="center" class="text-primary" style="font-family: 'Raleway', sans-serif;">Es un honor que te unas a nuestra comunidad virtual.</h1>
                </div>
                <div class="col-md-2">
                    <a data-toggle="modal" href="#ayuda"><i class="fas fa-question-circle fa-4x"></i></a>
                </div>
                <div id="ayuda" class="modal fade" role="dialog">
                    <div class="modal-dialog" style="padding-top: 50px;">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h2 class="modal-title text-danger text-center" style="font-family: 'Raleway',sans-serif;"><b>Ayuda</b></h2>
                          </div>
                            <div class="modal-body" style="background-color: #005e80;">
                                <h3 style="color: #fff;font-family: 'Lato', serif;" class="text-center">Escoge tu tipo de usuario:</h3>
                                <ul class="nav nav-pills nav-justified" style="background-color: #fff;border-radius: 5px;">
                                    <li class="active"><a data-toggle="pill" href="#est" style="color: #75a3a3;font-weight: 800;font-family: 'Open Sans', sans-serif;font-size: 16px;">Estudiante</a></li>
                                    <li><a data-toggle="pill" href="#prof" style="color: #75a3a3;font-weight: 800;font-family: 'Open Sans', sans-serif;font-size: 16px;">Profesor</a></li>
                                    <li><a data-toggle="pill" href="#pad" style="color: #75a3a3;font-weight: 800;font-family: 'Open Sans', sans-serif;font-size: 16px;">Padre/tutor</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="est" class="tab-pane fade in active">
                                        <h4 style="color: silver;font-family: 'Montserrat',sans-serif;">Estudiante</h4>
                                        <p style="color: #99ffcc;font-family: 'Montserrat',sans-serif;">Podrás acceder a cursos, realizar cuestionarios por materia y consultar de manera gráfica tu progreso. Selecciona esta opción para responder el formulario correspondiente a los estudiantes.</p>
                                    </div>
                                    <div id="prof" class="tab-pane fade">
                                        <h4 style="color: silver;font-family: 'Montserrat',sans-serif;">Profesor</h4>
                                        <p style="color: #99ffcc;font-family: 'Montserrat',sans-serif;">Podrás crear cursos para tus alumnos, realizar distintos cuestionarios por materia, subir material de apoyo como imágenes, presentaciones, etc. Selecciona esta opción para responder el formulario correspondiente a los profesores.</p>
                                    </div>
                                    <div id="pad" class="tab-pane fade">
                                        <h4 style="color: silver;font-family: 'Montserrat',sans-serif;">Padre/Tutor</h4>
                                        <p style="color: #99ffcc;font-family: 'Montserrat',sans-serif;">Podrás ver de manera gráfica el progreso de tu hijo en cualquier materia que esté trabajando. Selecciona esta opción para responder el formulario correspondiente a los padres/tutores de familia.</p>
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
            <div class="panel panel-default" style="box-shadow: 0 2px 2px 2px rgba(0,0,0,.3);">
                <div class="panel-body" style="background-color: lightseagreen;">
                    <form name="Select_User" action="" method="POST">
                        <div class="form-group">
                            <div class="panel panel-default">
                                <div class="panel-heading text-center">
                                    <h3 class="text-info" style="font-family: 'Open Sans', sans-serif;"><i><b>¿Qué tipo de usuario eres?</b></i></h3>
                                </div>  
                                <div class="panel-body" style="background-color: aquamarine;">
                                    <div class="form-group">
                                        <br>
                                        <div class="row text-center">
                                            <div class="col-md-2 " style="margin-left: 40px;">
                                                <div class="radio btn btn-danger" style="padding: 20px 20px;padding-left: 1px;">
                                                    <label><input type="radio" name="Sel" value="Estudiante" onclick="Ver_User('Select_User','Sel');" style="display: none;"/><h1 style="font-family: 'Montserrat', sans-serif;"><b>Estudiante</b></h1></label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-md-offset-2">
                                                <div class="radio btn btn-primary" style="padding: 20px 40px;padding-left: 30px;">
                                                    <label><input type="radio" name="Sel" value="Profesor" onclick="Ver_User('Select_User','Sel');"/ style="display: none;"><h1 style="font-family: 'Montserrat', sans-serif;"><b>Profesor</b></h1></label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-md-offset-2">
                                                <div class="radio btn btn-warning" style="padding: 20px 20px;padding-left: 10px;">
                                                    <label><input type="radio" name="Sel" value="Padre" onclick="Ver_User('Select_User','Sel');"/ style="display: none;"><h1 style="font-family: 'Montserrat', sans-serif;"><b>Padre/Tutor</b></h1></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div><br>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-3 col-md-offset-4">
                    <a href="#" class="btn btn-danger" style="padding: 5px 100px;" onclick="window.location.replace('../index.php')"><h4><b>&nbsp;&nbsp; Regresar</b></h4></a>
                </div>
            </div>   
        </div>
        <footer class="bg-info">
            <p class="text-center text-info" style="font-family: 'Raleway', sans-serif;"><b>@Copyright Educatorium 2018. Todos los derechos reservados</b></p> 
        </footer>
        <script type="text/javascript" src="../CmpVis/jquery/jquery-3.3.1.js"></script>
    	<script type="text/javascript" src="../CmpVis/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
        <script type="text/javascript" src="../Funcionamiento/Javascripts/User_Sel.js"></script>
    </body>
</html>