$(document).ready(function(){ 
    $('#characterLeft').text('300 caracteres permitidos');
    $('#Motivo').keyup(function () {
        // alert("lalal"); 
        var max = 300;
        var len = $(this).val().length;
        if (len >= max) {
            $('#characterLeft').text('has alcanzado el limite de caracteres');            
        } 
        else {
            var ch = max - len;
            $('#characterLeft').text(ch + ' caracteres restantes');         
        }
        if($(this)[0].checkValidity()){
            $('#botonOfertar').removeClass('disabled');  
        }
        else{
            $('#botonOfertar').addClass('disabled');  
        }
    });   
});
