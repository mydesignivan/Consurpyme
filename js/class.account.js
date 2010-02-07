var Account = new (function(){

    /*
     * METHODS PUBLIC
     */
     this.validate = function(){
        var f = $('#form1')[0];
        if( f.txtUser.value.length==0 ){
            alert('Ingrese el nombre de "Usuario"');
            f.txtUser.focus();
            return false;
        }
        if( f.txtEmail.value.length==0 ){
            alert('Ingrese su dirección de "Email"');
            f.txtEmail.focus();
            return false;
        }
        if( /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(f.txtEmail.value)==false ){
            alert('El email ingresado es incorrecto.');
            f.txtEmail.focus();
            return false;
        }
        if( f.txtPass.value.length>0 ){
            if( f.txtPass2.value.length==0 ){
                alert('Ingrese la confirmación de la contraseña.');
                f.txtPass2.focus();
                return false;
            }
            if( f.txtPass.value!=f.txtPass2.value ){
                alert('La confirmación del password es incorrecta.');
                f.txtPass2.value="";
                f.txtPass2.focus();
                return false;
            }
        }

        return true;
     };

})();

