/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function ViewSec(RadSel,Sect1,Sect2)
{
    var Sel=document.getElementById(RadSel).value;
    if(Sel=="Si")
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