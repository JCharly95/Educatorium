function DelSelGrad(BtnGroup,Sec1,Sec2,Sec3)
{
    var Botones=document.getElementsByName(BtnGroup);

    for (var cont=0;cont<Botones.length;cont++) 
    {
        if(Botones[cont].checked)
        {
            Botones[cont].checked=false;
        }
    }
    document.getElementById(Sec1).style.display='none';
    document.getElementById(Sec2).style.display='none';
    document.getElementById(Sec3).style.display='none';
}

function ShowSec(SecVer,SecNVer1,SecNVer2,RadCall)
{
    if(document.getElementById(RadCall).checked==true)
    {
        document.getElementById(SecVer).style.display='block';
        document.getElementById(SecNVer1).style.display='none';
        document.getElementById(SecNVer2).style.display='none';
    }
}

function DelSelCur(BtnGroup)
{
    var Botones=document.getElementsByName(BtnGroup);

    for (var cont=0;cont<Botones.length;cont++) 
    {
        if(Botones[cont].checked)
        {
            Botones[cont].checked=false;
        }
    }
}