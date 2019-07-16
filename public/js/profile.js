$('.changeimg').on('click', function() {
    $('.inpfileupload').click();
});

$('.inpfileupload').change(function() {
    $('#imageup').submit();
});



$('.changeimg').hover(function() {
    $('.changeimg').css('opacity', '1');

});
$('.changeimg').mouseout(function() {
    $('.changeimg').css('opacity', '0');

});

$('.errors').load(setTimeout(function() {
    $('.errors').fadeOut();

}, 3000));
$('#smascurr').on('click', function() {
    if ($('#smascurr').prop("checked") == true) {

        $('#pstreet').val($('#cstreet').val());
        $('#pcity').append("<option value=" + $('#ccity').val() + " selected >" + $('#cscity').val() + "</option>");
        $('#pscity').val($('#cscity').val());
        $('#pstate').append("<option value=" + $('#cstate').val() + " selected >" + $('#csstate').val() + "</option>");
        $('#psstate').val($('#csstate').val());
        $('#pcountry').append("<option value=" + $('#ccountry').val() + " selected >" + $('#cscountry').val() + "</option>");
        $('#pscountry').val($('#cscountry').val());
        $('#pzip').val($('#czip').val());
    }
});