$(document).ready(function () {
    if($('.form-validation').length){
        $(".form-validation").validate();
    }

    if($('.chosen-select').length){
        $(".chosen-select").chosen({ width: '100%' });
    }

    if($('.clockpicker').length){
        $('.clockpicker').clockpicker();
    }
});
