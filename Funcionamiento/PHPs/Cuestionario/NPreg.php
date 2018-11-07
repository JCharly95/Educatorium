<?php
    session_start();
	require $_SERVER['DOCUMENT_ROOT'].'/Educatorium/Funcionamiento/PHPs/Conn_Ses/conexion.php';

	if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
	{
		header("location: ../../../../Acceso/FAcces.php");
    }
    
    $Tipo_Preg=$_POST['Tip_Preg'];
    $Pregunta=$_POST['Pregunta'];
    $Respuestas=array();
    $Cond_Altern=array();

    if(isset($_POST['enviar']))
    {
        //Se verifica que tipo de pregunta fue seleccionada para proceder con su respectivo procesamiento
        switch ($Tipo_Preg) 
        {
            case 1:
                # code...
                break;
            
            case 2:
                # code...
                break;

            case 3:
                # code...
                break;

            case 4:
                # code...
                break;

            case 5:
                # code...
                break;

            case 6:
                # code...
                break;

            case 7:
                # code...
                break;
                
            default:
                # code...
                break;
        }
    }
?>