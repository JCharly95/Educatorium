<?php
    //Colocar require con el archivo php para la creacion de un curso
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Registro</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../../CmpVis/bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../../CmpVis/fontawesome-free-5.0.10/web-fonts-with-css/css/fontawesome-all.css">
        <link rel="stylesheet" type="text/css" href="../../Funcionamiento/Estilos_Extras/Registro.css">
    </head>
    <body>
        <div class="container">
            <div class="row title">
                <div class="col-md-10">
                    <h3 align="center">Introduzca los datos solicitados para crear un curso</h3>
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
                    <form name="NewCurso" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="panel panel-success">
                                            <div class="panel-heading">
                                                <b>Paso 1: Por favor, escriba el nombre que llevar&aacute; el curso 
                                                <label class=" label label-danger">*</label></b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 col-md-offset-2">
                                                <label for="Name">Nombre: </label>
                                            </div>                                            
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="nombre" id="Name" placeholder="" value="">
                                            </div>
                                            <div class="col-md-3">
                                                <span class="error"><?php //echo $nom_err;?></span>
                                                <span class="bien"><?php //echo $nom_right;?></span>
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="panel panel-success">
                                            <div class="panel-heading">
                                                <b>Paso 2: Ingrese un mensaje de bienvenida</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 col-md-offset-2">
                                                <label for="files">Imagen del mensaje de bienvenida:</label>
                                            </div>
                                            <div class="col-md-4">
                                                <output id="list">
                                                    
                                                </output>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="btn btn-primary">
                                                    <input type="file" id="files" name="imagen" style="display: none;" />
                                                    <i class="fas fa-plus-circle fa-2x"></i> &nbsp;Seleccionar imagen...
                                                </label>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <span class="error"> <?php //echo $Img_err;?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2 col-md-offset-2">
                                                <label for="MsgBien">Mensaje: </label>
                                            </div>                                            
                                            <div class="col-md-5">
                                                <textarea class="form-control" name="MsgBi" id="MsgBien"></textarea>
                                            </div>
                                            <div class="col-md-3">
                                                <span class="error"><?php //echo $app_err;?></span>
                                                <span class="bien"><?php //echo $pat_right;?></span>
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="panel panel-success">
                                            <div class="panel-heading">
                                                <b>Paso 3: ¿Desea ingresar una contraseña para el curso?</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="QuesPass">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-1 col-md-offset-4">
                                                    <label><input type="radio" name="Resp" value="Si" id="RSi" onclick="VerPass('NewCurso','Resp');"/> <b>Si</b></label>                                                    
                                                </div>
                                                <div class="col-md-1 radio-inline col-md-offset-2">
                                                    <label><input type="radio" name="Resp" value="No" id="RNo" onclick="VerPass('NewCurso','Resp');"/> <b>No</b></label>
                                                </div>
                                                <div class="col-md-3">
                                                    <span class="error"><?php// echo $esc_err;?></span>
                                                    <span class="bien"><?php// echo $esc_right;?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                        
                                    <div id="IntPass" style="display: none;">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2 col-md-offset-2">
                                                    <label for="pass">Contrase&ntilde;a:</label>
                                                </div>                                            
                                                <div class="col-md-5">
                                                    <input type="password" class="form-control" name="pass" id="pass" placeholder="Introduce tu contraseña" value="">
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="checkbox" onclick="showpass()"> Ver
                                                </div>
                                                <div class="col-md-2">                                                
                                                    <span class="error"><?php// echo $pass_err;?></span>
                                                    <span class="bien"><?php// echo $pas_right;?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2 col-md-offset-2">
                                                    <label for="cpass">Confirmacion de Contrase&ntilde;a:</label>
                                                </div>
                                                <div class="col-md-5">
                                                    <input type="password" class="form-control" name="cpass" id="cpass" placeholder="Introduce nuevamente tu contraseña" value="">
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="checkbox" onclick="showcpass()"> Ver
                                                </div>
                                                <div class="col-md-2">                                                
                                                    <span class="error"><?php// echo $cpa_err;?></span>
                                                    <span class="bien"><?php// echo $cpa_right;?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4 col-md-offset-4">
                                                    <button type="button" class="form-control btn-danger" onclick="CancContra();">Cancelar colocacion de contraseña</button>
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
                                    <a href="#" class="btn btn-danger" onclick="window.location.replace('../../Grados/Materias/Primero/Esp1.php')"><i class="fas fa-times"></i> Cancelar registro</a>
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
        <script src="../../Funcionamiento/Javascripts/Crear_Curso.js"></script>        
        <script src="../../Funcionamiento/Javascripts/ver-password.js"></script>
        <script type="text/javascript" src="../../CmpVis/jquery/jquery-3.3.1.js"></script>
	    <script type="text/javascript" src="../../CmpVis/bootstrap-3.3.7-dist/js/bootstrap.js"></script>        
    </body>
</html>