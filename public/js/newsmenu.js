var d;


function ajaxfundel(d) {
    var embd = "#newsup_" + d;
    var dembd = "#eachnews_" + d;
    $.ajax({
        url: 'news/' + d,
        type: "get",
        data: true,
        success: function(datas) {

            if (datas == 1) {
                $(dembd).css('display', 'none');
                $(".newsfeed").remove(dembd);
            }
        }
    });

}

function ajaxfuned(d) {
    var embd = "#newsup_" + d;
    var dembd = "#eachnews_" + d;
    $.ajax({
        url: 'news/' + d + "/edit",
        type: "get",
        data: true,
        success: function(datas) {
            $(embd).html(datas);

        }
    });
}

function editpost(d) {
    var id = d;
    var ed = $('#editnewstext').val();
    var embd = "#newsup_" + d;
    $.ajax({
        url: '/newsup/' + id,
        type: 'get',
        data: { nws: ed },
        success: function(datas) {
            $(embd).html(datas);
        }
    });

}

function viewmore() {
    var p = parseInt($('#viewmore').attr('data-value'));
    var lp = parseInt($('#lp').val());
    if (lp == 1) {
        $('#viewmore').off('click');
        $('#viewmore').css('display', 'none');
    }
    p += 1;

    if (lp == p) {
        $('#viewmore').off('click');
        $('#viewmore').css('display', 'none');
    }

    $.ajax({
        url: 'news/?page=' + p,
        type: 'get',
        data: true,
        success: function(datas) {

            $('#viewmore').attr('data-value', p);
            $('.newsfeed').append(datas);
        }
    });

}

function voteup(d) {
    var lc = '#lc' + d;
    $.ajax({
        url: '/votes/' + d,
        type: 'GET',
        data: true,
        success: function(datas) {
            $(lc).html(datas);

        }
    });
}