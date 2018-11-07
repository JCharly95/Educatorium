<?php
    require $_SERVER['DOCUMENT_ROOT'].'/Educatorium/Funcionamiento/PHPs/Conn_Ses/conexion.php';

    if(!isset($_SESSION['Username']) || empty($_SESSION['Username']))
    {
        header("location: ../../Acceso/FAcces.php");
    }

    $Opc_Profe='style="display: none;"';
    $user = $_SESSION['Username'];
    $Iden_Mat=$_SESSION['Mat'];
    $StatusCur="";
    $ID_Mat=0;

    if($_SESSION['Tip_User']=='Profe')
    {
        $Opc_Profe='';
    }
    
    $sql="select ID_Materia from Materia where Nombre='".$Iden_Mat."';";    
    if($consulta=$conexion->query($sql))
    {
        while($res=$consulta->fetch_assoc())
        {
            $ID_Mat=$res['ID_Materia'];
        }
    }
?>