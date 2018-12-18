<?php
    require '../../Funcionamiento/PHPs/Carga_Datos/Usuarios/Estudiantes/CDatosEst.php';
    $NumTel=$tel;
    require '../../Funcionamiento/PHPs/upd_est.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../CmpVis/bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../CmpVis/fontawesome-free-5.0.10/web-fonts-with-css/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="../../Funcionamiento/Estilos_Extras/Registro.css">
    <title>Editando Perfil Estudiante...</title>
</head>
<body class="bg-primary">
    <div class="container">
        <div class="panel panel-default" style="margin-top: 2%;">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-10">
                        <h1 class="text-danger text-center text-capitalize">Actualizar Datos del Perfil</h1>
                    </div>
                    <div class="col-md-2" style="padding-top: 0.7%;">
                        <a data-toggle="modal" href="#myModal"><i class="fas fa-question-circle fa-4x"></i></a>
                    </div>
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title text-danger text-center">Módulo de Ayuda</h4>
                                </div>
                                <div class="modal-body" style="background-color: teal;">
                                    <p><span class="glyphicon glyphicon-info-sign"></span> Seleccione el campo que desee modificar. Una vez realizado el cambio, de clic en el botón que dice <strong>Actualizar.</strong> Tenga en cuenta las indicaciones que se le indiquen debajo de cada campo para evitar un mensaje de error.</p><br>
                                    <p><span class="glyphicon glyphicon-warning-sign"></span> La contraseña no se muestra para proporcionarle una mejor privacidad a los usuarios.</p><br>
                                    <p><span class="glyphicon glyphicon-warning-sign"></span> Si cambia el usuario se le redigirá al inicio, donde deberá iniciar sesión nuevamente.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-dismiss="modal">Entendido</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center text-primary">Información del usuario</h3>
                </div>
                <div class="panel-body">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                        <div class="form-group">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <h3><span class="label label-default">Numero telefonico: </span></h3>
                                    <input type="text" name="tel" class="form-control" onfocus="this.value='' " placeholder="<?php echo $tel;?>">
                                    <span class="help-block">El teléfono debe estar conformado por 8 o 10 números.</span>
                                    <span><!--<?php echo $tel_err; ?>--></span>
                                </div>                  
                                <div class="form-group col-md-6">
                                    <h3><span class="label label-default">Direccion de correo: </span></h3>
                                    <input type="email" name="correo" class="form-control" onfocus="this.value='' " placeholder="<?php echo $DirCorr;?>">
                                    <span class="help-block">Introduzca un correo válido. Ej. ejemplo@gmail.com</span>
                                    <span><!--<?php echo $cor_err; ?>--></span>
                                </div>            
                                <div class="form-group col-md-6">
                                    <h3><span class="label label-default">Nombre de usuario: </span></h3>
                                    <input type="text" name="usuario" class="form-control" onfocus="this.value='' " placeholder="<?php echo $user;?>">
                                    <span class="help-block">Máximo 10 caracteres. Letras y números solamente.</span>
                                    <span><!--<?php echo $us_err; ?>--></span>
                                </div>            
                                <div class="form-group col-md-6">
                                    <h3><span class="label label-default">Contraseña: </span></h3>
                                    <input type="password" name="pass" class="form-control">
                                    <span class="help-block">Debe constar de al menos un dígito, mayúsculas y minúsculas (8 caracteres).</span>
                                    <span><!--<?php echo $pass_err; ?>--></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <h3><span class="label label-default">Tipo de palabra de recuperacion: </span></h3>
                                    <div class="col-md-offset-2">
                                        <select class="btn btn-default" name="Tipo_Keyword">
                                            <option hidden value="" selected>Opciones para la palabra de recuperacion:</option>
                                            <option value="1">¿Cual es el nombre de su mascota?</option>
                                            <option value="2">¿Cual es su comida favorita?</option>
                                            <option value="3">¿Cual es el estado o pais al que le gustaria ir?</option>
                                        </select>
                                    </div>
                                    <span class="help-block">Favor de seleccionar de que tipo sera su nueva palabra de recuperacion</span>
                                    <span><!--<?php echo $pass_err; ?>--></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <h3><span class="label label-default">Confirmar Contraseña: </span></h3>
                                    <input type="password" name="cpass" class="form-control">
                                    <span class="help-block">Ambas contraseñas deben coincidir para proceder con el cambio.</span>
                                    <span><!--<?php echo $pass_err; ?>--></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <h3><span class="label label-default">Palabra de recuperacion: </span></h3>
                                    <input type="text" name="keyword" class="form-control" onfocus="this.value='' " placeholder="<?php echo $keyPal;?>">
                                    <span class="help-block">Favor de completar este campo si desea cambiar su palabra de recuperacion.</span>
                                    <span><!--<?php echo $pass_err; ?>--></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <h3><span class="label label-default">Imagen de perfil: </span></h3>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <output id="list">
                                            </output>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label class="btn btn-primary">
                                                <input type="file" id="files" name="imagen" style="display: none;" />
                                                Seleccionar imagen de perfil...
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <span class="error"><!--<?php echo $Img_err;?>--></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <h3><span class="label label-default">Secundaria donde estudias: </span></h3>
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-2">
                                            <select class="btn btn-default" name="escuelas" id="secus" onchange="">
                                                <option hidden value="" selected><?php echo $NomEsc; ?> </option>
                                                <?php
                                                    require $_SERVER['DOCUMENT_ROOT'].'/educatorium/Funcionamiento/PHPs/Conn_Ses/conexion.php';
                                                    $sql = "SELECT * FROM escuela;";
                                                    $ver = $conexion->query($sql);
                                                                        
                                                    while ($cont=$ver->fetch_assoc())
                                                    {
                                                        echo '<option value="'.$cont["ID_Escuela"].'">Secundaria '.$cont["Tipo"].' '.$cont["Num_Esc"].', '.$cont["Nombre"].'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <span class="help-block">Seleccione una escuela.</span>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <span class="error"><!--<?php echo $esc_err;?>--></span>
                                            <span class="bien"><!--<?php echo $esc_right;?>--></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <h3><span class="label label-default">Grado en curso: </span><span class="error"></span></h3>
                                    <div class="col-md-offset-5">
                                        <select class="btn btn-default" name="grado" id="Grado_Cur">
                                            <option hidden value="" selected> <?php echo $Grado; ?> </option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>
                                    <span class="help-block">Seleccione un grado.</span>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <span class="error"><!--<?php echo $esc_err;?>--></span>
                                            <span class="bien"><!--<?php echo $esc_right;?>--></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <button type="submit" class="form-control btn btn-default active" name="actualizar">Actualizar</button>
                        </div>
                        <div class="form-group col-md-6">
                            <a href="Principal_Est.php" class="form-control btn btn-danger"> Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../../Funcionamiento/Javascripts/ver-foto.js"></script>
    <script type="text/javascript" src="../../CmpVis/jquery/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../../CmpVis/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
</body>
</html>