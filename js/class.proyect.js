//        alert(baseURI);

var Proyect = new (function(){

    /*
     * METHODS PUBLIC
     */
    this.save = function(){
        if( validate() ){
            f.action = (f.proyect_id.value=="") ? baseURI+"panel/proyect_create" : "index.php/panel/proyect_modified/"+f.proyect_id.value;
            f.submit();
        }
    };

    this.buttons = {
        edit : function(){
            var items = $('input.itemCheck:checked');
            if( items.length!=1 ){
                alert("Debe seleccionar un item para modificar.");
                return false;
            }
            location.href = baseURI+"panel/proyectform/"+items.val();

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
                location.href = baseURI+"panel/proyect_delete/"+escape(proyect_id);
            }
            return false;
        }
    };


    /*
     * PROPERTIES PRIVATE
     */
    var f=false;

    /*
     * METHODS PRIVATE
     */
    var validate = function(){
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
        if( f.txtPlazo.value.length==0 ){
            alert('Ingrese el campo "Plazo"');
            f.txtPlazo.focus();
            return false;
        }

        return true;
    };

    /*
     * CONSTRUCTOR
     */
    $(document).ready(function(){
        f = $('#form1')[0];

        if(typeof f!="undefined" ){
            $('#txtDateStart, #txtDateEnd').datepicker({
                dateFormat : 'dd/mm/yy'
            });
        }
    });

})();

