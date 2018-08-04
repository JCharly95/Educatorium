function VerMaterias()
{
    if (document.getElementById('Gra1').checked)
    {
        document.getElementById('PriGra').style.display='block';
    }
    else
    {
        document.getElementById('PriGra').style.display='none';
    }

    if (document.getElementById('Gra2').checked)
    {
        document.getElementById('SecGra').style.display='block';
    }
    else
    {
        document.getElementById('SecGra').style.display='none';
    }

    if (document.getElementById('Gra3').checked)
    {
        document.getElementById('TerGra').style.display='block';
    }
    else
    {
        document.getElementById('TerGra').style.display='none';
    }
}

function SetPri()
{
    var Sel=document.getElementById('SelPri').checked;
    if(Sel)
    {
        document.getElementById('G11').checked=true;
        document.getElementById('G12').checked=true;
        document.getElementById('G13').checked=true;
        document.getElementById('G14').checked=true;
        document.getElementById('G15').checked=true;
        document.getElementById('G16').checked=true;
        document.getElementById('G17').checked=true;
    }
    else
    {
        document.getElementById('G11').checked=false;
        document.getElementById('G12').checked=false;
        document.getElementById('G13').checked=false;
        document.getElementById('G14').checked=false;
        document.getElementById('G15').checked=false;
        document.getElementById('G16').checked=false;
        document.getElementById('G17').checked=false;
    }
}

function SetSeg()
{
    var Sel=document.getElementById('SelSeg').checked;
    if(Sel)
    {
        document.getElementById('G21').checked=true;
        document.getElementById('G22').checked=true;
        document.getElementById('G23').checked=true;
        document.getElementById('G24').checked=true;
        document.getElementById('G25').checked=true;
        document.getElementById('G26').checked=true;
    }
    else
    {
        document.getElementById('G21').checked=false;
        document.getElementById('G22').checked=false;
        document.getElementById('G23').checked=false;
        document.getElementById('G24').checked=false;
        document.getElementById('G25').checked=false;
        document.getElementById('G26').checked=false;
    }
}

function SetTer()
{
    var Sel=document.getElementById('SelTer').checked;
    if(Sel)
    {
        document.getElementById('G31').checked=true;
        document.getElementById('G32').checked=true;
        document.getElementById('G33').checked=true;
        document.getElementById('G34').checked=true;
        document.getElementById('G35').checked=true;
        document.getElementById('G36').checked=true;
    }
    else
    {
        document.getElementById('G31').checked=false;
        document.getElementById('G32').checked=false;
        document.getElementById('G33').checked=false;
        document.getElementById('G34').checked=false;
        document.getElementById('G35').checked=false;
        document.getElementById('G36').checked=false;
    }
}