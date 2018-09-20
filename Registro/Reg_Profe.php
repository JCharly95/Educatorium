<?php
    require '../Funcionamiento/PHPs/validar_profe.php';
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
        <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Open+Sans|Raleway|Roboto|Slabo+27px" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row title">
                <div class="col-md-10">
                    <h2 align="center" class="text-primary" style="font-family: 'Raleway', sans-serif;">Es un honor que te unas a nuestra comunidad virtual.</h2>
                </div>
                <!--<div class="col-md-2">
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
                                <p class="text-primary lead text-justified" style="color: #99ffcc;font-family: 'Roboto', sans-serif;" >Completa todos los campos del formulario con la información requerida. De lo contrario, se te mostrará un mensaje de error y <strong style="text-decoration: underline;">NO</strong> podrás registrarte. Haz caso a las indicaciones que se te piden.</p>
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
                    <form name="alta_profe" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <h3 class="text-center"><kbd>Profesor</kbd></h3>
                        </div>
                        <div class="form-group">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <p style="font-family: 'Open Sans', sans-serif;">Por favor introduce los datos solicitados.</p>
                                    <span class="label label-warning" style="font-family: 'Open Sans', sans-serif;">En este caso, al ser un formulario 
                                        de registro, es necesario rellenar todos los campos, con excepcion 
                                        de la imagen de perfil.
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="panel panel-primary">
                                <div class="panel-heading text-center">
                                    <h4><span style="background-color: whitesmoke; color: #843534;">
                                            <i><u>&nbsp;Datos personales:&nbsp;</u></i>
                                        </span>
                                    </h4>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 col-md-offset-1">
                                                <label for="Name" class="text-danger">Nombre:</label>
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
                                                <label for="LstN1" class="text-danger">Apellido Paterno:</label>
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
                                                <label for="LstN2" class="text-danger">Apellido Materno:</label>
                                            </div>                                            
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="ap_mat" id="LstN2" placeholder="Introduce tu segundo apellido" value="<?php echo $ap_mat;?>">
                                            </div>
                                            <div class="col-md-3">
                                                <span class="error"><?php echo $apm_err;?></span>
                                                <span class="bien"><?php echo $mat_right;?></span>
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 col-md-offset-1">
                                                <label for="Phone" class="text-danger">Telefono:</label>
                                            </div>                                            
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="tel" id="Phone" placeholder="Introduce tu numero de telefono" value="<?php echo $tel;?>">
                                            </div>
                                            <div class="col-md-3">
                                                <span class="error"><?php echo $tel_err;?> </span>
                                                <span class="bien"><?php echo $tel_right;?></span>
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 col-md-offset-1">
                                                <label for="Email" class="text-danger">Correo Electronico:</label>
                                            </div>                                            
                                            <div class="col-md-6">
                                                <input type="email" class="form-control" name="correo" id="Email" placeholder="Introduce tu direccion de correo" value="<?php echo $correo;?>">
                                            </div>
                                            <div class="col-md-3">
                                                <span class="error"><?php echo $cor_err;?></span>
                                                <span class="bien"><?php echo $cor_right;?></span>
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                        </div>                        
                        <div class="form-group">
                            <div class="panel panel-success">
                                <div class="panel-heading text-center">
                                    <h4><span style="background-color: black; color: gold;">
                                            <i><u>&nbsp;Datos de la escuela donde labora:&nbsp;</u></i>
                                        </span>
                                    </h4>
                                </div>
                                <div class="panel-body">
                                    <div id="SecSis">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4 col-md-offset-1">
                                                    <label for="secus" class="text-primary">Estas son las secundarias registradas en educatorium</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="btn btn-default" name="escuelas" id="secus">
                                                        <option hidden value="N/A" selected>Lista de secundarias</option>
                                                        <?php
                                                            require '../Funcionamiento/PHPs/conexion.php';
                                                            $sql = "SELECT * FROM escuela;";
                                                            $ver = $conexion->query($sql);

                                                            while ($cont=$ver->fetch_assoc())
                                                            {
                                                                echo '<option value="'.$cont["ID_Escuela"].'">Secundaria '.$cont["Tipo"].' '.$cont["Num_Esc"].', '.$cont["Nombre"].'</option>';                                                                 
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <span class="error"><?php echo $esc_err;?></span>
                                                    <span class="bien"><?php echo $esc_right;?></span>
                                                </div>
                                            </div>                                        
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-offset-1">
                                                    <label class="label label-default" class="text-primary"><span class="label-danger">&nbsp;NOTA:&nbsp;</span>
                                                        Si tu institucion se encuentra en la lista anterior, favor de seleccionarla 
                                                        y confirmar tu selecci&oacute;n en los siguientes botones
                                                    </label>
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4 col-md-offset-1">
                                                    <label class="text-primary">¿Est&aacute; la secundaria en la que laboras en esa lista?</label>
                                                </div>
                                                <div class="col-md-2 radio-inline">
                                                    <label><input type="radio" name="Resp" value="Si" onclick="VerSec('alta_profe','Resp');"/> <b>Si</b></label>                                                    
                                                </div>
                                                <div class="col-md-2 radio-inline">
                                                    <label><input type="radio" name="Resp" value="No" onclick="VerSec('alta_profe','Resp');"/> <b>No</b></label>
                                                </div>
                                                <div class="col-md-3">
                                                    <span class="error"><?php echo $esc_err;?></span>
                                                    <span class="bien"><?php echo $esc_right;?></span>
                                                </div>
                                            </div>                                            
                                        </div>
                                    </div>
                                    <div id="NSec" style="display: none;">
                                        <div class="form-group">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    Favor de completar los campos siguientes para poder registrar la institucion donde trabajas
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4 col-md-offset-1">
                                                    <label for="Tip_Esc">Selecciona el tipo de institucion donde laboras:</label>
                                                </div>
                                                <div class="col-md-3">                                                    
                                                    <select class="btn btn-default" name="tipo" id="Tip_Esc">
                                                        <option hidden value="" selected>Tipos de secundarias en M&eacute;xico:</option>
                                                        <option value="General">General</option>
                                                        <option value="Para trabajadores">Para trabajadores</option>
                                                        <option value="Tecnica">Tecnica</option>
                                                        <option value="Telesecundaria">Telesecundaria</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <span class="error"><?php echo $tip_err;?></span>
                                                    <span class="bien"><?php echo $tip_right;?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4 col-md-offset-1">
                                                    <label for="NumSch">Introduce el numero que identifica a tu secundaria:</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" placeholder="Ejemplo: 3" name="num" id="NumSch" value="<?php echo $num;?>">
                                                </div>
                                                <div class="col-md-3">
                                                    <span class="error"><?php echo $num_err;?></span>
                                                    <span class="bien"><?php echo $num_right;?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4 col-md-offset-1">
                                                    <label for="NamSch">Introduce el nombre de tu secundaria:</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" placeholder="Ejemplo: Valentin Gomez Farias" name="esc" id="NamSch" value="<?php echo $esc;?>">
                                                </div>
                                                <div class="col-md-3">
                                                    <span class="error"><?php echo $esc_err;?></span>
                                                    <span class="bien"><?php echo $esc_right;?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">                            
                            <div class="panel panel-info">
                                <div class="panel-heading text-center">
                                    <h4><span style="background-color: goldenrod; color: darkblue;">
                                            <i><u>&nbsp;Datos del usuario a registrar:&nbsp;</u></i>
                                        </span>
                                    </h4>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 col-md-offset-1">
                                                <label for="Username" class="text-primary">Nombre de Usuario:</label>
                                            </div>                                            
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="user" id="Username" placeholder="Introduce el nombre con el que te identificaran" value="<?php echo $user;?>">
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
                                                <label for="pass" class="text-primary">Contrase&ntilde;a:</label>
                                            </div>                                            
                                            <div class="col-md-6">
                                                <input type="password" class="form-control" name="pass" id="pass" placeholder="Introduce tu contraseña" value="<?php echo $pass;?>">
                                            </div>
                                            <div class="col-md-1">
                                                <input type="checkbox" onclick="showpass()"> Ver
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
                                                <label for="cpass" class="text-primary">Confirmacion de Contrase&ntilde;a:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="password" class="form-control" name="cpass" id="cpass" placeholder="Introduce nuevamente tu contraseña" value="<?php echo $cpass;?>">
                                            </div>
                                            <div class="col-md-1">
                                                <input type="checkbox" onclick="showcpass()"> Ver
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
                                                <label for="files" class="text-primary">Imagen de perfil:</label>
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
                                    <div class="form-group">
                                        <div class="panel panel-success">
                                            <div class="panel-heading">En caso de que no recuerdes tu contrase&ntilde;a, se te pedira que 
                                                respondas a la siguiente pregunta:<br>
                                                <span class="label label-danger">¿Cual es tu fecha de nacimiento?</span>
                                            </div>
                                            <div class="panel-default">
                                            <div class="panel-heading">Ejemplo: 15/08/1998<br>
                                                <span class="label label-warning" style="margin-top: 3px;">NOTA: Favor de escribir tambien las diagonales</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 col-md-offset-1">
                                                <label for="wordR" class="text-primary">Fecha de nacimiento:</label>
                                            </div>                                            
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="clave" id="wordR" placeholder="Introduce tu respuesta" value="<?php echo $clave;?>">
                                            </div>
                                            <div class="col-md-3">
                                                <span class="error"><?php echo $key_err;?></span>
                                                <span class="bien"><?php echo $key_right;?></span>
                                            </div>
                                        </div>                                        
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-2">
                                    <label class="btn btn-success">
                                        <input type="submit" name="enviar" style="display: none;">
                                        <i class="fas fa-check"></i> Confirmar datos y registrar
                                    </label>                                    
                                </div>
                                <div class="col-md-3 col-md-offset-2" >
                                    <a href="#" class="btn btn-danger" style="padding: 6px 50px;" onclick="window.location.replace('Reg.php')"><i class="fas fa-times"></i> Cancelar registro</a>
                                </div>
                            </div>                            
                        </div>
                    </form>
                </div>                
            </div>
        </div>
        <script src="../Funcionamiento/Javascripts/ver-foto.js"></script>
        <script src="../Funcionamiento/Javascripts/ver-password.js"></script>
        <script src="../Funcionamiento/Javascripts/Reg_Prof.js"></script>
        <script type="text/javascript" src="../CmpVis/jquery/jquery-3.3.1.js"></script>
	    <script type="text/javascript" src="../CmpVis/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    </body>
</html>