$(document).ready(function(){ 
    $('#characterLeft').text('200 caracteres permitidos');
    $('#Motivo').keydown(function () {
        var max = 200;
        var len = $(this).val().length;
        if (len >= max) {
            $('#characterLeft').text('has alcanzado el limite de caracteres');
            $('#characterLeft').addClass('red');
            $('#btnSubmit').addClass('disabled');            
        } 
        else {
            var ch = max - len;
            $('#characterLeft').text(ch + ' characters left');
            $('#btnSubmit').removeClass('disabled');
            $('#characterLeft').removeClass('red');            
        }
    });    
});
