<?php
    require '../../Funcionamiento/PHPs/CDatosProf.php';
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
        <title>Profesor</title>
    </head>
    <body>
        <div class="container"> 
            <div class="row title">                
                <div class="col-md-7">
                    <div class="panel panel-default">   
                        <div class="panel-heading" style="line-height: 2;">
                            <span style="color: orangered;"><b>Datos del profesor:</b></span>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3">
                                 <?php
                                    echo '<img src="../../imagenes'.$RutaImg.'" alt="Foto de perfil"/>';
                                 ?>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label><i><u><b>Nombre del docente:</b></u></i></label>
                                            </div>
                                            <div class="col-md-6">
                                                <?php
                                                   echo '<label><b>'.$NomProf.'</b></label>';
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label><i><u><b>Secundaria donde labora:</b></u></i></label>
                                            </div>
                                            <div class="col-md-6">
                                                <?php
                                                    echo '<label><b>'.$NomEsc.'</b></label>';
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                        <div class="col-md-6">
                                                <label><i><u><b>Materias que imparte:</b></u></i></label>
                                            </div>
                                            <div class="col-md-6">
                                                <?php
                                                    echo '<label><b>'.$NomMatShow.'</b></label>';
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
            </div>
            <div class="form-group">
                <div class="row text-center">
                    <h1>Que tal, bienvenido</h1>   
                    <h4>Por favor, elija una de las opciones disponibles para comenzar</h4>
                </div>                        
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="BtnPri" <?php echo $BtnGrads[0];?>>
                        <div class="col-md-3 col-md-offset-1">
                            <a href="../../Grados/PrimerGra.php" class="btn btn-lg btn-success"><i class="fas fa-id-card"></i>&nbsp; Primero</a>
                        </div>
                    </div>
                    <div class="BtnSeg" <?php echo $BtnGrads[1];?>>
                        <div class="col-md-3 col-md-offset-1">
                            <a href="../../Grados/SegundoGra.php" class="btn btn-lg btn-warning"><i class="fas fa-id-badge"></i>&nbsp; Segundo</a>
                        </div>
                    </div>
                    <div class="BtnTer" <?php echo $BtnGrads[2];?>>
                        <div class="col-md-3 col-md-offset-1">
                            <a href="../../Grados/TercerGra.php" class="btn btn-lg btn-primary"><i class="fas fa-graduation-cap"></i>&nbsp; Tercero</a>
                        </div>
                    </div>                    
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="opciones">
                        <ul class="nav nav-justified">
                            <li><a href="mod_info.php">Modificar Informacion</a></li>
                            <li><a href="Matri_Mats.php">Matriculacion de materias</a></li>
                            <li><a href="Elim_Curs.php">Eliminacion de cursos</a></li>
                            <li><a href="">Consultar reportes de errores</a></li>
                        </ul>                        
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