<!DOCTYPE html>
<html>
    <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="CmpVis/bootstrap-3.3.7-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="CmpVis/fontawesome-free-5.0.10/web-fonts-with-css/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="Funcionamiento/Estilos_Extras/Pag_Info.css">
    <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Open+Sans|Raleway|Roboto|Slabo+27px" rel="stylesheet">
    <title>Pagina Informativa</title>
    </head>
    <body>
        <div class="container">
            <div class="panel panel-info" style="box-shadow: 0 1px 1px 1px rgba(0,0,0,.3);padding-bottom: 7px;">
                <div class="panel-heading">
                    <div class="col-md-10">
                        <h1 align="center" style="font-family: 'Raleway', sans-serif;">Hola que tal, bienvenido a Educatorium</h1></div>
                        <a data-toggle="modal" href="#ayuda"><i class="fas fa-question-circle fa-4x"></i></a>
                    </div>
                    <div class="panel-body">
                        <div id="ayuda" class="modal fade" role="dialog">
                            <div class="modal-dialog" style="padding-top: 60px;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title text-danger text-center" style="font-family: 'Raleway', sans-serif;"><b>Ayuda</b></h2>
                                    </div>
                                    <div class="modal-body" style="background-color: #005e80;">
                                        <h3 style="color: #fff;font-family: 'Lato', serif;" class="text-center">¿Cómo puedo registrarme?</h3>
                                        <h4 style="color: #99ffcc;font-family: 'Roboto', sans-serif;" class="text-justify">Para registrarte, debes ir hasta el final de la página donde verás un botón verde que dice 'Nuevo'. Haz clic si quieres crear una nueva cuenta.</h4>
                                        <h3 style="color: #fff;font-family: 'Lato', sans-serif;" class="text-center">¿Cómo puedo iniciar sesión?</h3>
                                        <h4 style="color: #99ffcc;font-family: 'Roboto', sans-serif;" class="text-justify">Para iniciar sesión, debes ir hasta el final de la págia donde verás un botón amarillo que dice 'Iniciar Sesión'. Haz clic si quieres ingresar a tu cuenta.</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Entendido</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h4 class="text-center" style="padding: 20px;line-height: 1.5;font-family: 'Open Sans', sans-serif;">Te damos la bienvenida a nuestra aplicación web de trabajo creada para las 
                        comunidades estudiantiles de secundaria. Dentro de educatorium encontrarás
                        pequeños cursos creados por profesores, diseñados para complementar el
                        aprendizaje proporcionado en las aulas, pero de una forma más concisa a través
                        de la realización de cuestionarios. </h4>
                    <div>
                        <h4 class="text-center" style="padding: 20px;line-height: 1.5;font-family: 'Open Sans', sans-serif;">Nuestros cursos están clasificados en base a las materias que se cursan en cada
                        grado, esto según el catálogo de libros digitales de la <strong class="bg-danger text-danger">Secretaría de Educación 
                        Pública.</strong></h4>
                    <div class="row">
                        <div class="col-md-6">
                        <h4 class="text-center" style="padding: 20px;line-height: 1.5;font-family: 'Open Sans', sans-serif;">Para consultar el catálogo completo de libros de texto de la SEP, favor de consultar el siguiente enlace:</h4>
                        <a href="https://secundaria.conaliteg.gob.mx/content/common/consulta-libros-gb/" class=" btn btn-danger" target="_blank" style="margin-left: 40px;padding: 10px;font-family: 'Roboto', sans-serif;font-size: 18px;"><i class="fas fa-book-open fa-1x"></i> Catálogo Digital de Libros para Secundaria de la SEP
                        </a>
                    </div>
                    <div class="col-md-6">
                        <h4 class="text-center" style="padding: 20px;line-height: 1.5;font-family: 'Open Sans', sans-serif;">Si deseas conocer la estructura de nuestro plan de estudios, te invitamos a dar clic en el siguiente enlace:</h4>
                        <a href="PlanEstu.php" class=" btn btn-primary" style="margin-left: 40px;padding: 10px 170px;font-family: 'Roboto', sans-serif;font-size: 18px;"><i class="fas fa-pencil fas-1x"></i>Plan de estudios</a>
                    </div>
                </div>
            </div>
            <h1 class="text-center text-info" style="font-family: 'Raleway', sans-serif;">¡Bien! Comencemos, ¿Que tipo de usuario eres?</h1>
            <div class="row botones">
                <div class="col-md-6">
                    <a href="Registro/Reg.php" class="btn btn-success" style="margin-left: 40px;padding: 10px 180px;font-family: 'Roboto', sans-serif;font-size: 18px;"><i class="fas fa-user-plus fa-1x"></i> Nuevo</a>
                </div>
                <div class="col-md-6">
                    <a href="Acceso/FAcces.php" class="btn btn-warning" style="margin-left: 40px;padding: 10px 182px;font-family: 'Roboto', sans-serif;font-size: 18px;"><i class="fas fa-user-circle fa-1x"></i> Registrado</a>
                </div>
            </div>
        </div>
    </div>
</div>
        <footer class="bg-info">
            <p class="text-center text-info" style="font-family: 'Raleway', sans-serif;"><b>@Copyright Educatorium 2018. Todos los derechos reservados</b></p>
        </footer>
        <script type="text/javascript" src="CmpVis/jquery/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="CmpVis/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
        <script type="text/javascript" src="Funcionamiento/Javascripts/Pag_Info.js"></script>
    </body>
</html>