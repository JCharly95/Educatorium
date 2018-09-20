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