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