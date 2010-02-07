function validate(){
    var f = $('#formLogin')[0];
    if( f.txtLoginUser.value.length==0 ){
        alert("Ingrese el nombre de Usuario.");
        f.txtLoginUser.focus();
        return false;
    }
    if( f.txtLoginPass.value.length==0 ){
        alert("Ingrese la Contraseña.");
        f.txtLoginPass.focus();
        return false;
    }
    return true;
}
$(document).ready(function(){
    $('#formLogin')[0].txtLoginUser.focus();
});
