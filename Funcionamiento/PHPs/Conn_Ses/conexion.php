<?php 
    $conexion = new mysqli('localhost', 'id7603036_juan', 'Passmysql2', 'id7603036_proy_educatorium');
    $conexion->set_charset("utf-8");
    if($conexion->connect_error)
    {
	    echo "<script>alert('Error al conectar con la base de datos');</script>";
    }
    
    /*else
    {
    	echo "<script>alert('conexion exitosa');</script>";        
    }*/
?>
