document.oncontextmenu = function(){return false}  //Bloquea boton secundario

$(document).ready(function(){
    $('#simplemodal-window').html('<img src="images/certificado-ISO-9001-2008.jpg" alt="Certificado ISO-9001-2008" />').hide();
    $('.simplemodal-link').click(function(e){
	e.preventDefault();

        $('#simplemodal-window').modal({
            maxHeight: 600
        });
    })

});