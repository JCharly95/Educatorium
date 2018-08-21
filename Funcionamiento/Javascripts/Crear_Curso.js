/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function VerPass(NForm,NCampo)
{
    var OpcPass="";
    var volumen=eval("document."+NForm+"."+NCampo+".length");
    for (var cont=0; cont<volumen; cont++)
    {
        if(eval("document."+NForm+"."+NCampo+"["+cont+"].checked"))
        {
            OpcPass=eval("document."+NForm+"."+NCampo+"["+cont+"].value");
            if(OpcPass==="Si")
            {
                document.getElementById('IntPass').style.display = 'block';
                document.getElementById('QuesPass').style.display = 'none';                
            }
        }
    }
}

function CancContra()
{
    document.getElementById('IntPass').style.display = 'none';
    document.getElementById('QuesPass').style.display = 'block';
    document.getElementById('pass').value="";
    document.getElementById('cpass').value="";
    document.getElementById('RNo').checked=true;
}