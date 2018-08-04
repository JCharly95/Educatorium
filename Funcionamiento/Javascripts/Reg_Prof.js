/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function VerSec(NForm,NCampo)
{
    var SecuSel="";
    var volumen=eval("document."+NForm+"."+NCampo+".length");
    for (var cont=0; cont<volumen; cont++)
    {
        if(eval("document."+NForm+"."+NCampo+"["+cont+"].checked"))
        {
            SecuSel=eval("document."+NForm+"."+NCampo+"["+cont+"].value");
            if(SecuSel==="No")
            {
                document.getElementById('NSec').style.display = 'block';
                document.getElementById('SecSis').style.display = 'none';                
            }
        }
    }
}