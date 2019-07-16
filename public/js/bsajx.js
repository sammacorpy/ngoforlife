$('document').ready(function() {

    $('#search').on('click', function() {

        var bgrp = $('#bloodgrp').val();
        var city = $('#ccity').val();
        $.ajax({
            type: 'GET',

            url: '/bsval',

            data: {
                bloodgrp: bgrp,
                ccity: city,
            },
            success: function(d) {
                $('#embed').html(d);
            }



        });

        $('#result').css('display', 'block');
    });



    $('#forward').on('click', function() {
        var pgnum = parseInt($('#forward').attr('data-value'));
        $('#backward').css('display', 'block');

        pgnum += 1;
        var bgrp = $('#bloodgrp').val();
        var city = $('#ccity').val();
        $.ajax({
            type: 'GET',

            url: '/bsval',

            data: {
                bloodgrp: bgrp,
                ccity: city,
                page: pgnum
            },
            success: function(d) {

                if (d.length == 87) {
                    $('#embed').html("<p style='margin-top:100px'>sorry no more data</p>");

                    $('#forward').css('display', 'none');
                } else {
                    $('#embed').html(d);

                }
                $('#forward').attr('data-value', pgnum);
                $('#backward').attr('data-value', pgnum);
            }
        });
    });



    $('#backward').on('click', function() {
        $('#forward').css('display', 'block');
        var pgnum = parseInt($('#backward').attr('data-value'));
        pgnum -= 1;
        if (pgnum <= 1) {
            pgnum = 1;
            $('#backward').css('display', 'none');
        }
        var bgrp = $('#bloodgrp').val();
        var city = $('#ccity').val();
        $.ajax({
            type: 'GET',
            url: '/bsval',
            data: {
                bloodgrp: bgrp,
                ccity: city,
                page: pgnum
            },
            success: function(d) {
                $('#embed').html(d);
                $('#forward').attr('data-value', pgnum);
                $('#backward').attr('data-value', pgnum);
            }
        });
    });


    $('.cross').on('click', function() {
        $('#result').css('display', 'none');
    });


});