<?php
    require '../../Funcionamiento/PHPs/Carga_Datos/Usuarios/Profesores/CDatosProf.php';
    require '../../Funcionamiento/PHPs/upd_profe.php';
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
    <title>Editando Perfil Profesor...</title>
    <!--<style type="text/css">
        .error 
        {
            color: red;
            font-style: italic;
            font-size: 12px;
            font-weight: 700;
            margin-left: 30px;
        }
        input[type=text]:focus, input[type=email]:focus, input[type=password]:focus 
        {
            border: 2px solid #333;
        }
    </style>-->
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
            <div class="panel-body">
                <div class="alert alert-info alert-dismissible fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <p><span class="glyphicon glyphicon-info-sign"></span> Seleccione el campo que desee modificar. Una vez realizado el cambio, de clic en el botón que dice <strong>Actualizar.</strong></p>
                </div>
                <div class="alert alert-warning alert-dismissible fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <p><span class="glyphicon glyphicon-warning-sign"></span> La contraseña no se muestra debido a la privacidad.</p>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="text-center">Información del usuario</h3>
                    </div>        
                    <div class="panel-body">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                            <div class="form-group">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <h3><span class="label label-default">Numero telefonico: </span></h3>
                                        <input type="text" name="tel" class="form-control DatoEnt" onfocus="this.value='' " onchange="HabSub();" placeholder="<?php echo $NumTele;?>">
                                        <span class="help-block">El teléfono debe estar conformado por 8 o 10 números.</span>
                                        <span><!--<?php echo $tel_err; ?>--></span>
                                    </div>                  
                                    <div class="form-group col-md-6">
                                        <h3><span class="label label-default">Direccion de correo: </span></h3>
                                        <input type="email" name="correo" class="form-control DatoEnt" onfocus="this.value='' " onchange="HabSub();" placeholder="<?php echo $DirCorr;?>">
                                        <span class="help-block">Introduzca un correo válido. Ej. ejemplo@gmail.com</span>
                                        <span><!--<?php echo $cor_err; ?>--></span>
                                    </div>            
                                    <div class="form-group col-md-6">
                                        <h3><span class="label label-default">Nombre de usuario: </span></h3>
                                        <input type="text" name="usuario" class="form-control DatoEnt" onfocus="this.value='' " onchange="HabSub();" placeholder="<?php echo $user;?>">
                                        <span class="help-block">Máximo 10 caracteres. Letras y números solamente.</span>
                                        <span><!--<?php echo $us_err; ?>--></span>
                                    </div>            
                                    <div class="form-group col-md-6">
                                        <h3><span class="label label-default">Contraseña: </span></h3>
                                        <input type="password" name="pass" class="form-control DatoEnt" onchange="HabSub();">
                                        <span class="help-block">Debe constar de al menos un dígito, mayúsculas y minúsculas (8 caracteres).</span>
                                        <span><!--<?php echo $pass_err; ?>--></span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h3><span class="label label-default">Tipo de palabra de recuperacion: </span></h3>
                                        <div class="col-md-offset-2">
                                            <select class="btn btn-default DatoEnt" name="Tipo_Keyword" onchange="HabSub();">
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
                                        <input type="password" name="cpass" class="form-control DatoEnt" onchange="HabSub();">
                                        <span class="help-block">Ambas contraseñas deben coincidir para proceder con el cambio.</span>
                                        <span><!--<?php echo $pass_err; ?>--></span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h3><span class="label label-default">Palabra de recuperacion: </span></h3>
                                        <input type="text" name="keyword" class="form-control DatoEnt" onfocus="this.value='' " onchange="HabSub();" placeholder="<?php echo $KeyPal;?>">
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
                                                    <input type="file" id="files" class="DatoEnt" onchange="HabSub();" name="imagen" style="display: none;" />
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
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <div class="form-group row">
                                                <div class="col-md-12">
                                                    <h3><span class="label label-default">Secundaria donde labora: </span></h3>
                                                </div>
                                        </div>
                                        <div id="SecSis">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4 col-md-offset-4">
                                                        <select class="btn btn-default DatoEnt" onchange="HabSub();" name="escuelas" id="secus">
                                                            <option hidden value="N/A" selected>Lista de secundarias registradas</option>
                                                            <?php
                                                                require $_SERVER['DOCUMENT_ROOT'].'/Educatorium/Funcionamiento/PHPs/Conn_Ses/conexion.php';
                                                                $sql = "Select * from escuela where ID_Escuela>1;";
                                                                $ver = $conexion->query($sql);

                                                                while ($cont=$ver->fetch_assoc())
                                                                {
                                                                    echo '<option value="'.$cont["ID_Escuela"].'">Secundaria '.$cont["Tipo"].' '.$cont["Num_Esc"].', '.$cont["Nombre"].'</option>';                                                                 
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <span class="error"><!--<?php echo $esc_err;?>--></span>
                                                        <span class="bien"><!--<?php echo $esc_right;?>--></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label class="label-default" style="border-radius: 5px;">&nbsp;&nbsp;<span class="label label-danger">&nbsp;NOTA:&nbsp;</span>
                                                            Si su institucion se encuentra en la lista anterior, favor de seleccionarla 
                                                            y confirmar tu selecci&oacute;n en los siguientes botones&nbsp;&nbsp;
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row" style="color:black;">
                                                    <div class="col-md-5">
                                                        ¿Est&aacute; la secundaria en la que labora, en esa lista?
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label><input type="radio" name="RespSelEsc" value="Si" id="RESi" onclick="InViewSec('RESi','NSec','SecSis');" checked/> <b>Si</b></label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label><input type="radio" name="RespSelEsc" value="No" id="RENo" onclick="InViewSec('RENo','NSec','SecSis');" /> <b>No</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <span class="error"><!--<?php echo $esc_err;?>--></span>
                                                        <span class="bien"><!--<?php echo $esc_right;?>--></span>
                                                    </div>
                                                </div>                                          
                                            </div>
                                        </div>
                                        <div id="NSec" style="display: none;">
                                            <div class="form-group">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        Favor de completar los campos siguientes para poder registrar la institucion donde trabaja
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label class="label-warning" style="border-radius: 5px;">&nbsp;Seleccione el tipo de institucion donde labora:&nbsp;</label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-3 col-md-offset-3">                                                    
                                                    <select class="btn btn-default" name="tipo" id="Tip_Esc">
                                                        <option hidden value="" selected>Tipos de secundarias en M&eacute;xico:</option>
                                                        <option value="General">General</option>
                                                        <option value="Para trabajadores">Para trabajadores</option>
                                                        <option value="Tecnica">Tecnica</option>
                                                        <option value="Telesecundaria">Telesecundaria</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <span class="error"><!--<?php echo $tip_err;?>--></span>
                                                    <span class="bien"><!--<?php echo $tip_right;?>--></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label class="label-warning" style="border-radius: 5px;">&nbsp;Introduzca el numero que identifica a su secundaria:&nbsp;</label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-6 col-md-offset-3">
                                                    <input type="text" name="num" id="NumSch" class="form-control" placeholder="<?php echo $NoEsc;?>"><!---->
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <span class="error"><!--<?php echo $num_err;?>--></span>
                                                    <span class="bien"><!--<?php echo $num_right;?>--></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label class="label-warning" style="border-radius: 5px;">&nbsp;Introduzca el nombre de su secundaria:&nbsp;</label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-6 col-md-offset-3">
                                                    <input type="text" name="esc" id="NamSch" class="form-control" placeholder="<?php echo $NomEsc;?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <span class="error"><!--<?php echo $esc_err;?>--></span>
                                                    <span class="bien"><!--<?php echo $esc_right;?>--></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-6 col-md-offset-3">
                                                    <button type="button" class="form-control btn-danger" onclick="CancView('NSec','SecSis','RESi');">Cancelar registro de secundaria</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <button type="submit" name="actualizar" id="enviar" class="form-control btn btn-success active"><i class="fas fa-check"></i> Actualizar</button>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <a href="Principal_Prof.php" class="form-control btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span> Cancelar</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../Funcionamiento/Javascripts/ver-foto.js"></script>
    <script src="../../Funcionamiento/Javascripts/Crear_Curso.js"></script>
    <script type="text/javascript" src="../../CmpVis/jquery/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../../CmpVis/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script>
        $(
            function()
            {
                var ruta= "<?php echo $RutaImg; ?>";
                document.getElementById('list').innerHTML = '<img src="../../imagenes'+ruta+'" alt="Foto de perfil" />';
                document.getElementById('enviar').disabled=true;
            }            
        );

        function HabSub()
        {
            var FormElems=document.getElementsByClassName('DatoEnt');
            for (cont=0;cont<FormElems.length;cont++) 
            {
                if(FormElems[cont].value!=""||FormElems[cont].value!=null||FormElems[cont].value!="N/A")
                {
                    document.getElementById('enviar').disabled=false;
                }
            }
        }
    </script>
    </body>
</html>