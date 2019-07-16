$('document').ready(function() {


    $.ajax({
        url: '/searchcntry',
        type: 'GET',
        data: 'true',
        success: function(res) {
            $('#ccountry').append(res);


        }




    });



    if (1) {

        var cid = $('#ccountry').val();
        var sid = $('#cstate').val();



        $.ajax({
            url: '/searchstate/' + cid + "/c",
            type: 'GET',
            data: 'true',
            success: function(res) {
                $('.stateoption').remove();
                $('#cstate').append(res);

            }

        });



        $.ajax({
            url: '/searchcity/' + sid + "/c",
            type: 'GET',
            data: 'true',
            success: function(res) {
                $('.cityoption').remove();
                $('#ccity').append(res);

            }

        });


    }




    $('#ccountry').on('change', function() {
        var cid = $('#ccountry').val();
        $.ajax({
            url: '/fcn/' + cid,
            type: 'GET',
            data: 'true',
            success: function(res) {
                $('#cscountry').val(res);
            }


        });


        $.ajax({
            url: '/searchstate/' + cid + "/c",
            type: 'GET',
            data: 'true',
            success: function(res) {
                $('.stateoption').remove();
                $('#cstate').append(res);

            }

        });

    });


    $('#cstate').on('change', function() {

        var sid = $('#cstate').val();
        $.ajax({
            url: '/fsn/' + sid,
            type: 'GET',
            data: 'true',
            success: function(res) {

                $('#csstate').val(res);

            }

        });

        $.ajax({
            url: '/searchcity/' + sid + "/c",
            type: 'GET',
            data: 'true',
            success: function(res) {
                $('.cityoption').remove();
                $('#ccity').append(res);

            }

        });

    });


    $('#ccity').on('change', function() {

        var cyid = $('#ccity').val();
        $.ajax({
            url: '/fcyn/' + cyid,
            type: 'GET',
            data: 'true',
            success: function(res) {
                $('#cscity').val(res);

            }

        });

    });






















    $.ajax({
        url: '/searchcntry',
        type: 'GET',
        data: 'true',
        success: function(res) {
            $('#pcountry').append(res);

        }




    });

    if (1) {

        var pcid = $('#pcountry').val();
        var psid = $('#pstate').val();



        $.ajax({
            url: '/searchstate/' + pcid + "/p",
            type: 'GET',
            data: 'true',
            success: function(res) {
                $('.stateoptionperm').remove();
                $('#pstate').append(res);

            }

        });



        $.ajax({
            url: '/searchcity/' + psid + "/p",
            type: 'GET',
            data: 'true',
            success: function(res) {
                $('.cityoptionperm').remove();
                $('#pcity').append(res);

            }

        });


    }



    // if ($('#pcountry').val() != "null") {
    //     var pcid = $('#ccountry').val();
    //     $.ajax({
    //         url: '/searchstate/' + pcid,
    //         type: 'GET',
    //         data: 'true',
    //         success: function(res) {
    //             $('#pstate').append(res);

    //         }

    //     });

    // }

    // if ($('#pstate').val() != "") {

    //     var psid = $('#pstate').val();
    //     $.ajax({
    //         url: '/searchcity/' + psid,
    //         type: 'GET',
    //         data: 'true',
    //         success: function(res) {
    //             $('#pcity').append(res);

    //         }

    //     });

    // }


    $('#pcountry').on('change', function() {
        var pcid = $('#pcountry').val();

        $.ajax({
            url: '/fcn/' + pcid,
            type: 'GET',
            data: 'true',
            success: function(res) {
                $('#pscountry').val(res);
            }


        });


        $.ajax({
            url: '/searchstate/' + pcid + "/p",
            type: 'GET',
            data: 'true',
            success: function(res) {
                $('#pstate').append(res);

            }

        });

    });


    $('#pstate').on('change', function() {

        var psid = $('#pstate').val();
        $.ajax({
            url: '/fsn/' + psid,
            type: 'GET',
            data: 'true',
            success: function(res) {
                $('#psstate').val(res);

            }

        });

        $.ajax({
            url: '/searchcity/' + psid + "/p",
            type: 'GET',
            data: 'true',
            success: function(res) {
                $('#pcity').append(res);

            }

        });

    });


    $('#pcity').on('change', function() {

        var pcyid = $('#pcity').val();
        $.ajax({
            url: '/fcyn/' + pcyid,
            type: 'GET',
            data: 'true',
            success: function(res) {
                $('#pscity').val(res);

            }

        });

    });

});