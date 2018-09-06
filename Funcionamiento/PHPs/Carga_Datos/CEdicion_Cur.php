<?php    
    session_start();
    require $_SERVER['DOCUMENT_ROOT'].'/Educatorium/Funcionamiento/PHPs/Conn_Ses/conexion.php';

    if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
    {
        header("location: ../../Acceso/FAcces.php");
    }

    $user = $_SESSION['Username'];//Nombre de usuario activo
    $CurBus=$_SESSION['NomCurBus'];//Nombre del curso que se va a editar
    $EBien = $NCuest = $ECuest = $NRecur = $ERecur = '';//Variables para el muestreo de seccion

    if(isset($_POST['OpcSel']))//Opcion seleccionada para edicion (Bienvenida, Cuestionarios, Recursos)
    {
        $DatEdit=$_POST['OpcSel'];
    }
    
    if(isset($_POST['enviar']))//Comenzar el procesamiento de datos una vez que ya se envio la opcion
    {
        //Averiguar que opcion se presiono para saber que seccion mostrar
        switch ($DatEdit)
        {
            case 'Elem Bienve':
                # code...
                break;
            
            case 'New Cuestion':
                # code...
                break;

            case 'Edit Cuestions':
                # code...
                break;
            
            case 'New Recurso':
                # code...
                break;

            case 'Edit Recursos':
                # code...
                break;
        }
    }

?>