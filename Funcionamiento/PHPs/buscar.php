<?php  
	session_start();
	require 'conexion.php';

	if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
	{
		header("location: ../../../../Acceso/FAcces.php");
	}
	$user = $_SESSION['Username'];

	$texto1 = "";
	$texto2="";
	$registros = "No se ha escrito nada en el buscador"."<br><br><br>";

	if(isset($_POST['enviar']))
	{
		$busqueda = $_POST['buscar'];

		if(empty($busqueda))
		{
			$registros = "No se ha escrito nada en el buscador"."<br>";
		}
		else
		{

			$sel = "SELECT * FROM estudiante WHERE Username LIKE '$busqueda' ";
			$resultado = $conexion->query($sel);

			if($resultado->num_rows >0)
			{
					$registros = '<p>Se cuenta con: '.$resultado->num_rows.' registros de alumnos con ese nombre o usuario.</p><br>';
					$registros .= 'Seleccione un alumno';
					while($filas = $resultado->fetch_assoc())
					{
						$texto1.=$filas['Nombre']." ".$filas['Ape_Pat']." ".$filas['Ape_Mat']." "."<input type='radio' name='est'>"."<hr>";
						$texto2=$filas['ID_Estudiante'];
					}
			}
			else
			{
				$registros = '<p>No se encontró ningún registro.</p>';
			}
		}
	}
?>