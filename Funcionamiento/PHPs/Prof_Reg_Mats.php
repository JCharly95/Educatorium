<?php
    require $_SERVER['DOCUMENT_ROOT'].'/Educatorium/Funcionamiento/PHPs/Conn_Ses/conexion.php';

    //Variables del sistema
    $GradPri = $GradSeg = $GradTer = "";
    $PriMat1 = $PriMat2 = $PriMat3 = $PriMat4 = $PriMat5 = $PriMat6 = $PriMat7 = "";
    $SegMat1 = $SegMat2 = $SegMat3 = $SegMat4 = $SegMat5 = $SegMat6 = "";
    $TerMat1 = $TerMat2 = $TerMat3 = $TerMat4 = $TerMat5 = $TerMat6 = "";
    $Mat1 = $Mat2 = $Mat3 = false;
    
    //Variables de errores y aciertos en la validacion
    $Gr_right = $Mat_right = "";
    $Gr_err = $Mat_err = "";

    if(isset($_POST['enviar']))
    {
    //Verificacion de campos existentes y no nulos (para evitar el notice de php), ademas de su asignacion
        //Variables de seleccion de los grados
        if(isset($_POST['PriGrad']))//Primer grado
            $GradPri=$_POST['PriGrad'];
        else
            $GradPri="";

        if(isset($_POST['SegGrad']))//Segundo grado
            $GradSeg=$_POST['SegGrad'];
        else
            $GradSeg="";

        if(isset($_POST['TerGrad']))//Tercers grado
            $GradTer=$_POST['TerGrad'];
        else
            $GradTer="";

        //Variables de las materias de primero
        if(isset($_POST['Pri1']))//Materia de primero 1
            $PriMat1=$_POST['Pri1'];
        else
            $PriMat1="";

        if(isset($_POST['Pri2']))//Materia de primero 2
            $PriMat2=$_POST['Pri2'];
        else
            $PriMat2="";

        if(isset($_POST['Pri3']))//Materia de primero 3
            $PriMat3=$_POST['Pri3'];
        else
            $PriMat3="";
        
        if(isset($_POST['Pri4']))//Materia de primero 4
            $PriMat4=$_POST['Pri4'];
        else
            $PriMat4="";

        if(isset($_POST['Pri5']))//Materia de primero 5
            $PriMat5=$_POST['Pri5'];
        else
            $PriMat5="";

        if(isset($_POST['Pri6']))//Materia de primero 6
            $PriMat6=$_POST['Pri6'];
        else
            $PriMat6="";

        if(isset($_POST['Pri7']))//Materia de primero 7
            $PriMat7=$_POST['Pri7'];
        else
            $PriMat7="";
            
        //Variables de las materias de segundo
        if(isset($_POST['Seg1']))//Materia de segundo 1
            $SegMat1=$_POST['Seg1'];
        else
            $SegMat1="";

        if(isset($_POST['Seg2']))//Materia de segundo 2
            $SegMat2=$_POST['Seg2'];
        else
            $SegMat2="";

        if(isset($_POST['Seg3']))//Materia de segundo 3
            $SegMat3=$_POST['Seg3'];
        else
            $SegMat3="";
        
        if(isset($_POST['Seg4']))//Materia de segundo 4
            $SegMat4=$_POST['Seg4'];
        else
            $SegMat4="";

        if(isset($_POST['Seg5']))//Materia de segundo 5
            $SegMat5=$_POST['Seg5'];
        else
            $SegMat5="";

        if(isset($_POST['Seg6']))//Materia de segundo 6
            $SegMat6=$_POST['Seg6'];
        else
            $SegMat6="";
            
        //Variables de las materias de tercero
        if(isset($_POST['Ter1']))//Materia de tercero 1
            $TerMat1=$_POST['Ter1'];
        else
            $TerMat1="";

        if(isset($_POST['Ter2']))//Materia de tercero 2
            $TerMat2=$_POST['Ter2'];
        else
            $TerMat2="";

        if(isset($_POST['Ter3']))//Materia de tercero 3
            $TerMat3=$_POST['Ter3'];
        else
            $TerMat3="";
        
        if(isset($_POST['Ter4']))//Materia de tercero 4
            $TerMat4=$_POST['Ter4'];
        else
            $TerMat4="";

        if(isset($_POST['Ter5']))//Materia de tercero 5
            $TerMat5=$_POST['Ter5'];
        else
            $TerMat5="";

        if(isset($_POST['Ter6']))//Materia de tercero 6
            $TerMat6=$_POST['Ter6'];
        else
            $TerMat6="";

        if(empty($GradPri) && empty($GradSeg) && empty($GradTer))//Si no se selecciono ningun grado, significa que no hay datos para validar
        {
            $Gr_err="* Favor de seleccionar al menos un grado";
        }
        else
        {
            $Gr_right="Ha seleccionado alguno de los grados";
            if(!empty($GradPri))//Si primero fue seleccionado, corroborar que hay por lo menos una materia seleccionada
            {
                if(empty($PriMat1) && empty($PriMat2) && empty($PriMat3) && empty($PriMat4) && empty($PriMat5) && empty($PriMat6) && empty($PriMat7))
                {
                    $Mat_err="* Favor de seleccionar al menos una materia de primer grado";
                }
                else
                {
                    $Mat_right = "Materia(s) de primer grado seleccionadas";
                }
            }

            if(!empty($GradSeg))//Si segundo fue seleccionado, corroborar que hay por lo menos una materia seleccionada
            {
                if(empty($SegMat1) && empty($SegMat2) && empty($SegMat3) && empty($SegMat4) && empty($SegMat5) && empty($SegMat6))
                {
                    $Mat_err="* Favor de seleccionar al menos una materia de segundo grado";
                }
                else
                {
                    $Mat_right = "Materia(s) de segundo grado seleccionadas";
                }
            }

            if(!empty($GradTer))//Si tercero fue seleccionado, corroborar que hay por lo menos una materia seleccionada
            {
                if(empty($TerMat1) && empty($TerMat2) && empty($TerMat3) && empty($TerMat4) && empty($TerMat5) && empty($TerMat6))
                {
                    $Mat_err="* Favor de seleccionar al menos una materia de tercer grado";
                }
                else
                {
                    $Mat_right = "Materia(s) de tercer grado seleccionadas";
                }
            }
        }

        //Saber que materias van a relacionarse con el profesor
        $ArrayPri=[$PriMat1,$PriMat2,$PriMat3,$PriMat4,$PriMat5,$PriMat6,$PriMat7];
        $ArraySeg=[$SegMat1,$SegMat2,$SegMat3,$SegMat4,$SegMat5,$SegMat6];
        $ArrayTer=[$TerMat1,$TerMat2,$TerMat3,$TerMat4,$TerMat5,$TerMat6];

        foreach ($ArrayPri as $Arrvalue)
        {
            if(!empty($Arrvalue))
            {
                MatProfe($Arrvalue,$Username,$conexion); //Se crean las relaciones con las materias de primero, solo si el valor del arreglo no esta vacio
            }
        }
        if(isset($Arrvalue))
        {
            $Mat1=true;
        }
        unset($Arrvalue);

        foreach ($ArraySeg as $Arrvalue)
        {
            if(!empty($Arrvalue))
            {
                MatProfe($Arrvalue,$Username,$conexion); //Se crean las relaciones con las materias de segundo, solo si el valor del arreglo no esta vacio
            }
        }
        if(isset($Arrvalue))
        {
            $Mat2=true;
        }
        unset($Arrvalue);

        foreach ($ArrayTer as $Arrvalue)
        {
            if(!empty($Arrvalue))
            {
                MatProfe($Arrvalue,$Username,$conexion); //Se crean las relaciones con las materias de tercero, solo si el valor del arreglo no esta vacio
            }
        }
        if(isset($Arrvalue))
        {
            $Mat3=true;
        }
        unset($Arrvalue);

        if($Mat1||$Mat2||$Mat3)
        {
            $_SESSION['Username']=$Username;
            echo "<script>alert('Sus materias seleccionadas han sido correctamente registradas, en un momento sera redirigido');</script>";
            echo '<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=../../Usuarios/Profesor/Principal_Prof.php">';
        }
    }

    function MatProfe($NomMat,$User,$conexion)
    {
        $IDMat="";
        $IDProfe="";
        $CnSav=0;

        $sql="Select ID_Materia from Materia where Nombre='".$NomMat."';";
        
        if($consulta=$conexion->query($sql))//Se busca el id de la materia para hacer crea la relacion con el profe
        {
            while($res=$consulta->fetch_assoc())
            {
                $IDMat=$res['ID_Materia'];
            }
            $consulta->free();
        }
        else
        {
            echo '<script>alert("No sabemos como paso esto pero, materia no encontrada");</script>';
        }

        $IDProfe=BusProfe($User,$conexion);

        if(!empty($IDMat)&&!empty($IDProfe))//Si ambos datos fueron encontrados, se procede a crear la relacion en la BD
        {
            $sql="Insert into Mat_Profe (Materia_ID,Profe_ID) values (".$IDMat.",".$IDProfe.");";
            //Se crea la relacion de la materia con el profesor
            $consulta=$conexion->query($sql);
        }
    }
?>