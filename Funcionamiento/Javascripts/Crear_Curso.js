function ViewSec(RadSel,Sect1,Sect2)
{
    var Sel=document.getElementById(RadSel).value;
    if(Sel=="Si")
    {
        document.getElementById(Sect1).style.display = 'block';
        document.getElementById(Sect2).style.display = 'none';                
    }
}

function InViewSec(RadSel,Sect1,Sect2)
{
    var Sel=document.getElementById(RadSel).value;
    if(Sel=="No")
    {
        document.getElementById(Sect1).style.display = 'block';
        document.getElementById(Sect2).style.display = 'none';                
    }
}

function CancView(Sect1,Sect2,SelNo)
{
    document.getElementById(Sect1).style.display = 'none';
    document.getElementById(Sect2).style.display = 'block';
    document.getElementById(SelNo).checked=true;
}