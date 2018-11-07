<?php
    require '../../Funcionamiento/PHPs/DelCur.php';
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
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1">
                            <input type="radio" name="BtnDel" id="BtnDel1" style="display: none;" value="1" onclick="ShowSec('PriCur','SegCur','TerCur','BtnDel1');">
                            <label class="btn btn-lg btn-success" for="BtnDel1">Ver cursos de primero</label>
                        </div>
                        <div class="col-md-3 col-md-offset-1">
                            <input type="radio" name="BtnDel" id="BtnDel2" style="display: none;" value="2" onclick="ShowSec('SegCur','PriCur','TerCur','BtnDel2');">
                            <label class="btn btn-lg btn-warning" for="BtnDel2">Ver cursos de segundo</label>
                        </div>
                        <div class="col-md-3 col-md-offset-1">
                            <input type="radio" name="BtnDel" id="BtnDel3" style="display: none;" value="3" onclick="ShowSec('TerCur','SegCur','PriCur','BtnDel3');">
                            <label class="btn btn-lg btn-primary" for="BtnDel3">Ver cursos de tercero</label>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="row text-center">
                        <button type="button" class="btn btn-lg btn-danger" onclick="DelSelGrad('BtnDel','PriCur','SegCur','TerCur');">
                            <i class="fas fa-eraser"></i> Limpiar seleccion de grado
                        </button>
                    </div>
                </div>
                <br>
                <div class="form-group text-center">
                    <h3>Estos son los cursos con los que cuentas:<br>Selecciona aquellos que deseas borrar</h3>
                </div>
                <div class="form-group" id="PriCur" style="display:none;">
                    <?php
                        $ArrConsul=array();
                        $sql1="select Curso.Nombre as CurNam, Materia.Nombre as MatNam, Grado.Valor as Grado from Curso ";
                        $sql2="inner join Materia on (Materia_ID=ID_Materia) inner join Grado on (Grado_ID=ID_Grado) ";
                        $sql3="inner join Profesor on (Profesor_ID=ID_Profesor) where ID_Grado=1 and Username='".$User."';";
                        $sql=$sql1.$sql2.$sql3;
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
                                    $Mat=$ArrConsul[$cols]['MatNam'];
                                    $Gra=$ArrConsul[$cols]['Grado'];
                                    $Resultado=CambNomMat($Mat,$Gra);
                                    $Sepa=explode(',',$Resultado);
                                    $ArrConsul[$cols]['MatNam']=$Sepa[0];
                                    $ArrConsul[$cols]['Grado']=$Sepa[1];
                                    echo '<div class="col-md-3 col-md-offset-1 text-center" style="border: 2px solid black; border-radius: 15px; background-color: lightgreen;">'.
                                            '<input type="radio" name="CurSelDel1" id="CurSel'.$cols.'" style="display: none;" value="'.$ArrConsul[$cols]['CurNam'].'">'.
                                            '<label for="CurSel'.$cols.'">'.$ArrConsul[$cols]['CurNam'].'<br>De la materia: '.$ArrConsul[$cols]['MatNam'].'<br> Del grado: '.
                                            $ArrConsul[$cols]['Grado'].'</label>'.
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
                                    <input type="submit" name="enviar" id="send" style="display: none;">
                                    <i class="fas fa-check"></i> Confirmar seleccion
                                </label>
                            </div>
                            <div class="col-md-3 col-md-offset-3">
                                <button type="button" class="btn btn-danger" onclick="DelSelCur('CurSelDel1');">
                                    <i class="fas fa-eraser"></i> Limpiar seleccion de grado
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group" id="SegCur" style="display:none;">
                    <?php
                        $ArrConsul=array();
                        $sql1="select Curso.Nombre as CurNam, Materia.Nombre as MatNam, Grado.Valor as Grado from Curso ";
                        $sql2="inner join Materia on (Materia_ID=ID_Materia) inner join Grado on (Grado_ID=ID_Grado) ";
                        $sql3="inner join Profesor on (Profesor_ID=ID_Profesor) where ID_Grado=2 and Username='".$User."';";
                        $sql=$sql1.$sql2.$sql3;
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
                                    $Mat=$ArrConsul[$cols]['MatNam'];
                                    $Gra=$ArrConsul[$cols]['Grado'];
                                    $Resultado=CambNomMat($Mat,$Gra);
                                    $Sepa=explode(',',$Resultado);
                                    $ArrConsul[$cols]['MatNam']=$Sepa[0];
                                    $ArrConsul[$cols]['Grado']=$Sepa[1];
                                    echo '<div class="col-md-3 col-md-offset-1 text-center" style="border: 2px solid black; border-radius: 15px; background-color: lightgreen;">'.
                                            '<input type="radio" name="CurSelDel2" id="CurSel'.$cols.'2" style="display: none;" value="'.$ArrConsul[$cols]['CurNam'].'">'.
                                            '<label for="CurSel'.$cols.'2">'.$ArrConsul[$cols]['CurNam'].'<br>De la materia: '.$ArrConsul[$cols]['MatNam'].'<br> Del grado: '.
                                            $ArrConsul[$cols]['Grado'].'</label>'.
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
                                    <input type="submit" name="enviar" id="send" style="display: none;">
                                    <i class="fas fa-check"></i> Confirmar seleccion
                                </label>
                            </div>
                            <div class="col-md-3 col-md-offset-3">
                                <button type="button" class="btn btn-danger" onclick="DelSelCur('CurSelDel2');">
                                    <i class="fas fa-eraser"></i> Limpiar seleccion de grado
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group" id="TerCur" style="display:none;">
                    <?php
                        $ArrConsul=array();
                        $sql1="select Curso.Nombre as CurNam, Materia.Nombre as MatNam, Grado.Valor as Grado from Curso ";
                        $sql2="inner join Materia on (Materia_ID=ID_Materia) inner join Grado on (Grado_ID=ID_Grado) ";
                        $sql3="inner join Profesor on (Profesor_ID=ID_Profesor) where ID_Grado=3 and Username='".$User."';";
                        $sql=$sql1.$sql2.$sql3;
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
                                    $Mat=$ArrConsul[$cols]['MatNam'];
                                    $Gra=$ArrConsul[$cols]['Grado'];
                                    $Resultado=CambNomMat($Mat,$Gra);
                                    $Sepa=explode(',',$Resultado);
                                    $ArrConsul[$cols]['MatNam']=$Sepa[0];
                                    $ArrConsul[$cols]['Grado']=$Sepa[1];
                                    echo '<div class="col-md-3 col-md-offset-1 text-center" style="border: 2px solid black; border-radius: 15px; background-color: lightgreen;">'.
                                            '<input type="radio" name="CurSelDel3" id="CurSel'.$cols.'3" style="display: none;" value="'.$ArrConsul[$cols]['CurNam'].'">'.
                                            '<label for="CurSel'.$cols.'3">'.$ArrConsul[$cols]['CurNam'].'<br>De la materia: '.$ArrConsul[$cols]['MatNam'].'<br> Del grado: '.
                                            $ArrConsul[$cols]['Grado'].'</label>'.
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
                                    <input type="submit" name="enviar" id="send" style="display: none;">
                                    <i class="fas fa-check"></i> Confirmar seleccion
                                </label>
                            </div>
                            <div class="col-md-3 col-md-offset-3">
                                <button type="button" class="btn btn-danger" onclick="DelSelCur('CurSelDel3');">
                                    <i class="fas fa-eraser"></i> Limpiar seleccion de grado
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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