function RevSel(NomElems,Ad)
{
    var Curso=document.getElementsByName(NomElems);

    for(var cont=0;cont<Curso.length;cont++)
    {
        //alert(Curso[cont].value);
        if(Curso[cont].checked==true)
        {
            return true;
        }
    }
    $("#"+Ad).modal("toggle");
    return false;
}