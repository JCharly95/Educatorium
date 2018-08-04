<?php 
    $conexion = new mysqli('localhost', 'root', '', 'proy_educatorium');
    $conexion->set_charset("utf-8");
    if($conexion->connect_error)
    {
	echo "<script>alert('Error al conectar con la base de datos');</script>";
    }
    else
    {
//	echo "<script>alert('conexion exitosa');</script>";        
    }
