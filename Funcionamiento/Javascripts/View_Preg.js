var ContAlternsClicCols=0;

function CleanResp(BtnGroup)
{
    var Botones=document.getElementsByName(BtnGroup);

    for (var cont=0;cont<Botones.length;cont++) 
    {
        if(Botones[cont].checked)
        {
            Botones[cont].checked=false;
        }
    }
}

