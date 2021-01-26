(function(namespace, $) {
    "use strict";

    var Home = function () {
        var o = this; // Create reference to this instance
        $(document).ready(function () {
            o.initialize();
        }); // Initialize app when document is ready

    };
    var p = Home.prototype;

    // =========================================================================
    // INIT
    // =========================================================================

    p.initialize = function () {
        // Init events
    };

    p.initializeInPjax = function() {
        this._enableEvents();
    };

    // =========================================================================
    // EVENTS
    // =========================================================================

    p._enableEvents = function () {

        $("input,select").change(function() {
            if ($(this).attr('required') == 'required') {
                var form = $('#formContact');
                form.validate({
                    errorElement: 'div',
                    errorPlacement: function (error, element) {
                        error.addClass('invalid-feedback');
                        if(element.attr('type')=='checkbox'){
                            element.parent().next().append(error);
                        }else{
                            element.next().append(error);
                        }
                    },
                    highlight: function (element, errorClass, validClass) {
                        $(element).addClass('is-invalid');
                    },
                    unhighlight: function (element, errorClass, validClass) {
                        $(element).removeClass('is-invalid');
                    }
                });
                

                if(form.valid()){ }
            }
        });

        $('.submit-contact').click(function (e){

            var form = $('#formContact');
            form.validate({
                errorElement: 'div',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    if(element.attr('type')=='checkbox'){
                        element.parent().next().append(error);
                    }else{
                        element.next().append(error);
                    }
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });


            if(form.valid()) {
                $('.submit-contact').attr('disabled','disabled');
                $('#loadingOverlay').show();
                $.ajax({
                    url    : form.attr('action'),
                    type   : form.attr('method'),
                    data   : new FormData(form[0]),
                    enctype: 'multipart/form-data',
                    processData: false,
                    contentType: false,
                    success: function (response) 
                    {
                        var dataJson = $.parseJSON(response);
                        $("#modal-action").modal({
                            show: true,
                        });
                        $('#modal-content-action').html(dataJson.response);

                        $('.submit-contact').removeAttr('disabled');
                        $('#loadingOverlay').hide();
                        
                    },
                    error  : function () 
                    {
                        console.log('internal server error');
                    }
                });
            }
        });

    };

    // =========================================================================
    // DEFINE NAMESPACE
    // =========================================================================
    namespace.Home = new Home;
}(this.appWeb, jQuery)); // pass in (namespace, jQuery):