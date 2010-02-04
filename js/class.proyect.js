var Proyect = new (function(){

    /*
     * CONSTRUCTOR
     */
    $(document).ready(function(){
        if(typeof document.form1!="undefined" ){
            $(document.form1.txtDateStart).datepicker();
            $(document.form1.txtDateEnd).datepicker();
            $(document.form1.txtDatePlazo).datepicker();
        }
    });

    /*
     * METHODS PUBLIC
     */
    this.save = function(){
        if( validate() ){
            document.form1.action = (document.form1.proyect_id.value=="") ? document.baseURI+"index.php/panel/proyect_create" : "index.php/panel/proyect_modified/"+document.form1.proyect_id.value;
            document.form1.submit();
        }
    };

    this.buttons = {
        edit : function(){
            var items = $('input.itemCheck:checked');
            if( items.length!=1 ){
                alert("Debe seleccionar un item para modificar.");
                return false;
            }
            location.href = document.baseURI+"index.php/panel/proyectform/"+items.val();

            return false;
        },
        del : function(){
            var items = $('input.itemCheck:checked');
            if( items.length==0 ){
                alert("Debe seleccionar al menos un item para eliminar.");
                return false;
            }

            if( confirm("¿Está seguro que desea eliminar?") ){
                var proyect_id = "";
                items.each(function(){
                    proyect_id+=this.value+"/";
                });
                proyect_id = proyect_id.substr(0, proyect_id.length-1);
                location.href = "index.php/panel/proyect_delete/"+escape(proyect_id);
            }
            return false;
        }
    };


    /*
     * METHODS PRIVATE
     */
    var validate = function(){
        var f = document.form1;
        if( f.txtClient.value.length==0 ){
            alert('Ingrese el campo "Cliente"');
            f.txtClient.focus();
            return false;
        }
        if( f.txtDescription.value.length==0 ){
            alert('Ingrese el campo "Descripción"');
            f.txtDescription.focus();
            return false;
        }
        if( f.txtDateStart.value.length==0 ){
            alert('Ingrese el campo "Fecha Inico"');
            f.txtDateStart.focus();
            return false;
        }
        if( f.txtDateEnd.value.length==0 ){
            alert('Ingrese el campo "Fecha Fin"');
            f.txtDateEnd.focus();
            return false;
        }
        if( f.txtDatePlazo.value.length==0 ){
            alert('Ingrese el campo "Plazo"');
            f.txtDatePlazo.focus();
            return false;
        }
        if( f.txtPlazoText.value.length==0 ){
            alert("Este campo es obligatorio.")
            f.txtPlazoText.focus();
            return false;
        }

        return true;
    };
})();

