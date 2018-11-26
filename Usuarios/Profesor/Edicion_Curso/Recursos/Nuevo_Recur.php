<?php
    //require '../../../../Funcionamiento/PHPs/Carga_Datos/CEdicion_Cur.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../../CmpVis/bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../../CmpVis/fontawesome-free-5.0.10/web-fonts-with-css/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="../../../../Funcionamiento/Estilos_Extras/Registro.css">
    <title>Editando...</title>
</head>
<body class="bg-primary">
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-10">
                        <h3 align="center">Seleccione la opcion que desea crear o modificar</h3>
                    </div>
                    <div class="col-md-2">
                        <a data-toggle="modal" href="#ayuda"><i class="fas fa-question-circle fa-4x"></i></a>
                    </div>
                    <div id="ayuda" class="modal fade" role="dialog">
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
                <div class="alert alert-warning alert-dismissible fade in">
                    <!--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
                    <p><span class="glyphicon glyphicon-info-sign"></span> Seleccione el campo que desee modificar. Una vez realizado el cambio, de clic en el botón que dice <strong>Actualizar.</strong></p>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <span class="lead text-primary">Edicion de cuestionario</span>
                    </div>
                    <div class="panel-body">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <table class="table table-borderless">
                                <thead class="thead-dark">
                                    <tr>
                                        <th><span class="fas fa-file"></span>&nbsp;Archivo</th>
                                        <th><span class="far fa-sticky-note"></span>&nbsp;Notas</th>
                                        <th><span class="fas fa-info-circle"></span>&nbsp;Ver</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php
                                            foreach($docs as $docs){
                                                echo '<tr>';
                                                echo '<td>' . $docs['name'] . '</td>';
                                                echo '<td>' . $docs['note'] . '</td>';
                                                echo '<td><a href="'.$docs['documentPath'].'"><button class="btn btn-outline-primary">Ver</button></a></td>';
                                                echo '</tr>';
                                            }
                                        ?>
                                </tbody>
                            </table>
                            <?php $config = array('class' => 'was-validated'); echo form_open_multipart('Records/upLoadFile',$config); ?>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="validatedCustomFile" required name="file" accept="application/pdf">
                                    <label class="custom-file-label" for="validatedCustomFile">Eligue un archivo...</label>
                                </div>
                                <br><br>
                                <div class="form-group">
                                    <textarea class="form-control" name="note" id="note" rows="3"></textarea>
                                    <input type="text" name="slug" value="<?php echo $slug; ?>" hidden>
                                    <input type="text" name="type" value="1" hidden>
                                    <br>
                                    <div class="text-center"><input type="submit" value="Guardar" name="submit" class="btn btn-outline-primary"></div>
                                </div>
                            <?php echo form_close(); ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../../../../CmpVis/jquery/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../../../../CmpVis/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
</body>
</html>