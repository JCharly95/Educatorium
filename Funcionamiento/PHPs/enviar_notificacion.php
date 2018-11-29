<?php
	session_start();
    require $_SERVER['DOCUMENT_ROOT'].'/Educatorium/Funcionamiento/PHPs/Conn_Ses/conexion.php';

    if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
		header("location: ../../Acceso/FAcces.php");
		
	$user = $_SESSION['Username'];

	if(isset($_POST['enviar']))
	{
		$radio=$_POST['est'];
		$id=$_POST['aidi'];

		$sel2="select ID_Padre from Padre where Username='".$user."';";
		$res = $conexion->query($sel2);
		if($res->num_rows > 0)
		{
			while($row = $res->fetch_assoc())
			{
				$fila1 = $row['ID_Padre'];
				//$_SESSION['ID_Padre'] = $fila1;
			}
		}
		//$id=$_GET['id'];
		$sel3="select * from Padre_Estudiante where Padre_ID=".$fila1." and Estudiante_ID=".$id.";";
		$res2 = $conexion->query($sel3);
		if($res2->num_rows == 0)
		{
			$ins="insert into Padre_Estudiante (Padre_ID, Estudiante_ID, Status) values (".$fila1.", ".$id.", 0);";
			if($conexion->query($ins) === TRUE)
				echo "bien";
			else
				echo "<script>alert('No se mando la solicitud');window.location.href='../../Usuarios/Padre/buscar.php';</script>";

			$ins2="insert into Status_Notificacion (Status) values (0);";
			if($conexion->query($ins2) === true)
				echo "<script>alert('Se mando la solicitud');window.location.href='../../Usuarios/Padre/buscar.php';</script>";
			else
				echo "<script>alert('No se mando la solicitud');window.location.href='../../Usuarios/Padre/buscar.php';</script>";
		}
		else
			echo "<script>alert('Usted ya tiene parentesco con este usuario');window.location.href='../../Usuarios/Padre/buscar.php';</script>";
	}
?>