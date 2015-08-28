    $(document).ready(function(e) {

        var doc_type_pan = "#pan";
        var disp_layer_pan = "#targetLayer_5";
        var success_layer_pan = "#targetLayer5";
        
        var doc_arg_pan = "pan_prop";

        run_doc(doc_type_pan, disp_layer_pan, success_layer_pan, doc_arg_pan);

        var doc_type_vat = "#vat_cst";
        var disp_layer_vat = "#targetLayer_6";
        var success_layer_vat = "#targetLayer6";
        
        var doc_arg_vat = "vat_cst";

        run_doc(doc_type_vat, disp_layer_vat, success_layer_vat, doc_arg_vat);
        
        var doc_type_pan_comp = "#pan_comp";
        var disp_layer_pan_comp = "#targetLayer_7";
        var success_layer_pan_comp = "#targetLayer7";
        
        var doc_arg_pan_comp = "pan_comp";

        run_doc(doc_type_pan_comp, disp_layer_pan_comp, success_layer_pan_comp, doc_arg_pan_comp);
        
        var doc_type_part_deed = "#part_deed";
        var disp_layer_part_deed = "#targetLayer_8";
        var success_layer_part_deed = "#targetLayer8";
        
        var doc_arg_part_deed = "part_deed";

        run_doc(doc_type_part_deed, disp_layer_part_deed, success_layer_part_deed, doc_arg_part_deed);
        
        var doc_type_sign = "#sign";
        var disp_layer_sign = "#targetLayer_9";
        var success_layer_sign = "#targetLayer9";
       
        var doc_arg_sign = "sign";

        run_doc(doc_type_sign, disp_layer_sign, success_layer_sign, doc_arg_sign);
        
        var doc_type_cert_of_incorp = "#cert_of_incorp";
        var disp_layer_cert_of_incorp = "#targetLayer_10";
        var success_layer_cert_of_incorp = "#targetLayer10";
      
        var doc_arg_cert_of_incorp = "cert_of_incorp";

        run_doc(doc_type_cert_of_incorp, disp_layer_cert_of_incorp, success_layer_cert_of_incorp, doc_arg_cert_of_incorp);
        
        var doc_type_moa_aoa = "#moa_aoa";
        var disp_layer_moa_aoa = "#targetLayer_11";
        var success_layer_moa_aoa = "#targetLayer11";
      
        var doc_arg_moa_aoa = "moa_aoa";

        run_doc(doc_type_moa_aoa, disp_layer_moa_aoa, success_layer_moa_aoa, doc_arg_moa_aoa);


    });

    function run_doc(doc_type, disp_layer, success_layer, doc_arg) {
        
        $(doc_type).on('submit', (function(e) {
            e.preventDefault();
            $.ajax({
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    //Upload progress
                    xhr.upload.addEventListener("progress", function(evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            $(disp_layer).css("display", "block");
                            console.log(percentComplete);
                        }
                    }, false);
                    //Download progress 
                    xhr.addEventListener("progress", function(evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            //Do something with download progress
                            console.log(percentComplete);
                        }
                    }, false);
                    return xhr;
                },
                url: "http://sellers.bulkhouse.in/upload_new/insert_and_upload/" + doc_arg,
                type: "POST",
                data: new FormData(this),
                mimeType: "multipart/form-data",
                contentType: false,
                cache: false,
                processData: false,
                success: function(data)
                {   
                    $(disp_layer).css("display", "none");
                    $(success_layer).html(data);
                   
//                    $('a.md-close').trigger('click');
//                    setInterval('refreshPage()',3000);
                    location.reload();
                    
                },
                
                error: function()
                {
                }
                
            });
           
        }));
        
    }
   