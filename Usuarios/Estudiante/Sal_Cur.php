<?php
    require '../../Funcionamiento/PHPs/CDelCur_Est.php';
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
        <link rel="stylesheet" type="text/css" href="../../Funcionamiento/Estilos_Extras/Registro.css">
        <title>Profesor</title>
    </head>
    <body>
        <div class="container">
            <div class="form-group">
                <div class="row text-center">
                    <h1>Selecciona una opcion disponible:</h1>
                </div>                        
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group text-center">
                    <h3>Estos son los cursos con los que cuentas:<br>Selecciona aquellos que deseas borrar</h3>
                    <br>
                </div>
                <div class="form-group" id="PriCur">
                    <?php
                        for($fils=0;$fils<count($Cursos);$fils++)
                        {
                            echo '<div class="form-group">'.
                                    '<div class="row">';
                                    echo '<div class="col-md-3 col-md-offset-1 text-center" style="border: 2px solid black; border-radius: 15px; background-color: lightgreen;">'.
                                            '<input type="radio" name="CurSelDel" id="CurSel'.$fils.'" style="display: none;" value="'.$Cursos[$fils][0].'">'.
                                            '<label for="CurSel'.$fils.'">'.$Cursos[$fils][1].'</label>'.
                                        '</div>';
                            echo    '</div>'.
                            '</div>';
                        }
                    ?>
                    <br><br>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-md-offset-2">
                                <label class="btn btn-success">
                                    <input type="submit" name="enviar" id="send" style="display: none;">
                                    <i class="fas fa-check"></i> Confirmar seleccion
                                </label>
                            </div>
                            <div class="col-md-3 col-md-offset-3">
                                <button type="button" class="btn btn-danger" onclick="DelSelCur('CurSelDel');">
                                    <i class="fas fa-eraser"></i> Limpiar seleccion de grado
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="form-group">
                <div class="col-md-3 col-md-offset-5 regreso">
                    <a href="#" class="btn btn-danger" onclick="javascript:window.history.back();">
                        <i class="fas fa-arrow-left"></i> Regresar</a>
                </div>
            </div>
        </div>
        <footer>
            @Copyright Educatorium 2018. Todos los derechos reservados
        </footer>
        <script type="text/javascript" src="../../CmpVis/jquery/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="../../Funcionamiento/Javascripts/Del_Curso.js"></script>
	    <script type="text/javascript" src="../../CmpVis/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    </body>
</html>