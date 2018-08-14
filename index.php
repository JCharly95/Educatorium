<!DOCTYPE html>
<html>
    <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="CmpVis/bootstrap-3.3.7-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="CmpVis/fontawesome-free-5.0.10/web-fonts-with-css/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="Funcionamiento/Estilos_Extras/Pag_Info.css">
    <title>Pagina Informativa</title>
    </head>
    <body>
        <div class="container">
            <div class="row title">
                <div class="col-md-10">
                    <h1 align="center">Hola que tal, bienvenido a Educatorium</h1>
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
            <p class="cuerpo">Te damos la bienvenida a nuestra aplicacion web de trabajo. Creada para las 
                comunidades estudiantiles de secundaria. Dentro de educatorium encontraras
                pequeños cursos creados por profesores, diseñados para complementar el
                aprendizaje proporcionado en las aulas, pero de una forma mas concisa a traves
                de la realizacion de cuestionarios.</p>
            <p class="cuerpo">Nuestros cursos estan clasificados en base a las materias que se cursan en cada
                grado, esto segun el catalogo de libros digitales de la Secretaria de Educacion 
                Publica.</p>
            <p>Para consultar el catalogo completo de libros de texto de la SEP, favor de consultar el siguiente enlace: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="https://secundaria.conaliteg.gob.mx/content/common/consulta-libros-gb/" class="link" target="_blank">
                Catalogo Digital de Libros para Secundaria de la SEP
            </a></p>
            <p>Si deseas conocer la estructura de nuestro plan de estudios, te invitamos a 
                dar clic en el siguiente enlace: &nbsp;&nbsp;&nbsp;<a href="PlanEstu.php" class="link">Plan de estudios</a></p>
            <h3>¡Bien! Comencemos</h3>
            <h5>¿Que tipo de usuario eres?</h5>
            <div class="row botones">
                <div class="col-md-3 col-md-offset-2">
                    <a href="Registro/Reg.php" class="btn btn-success"><i class="fas fa-user-plus fa-2x"></i> Nuevo</a>
                </div>
                <div class="col-md-3 col-md-offset-2">
                    <a href="Acceso/FAcces.php" class="btn btn-warning"><i class="fas fa-user-circle fa-2x"></i> Registrado</a>
                </div>
            </div>
	</div>
        <footer>
            @Copyright Educatorium 2018. Todos los derechos reservados
        </footer>
        <script type="text/javascript" src="CmpVis/jquery/jquery-3.3.1.js"></script>
	    <script type="text/javascript" src="CmpVis/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    </body>
</html>