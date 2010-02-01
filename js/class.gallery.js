var Gallery = new (function(){

    $(document).ready(function(){

    });

    this.save = function(){
        if( validate() ){
            document.form1.action = (document.form1.gallery_id.value=="") ? document.baseURI+"index.php/panel/gallery_create" : "index.php/panel/gallery_modified/"+document.form1.gallery_id.value;
            document.form1.submit();
        }
    };

    this.attach = function(el){
        var count = $('input:file').length;

        if( count<10 ){
            var div = $('<div class="span-11 clear space-bottom2"><span>Im&aacute;gen '+(count+1)+'</span><input type="file" class="float-right input1 border" name="uploadFile[]" /></div>');
            $(el).parent().before(div);
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
                var id = "";
                items.each(function(){
                    id+=this.value+"/";
                });
                id = id.substr(0, id.length-1);
                location.href = "index.php/panel/gallery_delete/"+escape(id);
            }
            return false;
        }
    };

    var validate = function(){
        var f = document.form1;
        if( f.txtTitle.value.length==0 ){
            alert('Ingrese el campo "Título"');
            f.txtTitle.focus();
            return false;
        }
        if( f.txtDescription.value.length==0 ){
            alert('Ingrese el campo "Descripción"');
            f.txtDescription.focus();
            return false;
        }

        return true;
    };
})();

