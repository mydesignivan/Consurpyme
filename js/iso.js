document.oncontextmenu = function(){return false;}
document.onkeydown = function(){return false;}

$(document).ready(function(){
    var html = '<img src="images/certificado-ISO-9001-2008.jpg" alt="Certificado ISO-9001-2008" />';
        html+= '<div class="mask" />';
    $('#simplemodal-window').html(html).hide();
    $('.simplemodal-link').click(function(e){
	e.preventDefault();

        $('#simplemodal-window').modal({
            maxHeight: $(window).height()-90
        });
    });
    $('div.center-certificado').css('cursor', 'pointer');
});