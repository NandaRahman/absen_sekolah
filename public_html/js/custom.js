$(".one-input").keypress(function (e) {
    var s = String.fromCharCode(e.which);
    if (s.match(/[a-zA-Z\.]/)){
        $(this).val(s).trigger('change');
        e.preventDefault();
    }else{
        e.preventDefault();
    }

});
$(".four-input").keypress(function (e) {
    var s = String.fromCharCode(e.which);
    if (s.match(/[0-9\.]/)){
        if( $(this).val().length > 3){
            $(this).val(s).trigger('change');
            e.preventDefault();
        }
    }else{
        e.preventDefault();
    }


});
$(".phone-input").keypress(function (e) {
    var s = String.fromCharCode(e.which);
    if (s.match(/[0-9\.]/)){
        if( $(this).val().length > 12){
            e.preventDefault();
        }
    }else{
        e.preventDefault();
    }
});

$("#loader").on("click", function(e) {
    e.preventDefault();
    $("#loadMe").modal({
        backdrop: "static", //remove ability to close modal with click
        keyboard: false, //remove option to close with keyboard
        show: true //Display loader!
    });
    setTimeout(function() {
        $("#loadMe").modal("hide");
    }, 3500);
});
function printImage(input){
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
