<?php 
    require '../Funcionamiento/PHPs/validar_padres.php';
?>
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
                            <div class="modal-body bg-info">
                                <p class="text-primary lead">Completa todos los campos del formulario con la información requerida. De lo contrario, se te mostrará un mensaje de error y <strong style="text-decoration: underline;">NO</strong> podrás registrarte. Haz caso a las indicaciones que se te piden.</p>
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
                    <form name="alta_pad" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-3 col-md-offset-5">
                                <h3><kbd>Padre o Tutor</kbd></h3>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="panel panel-success">
                                <div class="panel-heading">Por favor introduce los datos solicitados.<br>
                                    <span class="label label-warning">En este caso, al ser un formulario 
                                        de registro, es necesario rellenar todos los campos, con excepcion 
                                        de la imagen de perfil.</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="panel panel-primary">
                                <div class="panel-heading text-center">
                                    <h4><span style="background-color: wheat; color: #843534;">
                                            <i><u>&nbsp;Datos Personales:&nbsp;</u></i>
                                        </span>
                                    </h4>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 col-md-offset-1">
                                                <label for="Name">Nombre: </label>
                                            </div>                                            
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="nombre" id="Name" placeholder="Introduce tu nombre o nombres" value="<?php echo $nombre;?>">
                                            </div>
                                            <div class="col-md-3">
                                                <span class="error"><?php echo $nom_err;?></span>
                                                <span class="bien"><?php echo $nom_right;?></span>
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 col-md-offset-1">
                                                <label for="LstN1">Apellido Paterno: </label>
                                            </div>                                            
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="ap_pat" id="LstN1" placeholder="Introduce tu primer apellido" value="<?php echo $ap_pat;?>">
                                            </div>
                                            <div class="col-md-3">
                                                <span class="error"><?php echo $app_err;?></span>
                                                <span class="bien"><?php echo $pat_right;?></span>
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 col-md-offset-1">
                                                <label for="LstN2">Apellido Materno:</label>
                                            </div>                                            
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="ap_mat" id="LstN2" placeholder="Introduce tu segundo apellido" value="<?php echo $ap_mat;?>">
                                            </div>
                                            <div class="col-md-3">
                                                <span class="error"> <?php echo $apm_err;?></span>
                                                <span class="bien"> <?php echo $mat_right;?></span>
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 col-md-offset-1">
                                                <label for="Phone">Telefono:</label>
                                            </div>                                            
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="tel" id="Phone" placeholder="Introduce tu numero de telefono" value="<?php echo $tel;?>">
                                            </div>
                                            <div class="col-md-3">
                                                <span class="error"> <?php echo $tel_err;?> </span>
                                                <span class="bien"> <?php echo $tel_right;?></span>
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 col-md-offset-1">
                                                <label for="Email">Correo Electronico:</label>
                                            </div>                                            
                                            <div class="col-md-6">
                                                <input type="email" class="form-control" name="correo" id="Email" placeholder="Introduce tu direccion de correo" value="<?php echo $correo;?>">
                                            </div>
                                            <div class="col-md-3">
                                                <span class="error"> <?php echo $cor_err;?></span>
                                                <span class="bien"> <?php echo $cor_right;?></span>
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">                            
                            <div class="panel panel-info">
                                <div class="panel-heading text-center">
                                    <h4><span style="background-color: gold; color: black;">
                                            <i><u>&nbsp;Datos del usuario a registrar:&nbsp;</u></i>
                                        </span>
                                    </h4>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 col-md-offset-1">
                                                <label for="Username">Nombre de Usuario:</label>
                                            </div>                                            
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="user" id="Username" placeholder="Introduce el nombre con el que te identificaran" value="<?php echo $user;?>">
                                            </div>
                                            <div class="col-md-3">
                                                <span class="error"> <?php echo $us_err;?></span>
                                                <span class="bien"> <?php echo $us_right;?></span>
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 col-md-offset-1">
                                                <label for="pass">Contrase&ntilde;a:</label>
                                            </div>                                            
                                            <div class="col-md-6">
                                                <input type="password" class="form-control" name="pass" id="pass" placeholder="Introduce tu contraseña" value="<?php echo $pass;?>">
                                            </div>
                                            <div class="col-md-1">
                                                <input type="checkbox" onclick="showpass('pass')"> Ver
                                            </div>
                                            <div class="col-md-2">                                                
                                                <span class="error"><?php echo $pass_err;?></span>
                                                <span class="bien"><?php echo $pas_right;?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 col-md-offset-1">
                                                <label for="cpass">Confirmacion de Contrase&ntilde;a:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="password" class="form-control" name="cpass" id="cpass" placeholder="Introduce nuevamente tu contraseña" value="<?php echo $cpass;?>">
                                            </div>
                                            <div class="col-md-1">                                                
                                                <input type="checkbox" onclick="showpass('cpass')"> Ver
                                            </div>
                                            <div class="col-md-2">
                                                <span class="error"><?php echo $cpa_err;?></span>
                                                <span class="bien"><?php echo $cpa_right;?></span>
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3 col-md-offset-1">
                                                <label for="files">Imagen de perfil:</label>
                                            </div>
                                            <div class="col-md-4">
                                                <output id="list">
                                                    
                                                </output>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="btn btn-primary">
                                                    <input type="file" id="files" name="imagen" style="display: none;" />
                                                    Seleccionar imagen de perfil...
                                                </label>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <span class="error"> <?php echo $Img_err;?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <div class="form-group row">
                                                <div class="col-md-3 col-md-offset-1">
                                                    <label>Palabra de recuperacion:</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <span>
                                                        En caso de que olvide su contrase&ntilde;a y desee recuperarla sera necesario proporcionar
                                                        una palabra clave la cual nos ayude a identificar que es usted quien va a recuperar la cuenta.
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-offset-1">
                                                    <span class="label label-default">
                                                        Por favor seleccione que tipo de palabra clave desea registrar y posteriormente introduzcala
                                                        en el lugar correspondiente.
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 col-md-offset-1">
                                                    <select class="btn btn-default" name="Tipo_Keyword">
                                                        <option hidden value="" selected>Opciones para la palabra de recuperacion:</option>
                                                        <option value="1">¿Cual es el nombre de su mascota?</option>
                                                        <option value="2">¿Cual es su comida favorita?</option>
                                                        <option value="3">¿Cual es el estado o pais al que le gustaria ir?</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="password" class="form-control" name="clave" id="wordR" placeholder="Introduzca su palabra de recuperacion" value="<?php echo $clave;?>">
                                                </div>
                                                <div class="col-md-3">
                                                    <label><input type="checkbox" onclick="showpass('wordR')"> Ver palabra clave</label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12 col-md-offset-1">
                                                    <span class="error"><?php echo $key_err;?></span>
                                                    <span class="bien"><?php echo $key_right;?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-3">
                                    <label class="btn btn-success">
                                        <input type="submit" name="enviar" style="display: none;">
                                        <i class="fas fa-check"></i> Confirmar datos y registrar
                                    </label>                                    
                                </div>
                                <div class="col-md-3 col-md-offset-2">
                                    <a href="#" class="btn btn-danger" onclick="window.location.replace('Reg.php')"><i class="fas fa-times"></i> Cancelar registro</a>
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
        <script src="../Funcionamiento/Javascripts/ver-foto.js"></script>
        <script src="../Funcionamiento/Javascripts/ver-password.js"></script>
        <script type="text/javascript" src="../CmpVis/jquery/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="../CmpVis/bootstrap-3.3.7-dist/js/bootstrap.js"></script>        
    </body>
</html>