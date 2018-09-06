<?php
	session_start();
	require $_SERVER['DOCUMENT_ROOT'].'/Educatorium/Funcionamiento/PHPs/Conn_Ses/conexion.php';

	if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
	{
		header("location: ../../../../Acceso/FAcces.php");
	}
	$user = $_SESSION['Username'];
	if(isset($_POST['enviar']))
	{
		$radio=$_POST['est'];
		$id=$_POST['id'];

			$sel2 = "SELECT * FROM padre WHERE Username =  '$user' ";
			$res = $conexion->query($sel2);

			if($res->num_rows > 0)
			{
				while($row = $res->fetch_assoc())
				{
					$fila1 = $row['ID_Padre'];
				}
			}
/*			$id=$_GET['id'];
			$ins = "INSERT INTO padre_estudiante (Padre_ID, Estudiante_ID) VALUES ($fila1, $id)";

			if($conexion->query($ins) === TRUE)
			{*/
				echo "<script>alert('Se mando la solicitud');window.location.href='../../Usuarios/Padre/buscar.php';</script>";
			/*}
			else
			{
				echo "<script>alert('No se mando la solicitud');window.location.href='../../Usuarios/Padre/buscar.php';</script>";
			}*/
	}
?>