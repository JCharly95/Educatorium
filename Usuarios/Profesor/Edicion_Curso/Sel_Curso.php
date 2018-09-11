<?php
    session_start();
    require '../../../Funcionamiento/PHPs/Carga_Datos/Dat_Esc/CMaterias.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../../../CmpVis/bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../../../CmpVis/fontawesome-free-5.0.10/web-fonts-with-css/css/fontawesome-all.css">
        <link rel="stylesheet" type="text/css" href="../../../Funcionamiento/Estilos_Extras/Registro.css">
        <title>Editar cursos</title>
    </head>
    <body>
        <div class="container">
            <div class="form-group">
                <div class="row title">
                    <div class="col-md-10">
                        <h1 align="center">Hola que tal, bienvenido a Educatorium</h1>
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
                                <div class="modal-body" style="background-color: teal;">
                                    <h3 style="color: #fff;" class="text-center">¿Cómo puedo registrarme?</h3>
                                    <p style="color: gold;" class="lead">Para poder registrarte, da clic en el botón que dice: Nuevo.</p>
                                    <h3 style="color: #fff;" class="text-center">¿Cómo puedo iniciar sesión?</h3>
                                    <p style="color: gold;" class="lead">Para iniciar sesión, da clic en el botón que dice: Registrado.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-dismiss="modal">Entendido</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form action="Sel_Seccion.php" method="post">
                <?php
                    $ArrConsul=array();
                    $sql="select curso.Nombre as NomCur, profesor.Nombre as NomProf, Ape_Pat from curso inner join profesor on (Profesor_ID=ID_Profesor) where Username='".$user."' and Materia_ID=".$ID_Mat.";";
                    $consulta=$conexion->query($sql);
                    if($consulta->num_rows>0)    
                    {
                        $cont=0;
                        while($res=$consulta->fetch_assoc())
                        {
                            $ArrConsul[$cont]=$res;
                            $cont++;
                        }
                        for($fils=0;$fils<$cont/3;$fils++)
                        {
                            echo '<div class="form-group">'.
                                '<div class="row">';
                            for($cols=$fils*3,$cont1=0;$cont1<=2;$cols++,$cont1++)
                            {
                                if($cols==$cont)
                                {
                                    break;
                                }
                                echo '<div class="col-md-3 col-md-offset-1 text-center" style="border: 2px solid black; border-radius: 15px; background-color: lightgreen;">'.
                                        '<label><input type="radio" name="CurSelEdit" value="'.$ArrConsul[$cols]['NomCur'].'"> '.$ArrConsul[$cols]['NomCur'].'<br>Impartido por: '.$ArrConsul[$cols]['NomProf'].' '.$ArrConsul[$cols]['Ape_Pat'].'</label>'.
                                    '</div>';
                            }
                            echo    '</div>'.
                            '</div>';
                        }                    
                    }
                ?>
                <br><br>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-2">
                            <label class="btn btn-success">
                                <input type="submit" name="enviar" id="send" style="display: none;" onclick="return RevSel();">
                                <i class="fas fa-check"></i> Confirmar seleccion
                            </label>                                    
                        </div>
                        <div class="col-md-3 col-md-offset-3">
                            <label class="btn btn-danger">
                                <input type="reset" style="display: none;">
                                <i class="fas fa-eraser"></i> Limpiar seleccion
                            </label>                                    
                        </div>
                    </div>                            
                </div>
            </form>
            <div id="AdErr" class="modal fade" role="dialog">
                <div class="modal-dialog" style="padding-top: 50px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title text-danger text-center">Error</h3>
                        </div>
                        <div class="modal-body" style="background-color: silver;">
                            <label class="label label-danger">Favor de seleccionar un de los cursos para editar</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Entendido</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3 col-md-offset-5 regreso">
                    <a href="#" class="btn btn-danger" onclick="javascript:window.history.back();"><i class="fas fa-arrow-left"></i> Regresar</a>
                </div>
            </div>
        </div>
        <footer>
            @Copyright Educatorium 2018. Todos los derechos reservados
        </footer>
        <script type="text/javascript" src="../../../CmpVis/jquery/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="../../../Funcionamiento/Javascripts/Sel_Curso.js"></script>
        <script type="text/javascript" src="../../../CmpVis/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    </body>
</html>