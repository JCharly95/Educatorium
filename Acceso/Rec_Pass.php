<?php
    /*require 'Correo_Pass.php';*/
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="../CmpVis/bootstrap-3.3.7-dist/css/bootstrap.css">
            <link rel="stylesheet" type="text/css" href="../CmpVis/fontawesome-free-5.0.10/web-fonts-with-css/css/fontawesome-all.css">
        <link rel="stylesheet" type="text/css" href="../Funcionamiento/Estilos_Extras/Registro.css">
        <title>Recuperacion</title>
    </head>
    <body>
        <div class="container">
            <div class="row title">
                <div class="col-md-8 col-md-offset-2">
                    <h3 align="center">Lamentamos que olvidaras tu contraseña, por favor llena los campos 
                        solicitados y te haremos llegar tu contraseña lo mas rapido posible</h3>
                </div>
                <div class="col-md-2">
                    <abbr title="Ayuda"><a href="#" id="help"><i class="fas fa-question-circle fa-4x"></i></a></abbr>
                </div>
            </div>
            <div class="panel panel-default">                
                <div class="panel-body" style="background-color: lightseagreen;">
                    <form name="Rec_contra" action="Correo_Pass.php" method="POST">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9 col-md-offset-1">
                                    <div class="panel-success">                
                                        <div class="panel-heading">
                                            Introduce tu nombre de usuario, para corroborar que dicho 
                                            nombre de usuario existe
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-1">
                                    <input type="text" class="form-control" name="usuario" placeholder="Introduce tu nombre de usuario">
                                </div>
                                <div class="col-md-3 col-md-offset-1">
                                    <!--Colocar aqui el aviso de error o acierto del username-->
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9 col-md-offset-1">
                                    <div class="panel-danger">                
                                        <div class="panel-heading">
                                            ¿Cual es tu fecha de nacimiento?
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-1">
                                    <input type="text" class="form-control" name="contra" placeholder="Introduce tu fecha de nacimiento">
                                </div>
                                <div class="col-md-3 col-md-offset-1">
                                    <!--Colocar aqui el aviso de error o acierto de la fecha de nacimiento-->
                                </div>
                            </div>                                                
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-offset-1">
                                    Los datos registrados en el sistema a nombre del usuario ingresado
                                    seran enviados al siguiente correo:
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-offset-4">
                                    <span>Aqui se mostrara el correo registrado del usuario</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary" onclick="VerifiCorreo();">Confirmar datos y enviar correo</button>
                                </div>
                                <div class="col-md-3 col-md-offset-1">
                                    <a href="#" class="btn btn-danger" onclick="window.location.replace('FAcces.php')"><i class="fas fa-times"></i>&nbsp;&nbsp; Cancelar registro</a>
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
        <script type="text/javascript" src="../Funcionamiento/Javascripts/Rec_Pass.js"></script>
        <script type="text/javascript" src="../CmpVis/jquery/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="../CmpVis/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    </body>
</html>
