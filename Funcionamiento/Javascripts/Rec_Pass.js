function VerifiCorreo(emailUser,user)
{
    alert('Este es el correo al que seran enviados los datos de la cuenta: '+user+"\n"+emailUser);
    var correo=confirm('¿Deseas proceder?');
    
    if(correo)
    {
        alert('Tus datos han sido enviados, fue un gusto ayudarte');
    }
    else
    {
        alert('Bien, ahora regresaras a la pantalla de recuperacion');
        function redireccionar()
        {
            window.locationf='Rec_Pass.php';
        } 
        setTimeout ('redireccionar()', 5000);   //tiempo expresado en milisegundos"
    }
}