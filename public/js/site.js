$('document').ready(function() {
    var w = window.innerWidth;
    if (w <= 760) {
        $('.square').css('width', w);
    } else {
        $('.square').css('width', w / 2.4);
    }

    window.addEventListener('resize', function() {
        var w = window.innerWidth;
        if (w <= 760) {
            $('.square').css('width', w);
        } else {
            $('.square').css('width', w / 2.4);
        }
    });


    //first bullet animation
    $('#txt1help').hover(function() {
        var inc = parseFloat(0.1);
        var init = parseFloat($('#svg_2').attr('rx'));
        var initsm = parseFloat($('#svg_5').attr('rx'));



        function anim() {
            requestAnimationFrame(anim);
            if (init >= 13.5) {
                inc = 0;
                return 0;
            }
            $('#svg_2').attr('rx', init);
            $('#svg_2').attr('ry', init);
            $('#svg_5').attr('rx', initsm);
            $('#svg_5').attr('ry', initsm);

            initsm += inc;
            init += inc;

        }

        anim();





    });




    $('#txt1help').mouseout(function() {
        var inc = parseFloat(0.1);
        var init = parseFloat($('#svg_2').attr('rx'));
        var initsm = parseFloat($('#svg_5').attr('rx'));


        function animout() {
            requestAnimationFrame(animout);
            if (init <= 11.5) {
                inc = 0;
                return 0;
            }
            $('#svg_2').attr('rx', init);
            $('#svg_2').attr('ry', init);
            $('#svg_5').attr('rx', initsm);
            $('#svg_5').attr('ry', initsm);


            init -= inc;
            initsm -= inc;

        }

        animout();





    });



    //second bullet animation
    $('#txt2help').hover(function() {
        var inc = parseFloat(0.1);
        var init = parseFloat($('#svg_3').attr('rx'));
        var initsm = parseFloat($('#svg_6').attr('rx'));



        function anim2() {
            requestAnimationFrame(anim2);
            if (init >= 13.5) {
                inc = 0;
                return 0;
            }
            $('#svg_3').attr('rx', init);
            $('#svg_3').attr('ry', init);
            $('#svg_6').attr('rx', initsm);
            $('#svg_6').attr('ry', initsm);

            initsm += inc;
            init += inc;

        }

        anim2();





    });




    $('#txt2help').mouseout(function() {
        var inc = parseFloat(0.1);
        var init = parseFloat($('#svg_3').attr('rx'));
        var initsm = parseFloat($('#svg_6').attr('rx'));


        function animout2() {
            requestAnimationFrame(animout2);
            if (init <= 11.5) {
                inc = 0;
                return 0;
            }
            $('#svg_3').attr('rx', init);
            $('#svg_3').attr('ry', init);
            $('#svg_6').attr('rx', initsm);
            $('#svg_6').attr('ry', initsm);


            init -= inc;
            initsm -= inc;

        }

        animout2();





    });


    //third bullet animation
    $('#txt3help').hover(function() {
        var inc = parseFloat(0.1);
        var init = parseFloat($('#svg_4').attr('rx'));
        var initsm = parseFloat($('#svg_8').attr('rx'));



        function anim3() {
            requestAnimationFrame(anim3);
            if (init >= 13.5) {
                inc = 0;
                return 0;
            }
            $('#svg_4').attr('rx', init);
            $('#svg_4').attr('ry', init);
            $('#svg_8').attr('rx', initsm);
            $('#svg_8').attr('ry', initsm);

            initsm += inc;
            init += inc;

        }

        anim3();





    });




    $('#txt3help').mouseout(function() {
        var inc = parseFloat(0.1);
        var init = parseFloat($('#svg_4').attr('rx'));
        var initsm = parseFloat($('#svg_8').attr('rx'));


        function animout3() {
            requestAnimationFrame(animout3);
            if (init <= 11.5) {
                inc = 0;
                return 0;
            }
            $('#svg_4').attr('rx', init);
            $('#svg_4').attr('ry', init);
            $('#svg_8').attr('rx', initsm);
            $('#svg_8').attr('ry', initsm);


            init -= inc;
            initsm -= inc;

        }

        animout3();





    });

    $('.cross').on('click', function() {
        $('.verinotif').css('display', 'none');
    });





});