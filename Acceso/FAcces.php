<?php
    require '../Funcionamiento/PHPs/login.php';
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
        <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Open+Sans|Raleway|Roboto|Slabo+27px" rel="stylesheet">
        <title>Entrar</title>
    </head>
    <body>
        <div class="container">
            <div class="row title">
                <div class="col-md-8 col-md-offset-2">
                    <h1 align="center" class="text-info" style="font-family: 'Raleway', sans-serif;">Bienvenido o Bienvenida</h1>
                </div>
               <!-- <div class="col-md-2">
                    <abbr title="Ayuda"><a href="#" id="help"><i class="fas fa-question-circle fa-4x"></i></a></abbr>
                </div>-->
                <div class="col-md-2">
                    <a data-toggle="modal" href="#ayuda"><i class="fas fa-question-circle fa-4x"></i></a>
                </div>
                <div id="ayuda" class="modal fade" role="dialog">
                    <div class="modal-dialog" style="padding-top: 50px;">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title text-danger text-center" style="font-family: 'Raleway', sans-serif;">Ayuda</h3>
                          </div>
                            <div class="modal-body " style="background-color: #005e80;">
                                <p class="text-primary text-justify lead" style="color: #99ffcc;font-family: 'Roboto', sans-serif;">Completa los campos que se requieren con tu información de usuario y contraseña para poder iniciar sesión. En caso de error con algún dato se te estará notificando.</p>
                                <p class="text-primary text-justify lead" style="color: #99ffcc;font-family: 'Roboto', sans-serif;">Si perdiste u olvidaste tu contraseña da clic en el enlace para proporcionarte una nueva.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Entendido</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default" style="box-shadow: 0 2px 2px 2px rgba(0,0,0,0.3);">                
                <div class="panel-body" style="">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <h3 class="text-center text-danger" style="font-family: 'Roboto', sans-serif;">Por favor, ingresa tus datos para comenzar</h4>
                                    <br><br>
                            </div>
                        </div>                        
                    </div>
                    <form class="form-horizontal" name="Ent" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                        <div class="container">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2 col-md-offset-1">
                                        <label for="Username" class="text-info"><h4>Usuario:</h4></label>
                                    </div>                                            
                                    <div class="col-md-6">
                                        <input type="text" id="Username" name="Username" class="form-control" placeholder="Introduce tu nombre de usuario" value="<?php echo $usuario;?>">
                                    </div>
                                    <div class="col-md-3">
                                        <span class="error"><?php echo $us_err;?></span>
                                        <span class="bien"><?php echo $us_right;?></span>
                                    </div>
                                </div>                                        
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2 col-md-offset-1">
                                        <label for="pass" class="text-info"><h4>Contraseña:</h4></label>
                                    </div>                                            
                                    <div class="col-md-6">
                                    <input type="password" id="pass" name="Pass" class="form-control" placeholder="Introduce tu contraseña" value="<?php echo $contraseña;?>">
                                    </div>
                                    <div class="col-md-2">
                                        <span class="error"><?php echo $pas_err;?></span>
                                        <span class="bien"><?php echo $pas_right;?></span>
                                    </div>
                                </div>                                        
                            </div>
                            <div class="form-group">
                                <div class="">
                                    <div class="col-md-5 col-md-offset-3">
                                        <input type="checkbox" onclick="showpass()"> Mostrar contraseña
                                    </div>

                                </div>

                            </div>
                            <br>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3 col-md-offset-2">
                                        <button type="submit" class="btn btn-primary" name="entrar" style="padding: 5px 60px;">Acceder</button>
                                    </div>
                                    <div class="col-md-3 col-md-offset-2">
                                        <a href="#" class="btn btn-danger" onclick="window.location.replace('../index.php')"> Cancelar acceso y volver</a>
                                    </div>
                                </div>                                
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <h4 style="font-family: 'Roboto', sans-serif;">¿Olvidaste tu contraseña?, presiona <a href="../Funcionamiento/PHPs/Rec_Pass.php" class="link">en este enlace</a> para establecer una nueva.</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>            
        </div>
        <footer class="bg-info">
            <p class="text-center text-info" style="font-family: 'Raleway', sans-serif;"><b>@Copyright Educatorium 2018. Todos los derechos reservados</b></p>
        </footer>
        <script src="../Funcionamiento/Javascripts/ver-password.js"></script>
        <script type="text/javascript" src="../CmpVis/jquery/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="../CmpVis/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    </body>
</html>