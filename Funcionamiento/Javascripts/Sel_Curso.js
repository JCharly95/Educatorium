function RevSel()
{
    var Curso=document.getElementsByName("CurSelEdit");

    for(var cont=0;cont<Curso.length;cont++)
    {
        //alert(Curso[cont].value);
        if(Curso[cont].checked==true)
        {
            return true;
        }
    }
    $("#AdErr").modal("toggle");
    return false;
}