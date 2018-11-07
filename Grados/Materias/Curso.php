<?php
    require '../../Funcionamiento/PHPs/Carga_Datos/CCurso.php';
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
    <title>Primero</title>
</head>
<body>
    <div class="container">
        <div class="row title">
            <div class="col-md-10">
                <h1 align="center">Bienvenidos a <?php echo $VerCur; ?></h1>
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
        <div class="form-group text-center">
            <?php echo $RutImgCur; ?>
        </div>
        <div class="form-group text-center">
            <?php echo $Msg; ?>
        </div>
        <div class="form-group text-center">
            <h3>Estos son los cuestionarios disponibles para <?php echo $VerCur; ?>:</h3>
            <br>
            <form action="" method="post">
                <?php
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
                            $sql="select Num_Preg_Cues as Num_Preg from Cuestionario inner join Pregunta on (Cuestionario_ID=ID_Cuestionario)"
                                ."where Cuestionario.Nombre='".$ArrConsul[$cols]['NomCuest']."';";
                                $consulta=$conexion->query($sql);
                                $ArrCant[$cols]=mysqli_num_rows($consulta);
                            echo '<div class="col-md-3 col-md-offset-1 text-center" style="border: 2px solid black; border-radius: 15px; background-color: lightgreen;">'.
                                    '<input type="radio" name="CurSelEdit"  id="CurSelEdit'.$cols.'" style="display: none;" value="'.$ArrConsul[$cols]['NomCuest'].'" onchange="this.form.submit();">'.
                                    '<label for="CurSelEdit'.$cols.'">'.$ArrConsul[$cols]['NomCuest'].'<br>Con: '.$ArrCant[$cols].' preguntas</label>'.
                                '</div>';
                        }
                        echo    '</div>'.
                        '</div>';
                    }
                ?>
            </form>
        </div>
        <br>
        <div class="form-group text-center">
            <a href="" class="btn btn-success" style="border-radius: 10px;"><i class="fas fa-download fa-3x"></i><b>&nbsp; Respaldar datos del curso</b></a>
        </div>
        <br>
        <div class="form-group text-center">
            <span>
                Si deseas conocer donde obtener la informacion necesaria para poder<br>
                responder los cuestionarios, te invitamos a consultar los recursos que<br>
                se muestran a continuacion:
            </span>
        </div>
        <br>
        <div class="form-group text-center">
            En esta seccion se mostraran los recursos de los cursos.
            <!--<div class="col-md-6">
                <iframe src="../../Documentos_Subidos/guia_de_tramites_ingenieria_ceti_anterior.pdf" style="width:500px; height:500px;" frameborder="0"></iframe>
            </div>
            <div class="col-md-6">
                <a href="../../Documentacion_Educatorium/Apuntes de Propuesta/14100539_13100715_Propuesta-Definitiva_1.3.docx">14100539_13100715_Propuesta-Definitiva_1.3.docx</a>
            </div>-->
        </div>
        <br>
        <div class="form-group text-center">
            <a href="#" class="btn btn-danger" onclick="javascript:window.history.back();"><i class="fas fa-arrow-left"></i><b>&nbsp; Regresar a los cursos</b></a>
        </div>
    </div>
    <script type="text/javascript" src="../../CmpVis/jquery/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../../CmpVis/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
</body>
</html>