$('#sgnup').on('click', function() {
    $.ajax({
        url: '/signup',
        type: 'GET',
        data: 'true',
        success: function(d) {
            $('#switchreg').html(d);
        }
    })


    $('.signuptemp').load('/html/sgnrplace.html');
});

$('.lgoutmsg').load(setTimeout(function() {
    $('.lgoutmsg').fadeOut();

}, 3000));