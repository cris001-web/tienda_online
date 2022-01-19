
function enviar_ajax(){	

    $.ajax({
    type: 'POST',
    url: 'php/carrito.php',
    data: $('#form1').serialize(),
    success: function(respuesta) {
        alert(respuesta)
    }
    });
}
