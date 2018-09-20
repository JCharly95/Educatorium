<?php
    session_start();
    require '../../Funcionamiento/PHPs/conexion.php';
    require '../../Funcionamiento/PHPs/CDatosPad.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../../CmpVis/bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../../CmpVis/fontawesome-free-5.0.10/web-fonts-with-css/css/fontawesome-all.css">
        <link rel="stylesheet" type="text/css" href="../../Funcionamiento/Estilos_Extras/Pag_Pri_Est.css">
        <title>Padre</title>
    </head>
    <body>
        <div class="container"> 
            <div class="row title">                
                <div class="col-md-7">
                    <div class="panel panel-default">   
                        <div class="panel-heading" style="line-height: 2;">
                            <span style="color: orangered;"><b>Datos del padre de familia:</b></span>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3">
                                 <!--   <img src="../../imagenes/yt_1430920860.jpg" alt="Foto de perfil"/> -->
                                 <?php
                                    echo '<img src="../../imagenes/'.$RutaImg.'" alt="Foto de perfil"/>';
                                 ?>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label><i><u><b>Nombre del padre o tutor:</b></u></i></label>
                                            </div>
                                            <div class="col-md-6">
                                                <?php
                                                    echo '<label><b>'.$NomPad.'</b></label>';
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label><i><u><b>Nombre de usuario:</b></u></i></label>
                                            </div>
                                            <div class="col-md-6">
                                                <?php
                                                    echo '<label><b>'.$user.'</b></label>';
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label><i><u><b>Correo electronico:</b></u></i></label>
                                            </div>
                                            <div class="col-md-6">
                                                <?php
                                                    echo '<label><b>'.$DirCorr.'</b></label>';
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <a href="../../Funcionamiento/PHPs/Cer_Ses.php" class="btn btn-danger">Cerrar sesion &nbsp;&nbsp;<i class="fas fa-sign-out-alt"></i></a>
                </div>
                <div class="col-md-2">
                    <abbr title="Ayuda"><a href="#" id="help"><i class="fas fa-question-circle fa-4x"></i></a></abbr>
                </div>
                <!--<div class="form-group">
                <div class="row">
                    <div class="col-md-offset-1 OptionBar col-md-11 ">
                        <ul>
                          <li><a href="mod_info.php">Modificar Informacion</a></li>
                          
                          <li><a href="">Consultar Estadisticas de mi hijo</a></li>
                          <li><a href="../../Funcionamiento/PHPs/buscar.php">Realizar Parentesco</a></li>
                        </ul>
                    </div>                    
                </div>-->
                <div class="form-group">
                    <div class="row">
                        <div class="opciones">
                            <ul class="nav nav-justified">
                                <li><a href="mod_info.php">Modificar Informacion</a></li>
                                <li><a href="">Consultar Estadísticas de mi hijo</a></li>
                                <li><a href="buscar.php">Realizar Parentesco</a></li>
                            </ul>                        
                        </div>                    
                    </div>
                </div>
            </div>
            </div>
        </div>            
        <footer>
            @Copyright Educatorium 2018. Todos los derechos reservados
        </footer>
        <script type="text/javascript" src="../../CmpVis/jquery/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="../../CmpVis/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    </body>
</html>
