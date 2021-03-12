$(document).ready(function() {

    $("#enviando").click(function() {

        var nombre = $("input#nombre").val();
        var apellido = $("input#apellido").val();
        var cc = $("input#cc").val();
        var telefono = $("input#telefono").val();
        var direccion = $("input#direccion").val();
        var barrio = $("input#barrio").val();
        var ciudas = $("input#ciudad").val();
        var pais = $("input#pais").val();
        var message = $("textarea#message").val();

        var dataString = 'nombre=' + nombre + '&apellido=' + apellido + '&cc=' + cc + '&telefono=' + telefono + '&direccion=' + direccion + '&barrio=' + barrio + '&ciudad=' + ciudad + '&pais=' + pais + '&message=' + message;

        $.ajax({
            type: "POST",
            url: "ingresar_datos.php",
            data: dataString,
            success: function() {
                $("#element").hide();
                $('#newmessage').append('<h2>Tu información ha sido recibida correctamente!</h2><table><tr><td>Nombre:</td><td>'+name+'</td></tr><tr><td>Mensaje:</td><td>'+message+'</td></tr></table>');
            }
        });
        return false;
    });
});