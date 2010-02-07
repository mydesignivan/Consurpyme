var Contact = new (function(){

    /*
     * METHODS PUBLIC
     */
    this.send = function(){
        $(f.txtFirstName).trigger('blur');
        $(f.txtSubject).trigger('blur');
        $(f.txtMessage).trigger('blur');
        $(f.txtEmail).trigger('blur');
        
        if( !error ){
            f.submit();
        }
    };


    /*
     * METHODS PRIVATE
     */
    var show_message = function(msg, input){
        var div = $(input).parent().parent().find('.msgvalidator');
        div.html(msg).slideDown('slow');
        input.focus();
        error=true;
    };
    var hide_message = function(input){
        $(input).parent().parent().find('.msgvalidator').hide();
        error=false;
    };


    /*
     * PROPERTIES PRIVATE
     */
    var error=false;
    var f;


    /*
     * CONSTRUCTOR
     */
    $(document).ready(function(){
        f = $('#form1')[0];

        $(f.txtFirstName).blur(function(){
            if( this.value.length=="" ){
                show_message('El campo "Nombre" es obligatorio.', this);
                return false;
            }else{
                hide_message(this);
            }
            return true;
        });
        $(f.txtSubject).blur(function(){
            if( this.value.length=="" ){
                show_message('El campo "Asunto" es obligatorio.', this);
            }else{
                hide_message(this);
            }
            return true;
        });
        $(f.txtMessage).blur(function(){
            if( this.value.length=="" ){
                show_message('El campo "Mensaje" es obligatorio.', this);
            }else{
                hide_message(this);
            }
            return true;
        });
        $(f.txtEmail).blur(function(){
            if( this.value.length=="" ){
                show_message('El campo "Email" es obligatorio.', this);
            }else if( /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.value)==false ){
                show_message('El email ingresado es incorrecto.', this);
            }else{
                hide_message(this);
            }
            return true;
        });
    });

})();

