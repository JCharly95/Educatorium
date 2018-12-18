<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CmpVis/bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="CmpVis/fontawesome-free-5.0.10/web-fonts-with-css/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="Funcionamiento/Estilos_Extras/Pag_Pri_Est.css">
    <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Open+Sans|Raleway|Roboto|Slabo+27px" rel="stylesheet">
    <title>Educatorium</title>
</head>
<body onload="titulo()">
    <div class="container">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-lg-10 col-md-10">
                        <h1 class="titulo" id="acheuno">
                            <strong class="text-center"></strong>
                        </h1>
                    </div>
                    <div class="col-lg-2 col-md-2">
                        <a data-toggle="modal" href="#ayuda" class="ayuda" title="Ayuda"><i class="fas fa-question-circle fa-4x"></i></a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div id="ayuda" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title text-danger text-center"><b>¿Necesitas ayuda?</b></h2>
                            </div>
                            <div class="modal-body">
                                <h4 class="text-center mod">¿Cómo puedo registrarme?</h4>
                                <p class="text-justify mod">Para registrarte, debes ir al final de la página donde verás un botón verde que dice 'Nuevo'. Haz clic si lo que deseas hacer es crear una nueva cuenta.</p>
                                <h4 class="text-center mod">¿Cómo puedo iniciar sesión?</h4>
                                <p class="text-justify mod">Para iniciar sesión, debes ir al final de la página donde verás un botón amarillo que dice 'Registrado'. Haz clic si quieres ingresar a tu cuenta.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Entendido</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section>
                <h4 class="text-center parrafo">
                    Te damos la bienvenida a nuestra aplicación web de trabajo creada para las comunidades estudiantiles de secundaria.<br>
                    Dentro de educatorium encontrarás pequeños cursos creados por profesores, diseñados para complementar el aprendizaje proporcionado por las aulas, pero de una forma más concisa a través de la realización de cuestionatios.
                </h4>
            </section>
            <section>
                <h4 class="text-center parrafo">
                    Nuestros cursos están clasificados en base a las materias que se cursan en cada grado, esto según el catálogo de libros digitales de la <strong class="bg-danger text-danger">Secretaría de Educación Pública.</strong>
                </h4>
            </section>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <h4 class="text-center parrafo" id="centrado">
                        Para consultar el catálogo completo de libros de texto de la SEP, favor de consultar el siguiente enlace:
                    </h4>
                    <a href="https://secundaria.conaliteg.gob.mx/content/common/consulta-libros-gb/" id="catalogo" class="btn btn-danger catalogo" target="_blank"><i class="fas fa-book fa-1x"></i> Catálogo de libros</a>
                </div>
                <div class="col-lg-6 col-md-6">
                    <h4 class="text-center parrafo" id="centrado">
                        Si deseas conocer la estructura de nuestro plan de estudios, te invitamos a dar clic en el siguiente enlace:
                    </h4>
                    <a href="PlanEstu.php" class="btn btn-primary plan"><i class="fas fa-pencil-alt fa-1x"></i> Plan de estudios</a>
                </div>
            </div>
            <h1 class="text-center text-info" id="uno">¡Bien! Comencemos, selecciona una de las opciones</h1>
            <div class="row botones">
                <div class="col-lg-6 col-md-6 ">
                    <a href="Registro/Reg.php" class="btn btn-success nuevo"><i class="fas fa-user-plus fa-1x"></i> Nuevo</a>
                </div>
                <div class="col-lg-6 col-md-6">
                    <a href="Acceso/FAcces.php" class="btn btn-warning registrado"><i class="fas fa-user-circle fa-1x"></i> Registrado</a>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-info">
        <p class="text-center text-info futer"><b>@Copyright Educatorium 2018. Todos los derechos reservados.</b></p>
    </footer>
    <script type="text/javascript" src="CmpVis/jquery/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="CmpVis/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="Funcionamiento/Javascripts/Pag_Info.js"></script>
    <script type="text/javascript">
        var i = 0;
        var txt = 'Hola, bienvenido a Educatorium';
        var speed = 80;
        function titulo()
        {
            if (i < txt.length) {
                document.getElementById("acheuno").innerHTML += txt.charAt(i);
                i++;
                setTimeout(titulo, speed);
            }
        }
    </script>
</body>
</html>