<?php  
  require '../../Funcionamiento/PHPs/CDatosProf.php';
  //require '../../Funcionamiento/PHPs/conexion.php';
  //require '../../Funcionamiento/PHPs/CDatosEst.php';
  require '../../Funcionamiento/PHPs/upd_profe.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../CmpVis/bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../CmpVis/fontawesome-free-5.0.10/web-fonts-with-css/css/fontawesome-all.css">
  <!--  <link rel="stylesheet" type="text/css" href="../../Funcionamiento/Estilos_Extras/Pag_Pri_Est.css">
      --><title>Padre</title>
    <style type="text/css">
      .error
      {
        color: red;
        font-style: italic;
        font-size: 12px;
        font-weight: 700;
        margin-left: 30px; 
      }
      input[type=text]:focus, input[type=email]:focus, input[type=password]:focus {
          border: 2px solid #333;
      }    
      </style>
  </head>
  <body class="bg-primary">
    <div class="container">
      <div class="page-header">
        <h1 class="text-danger text-center text-capitalize">Actualizar Datos del Perfil</h1>
      </div>
      <div class="alert alert-info alert-dismissible fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <p><span class="glyphicon glyphicon-info-sign"></span> Seleccione el campo que desee modificar. Una vez realizado el cambio, de clic en el botón que dice <strong>Actualizar.</strong></p>
      </div>
      <div class="alert alert-warning alert-dismissible fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <p><span class="glyphicon glyphicon-warning-sign"></span> La contraseña no se muestra debido a la privacidad.</p>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h1 class="lead text-primary">Información del perfil</h1>
        </div>        
        <div class="panel-body">
          <form action="<?php echo $_SERVER['PHP_SELF']; ?> " method="POST" autocomplete="off">
            <div class="form-group  col-md-6">
              <h3><span  class="label label-default">Nombre: </span></h3>
              <input type="text" name="nombre" class="form-control" onfocus="this.value='' " placeholder="<?php echo $NomProf; ?>">
              <span class="help-block">Sólo letras y espacios en blanco.</span>
              <span> <?php echo $nom_err; ?> </span>
            </div>
            <div class="form-group col-md-6">
              <h3><span class="label label-default">Apellido Paterno: </span></h3>
              <input type="text" name="ap_pat" class="form-control" onfocus="this.value='' " placeholder="<?php echo $Ape_Pat;?>">
              <span class="help-block">Sólo letras y espacios en blanco.</span>
              <span> <?php echo $app_err; ?> </span>
            </div>
            <div class="form-group col-md-6">
              <h3><span class="label label-default">Apellido Materno: </span></h3>
              <input type="text" name="ap_mat" class="form-control" onfocus="this.value='' " placeholder="<?php echo $Ape_Mat;?>">
              <span class="help-block">Sólo letras y espacios en blanco.</span>
              <span> <?php echo $apm_err; ?> </span>
            </div>                  
            <div class="form-group col-md-6">
              <h3><span class="label label-default">Teléfono: </span></h3>
              <input type="text" name="tel" class="form-control" onfocus="this.value='' " placeholder="<?php echo $NumTele;?>">
              <span class="help-block">El teléfono debe estar conformado por 8 o 10 números.</span>
              <span> <?php echo $tel_err; ?> </span>
            </div>                  
            <div class="form-group col-md-6">
              <h3><span class="label label-default">Correo: </span></h3>
              <input type="email" name="correo" class="form-control" onfocus="this.value='' " placeholder="<?php echo $DirCorr;?>">
              <span class="help-block">Introduzca un correo válido. Ej. ejemplo@gmail.com</span>
              <span> <?php echo $cor_err; ?> </span>
            </div>            
            <div class="form-group col-md-6">
              <h3><span class="label label-default">Usuario: </span></h3>
              <input type="text" name="usuario" class="form-control" onfocus="this.value='' " placeholder="<?php echo $user;?>">
              <span class="help-block">Máximo 10 caracteres. Letras y números solamente.</span>
              <span> <?php echo $us_err; ?> </span>
            </div>            
            <div class="form-group col-md-6">
              <h3><span class="label label-default">Contraseña: </span></h3>
              <input type="password" name="pass" class="form-control">
              <span class="help-block">Debe constar de al menos un dígito, mayúsculas y minúsculas (8 caracteres).</span>
              <span> <?php echo $pass_err; ?> </span>
            </div>
            <div class="form-group col-md-6">
              <h3><span class="label label-default">Fecha de nacimiento: </span></h3>
              <input type="text" name="key" class="form-control" onfocus="this.value=''" placeholder="<?php echo $fecha;?>">
              <p class="help-block">Ingrese un formato válido. Ej. 29/04/1997</p>
            </div>
            
            <div class="form-group col-md-6">
              <button type="submit" class="form-control btn btn-default active" name="actualizar">Actualizar</button>
            </div>
            <div class="form-group col-md-6">
                <a href="Principal_Prof.php" class="form-control btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span> Cancelar</a>
              </div>
          </form>
        </div>
      </div>
    </div>    

        <script type="text/javascript" src="../../CmpVis/jquery/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="../../CmpVis/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    </body>
</html>