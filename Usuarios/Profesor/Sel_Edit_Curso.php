<?php
    require '../../Funcionamiento/PHPs/CEsp1.php';
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
        <title>Editar cursos</title>
    </head>
    <body>
        <div class="container">
            <div class="form-group">
                <div class="row title">
                    <div class="col-md-10">
                        <h1 align="center">Selecciona el curso que deseas editar</h1>
                    </div>
                    <div class="col-md-2">
                        <abbr title="Ayuda"><a href="#" id="help" onclick="MostrarAyuda();"><i class="fas fa-question-circle fa-4x"></i></a></abbr>
                    </div>
                </div>
            </div>
            <form action="Edit_Curso.php" method="post">
                <?php
                    $ArrConsul=array();
                    $sql="select curso.Nombre as NomCur, profesor.Nombre as NomProf, Ape_Pat from curso inner join profesor on (Profesor_ID=ID_Profesor) where Username='".$user."';";
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
                                <input type="submit" name="enviar" style="display: none;">
                                <i class="fas fa-check"></i> Confirmar seleccion
                            </label>                                    
                        </div>
                        <div class="col-md-3 col-md-offset-3">
                            <label class="btn btn-danger">
                                <input type="reset" style="display: none;">
                                <i class="fas fa-times"></i> Limpiar seleccion
                            </label>                                    
                        </div>
                    </div>                            
                </div>
            </form>
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
	    <script type="text/javascript" src="../../../CmpVis/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    </body>
</html>