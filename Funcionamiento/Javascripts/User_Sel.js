/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function Ver_User(NForm,NCampo)
{
    var UserSel="";
    var volumen=eval("document."+NForm+"."+NCampo+".length");
    for (var cont=0; cont<volumen; cont++)
    {
        if(eval("document."+NForm+"."+NCampo+"["+cont+"].checked"))
        {
            UserSel=eval("document."+NForm+"."+NCampo+"["+cont+"].value");
            Sel_User(UserSel);
        }
    }
}

function Sel_User(User)
{
    if(User==="Estudiante")
    {
        window.location.replace("Reg_Est.php");
    }
        
    if(User==="Profesor")
    {
        window.location.replace("Reg_Profe.php");
    }
    
    if(User==="Padre")
    {
        window.location.replace("Reg_Padre.php");
    }
}