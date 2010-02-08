var Gallery = new (function(){

    /*
     * METHODS PUBLIC
     */
    this.save = function(){
        if( validate() ){
            $('input.ajaxupload-filename').each(function(){
                if( this.value!="" ) arr_images_new.push(this.value);
            });

            f.images_new.value = arrayToObject(arr_images_new);
            f.images_deletes.value = arrayToObject(arr_images_delete);
            f.images_modified_id.value = arrayToObject(arr_images_modified.id);
            f.images_modified_name.value = arrayToObject(arr_images_modified.name);

            f.action = (f.gallery_id.value=="") ? baseURI+"panel/gallery_create" : "index.php/panel/gallery_modified/"+f.gallery_id.value;
            f.submit();
        }
    };

    this.attach = function(el){
        var count = $('#form1 input:file').length;

        if( count<10 ){
            var html = '<div id="div-upload" class="span-18 clear space-bottom2">';
                html+= '<div class="span-3 index-image">Im&aacute;gen '+(count+1)+'</div>';
                html+= '<input type="file" class="float-left border" size="22" name="uploadFile" onchange="Gallery.upload(this);" />';
                html+= '<input type="hidden" class="ajaxupload-filename" />';
                html+= '<input type="button" value="Eliminar" onclick="Gallery.remove_inputfile(this)" />';
                html+= '<div class="span-4 display-hidden ajax-loader">&nbsp;&nbsp;<img src="images/ajax-loader.gif" alt="" />&nbsp;Subiendo...</div>';
                html+= '</div>';
            $(el).parent().before($(html));
        }

    };

    this.upload = function(el){
        if( working ){
            alert("El servidor se encuentra ocupado.");
            return false;
        }
        working=true;
        auDiv = $(el).parent();

        ajax_loader.show();

        auForm.empty()
              .append(create_iframe())
              .append($(el))
              .submit();
        
        return false;
    };

    this.remove_inputfile = function(el, image_id){            
        if( working ){
            alert("El servidor se encuentra ocupado.")
            return false;
        }
        
        $(el).parent().remove();
        $('div.index-image').each(function(i){
            el.innerHTML = "Im&aacute;gen "+(i+1);
        });

        var input_hidden = $(el).parent().find('.ajaxupload-filename');
        if( input_hidden.length==0 || (input_hidden.length>0 && input_hidden.val()!="") ){
            if( typeof image_id!="undefined" ) {
                if( $.inArray(image_id, arr_images_delete)==-1 ){
                    arr_images_delete.push(image_id);
                }

                var key = $.inArray(image_id, arr_images_modified.id);
                if( key!=-1 ){
                    arr_images_modified.id.unset_array(key);
                    arr_images_modified.name.unset_array(key);
                }
            }
        }
        return false;
    };

    this.buttons = {
        edit : function(){
            var items = $('input.itemCheck:checked');
            if( items.length!=1 ){
                alert("Debe seleccionar un item para modificar.");
                return false;
            }
            location.href = baseURI+"panel/galleryform/"+items.val();

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
                location.href = baseURI+"panel/gallery_delete/"+escape(id);
            }
            return false;
        }
    };

    /*
     * PROPERTIES PRIVATE
     */
    var auForm = false;
    var auDiv = false;
    var working = false;
    var arr_images_modified = {
        id : Array(),
        name : Array()
    };
    var arr_images_new = new Array();
    var arr_images_delete = new Array();
    var f=false;

    /*
     * METHODS PRIVATE
     */
    var validate = function(){
        if( f.txtTitle.value.length==0 ){
            alert('Ingrese el campo "Título"');
            f.txtTitle.focus();
            return false;
        }
        if( $('img.ajaxupload-image').length==0 ){
            alert("Debe subir al menos una imágen.");
            return false;
        }
        if( f.txtDescription.value.length==0 ){
            alert('Ingrese el campo "Descripción"');
            f.txtDescription.focus();
            return false;
        }

        return true;
    };

    var upload_success = function(){
        var content = this.contentDocument ? this.contentDocument.body.innerHTML : frames[0].document.body.innerHTML;

        if( /^(filename:)/.test(content) ){
            var filename = content.substr(9);

            auDiv.find(':first').after('<input type="file" class="float-left border" size="22" name="uploadFile" onchange="Gallery.upload(this);" />');

            var img = auDiv.find('.ajaxupload-image');
            if( img.length==0 ){
                auDiv.find('.index-image').html('<img src="'+ filename +'" alt="" class="ajaxupload-image" />');
            }else{
                img.attr('src', filename);
            }

            var input = auForm.find('input:file');
            auDiv.find("input:hidden").val(input.val());

            if( input.attr('id')!="" ){
                add_image_modified(parseInt(input.attr('id').substr(2)), input.val());
            }

            ajax_loader.hidden();

        }else{
            alert(content);
        }

        working=false;
    };

    var ajax_loader ={
        show : function(input){
            auDiv.find('.ajax-loader').show();
        },
        hidden : function(input){
            auDiv.find('.ajax-loader').hide();
        }
    }

    var create_iframe = function(){
        var iframe = $('<iframe name="iframeUpload" id="iframeUpload" src="" width="400" height="100" class="display-hidden"></iframe>');
            iframe.hide()
            iframe.bind('load', upload_success);
        return iframe;
    };

    var add_image_modified = function(id, name){
        if( $.inArray(id, arr_images_modified.id)==-1 ){
            arr_images_modified.id.push(id);
            arr_images_modified.name.push(name);
            if( $.inArray(id, arr_images_delete)==-1 ) arr_images_delete.push(id);
        }
    };


    /*
     * CONSTRUCTOR
     */
    $(document).ready(function(){
        f = $('#form1')[0];
        auForm = $('#formAjaxUpload');
        auForm.attr('target', 'iframeUpload')
              .attr('action', baseURI+"ajax_upload");

    });

})();

