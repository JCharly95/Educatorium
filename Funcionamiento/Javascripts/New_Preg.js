function SelResp(OpcSel)
{
    if(OpcSel==1)
    {
        document.getElementById('RespTip1').style.display='block';
        document.getElementById('RespTip2').style.display='none';
        document.getElementById('RespTip3').style.display='none';
        document.getElementById('RespTip4').style.display='none';
        document.getElementById('RespTip5').style.display='none';
        document.getElementById('RespTip6').style.display='none';
        document.getElementById('RespTip7').style.display='none';
    }

    if(OpcSel==2)
    {
        document.getElementById('RespTip1').style.display='none';
        document.getElementById('RespTip2').style.display='block';
        document.getElementById('RespTip3').style.display='none';
        document.getElementById('RespTip4').style.display='none';
        document.getElementById('RespTip5').style.display='none';
        document.getElementById('RespTip6').style.display='none';
        document.getElementById('RespTip7').style.display='none';
    }

    if(OpcSel==3)
    {
        document.getElementById('RespTip1').style.display='none';
        document.getElementById('RespTip2').style.display='none';
        document.getElementById('RespTip3').style.display='block';
        document.getElementById('RespTip4').style.display='none';
        document.getElementById('RespTip5').style.display='none';
        document.getElementById('RespTip6').style.display='none';
        document.getElementById('RespTip7').style.display='none';
    }

    if(OpcSel==4)
    {
        document.getElementById('RespTip1').style.display='none';
        document.getElementById('RespTip2').style.display='none';
        document.getElementById('RespTip3').style.display='none';
        document.getElementById('RespTip4').style.display='block';
        document.getElementById('RespTip5').style.display='none';
        document.getElementById('RespTip6').style.display='none';
        document.getElementById('RespTip7').style.display='none';
    }

    if(OpcSel==5)
    {
        document.getElementById('RespTip1').style.display='none';
        document.getElementById('RespTip2').style.display='none';
        document.getElementById('RespTip3').style.display='none';
        document.getElementById('RespTip4').style.display='none';
        document.getElementById('RespTip5').style.display='block';
        document.getElementById('RespTip6').style.display='none';
        document.getElementById('RespTip7').style.display='none';
    }

    if(OpcSel==6)
    {
        document.getElementById('RespTip1').style.display='none';
        document.getElementById('RespTip2').style.display='none';
        document.getElementById('RespTip3').style.display='none';
        document.getElementById('RespTip4').style.display='none';
        document.getElementById('RespTip5').style.display='none';
        document.getElementById('RespTip6').style.display='block';
        document.getElementById('RespTip7').style.display='none';
    }

    if(OpcSel==7)
    {
        document.getElementById('RespTip1').style.display='none';
        document.getElementById('RespTip2').style.display='none';
        document.getElementById('RespTip3').style.display='none';
        document.getElementById('RespTip4').style.display='none';
        document.getElementById('RespTip5').style.display='none';
        document.getElementById('RespTip6').style.display='none';
        document.getElementById('RespTip7').style.display='block';
    }
}

//Determinar cuantas listas de opciones se van a mostrar para el completado de la oracion
function CantList_Opc(Pregunta) 
{
    var Cadena=document.getElementById(Pregunta).value;
    var Cadena1=Cadena;
    //Contar cuantas palabras hay en la pregunta para evitar varios guion bajo seguidos
    //Cadena1=Cadena1.replace(/^(_)\1{4}$/," ");
    //Convierte a espacios todos los guion bajo
    Cadena1=Cadena1.replace(/^_+$/," ");
    //Reemplazar los saltos de lineas por espacios
    Cadena1=Cadena1.replace(/\r?\n/g," ");
    //Reemplazar los espacios seguidos por uno solo
    Cadena1=Cadena1.replace(/[ ]+/g," ");
    //Quitar espacios de principio y final
    Cadena1=Cadena1.replace(/^ /,"");
    Cadena1=Cadena1.replace(/ $/,"");
    //Se separa el texto por los espacios
    var Espacios=Cadena1.split(" ");
    //Si se cuenta con mas de una palabra puede proceder a completar
    if(Espacios.length>1)
    {
        var CantCarac=[];
        for (var cont=0;cont<Cadena.length;cont++) 
        {
            if(Cadena[cont]==="_")
                CantCarac.push(cont);
        }

        switch (CantCarac.length) 
        {
            case 0:
            document.getElementById('Lista1').style.display='none';
            document.getElementById('Lista2').style.display='none';
            document.getElementById('Lista3').style.display='none';
            document.getElementById('Lista4').style.display='none';
            document.getElementById('Lista5').style.display='none';
            alert('Error: favor de incluir por lo menos un guion bajo para mostrar una lista');
            break;

            case 1:
            document.getElementById('Lista1').style.display='block';
            break;

            case 2:
            document.getElementById('Lista1').style.display='block';
            document.getElementById('Lista2').style.display='block';
            break;

            case 3:
            document.getElementById('Lista1').style.display='block';
            document.getElementById('Lista2').style.display='block';
            document.getElementById('Lista3').style.display='block';
            break;

            case 4:
            document.getElementById('Lista1').style.display='block';
            document.getElementById('Lista2').style.display='block';
            document.getElementById('Lista3').style.display='block';
            document.getElementById('Lista4').style.display='block';
            break;

            case 5:
            document.getElementById('Lista1').style.display='block';
            document.getElementById('Lista2').style.display='block';
            document.getElementById('Lista3').style.display='block';
            document.getElementById('Lista4').style.display='block';
            document.getElementById('Lista5').style.display='block';
            break;
                
            default:
                alert('Error no se puede incluir mas de 5 listas de opciones, favor de reducir su cantidad de completado');
                break;
        }
    }
    else
    {
        alert('Favor de incluir al menos una palabra');
    }
}

function BloqOrdSel(Pos,SecInvo)
{
    switch (SecInvo) 
    {
        case "Res51":
            document.getElementById('Res52').options[Pos].disabled = true;
            document.getElementById('Res53').options[Pos].disabled = true;
            document.getElementById('Res54').options[Pos].disabled = true;
            document.getElementById('Res55').options[Pos].disabled = true;
            break;

        case "Res52":
            document.getElementById('Res51').options[Pos].disabled = true;
            document.getElementById('Res53').options[Pos].disabled = true;
            document.getElementById('Res54').options[Pos].disabled = true;
            document.getElementById('Res55').options[Pos].disabled = true;
            break;

        case "Res53":
            document.getElementById('Res51').options[Pos].disabled = true;
            document.getElementById('Res52').options[Pos].disabled = true;
            document.getElementById('Res54').options[Pos].disabled = true;
            document.getElementById('Res55').options[Pos].disabled = true;
            break;
    
        case "Res54":
            document.getElementById('Res51').options[Pos].disabled = true;
            document.getElementById('Res52').options[Pos].disabled = true;
            document.getElementById('Res53').options[Pos].disabled = true;
            document.getElementById('Res55').options[Pos].disabled = true;
            break;

        case "Res55":
            document.getElementById('Res51').options[Pos].disabled = true;
            document.getElementById('Res52').options[Pos].disabled = true;
            document.getElementById('Res53').options[Pos].disabled = true;
            document.getElementById('Res54').options[Pos].disabled = true;
            break;
    }
}