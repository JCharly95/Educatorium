<?php
session_start();

    require '../../Funcionamiento/PHPs/upd_profe.php';
    require '../../Funcionamiento/PHPs/CDatosProf.php';

    $mostrarModal = false;
    if(!isset($_COOKIE['mostrarModal']))
    {
      $expirar = 43200; //cada 12 horas expira y volverá a aparecer el modal
      setcookie('mostrarModal', 'SI', (time() + $expirar));
      $mostrarModal = TRUE;
    }
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
        .error {
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
      <div id="myModal" class="modal fade" role="dialog">
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
      <div class="page-header">
        <h1 class=" text-center text-capitalize">Actualizar Datos del Perfil  <a data-toggle="modal" href="#myModal" id="help"><i class="fas fa-question-circle fa-1x" style="color: #fff;"></i></a></h1></h1>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h1 class="lead text-primary">Información del perfil</h1>
        </div>        
        <div class="panel-body">
          <form action="<?php echo $_SERVER['PHP_SELF']; ?> " method="POST" autocomplete="off">
            <div class="form-group  col-md-6">
              <h3><span  class="label label-default">Nombre: </span><span class="error"> <?php echo $nom_err; ?></h3>
              <input type="text" name="nombre" class="form-control" onfocus="this.value='' " value="<?php echo $NomProf; ?>">
              <span class="help-block">Sólo letras y espacios en blanco.</span>
            </div>
            <div class="form-group col-md-6">
              <h3><span class="label label-default">Apellido Paterno: </span><span class="error"> <?php echo $app_err; ?></h3>
              <input type="text" name="ap_pat" class="form-control" onfocus="this.value='' " value="<?php echo $Ape_Pat;?>">
              <span class="help-block">Sólo letras y espacios en blanco.</span>
            </div>
            <div class="form-group col-md-6">
              <h3><span class="label label-default">Apellido Materno: </span><span class="error"> <?php echo $apm_err; ?></h3>
              <input type="text" name="ap_mat" class="form-control" onfocus="this.value='' " value="<?php echo $Ape_Mat;?>">
              <span class="help-block">Sólo letras y espacios en blanco.</span>
            </div>                  
            <div class="form-group col-md-6">
              <h3><span class="label label-default">Teléfono: </span><span class="error"> <?php echo $tel_err; ?></h3>
              <input type="text" name="tel" class="form-control" onfocus="this.value='' " value="<?php echo $tel;?>">
              <span class="help-block">El teléfono debe estar conformado por 8 o 10 números.</span>
            </div>                  
            <div class="form-group col-md-6">
              <h3><span class="label label-default">Correo: </span><span class="error"> <?php echo $cor_err; ?></h3>
              <input type="email" name="correo" class="form-control" onfocus="this.value='' " value="<?php echo $DirCorr;?>">
              <span class="help-block">Introduzca un correo válido. Ej. ejemplo@gmail.com</span>
            </div>            
            <div class="form-group col-md-6">
              <h3><span class="label label-default">Usuario: </span><span class="error"> <?php echo $us_err; ?></h3>
              <input type="text" name="usuario" class="form-control" onfocus="this.value='' " value="<?php echo $user;?>">
              <span class="help-block">Máximo 10 caracteres. Letras y números solamente.</span>
            </div>            
            <div class="form-group col-md-6">
              <h3><span class="label label-default">Contraseña: </span><span class="error"> <?php echo $pass_err; ?></h3>
              <input type="password" name="pass" class="form-control">
              <span class="help-block">Debe constar de al menos un dígito, mayúsculas y minúsculas (8 caracteres).</span>
            </div>
            <div class="form-group col-md-6">
              <h3><span class="label label-default">Fecha de nacimiento: </span><span class="error"> <?php echo $key_err; ?></h3>
              <input type="text" name="key" class="form-control" onfocus="this.value=''" value="<?php echo $fecha;?>">
              <p class="help-block">Ingrese un formato válido. Ej. 29/04/1997</p>
            </div>
            
            <div class="form-group col-md-6">
              <button type="submit" class="form-control btn btn-default active" name="actualizar" data-toggle="modal" data-target="#myModal">Actualizar</button>
            </div>
            <div class="form-group col-md-6">
                <a href="Principal_Pad.php" class="form-control btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span> Cancelar</a>
              </div>
          </form>
        </div>
      </div>
    </div>    

        <script type="text/javascript" src="../../CmpVis/jquery/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="../../CmpVis/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
        <?php if($mostrarModal === true) : ?>
        <script type="text/javascript">
          $(document).ready(function()
          {
            $('#myModal').modal("show");
          });
        </script>
      <?php endif; ?>
    </body>
</html>