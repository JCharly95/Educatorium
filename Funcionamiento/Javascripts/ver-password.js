// FUNCION PARA MOSTRAR CONTRASEÑA-->
  
function showpass()
{
    var password = document.getElementById('pass');
    if(password.type === "password")
    {
        password.type = "text";
    }
    else
    {
        password.type = "password";
    }
}

function showcpass()
{
    var cpass = document.getElementById('cpass');
    if(cpass.type === 'password')
    {
        cpass.type = "text";
    }
    else
    {
        cpass.type = "password";
    }
}
        