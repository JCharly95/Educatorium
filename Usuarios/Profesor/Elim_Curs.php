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
            <div class="form-group">
                <div class="row text-center">
                    <h1>Selecciona una opcion disponible:</h1>
                </div>                        
            </div>
            <div class="form-group">
                <form action="../../Funcionamiento/PHPs/DelCur.php" method="POST">
                    <div class="row">
                        <div class="BtnPri">
                            <div class="col-md-3">
                                <button type="submit" name="BtnDel" value="primero" class="btn btn-lg btn-success"></i>&nbsp; Eliminacion de 
                                    las materias de primero</button>
                            </div>
                        </div>
                        <div class="BtnSeg">
                            <div class="col-md-3 col-md-offset-1">
                                <button type="submit" name="BtnDel" value="segundo" class="btn btn-lg btn-warning"></i>&nbsp; Eliminacion de 
                                las materias de segundo</button>
                            </div>
                        </div>
                        <div class="BtnTer">
                            <div class="col-md-3 col-md-offset-1">
                                <button type="submit" name="BtnDel" value="tercero" class="btn btn-lg btn-primary"></i>&nbsp; Eliminacion de 
                                las materias de tercero</button>
                            </div>
                        </div>                    
                    </div>
                </form>                
            </div>
            <div class="form-group text-center">
                <h3>Estos son los cursos con los que cuentas:<br>Selecciona aquellos que deseas borrar</h3>
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
	    <script type="text/javascript" src="../../CmpVis/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    </body>
</html>