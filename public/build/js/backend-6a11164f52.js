(function($){

    var published = $( "#published"),
        status = $( "#status"),
        active = $( "#active"),
        filters = $(".filtros"),
        btnOrder = $(".btn-order"),
        chkProduct = $('.chk-product'),
        chkSelectAll = $('#select-all'),
        btnDeleteMultiple = $('.delete-multiple'),
        btnActivateMultiple = $('.activate-multiple'),
        btnEditSlug = $('.btn-edit-slug'),
        gallery = $('#gallery'),
        infoBox = $('#InfoBox'),
        photos  = 0,
        inputsPhotos = $("#inputs_photos"),
        users;


    btnOrder.on('click',function(e) {

        $('#form-order').find('input[name="order"]').val($(this).attr("data-order"));
        $('#form-order').submit();

        return false;
    });

    $("form[data-confirm]").submit(function() {
        if ( ! confirm($(this).attr("data-confirm"))) {
            return false;
        }
    });

    chkProduct.on('click',function(e) {

        (verificaChkActivo(chkProduct)) ? btnDeleteMultiple.show('fast') : btnDeleteMultiple.hide('fast');


    });
    chkSelectAll.on('click',function(e) {

        var c = this.checked;
        $(':checkbox').prop('checked',c);

        (verificaChkActivo(chkProduct)) ? btnDeleteMultiple.show('fast') : btnDeleteMultiple.hide('fast');


    });
    $('.btn-multiple').on('click',function(e) {

        var action = $(this).data('action');

        chkSelectAll.val(action);
        $('#select-action').val(action);
        (verificaChkActivo(chkProduct)) ? $('#form-option-chk').submit() : alert('Seleccione un registro de la lista');


        e.preventDefault();

    });

    function verificaChkActivo(chks) {
        var state = false;

        chks.each(function(){

            if(this.checked)
            {

                state = true;


            }

        });

        return state;
    }
    function submitForm(){
        filters.find('form').submit();
    }
    published.change(submitForm);
    status.change(submitForm);
    active.change(submitForm);


})(jQuery);

//# sourceMappingURL=backend.js.map
