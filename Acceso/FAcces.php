<!DOCTYPE html>
<?php
    require '../Funcionamiento/PHPs/login.php';
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../CmpVis/bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../CmpVis/fontawesome-free-5.0.10/web-fonts-with-css/css/fontawesome-all.css">
        <link rel="stylesheet" type="text/css" href="../Funcionamiento/Estilos_Extras/Registro.css">
        <title>Entrar</title>
    </head>
    <body>
        <div class="container">
            <div class="row title">
                <div class="col-md-8 col-md-offset-2">
                    <h3 align="center">Bienvenido o Bienvenida</h3>
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
                            <div class="modal-body bg-info">
                                <p class="text-primary text-justify lead">Completa los campos que se requieren con tu información de usuario y contraseña para poder iniciar sesión. En caso de error con algún dato se te estará notificando.</p>
                                <p class="text-primary text-justify lead">Si perdiste u olvidaste tu contraseña da clic en la parte de abajo donde dice <strong>Aqui</strong> para proporcionarte una nueva.</p>
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
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-5 col-md-offset-4">
                                <h4>Por favor ingresa tus datos para comenzar</h4>
                            </div>
                        </div>                        
                    </div>
                    <form class="form-horizontal" name="Ent" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                        <div class="container">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2 col-md-offset-1">
                                        <label for="Username">Nombre de Usuario:</label>
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
                                        <label for="pass">Contraseña:</label>
                                    </div>                                            
                                    <div class="col-md-6">
                                        <input type="password" id="pass" name="Pass" class="form-control" placeholder="Introduce tu contraseña" value="<?php echo $contraseña;?>">
                                    </div>
                                    <div class="col-md-1">
                                        <input type="checkbox" onclick="showpass()"> Ver
                                    </div>
                                    <div class="col-md-2">
                                        <span class="error"><?php echo $pas_err;?></span>
                                        <span class="bien"><?php echo $pas_right;?></span>
                                    </div>
                                </div>                                        
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3 col-md-offset-3">
                                        <button type="submit" class="btn btn-primary" name="entrar">Acceder</button>
                                    </div>
                                    <div class="col-md-3 col-md-offset-1">
                                        <a href="#" class="btn btn-danger" onclick="window.location.replace('../index.php')"><i class="fas fa-times"></i> Cancelar acceso y volver</a>
                                    </div>
                                </div>                                
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-2">
                                        ¿Olvidaste tu contraseña?, no te preocupes presiona <a href="../Funcionamiento/PHPs/Rec_Pass.php" class="link">Aqui</a> para comenzar 
                                        con el proceso de recuperacion
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
        <script src="../Funcionamiento/Javascripts/ver-password.js"></script>
        <script type="text/javascript" src="../CmpVis/jquery/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="../CmpVis/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    </body>
</html>