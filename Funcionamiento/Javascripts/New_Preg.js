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

function BloqOrdSel(Pos,SecInvo)
{
    if(SecInvo=="Res51")
    {
        document.getElementById('Res52').options[Pos].disabled = true;
        document.getElementById('Res53').options[Pos].disabled = true;
        document.getElementById('Res54').options[Pos].disabled = true;
        document.getElementById('Res55').options[Pos].disabled = true;
    }

    if(SecInvo=="Res52")
    {
        document.getElementById('Res51').options[Pos].disabled = true;
        document.getElementById('Res53').options[Pos].disabled = true;
        document.getElementById('Res54').options[Pos].disabled = true;
        document.getElementById('Res55').options[Pos].disabled = true;
    }

    if(SecInvo=="Res53")
    {
        document.getElementById('Res51').options[Pos].disabled = true;
        document.getElementById('Res52').options[Pos].disabled = true;
        document.getElementById('Res54').options[Pos].disabled = true;
        document.getElementById('Res55').options[Pos].disabled = true;
    }

    if(SecInvo=="Res54")
    {
        document.getElementById('Res51').options[Pos].disabled = true;
        document.getElementById('Res52').options[Pos].disabled = true;
        document.getElementById('Res53').options[Pos].disabled = true;
        document.getElementById('Res55').options[Pos].disabled = true;
    }

    if(SecInvo=="Res55")
    {
        document.getElementById('Res51').options[Pos].disabled = true;
        document.getElementById('Res52').options[Pos].disabled = true;
        document.getElementById('Res53').options[Pos].disabled = true;
        document.getElementById('Res54').options[Pos].disabled = true;
    }
}