<?php
    require '../../../Funcionamiento/PHPs/Carga_Datos/Dat_Esc/CMaterias.php';
    $_SESSION['Mat']='Espa 1';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../../../CmpVis/bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../../../CmpVis/fontawesome-free-5.0.10/web-fonts-with-css/css/fontawesome-all.css">
        <link rel="stylesheet" type="text/css" href="../../../Funcionamiento/Estilos_Extras/Pag_Pri_Est.css">
        <title>Espa&ntilde;ol 1</title>
    </head>
    <body>
        <div class="container">
            <div class="form-group">
                <div class="row title">
                    <div class="col-md-10">
                        <h1 align="center">Estos son los cursos disponibles para: Español I</h1>
                    </div>
                    <div class="col-md-2">
                        <abbr title="Ayuda"><a href="#" id="help" onclick="MostrarAyuda();"><i class="fas fa-question-circle fa-4x"></i></a></abbr>
                    </div>
                </div>
            </div>
            <?php
                $ArrConsul=array();
                $sql="select curso.Nombre as NomCur, profesor.Nombre as NomProf, Ape_Pat from curso inner join profesor on (Profesor_ID=ID_Profesor);";
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
                            echo '<a href="">'.
                                '<div class="col-md-3 col-md-offset-1 text-center" style="border: 2px solid black; border-radius: 15px; background-color: lightgreen;">'.
                                    '<span>'.$ArrConsul[$cols]['NomCur'].'<br>Impartido por: '.$ArrConsul[$cols]['NomProf'].' '.$ArrConsul[$cols]['Ape_Pat'].'</span>'.
                                '</div>'.
                                 '</a>';
                        }
                        echo    '</div>'.
                        '</div>';
                    }                    
                }
            ?>
            <div class="form-group" <?php echo $Opc_Profe; ?>>
                <div class="col-md-3 col-md-offset-2">
                    <a href="../../../Usuarios/Profesor/Crear_Curso.php" class="btn btn-success"><i class="fas fa-plus-circle fa-2x"></i>&nbsp; <b>Crear Curso</b></a>
                </div>
                <div class="col-md-3 col-md-offset-3">
                    <a href="../../../Usuarios/Profesor/Edicion_Curso/Sel_Curso.php" class="btn btn-warning"><i class="fas fa-wrench fa-2x"></i>&nbsp; <b>Editar mis cursos</b></a>
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
	    <script type="text/javascript" src="../../../CmpVis/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    </body>
</html>